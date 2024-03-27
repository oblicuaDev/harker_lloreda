<?php 
  $bodyClass= 'politics';
  include 'includes/head.php';
  $pageContent = $sdk->gPage($_GET["pageID"]);
?>
    <main>
        <section class="container">
          <h1><?=$pageContent->title->rendered?></h1>
            <?=$pageContent->content->rendered?>
        </section>
</main>
<?php include 'includes/footer.php'; ?>