<?php

Class Sms {

    $payload = [
        'From' => '+13513000084',
        'To' => $number,
        'Body'   => 'RentXx Code: ' . $code
    ];

    $url = "https://api.twilio.com/2010-04-01/Accounts/ACd908f5fb6b75cd4d348b6e7722693040/Messages.json";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_USERPWD, 'ACd908f5fb6b75cd4d348b6e7722693040' . ':' . 'c90704bfc212d608cf80246b46b25a39');
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
    curl_exec($ch);

}

?>