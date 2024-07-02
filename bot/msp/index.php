<?php

include_once 'config.php';
include_once './vendor/autoload.php';

MSP\Init::run();



















//$data = [
//    'chat_id' => '924641261',
//    'document' => 'http://185.219.221.212:8080/api/v3/attachments/3/technician_key=' . ,
//    'reply_to_message_id' => $replyMessageId,
//    'disable_content_type_detection' => false
//];
//

//$client = new GuzzleHttp\Client();
//$response = $client->get(SERVICEDESK_URL . '/api/v3/attachments/3', [
//    'headers' => ['technician_key' => SERVICEDESK_API_KEY],
//])
//    ->getBody()
//    ->getContents();
//
//        $response = json_decode($response, true);
//
//p($response);

//$opts = [
//    'http' => [
//        'method' => "GET",
//        'header' => "technician_key: " . SERVICEDESK_API_KEY . "\r\n"
//    ]
//];
//
//$context = stream_context_create($opts);
//$fp = fopen('http://185.219.221.212:8080/api/v3/attachments/3', 'r', false, $context);
//
//p(fread($fp, 424095));
//


//$data = [
//    'chat_id' => '924641261',
//    'document' => 'https://4138-37-15-41-197.eu.ngrok.io/msp/tmp/1656012063-9b025fe7-3c3c-4173-b37d-5a1c247a20a0 (2).pdf'
//];
//
//$client = new GuzzleHttp\Client();
//$response = $client->post(TELEGRAM_API_URL . '5117940801:AAGbhJrQ2qFZ2MUfTDWhQZueYMF61IQks-I' . '/sendDocument', [
//    'form_params' => $data
//])
//    ->getBody()
//    ->getContents();
//
//        $response = json_decode($response, true);
//
//p($response);



//$c = 'closed' == 'open' ? [
//    'id' => 2
//] : [
//    'id' => 1
//];
//
//$data = ['input_data' => json_encode([
//        'request' => [
//            'status' => $c
//        ]
//    ])
//];
//
//$client = new GuzzleHttp\Client();
//
//try {
//    $response = $client->put(SERVICEDESK_API_URL . "requests/4", [
//        'headers' => ['technician_key' => SERVICEDESK_API_KEY],
//        'query' => $data
//    ])
//        ->getBody()
//        ->getContents();
//}catch(Exception $e){
//    p($e->getMessage());
//}


//$client = new GuzzleHttp\Client();
//try {
//    $response = $client->post(SERVICEDESK_API_URL . 'projects', [
//        'headers' => [
//            'technician_key' => SERVICEDESK_API_KEY
//        ],
//        'json' => [
//            'title' => 'First project',
//            'description' => '',
//            'status' => [
//                'id' => 1,
//                'name' => 'Open'
//            ],
//            "account" => [
//                "name" => "My Org Inc",
//                'id' => 1
//            ],
//            'type' => [
//                'name' => 'Maintenance',
//                'id' => 3
//            ]
//        ]
//    ])->getBody()->getContents();
//
//}catch(Exception $e){
//    p($e->getMessage());
//}




//$data = ['input_data' => json_encode(
//    [
//        'request' => [
//            'subject' => 'New Themee',
//            'description' => 'I am unable to fetch mails from the mail server',
//            'requester' => [
//                'id' => 302
//            ],
//            "status" => ['name' => 'Open']
//        ]
//    ], 0, 512)
//];


//$data = ['input_data' => json_encode(
//    [
//        'note' => [
//            'description' => "Comment 20",
//            'show_to_requester' => true,
//            'mark_first_response' => false,
//            "add_to_linked_requests" => true
//        ]
//    ], 0, 512)
//];
//
//
//
//$request = curl_init();
//
//curl_setopt_array($request, [
//    CURLOPT_HTTPHEADER => [
//        'technician_key:' . '49CA3049-1D29-42D3-BDB3-25A913D3C722',
//    ],
//    CURLOPT_URL => SERVICEDESK_API_URL . "requests/1/notes",
//    CURLOPT_RETURNTRANSFER => true,
//    CURLOPT_POST => true,
//    CURLOPT_POSTFIELDS => $data
//]);
//
//$result = curl_exec($request);
//
//$result_decoded = json_decode($result, 1);
//
//p($result_decoded);

