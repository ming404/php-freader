<?php
/*
 * This file is part of the PHP Freader version 1.1 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


session_start();
$user = null;
if(defined('SITE_REQUIRE_LOGIN') && SITE_REQUIRE_LOGIN=="true") {
    if(empty($_SESSION['user'])) {
        if(empty($loginNotRequired)) {
            header('Location: /login.php');
            die();
        }
    } else {
        $user = user::getBy('id', $_SESSION['user']->id);
    }
} else {
    //get user - single user
    $user = user::getBy('id', '1');
}

ob_start("ob_gzhandler");
if(empty($_REQUEST['action'])) return;
$data = $error = array();
switch($_REQUEST['action'])
{
    case 'channel-list':
        try
        {
            $data[] = array('id'=>'allitems','label'=>'All Items','nodeClass'=>'special','unread'=>0);
            $data[] = array('id'=>'starred','label'=>'Starred','nodeClass'=>'special');
            $channels = $tags = array(); $totalUnread = 0;
            if(!empty($user->channels))
            {
                foreach($user->channels as $tag_id => $tagged_channels)
                {
                    foreach($tagged_channels as $channel)
                    {
                        $node = array('id'=>$channel->id,'label'=>$channel->title,'icon'=>$channel->imageUrl,'nodeClass'=>'channel','url'=>$channel->feedUrl,'unread'=>$channel->unreadCount);
                        $totalUnread += $channel->unreadCount;
                        if($tag_id>0)
                        {
                            if(empty($tags[$tag_id]))
                                $tags[$tag_id] = array('id'=>'tag_'.$tag_id,'label'=>$user->tags[$tag_id]->name,'nodeClass'=>'tag','children'=>array(),'unread'=>0);
                            $node['tagName'] = $user->tags[$tag_id]->name;
                            $tags[$tag_id]['children'][] = $node;
                            $tags[$tag_id]['unread'] += $channel->unreadCount;
                        }
                        else
                        {
                            $channels[] = $node;
                        }
                    }
                }
                if(!empty($tags))
                {
                    foreach($tags as $id => $tag)
                        $data[] = $tag;
                }
                if(!empty($channels))
                {
                    foreach($channels as $channel)
                        $data[] = $channel;
                }
            }
            $data[0]['unread'] = $totalUnread;

        } catch(Exception $e) {
            $error = array('status'=>'Error','message'=>$e->getMessage());
            if(defined('DEBUG') && DEBUG)
                $error['trace'] = $e->getTrace();
        }
        break;

    case "new-subscription":
        try {
            $channel = channel::getBy('guid', guid($_REQUEST['url']));
            if($channel->isNew()) {
                $channel->feedUrl = $_REQUEST['url'];
                $channel->updateFromRemote();
            }
            if(empty($channel->id))
                throw new Exception("Given url is unreachable");
            if(!$user->hasChannel($channel))
                $user->subscribe($channel);
            $data = array('id'=>$channel->id,'label'=>$channel->title,'icon'=>$channel->imageUrl,'nodeClass'=>'channel','url'=>$channel->feedUrl);
        } catch(Exception $e) {
            $error = array('status'=>'Error','message'=>$e->getMessage());
            if(defined('DEBUG') && DEBUG)
                $error['trace'] = $e->getTrace();
        }

        break;

   case "item-list":
        try {
            $item = new item;
            $channels = array();
            $star = false;
            $text = '';
            if($_REQUEST['class']=='tag') {
                $tagId = substr($_REQUEST['id'],4);
                $channels = $user->channels[$tagId];
                $data['title'] = $user->tags[$tagId]->name;
            } else if($_REQUEST['class']=='channel') {
                $channel = channel::getBy ('id', $_REQUEST['id']);
                $channels[] = $channel;
                $data['title'] = $channel->title;

                //while getting item list, if the last build was 5 minutes ago, lets rebuild
                if(time()>strtotime($channel->lastBuildDate)+300) {
                    $channel->updateFromRemote();
                    $data['refreshNavList'] = true;
                }
            } else if($_REQUEST['class']=='search'){
                $data['title'] = 'Search Results';
                $text = $_REQUEST['text'];
            } else {    //class = special
                $data['title'] = 'All Items';
                $ucl = new user_channel_link;
                $channels = $ucl->getUserChannelIds($user);
                if($_REQUEST['id']=='starred') {
                    $star = true;
                    $data['title'] = 'Star Items';
                }
            }

            $sortBy = "$item->tableName.pub_date desc";
            if(!empty($_REQUEST['sort']) && $_REQUEST['sort']=='oldest')
                $sortBy = "$item->tableName.pub_date asc";

            $read = !empty($_REQUEST['mode']) && $_REQUEST['mode']=='unread' ? false : null;
            $limit = !empty($_REQUEST['limit']) ? $_REQUEST['limit'] : 20;
            $offset = !empty($_REQUEST['offset']) ? $_REQUEST['offset'] : 0;

            $data['items'] = $items = array();

            //getAll($user,$channels=null,$sortBy=null,$read=null,$star=null,$limit=20,$offset=0)
            if($_REQUEST['class']=='search')
                $items = item::getBySearch($user,$text,$sortBy,$read,$star,$limit,$offset);
            else
                $items = item::getAll($user,$channels,$sortBy,$read,$star,$limit,$offset);
            if($items) {
                foreach($items as $item) {
                    $data['items'][] = array(
                        'id' => $item->id,
                        'channel_id' => $item->channelId,
                        'title' => $item->title,
                        'link' => $item->link,
                        'author' => $item->creator,
                        'body' => $item->description,
                        'star' => $item->star,
                        'read' => $item->read,
                        'date' => feedDate($item->pubDate)
                    );
                }
            }

            //save user preference for next refresh
            $user->preference->class = $_REQUEST['class'];
            $user->preference->sort = $_REQUEST['sort'];
            $user->preference->mode = $_REQUEST['mode'];
            $user->preference->id = $_REQUEST['id'];
            $user->save();

        } catch(Exception $e) {
            $error = array('status'=>'Error','message'=>$e->getMessage());
            if(defined('DEBUG') && DEBUG)
                $error['trace'] = $e->getTrace();
        }
        break;

    case "read-item":
        try {
            $item = item::getBy('id', $_REQUEST['id'], $user);
            $_REQUEST['read']=="true" ? $item->read($user) : $item->unread($user);
            $data = array('status'=>'Ok');
        } catch(Exception $e){
            $error = array('status'=>'Error','message'=>$e->getMessage());
            if(defined('DEBUG') && DEBUG)
                $error['trace'] = $e->getTrace();
        }
        break;

    case "star-item":
        try {
            $item = item::getBy('id', $_REQUEST['id'], $user);
            $_REQUEST['star']=="true" ? $item->star($user) : $item->unstar($user);
            $data = array('status'=>'Ok');
        } catch(Exception $e){
            $error = array('status'=>'Error','message'=>$e->getMessage());
            if(defined('DEBUG') && DEBUG)
                $error['trace'] = $e->getTrace();
        }
        break;

    case "edit-tag":
        try {
            $tag = tag::getBy('id', substr($_REQUEST['id'],4), $user);
            if(!$tag)
                throw new Exception('Tag not found');
            $tag->name = $_REQUEST['label'];
            $tag->save();
            $data = array('status'=>'Ok');
        } catch (Exception $e) {
            $error = array('status'=>'Error','message'=>$e->getMessage());
            if(defined('DEBUG') && DEBUG)
                $error['trace'] = $e->getTrace();
        }
        break;

    case "remove-tag":
        try {
            $tagId = substr($_REQUEST['id'],4);
            $removeChannels = $_REQUEST['removeChannels']==1;
            $tag = tag::getBy('id', $tagId, $user);
            if(count($user->channels[$tagId])) {
                $uclObj = new user_channel_link;
                foreach($user->channels[$tagId] as $channel)
                    $removeChannels ? $uclObj->removeUserChannel($user, $channel) : $uclObj->untagUserChannel($user, $channel);
            }
            $tag->delete();

            $data = array('status'=>'Ok');
        } catch (Exception $e) {
            $error = array('status'=>'Error','message'=>$e->getMessage());
            if(defined('DEBUG') && DEBUG)
                $error['trace'] = $e->getTrace();
        }
        break;

    case "edit-channel":
        try {
            $channel = channel::getBy('id', $_REQUEST['id']);
            $channel->feedUrl = $_REQUEST['url'];
            $channel->save();

            $uclObj = new user_channel_link;
            if(!empty($_REQUEST['tag'])) {
                $tag = tag::getBy('name', $_REQUEST['tag'], $user);
                if ($tag->isNew()) {
                    $tag->name = $_REQUEST['tag'];
                    $tag->userId = $user->id;
                    $tag->save();
                }
                $uclObj->tagUserChannel($user,$channel,$tag);
            } else {
                $uclObj->untagUserChannel($user,$channel);
            }

            $data = array('status'=>'Ok');
        } catch (Exception $e) {
            $error = array('status'=>'Error','message'=>$e->getMessage());
            if(defined('DEBUG') && DEBUG)
                $error['trace'] = $e->getTrace();
        }
        break;

    case "remove-channel":
        try {
            $channel = channel::getBy('id', $_REQUEST['id']);
            $uclObj = new user_channel_link;
            $uclObj->removeUserChannel($user, $channel);

            $data = array('status'=>'Ok');
        } catch (Exception $e) {
            $error = array('status'=>'Error','message'=>$e->getMessage());
            if(defined('DEBUG') && DEBUG)
                $error['trace'] = $e->getTrace();
        }
        break;

    case "mark-read":
        try {
            $channelIds = array();
            $ucl = new user_channel_link;
            if($_REQUEST['class']=='tag') {
                $tagId = substr($_REQUEST['id'],4);
                $channelIds = $ucl->getUserChannelIds($user,$user->tags[$tagId]);
            } else if($_REQUEST['class']=='channel') {
                $channelIds[] = $_REQUEST['id'];
            } else if($_REQUEST['id']=='allitems')  {    //class = special
                $channelIds = $ucl->getUserChannelIds($user);
            } else {
                header('HTTP/1.1 400 Bad Request');
                $data = array('status'=>'Error','message'=>'Item tag / channel not defined');
                break;
            }

            $channelIds = $ucl->getUserChannelIds($user);
            $date = date('Y-m-d');
            if(!empty($_REQUEST['time'])) {
                if($_REQUEST['time'] == 'day')
                    $date = date('Y-m-d',strtotime('yesterday'));
                else if($_REQUEST['time'] == 'week')
                    $date = date('Y-m-d',strtotime('last week'));
                else if($_REQUEST['time'] == 'month')
                    $date = date('Y-m-d',strtotime('last month'));
            }
            $item = new item();
            $rows = $item->bulkRead($user, implode(',',$channelIds), $date);

            $data = array('status'=>'Ok','rows'=>$rows);
        } catch (Exception $e) {
            $error = array('status'=>'Error','message'=>$e->getMessage());
            if(defined('DEBUG') && DEBUG)
                $error['trace'] = $e->getTrace();
        }
        break;

    case "save-settings":
        $user->firstName = $_POST['firstName'];
        $user->lastName = $_POST['lastName'];
        $user->email = $_POST['email'];
        $status = $user->save();
        if(!empty($_POST['password']))
            $status &= $user->updatePassword($_POST['password']);
        if($status)
            $data['status'] = "ok";
        else
            $error = array('status'=>'Error','message'=>$e->getMessage());
        break;

    case "import-opml":
        log::usage();
        if (!empty($_FILES["file"]) && $_FILES["file"]['error']==UPLOAD_ERR_OK) {
            $data = $user->import(file_get_contents($_FILES['file']['tmp_name']));
            $data['status'] = "ok";
        }
        break;

    case "export-opml":
        log::usage();
        header("Content-type: text/xml");
        header('Content-Disposition: attachment; filename="php-freader-backup.opml.xml"');
        die($user->export());
        break;

    case "login":
        log::usage();
        $user = user::getBy('email', $_POST['email']);

        if(!empty($user->id)) {
            if($user->verifyPassword($_POST['password']) && $user->isActive()) {
                $_SESSION['user'] = $user;
                header("Location: index.php");
                die();
            }
        }
        header("Location: login.php?signin=failed");
        die();
        break;

    case "logoff":
        session_destroy();
        header("Location: index.php");
        die();
        break;

    case "forgot-password":
        $user = user::getBy('email', $_POST['email']);
        if($user->id) {
            $code = randString(16);
            $user->preference->reset_code = $code;
            $user->save();
            mail($_POST['email'],"Reset your password","Hi, Thank you for using ".SITE_NAME.".\n\nPlease click on Reset Password link in Freader login page, and enter the code below along with other details and click Submit button.\n\nYour code: $code\n\nGood luck!\n\nFreader Team","From: ".SITE_EMAIL_SENDER);
        }
        $data['status'] = "ok";
        break;

    case "reset-password":
        log::usage();
        $user = user::getBy('email', $_POST['email']);
        if($user->id && isset($user->preference->reset_code) && $user->preference->reset_code==$_POST['code']) {
            $user->updatePassword($_POST['newpassword']);
            unset($user->preference->reset_code);
            $user->save();
            $data['status'] = "ok";
        } else {
            $data = array('status'=>'Error','message'=>"Not able to verify reset code or user email");
        }
        break;

    case "reset_captcha":
        import('wpCaptcha/captcha_code_file');
        break;

    case "signup":
        log::usage();
        if(strcasecmp($_POST['suCode'],$_SESSION['captcha_code'])!=0) {
            $data = array('status'=>'Error','message'=>'Incorrect security code.','resetcode'=>true);
            break;
        }
        $user = user::getBy('email', $_POST['suEmail']);
        if(empty($user->id)) {
            $user->firstName = $_POST['suFirstname'];
            $user->lastName = $_POST['suLastname'];
            $user->email = $_POST['suEmail'];
            $user->accessLevel = user::ACCESS_LEVEL_USER;
            $user->status = user::STATUS_ACTIVE;
            $user->preference = json_decode($user->defaultPreference);
            $user->save();
            if(empty($user->id))
                $data = array('status'=>'Error','message'=>"Not able to create new user. Please contact webmaster.");
            else {
                $user->updatePassword($_POST['suPassword']);
                $ucl = new user_channel_link();
                $ucl->addUserChannel($user, channel::getBy('id', 1));
                $_SESSION['user'] = $user;
                $data['status'] = "ok";
            }
        } else {
            $data = array('status'=>'Error','message'=>"Given email address has been used.");
        }
        break;

    default:
        header('HTTP/1.1 400 Bad Request');
        die(json_encode(array('status'=>'Error','message'=>'Unknown action')));
        break;
}

header('Content-type: application/json');
if(!empty($error))
{
    header('HTTP/1.1 500 Internal Server Error');
    die(json_encode($error));
}
die(json_encode($data));

