<?php

Namespace System;

Class Email {

    public function sendVerify($e, $l, $c) {

        $url = "https://api.sendgrid.com/v3/mail/send";
        $key = "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";
        $authorization = "Authorization: Bearer $key";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type: application/json' , $authorization));
        curl_setopt($ch, CURLOPT_POSTFIELDS, '
        {
            "personalizations": [
                {
                    "to": [{"email": "'.$e.'"}],
                    "dynamic_template_data": {
                        "language":"'.$l.'",
                        "verification_id":"'.$c.'"
                    }
                }],
                "template_id":"d-c380536eab8b465581b3542968d22ce5",
                "from": {"email": "info@rentxx.com"}, 
                "subject": "Welcome to RentXx.Com"
        }
        ');
        curl_exec($ch);
    }

    public function forgot($e, $l, $c) {

        $url = "https://api.sendgrid.com/v3/mail/send";
        $key = "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";
        $authorization = "Authorization: Bearer $key";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type: application/json' , $authorization));
        curl_setopt($ch, CURLOPT_POSTFIELDS, '
        {
            "personalizations": [
                {
                    "to": [{"email": "$e"}],
                    "dynamic_template_data": {
                        "language":"$l",
                        "verification_id":"$c"
                    }
                }],
                "template_id":"d-c380536eab8b465581b3542968d22ce5",
                "from": {"email": "info@rentxx.com"}, 
                "subject": "RentXx.Com Pasword Recovery"
        }
        ');
        curl_exec($ch);
    }

    public function message($e, $l) {

        $url = "https://api.sendgrid.com/v3/mail/send";
        $key = "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";
        $authorization = "Authorization: Bearer $key";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type: application/json' , $authorization));
        curl_setopt($ch, CURLOPT_POSTFIELDS, '
        {
            "personalizations": [
                {
                    "to": [{"email": "$e"}],
                    "dynamic_template_data": {
                        "language":"$l",
                        "verification_id":"$c"
                    }
                }],
                "template_id":"d-c380536eab8b465581b3542968d22ce5",
                "from": {"email": "info@rentxx.com"}, 
                "subject": "RentXx.Com Pasword Recovery"
        }
        ');
        curl_exec($ch);
    }

    public function newtrip($e, $l, $c) {

        $url = "https://api.sendgrid.com/v3/mail/send";
        $key = "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";
        $authorization = "Authorization: Bearer $key";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type: application/json' , $authorization));
        curl_setopt($ch, CURLOPT_POSTFIELDS, '
        {
            "personalizations": [
                {
                    "to": [{"email": "$e"}],
                    "dynamic_template_data": {
                        "language":"$l",
                        "verification_id":"$c"
                    }
                }],
                "template_id":"d-c380536eab8b465581b3542968d22ce5",
                "from": {"email": "info@rentxx.com"}, 
                "subject": "RentXx.Com Pasword Recovery"
        }
        ');
        curl_exec($ch);
    }

}

?>