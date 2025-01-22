<?php
//Start the Session

session_start();

require('connect/include/dbconfig.php');
require_once 'connect/include/class.user.php';

$reg_user = new USER();



//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['acc_id'])) {
//3.1.1 Assigning posted values to variables.

    $acc_id = $_POST['acc_id'];

//3.1.2 Checking the values are existing in the database or not
    $query = "SELECT * FROM account WHERE acc_id='$acc_id'";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);


    $stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_id = '$acc_id'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

   

    $status = $row['status'];
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
    if ($count == 0) {
        $msg = "<div class=''>
						<strong style='color:red;'>Invalid Identification No</strong>
                   
			  </div>";
    
    } elseif ($status == 'SUSPEND') {
        $msg = "<div class='alert alert-inverse'>
						
						  <strong>Sorry! This Personnel has been Suspended Contact for more info!</strong>
                   
			  </div>";
    } else {
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
        $_SESSION['acc_id'] = $acc_id;
         $_SESSION['acc_id'] = $acc_id;
        // Redirect user to profile.php
        // header("Location: profile.php");
    }
}
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['acc_id'])) {
    $code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
    $sender = ""; /* sender id */
    $message = "Please enter this code to continue proceed
				$code";

	
    $subject = "Login Verification";
    $stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_id = '$acc_id'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
{
       
        header('Location: connect/jsp/profile.php');
    }
} else {
    
}
//3.2 When the user visits the page first time, simple login form will be displayed.
?>

<!DOCTYPE html>
<html lang="en-US" class="scheme_original">
<head>
	<title>Soldier ID Verification &#8211; Military</title>

        <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
                    <link rel="profile" href="http://gmpg.org/xfn/11">
        
                    <link rel="icon" type="image/x-icon" href="wp-content\uploads\2015\07\favicon-2.png">
            <link rel='dns-prefetch' href='//fonts.googleapis.com'>
