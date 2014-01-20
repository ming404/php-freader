<?php /*
 * This file is part of the PHP Freader version 1.1 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */ ?>
<?php include_once('../include/header.php');?>
<div class="root">
    <div class="appHeader">
        <div class="appHeaderLeft">
            <a href="index.php"><img src="img/favoicon_48x48x32.png" title="<?php echo SITE_NAME?>" style="margin-right:6px;"/> <span class="headtitle"><?php echo SITE_NAME?></span></a>
        </div>
        <div class="appHeaderRight">
            <ul>
                <li><a href="#" class="active" data-toggle="modal" data-target="#editPreferenceDlg"><span id="currentUser"><?php echo $user->email ?></span></a></li>
                <li><a href="#" class="active" data-toggle="modal" data-target="#editImportExportDlg"><i class="icon-wrench"></i></a></li>
                <?php if(defined('SITE_REQUIRE_LOGIN') && SITE_REQUIRE_LOGIN=="true"):?><li><a href="?action=logoff" class="active"><i class="icon-off"></i></a></li><?php endif?>
            </ul>
        </div>
    </div>
    <div class="topSection">
        <div class="btn-container" style="min-width:520px">
            <input type="text" name="searchText" id="searchText" placeholder="Search in your Freader..." class="input-medium search-query"/>
            <button type="button" class="btn btn-primary" id="searchBtn">Search</button>
        </div>
        <div class="btn-container">
            <div class="btn-group" data-toggle="buttons-radio">
                <button type="button" class="btn<?php echo $user->preference->mode=="all"?" active":""?>" onclick="setPreference('mode','all')">All<span class="hidable">&nbsp;Items</span></button>
                <button type="button" class="btn<?php echo $user->preference->mode=="unread"?" active":""?>" onclick="setPreference('mode','unread')">Unread<span class="hidable">&nbsp;Only</span></button>
            </div>
            <div class="btn-group" id="markreadBtnGroup">
                <button class="btn dropdown-toggle" data-toggle="dropdown" href="#">Mark<span class="hidable">&nbsp;Items&nbsp;As</span>&nbsp;Read&nbsp;<span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#" class="markRead" rel="all">All items</a></li>
                    <li><a href="#" class="markRead" rel="day">Items that are 1 day old</a></li>
                    <li><a href="#" class="markRead" rel="week">Items that are 1 week old</a></li>
                    <li><a href="#" class="markRead" rel="month">Items that are 1 month old</a></li>
                </ul>
            </div>
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown" href="#">Sort&nbsp;By&nbsp;<span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#" onclick="setPreference('sort','latest')">Newest first</a></li>
                    <li><a href="#" onclick="setPreference('sort','oldest')">Oldest first</a></li>
                </ul>
            </div>
            <div class="btn-group" id="tagBtnGroup" style="display:none">
                <button type="button" class="btn" id="editTagBtn" data-toggle="modal" data-target="#editTagDlg">Edit<span class="hidable">&nbsp;Tag</span></button>
                <button type="button" class="btn" id="removeTagBtn" data-toggle="modal" data-target="#removeTagDlg">Remove<span class="hidable">&nbsp;Tag</span></button>
            </div>
            <div class="btn-group">
                <button type="button" class="btn" id="newSubscription" data-toggle="modal" data-target="#newSubscriptionDlg">New<span class="hidable">&nbsp;Subscription</span></button>
            </div>
            <div class="btn-group" id="channelBtnGroup" style="display:none">
                <button type="button" class="btn" id="editChannelBtn" data-toggle="modal" data-target="#editChannelDlg">Edit<span class="hidable">&nbsp;Channel</span></button>
                <button type="button" class="btn" id="removeChannelBtn" data-toggle="modal" data-target="#removeChannelDlg">Unsubscribe</button>
            </div>
        </div>
    </div>
    <div class="bottomSection">
        <div class="navbar scrollable">
            <div class="navbarSettingsWrapper">
                <a href="javascript:void(0)" class="navbarSettings dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-cog"></i></a>
                <ul class="dropdown-menu navbarSettingsMenu">
                    <li><a tabindex="-1" href="#" id="expand">Expand All</a></li>
                    <li><a tabindex="-1" href="#" id="collapse">Collapse All</a></li>
                </ul>
            </div>
            <div id="channelList" class="navbarInner"></div>
        </div>
        <div class="feeds">
            <div class="channelTitle">
                <h3><span id="currentTitle">Loading...</span> »</h3>
            </div>
            <div class="feedContainer"></div>
        </div>
    </div>
</div>

