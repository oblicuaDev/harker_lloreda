<?php 
extract($_POST);
$bodyClass= 'responsePay'; include 'includes/head.php'; 
//Oreka Cloud Insert
$values=[
    "0000-hl",
    "Julian Delgado",
    "3203712824",
    "1018477801",
    "drienovcorp@gmail.com",
    "Calle 63 C # 22-30",
    "Valoración Medicina estética",
    150000,
    28566,
    ""];
// $values=[
//     $_POST['vads_trans_id'],
//     $_POST['vads_cust_first_name']." ".
//     $_POST['vads_cust_last_name'],
//     $_POST['vads_cust_cell_phone'],
//     $_POST['vads_cust_id'],
//     $_POST['vads_cust_email'],
//     $_POST['vads_cust_address_number'],
//     $_POST['vads_order_info'],(
//     $_POST['vads_amount']/100),
//     28565,
//     $_POST['ref']];
$idfies="279,280,281,282,284,285,286,287,288,290";
$types="char_val,char_val,char_val,char_val,char_val,char_val,char_val,val_val,val_val,char_val";
$response = $sdk->orekaPostRow(40,1,$idfies,$types,$values);

?>
<main>
    <div class="container">
        <div class="thanks outter" id="success" style="display:none;">
            <div class="infoThanks">
                <h1 class="">Pago exitoso</h1>
                <p>Hemos recibido tu pago, pronto recibirás un correo con la confirmación del mismo. Gracias por confiar en
                    el equipo Harker / Lloreda.</p>
                <a href="<?=$lang?>" class="uppercase btn primary font2">Aceptar</a>
            </div>
        </div>
        <div class="thanks outter" id="error" style="display:none;">
            <div class="infoThanks">
                <h1 class="font2">Error en el pago</h1>
                <p>Tu pago no pudo ser procesado. Si crees que es un error, puedes volver a intentarlo a continuación:</p>
                <a href="<?=$lang?>/pago-en-linea" class="uppercase btn primary  ">Reintentar</a>
            </div>
        </div>
    </div>
</main>
<?php include 'includes/footer.php'; ?>
<script>
    let response = JSON.parse(<?= json_encode($_POST['kr-answer']) ?>);
    let status = response.orderStatus;
    if (status == "PAID") {
        document.querySelector("#success").style.display = "block";
    } else {
        document.querySelector("#error").style.display = "block";
    }


</script>