//$client = new GuzzleHttp\Client();
//$response = $client->get(SERVICEDESK_API_URL . 'projects', ['headers' => ['technician_key' => SERVICEDESK_API_KEY]])->getBody()->getContents();
//p($response);

//try {
//    $client = new GuzzleHttp\Client();
//    $response = $client->post(SERVICEDESK_API_URL . 'users', [
//        'headers' => ['technician_key' => SERVICEDESK_API_KEY],
//        'form_params' => ['input_data' => json_encode(
//            [
//                'user' => [
//                    'name' => 'Vasia Pupkin',
//                    'login_name' => 'antonwo7@gmail.com',
//                    'status' => 'active',
//                    'email_id' => 'antonwo7@gmail.com',
//                    'password' => '3KnzU=#wm=E8hp',
//                    'department' => json_encode(['id' => 25])
//                ]
//            ])
//        ]
//    ])->getBody();
//
//    $response = json_decode($response, true);
//
//    p($response['response_status']);
//
//}catch(Exception $e){
//    $r = $e->getMessage();
//    p($r);
//}


//    $response = Request::postArray(SERVICEDESK_API_URL . 'statuses', [
//        'input_data' => [
//            'status' => [
//                'name' => 'Clos er 4',
//                'description' => 'Vasia Pupkin',
//                'in_progress' => true,
//                'stop_timer' => false,
//                'color' => '#005600'
//            ]
//        ]
//    ], [
//        'technician_key:' . SERVICEDESK_API_KEY
//    ]);


//    $response = $client->post(SERVICEDESK_API_URL . 'statuses', [
//        'headers' => [
//            'technician_key' => SERVICEDESK_API_KEY
//        ],
//        'form_data' => json_encode([
//            'input_data' => [
//                'status' => [
//                    'name' => 'Vasia Pupkin',
//                    'description' => 'Vasia Pupkin',
//                    'in_progress' => true,
//                    'stop_timer' => false,
//                    'color' => '#005600'
//                ]
//            ]
//        ])
//    ])->getBody()->getContents();


//    $response = $client->post('http://bot.profit.loc/webhooks/test.php', [
//        'headers' => [
//            'technician_key' => SERVICEDESK_API_KEY
//        ],
//        'form_params' => [
//            'first_name' => 'Vasia Pupkin',
//            'name' => 'Vasia Pupkin',
//            'login_name' => 'antonwo7@gmail.com',
//            'password' => 'vasia',
//            'type' => [
//                'id' => 1,
//                'name' => 'Admin'
//            ]
//        ]
//    ])->getBody()->getContents();
//
//    p($response);

//}catch(Exception $e){
//    p($e->getMessage());
//}


//$client = new GuzzleHttp\Client();
//$response = $client->get(SERVICEDESK_API_URL . 'users', ['headers' => ['technician_key' => SERVICEDESK_API_KEY]])->getBody()->getContents();
//p($response);





//$client = new GuzzleHttp\Client();
//$response = $client->get(SERVICEDESK_API_URL . 'request_types', [
//    'headers' => [
//        'technician_key' => SERVICEDESK_API_KEY
//    ]
//])->getBody()->getContents();
//
//p($response);















//$helpDesk = new HelpDesk();
//
//$ticket = [
//    'title' => '1111',
//    'description' => '2222',
//    'type_id' => '1',
//    'status' => 'open',
//    'user_id' => 1,
//    'custom_fields' => [
//        12 => '22222323234',
//        13 => '1',
//    ]
//];
//
//$ticket = $helpDesk->addTicket($ticket);
//
//p($ticket);

