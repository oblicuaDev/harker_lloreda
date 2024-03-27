<?php 
$bodyClass= "docinter";
include 'includes/head.php'; 
$doctor = $sdk->getDoctor($_GET["id"]);
?>
<main 
data-doctorid="<?=$_GET["id"]?>" 
data-doctorpro="<?=json_encode($doctor->acf->procedimientos_relacionados)?>"
data-tresid="<?=$doctor->translations->es?>" 
data-trenid="<?=$doctor->translations->en?>"
data-tresslug="<?=$doctor->translations->esslug?>" 
data-trenslug="<?=$doctor->translations->enslug?>"
>
  <section>
    <div class="banner-container">
      <div class="banner text-right">
        <img src="<?=$doctor->acf->foto_cover_o_video_?>" alt="banner" />
        <div class="container">
          <div class="txt">
            <h2><?=$doctor->title->rendered?></h2>
            <?=$doctor->content->rendered?>
            <a href="" class="btn primary-2">  <?=$doctor->acf->texto_cta_banner_interna?>
              <svg width="0" height="0" xmlns="http://www.w3.org/2000/svg">
                <defs>
                  <clipPath id="myClip">
                    <path
                      d="M1011.81 833.788C563.255 881.23 152.408 871.534 -2.73096 826.871L2.90186 0.662109L1952.48 13.9537L1946.59 877.674C1668.39 800.27 1451.79 787.251 1011.81 833.788Z" />
                  </clipPath>
                </defs>
              </svg></a>
          </div>
        </div>
      </div>
      <svg
                  id="line"
                  version="1.1"
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                  x="0px"
                  y="0px"
                  viewBox="0 0 1949.3 102.5"
                  xml:space="preserve"
                >
                  <style type="text/css">
                    .st0 {
                      fill: #ffffff;
                    }

                    .st1 {
                      fill: #335c82;
                    }
                  </style>
                  <path
                    class="st0"
                    d="M1014.5,58.6C566,106.1,155.1,96.4,0,51.7v50.8h1949.3C1671.1,25.1,1454.5,12.1,1014.5,58.6z"
                  />
                  <path
                    class="st1"
                    d="M1011.6,37.8C565.9,85,157.4,89.4,0,45.6l0,6.1c155.1,44.7,566,54.4,1014.5,6.9c440-46.5,656.6-33.5,934.8,43.9
                                              V63.4C1671.1-14,1451.6-8.7,1011.6,37.8z"
                  />
                </svg>
    </div>
  </section>
  <section data-aos="fade-down" data-aos-duration="3000">
    <div class="container__left">
      <img src="<?=$doctor->acf->imagen_informacion_complementaria?>" alt="doctor" />
      <div class="txt">
        <h3><?=$doctor->acf->titulo_para_informacion_complementaria?></h3>
        <?=$doctor->acf->informacion_complementaria?>
        <a href="<?=$doctor->acf->link_cta_info_comp?>" class="btn primary"><?=$doctor->acf->texto_cta_info_comp?>
          <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M10 3.38379C6.20304 3.38379 3.125 6.46183 3.125 10.2588C3.125 14.0557 6.20304 17.1338 10 17.1338C13.797 17.1338 16.875 14.0557 16.875 10.2588C16.875 6.46183 13.797 3.38379 10 3.38379ZM1.875 10.2588C1.875 5.77148 5.51269 2.13379 10 2.13379C14.4873 2.13379 18.125 5.77148 18.125 10.2588C18.125 14.7461 14.4873 18.3838 10 18.3838C5.51269 18.3838 1.875 14.7461 1.875 10.2588Z"
              fill="currentColor" />
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M10.0346 7.16841C10.2787 6.92433 10.6744 6.92433 10.9185 7.16841L13.5669 9.81685C13.811 10.0609 13.811 10.4567 13.5669 10.7007L10.9185 13.3492C10.6744 13.5932 10.2787 13.5932 10.0346 13.3492C9.79054 13.1051 9.79054 12.7094 10.0346 12.4653L12.2411 10.2588L10.0346 8.05229C9.79054 7.80822 9.79054 7.41249 10.0346 7.16841Z"
              fill="currentColor" />
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M6.25 10.2588C6.25 9.91361 6.52982 9.63379 6.875 9.63379H13.125C13.4702 9.63379 13.75 9.91361 13.75 10.2588C13.75 10.604 13.4702 10.8838 13.125 10.8838H6.875C6.52982 10.8838 6.25 10.604 6.25 10.2588Z"
              fill="currentColor" />
          </svg></a>
      </div>
    </div>
  </section>
  <?php include 'templates/cifras.php';?>
  <section data data-aos="fade-down" data-aos-duration="3000">
    <div class="pacientes container">
        <div class="pacientes__ayudados">
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
</main>
<section data-aos="fade-down" data-aos-duration="3000">
  <div class="container">
    <h3 class="bold"><?=$sdk->palabras[$lang][60]?></h3>
    <section class="splide category-splide" aria-label="category-proc">
      <div class="splide__arrows">
        <button class="splide__arrow splide__arrow--prev">
          <svg width="84" height="84" viewBox="0 0 84 84" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="1" y="1" width="82" height="82" rx="41" stroke="#335C82" stroke-width="2" />
            <path
            d="M21 42C20.4477 42 20 42.4477 20 43C20 43.5523 20.4477 44 21 44V42ZM63.2071 43.7071C63.5976 43.3166 63.5976 42.6834 63.2071 42.2929L56.8431 35.9289C56.4526 35.5384 55.8195 35.5384 55.4289 35.9289C55.0384 36.3195 55.0384 36.9526 55.4289 37.3431L61.0858 43L55.4289 48.6569C55.0384 49.0474 55.0384 49.6805 55.4289 50.0711C55.8195 50.4616 56.4526 50.4616 56.8431 50.0711L63.2071 43.7071ZM21 44H62.5V42H21V44Z"
            fill="#335C82" />
          </svg>
        </button>
        <button class="splide__arrow splide__arrow--next">
          <svg width="84" height="84" viewBox="0 0 84 84" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="1" y="1" width="82" height="82" rx="41" stroke="#335C82" stroke-width="2" />
            <path
            d="M21 42C20.4477 42 20 42.4477 20 43C20 43.5523 20.4477 44 21 44V42ZM63.2071 43.7071C63.5976 43.3166 63.5976 42.6834 63.2071 42.2929L56.8431 35.9289C56.4526 35.5384 55.8195 35.5384 55.4289 35.9289C55.0384 36.3195 55.0384 36.9526 55.4289 37.3431L61.0858 43L55.4289 48.6569C55.0384 49.0474 55.0384 49.6805 55.4289 50.0711C55.8195 50.4616 56.4526 50.4616 56.8431 50.0711L63.2071 43.7071ZM21 44H62.5V42H21V44Z"
            fill="#335C82" />
          </svg>
        </button>
      </div>      
      <div class="splide__track">
        <ul class="splide__list">
        </ul>
      </div>
    </section> 
  </div>
