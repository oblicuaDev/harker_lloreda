<?php 
  $bodyClass= 'agenda';
  include 'includes/head.php';
?>
  <main>
    <div class="container">
        <h2><?=$sdk->palabras[$lang][0]?></h2>
        <h3><?=$sdk->palabras[$lang][58]?></h3>
        <div class="selections">
            <a href="https://dermocitas.sicme.co/H4RLl0882" target="_blank"><img src="img/perfil_1.jpeg" alt="perfil"><span><?=$sdk->palabras[$lang][22]?></span></a>
            <a href="<?=$sdk->infoGnrl->acf->link_soy_paciente_nuevo?>" target="_blank"><img src="img/perfil_2.jpeg" alt="perfil"><span><?=$sdk->palabras[$lang][23]?></span></a>
        </div>
    </div>
  </main>
<?php include 'includes/footer.php'; ?>