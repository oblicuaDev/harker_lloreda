<?php 
  $bodyClass= 'teens';
  include 'includes/head.php';  $linea = $sdk->gLinea($_GET['id']);
?>
<main
  data-linea="<?=$_GET['id']?>"
  data-tresid="<?=$procedimientoCat->translations->es?>" 
  data-trenid="<?=$procedimientoCat->translations->en?>"
  data-tresslug="<?=$procedimientoCat->translations->esslug?>" 
  data-trenslug="<?=$procedimientoCat->translations->enslug?>"
>
  <div class="para_ellas">
    <div class="banner-container">
      <div class="banner">
        <img src="<?=$linea->acf->imagen_o_video_de_cover_1920x900_?>" alt="banner" />
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
              fill: #5ebbc0;
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
        <div class="container">
          <div class="txt">
            <h2><?=$linea->title->rendered?></h2>
            <h3><?=$linea->acf->subtitulo?></h3>
            <p><?=$linea->acf->descripcion_corta?></p>
            <a href="" class="btn primary"
              ><?= $sdk->palabras[$lang][2]?><svg
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
                />
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>

    <article data data-aos="fade-down" data-aos-duration="3000">
      <section class="favoritos">
        <div class="container">
          <div class="favoritos__1">
            <?=$linea->acf->parrafo_de_descripcion_larga?>
            <a href="<?=$linea->acf->link_boton_call_to_action?>" class="btn primary"
              ><?=$linea->acf->texto_boton_call_to_action?>
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
                />
              </svg>
            </a>
          </div>
        </div>
        <div class="favoritos__2">
          <div class="container">
            <h3 class="bold"><?= $sdk->palabras[$lang][37]?> <img src="img/Capa_1.png" alt="" /></h3>
            <section class="splide category-splide" aria-label="category-proc">
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
              <div class="splide__track">
                <ul class="splide__list">
                </ul>
              </div>
            </section>
          </div>
        </div>
      </section>
    </article>
    <section>
      <article class="procedimiento">
        <svg
          id="br"
          width="276"
          height="645"
          viewBox="0 0 276 645"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M336.392 21.0547C239.275 90.4348 178.509 10.9626 107.36 102.23C69.8315 150.426 76.3354 245.218 118.754 289.18C142.825 314.099 179.997 330.535 187.625 364.298C193.902 392.13 175.877 420.319 153.041 437.444C130.206 454.569 102.668 464.024 78.0514 478.55C45.0836 497.92 -6.42569 534.815 25.4705 624.902"
            stroke="#B1DDE0"
            stroke-opacity="0.7"
            stroke-width="30"
            stroke-linecap="square"
            stroke-linejoin="round"
          />
        </svg>

        <svg
          id="bl"
          width="406"
          height="636"
          viewBox="0 0 406 636"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M21.2798 295.459C61.0818 251.685 81.2944 190.606 75.514 131.615C73.5578 111.131 75.1397 91.0867 76.241 70.5511C79.3767 8.65672 125.68 -1.26685 168.152 43.5804C192.877 69.6574 220.845 91.7119 237.08 123.726C253.315 155.74 267.528 189.904 293.582 214.623C322.579 242.062 365.248 257.247 382.126 293.326C391.347 313.032 391.053 335.605 390.625 357.291C388.448 444.888 386.727 532.604 384.778 620.26"
            stroke="#B1DDE0"
            stroke-opacity="0.7"
            stroke-width="30"
            stroke-linecap="square"
            stroke-linejoin="round"
          />
        </svg>

        <svg
          id="center"
          width="357"
          height="369"
          viewBox="0 0 357 369"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <ellipse
            cx="178.168"
            cy="184.395"
            rx="215"
            ry="93.7903"
            transform="rotate(-46.4132 178.168 184.395)"
            stroke="#B1DDE0"
            stroke-opacity="0.7"
            stroke-width="30"
          />
        </svg>

        <svg
          id="tr"
          width="642"
          height="507"
          viewBox="0 0 642 507"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M901.857 459.552C843.9 490.512 712.824 526.227 652.182 421.414C576.379 290.398 533.934 207.074 356.326 292.317C178.717 377.56 -62.7684 244.679 40.1176 6.73889"
            stroke="#B1DDE0"
            stroke-opacity="0.7"
            stroke-width="30"
          />
        </svg>
        <svg
          id="tl"
          width="264"
          height="538"
          viewBox="0 0 264 538"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M-23.6792 518.064C60.2533 482.255 188.262 506.817 232.73 429.74C254.931 391.261 256.04 339.234 220.109 303.918C202.577 286.686 152.558 282.403 128.458 277.149C46.9165 259.372 49.2547 163.346 51.3216 115.518C52.9778 77.1927 53.9055 18.9484 -14.3265 15.9998"
            stroke="#B1DDE0"
            stroke-opacity="0.7"
            stroke-width="30"
            stroke-linecap="square"
          />
        </svg>

        <section class="procedimiento container">
          <h3 class="bold"><?= $sdk->palabras[$lang][38]?></h3>
          <div class="container procedimientos">
          </div>
        </section>
      </article>
    </section>

    <section class="agendate">
      <div class="container">
        <h4 class="bold"><?= $sdk->palabras[$lang][39]?></h4>
        <div class="iconos">
          <div class="icono">
            <div class="icono__img">
              <img src="img/manosEllas.png" alt="" />
            </div>
            <h5 class="bold"><?= $sdk->palabras[$lang][40]?></h5>
          </div>
          <span>+</span>
          <div class="icono">
            <div class="icono__img">
              <img src="img/estrellaEllas.png" alt="" />
            </div>
            <h5 class="bold"><?= $sdk->palabras[$lang][41]?></h5>
          </div>
          <span>=</span>
          <div class="icono">
            <div class="icono__img">
              <img src="img/corazonEllas.png" alt="" />
            </div>
            <h5 class="bold"><?= $sdk->palabras[$lang][42]?></h5>
          </div>
        </div>
        <p>
        <?= $sdk->palabras[$lang][43]?>
        </p>
        <a href="" class="btn secondary"><?= $sdk->palabras[$lang][0]?></a>
      </div>
    </section>
    <article data data-aos="fade-down" data-aos-duration="3000">
      <section class="pacientes container">
        <div class="pacientes__satisfechos">
          <img src="img/pics.png" alt="" class="pics" />
          <div class="cifras">
            <h3>+54</h3>
            <p><?= $sdk->palabras[$lang][444]?></p>
          </div>
        </div>
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
      </section>
    </article>
  </div>
</main>
<?php include 'includes/footer.php'; ?>
