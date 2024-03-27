<?php 
  $bodyClass= 'equipo';
  include 'includes/head.php';
  $pageEH = $sdk->gEquipoHumano();
?>
<main
  data-tresid="<?=$pageEH->translations->es?>" 
  data-trenid="<?=$pageEH->translations->en?>"
  data-tresslug="<?=$pageEH->translations->esslug?>" 
  data-trenslug="<?=$pageEH->translations->enslug?>"
>
  <div class="banner-container">
    <div class="banner">
      <img src="<?= $pageEH->acf->imagen_o_video?>" alt="banner" />
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
      <div class="container">
        <div class="txt txt-equipo">
          <h2>
           <?=$pageEH->title->rendered?>
          </h2>
          <p>
            <?=$pageEH->acf->subtitulo?>
          </p>
          <a href="" class="btn primary"
            ><?= $sdk->palabras[$lang][2]?>

            <svg width="0" height="0" xmlns="http://www.w3.org/2000/svg">
              <defs>
                <clipPath id="myClip">
                  <path
                    d="M1011.81 833.788C563.255 881.23 152.408 871.534 -2.73096 826.871L2.90186 0.662109L1952.48 13.9537L1946.59 877.674C1668.39 800.27 1451.79 787.251 1011.81 833.788Z"
                  />
                </clipPath>
              </defs>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="container" data data-aos="fade-down" data-aos-duration="3000">
    <div class="cita">
      <?=$pageEH->acf->descripcion_larga_de_instalaciones?>

      <a href="" class="btn primary"
        ><?= $sdk->palabras[$lang][0]?>
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
    <article data data-aos="fade-down" data-aos-duration="3000">
      <section class="video-info equipo">
        <div class="video-position">
          <h3><?= $sdk->palabras[$lang][25]?></h3>
          <div class="video-container">
            <a data-fancybox href="<?=$sdk->infoGnrl->acf->video_180_link?>" id="play" class="play">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="84"
                height="84"
                viewBox="0 0 84 84"
                fill="none"
              >
                <rect width="84" height="84" rx="42" fill="#335C82" />
                <path
                  d="M33.0283 56.1202V28.8798C33.0283 28.0788 33.923 27.6029 34.5872 28.0505L54.7978 41.6707C55.386 42.0671 55.386 42.9329 54.7978 43.3293L34.5872 56.9495C33.923 57.3971 33.0283 56.9212 33.0283 56.1202Z"
                  stroke="white"
                  stroke-width="2"
                  stroke-linecap="round"
                />
              </svg>
            </a>
            <img src="<?=$sdk->infoGnrl->acf->preview_tour_virtual?>" alt="">
          </div>
          <?=$pageEH->acf->descripcion_instalaciones?>
        </div>
      </section>
    </article>
    <article data-aos="fade-down" data-aos-duration="3000" id="equipo_destacado">
      <section class="container">
      </section>
    </article>
    <section data data-aos="fade-down" data-aos-duration="3000" class="teamothers">
      <h3><?= $sdk->palabras[$lang][24]?></h3>
      <div class="pagination-container">
        <div id="teamSlider" class="splide splideEquipo">
          <div class="splide__track">
            <ul class="splide__list">
            </ul>
          </div>
        </div>
      </div>
    </section>
  </div>
</main>
<?php include 'includes/footer.php'; ?>