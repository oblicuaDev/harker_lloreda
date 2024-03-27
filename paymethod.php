<?php 
$bodyClass = "paymethod";
include 'includes/head.php';
extract($_POST);
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.payzen.lat/api-payment/V4/Charge/CreatePaymentOrder',
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
    "paymentReceiptEmail": "dreinovcorp@gmail.com"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Basic NDE0ODExMDI6dGVzdHBhc3N3b3JkX2wyUDRIT0diekZ3ZUJUVEROeVA4c09nc0FsclZqUWF1YTR5d2ppU1VQMU1qRg==',
    'Cookie: JSESSIONID=cEBfB486198c7f8a1E6d1fcF2aF4E36bF1EEbd1E.vadworldapi01-tls-prod-fr-lyra'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$resp = json_decode($response, true);
var_dump($resp['answer']['paymentURL']);

?>
<main>
    <form action="<?=$lang?>/pagar-con-tarjeta-de-credito" method="POST">
        <h2><?=$sdk->palabras[$lang][46]?></h2>
        <div class="methods">
            <button type="submit">
                <svg width="56" height="52" viewBox="0 0 56 52" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M55.0514 23.3457L50.9685 9.16431L8.29119 21.4512L9.22092 24.6808H42.2189C43.4843 24.6808 44.5098 25.7063 44.5098 26.9717V29.5254L52.9836 27.0859C54.5847 26.6249 55.5125 24.9468 55.0514 23.3457ZM49.0493 2.49777C48.5885 0.896677 46.9104 -0.031142 45.3094 0.429903L8.4401 11.0448C6.83869 11.5058 5.91087 13.1836 6.37192 14.7847L6.8931 16.5945L49.5704 4.30759L49.0493 2.49777Z" fill="#335C82"/><path d="M43.7786 48.6659C43.7786 49.526 43.0789 50.2257 42.2189 50.2257H3.85217C2.99219 50.2257 2.29257 49.526 2.29257 48.6659V26.9717C2.29257 26.1116 2.99219 25.4119 3.85217 25.4119H42.2189C43.0789 25.4119 43.7786 26.1116 43.7786 26.9717V48.6659ZM42.2189 23.9496H3.85217C2.18579 23.9496 0.830078 25.3054 0.830078 26.9717V48.6659C0.830078 50.3326 2.18579 51.6884 3.85217 51.6884H42.2189C43.8855 51.6884 45.2409 50.3326 45.2409 48.6659V26.9717C45.2409 25.3054 43.8855 23.9496 42.2189 23.9496Z" fill="#335C82"/><path d="M12.0821 34.5282H11.2469V33.6732H12.92V33.6904C12.92 34.1524 12.5441 34.5282 12.0821 34.5282ZM5.9244 33.6904V33.6732H7.59368V34.5282H6.76237C6.30034 34.5282 5.9244 34.1524 5.9244 33.6904ZM6.76237 29.7997H7.59368V30.6546H5.9244V30.6374C5.9244 30.1754 6.30034 29.7997 6.76237 29.7997ZM7.59368 32.698H5.9244V31.6299H7.59368V32.698ZM12.92 31.6299V32.698H11.2469V31.6299H12.92ZM12.92 30.6374V30.6546H10.7594C10.4902 30.6546 10.2719 30.8729 10.2719 31.1421V34.5282H8.56869V29.7997H12.0821C12.5441 29.7997 12.92 30.1754 12.92 30.6374ZM13.895 30.6374C13.895 29.6377 13.0817 28.8244 12.0821 28.8244H6.76237C5.7627 28.8244 4.94943 29.6377 4.94943 30.6374V33.6904C4.94943 34.6901 5.7627 35.5034 6.76237 35.5034H12.0821C13.0817 35.5034 13.895 34.6901 13.895 33.6904V30.6374Z" fill="#335C82"/><path d="M39.8509 45.402L38.1283 47.1247C38.0691 47.1838 37.9902 47.2166 37.9062 47.2166C37.8225 47.2166 37.7436 47.1838 37.6844 47.1243L36.8005 46.2408L36.9501 46.0915C37.1935 45.8481 37.3274 45.5242 37.3274 45.1799C37.3274 44.8357 37.1935 44.5118 36.9501 44.2687L36.8005 44.1191L37.6844 43.2355C37.7436 43.176 37.8225 43.1433 37.9062 43.1433C37.9902 43.1433 38.0691 43.176 38.1283 43.2355L39.8509 44.9582C39.9101 45.0173 39.9429 45.0963 39.9429 45.1799C39.9429 45.2639 39.9101 45.3425 39.8509 45.402ZM34.5379 47.1247C34.4787 47.1838 34.3998 47.2166 34.3162 47.2166C34.2322 47.2166 34.1532 47.1838 34.0941 47.1243L32.3714 45.4017C32.3122 45.3425 32.2795 45.2639 32.2795 45.1799C32.2795 45.0963 32.3122 45.0173 32.3714 44.9578L34.0941 43.2355C34.1532 43.176 34.2322 43.1433 34.3162 43.1433C34.3998 43.1433 34.4787 43.176 34.5379 43.2355L36.2606 44.9582C36.3201 45.0173 36.3525 45.0963 36.3525 45.1799C36.3525 45.2639 36.3201 45.3425 36.2606 45.4017L34.5379 47.1247ZM38.8178 42.546C38.5744 42.3026 38.2508 42.1683 37.9062 42.1683C37.5619 42.1683 37.2383 42.3026 36.9949 42.546L36.111 43.4299L35.2277 42.546C34.984 42.3026 34.6604 42.1683 34.3162 42.1683C33.9716 42.1683 33.648 42.3026 33.4046 42.546L31.6822 44.2683C31.4385 44.5118 31.3046 44.8357 31.3046 45.1799C31.3046 45.5242 31.4385 45.8481 31.6822 46.0915L33.4046 47.8138C33.648 48.0573 33.9716 48.1915 34.3162 48.1915C34.6604 48.1915 34.984 48.0573 35.2274 47.8138L36.111 46.9303L36.9949 47.8138C37.2383 48.0573 37.5619 48.1915 37.9062 48.1915C38.2508 48.1915 38.5744 48.0573 38.8178 47.8138L40.5401 46.0915C40.7838 45.8481 40.9178 45.5242 40.9178 45.1799C40.9178 44.8357 40.7838 44.5118 40.5401 44.2687L38.8178 42.546Z" fill="#335C82"/><path d="M5.76822 40.1683C6.03746 40.1683 6.25574 39.95 6.25574 39.6808V38.4965C6.25574 38.2273 6.03746 38.0091 5.76822 38.0091C5.499 38.0091 5.28073 38.2273 5.28073 38.4965V39.6808C5.28073 39.95 5.499 40.1683 5.76822 40.1683Z" fill="#335C82"/><path d="M7.72519 39.6808V38.4965C7.72519 38.2273 7.50692 38.0091 7.2377 38.0091C6.96846 38.0091 6.75018 38.2273 6.75018 38.4965V39.6808C6.75018 39.95 6.96846 40.1683 7.2377 40.1683C7.50692 40.1683 7.72519 39.95 7.72519 39.6808Z" fill="#335C82"/><path d="M9.19461 39.6808V38.4965C9.19461 38.2273 8.97637 38.0091 8.70712 38.0091C8.43788 38.0091 8.21964 38.2273 8.21964 38.4965V39.6808C8.21964 39.95 8.43788 40.1683 8.70712 40.1683C8.97637 40.1683 9.19461 39.95 9.19461 39.6808Z" fill="#335C82"/><path d="M10.1766 38.0091C9.90736 38.0091 9.68912 38.2273 9.68912 38.4965V39.6808C9.68912 39.95 9.90736 40.1683 10.1766 40.1683C10.4458 40.1683 10.6641 39.95 10.6641 39.6808V38.4965C10.6641 38.2273 10.4458 38.0091 10.1766 38.0091Z" fill="#335C82"/><path d="M13.5953 38.4965V39.6808C13.5953 39.95 13.8135 40.1683 14.0828 40.1683C14.352 40.1683 14.5703 39.95 14.5703 39.6808V38.4965C14.5703 38.2273 14.352 38.0091 14.0828 38.0091C13.8135 38.0091 13.5953 38.2273 13.5953 38.4965Z" fill="#335C82"/><path d="M15.5522 40.1683C15.8215 40.1683 16.0397 39.95 16.0397 39.6808V38.4965C16.0397 38.2273 15.8215 38.0091 15.5522 38.0091C15.283 38.0091 15.0647 38.2273 15.0647 38.4965V39.6808C15.0647 39.95 15.283 40.1683 15.5522 40.1683Z" fill="#335C82"/><path d="M17.0217 40.1683C17.2909 40.1683 17.5092 39.95 17.5092 39.6808V38.4965C17.5092 38.2273 17.2909 38.0091 17.0217 38.0091C16.7524 38.0091 16.5341 38.2273 16.5341 38.4965V39.6808C16.5341 39.95 16.7524 40.1683 17.0217 40.1683Z" fill="#335C82"/><path d="M18.4911 38.0091C18.2218 38.0091 18.0036 38.2273 18.0036 38.4965V39.6808C18.0036 39.95 18.2218 40.1683 18.4911 40.1683C18.7603 40.1683 18.9786 39.95 18.9786 39.6808V38.4965C18.9786 38.2273 18.7603 38.0091 18.4911 38.0091Z" fill="#335C82"/><path d="M22.3972 38.0091C22.128 38.0091 21.9098 38.2273 21.9098 38.4965V39.6808C21.9098 39.95 22.128 40.1683 22.3972 40.1683C22.6665 40.1683 22.8847 39.95 22.8847 39.6808V38.4965C22.8847 38.2273 22.6665 38.0091 22.3972 38.0091Z" fill="#335C82"/><path d="M23.8667 38.0091C23.5975 38.0091 23.3792 38.2273 23.3792 38.4965V39.6808C23.3792 39.95 23.5975 40.1683 23.8667 40.1683C24.1359 40.1683 24.3542 39.95 24.3542 39.6808V38.4965C24.3542 38.2273 24.1359 38.0091 23.8667 38.0091Z" fill="#335C82"/><path d="M25.3361 38.0091C25.0669 38.0091 24.8487 38.2273 24.8487 38.4965V39.6808C24.8487 39.95 25.0669 40.1683 25.3361 40.1683C25.6053 40.1683 25.8236 39.95 25.8236 39.6808V38.4965C25.8236 38.2273 25.6053 38.0091 25.3361 38.0091Z" fill="#335C82"/><path d="M26.8055 38.0091C26.5363 38.0091 26.318 38.2273 26.318 38.4965V39.6808C26.318 39.95 26.5363 40.1683 26.8055 40.1683C27.075 40.1683 27.2933 39.95 27.2933 39.6808V38.4965C27.2933 38.2273 27.075 38.0091 26.8055 38.0091Z" fill="#335C82"/><path d="M30.7118 38.0091C30.4426 38.0091 30.2243 38.2273 30.2243 38.4965V39.6808C30.2243 39.95 30.4426 40.1683 30.7118 40.1683C30.981 40.1683 31.1992 39.95 31.1992 39.6808V38.4965C31.1992 38.2273 30.981 38.0091 30.7118 38.0091Z" fill="#335C82"/><path d="M32.1811 40.1683C32.4503 40.1683 32.6686 39.95 32.6686 39.6808V38.4965C32.6686 38.2273 32.4503 38.0091 32.1811 38.0091C31.912 38.0091 31.6937 38.2273 31.6937 38.4965V39.6808C31.6937 39.95 31.912 40.1683 32.1811 40.1683Z" fill="#335C82"/><path d="M33.6509 40.1683C33.92 40.1683 34.1383 39.95 34.1383 39.6808V38.4965C34.1383 38.2273 33.92 38.0091 33.6509 38.0091C33.3814 38.0091 33.1631 38.2273 33.1631 38.4965V39.6808C33.1631 39.95 33.3814 40.1683 33.6509 40.1683Z" fill="#335C82"/><path d="M35.1202 40.1683C35.3894 40.1683 35.6077 39.95 35.6077 39.6808V38.4965C35.6077 38.2273 35.3894 38.0091 35.1202 38.0091C34.851 38.0091 34.6328 38.2273 34.6328 38.4965V39.6808C34.6328 39.95 34.851 40.1683 35.1202 40.1683Z" fill="#335C82"/><path d="M10.1766 43.0755H5.76822C5.499 43.0755 5.28073 43.2938 5.28073 43.5629C5.28073 43.8321 5.499 44.0504 5.76822 44.0504H10.1766C10.4458 44.0504 10.6641 43.8321 10.6641 43.5629C10.6641 43.2938 10.4458 43.0755 10.1766 43.0755Z" fill="#335C82"/><path d="M18.4911 43.0755H14.0828C13.8135 43.0755 13.5953 43.2938 13.5953 43.5629C13.5953 43.8321 13.8135 44.0504 14.0828 44.0504H18.4911C18.7604 44.0504 18.9786 43.8321 18.9786 43.5629C18.9786 43.2938 18.7604 43.0755 18.4911 43.0755Z" fill="#335C82"/></svg>
                <small>Tarjeta de crédito</small>
            </button>
            <button href="<?=$resp['answer']['paymentURL']?>">
                <img src="img/pselogo.svg" alt="pse">
                <small>PSE</small>
            </button>
        </div>
        <input type="hidden" name="vads_cust_first_name" id="vads_cust_first_name" value="<?=$vads_cust_first_name?>">
        <input type="hidden" name="vads_cust_id" id="vads_cust_id" value="<?=$vads_cust_id?>">
        <input type="hidden" name="vads_cust_cell_phone" id="vads_cust_cell_phone" value="<?=$vads_cust_cell_phone?>">
        <input type="hidden" name="vads_cust_email" id="vads_cust_email" value="<?=$vads_cust_email?>">
        <input type="hidden" name="vads_cust_address_number" id="vads_cust_address_number" value="<?=$vads_cust_address_number?>">
        <input type="hidden" name="select" id="select" value="<?=$select?>">
        <input type="hidden" name="price" id="price" value="<?=$price?>">
        <input type="hidden" name="politics" id="politics" value="<?=$politics?>">
        <input type="hidden" name="priceNoFormatted" id="priceNoFormatted" value="<?=$priceNoFormatted?>">
    </form>
</main>
<?php include 'includes/footer.php'; ?>