<div id="editPreferenceDlg" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="editPreferenceLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="editPreferenceLabel">User Settings</h3>
  </div>
  <div class="modal-body" id="editPreferenceBody">
      <form class="form-horizontal" id="editPreferenceForm">
      <div class="control-group">
        <label class="control-label" for="inputEmail">First Name</label>
        <div class="controls">
          <input type="text" id="firstName" name="firstName" class="user-details input-medium" placeholder="First Name" value="<?php echo $user->firstName?>" required>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputPassword">Last Name</label>
        <div class="controls">
          <input type="text" id="lastName" name="lastName" class="user-details input-medium" placeholder="Last Name" value="<?php echo $user->lastName?>" required>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputPassword">Email</label>
        <div class="controls">
          <input type="email" id="email" name="email" class="user-details input-large" placeholder="test@domain.com" value="<?php echo $user->email?>" required>
        </div>
      </div>

      <div class="control-group">
        <p style="text-align: center"><i>Fill in passwords only if you like to reset your current password.</i></p>
        <label class="control-label" for="inputPassword">Password</label>
        <div class="controls">
          <input type="password" id="password" name="password" class="user-password input-medium" placeholder="New Password">
        </div>
        <div class="controls" style="margin-top:4px;">
          <input type="password" id="confirmPassword" class="user-password input-medium" placeholder="Confirm Password">
        </div>
      </div>
      </form>
  </div>
  <div class="modal-footer">
    <button class="btn btn-primary" id="saveSettings">Save</button>
  </div>
</div>

<div id="editImportExportDlg" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="editImportExportLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="editImportExportLabel">Import / Export</h3>
  </div>
  <div class="modal-body">
    <ul class="nav nav-tabs" id="userTab">
      <li class="active"><a href="#import">Import</a></li>
      <li><a href="#export">Export</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="import">
            <h4>Import</h4>
            <p>Please select OPML file to be imported into your Freader</p>
            <form class="form-horizontal">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="input-append">
                    <div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span></div><span class="btn btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span><input type="file" accept="text/xml" id="uploadedfile"/></span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                  </div>
                </div>
                <br/>
                <a class="btn" id="import-now" href="javascript:void(0)">Import Now</a>
                <span id="import-status"></span>
            </form>
        </div>
        <div class="tab-pane" id="export">
            <h4>Export</h4>
            <p>Please click button below to save all your subscribed feeds (including tags)</p>
            <a class="btn" href="?action=export-opml">Save Subscriptions</a>
        </div>
    </div>
  </div>
  <div class="modal-footer">
  </div>
</div>

<div id="newSubscriptionDlg" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Add New Subscription</h3>
  </div>
  <div class="modal-body">
    <p>Please enter the new subscription url:</p>
    <input type="text" id="newSubscriptionUrl" value="" style="width:98%"/>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary" id="saveNewSubscription">Save changes</button>
  </div>
</div>

<div id="editTagDlg" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="editTagLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="editTagLabel">Edit Tag</h3>
  </div>
  <div class="modal-body">
    <p>Tag name:</p>
    <input type="text" id="tagName" value="" style="width:98%"/>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary" id="saveTag">Save changes</button>
  </div>
</div>

<div id="removeTagDlg" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="removeTagLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="removeTagLabel">Remove Tag</h3>
  </div>
  <div class="modal-body">
    <h5>Are you sure you want to remove this tag?</h5>
    <label class="checkbox"><input type="checkbox" id="removeTagChannels"/>Also remove all channels in the tag</label>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">No</button>
    <button class="btn btn-primary" id="confirmRemoveTag">Yes</button>
  </div>
</div>

<div id="editChannelDlg" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="editChannelLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="editChannelLabel">Edit Channel</h3>
  </div>
  <div class="modal-body">
    <div class="alert" id="editChannelDlgUrlEmptyMsg" style="display:none">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Warning!</strong> Url cannot be empty.
    </div>
    <p>Tag:</p>
    <input type="text" id="newTagName" value="" style="width:98%" data-provide="typeahead"/>
    <p>Please enter the updated url:</p>
    <input type="text" id="subscriptionUrl" value="" style="width:98%"/>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary" id="saveChannel">Save changes</button>
  </div>
</div>

<div id="removeChannelDlg" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="removeChannelLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="removeChannelLabel">Unsubscribe</h3>
  </div>
  <div class="modal-body">
    <p>Are you sure you want to unsubscribe <b><span id="removeChannelName"></span></b>?</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">No</button>
    <button class="btn btn-primary" id="confirmRemoveChannel">Yes</button>
  </div>
</div>

<div id="ajaxLoader" style="display:hidden"><img src="img/loading.gif"/></div>
<?php include_once('../include/footer.php');