</section>
<!-- <section data-aos="fade-down" data-aos-duration="3000">
  <div class="container__ex">
    <div class="pregunta">
      <h3>Experto en los procedimientos</h3>
      <section class="faq-container" aria-label="Frequently Asked Questions">
        <details>
          <summary>
            <span class="faq-title">Quirúrgicos</span>
            <svg width="37" height="22" viewBox="0 0 37 22" fill="none" xmlns="http://www.w3.org/2000/svg"
              class="icon icon-tabler icon-tabler-circle-plus expand-icon">
              <path d="M34 19.499L18.5 3.99902L3 19.499" stroke="white" stroke-width="5" stroke-linecap="round" />
            </svg>
            <svg class="icon icon-tabler icon-tabler-circle-minus expand-icon" width="37" height="23"
              viewBox="0 0 37 23" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M3 3.00098L18.5 18.501L34 3.00098" stroke="white" stroke-width="5" stroke-linecap="round" />
            </svg>
          </summary>
          <div class="faq-content">
            <div class="proced-extr">
              <div class="proced-extr__quirurgicos">
                <hr />
                <a href="">
                  <h4>Mommy Maker Over</h4>
                </a>
                <hr />
                <a href="">
                  <h4>Cirugías de senos</h4>
                </a>
                <hr />
                <a href="">
                  <h4>
                    Liposucción 3D (Lipo con microaire, bodytite + morpheus)
                  </h4>
                </a>
                <hr />
                <a href="">
                  <h4>Abdominoplastia</h4>
                </a>
                <hr />
              </div>
              <div class="proced-extr__no-quirurgicos">
                <hr />
                <a href="">
                  <h4>Mommy Maker Over</h4>
                </a>
                <hr />
                <a href="">
                  <h4>Cirugías de senos</h4>
                </a>
                <hr />
                <a href="">
                  <h4>
                    Liposucción 3D (Lipo con microaire, bodytite + morpheus)
                  </h4>
                </a>
                <hr />
                <a href="">
                  <h4>Abdominoplastia</h4>
                </a>
                <hr />
              </div>
            </div>
          </div>
        </details>
      </section>
    </div>
    
    <div class="pregunta">
      <section class="faq-container" aria-label="Frequently Asked Questions">
        <details>
          <summary>
            <span class="faq-title">No quirúrgicos</span>
            <svg width="37" height="22" viewBox="0 0 37 22" fill="none" xmlns="http://www.w3.org/2000/svg"
              class="icon icon-tabler icon-tabler-circle-plus expand-icon">
              <path d="M34 19.499L18.5 3.99902L3 19.499" stroke="white" stroke-width="5" stroke-linecap="round" />
            </svg>
            <svg class="icon icon-tabler icon-tabler-circle-minus expand-icon" width="37" height="23"
              viewBox="0 0 37 23" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M3 3.00098L18.5 18.501L34 3.00098" stroke="white" stroke-width="5" stroke-linecap="round" />
            </svg>
          </summary>
          <div class="faq-content">
            <div class="proced-extr">
              <div class="proced-extr__quirurgicos">
                <hr />
                <a href="">
                  <h4>Mommy Maker Over</h4>
                </a>
                <hr />
                <a href="">
                  <h4>Cirugías de senos</h4>
                </a>
                <hr />
                <a href="">
                  <h4>
                    Liposucción 3D (Lipo con microaire, bodytite + morpheus)
                  </h4>
                </a>
                <hr />
                <a href="">
                  <h4>Abdominoplastia</h4>
                </a>
                <hr />
              </div>
              <div class="proced-extr__no-quirurgicos">
                <hr />
                <a href="">
                  <h4>Mommy Maker Over</h4>
                </a>
                <hr />
                <a href="">
                  <h4>Cirugías de senos</h4>
                </a>
                <hr />
                <a href="">
                  <h4>
                    Liposucción 3D (Lipo con microaire, bodytite + morpheus)
                  </h4>
                </a>
                <hr />
                <a href="">
                  <h4>Abdominoplastia</h4>
                </a>
                <hr />
              </div>
            </div>
          </div>
        </details>
      </section>
    </div>
  </div>
</section> -->
<?php if($doctor->banner_inferior->titulo){ ?>
  <section>
    <div class="rectangle-div container">
      <h4 class="bold"><?=$doctor->banner_inferior->titulo?></h4>
      <a href="<?=$doctor->banner_inferior->link_boton?>" class="btn secondary"><?=$doctor->banner_inferior->texto_boton?></a>
    </div>
  </section>
<?php } ?>
<?php include 'templates/preguntas.php'; ?>
<?php include 'includes/footer.php'; ?>