<?php

defined('MOODLE_INTERNAL') || die();

function bootstrap_user_settings($css, $theme) {
    global $CFG;
    if (!empty($theme->settings->customcss)) {
        $customcss = $theme->settings->customcss;
    } else {
        $customcss = null;
    }

    $tag = '[[setting:customcss]]';
    $css = str_replace($tag, $customcss, $css);

    
    if ($theme->settings->enableglyphicons == 1) {
        $bootstrapicons = '
        [class ^="icon-"],[class *=" icon-"] { background-image: url("'.$CFG->wwwroot.'/theme/image.php?theme=bootstrap&component=theme&image=glyphicons-halflings"); }';
        $css .= $bootstrapicons;
    }
    
    if (!empty($theme->settings->navlogo_url)) {
        $css .= '
    @media ( min-width : 980px) {
	  .navbar .brand {
		padding-left: 40px;
	  }
	  .navbar-static-top .container .nav-collapse, .navbar-fixed-top .container .nav-collapse, .navbar-fixed-bottom .container .nav-collapse {
	  padding-left: 80px;
	  }
    }';
    }

    return $css;
}