  


<!DOCTYPE html>
<html>
  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# githubog: http://ogp.me/ns/fb/githubog#">
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>ezSQL/readme.txt at master · jv2222/ezSQL</title>
    <link rel="search" type="application/opensearchdescription+xml" href="/opensearch.xml" title="GitHub" />
    <link rel="fluid-icon" href="https://github.com/fluidicon.png" title="GitHub" />
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-114.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-144.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144.png" />
    <link rel="logo" type="image/svg" href="http://github-media-downloads.s3.amazonaws.com/github-logo.svg" />
    <meta name="msapplication-TileImage" content="/windows-tile.png">
    <meta name="msapplication-TileColor" content="#ffffff">

    
    
    <link rel="icon" type="image/x-icon" href="/favicon.ico" />

    <meta content="authenticity_token" name="csrf-param" />
<meta content="0VBWvz39XR/M496BVCRgrvxLknlo9bGt8Mqhzy7TFFE=" name="csrf-token" />

    <link href="https://a248.e.akamai.net/assets.github.com/assets/github-c1b7909016a1df6d546eebce65d605438c51f5c7.css" media="all" rel="stylesheet" type="text/css" />
    <link href="https://a248.e.akamai.net/assets.github.com/assets/github2-a70d440e2e461f87b4e7a06e02fbe906a55b49b5.css" media="all" rel="stylesheet" type="text/css" />
    


      <script src="https://a248.e.akamai.net/assets.github.com/assets/frameworks-d76b58e749b52bc47a4c46620bf2c320fabe5248.js" type="text/javascript"></script>
      <script src="https://a248.e.akamai.net/assets.github.com/assets/github-bc24a03e43b13c54969f05228849f804fda1b806.js" type="text/javascript"></script>
      
      <meta http-equiv="x-pjax-version" content="66b88c7db22db852b164ad07a8656f79">

        <link data-pjax-transient rel='permalink' href='/jv2222/ezSQL/blob/589ed00f0156cac09c8b784d79792972a130d603/readme.txt'>
    <meta property="og:title" content="ezSQL"/>
    <meta property="og:type" content="githubog:gitrepository"/>
    <meta property="og:url" content="https://github.com/jv2222/ezSQL"/>
    <meta property="og:image" content="https://secure.gravatar.com/avatar/ad3088f5d2a6743d46bb1ba90f3641cf?s=420&amp;d=https://a248.e.akamai.net/assets.github.com%2Fimages%2Fgravatars%2Fgravatar-user-420.png"/>
    <meta property="og:site_name" content="GitHub"/>
    <meta property="og:description" content="ezSQL - PHP class to make interacting with a database ridiculusly easy"/>
    <meta property="twitter:card" content="summary"/>
    <meta property="twitter:site" content="@GitHub">
    <meta property="twitter:title" content="jv2222/ezSQL"/>

    <meta name="description" content="ezSQL - PHP class to make interacting with a database ridiculusly easy" />

  <link href="https://github.com/jv2222/ezSQL/commits/master.atom" rel="alternate" title="Recent Commits to ezSQL:master" type="application/atom+xml" />

  </head>


  <body class="logged_in page-blob windows vis-public env-production  ">
    <div id="wrapper">

      

      

      

      


        <div class="header header-logged-in true">
          <div class="container clearfix">

            <a class="header-logo-blacktocat" href="https://github.com/">
  <span class="mega-icon mega-icon-blacktocat"></span>
</a>

            <div class="divider-vertical"></div>

              <a href="/notifications" class="notification-indicator tooltipped downwards" title="You have no unread notifications">
    <span class="mail-status all-read"></span>
  </a>
  <div class="divider-vertical"></div>


              <div class="command-bar js-command-bar  ">
      <form accept-charset="UTF-8" action="/search" class="command-bar-form" id="top_search_form" method="get">
  <a href="/search/advanced" class="advanced-search-icon tooltipped downwards command-bar-search" id="advanced_search" title="Advanced search"><span class="mini-icon mini-icon-advanced-search "></span></a>

  <input type="text" name="q" id="js-command-bar-field" placeholder="Search or type a command" tabindex="1" data-username="kmteoh" autocapitalize="off">

  <span class="mini-icon help tooltipped downwards" title="Show command bar help">
    <span class="mini-icon mini-icon-help"></span>
  </span>

  <input type="hidden" name="ref" value="commandbar">

  <div class="divider-vertical"></div>
</form>
  <ul class="top-nav">
      <li class="explore"><a href="https://github.com/explore">Explore</a></li>
      <li><a href="https://gist.github.com">Gist</a></li>
      <li><a href="/blog">Blog</a></li>
    <li><a href="http://help.github.com">Help</a></li>
  </ul>
</div>


            

  
    <ul id="user-links">
      <li>
        <a href="https://github.com/kmteoh" class="name">
          <img height="20" src="https://secure.gravatar.com/avatar/e5fc3e6ba81ab4dcbd8c94f53f6251f2?s=140&amp;d=https://a248.e.akamai.net/assets.github.com%2Fimages%2Fgravatars%2Fgravatar-user-420.png" width="20" /> kmteoh
        </a>
      </li>
      <li>
        <a href="/new" id="new_repo" class="tooltipped downwards" title="Create a new repo">
          <span class="mini-icon mini-icon-create"></span>
        </a>
      </li>
      <li>
        <a href="/settings/profile" id="account_settings"
          class="tooltipped downwards"
          title="Account settings ">
          <span class="mini-icon mini-icon-account-settings"></span>
        </a>
      </li>
      <li>
        <a href="/logout" data-method="post" id="logout" class="tooltipped downwards" title="Sign out">
          <span class="mini-icon mini-icon-logout"></span>
        </a>
      </li>
    </ul>



            
          </div>
        </div>


      

      


            <div class="site hfeed" itemscope itemtype="http://schema.org/WebPage">
      <div class="hentry">
        
        <div class="pagehead repohead instapaper_ignore readability-menu ">
          <div class="container">
            <div class="title-actions-bar">
              


