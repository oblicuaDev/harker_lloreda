<?php 
$bodyClass = "paymethod";
include 'includes/head.php';
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.payzen.lat/api-payment/V4/Charge/CreatePayment',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "amount": 10000,
    "currency": "COP",
    "orderId": "myOrderId-999999",
    "customer": {
        "email": "dreinovcorp@gmail.com"
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Basic NDE0ODExMDI6dGVzdHBhc3N3b3JkX2wyUDRIT0diekZ3ZUJUVEROeVA4c09nc0FsclZqUWF1YTR5d2ppU1VQMU1qRg==',
    'Cookie: JSESSIONID=1A62F321E22AfAAaeBA8F1DFB43FE32465F413bD.vadworldapi01-bdx-prod-fr-lyra'
  ),
));

$response = curl_exec($curl);

curl_close($curl);

$data = json_decode($response);
?>
<main>
  <div class="container">

    <h2><?=$sdk->palabras[$lang][46]?></h2>
      <div class="card-wrapper"></div>
       <!-- payment form -->
    <div class="kr-embedded" kr-form-token="<?=$data->answer->formToken?>">
      <!-- payment form fields -->
      <div class="kr-pan"></div>
      <div class="kr-expiry"></div>
      <div class="kr-security-code"></div>
      <!-- payment form submit button -->
      <button class="kr-payment-button"></button>
      <!-- error zone -->
      <div class="kr-form-error"></div>
    </div>
  </div>
</main>
<?php include 'includes/footer.php'; ?>
