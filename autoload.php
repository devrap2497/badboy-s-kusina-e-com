<?php


// site global defines
define( 'USER_LEVEL_ADMIN', '1' );

// fb defines
define( 'FB_GRAPH_VERSION', 'v6.0');
define( 'FB_GRAPH_DOMAIN', 'https://graph.facebook.com/');
define( 'FB_APP_STATE', 'eciphp');

include_once __DIR__ . ( PHP_OS == 'LINUX' ? '' : '/') . '../fb_includes/config.php';

include_once __DIR__ . '/controllers/functions.php';

include_once __DIR__ . '/controllers/facebook_api.php';


