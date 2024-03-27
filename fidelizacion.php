<?php 
$bodyClass = "fidelizacion";
include 'includes/head.php';
?>
<?php $fidelizacion = $sdk->gFidelizacion($_GET['page']); ?>
<main data-tresid="<?=$fidelizacion->translations->es?>" data-trenid="<?=$fidelizacion->translations->en?>"
  data-tresslug="<?=$fidelizacion->translations->esslug?>" data-trenslug="<?=$fidelizacion->translations->enslug?>">
  <h2><?=$fidelizacion->acf->titulo_para_el_landing_page?></h2>
  <?php 
  $classContainer = array("container__left","container__right");
  for ($i=0; $i < count($fidelizacion->acf->franjas_del_landing_page); $i++) { 
    $content = $fidelizacion->acf->franjas_del_landing_page[$i];
  ?>
 <div class="<?= $classContainer[$i % 2] ?>">
        <?php if ($classContainer[$i % 2] == 'container__left') : ?>
            <!-- Si es container__left, primero la imagen, luego el texto -->
            <img src="<?= $content->imagen ?>" alt="" />
            <div class="txt">
                <h3><?= $content->titulo ?></h3>
                <?= $content->descripcion ?>
                <a href="<?= $content->link_de_boton ?>" class="btn primary"><?= $content->texto_de_boton ?></a>
            </div>
        <?php else : ?>
            <!-- Si es container__right, primero el texto, luego la imagen -->
            <div class="txt">
                <h3><?= $content->titulo ?></h3>
                <?= $content->descripcion ?>
                <a href="<?= $content->link_de_boton ?>" class="btn primary"><?= $content->texto_de_boton ?></a>
            </div>
            <img src="<?= $content->imagen ?>" alt="" />
        <?php endif; ?>
    </div>
  <?php } ?>
</main>
<?php include 'includes/footer.php'; ?>