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
require_once 'includes/metaboxes/member.php';
require_once 'includes/metaboxes/user-meta.php';

//widgets
require_once 'includes/widgets/latest-blog-cat.php';
require_once 'includes/widgets/latest-blog.php';
require_once 'includes/widgets/papular-tag.php';

//admin-settings
require_once 'includes/admin-settings.php';

//woocommerce
require_once 'includes/woocommerce.php';