<?php include "includes/config.php"; ?>
<!DOCTYPE html>
<html lang="<?= isset($_GET["lang"]) ? $_GET["lang"] : "es" ?>">
  <head>
    <base href="/lab/harker_lloreda/" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?= $sdk->create_metas(
        isset($_GET["seo"]) ? $_GET["seo"] : "",
        isset($_GET["type"]) ? $_GET["type"] : "pages"
    ) ?>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link
      href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css"
      rel="stylesheet"
    />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link
      rel="stylesheet"
      href="https://unpkg.com/image-compare-viewer/dist/image-compare-viewer.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
    />
    <link rel="stylesheet" href="css/styles.css?v=<?= time() ?>" />
    <link rel="stylesheet" href="css/newstyles.css?v=<?= time() ?>" />
    <script>
      let actualLang = "<?= isset($_GET["lang"]) ? $_GET["lang"] : "es" ?>";
      let palabras = <?= json_encode($sdk->palabras) ?>;
      let infoGnrl = <?= json_encode($sdk->infoGnrl) ?>;
    </script>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TT6H78SL');</script>
<!-- End Google Tag Manager -->
  <!-- Javascript library. Should be loaded in head section -->
  <script src="https://static.payzen.lat/static/js/krypton-client/V4.0/stable/kr-payment-form.min.js"  kr-public-key="41481102:testpublickey_i2QC86fSwHVAt81zMqC2YOXFjcNR1XNnXkbSyk25gIEMK"  kr-post-url-success="<?=$lang?>/respuesta-pago"></script>
  <link rel="stylesheet" href="https://static.payzen.lat/static/js/krypton-client/V4.0/ext/neon-reset.css">
 <script src="https://static.payzen.lat/static/js/krypton-client/V4.0/ext/neon.min.js"></script>

  </head>

  <body class="<?= $bodyClass ?>">
  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TT6H78SL"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <?php include "header.php"; ?>