<ul class="pagehead-actions">


    <li class="subscription">
      <form accept-charset="UTF-8" action="/notifications/subscribe" data-autosubmit="true" data-remote="true" method="post"><div style="margin:0;padding:0;display:inline"><input name="authenticity_token" type="hidden" value="0VBWvz39XR/M496BVCRgrvxLknlo9bGt8Mqhzy7TFFE=" /></div>  <input id="repository_id" name="repository_id" type="hidden" value="3337723" />

    <div class="select-menu js-menu-container js-select-menu">
      <span class="minibutton select-menu-button js-menu-target">
        <span class="js-select-button">
          <span class="mini-icon mini-icon-watching"></span>
          Watch
        </span>
      </span>

      <div class="select-menu-modal-holder js-menu-content">
        <div class="select-menu-modal">
          <div class="select-menu-header">
            <span class="select-menu-title">Notification status</span>
            <span class="mini-icon mini-icon-remove-close js-menu-close"></span>
          </div> <!-- /.select-menu-header -->

          <div class="select-menu-list js-navigation-container">

            <div class="select-menu-item js-navigation-item js-navigation-target selected">
              <span class="select-menu-item-icon mini-icon mini-icon-confirm"></span>
              <div class="select-menu-item-text">
                <input checked="checked" id="do_included" name="do" type="radio" value="included" />
                <h4>Not watching</h4>
                <span class="description">You only receive notifications for discussions in which you participate or are @mentioned.</span>
                <span class="js-select-button-text hidden-select-button-text">
                  <span class="mini-icon mini-icon-watching"></span>
                  Watch
                </span>
              </div>
            </div> <!-- /.select-menu-item -->

            <div class="select-menu-item js-navigation-item js-navigation-target ">
              <span class="select-menu-item-icon mini-icon mini-icon-confirm"></span>
              <div class="select-menu-item-text">
                <input id="do_subscribed" name="do" type="radio" value="subscribed" />
                <h4>Watching</h4>
                <span class="description">You receive notifications for all discussions in this repository.</span>
                <span class="js-select-button-text hidden-select-button-text">
                  <span class="mini-icon mini-icon-unwatch"></span>
                  Unwatch
                </span>
              </div>
            </div> <!-- /.select-menu-item -->

            <div class="select-menu-item js-navigation-item js-navigation-target ">
              <span class="select-menu-item-icon mini-icon mini-icon-confirm"></span>
              <div class="select-menu-item-text">
                <input id="do_ignore" name="do" type="radio" value="ignore" />
                <h4>Ignoring</h4>
                <span class="description">You do not receive any notifications for discussions in this repository.</span>
                <span class="js-select-button-text hidden-select-button-text">
                  <span class="mini-icon mini-icon-mute"></span>
                  Stop ignoring
                </span>
              </div>
            </div> <!-- /.select-menu-item -->

          </div> <!-- /.select-menu-list -->

        </div> <!-- /.select-menu-modal -->
      </div> <!-- /.select-menu-modal-holder -->
    </div> <!-- /.select-menu -->

</form>
    </li>

    <li class="js-toggler-container js-social-container starring-container ">
      <a href="/jv2222/ezSQL/unstar" class="minibutton js-toggler-target star-button starred upwards" title="Unstar this repo" data-remote="true" data-method="post" rel="nofollow">
        <span class="mini-icon mini-icon-remove-star"></span>
        <span class="text">Unstar</span>
      </a>
      <a href="/jv2222/ezSQL/star" class="minibutton js-toggler-target star-button unstarred upwards" title="Star this repo" data-remote="true" data-method="post" rel="nofollow">
        <span class="mini-icon mini-icon-star"></span>
        <span class="text">Star</span>
      </a>
      <a class="social-count js-social-count" href="/jv2222/ezSQL/stargazers">183</a>
    </li>

        <li>
          <a href="/jv2222/ezSQL/fork" class="minibutton js-toggler-target fork-button lighter upwards" title="Fork this repo" rel="nofollow" data-method="post">
            <span class="mini-icon mini-icon-branch-create"></span>
            <span class="text">Fork</span>
          </a>
          <a href="/jv2222/ezSQL/network" class="social-count">54</a>
        </li>


</ul>

              <h1 itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="entry-title public">
                <span class="repo-label"><span>public</span></span>
                <span class="mega-icon mega-icon-public-repo"></span>
                <span class="author vcard">
                  <a href="/jv2222" class="url fn" itemprop="url" rel="author">
                  <span itemprop="title">jv2222</span>
                  </a></span> /
                <strong><a href="/jv2222/ezSQL" class="js-current-repository">ezSQL</a></strong>
              </h1>
            </div>

            
  <ul class="tabs">
    <li><a href="/jv2222/ezSQL" class="selected" highlight="repo_source repo_downloads repo_commits repo_tags repo_branches">Code</a></li>
    <li><a href="/jv2222/ezSQL/network" highlight="repo_network">Network</a></li>
    <li><a href="/jv2222/ezSQL/pulls" highlight="repo_pulls">Pull Requests <span class='counter'>6</span></a></li>

      <li><a href="/jv2222/ezSQL/issues" highlight="repo_issues">Issues <span class='counter'>11</span></a></li>

      <li><a href="/jv2222/ezSQL/wiki" highlight="repo_wiki">Wiki</a></li>


    <li><a href="/jv2222/ezSQL/graphs" highlight="repo_graphs repo_contributors">Graphs</a></li>


  </ul>
  
<div class="tabnav">

  <span class="tabnav-right">
    <ul class="tabnav-tabs">
          <li><a href="/jv2222/ezSQL/tags" class="tabnav-tab" highlight="repo_tags">Tags <span class="counter blank">0</span></a></li>
    </ul>
    
  </span>

  <div class="tabnav-widget scope">


    <div class="select-menu js-menu-container js-select-menu js-branch-menu">
      <a class="minibutton select-menu-button js-menu-target" data-hotkey="w" data-ref="master">
        <span class="mini-icon mini-icon-branch"></span>
        <i>branch:</i>
        <span class="js-select-button">master</span>
      </a>

      <div class="select-menu-modal-holder js-menu-content js-navigation-container">

        <div class="select-menu-modal">
          <div class="select-menu-header">
            <span class="select-menu-title">Switch branches/tags</span>
            <span class="mini-icon mini-icon-remove-close js-menu-close"></span>
          </div> <!-- /.select-menu-header -->

          <div class="select-menu-filters">
            <div class="select-menu-text-filter">
              <input type="text" id="commitish-filter-field" class="js-filterable-field js-navigation-enable" placeholder="Filter branches/tags">
            </div>
            <div class="select-menu-tabs">
              <ul>
                <li class="select-menu-tab">
                  <a href="#" data-tab-filter="branches" class="js-select-menu-tab">Branches</a>
                </li>
                <li class="select-menu-tab">
                  <a href="#" data-tab-filter="tags" class="js-select-menu-tab">Tags</a>
                </li>
              </ul>
            </div><!-- /.select-menu-tabs -->
          </div><!-- /.select-menu-filters -->

          <div class="select-menu-list select-menu-tab-bucket js-select-menu-tab-bucket css-truncate" data-tab-filter="branches">

            <div data-filterable-for="commitish-filter-field" data-filterable-type="substring">

                <div class="select-menu-item js-navigation-item js-navigation-target selected">
                  <span class="select-menu-item-icon mini-icon mini-icon-confirm"></span>
                  <a href="/jv2222/ezSQL/blob/master/readme.txt" class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target" data-name="master" rel="nofollow" title="master">master</a>
                </div> <!-- /.select-menu-item -->
            </div>

              <div class="select-menu-no-results">Nothing to show</div>
          </div> <!-- /.select-menu-list -->


          <div class="select-menu-list select-menu-tab-bucket js-select-menu-tab-bucket css-truncate" data-tab-filter="tags">
            <div data-filterable-for="commitish-filter-field" data-filterable-type="substring">

            </div>

            <div class="select-menu-no-results">Nothing to show</div>

          </div> <!-- /.select-menu-list -->

        </div> <!-- /.select-menu-modal -->
      </div> <!-- /.select-menu-modal-holder -->
    </div> <!-- /.select-menu -->

  </div> <!-- /.scope -->

  <ul class="tabnav-tabs">
    <li><a href="/jv2222/ezSQL" class="selected tabnav-tab" highlight="repo_source">Files</a></li>
    <li><a href="/jv2222/ezSQL/commits/master" class="tabnav-tab" highlight="repo_commits">Commits</a></li>
    <li><a href="/jv2222/ezSQL/branches" class="tabnav-tab" highlight="repo_branches" rel="nofollow">Branches <span class="counter ">1</span></a></li>
  </ul>

