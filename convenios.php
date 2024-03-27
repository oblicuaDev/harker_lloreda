<?php 
$bodyClass = "convenios";
include 'includes/head.php';
?>
<?php $convenios = $sdk->gConvenios(); ?>
<main>
    <h2><?=$convenios->acf->titulo?></h2>
    <?php 
      $classContainer = array("container__left","container__right");
      for ($i=0; $i < count($convenios->acf->franjas_landing); $i++) { 
      $content = $convenios->acf->franjas_landing[$i];
    ?>
    <div class="<?= $classContainer[$i % 2] ?>">
      <?php if ($classContainer[$i % 2] == 'container__left') : ?>
          <!-- Si es container__left, primero la imagen, luego el texto -->
          <img src="<?= $content->imagen ?>" alt="" />
          <div class="txt">
              <h3><?= $content->titulo ?></h3>
              <?= $content->descripcion ?>
              <a href="<?= $content->link_boton ?>" class="btn primary"><?= $content->texto_boton ?></a>
          </div>
      <?php else : ?>
          <!-- Si es container__right, primero el texto, luego la imagen -->
          <div class="txt">
              <h3><?= $content->titulo ?></h3>
              <?= $content->descripcion ?>
              <a href="<?= $content->link_boton ?>" class="btn primary"><?= $content->texto_boton ?></a>
          </div>
          <img src="<?= $content->imagen ?>" alt="" />
      <?php endif; ?>
    </div>
    <?php } ?>
  <div class="container__conv">
    <h3>
      Empresas que consienten a su personal con
      <?= $sdk->palabras[$lang][7]?>
    </h3>
  </div>
  <section data-aos="fade-down" data-aos-duration="3000">
    <div class="container__ex">
      <section class="faq-container" id="empresas_convenio">
      </section>
    </div>
  </section>
  <?php include 'templates/preguntas.php'; ?>
</main>
<?php include 'includes/footer.php'; ?>
