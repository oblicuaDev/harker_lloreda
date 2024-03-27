<?php 
  $bodyClass= 'home';
  include 'includes/head.php';
  $banners = $sdk->gBannerHome();
?>
    <main>
      <section class="splide splideHome">
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
                stroke-width="3"
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
                stroke-width="3"
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
            <?php for ($i=0; $i < count($banners); $i++) { $banner = $banners[$i];?>
              <li class="splide__slide">
                <div class="banner-container">
                  <div class="banner">
                    <img src="<?=$banner->acf->imagen_o_video?>" alt="<?=$banner->title->rendered?>" />
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
                      <div class="txt">
                        <h2><?=$banner->title->rendered?></h2>
                        <h3><?=$banner->acf->subtitulo?></h3>
                        <?=$banner->content->rendered?>
                        <a href="<?=isset($banner->acf->link_de_boton) ? $banner->acf->link_de_boton: "/$lang/agenda-tu-cita"?>" class="btn primary"><?=$banner->acf->texto_boton != "" ? $banner->acf->texto_boton : "<?= $sdk->palabras[$lang][0]?>"?></a
                        >
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            <?php } ?>
          </ul>
        </div>
      </section>
      <article data-aos="fade-down" data-aos-duration="3000" id="equipo_destacado">
        <section class="container">
        </section>
      </article>
      <?php include 'templates/cifras.php';?>
      <article data-aos="fade-down" data-aos-duration="3000">
        <section class="video-info">
          <div class="container video-position">
            <h3><?=$sdk->infoGnrl->acf->titulo_video_home?></h3>
            <div class="video-container">
              <button type="button" id="play" class="play">
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
              </button>
              <video
                autobuffer
                poster=""
                preload="auto"
                onloadstart="this.volume=0.5"
                src="<?=$sdk->infoGnrl->acf->video_para_el_home?>"
              >
                <source src="<?=$sdk->infoGnrl->acf->video_para_el_home?>" />
              </video>
            </div>
            <?=$sdk->infoGnrl->acf->descripcion_video_home?>
          </div>
          <div class="container cards">
            <h3><?= $sdk->palabras[$lang][21]?></h3>
            <div class="card-grid"></div>
          </div>
        </section>
      </article>
      <article data-aos="fade-down" data-aos-duration="3000">
        <section class="container">
          <div class="info-extra" id="fuera"></div>
          <div class="info-extra" id="tour"></div>
          <div class="logos">
              <?php 
                for ($i=0; $i < count($sdk->infoGnrl->acf->logos_y_credenciales); $i++) {
                  $logo = $sdk->infoGnrl->acf->logos_y_credenciales[$i]->logo;
                  $link = $sdk->infoGnrl->acf->logos_y_credenciales[$i]->link;
                  if($logo){
              ?>
              <a href="<?=$link?$link:'#'?>">
                <img src="<?=$logo?>" alt="logos_y_credenciales" />
              </a>
            <?php }} ?>
          </div>
        </section>
      </article>
    </main>
<?php include 'includes/footer.php'; ?>