</div>

  
  
  


            
          </div>
        </div><!-- /.repohead -->

        <div id="js-repo-pjax-container" class="container context-loader-container" data-pjax-container>
          


<!-- blob contrib key: blob_contributors:v21:9f736a0737787ed30c5dd2af207b0448 -->
<!-- blob contrib frag key: views10/v8/blob_contributors:v21:9f736a0737787ed30c5dd2af207b0448 -->


<div id="slider">
    <div class="frame-meta">

      <p title="This is a placeholder element" class="js-history-link-replace hidden"></p>

        <div class="breadcrumb">
          <span class='bold'><span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/jv2222/ezSQL" class="js-slide-to" data-branch="master" data-direction="back" itemscope="url"><span itemprop="title">ezSQL</span></a></span></span><span class="separator"> / </span><strong class="final-path">readme.txt</strong> <span class="js-zeroclipboard zeroclipboard-button" data-clipboard-text="readme.txt" data-copied-hint="copied!" title="copy to clipboard"><span class="mini-icon mini-icon-clipboard"></span></span>
        </div>

      <a href="/jv2222/ezSQL/find/master" class="js-slide-to" data-hotkey="t" style="display:none">Show File Finder</a>


        
  <div class="commit file-history-tease">
    <img class="main-avatar" height="24" src="https://secure.gravatar.com/avatar/ad3088f5d2a6743d46bb1ba90f3641cf?s=140&amp;d=https://a248.e.akamai.net/assets.github.com%2Fimages%2Fgravatars%2Fgravatar-user-420.png" width="24" />
    <span class="author"><a href="/jv2222" rel="author">jv2222</a></span>
    <time class="js-relative-date" datetime="2012-10-15T20:05:45-07:00" title="2012-10-15 20:05:45">October 15, 2012</time>
    <div class="commit-title">
        <a href="/jv2222/ezSQL/commit/7e48143cd54533d93b71409699ce7eb53c867e0f" class="message">Added hint about change log</a>
    </div>

    <div class="participation">
      <p class="quickstat"><a href="#blob_contributors_box" rel="facebox"><strong>1</strong> contributor</a></p>
      
    </div>
    <div id="blob_contributors_box" style="display:none">
      <h2>Users on GitHub who have contributed to this file</h2>
      <ul class="facebox-user-list">
        <li>
          <img height="24" src="https://secure.gravatar.com/avatar/ad3088f5d2a6743d46bb1ba90f3641cf?s=140&amp;d=https://a248.e.akamai.net/assets.github.com%2Fimages%2Fgravatars%2Fgravatar-user-420.png" width="24" />
          <a href="/jv2222">jv2222</a>
        </li>
      </ul>
    </div>
  </div>


    </div><!-- ./.frame-meta -->

    <div class="frames">
      <div class="frame" data-permalink-url="/jv2222/ezSQL/blob/589ed00f0156cac09c8b784d79792972a130d603/readme.txt" data-title="ezSQL/readme.txt at master · jv2222/ezSQL · GitHub" data-type="blob">

        <div id="files" class="bubble">
          <div class="file">
            <div class="meta">
              <div class="info">
                <span class="icon"><b class="mini-icon mini-icon-text-file"></b></span>
                <span class="mode" title="File Mode">executable file</span>
                  <span>302 lines (193 sloc)</span>
                <span>9.537 kb</span>
              </div>
              <div class="actions">
                <div class="button-group">
                        <a class="minibutton tooltipped leftwards"
                           title="Clicking this button will automatically fork this project so you can edit the file"
                           href="/jv2222/ezSQL/edit/master/readme.txt"
                           data-method="post" rel="nofollow">Edit</a>
                  <a href="/jv2222/ezSQL/raw/master/readme.txt" class="button minibutton " id="raw-url">Raw</a>
                    <a href="/jv2222/ezSQL/blame/master/readme.txt" class="button minibutton ">Blame</a>
                  <a href="/jv2222/ezSQL/commits/master/readme.txt" class="button minibutton " rel="nofollow">History</a>
                </div><!-- /.button-group -->
              </div><!-- /.actions -->

            </div>
                <div class="data type-text js-blob-data">
      <table cellpadding="0" cellspacing="0" class="lines">
        <tr>
          <td>
            <pre class="line_numbers"><span id="L1" rel="#L1">1</span>
