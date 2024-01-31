<?php include 'includes/config.php'; ?>
<!DOCTYPE html>
<html lang="<?=isset($_GET['lang']) ? $_GET['lang'] : 'es'?>">
  <head>
    <base href="/lab/harker_lloreda/" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Harker & Lloreda</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link
      href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css"
      rel="stylesheet"
    />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
    />
    <link rel="stylesheet" href="css/styles.css?v=<?=time()?>" />
    <script>
      let actualLang = "<?=isset($_GET['lang']) ? $_GET['lang'] : 'es'?>";
    </script>
  </head>

  <body class="<?=$bodyClass?>">
    <?php include 'header.php'; ?>
  </body>
</html>
