<?php 
// Establecer la codificación interna de PHP a UTF-8
mb_internal_encoding("UTF-8");

  $bodyClass= 'procedimiento-inter-body';
  include 'includes/head.php';
  $procedimiento = $sdk->gProcedimiento($_GET["idPro"]); 

  // Utilizando DOMDocument para manipular el HTML
$dom = new DOMDocument();
// Cargar el HTML usando loadHTML con las opciones para forzar UTF-8
$dom->loadHTML('<?xml encoding="UTF-8">' . $procedimiento->acf->lista_de_beneficios, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

// Obteniendo los elementos <li>
$li_elements = $dom->getElementsByTagName('li');

// Creando un array en PHP para almacenar los textos de los elementos <li>
$li_texts = array();
foreach ($li_elements as $li) {
    $li_texts[] = $li->nodeValue;
}

// Convirtiendo el array PHP en una cadena JSON
$json_li_texts = json_encode($li_texts, JSON_UNESCAPED_UNICODE);
?>
<main data-antesdespues="<?=json_encode($procedimiento->acf->antes_despues)?>" data-proid="<?=$procedimiento->id?>">
  <div class="banner-interna-pro">
    <img src="<?=$procedimiento->acf->sqimage?>" alt="<?=$procedimiento->title->rendered?>">
    <div class="info">
      <h2><?=$procedimiento->title->rendered?></h2>
      <h3><?=$procedimiento->acf->nombre_cientifico?></h3>
    </div>
  </div>
  <div data-aos="fade-down"  class="container-p">
    <div class="txt">
      <?=$procedimiento->acf->descripcion_del_procedimiento?>>
      <a href="" class="btn primary"><?=$sdk->palabras[$lang][0]?></a>
    </div>
  </div>
  <?php if($procedimiento->acf->foto_listado_procedimiento && $procedimiento->acf->foto_o_video_de_cover_1920x900){ ?>
    <div class="container procedimientos">
      <div class="txt">
        <h4><?=$sdk->palabras[$lang][30]?></h4>
        <?=$procedimiento->acf->lista_de_beneficios?>
      </div>
      <div class="container doctor">
        <div class="video-card">
          <img src="<?=$procedimiento->acf->foto_o_video_de_cover_1920x900?>" alt="" id="image-0" />
        </div>
      </div>
  <?php }else{ ?>
      <div class="beneficios"><div class="container"><h4><?=$sdk->palabras[$lang][30]?></h4><h2 class="text" id="text"></h2></div></div>
  <?php } ?>

  <section data-aos="fade-down" >
    <div class="resultados-div">
      <div class="container">
        <div class="resultados__px">
          <h3><?=$sdk->palabras[$lang][31]?></h3>
          
          <section
            class="splide splide-comparison"
            aria-label="Splide Basic HTML Example"
          >
            <div class="splide__arrows">
              <button class="splide__arrow splide__arrow--prev">
                <svg
                  width="84"
                  height="84"
                  viewBox="0 0 84 84"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <rect
                    x="1"
                    y="1"
                    width="82"
                    height="82"
                    rx="41"
                    stroke="#335C82"
                    stroke-width="2"
                  />
                  <path
                    d="M21 42C20.4477 42 20 42.4477 20 43C20 43.5523 20.4477 44 21 44V42ZM63.2071 43.7071C63.5976 43.3166 63.5976 42.6834 63.2071 42.2929L56.8431 35.9289C56.4526 35.5384 55.8195 35.5384 55.4289 35.9289C55.0384 36.3195 55.0384 36.9526 55.4289 37.3431L61.0858 43L55.4289 48.6569C55.0384 49.0474 55.0384 49.6805 55.4289 50.0711C55.8195 50.4616 56.4526 50.4616 56.8431 50.0711L63.2071 43.7071ZM21 44H62.5V42H21V44Z"
                    fill="#335C82"
                  />
                </svg>
              </button>
              <button class="splide__arrow splide__arrow--next">
                <svg
                  width="84"
                  height="84"
                  viewBox="0 0 84 84"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <rect
                    x="1"
                    y="1"
                    width="82"
                    height="82"
                    rx="41"
                    stroke="#335C82"
                    stroke-width="2"
                  />
                  <path
                    d="M21 42C20.4477 42 20 42.4477 20 43C20 43.5523 20.4477 44 21 44V42ZM63.2071 43.7071C63.5976 43.3166 63.5976 42.6834 63.2071 42.2929L56.8431 35.9289C56.4526 35.5384 55.8195 35.5384 55.4289 35.9289C55.0384 36.3195 55.0384 36.9526 55.4289 37.3431L61.0858 43L55.4289 48.6569C55.0384 49.0474 55.0384 49.6805 55.4289 50.0711C55.8195 50.4616 56.4526 50.4616 56.8431 50.0711L63.2071 43.7071ZM21 44H62.5V42H21V44Z"
                    fill="#335C82"
                  />
                </svg>
              </button>
            </div>
            <div class="splide__track"><ul class="splide__list"></ul></div>
          </section>
        </div>
      </div>
    </div>
  </section>
</main>
<?php include 'templates/preguntas.php'; ?>

<section data-aos="fade-down" >
  <div class="rectangle-div container">
    <h4 class="bold"><?=$sdk->palabras[$lang][33]?></h4>

    <a href="" class="btn secondary"><?=$sdk->palabras[$lang][0]?></a>
  </div>
</section>
<!--Fin sección agenda cita  -->
<?php if(count($procedimiento->acf->galeria_de_fotos_tecnologia) > 0 ){
  if($procedimiento->acf->galeria_de_fotos_tecnologia[0] != ''){
  ?>
  <section class="container">
    <div class="tecnologia">
      <h3><?=$procedimiento->acf->titulo_de_la_galeria?></h3>
      <div class="tecnologia__imgs">
        <?php 
        for ($i=0; $i < count($procedimiento->acf->galeria_de_fotos_tecnologia); $i++) { 
          echo '<img src="'.$procedimiento->acf->galeria_de_fotos_tecnologia[$i].'" alt="tecnologia" />';
        } 
        ?>
      </div>
      <?=$procedimiento->acf->descripcion_de_la_galeria_de_fotos?>
    </div>
  </section>
<?php }} ?>

<section data-aos="fade-down" id="pacientes">
    <div class="pacientes container"">
        <div class=" pacientes__ayudados">
      <h4><?=$sdk->palabras[$lang][34]?></h4>
      <div class="pagination-container">
        <div id="testimoniosSlider" class="splide">
          <div class="splide__track">
            <ul class="splide__list">
            </ul>
          </div>
        </div>
      </div>
    </div>
    </div>
</section>
<section data-aos="fade-down" >
  <div class="rectangle-div container">
    <h4 class="bold"><?=$sdk->palabras[$lang][33]?></h4>

    <a href="" class="btn secondary"><?=$sdk->palabras[$lang][0]?></a>
  </div>
</section>
<!--Fin sección agenda cita  -->
<section data-aos="fade-down"  id="products">
  <div class="container__pro">
    <h3><?=$sdk->palabras[$lang][27]?></h3>
    <div class="grid-container container">
      <div class="grid-item__pro">
        <img src="img/image 4.png" alt="Product 1" />
        <p>Isdin fusion water con color (claro)SPF 50+ x50ML</p>

        <a href="" class="btn secondary"
          >Ver en tienda
          <svg
            width="20"
            height="21"
            viewBox="0 0 20 21"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M10 3.38379C6.20304 3.38379 3.125 6.46183 3.125 10.2588C3.125 14.0557 6.20304 17.1338 10 17.1338C13.797 17.1338 16.875 14.0557 16.875 10.2588C16.875 6.46183 13.797 3.38379 10 3.38379ZM1.875 10.2588C1.875 5.77148 5.51269 2.13379 10 2.13379C14.4873 2.13379 18.125 5.77148 18.125 10.2588C18.125 14.7461 14.4873 18.3838 10 18.3838C5.51269 18.3838 1.875 14.7461 1.875 10.2588Z"
              fill="currentColor"
            />
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M10.0346 7.16841C10.2787 6.92433 10.6744 6.92433 10.9185 7.16841L13.5669 9.81685C13.811 10.0609 13.811 10.4567 13.5669 10.7007L10.9185 13.3492C10.6744 13.5932 10.2787 13.5932 10.0346 13.3492C9.79054 13.1051 9.79054 12.7094 10.0346 12.4653L12.2411 10.2588L10.0346 8.05229C9.79054 7.80822 9.79054 7.41249 10.0346 7.16841Z"
              fill="currentColor"
            />
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M6.25 10.2588C6.25 9.91361 6.52982 9.63379 6.875 9.63379H13.125C13.4702 9.63379 13.75 9.91361 13.75 10.2588C13.75 10.604 13.4702 10.8838 13.125 10.8838H6.875C6.52982 10.8838 6.25 10.604 6.25 10.2588Z"
              fill="currentColor"
            /></svg
        ></a>
      </div>
      <div class="grid-item__pro">
        <img src="img/image 5.png" alt="Product 2" />
        <p>Sensyses cleanserRos x200ML</p>

        <a href="" class="btn secondary"
          >Ver en tienda
          <svg
            width="20"
            height="21"
            viewBox="0 0 20 21"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M10 3.38379C6.20304 3.38379 3.125 6.46183 3.125 10.2588C3.125 14.0557 6.20304 17.1338 10 17.1338C13.797 17.1338 16.875 14.0557 16.875 10.2588C16.875 6.46183 13.797 3.38379 10 3.38379ZM1.875 10.2588C1.875 5.77148 5.51269 2.13379 10 2.13379C14.4873 2.13379 18.125 5.77148 18.125 10.2588C18.125 14.7461 14.4873 18.3838 10 18.3838C5.51269 18.3838 1.875 14.7461 1.875 10.2588Z"
              fill="currentColor"
            />
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M10.0346 7.16841C10.2787 6.92433 10.6744 6.92433 10.9185 7.16841L13.5669 9.81685C13.811 10.0609 13.811 10.4567 13.5669 10.7007L10.9185 13.3492C10.6744 13.5932 10.2787 13.5932 10.0346 13.3492C9.79054 13.1051 9.79054 12.7094 10.0346 12.4653L12.2411 10.2588L10.0346 8.05229C9.79054 7.80822 9.79054 7.41249 10.0346 7.16841Z"
              fill="currentColor"
            />
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M6.25 10.2588C6.25 9.91361 6.52982 9.63379 6.875 9.63379H13.125C13.4702 9.63379 13.75 9.91361 13.75 10.2588C13.75 10.604 13.4702 10.8838 13.125 10.8838H6.875C6.52982 10.8838 6.25 10.604 6.25 10.2588Z"
              fill="currentColor"
            /></svg
        ></a>
      </div>
      <div class="grid-item__pro">
        <img src="img/image 6.png" alt="Product 3" />
        <p>Azelac Ru SerumDespigmentante x30ML</p>

        <a href="" class="btn secondary"
          >Ver en tienda
          <svg
            width="20"
            height="21"
            viewBox="0 0 20 21"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M10 3.38379C6.20304 3.38379 3.125 6.46183 3.125 10.2588C3.125 14.0557 6.20304 17.1338 10 17.1338C13.797 17.1338 16.875 14.0557 16.875 10.2588C16.875 6.46183 13.797 3.38379 10 3.38379ZM1.875 10.2588C1.875 5.77148 5.51269 2.13379 10 2.13379C14.4873 2.13379 18.125 5.77148 18.125 10.2588C18.125 14.7461 14.4873 18.3838 10 18.3838C5.51269 18.3838 1.875 14.7461 1.875 10.2588Z"
              fill="currentColor"
            />
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M10.0346 7.16841C10.2787 6.92433 10.6744 6.92433 10.9185 7.16841L13.5669 9.81685C13.811 10.0609 13.811 10.4567 13.5669 10.7007L10.9185 13.3492C10.6744 13.5932 10.2787 13.5932 10.0346 13.3492C9.79054 13.1051 9.79054 12.7094 10.0346 12.4653L12.2411 10.2588L10.0346 8.05229C9.79054 7.80822 9.79054 7.41249 10.0346 7.16841Z"
              fill="currentColor"
            />
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M6.25 10.2588C6.25 9.91361 6.52982 9.63379 6.875 9.63379H13.125C13.4702 9.63379 13.75 9.91361 13.75 10.2588C13.75 10.604 13.4702 10.8838 13.125 10.8838H6.875C6.52982 10.8838 6.25 10.604 6.25 10.2588Z"
              fill="currentColor"
            /></svg
        ></a>
      </div>
    </div>
  </div>
</section>
<?php include 'includes/footer.php'; ?>
<script>
// Creando una variable en JavaScript con la cadena JSON
const wordsToType = <?php echo $json_li_texts; ?>;
const textElement = document.getElementById("text");
const textToType = textElement.innerText;


const maxWordLength = Math.max(...wordsToType.map((word) => word.length));

let currentWordIndex = 0;
let currentWord = wordsToType[currentWordIndex];

let index = 0;
function typeText() {
  $('.text').fadeIn();
  textElement.innerText = currentWord.slice(0, index++);

  if (index <= currentWord.length) {
    setTimeout(typeText, 60);
  } else {
    setTimeout(eraseText, 5000);
  }
}

function eraseText() {
  $('.text').fadeOut();
  textElement.innerText = currentWord.slice(0, index);

  if (index > 0) {
    index--;
    setTimeout(eraseText, 1);
  } else {
    currentWordIndex = (currentWordIndex + 1) % wordsToType.length;
    currentWord = wordsToType[currentWordIndex];
    setTimeout(typeText, maxWordLength * 5);
  }
}

typeText();

</script>