<span id="L2" rel="#L2">2</span>
<span id="L3" rel="#L3">3</span>
<span id="L4" rel="#L4">4</span>
<span id="L5" rel="#L5">5</span>
<span id="L6" rel="#L6">6</span>
<span id="L7" rel="#L7">7</span>
<span id="L8" rel="#L8">8</span>
<span id="L9" rel="#L9">9</span>
<span id="L10" rel="#L10">10</span>
<span id="L11" rel="#L11">11</span>
<span id="L12" rel="#L12">12</span>
<span id="L13" rel="#L13">13</span>
<span id="L14" rel="#L14">14</span>
<span id="L15" rel="#L15">15</span>
<span id="L16" rel="#L16">16</span>
<span id="L17" rel="#L17">17</span>
<span id="L18" rel="#L18">18</span>
<span id="L19" rel="#L19">19</span>
<span id="L20" rel="#L20">20</span>
<span id="L21" rel="#L21">21</span>
<span id="L22" rel="#L22">22</span>
<span id="L23" rel="#L23">23</span>
<span id="L24" rel="#L24">24</span>
<span id="L25" rel="#L25">25</span>
<span id="L26" rel="#L26">26</span>
<span id="L27" rel="#L27">27</span>
<span id="L28" rel="#L28">28</span>
<span id="L29" rel="#L29">29</span>
<span id="L30" rel="#L30">30</span>
<span id="L31" rel="#L31">31</span>
<span id="L32" rel="#L32">32</span>
<span id="L33" rel="#L33">33</span>
<span id="L34" rel="#L34">34</span>
<span id="L35" rel="#L35">35</span>
<span id="L36" rel="#L36">36</span>
<span id="L37" rel="#L37">37</span>
<span id="L38" rel="#L38">38</span>
<span id="L39" rel="#L39">39</span>
<span id="L40" rel="#L40">40</span>
<span id="L41" rel="#L41">41</span>
<span id="L42" rel="#L42">42</span>
<span id="L43" rel="#L43">43</span>
<span id="L44" rel="#L44">44</span>
<span id="L45" rel="#L45">45</span>
<span id="L46" rel="#L46">46</span>
<span id="L47" rel="#L47">47</span>
<span id="L48" rel="#L48">48</span>
<span id="L49" rel="#L49">49</span>
<span id="L50" rel="#L50">50</span>
<span id="L51" rel="#L51">51</span>
<span id="L52" rel="#L52">52</span>
<span id="L53" rel="#L53">53</span>
<span id="L54" rel="#L54">54</span>
<span id="L55" rel="#L55">55</span>
<span id="L56" rel="#L56">56</span>
<span id="L57" rel="#L57">57</span>
<span id="L58" rel="#L58">58</span>
<span id="L59" rel="#L59">59</span>
<span id="L60" rel="#L60">60</span>
<span id="L61" rel="#L61">61</span>
<span id="L62" rel="#L62">62</span>
<span id="L63" rel="#L63">63</span>
<span id="L64" rel="#L64">64</span>
<span id="L65" rel="#L65">65</span>
<span id="L66" rel="#L66">66</span>
<span id="L67" rel="#L67">67</span>
<span id="L68" rel="#L68">68</span>
<span id="L69" rel="#L69">69</span>
<span id="L70" rel="#L70">70</span>
<span id="L71" rel="#L71">71</span>
<span id="L72" rel="#L72">72</span>
<span id="L73" rel="#L73">73</span>
<span id="L74" rel="#L74">74</span>
<span id="L75" rel="#L75">75</span>
<span id="L76" rel="#L76">76</span>
<span id="L77" rel="#L77">77</span>
<span id="L78" rel="#L78">78</span>
<span id="L79" rel="#L79">79</span>
<span id="L80" rel="#L80">80</span>
<span id="L81" rel="#L81">81</span>
<span id="L82" rel="#L82">82</span>
<span id="L83" rel="#L83">83</span>
<span id="L84" rel="#L84">84</span>
<span id="L85" rel="#L85">85</span>
<span id="L86" rel="#L86">86</span>
<span id="L87" rel="#L87">87</span>
<span id="L88" rel="#L88">88</span>
<span id="L89" rel="#L89">89</span>
<span id="L90" rel="#L90">90</span>
<span id="L91" rel="#L91">91</span>
<span id="L92" rel="#L92">92</span>
<span id="L93" rel="#L93">93</span>
<span id="L94" rel="#L94">94</span>
<span id="L95" rel="#L95">95</span>
<span id="L96" rel="#L96">96</span>
<span id="L97" rel="#L97">97</span>
<span id="L98" rel="#L98">98</span>
<span id="L99" rel="#L99">99</span>
<span id="L100" rel="#L100">100</span>
<span id="L101" rel="#L101">101</span>
<span id="L102" rel="#L102">102</span>
<span id="L103" rel="#L103">103</span>
<span id="L104" rel="#L104">104</span>
<span id="L105" rel="#L105">105</span>
<span id="L106" rel="#L106">106</span>
<span id="L107" rel="#L107">107</span>
<span id="L108" rel="#L108">108</span>
<span id="L109" rel="#L109">109</span>
<span id="L110" rel="#L110">110</span>
<span id="L111" rel="#L111">111</span>
<span id="L112" rel="#L112">112</span>
<span id="L113" rel="#L113">113</span>
<span id="L114" rel="#L114">114</span>
<span id="L115" rel="#L115">115</span>
<span id="L116" rel="#L116">116</span>
<span id="L117" rel="#L117">117</span>
<span id="L118" rel="#L118">118</span>
<span id="L119" rel="#L119">119</span>
<span id="L120" rel="#L120">120</span>
<span id="L121" rel="#L121">121</span>
<span id="L122" rel="#L122">122</span>
<span id="L123" rel="#L123">123</span>
<span id="L124" rel="#L124">124</span>
<span id="L125" rel="#L125">125</span>
<span id="L126" rel="#L126">126</span>
<span id="L127" rel="#L127">127</span>
<span id="L128" rel="#L128">128</span>
<span id="L129" rel="#L129">129</span>
<span id="L130" rel="#L130">130</span>
<span id="L131" rel="#L131">131</span>
<span id="L132" rel="#L132">132</span>
<span id="L133" rel="#L133">133</span>
<span id="L134" rel="#L134">134</span>
<span id="L135" rel="#L135">135</span>
<span id="L136" rel="#L136">136</span>
<span id="L137" rel="#L137">137</span>
<span id="L138" rel="#L138">138</span>
<span id="L139" rel="#L139">139</span>
<span id="L140" rel="#L140">140</span>
<span id="L141" rel="#L141">141</span>
<span id="L142" rel="#L142">142</span>
<span id="L143" rel="#L143">143</span>
<span id="L144" rel="#L144">144</span>
<span id="L145" rel="#L145">145</span>
<span id="L146" rel="#L146">146</span>
<span id="L147" rel="#L147">147</span>
<span id="L148" rel="#L148">148</span>
<span id="L149" rel="#L149">149</span>
<span id="L150" rel="#L150">150</span>
<span id="L151" rel="#L151">151</span>
<span id="L152" rel="#L152">152</span>
<span id="L153" rel="#L153">153</span>
<span id="L154" rel="#L154">154</span>
<span id="L155" rel="#L155">155</span>
<span id="L156" rel="#L156">156</span>
<span id="L157" rel="#L157">157</span>
<span id="L158" rel="#L158">158</span>
<span id="L159" rel="#L159">159</span>
<span id="L160" rel="#L160">160</span>
<span id="L161" rel="#L161">161</span>
<span id="L162" rel="#L162">162</span>
<span id="L163" rel="#L163">163</span>
<span id="L164" rel="#L164">164</span>
<span id="L165" rel="#L165">165</span>
<span id="L166" rel="#L166">166</span>
<span id="L167" rel="#L167">167</span>
<span id="L168" rel="#L168">168</span>
<span id="L169" rel="#L169">169</span>
<span id="L170" rel="#L170">170</span>
<span id="L171" rel="#L171">171</span>
<span id="L172" rel="#L172">172</span>
<span id="L173" rel="#L173">173</span>
<span id="L174" rel="#L174">174</span>
<span id="L175" rel="#L175">175</span>
<span id="L176" rel="#L176">176</span>
<span id="L177" rel="#L177">177</span>
<span id="L178" rel="#L178">178</span>
<span id="L179" rel="#L179">179</span>
<span id="L180" rel="#L180">180</span>
<span id="L181" rel="#L181">181</span>
<span id="L182" rel="#L182">182</span>
<span id="L183" rel="#L183">183</span>
<span id="L184" rel="#L184">184</span>
<span id="L185" rel="#L185">185</span>
<span id="L186" rel="#L186">186</span>
<span id="L187" rel="#L187">187</span>
<span id="L188" rel="#L188">188</span>
<span id="L189" rel="#L189">189</span>
<span id="L190" rel="#L190">190</span>
<span id="L191" rel="#L191">191</span>
<span id="L192" rel="#L192">192</span>
<span id="L193" rel="#L193">193</span>
<span id="L194" rel="#L194">194</span>
<span id="L195" rel="#L195">195</span>
<span id="L196" rel="#L196">196</span>
<span id="L197" rel="#L197">197</span>
<span id="L198" rel="#L198">198</span>
<span id="L199" rel="#L199">199</span>
<span id="L200" rel="#L200">200</span>
<span id="L201" rel="#L201">201</span>
<span id="L202" rel="#L202">202</span>
<span id="L203" rel="#L203">203</span>
<span id="L204" rel="#L204">204</span>
<span id="L205" rel="#L205">205</span>
<span id="L206" rel="#L206">206</span>
<span id="L207" rel="#L207">207</span>
<span id="L208" rel="#L208">208</span>
<span id="L209" rel="#L209">209</span>
<span id="L210" rel="#L210">210</span>
<span id="L211" rel="#L211">211</span>
<span id="L212" rel="#L212">212</span>
<span id="L213" rel="#L213">213</span>
<span id="L214" rel="#L214">214</span>
<span id="L215" rel="#L215">215</span>
<span id="L216" rel="#L216">216</span>
<span id="L217" rel="#L217">217</span>
<span id="L218" rel="#L218">218</span>
<span id="L219" rel="#L219">219</span>
<span id="L220" rel="#L220">220</span>
<span id="L221" rel="#L221">221</span>
<span id="L222" rel="#L222">222</span>
<span id="L223" rel="#L223">223</span>
<span id="L224" rel="#L224">224</span>
<span id="L225" rel="#L225">225</span>
<span id="L226" rel="#L226">226</span>
<span id="L227" rel="#L227">227</span>
<span id="L228" rel="#L228">228</span>
<span id="L229" rel="#L229">229</span>
<span id="L230" rel="#L230">230</span>
<span id="L231" rel="#L231">231</span>
<span id="L232" rel="#L232">232</span>
<span id="L233" rel="#L233">233</span>
<span id="L234" rel="#L234">234</span>
<span id="L235" rel="#L235">235</span>
<span id="L236" rel="#L236">236</span>
<span id="L237" rel="#L237">237</span>
<span id="L238" rel="#L238">238</span>
<span id="L239" rel="#L239">239</span>
<span id="L240" rel="#L240">240</span>
<span id="L241" rel="#L241">241</span>
<span id="L242" rel="#L242">242</span>
<span id="L243" rel="#L243">243</span>
<span id="L244" rel="#L244">244</span>
<span id="L245" rel="#L245">245</span>
<span id="L246" rel="#L246">246</span>
<span id="L247" rel="#L247">247</span>
<span id="L248" rel="#L248">248</span>
<span id="L249" rel="#L249">249</span>
<span id="L250" rel="#L250">250</span>
<span id="L251" rel="#L251">251</span>
<span id="L252" rel="#L252">252</span>
<span id="L253" rel="#L253">253</span>
<span id="L254" rel="#L254">254</span>
<span id="L255" rel="#L255">255</span>
<span id="L256" rel="#L256">256</span>
<span id="L257" rel="#L257">257</span>
<span id="L258" rel="#L258">258</span>
<span id="L259" rel="#L259">259</span>
<span id="L260" rel="#L260">260</span>
<span id="L261" rel="#L261">261</span>
<span id="L262" rel="#L262">262</span>
<span id="L263" rel="#L263">263</span>
<span id="L264" rel="#L264">264</span>
<span id="L265" rel="#L265">265</span>
<span id="L266" rel="#L266">266</span>
<span id="L267" rel="#L267">267</span>
<span id="L268" rel="#L268">268</span>
<span id="L269" rel="#L269">269</span>
<span id="L270" rel="#L270">270</span>
<span id="L271" rel="#L271">271</span>
<span id="L272" rel="#L272">272</span>
<span id="L273" rel="#L273">273</span>
<span id="L274" rel="#L274">274</span>
<span id="L275" rel="#L275">275</span>
<span id="L276" rel="#L276">276</span>
<span id="L277" rel="#L277">277</span>
<span id="L278" rel="#L278">278</span>
<span id="L279" rel="#L279">279</span>
<span id="L280" rel="#L280">280</span>
<span id="L281" rel="#L281">281</span>
<span id="L282" rel="#L282">282</span>
<span id="L283" rel="#L283">283</span>
<span id="L284" rel="#L284">284</span>
<span id="L285" rel="#L285">285</span>
<span id="L286" rel="#L286">286</span>
<span id="L287" rel="#L287">287</span>
<span id="L288" rel="#L288">288</span>
<span id="L289" rel="#L289">289</span>
<span id="L290" rel="#L290">290</span>
<span id="L291" rel="#L291">291</span>
<span id="L292" rel="#L292">292</span>
<span id="L293" rel="#L293">293</span>
<span id="L294" rel="#L294">294</span>
<span id="L295" rel="#L295">295</span>
<span id="L296" rel="#L296">296</span>
<span id="L297" rel="#L297">297</span>
<span id="L298" rel="#L298">298</span>
<span id="L299" rel="#L299">299</span>
<span id="L300" rel="#L300">300</span>
<span id="L301" rel="#L301">301</span>
</pre>
          </td>
          <td width="100%">
                  <div class="highlight"><pre><div class='line' id='LC1'>=======================================================================</div><div class='line' id='LC2'>Author: Justin Vincent - http://justinvincent.com/ezsql</div><div class='line' id='LC3'>Name: ezSQL</div><div class='line' id='LC4'>Desc: Class to make it very easy to deal with database connections.</div><div class='line' id='LC5'>License: FREE / Donation (LGPL - You may do what you like with ezSQL - no exceptions.)</div><div class='line' id='LC6'>=======================================================================</div><div class='line' id='LC7'><br/></div><div class='line' id='LC8'>Follow me on twitter:</div><div class='line' id='LC9'>http://twitter.com/justinvincent</div><div class='line' id='LC10'><br/></div><div class='line' id='LC11'>Check out my podcast TechZing where we talk about tech and tech startups:</div><div class='line' id='LC12'>http://techzinglive.com</div><div class='line' id='LC13'><br/></div><div class='line' id='LC14'>=======================================================================</div><div class='line' id='LC15'><br/></div><div class='line' id='LC16'>Change Log:</div><div class='line' id='LC17'><br/></div><div class='line' id='LC18'>Note: This change log isn&#39;t being used any more due to automated github tracking</div><div class='line' id='LC19'><br/></div><div class='line' id='LC20'>2.17 - Updates to ezSQL_postgresql (thx Stefanie Janine Stoelting)</div><div class='line' id='LC21'><br/></div><div class='line' id='LC22'>2.16 - Added profiling functions to mySQL version &amp; added fix to stop mySQL hanging on very long runnign scripts</div><div class='line' id='LC23'><br/></div><div class='line' id='LC24'>2.15 - Fixed long standing bug with $db-&gt;rows_affected (thx Pere Pasqual)</div><div class='line' id='LC25'><br/></div><div class='line' id='LC26'>2.14 - Added sybase connector by Muhammad Iyas</div><div class='line' id='LC27'><br/></div><div class='line' id='LC28'>2.13 - Support for transations. See: http://stackoverflow.com/questions/8754215/ezsql-with-multiple-queries/8781798</div><div class='line' id='LC29'><br/></div><div class='line' id='LC30'>2.12 - Added $db-&gt;get_set() - Creates a SET nvp sql string from an associative array (and escapes all values)</div><div class='line' id='LC31'><br/></div><div class='line' id='LC32'>2.11 - Fixed $db-&gt;insert_id in postgress version</div><div class='line' id='LC33'><br/></div><div class='line' id='LC34'>2.10 - Added isset($this-&gt;dbh) check to orcale version</div><div class='line' id='LC35'><br/></div><div class='line' id='LC36'>2.09 - Fixed issues with mysql_real_escape_string not woirkign if no connection </div><div class='line' id='LC37'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Thanks to Nicolas Vannier)</div><div class='line' id='LC38'><br/></div><div class='line' id='LC39'>2.08 - Re-added timer functions that seemed to have disappeared</div><div class='line' id='LC40'><br/></div><div class='line' id='LC41'>2.07 - Used mysql_real_escape_string instead of mysql_escape_string</div><div class='line' id='LC42'><br/></div><div class='line' id='LC43'>2.02 - Please note, this change log is no longer being used</div><div class='line' id='LC44'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;please see change_log.htm for changes later than</div><div class='line' id='LC45'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.02</div><div class='line' id='LC46'><br/></div><div class='line' id='LC47'>2.01 - Added Disk Caching &amp; Multiple DB connection support</div><div class='line' id='LC48'><br/></div><div class='line' id='LC49'>2.00 - Re-factored ezSQL for Oracle, mySQL &amp; SQLite</div><div class='line' id='LC50'><br/></div><div class='line' id='LC51'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- DB Object is no longer initialized by default</div><div class='line' id='LC52'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(makes it easier to use multiple connections)</div><div class='line' id='LC53'><br/></div><div class='line' id='LC54'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Core ezSQL functions have been separated from DB</div><div class='line' id='LC55'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;specific functions (makes it easier to add new databases)</div><div class='line' id='LC56'><br/></div><div class='line' id='LC57'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Errors are being piped through trigger_error</div><div class='line' id='LC58'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(using standard PHP error logging)</div><div class='line' id='LC59'><br/></div><div class='line' id='LC60'>		- Abstracted error messages (enabling future translation)</div><div class='line' id='LC61'><br/></div><div class='line' id='LC62'>		- Upgraded $db-&gt;query error return functionality</div><div class='line' id='LC63'><br/></div><div class='line' id='LC64'>		- Added $db-&gt;systdate function to abstract mySQL NOW()</div><div class='line' id='LC65'>		  and Oracle SYSDATE</div><div class='line' id='LC66'><br/></div><div class='line' id='LC67'>		Note: For other DB Types please use version 1.26</div><div class='line' id='LC68'><br/></div><div class='line' id='LC69'>1.26 - Update (All)</div><div class='line' id='LC70'><br/></div><div class='line' id='LC71'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Fixed the pesky regular expression that tests for</div><div class='line' id='LC72'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;an insert/update etc. Now it works even for the most</div><div class='line' id='LC73'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;weirdly formatted queries! (thx dille)</div><div class='line' id='LC74'><br/></div><div class='line' id='LC75'>1.25 - Update (mySQL/Oracle)</div><div class='line' id='LC76'><br/></div><div class='line' id='LC77'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Optimised $db-&gt;query function in both mySQL and Oracle versions.</div><div class='line' id='LC78'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Now the return value is working &#39;as expected&#39; in ALL cases so you</div><div class='line' id='LC79'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;are always safe using:</div><div class='line' id='LC80'><br/></div><div class='line' id='LC81'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if ( $db-&gt;query(&quot;some query&quot;) )</div><div class='line' id='LC82'><br/></div><div class='line' id='LC83'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No matter if an insert or a select.</div><div class='line' id='LC84'><br/></div><div class='line' id='LC85'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;In the case of insert/update the return value is based on the</div><div class='line' id='LC86'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;number of rows affected (used to be insert id which is</div><div class='line' id='LC87'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;not valid for an update)</div><div class='line' id='LC88'><br/></div><div class='line' id='LC89'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;In the case of select the return value is based on number of</div><div class='line' id='LC90'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;rows returned.</div><div class='line' id='LC91'><br/></div><div class='line' id='LC92'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thx Bill Bruggemeyer :)</div><div class='line' id='LC93'><br/></div><div class='line' id='LC94'>1.24 - Update (Docs)</div><div class='line' id='LC95'><br/></div><div class='line' id='LC96'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Now includes tutorial for using EZ Results with Smarty</div><div class='line' id='LC97'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;templating engine - thx Steve Warwick</div><div class='line' id='LC98'><br/></div><div class='line' id='LC99'>1.23 - Update (All PHP versions)</div><div class='line' id='LC100'><br/></div><div class='line' id='LC101'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Fixed the age old problem of returning false on</div><div class='line' id='LC102'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;successful insert. $db-&gt;query()now returns the insert_id</div><div class='line' id='LC103'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if there was a successful insert or false if not. Sorry</div><div class='line' id='LC104'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;that this took so long to fix!</div><div class='line' id='LC105'><br/></div><div class='line' id='LC106'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Version Affected: mySQL/Porgress/ms-sql/sqlite</div><div class='line' id='LC107'><br/></div><div class='line' id='LC108'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Added new variable $db-&gt;debug_all</div><div class='line' id='LC109'><br/></div><div class='line' id='LC110'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;By default it is set to false but if you change it</div><div class='line' id='LC111'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;to true. i.e.</div><div class='line' id='LC112'><br/></div><div class='line' id='LC113'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;include_once &quot;ez_sql.php&quot;;</div><div class='line' id='LC114'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$db-&gt;debug_all = true;</div><div class='line' id='LC115'><br/></div><div class='line' id='LC116'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Then it will print out each and every query and all</div><div class='line' id='LC117'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;of the results that your script creates.</div><div class='line' id='LC118'><br/></div><div class='line' id='LC119'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Very useful if you want to follow the entire logic</div><div class='line' id='LC120'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;path of what ALL your queries are doing, but can&#39;t</div><div class='line' id='LC121'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;be bothered to put $db-&gt;debug() statements all over</div><div class='line' id='LC122'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;the place!</div><div class='line' id='LC123'><br/></div><div class='line' id='LC124'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Update (Postgress SQL Version)</div><div class='line' id='LC125'><br/></div><div class='line' id='LC126'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Our old friend Tom De Bruyne as updated the postgress</div><div class='line' id='LC127'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;version.</div><div class='line' id='LC128'><br/></div><div class='line' id='LC129'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1) It now works without throwing errors (also thanks Geert Nijpels)</div><div class='line' id='LC130'><br/></div><div class='line' id='LC131'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2) It now, in theory, returns $this-&gt;insert_id after an insert.</div><div class='line' id='LC132'><br/></div><div class='line' id='LC133'><br/></div><div class='line' id='LC134'>1.22 - Update (All PHP versions)</div><div class='line' id='LC135'><br/></div><div class='line' id='LC136'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Added new variable $db-&gt;num_queries it keeps track</div><div class='line' id='LC137'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;of exactly how many &#39;real&#39; (not cached) queries were</div><div class='line' id='LC138'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;executed (using ezSQL) during the lifetime of one script.</div><div class='line' id='LC139'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Useful for debugging and optimizing.</div><div class='line' id='LC140'><br/></div><div class='line' id='LC141'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Put a white table behind the vardump output so that</div><div class='line' id='LC142'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;it doesn&#39;t get lost on dark websites.</div><div class='line' id='LC143'><br/></div><div class='line' id='LC144'>1.21 - Update (All Versions)</div><div class='line' id='LC145'><br/></div><div class='line' id='LC146'>		- Now &#39;replace&#39; really does return an insert id..</div><div class='line' id='LC147'>		  (the 1.19 fix did not complete the job. Doh!)</div><div class='line' id='LC148'><br/></div><div class='line' id='LC149'>1.20 - Update (New Version)</div><div class='line' id='LC150'><br/></div><div class='line' id='LC151'>		- C++ SQLite version added. Look at ez_demo.cpp.</div><div class='line' id='LC152'>		  (thanks Brennan Falkner)</div><div class='line' id='LC153'><br/></div><div class='line' id='LC154'>1.19 - Update (All Versions)</div><div class='line' id='LC155'><br/></div><div class='line' id='LC156'>		- Fixed bug where any string containing the word &#39;insert&#39;,</div><div class='line' id='LC157'>		  &#39;delete&#39; or &#39;update&#39; (where those words were not the actual</div><div class='line' id='LC158'>		  query) was causing unexpected results (thx Simon Willison).</div><div class='line' id='LC159'><br/></div><div class='line' id='LC160'>		  The fix was to alter the regular expression to only match</div><div class='line' id='LC161'>		  queries containing those words at the beginning of the query</div><div class='line' id='LC162'>		  (with optional whitespace allowed before the words)</div><div class='line' id='LC163'><br/></div><div class='line' id='LC164'>		  i.e.</div><div class='line' id='LC165'><br/></div><div class='line' id='LC166'>		  THIS:    preg_match(&quot;/$word /&quot;,strtolower($query))</div><div class='line' id='LC167'>		  TO THIS: preg_match(&quot;/^\\s*$word /&quot;,strtolower($query))</div><div class='line' id='LC168'><br/></div><div class='line' id='LC169'>		  - Added new sql word &#39;replace&#39; to the above match pattern</div><div class='line' id='LC170'>		    so that the $db-&gt;insert_id would be also be populated</div><div class='line' id='LC171'>		    on &#39;replace&#39; queries (thx Rolf Dahl)</div><div class='line' id='LC172'><br/></div><div class='line' id='LC173'>1.18 - Update (All Versions)</div><div class='line' id='LC174'><br/></div><div class='line' id='LC175'>		- Added new SQLite version (thanks Brennan Falkner)</div><div class='line' id='LC176'><br/></div><div class='line' id='LC177'>		- Fixed new bug that was introduced with bug fix 1.14</div><div class='line' id='LC178'>		  false was being returned on successful insert update etc.</div><div class='line' id='LC179'>		  now it is true</div><div class='line' id='LC180'><br/></div><div class='line' id='LC181'>1.17 - Update (All Versions)</div><div class='line' id='LC182'><br/></div><div class='line' id='LC183'>		- New MS-SQL version added (thanks to Tom De Bruyne)</div><div class='line' id='LC184'>		- Made the donation request &#39;less annoying&#39; by making it more subtle!</div><div class='line' id='LC185'><br/></div><div class='line' id='LC186'>1.16 - Update (All Versions)</div><div class='line' id='LC187'><br/></div><div class='line' id='LC188'>		- Added new function $db-&gt;escape()</div><div class='line' id='LC189'>		  Formats a string correctly to stop accidental</div><div class='line' id='LC190'>		  mal formed queries under all PHP conditions</div><div class='line' id='LC191'><br/></div><div class='line' id='LC192'>1.15 - Bug fixes</div><div class='line' id='LC193'><br/></div><div class='line' id='LC194'>		- (Postgress)</div><div class='line' id='LC195'>		  $this-&gt;result = false; was in the wrong place.</div><div class='line' id='LC196'>		  Fixed! Thanks (Carlos Camiña García)</div><div class='line' id='LC197'><br/></div><div class='line' id='LC198'>		- (all versions)</div><div class='line' id='LC199'>		  Pesky get_var was still returning null instead of 0 in</div><div class='line' id='LC200'>		  certain cases. Bug fix of !== suggested by Osman</div><div class='line' id='LC201'><br/></div><div class='line' id='LC202'>1.14 - Bug fixes</div><div class='line' id='LC203'><br/></div><div class='line' id='LC204'>		- (all versions)</div><div class='line' id='LC205'>		  Added !=&#39;&#39; into the conditional return of get_var.</div><div class='line' id='LC206'>		  because if the result was the number 0 it was not returning anything</div><div class='line' id='LC207'><br/></div><div class='line' id='LC208'>		- (mySQL / Interbase / Postgress)</div><div class='line' id='LC209'>		  Added $this-&gt;result = false; if insert / update / delete</div><div class='line' id='LC210'>		  because it was causing mysql retrieval errors that no one</div><div class='line' id='LC211'>		  knew about due to the @ signs.</div><div class='line' id='LC212'><br/></div><div class='line' id='LC213'>1.13 - Update (All Versions)</div><div class='line' id='LC214'><br/></div><div class='line' id='LC215'>		- Swapped 2nd and 3rd argument order.</div><div class='line' id='LC216'>		- From.. get_row(query, int row offset, output type)</div><div class='line' id='LC217'>		- To.... get_row(query, output type, int row offset)</div><div class='line' id='LC218'><br/></div><div class='line' id='LC219'>1.12 - Update (All Versions)</div><div class='line' id='LC220'><br/></div><div class='line' id='LC221'>		- Tweaked the new hide/show error code</div><div class='line' id='LC222'>		- Made sure the $this-&gt;show_errors was always initialised</div><div class='line' id='LC223'>		- $db-&gt;query() function now returns false if there was an SQL error.</div><div class='line' id='LC224'>		  So that you can now do the following when you hide errors.</div><div class='line' id='LC225'><br/></div><div class='line' id='LC226'>		  if ( $db-&gt;query(&quot;BAD SYNTAX&quot;) )</div><div class='line' id='LC227'>		  {</div><div class='line' id='LC228'>		  	echo &quot;Bad Query&quot;;</div><div class='line' id='LC229'>		  }</div><div class='line' id='LC230'><br/></div><div class='line' id='LC231'>1.11 - Update (All Versions)</div><div class='line' id='LC232'><br/></div><div class='line' id='LC233'>		- added $db-&gt;hide_errors();</div><div class='line' id='LC234'>		- added $db-&gt;show_errors();</div><div class='line' id='LC235'>		- added global array $EZSQL_ERROR;</div><div class='line' id='LC236'><br/></div><div class='line' id='LC237'>1.10 - Fix (mySQL)</div><div class='line' id='LC238'><br/></div><div class='line' id='LC239'>		- Insist that mysql_insert_id(); uses $this-&gt;dbh.</div><div class='line' id='LC240'><br/></div><div class='line' id='LC241'>1.09 - Bug Fix</div><div class='line' id='LC242'><br/></div><div class='line' id='LC243'>		- Oracle version had the wrong number of parameters in the</div><div class='line' id='LC244'>		  $db = new db(etc,etc,etc,etc) part.</div><div class='line' id='LC245'><br/></div><div class='line' id='LC246'>		- Also added var $vardump_called; to all versions.</div><div class='line' id='LC247'><br/></div><div class='line' id='LC248'>1.08 - Bug Fix</div><div class='line' id='LC249'><br/></div><div class='line' id='LC250'>		- Michael fixed the select function in PostgreSQL version.</div><div class='line' id='LC251'><br/></div><div class='line' id='LC252'>1.07 - Bug Fix</div><div class='line' id='LC253'><br/></div><div class='line' id='LC254'>		- Added var $debug_called; to all versions.</div><div class='line' id='LC255'><br/></div><div class='line' id='LC256'>1.06 - Update</div><div class='line' id='LC257'><br/></div><div class='line' id='LC258'>		- Fixed Bug In Oracle Version where an insert was</div><div class='line' id='LC259'>		  causing an error with OCIFetch</div><div class='line' id='LC260'>		- New PostgreSQL Version Added by Michael Paesold (mpaesold@gmx.at)</div><div class='line' id='LC261'><br/></div><div class='line' id='LC262'>1.05 - Bug Fix (mySQL)</div><div class='line' id='LC263'><br/></div><div class='line' id='LC264'>		- Removed repeated piece of code.</div><div class='line' id='LC265'><br/></div><div class='line' id='LC266'>1.04 - Update</div><div class='line' id='LC267'><br/></div><div class='line' id='LC268'>		- $db-&gt;num_rows - variable added (All Versions)</div><div class='line' id='LC269'>		- $db-&gt;rows_affected - variable added ( mySQL / Oracle )</div><div class='line' id='LC270'>		- New InterBase/FireBase Version Added by LLCedar (llceder@wxs.nl)</div><div class='line' id='LC271'><br/></div><div class='line' id='LC272'>1.03 - Update (All Versions)</div><div class='line' id='LC273'><br/></div><div class='line' id='LC274'>	Enhancements to vardump..</div><div class='line' id='LC275'><br/></div><div class='line' id='LC276'>		- Added display variable type</div><div class='line' id='LC277'>		- If no value display No Value / False</div><div class='line' id='LC278'>		- Added this readme file</div><div class='line' id='LC279'><br/></div><div class='line' id='LC280'>1.02 - Update (mySQL version)</div><div class='line' id='LC281'><br/></div><div class='line' id='LC282'>	Added $db-&gt;insert_id to</div><div class='line' id='LC283'><br/></div><div class='line' id='LC284'>1.01 - New Version</div><div class='line' id='LC285'><br/></div><div class='line' id='LC286'>	Oracle 8 Version as below</div><div class='line' id='LC287'><br/></div><div class='line' id='LC288'>1.00 - Initial Release</div><div class='line' id='LC289'><br/></div><div class='line' id='LC290'>	Functions..</div><div class='line' id='LC291'><br/></div><div class='line' id='LC292'>		- $db-&gt;get_results - get multiple row result set from the database (or previously cached results)</div><div class='line' id='LC293'>		- $db-&gt;get_row -- get one row from the database (or previously cached results)</div><div class='line' id='LC294'>		- $db-&gt;get_col - get one column from query (or previously cached results) based on column offset</div><div class='line' id='LC295'>		- $db-&gt;get_var -- get one variable, from one row, from the database (or previously cached results)</div><div class='line' id='LC296'>		- $db-&gt;query -- send a query to the database (and if any results, cache them)</div><div class='line' id='LC297'>		- $db-&gt;debug - print last sql query and returned results (if any)</div><div class='line' id='LC298'>		- $db-&gt;vardump - print the contents and structure of any variable</div><div class='line' id='LC299'>		- $db-&gt;select -- select a new database to work with</div><div class='line' id='LC300'>		- $db-&gt;get_col_info - get information about one or all columns such as column name or type</div><div class='line' id='LC301'>		- $db = new db -- Initiate new db object.</div></pre></div>
          </td>
        </tr>
      </table>
  </div>

          </div>
        </div>

        <a href="#jump-to-line" rel="facebox" data-hotkey="l" class="js-jump-to-line" style="display:none">Jump to Line</a>
        <div id="jump-to-line" style="display:none">
          <h2>Jump to Line</h2>
          <form accept-charset="UTF-8" class="js-jump-to-line-form">
            <input class="textfield js-jump-to-line-field" type="text">
            <div class="full-button">
              <button type="submit" class="button">Go</button>
            </div>
          </form>
        </div>

      </div>
    </div>
