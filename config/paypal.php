<?php

return [
    'client_id' => env('PAYPAL_CLIENT_ID','AfhfjWthiq_ZjKdIzjzvqDdHeTAfhAAjq9qoRHBD8hY0X-CqHqnutNkeXtP6tUFw1AVOwTtiwWPZXnq6'),
    'secret' => env('PAYPAL_SECRET','EO5MYDgqUPHxDva2rayUL6_439Jcru3KQZay9HTDNCeARY0bW5zfamf_LRa4a5skqyfCdNdAw2H6t0Ha'),
    'LOGOIMG' => env('LOGOIMG','https://www.studyingincanada.org/images/logo_sm.png'),
    'settings' => array(
        'mode' => env('PAYPAL_MODE','live'),
        'http.ConnectionTimeOut' => 90,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'ERROR'
    ),
        'url'=>[
        'success'=>'https://canadian.futuresol.com.au/execute-aggrement/true',
        'failure'=>'https://canadian.futuresol.com.au/execute-aggrement/false'
    ]
];

//    'client_id' => 'AcD_0S7-62iHYJtRWwYwMxv8zzf483qdccH_dgJGOd4oiN3e7JkEvEZngp8fm6dnihrYi28L3MqlVBch',
//    'secret' => 'EHJv3CIf9WMbQCQOLpGCl-5RpetwHBhkxgEMgLS3mpLVS9TVfVWwIDA2gqNtn3knQBB-K2IGwGPmJUQl',