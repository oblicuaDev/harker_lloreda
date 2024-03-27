<?php
$dateTime = new DateTime();
$timeZone = $dateTime->getTimezone();
$timeZoneOffset = $timeZone->getOffset($dateTime) / 60; // Convert seconds to minutes

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.payzen.lat/api-payment/V4/PCI/Charge/VerifyPaymentMethod',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "currency": "COP", 
    "paymentForms": [
      {
        "paymentMethodType": "CARD",
        "pan": "5303710242236294",
        "expiryMonth": "01",
        "expiryYear": "26",
        "securityCode": "037"
      }
    ],
    "customer": {
      "email": "dreinovcorp@gmail.com"
    },
    "device": {
      "deviceType": "BROWSER",
      "acceptHeader": "application/json",
      "javaEnabled": false,
      "language": "es",
      "colorDepth": "24",
      "screenHeight": 1080,
      "screenWidth": 1920,
      "timezoneOffset": -120,
      "userAgent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36"
    }
  }',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Basic NDE0ODExMDI6dGVzdHBhc3N3b3JkX2wyUDRIT0diekZ3ZUJUVEROeVA4c09nc0FsclZqUWF1YTR5d2ppU1VQMU1qRg=='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