</div>

<div id="js-frame-loading-template" class="frame frame-loading large-loading-area" style="display:none;">
  <img class="js-frame-loading-spinner" src="https://a248.e.akamai.net/assets.github.com/images/spinners/octocat-spinner-128.gif?1347543527" height="64" width="64">
</div>


        </div>
      </div>
      <div class="context-overlay"></div>
    </div>

      <div id="footer-push"></div><!-- hack for sticky footer -->
    </div><!-- end of wrapper - hack for sticky footer -->

      <!-- footer -->
      <div id="footer">
  <div class="container clearfix">

      <dl class="footer_nav">
        <dt>GitHub</dt>
        <dd><a href="https://github.com/about">About us</a></dd>
        <dd><a href="https://github.com/blog">Blog</a></dd>
        <dd><a href="https://github.com/contact">Contact &amp; support</a></dd>
        <dd><a href="http://enterprise.github.com/">GitHub Enterprise</a></dd>
        <dd><a href="http://status.github.com/">Site status</a></dd>
      </dl>

      <dl class="footer_nav">
        <dt>Applications</dt>
        <dd><a href="http://mac.github.com/">GitHub for Mac</a></dd>
        <dd><a href="http://windows.github.com/">GitHub for Windows</a></dd>
        <dd><a href="http://eclipse.github.com/">GitHub for Eclipse</a></dd>
        <dd><a href="http://mobile.github.com/">GitHub mobile apps</a></dd>
      </dl>

      <dl class="footer_nav">
        <dt>Services</dt>
        <dd><a href="http://get.gaug.es/">Gauges: Web analytics</a></dd>
        <dd><a href="http://speakerdeck.com">Speaker Deck: Presentations</a></dd>
        <dd><a href="https://gist.github.com">Gist: Code snippets</a></dd>
        <dd><a href="http://jobs.github.com/">Job board</a></dd>
      </dl>

      <dl class="footer_nav">
        <dt>Documentation</dt>
        <dd><a href="http://help.github.com/">GitHub Help</a></dd>
        <dd><a href="http://developer.github.com/">Developer API</a></dd>
        <dd><a href="http://github.github.com/github-flavored-markdown/">GitHub Flavored Markdown</a></dd>
        <dd><a href="http://pages.github.com/">GitHub Pages</a></dd>
      </dl>

      <dl class="footer_nav">
        <dt>More</dt>
        <dd><a href="http://training.github.com/">Training</a></dd>
        <dd><a href="https://github.com/edu">Students &amp; teachers</a></dd>
        <dd><a href="http://shop.github.com">The Shop</a></dd>
        <dd><a href="/plans">Plans &amp; pricing</a></dd>
        <dd><a href="http://octodex.github.com/">The Octodex</a></dd>
      </dl>

      <hr class="footer-divider">


    <p class="right">&copy; 2013 <span title="0.06864s from fe18.rs.github.com">GitHub</span>, Inc. All rights reserved.</p>
    <a class="left" href="https://github.com/">
      <span class="mega-icon mega-icon-invertocat"></span>
    </a>
    <ul id="legal">
        <li><a href="https://github.com/site/terms">Terms of Service</a></li>
        <li><a href="https://github.com/site/privacy">Privacy</a></li>
        <li><a href="https://github.com/security">Security</a></li>
    </ul>

  </div><!-- /.container -->

