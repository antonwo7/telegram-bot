<?php

function p($value)
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}

define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', __DIR__ . DS);
define('CLASSES_PATH', ROOT_PATH . 'classes' . DS);
define('FILES_PATH', ROOT_PATH . 'files' . DS);
define('VENDOR_PATH', ROOT_PATH . 'vendor' . DS);

//define('TOKEN', '5117940801:AAGbhJrQ2qFZ2MUfTDWhQZueYMF61IQks-I');
define('TELEGRAM_API_URL', 'https://api.telegram.org/bot');
define('TELEGRAM_API_FILES_URL', 'https://api.telegram.org/file/bot');
define('LOCAL_URL', 'https://e37a-37-15-41-197.eu.ngrok.io/');

define('LOADING_IMAGE_URL', 'https://upload.wikimedia.org/wikipedia/commons/6/66/Loadingsome.gif');

define('REQUEST_THEME_LIMIT', 40);
define('REQUEST_TEXT_LIMIT', 40);

define('LANG_DEFAULT', 'en');

define('API_URL', 'http://bot-admin.profit.loc/api/');
define('API_EMAIL', 'antonwo7@gmail.com');
define('API_PASSWORD', '123456789');

define('HELPDESK_API_URL', 'https://finplusteck.helpdeskeddy.com/api/v2/');
define('HELPDESK_API_KEY', 'vencer980@gmail.com:a0a5b81f-c33e-4218-97d3-738522ef1b59');

define('SERVICEDESK_API_URL', 'http://185.219.221.212:8080/api/v3/');
define('SERVICEDESK_API_KEY', '576C427D-7FE9-4930-A2F3-C3D75FBA3CEA');

define('DEFAULT_GREETING_IMAGE', 'https://img-08.stickers.cloud/packs/7a5e15cc-075a-40b6-9fae-30dc291d1b09/webp/d9a4b92c-b4a0-491d-b3ae-e356171e18ad.webp');

const TICKET_STATUSES = [
    [
        'id' => 'open',
        'name' => [
            'ru' => 'Открыт',
            'en' => 'Open'
        ]
    ],
    [
        'id' => 'closed',
        'name' => [
            'ru' => 'Закрыт',
            'en' => 'Closed'
        ]
    ]
];

function f($data)
{
    file_put_contents(ROOT_PATH . './message.txt', print_r($data, true));
}

const LOG_MESSAGES = [
    'page' => 'Клиент %telegram_account% перешел на страницу %page%'
];