<link rel='dns-prefetch' href='//s.w.org'>
<link rel="alternate" type="application/rss+xml" title="Military &raquo; Feed" href="feed\index.rss">
<link rel="alternate" type="application/rss+xml" title="Military &raquo; Comments Feed" href="comments\feed\index.rss">
<link rel="alternate" type="application/rss+xml" title="Military &raquo; 404 Page Comments Feed" href="feed\index.rss">
		<script type="text/javascript">
			window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/11.2.0\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/11.2.0\/svg\/","svgExt":".svg","source":{"concatemoji":"http:\/\/military.ancorathemes.com\/wp-includes\/js\/wp-emoji-release.min.js?ver=5.1.1"}};
			!function(a,b,c){function d(a,b){var c=String.fromCharCode;l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,a),0,0);var d=k.toDataURL();l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,b),0,0);var e=k.toDataURL();return d===e}function e(a){var b;if(!l||!l.fillText)return!1;switch(l.textBaseline="top",l.font="600 32px Arial",a){case"flag":return!(b=d([55356,56826,55356,56819],[55356,56826,8203,55356,56819]))&&(b=d([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]),!b);case"emoji":return b=d([55358,56760,9792,65039],[55358,56760,8203,9792,65039]),!b}return!1}function f(a){var c=b.createElement("script");c.src=a,c.defer=c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var g,h,i,j,k=b.createElement("canvas"),l=k.getContext&&k.getContext("2d");for(j=Array("flag","emoji"),c.supports={everything:!0,everythingExceptFlag:!0},i=0;i<j.length;i++)c.supports[j[i]]=e(j[i]),c.supports.everything=c.supports.everything&&c.supports[j[i]],"flag"!==j[i]&&(c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&c.supports[j[i]]);c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&!c.supports.flag,c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.everything||(h=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",h,!1),a.addEventListener("load",h,!1)):(a.attachEvent("onload",h),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),g=c.source||{},g.concatemoji?f(g.concatemoji):g.wpemoji&&g.twemoji&&(f(g.twemoji),f(g.wpemoji)))}(window,document,window._wpemojiSettings);
		</script>
		<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
</style>
	<link rel='stylesheet' id='wp-block-library-css' href='wp-includes\css\dist\block-library\style.min.css?ver=5.1.1' type='text/css' media='all'>
<link rel='stylesheet' id='essential-grid-plugin-settings-css' href='wp-content\plugins\essential-grid\public\assets\css\settings.css?ver=2.3.2' type='text/css' media='all'>
<link rel='stylesheet' id='tp-open-sans-css' href='http://fonts.googleapis.com/css?family=Open+Sans%3A300%2C400%2C600%2C700%2C800&ver=5.1.1' type='text/css' media='all'>
<link rel='stylesheet' id='tp-raleway-css' href='http://fonts.googleapis.com/css?family=Raleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900&ver=5.1.1' type='text/css' media='all'>
<link rel='stylesheet' id='tp-droid-serif-css' href='http://fonts.googleapis.com/css?family=Droid+Serif%3A400%2C700&ver=5.1.1' type='text/css' media='all'>
<link rel='stylesheet' id='tp-oswald-css' href='http://fonts.googleapis.com/css?family=Oswald&ver=5.1.1' type='text/css' media='all'>
<link rel='stylesheet' id='tp-roboto-css' href='http://fonts.googleapis.com/css?family=Roboto+Condensed&ver=5.1.1' type='text/css' media='all'>
<link rel='stylesheet' id='tp-fontello-css' href='wp-content\plugins\essential-grid\public\assets\font\fontello\css\fontello.css?ver=2.3.2' type='text/css' media='all'>
<link rel='stylesheet' id='rs-plugin-settings-css' href='wp-content\plugins\revslider\public\assets\css\settings.css?ver=5.4.8.3' type='text/css' media='all'>
<style id='rs-plugin-settings-inline-css' type='text/css'>
.tp-caption a{color:#ff7302;text-shadow:none;-webkit-transition:all 0.2s ease-out;-moz-transition:all 0.2s ease-out;-o-transition:all 0.2s ease-out;-ms-transition:all 0.2s ease-out}.tp-caption a:hover{color:#ffa902}
</style>
<link rel='stylesheet' id='trx_demo_icons-css' href='wp-content\plugins\trx_demo\css\font-icons\css\trx_demo_icons.css' type='text/css' media='all'>
<link rel='stylesheet' id='trx_demo_icons_animation-css' href='wp-content\plugins\trx_demo\css\font-icons\css\animation.css' type='text/css' media='all'>
<link rel='stylesheet' id='trx_demo_panels-css' href='wp-content\plugins\trx_demo\css\trx_demo_panels.css' type='text/css' media='all'>
<link rel='stylesheet' id='wsl-widget-css' href='wp-content\plugins\wordpress-social-login\assets\css\style.css?ver=5.1.1' type='text/css' media='all'>
<link rel='stylesheet' id='theme-font-Oswald-css' href='http://fonts.googleapis.com/css?family=Oswald:100,100italic,300,300italic,400,400italic,700,700italic&subset=latin,latin-ext,cyrillic,cyrillic-ext' type='text/css' media='all'>
<link rel='stylesheet' id='theme-font-Roboto-Condensed-css' href='http://fonts.googleapis.com/css?family=Roboto+Condensed:100,100italic,300,300italic,400,400italic,700,700italic&subset=latin,latin-ext,cyrillic,cyrillic-ext' type='text/css' media='all'>
<link rel='stylesheet' id='fontello-style-css' href='wp-content\themes\military\css\fontello\css\fontello.css' type='text/css' media='all'>
<link rel='stylesheet' id='themerex-main-style-css' href='wp-content\themes\military\style.css' type='text/css' media='all'>
<link rel='stylesheet' id='animation-style-css' href='wp-content\themes\military\fw\css\core.animation.css' type='text/css' media='all'>
<link rel='stylesheet' id='themerex-shortcodes-style-css' href='wp-content\plugins\themerex-utils\shortcodes\shortcodes.css' type='text/css' media='all'>
<link rel='stylesheet' id='themerex-skin-style-css' href='wp-content\themes\military\skins\military\skin.css' type='text/css' media='all'>
<link rel='stylesheet' id='themerex-custom-style-css' href='wp-content\themes\military\fw\css\custom-style.css' type='text/css' media='all'>
<link rel='stylesheet' id='themerex-responsive-style-css' href='wp-content\themes\military\css\responsive.css' type='text/css' media='all'>
<link rel='stylesheet' id='theme-skin-responsive-style-css' href='wp-content\themes\military\skins\military\skin.responsive.css' type='text/css' media='all'>
<link rel='stylesheet' id='mediaelement-css' href='wp-includes\js\mediaelement\mediaelementplayer-legacy.min.css?ver=4.2.6-78496d1' type='text/css' media='all'>
<link rel='stylesheet' id='wp-mediaelement-css' href='wp-includes\js\mediaelement\wp-mediaelement.min.css?ver=5.1.1' type='text/css' media='all'>
<link rel='stylesheet' id='dashicons-css' href='wp-includes\css\dashicons.min.css?ver=5.1.1' type='text/css' media='all'>
<link rel='stylesheet' id='zoom-instagram-widget-css' href='wp-content\plugins\instagram-widget-by-wpzoom\css\instagram-widget.css?ver=1.4.0' type='text/css' media='all'>
<link rel='stylesheet' id='wpgdprc.css-css' href='wp-content\plugins\wp-gdpr-compliance\assets\css\front.css?ver=1555064150' type='text/css' media='all'>
<style id='wpgdprc.css-inline-css' type='text/css'>

            div.wpgdprc .wpgdprc-switch .wpgdprc-switch-inner:before { content: 'Yes'; }
            div.wpgdprc .wpgdprc-switch .wpgdprc-switch-inner:after { content: 'No'; }
        
</style>
<script type='text/javascript' src='wp-includes\js\jquery\jquery.js?ver=1.12.4'></script>
<script type='text/javascript' src='wp-includes\js\jquery\jquery-migrate.min.js?ver=1.4.1'></script>
<script type='text/javascript' src='wp-content\plugins\essential-grid\public\assets\js\jquery.esgbox.min.js?ver=2.3.2'></script>
<script type='text/javascript' src='wp-content\plugins\essential-grid\public\assets\js\jquery.themepunch.tools.min.js?ver=2.3.2'></script>
<script type='text/javascript' src='wp-content\plugins\revslider\public\assets\js\jquery.themepunch.revolution.min.js?ver=5.4.8.3'></script>
<script type='text/javascript'>
var mejsL10n = {"language":"en","strings":{"mejs.install-flash":"You are using a browser that does not have Flash player enabled or installed. Please turn on your Flash player plugin or download the latest version from https:\/\/get.adobe.com\/flashplayer\/","mejs.fullscreen-off":"Turn off Fullscreen","mejs.fullscreen-on":"Go Fullscreen","mejs.download-video":"Download Video","mejs.fullscreen":"Fullscreen","mejs.time-jump-forward":["Jump forward 1 second","Jump forward %1 seconds"],"mejs.loop":"Toggle Loop","mejs.play":"Play","mejs.pause":"Pause","mejs.close":"Close","mejs.time-slider":"Time Slider","mejs.time-help-text":"Use Left\/Right Arrow keys to advance one second, Up\/Down arrows to advance ten seconds.","mejs.time-skip-back":["Skip back 1 second","Skip back %1 seconds"],"mejs.captions-subtitles":"Captions\/Subtitles","mejs.captions-chapters":"Chapters","mejs.none":"None","mejs.mute-toggle":"Mute Toggle","mejs.volume-help-text":"Use Up\/Down Arrow keys to increase or decrease volume.","mejs.unmute":"Unmute","mejs.mute":"Mute","mejs.volume-slider":"Volume Slider","mejs.video-player":"Video Player","mejs.audio-player":"Audio Player","mejs.ad-skip":"Skip ad","mejs.ad-skip-info":["Skip in 1 second","Skip in %1 seconds"],"mejs.source-chooser":"Source Chooser","mejs.stop":"Stop","mejs.speed-rate":"Speed Rate","mejs.live-broadcast":"Live Broadcast","mejs.afrikaans":"Afrikaans","mejs.albanian":"Albanian","mejs.arabic":"Arabic","mejs.belarusian":"Belarusian","mejs.bulgarian":"Bulgarian","mejs.catalan":"Catalan","mejs.chinese":"Chinese","mejs.chinese-simplified":"Chinese (Simplified)","mejs.chinese-traditional":"Chinese (Traditional)","mejs.croatian":"Croatian","mejs.czech":"Czech","mejs.danish":"Danish","mejs.dutch":"Dutch","mejs.english":"English","mejs.estonian":"Estonian","mejs.filipino":"Filipino","mejs.finnish":"Finnish","mejs.french":"French","mejs.galician":"Galician","mejs.german":"German","mejs.greek":"Greek","mejs.haitian-creole":"Haitian Creole","mejs.hebrew":"Hebrew","mejs.hindi":"Hindi","mejs.hungarian":"Hungarian","mejs.icelandic":"Icelandic","mejs.indonesian":"Indonesian","mejs.irish":"Irish","mejs.italian":"Italian","mejs.japanese":"Japanese","mejs.korean":"Korean","mejs.latvian":"Latvian","mejs.lithuanian":"Lithuanian","mejs.macedonian":"Macedonian","mejs.malay":"Malay","mejs.maltese":"Maltese","mejs.norwegian":"Norwegian","mejs.persian":"Persian","mejs.polish":"Polish","mejs.portuguese":"Portuguese","mejs.romanian":"Romanian","mejs.russian":"Russian","mejs.serbian":"Serbian","mejs.slovak":"Slovak","mejs.slovenian":"Slovenian","mejs.spanish":"Spanish","mejs.swahili":"Swahili","mejs.swedish":"Swedish","mejs.tagalog":"Tagalog","mejs.thai":"Thai","mejs.turkish":"Turkish","mejs.ukrainian":"Ukrainian","mejs.vietnamese":"Vietnamese","mejs.welsh":"Welsh","mejs.yiddish":"Yiddish"}};
</script>
<script type='text/javascript' src='wp-includes\js\mediaelement\mediaelement-and-player.min.js?ver=4.2.6-78496d1'></script>
<script type='text/javascript' src='wp-includes\js\mediaelement\mediaelement-migrate.min.js?ver=5.1.1'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var _wpmejsSettings = {"pluginPath":"\/wp-includes\/js\/mediaelement\/","classPrefix":"mejs-","stretching":"responsive"};
/* ]]> */
</script>
<script type='text/javascript' src='wp-content\plugins\instagram-widget-by-wpzoom\js\instagram-widget.js?ver=1.4.0'></script>
<link rel='https://api.w.org/' href='wp-json\index.json'>
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://military.ancorathemes.com/xmlrpc.php?rsd">
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="wp-includes\wlwmanifest.xml"> 
<meta name="generator" content="WordPress 5.1.1">
<link rel="canonical" href="index.htm">
<link rel='shortlink' href='index.htm?p=283'>
<link rel="alternate" type="application/json+oembed" href="wp-json\oembed\1.0\embed-4.json?url=http%3A%2F%2Fmilitary.ancorathemes.com%2F404-2%2F">
<link rel="alternate" type="text/xml+oembed" href="wp-json\oembed\1.0\embed-4.xml?url=http%3A%2F%2Fmilitary.ancorathemes.com%2F404-2%2F&#038;format=xml">
		<script type="text/javascript">
			var ajaxRevslider;
			
			jQuery(document).ready(function() {
				// CUSTOM AJAX CONTENT LOADING FUNCTION
				ajaxRevslider = function(obj) {
				
					// obj.type : Post Type
					// obj.id : ID of Content to Load
					// obj.aspectratio : The Aspect Ratio of the Container / Media
					// obj.selector : The Container Selector where the Content of Ajax will be injected. It is done via the Essential Grid on Return of Content
					
					var content = "";

					data = {};
					
					data.action = 'revslider_ajax_call_front';
					data.client_action = 'get_slider_html';
					data.token = '57191e4521';
					data.type = obj.type;
					data.id = obj.id;
					data.aspectratio = obj.aspectratio;
					
					// SYNC AJAX REQUEST
					jQuery.ajax({
						type:"post",
						url:"http://military.ancorathemes.com/wp-admin/admin-ajax.php",
						dataType: 'json',
						data:data,
						async:false,
						success: function(ret, textStatus, XMLHttpRequest) {
							if(ret.success == true)
								content = ret.data;								
						},
						error: function(e) {
							console.log(e);
						}
					});
					
					 // FIRST RETURN THE CONTENT WHEN IT IS LOADED !!
					 return content;						 
				};
				
				// CUSTOM AJAX FUNCTION TO REMOVE THE SLIDER
				var ajaxRemoveRevslider = function(obj) {
					return jQuery(obj.selector+" .rev_slider").revkill();
				};

				// EXTEND THE AJAX CONTENT LOADING TYPES WITH TYPE AND FUNCTION
				var extendessential = setInterval(function() {
					if (jQuery.fn.tpessential != undefined) {
						clearInterval(extendessential);
						if(typeof(jQuery.fn.tpessential.defaults) !== 'undefined') {
							jQuery.fn.tpessential.defaults.ajaxTypes.push({type:"revslider",func:ajaxRevslider,killfunc:ajaxRemoveRevslider,openAnimationSpeed:0.3});   
							// type:  Name of the Post to load via Ajax into the Essential Grid Ajax Container
							// func: the Function Name which is Called once the Item with the Post Type has been clicked
							// killfunc: function to kill in case the Ajax Window going to be removed (before Remove function !
							// openAnimationSpeed: how quick the Ajax Content window should be animated (default is 0.3)
						}
					}
				},30);
			});
		</script>
	
<meta name="generator" content="Powered by Slider Revolution 5.4.8.3 - responsive, Mobile-Friendly Slider Plugin for WordPress with comfortable drag and drop interface.">
<script type="text/javascript">function setREVStartSize(e){									
						try{ e.c=jQuery(e.c);var i=jQuery(window).width(),t=9999,r=0,n=0,l=0,f=0,s=0,h=0;
							if(e.responsiveLevels&&(jQuery.each(e.responsiveLevels,function(e,f){f>i&&(t=r=f,l=e),i>f&&f>r&&(r=f,n=e)}),t>r&&(l=n)),f=e.gridheight[l]||e.gridheight[0]||e.gridheight,s=e.gridwidth[l]||e.gridwidth[0]||e.gridwidth,h=i/s,h=h>1?1:h,f=Math.round(h*f),"fullscreen"==e.sliderLayout){var u=(e.c.width(),jQuery(window).height());if(void 0!=e.fullScreenOffsetContainer){var c=e.fullScreenOffsetContainer.split(",");if (c) jQuery.each(c,function(e,i){u=jQuery(i).length>0?u-jQuery(i).outerHeight(!0):u}),e.fullScreenOffset.split("%").length>1&&void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0?u-=jQuery(window).height()*parseInt(e.fullScreenOffset,0)/100:void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0&&(u-=parseInt(e.fullScreenOffset,0))}f=u}else void 0!=e.minHeight&&f<e.minHeight&&(f=e.minHeight);e.c.closest(".rev_slider_wrapper").css({height:f})					
						}catch(d){console.log("Failure at Presize of Slider:"+d)}						
					};</script>
<noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript></head>

<body class="page-template page-template-404 page-template-404-php page page-id-283 themerex_body body_style_wide body_filled theme_skin_military article_style_stretch layout_single-standard template_single-standard top_panel_show top_panel_above sidebar_hide sidebar_outer_hide wpb-js-composer js-comp-ver-5.7 vc_responsive">
	
	
	<a id="toc_home" class="sc_anchor" title="Home" data-description="&lt;i&gt;Return to Home&lt;/i&gt; - &lt;br&gt;navigate to home page of the site" data-icon="icon-home" data-url="http://military.ancorathemes.com" data-separator="yes"></a><a id="toc_top" class="sc_anchor" title="To Top" data-description="&lt;i&gt;Back to top&lt;/i&gt; - &lt;br&gt;scroll to top of the page" data-icon="icon-double-up" data-url="" data-separator="yes"></a>
	
	
	
	<div class="body_wrap">

		
		<div class="page_wrap">

					
		<div class="top_panel_fixed_wrap"></div>

		<header class="top_panel_wrap top_panel_style_3 scheme_original">
			<div class="top_panel_wrap_inner top_panel_inner_style_3 top_panel_position_above">
			
							<div class="top_panel_top">
					<div class="content_wrap clearfix">
						
<div class="top_panel_top_user_area">
			<div class="top_panel_top_search"></div>
				<ul id="menu_user" class="menu_user_nav">
	 

					<li class="menu_user_login"> <a class="popup_login_link icon-user" href="contacts/index.php">Contact</a></li>
	
	</ul>

</div>					</div>
				</div>
			
			<div class="top_panel_middle">
				<div class="content_wrap">
					<div class="columns_wrap columns_fluid"><div class="column-1_3 contact_logo">
												<div class="logo">
						<a href="index.html"><img src="wp-content\uploads\2015\07\logo.png" class="logo_main" alt="img"><img src="wp-content\uploads\2015\07\logo.png" class="logo_fixed" alt="img"></a>
					</div>

						</div><div class="column-2_3 menu_main_wrap">
							<a href="#" class="menu_main_responsive_button icon-menu"></a>
							<nav role="navigation" class="menu_main_nav_area">
								<ul id="menu_main" class="menu_main_nav"><li id="menu-item-723" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-723"><a href="index.html">Home</a>

</li>
<li id="menu-item-21" class="menu-item menu-item-type-custom menu-item-object-custom  menu-item-21"><a href="carepack.php">Care Pack</a>

</li>
 

</li>
<li id="menu-item-725" class="menu-item menu-item-type-custom menu-item-object-custom  menu-item-725"><a href="leave.php">Leave Application</a>
</li>
<li id="menu-item-726" class="menu-item menu-item-type-custom menu-item-object-custom  menu-item-726"><a href="flight.php">Book Flight</a>

</li>
<li id="menu-item-726" class="menu-item menu-item-type-custom menu-item-object-custom  menu-item-726"><a href="medical.php">Medical Kit</a>
</li>
<li id="menu-item-24" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-24"><a href="soldier.php">Soldier ID</a></li>
</ul>
</li>

</ul>							</nav>
                            						</div>
					</div>
				</div>
			</div>

			</div>
		</header>

						<div class="top_panel_title top_panel_style_3  title_present breadcrumbs_present scheme_original">
					<div class="top_panel_title_inner top_panel_inner_style_3  title_present_inner breadcrumbs_present_inner">
						<div class="content_wrap">
															<h3 class="page_title">Soldier Verification</h3>
																						<div class="breadcrumbs">
									<a class="breadcrumbs_item home" href="/">Home</a><span class="breadcrumbs_delimiter"></span><span class="breadcrumbs_item current">Soldier Verification</span>								</div>
													</div>
					</div>
				</div>
	
		  <div class="page_content_wrap">
			
<div class="content_wrap" >
<div class="content">        
	
	<div class="container">
<h2 class="display-4">US Soldier Identification</h2>
		
		
		<span> This window allows you to access the profile of our troops stationed in various parts of the world. Each military officer can be identified with a DoD Identification Number (a unique number, example: UN1401700000), the DoD Identification Number can be used to query profile details of an officer (...we can only provide brief info about a soldier for security reasons best known to us).
The US Military Command has established this security measure to cub crimes committed in the name of the US military officers in general. Please be warned, ensure to verify a soldier's profile before identifying such individual as a real US soldier.
<br><br><br>
<b>US Military Command - DoD<br>
Washington DC </b>
 </span>
		
	
		
		<div class="contacts_form_wrap_inner">
                        <div class="content_wrap">
         <div id="sc_contact_form_1355519955" class="sc_contact_form sc_contact_form_standard sc_contact_form_style_1 aligncenter" style="widh:100%;">

<form  name="form1" method="post" action="" >
<div class="sc_contact_form_info">
	<center><?php if (isset($msg)) echo $msg; ?></center>
	<div class="sc_contact_form_item sc_contact_form_field form_field_name label_over"><label class="required" for="sc_contact_form_username">Soldier ID</label>
		<input  type="text" name="acc_id" required placeholder="Enter DoD Identification Number"><br/><br/>
						
		<div class="sc_contact_form_item sc_contact_form_button"><input type="submit" class="sc_button_size_large" value="Verify"/></div>
		</div>
							
		</div>
			
				<div class="result sc_infobox"></div></form></div>                        </div>	<!-- /.content_wrap -->
                    </div>
	
		
		</div> <!-- </div> class="content"> -->
	</div> <!-- </div> class="content_wrap"> -->						</div>		<!-- </.page_content_wrap> -->

			
			 
				<div class="copyright_wrap copyright_style_socials  scheme_original">
					<div class="copyright_wrap_inner">
						<div class="content_wrap">
							<div class="sc_socials sc_socials_type_ sc_socials_shape_square sc_socials_size_tiny"><div class="sc_socials_item"><a href="https://www.facebook.com/USArmy" target="_blank" class="social_icons social_facebook"><span class="icon-facebook"></span></a></div><div class="sc_socials_item"><a href="https://twitter.com/USArmy" target="_blank" class="social_icons social_twitter"><span class="icon-twitter"></span></a></div><div class="sc_socials_item"><a href="https://instagram.com/usarmy" target="_blank" class="social_icons social_instagramm"><span class="icon-instagramm"></span></a></div><div class="sc_socials_item"></div></div>							<div class="copyright_text"><p><a href="/" target="_blank" rel="noopener">Danloaded Demo MilitaryV1</a> © 2024. All rights reserved.</p></div>
						</div>
					</div>
				</div>
						
		</div>	<!-- /.page_wrap -->

	</div>		<!-- /.body_wrap -->
	
	

<a href="#" class="scroll_to_top icon-up" title="Scroll to top"></a>

<div class="custom_html_section">
</div>


<link rel='stylesheet' id='themerex-messages-style-css' href='wp-content\themes\military\fw\js\core.messages\core.messages.css' type='text/css' media='all'>
<link rel='stylesheet' id='prettyphoto-style-css' href='wp-content\themes\military\fw\js\prettyphoto\css\prettyPhoto.css' type='text/css' media='all'>
<link rel='stylesheet' id='js_composer_front-css' href='wp-content\plugins\js_composer\assets\css\js_composer.min.css?ver=5.7' type='text/css' media='all'>

<script type='text/javascript' src='wp-content\plugins\trx_demo\js\trx_demo_panels.js'></script>
<script type='text/javascript' src='wp-content\themes\military\fw\js\superfish.min.js'></script>
<script type='text/javascript' src='wp-content\themes\military\fw\js\jquery.slidemenu.js'></script>
<script type='text/javascript' src='wp-content\themes\military\fw\js\core.utils.js'></script>

<script type='text/javascript' src='wp-content\themes\military\fw\js\core.init.js'></script>
<script type='text/javascript' src='wp-includes\js\mediaelement\wp-mediaelement.min.js?ver=5.1.1'></script>
<script type='text/javascript' src='wp-includes\js\comment-reply.min.js?ver=5.1.1'></script>

<script type='text/javascript' src='wp-content\plugins\wp-gdpr-compliance\assets\js\front.js?ver=1555064150'></script>
<script type='text/javascript' src='wp-includes\js\wp-embed.min.js?ver=5.1.1'></script>
<script type='text/javascript' src='wp-content\plugins\themerex-utils\shortcodes\shortcodes.js'></script>
<script type='text/javascript' src='wp-content\themes\military\fw\js\core.messages\core.messages.js'></script>
<script type='text/javascript' src='wp-content\themes\military\fw\js\prettyphoto\jquery.prettyPhoto.min.js?ver=no-compose'></script>
<script type='text/javascript' src='wp-content\plugins\js_composer\assets\js\dist\js_composer_front.min.js?ver=5.7'></script>
			
			
</body>
</html>