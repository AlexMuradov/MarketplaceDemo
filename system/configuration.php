<?php
define ('DB_HOST',  getenv('DB_HOST'));
define ('DB_NAME',  getenv('DB_NAME'));
define ('DB_USER',  getenv('DB_USER'));
define ('DB_PASS',  getenv('DB_PASS'));
define ('XX', DIRECTORY_SEPARATOR);
define ('HOME', getenv('WEB_DOCUMENT_ROOT'));
define ('DEFAULT_LANGUAGE', "ru");
date_default_timezone_set('UTC');
define ('DEFAULT_CURRENCY', 4); // EUR
define ('ALLOWED_LANGUAGES', array("ru","en","az"));
define ('DEFAULT_PAGE', "home");
define ('_JSON', 1);
define ('_GET', "get");
define ('_POST', "post");
define ('_NOEMPTY', 1);
define('CLIENT_ID', '4781314427-jndem184jtc54idv9p34arnocig6gcrh.apps.googleusercontent.com');
define('CLIENT_SECRET', 'lj7zB-J74XE-6ti1N9nrbzMj');
define('CLIENT_REDIRECT_URL', 'https://rentxx.com');
define('STRIPE_KEY', 'sk_test_ynSbSsTBYnQtpHSIxR8VK9xh008pLhrI0R');
define('Telegram_BotKey1', 'bot1455815500:AAH3Wm1RqXFKMiNkoCxr5K4bYZD2IPbB4pM');
ini_set ('display_errors', 1);
?>