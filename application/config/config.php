<?php

//database configuration
define ('HOST', 'localhost');
define ('USERNAME', 'aekstbcz_ayotunde');
define('PASSWORD', 'Royaleagle2019.');
define ('DATABASE', 'aekstbcz_aekscf');

//define('HOST', 'sql309.byethost24.com');
//define('USERNAME', 'b24_37182285');
//define ('PASSWORD', 'royaleagle2019.');
//define('DATABASE', 'b24_37182285_aekscf');

//other site conf
define ('SITE_NAME', 'Adedotun-EKSCF');
define ('URL_ROOT', '/');
//define ('URL_ROOT', 'http://localhost/vibewalls_v2/');
define ('BASE_MEDIA_ROOT', dirname(dirname(__DIR__)));
define ('SYSTEM_ROOT', dirname(__DIR__));
define ('BLOG_ADMIN_EMAIL', 'support@vibewalls');

define("GCLOUD_BUCKET_NAME", 'aek-scf-file-storage');
define("GCLOUD_URL_ROOT", 'https://storage.googleapis.com/'.GCLOUD_BUCKET_NAME.'/'.'public/');

define ("DATABASE_TYPE", "SQLITE"); //MYSQL - for mysqli database
define ("ENVIRONMENT", "PRODUCTION"); //PRODUCTION - for launching

?>