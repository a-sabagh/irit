<?php 
define("IRTT_FRONT", get_template_directory_uri());
define("IRTT_ADMIN" , get_template_directory_uri() . "/admin/" );


require_once 'includes/init.php';
require_once 'includes/scripts.php';
require_once 'includes/functions.php';

//scripts
require_once 'includes/scripts.php';

//post types
require_once 'includes/post-types/member.php';

//metabox
require_once 'includes/metaboxes/category-featured.php';
require_once 'includes/metaboxes/subtitle.php';