//Request::post(TELEGRAM_API_URL . TOKEN . '/' . 'sendDocument', [
//    'chat_id' => 924641261,
//    'document' => 'https://finplusteck.helpdeskeddy.com/ru/file/download/19b9e0646c015493355ad7ce69322ed78099e625/33e3e.xlsx',
//    'reply_to_message_id' => null
//]);
//
//$params = [
//    'title' => 'Theme 1',
//    'description' => 'Theme 11',
//    'status_id' => 'open',
//    'type_id' => 1,
//    'user_id' => 1,
//    'custom_fields' => [
//        12 => '1111',
//        13 => '1'
//    ]
//];
//
//$key = 'vencer980@gmail.com:a0a5b81f-c33e-4218-97d3-738522ef1b59';
//$url = 'https://finplusteck.helpdeskeddy.com/api/v2/tickets/';
////echo base64_encode($key);
//$curl = curl_init();
//
//curl_setopt_array($curl, [
//    CURLOPT_HTTPHEADER => [ 'Authorization: Basic ' . base64_encode($key), 'Content-Type: application/json'],
//    CURLOPT_URL => $url,
//    CURLOPT_RETURNTRANSFER => true,
//    CURLOPT_POST => true,
////    CURLOPT_CUSTOMREQUEST => 'PUT',
//    CURLOPT_POSTFIELDS => json_encode($params)
//]);
//
//$response = curl_exec($curl);
//curl_close($curl);
//
//echo $response;



//---------------------------------------------------





//$params = [
//    'custom_fields' => [
//        11 => 1
//    ],
//];
//
//$key = 'vencer980@gmail.com:a0a5b81f-c33e-4218-97d3-738522ef1b59';
//$url = 'https://finplusteck.helpdeskeddy.com/api/v2/tickets/43';
//$curl = curl_init();
//
//curl_setopt_array($curl, [
//    CURLOPT_HTTPHEADER => [ 'Authorization: Basic ' . base64_encode($key), 'Content-Type: application/json' ],
//    CURLOPT_URL => $url,
//    CURLOPT_RETURNTRANSFER => true,
////    CURLOPT_POST => true,
//    CURLOPT_CUSTOMREQUEST => 'PUT',
//    CURLOPT_POSTFIELDS => json_encode($params)
//]);
//
//$response = curl_exec($curl);
//curl_close($curl);
//
//echo $response;




//---------------------------------------------------



//$params = [
//    'custom_fields[9]' => '5555'
//];
//
//$key = 'vencer980@gmail.com:a0a5b81f-c33e-4218-97d3-738522ef1b59';
//$url = 'https://finplusteck.helpdeskeddy.com/api/v2/tickets/?custom_fields[9]=5555';
//
////$url .= '?' . http_build_query($params);
//
//$curl = curl_init();
//
//curl_setopt_array($curl, [
//    CURLOPT_HTTPHEADER => [ 'Authorization: Basic ' . base64_encode($key), 'Content-Type: application/json' ],
//    CURLOPT_URL => $url,
//    CURLOPT_RETURNTRANSFER => true,
////    CURLOPT_POST => true,
////    CURLOPT_CUSTOMREQUEST => 'PUT',
////    CURLOPT_POSTFIELDS => json_encode($params)
//]);
//
//$response = curl_exec($curl);
//curl_close($curl);
//
//echo $response;


//---------------------------------------------------


//$params = [
//    'search' => '924641261'
//];
//
//$key = 'vencer980@gmail.com:a0a5b81f-c33e-4218-97d3-738522ef1b59';
//$url = 'https://finplusteck.helpdeskeddy.com/api/v2/users/';
//
//$url .= '?' . http_build_query($params);
//
//$curl = curl_init();
//
//curl_setopt_array($curl, [
//    CURLOPT_HTTPHEADER => [ 'Authorization: Basic ' . base64_encode($key), 'Content-Type: application/json' ],
//    CURLOPT_URL => $url,
//    CURLOPT_RETURNTRANSFER => true,
////    CURLOPT_POST => true,
////    CURLOPT_CUSTOMREQUEST => 'PUT',
////    CURLOPT_POSTFIELDS => json_encode($params)
//]);
//
//$response = curl_exec($curl);
//curl_close($curl);
//
//echo $response;