</div><!-- /.#footer -->


    <div class="fullscreen-overlay js-fullscreen-overlay" id="fullscreen_overlay">
  <div class="fullscreen-container js-fullscreen-container">
    <div class="textarea-wrap">
      <textarea name="fullscreen-contents" id="fullscreen-contents" class="js-fullscreen-contents" placeholder="" data-suggester="fullscreen_suggester"></textarea>
          <div class="suggester-container">
              <div class="suggester fullscreen-suggester js-navigation-container" id="fullscreen_suggester"
                 data-url="/jv2222/ezSQL/suggestions/commit">
              </div>
          </div>
    </div>
  </div>
  <div class="fullscreen-sidebar">
    <a href="#" class="exit-fullscreen js-exit-fullscreen tooltipped leftwards" title="Exit Zen Mode">
      <span class="mega-icon mega-icon-normalscreen"></span>
    </a>
    <a href="#" class="theme-switcher js-theme-switcher tooltipped leftwards"
      title="Switch themes">
      <span class="mini-icon mini-icon-brightness"></span>
    </a>
  </div>
</div>



    <div id="ajax-error-message" class="flash flash-error">
      <span class="mini-icon mini-icon-exclamation"></span>
      Something went wrong with that request. Please try again.
      <a href="#" class="mini-icon mini-icon-remove-close ajax-error-dismiss"></a>
    </div>

    
    
    <span id='server_response_time' data-time='0.06912' data-host='fe18'></span>
    
  </body>
</html>

