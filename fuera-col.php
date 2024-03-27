<?php
$bodyClass = "fueracol";
include "includes/head.php";
$info = $sdk->gPacientesFueraDeColombia($_GET['page']);
?>
<main data-tresid="<?=$info->translations->es?>" data-trenid="<?=$info->translations->en?>"
  data-tresslug="<?=$info->translations->esslug?>" data-trenslug="<?=$info->translations->enslug?>">
  <?php
  $datos2 = $info->acf->franjas_del_landing;
  foreach ($datos2 as $i => $dato) {
    $titulo = $dato->titulo ?? $dato->title->rendered;
    $descripcion = $dato->descripcion;
    $imagen = isset($dato->imagen) ? $dato->imagen : $dato->acf->testcover;
    $texto_de_boton = isset($dato->texto_de_boton) ? $dato->texto_de_boton : (isset($dato->acf->text_de_call_to_action) ? $dato->acf->text_de_call_to_action : "Agendar mi consulta");
    $link_de_boton = isset($dato->link_de_boton) ? $dato->link_de_boton : "";
  ?>
  <div class="<?= $i % 2 == 0 ? " container__left" : "container__right" ?>">
    <img src="<?=$imagen?>" alt="<?=$titulo?>" />
    <div class="txt">
      <h3>
        <?=$titulo?>
      </h3>
      <?=$descripcion?>
      <a href="" class="btn primary">
        <?=$texto_de_boton ?>
      </a>
    </div>
  </div>
  <?php } ?>
  <section data data-aos="fade-down" data-aos-duration="3000">
    <div class="container fuera-col">
      <h3><?=$sdk->palabras[$lang][61]?></h3>
      <div id="primary-slider" class="splide splideEquipo">
        <div class="splide__track">
          <ul class="splide__list">
            <?php 
            $doctors = $sdk->gEquipoDestacadoHome();
            usort($doctors, function($a, $b) {return $a->acf->orden - $b->acf->orden;});
            for ($i=0; $i < count($doctors); $i++) { 
              $doctor = $doctors[$i];
              ?>
            <li class="splide__slide">
              <div class="container doctor left-doc">
                <div class="image-card">
                  <a class="video-card" data-fancybox="gallery">
                    <img src="<?=$doctor->acf->foto_vertical_?>" alt="doc" />
                  </a>
                </div>
                <div class="txt">
                  <h4><?=$doctor->title->rendered?></h4>
                  <?=$doctor->content->rendered?>
                  <a href="/lab/harker_lloreda/<?=$lang?>/equipo-humano/<?=$sdk->get_alias($doctor->title->rendered)?>-<?=$doctor->id?>"
                    class="btn primary">
                    <?=$doctor->acf->texto_cta_home?>
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
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <div class="phrase">
    <?=$info->acf->parrafo_complementario_y_aclaratorio_del_servicio?>
    <a href="" class="btn primary"><?=$info->acf->texto_boton_parrafo_complementario?></a>
  </div>
  <div class="container">
    <h2><?=$info->acf->titulo_para_el_landing_page?></h2>
    <section class="splide" id="fureacolSplide" aria-label="Splide Basic HTML Example">
      <div class="splide__arrows splide__arrows--ltr">
        <button class="splide__arrow splide__arrow--prev" type="button" aria-label="Previous slide"
          aria-controls="splide01-track">
          <svg width="84" height="84" viewBox="0 0 84 84" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="1" y="1" width="82" height="82" rx="41" stroke="#335C82" stroke-width="3"></rect>
            <path
              d="M21 42C20.4477 42 20 42.4477 20 43C20 43.5523 20.4477 44 21 44V42ZM63.2071 43.7071C63.5976 43.3166 63.5976 42.6834 63.2071 42.2929L56.8431 35.9289C56.4526 35.5384 55.8195 35.5384 55.4289 35.9289C55.0384 36.3195 55.0384 36.9526 55.4289 37.3431L61.0858 43L55.4289 48.6569C55.0384 49.0474 55.0384 49.6805 55.4289 50.0711C55.8195 50.4616 56.4526 50.4616 56.8431 50.0711L63.2071 43.7071ZM21 44H62.5V42H21V44Z"
              fill="#335C82"></path>
          </svg>
        </button>
        <button class="splide__arrow splide__arrow--next" type="button" aria-label="Next slide"
          aria-controls="splide01-track">
          <svg width="84" height="84" viewBox="0 0 84 84" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="1" y="1" width="82" height="82" rx="41" stroke="#335C82" stroke-width="3"></rect>
            <path
              d="M21 42C20.4477 42 20 42.4477 20 43C20 43.5523 20.4477 44 21 44V42ZM63.2071 43.7071C63.5976 43.3166 63.5976 42.6834 63.2071 42.2929L56.8431 35.9289C56.4526 35.5384 55.8195 35.5384 55.4289 35.9289C55.0384 36.3195 55.0384 36.9526 55.4289 37.3431L61.0858 43L55.4289 48.6569C55.0384 49.0474 55.0384 49.6805 55.4289 50.0711C55.8195 50.4616 56.4526 50.4616 56.8431 50.0711L63.2071 43.7071ZM21 44H62.5V42H21V44Z"
              fill="#335C82"></path>
          </svg>
        </button>
      </div>
      <div class="splide__track">
        <ul class="splide__list">
          <?php
         
            $datos =  $info->acf->franjas_del_landing_page;
            foreach ($datos as $i => $dato) {
                $titulo = $dato->titulo ?? $dato->title->rendered;
                $imagen = isset($dato->imagen) ? $dato->imagen : $dato->acf->testcover;
                $video = isset($dato->video) ? $dato->video : $dato->acf->video_vertical;
                $texto_de_boton = isset($dato->texto_de_boton) ? $dato->texto_de_boton : (isset($dato->acf->text_de_call_to_action) ? $dato->acf->text_de_call_to_action : "Agendar mi consulta");
                $link_de_boton = isset($dato->link_de_boton) ? $dato->link_de_boton : "";
                // HTML común
                ?>
          <li class="splide__slide">
            <div class="info_fueracol">
              <div class="video-card">
                <button type="button" id="video-btn-<?=$i?>" class="video-btn">
                  <svg xmlns="http://www.w3.org/2000/svg" width="84" height="84" viewBox="0 0 84 84" fill="none">
                    <rect width="84" height="84" rx="42" fill="#335C82" />
                    <path
                      d="M33.0283 56.1202V28.8798C33.0283 28.0788 33.923 27.6029 34.5872 28.0505L54.7978 41.6707C55.386 42.0671 55.386 42.9329 54.7978 43.3293L34.5872 56.9495C33.923 57.3971 33.0283 56.9212 33.0283 56.1202Z"
                      stroke="white" stroke-width="2" stroke-linecap="round" />
                  </svg>
                </button>
                <img src="<?=$imagen?>" alt="<?=$titulo?>" id="image-<?=$i?>" />
                <video src="<?=$video?>" id="video-<?=$i?>">
                  <source src="<?=$video?>" ; />
                </video>
              </div>
              <div class="txt">
                <h3>
                  <?=$titulo?>
                </h3>
                <?php if (isset($dato->descripcion)) echo $dato->descripcion; ?>
                <a href="<?=$link_de_boton?>" class="btn primary">
                  <?=$texto_de_boton?>
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
                  </svg>
                </a>
              </div>
            </div>
          </li>
          <?php } ?>
        </ul>
      </div>
    </section>
  </div>
  <div class="container">
    <div class="tecnologia">
      <h3><?=$sdk->palabras[$lang][62]?></h3>
      <section class="splide" aria-label="Splide Basic HTML Example" id="splideGallery">
        <div class="splide__track">
          <ul class="splide__list">
            <?php
                for ($i=0; $i < count($info->acf->galeria_de_imagenes_tecnologia); $i++) { 
                  $imagenGal = $info->acf->galeria_de_imagenes_tecnologia[$i];
                  ?>
            <li class="splide__slide"><img src="<?=$imagenGal?>" alt="tecnologia" /></li>
            <?php } ?>
          </ul>
        </div>
      </section>
      <?=$info->acf->parrafo_descriptivo_de_la_galeria_de_imagenes?>
    </div>
  </div>
  <?php include "templates/cifras.php"; ?>
  <article data-aos="fade-down" data-aos-duration="3000">
    <div class="container">
      <h3>
        <?= $sdk->palabras[$lang][21]?>
      </h3>
      <section class="splide category-splide" aria-label="category-proc" id="procedimientosDestacados">
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
  </article>
  <div class="bg-c">
    <h3 class="bold">Sentirte mejor contigo es posible</h3>
    <div class="redes">
      <a target="_blank" href="<?php
                // Utilizamos expresiones regulares para extraer los dígitos
                $digitos = preg_replace('/[^\d]/', '', $sdk->infoGnrl->acf->whatsapp);
                // Añadimos el código del país al principio (57 en este caso)
                $codigoPais = '57';
                $telefonoFinal = $digitos;

                echo " https://api.whatsapp.com/send/?phone=".$telefonoFinal . "
        &text=" . $sdk->infoGnrl->acf->mensaje_whatsapp;?>" class="red">
        <svg width="50" height="51" viewBox="0 0 50 51" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M0 50.7412L3.51458 37.9016C1.34583 34.1433 0.20625 29.8829 0.208333 25.5141C0.214583 11.8558 11.3291 0.741211 24.9854 0.741211C31.6124 0.743294 37.8332 3.32454 42.5124 8.00788C47.1895 12.6912 49.7645 18.9162 49.7624 25.537C49.7561 39.1975 38.6416 50.312 24.9854 50.312C20.8395 50.31 16.7541 49.2704 13.1354 47.2954L0 50.7412ZM13.7437 42.81C17.2354 44.8829 20.5687 46.1245 24.977 46.1266C36.327 46.1266 45.5728 36.8891 45.5791 25.5329C45.5832 14.1537 36.3812 4.92871 24.9937 4.92454C13.6354 4.92454 4.39582 14.162 4.39166 25.5162C4.38957 30.1516 5.7479 33.6225 8.02915 37.2537L5.9479 44.8537L13.7437 42.81ZM37.4666 31.4266C37.3124 31.1683 36.8999 31.0141 36.2791 30.7037C35.6603 30.3933 32.6166 28.8954 32.0478 28.6891C31.4812 28.4829 31.0687 28.3787 30.6541 28.9995C30.2416 29.6183 29.0541 31.0141 28.6937 31.4266C28.3333 31.8391 27.9708 31.8912 27.352 31.5808C26.7333 31.2704 24.7374 30.6183 22.3729 28.5079C20.5333 26.8662 19.2895 24.8391 18.9291 24.2183C18.5687 23.5995 18.8916 23.2641 19.2 22.9558C19.4791 22.6787 19.8187 22.2329 20.1291 21.8704C20.4437 21.512 20.5458 21.2537 20.7541 20.8391C20.9604 20.4266 20.8583 20.0641 20.702 19.7537C20.5458 19.4454 19.3083 16.3975 18.7937 15.1579C18.2895 13.9516 17.7791 14.1141 17.4 14.0954L16.2125 14.0745C15.8 14.0745 15.1291 14.2287 14.5625 14.8495C13.9958 15.4704 12.3958 16.9662 12.3958 20.0141C12.3958 23.062 14.6146 26.0058 14.9229 26.4183C15.2333 26.8308 19.2875 33.085 25.4979 35.7662C26.9749 36.4037 28.1291 36.785 29.027 37.0704C30.5103 37.5412 31.8603 37.4745 32.927 37.3162C34.1166 37.1391 36.5895 35.8183 37.1062 34.3725C37.6228 32.9245 37.6228 31.685 37.4666 31.4266Z"
            fill="white" />
        </svg>Whatsapp</a>
      <div class="red">
        <svg width="50" height="51" viewBox="0 0 50 51" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd"
            d="M15.7975 5.51939C16.4729 5.43275 17.1579 5.57046 17.7474 5.91132C18.3341 6.25066 18.7937 6.77262 19.056 7.39745L22.9761 16.5444C22.9767 16.5457 22.9773 16.547 22.9778 16.5483C23.1808 17.0174 23.2656 17.5291 23.2249 18.0385C23.184 18.5494 23.0181 19.0424 22.7418 19.4741L22.7315 19.4902L19.4759 24.4416C20.9288 27.4383 23.3522 29.8558 26.3523 31.3015L26.3586 31.2973L31.2376 28.0381C31.6706 27.7458 32.1704 27.5673 32.6907 27.5194C33.2109 27.4715 33.7349 27.5556 34.214 27.764C34.2159 27.7648 34.2179 27.7657 34.2199 27.7666L43.3444 31.6854C43.9689 31.9478 44.4906 32.4072 44.8298 32.9937C45.1706 33.5831 45.3083 34.2682 45.2217 34.9436C44.8837 37.5816 43.5961 40.0062 41.5997 41.7635C39.6033 43.5208 37.035 44.4905 34.3754 44.4911C26.9161 44.4911 19.7621 41.5279 14.4876 36.2535C9.21316 30.979 6.25 23.8253 6.25 16.3661C6.2506 13.7065 7.22028 11.1378 8.9776 9.14142C10.7348 7.14517 13.1596 5.85748 15.7975 5.51939ZM18.0664 25.1161L16.657 25.7906C16.4262 25.3084 16.323 24.7751 16.3572 24.2417C16.3914 23.7082 16.5619 23.1925 16.8523 22.7437L16.8584 22.7342L20.1098 17.7892L20.1068 17.7824L16.181 8.62222C14.3022 8.86644 12.5754 9.78382 11.3233 11.2062C10.0681 12.6321 9.37551 14.4665 9.375 16.3661M18.0664 25.1161L16.6601 25.7971C18.4218 29.4352 21.3636 32.3694 25.0062 34.1218L25.0149 34.1259C25.5054 34.3582 26.0478 34.4587 26.5889 34.4176C27.1286 34.3766 27.6484 34.1961 28.0974 33.8939C28.0985 33.8931 28.0997 33.8923 28.1008 33.8916L32.9773 30.6341L42.1178 34.5596L42.1202 34.5607C41.876 36.4395 40.9573 38.1658 39.5349 39.4178C38.109 40.673 36.2746 41.3656 34.375 41.3661M9.375 16.3661C9.37509 22.9964 12.009 29.3554 16.6973 34.0438C21.3857 38.7321 27.7447 41.366 34.375 41.3661"
            fill="white" />
          <path fill-rule="evenodd" clip-rule="evenodd"
            d="M31.25 10.1162C32.1129 10.1162 32.8125 10.8158 32.8125 11.6787V17.9287H39.0625C39.9254 17.9287 40.625 18.6283 40.625 19.4912C40.625 20.3542 39.9254 21.0537 39.0625 21.0537H31.25C30.3871 21.0537 29.6875 20.3542 29.6875 19.4912V11.6787C29.6875 10.8158 30.3871 10.1162 31.25 10.1162Z"
            fill="white" />
          <path fill-rule="evenodd" clip-rule="evenodd"
            d="M41.7299 9.01136C42.34 9.62155 42.34 10.6109 41.7299 11.2211L32.3549 20.5961C31.7447 21.2063 30.7553 21.2063 30.1451 20.5961C29.535 19.9859 29.535 18.9966 30.1451 18.3864L39.5201 9.01136C40.1303 8.40116 41.1197 8.40116 41.7299 9.01136Z"
            fill="white" />
        </svg>
        <?php
              // Definir una expresión regular para encontrar los números de teléfono
              $patron = '/\(\+(\d+)\)\s?(\d+[-\s]?\d+[-\s]?\d+)/';

              // Reemplazar los números de teléfono en el formato deseado
              $texto_formateado = preg_replace_callback($patron, function ($matches) {
                  $codigo_pais = $matches[1];
                  $numero = str_replace(" ", "", $matches[2]);
                  $href = "tel:+$codigo_pais$numero";
                  return "<a href=\"$href\">(+57 $codigo_pais) $matches[2]</a>";
              }, $sdk->infoGnrl->acf->telefonos);
              $tels = explode(' - ', $texto_formateado);
              echo $tels[0];?>
      </div>
      <a href="mailto:<?=$sdk->infoGnrl->acf->telefonos?>" class="red">
        <svg width="50" height="51" viewBox="0 0 50 51" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd"
            d="M5.09821 10.6229C5.68132 9.98678 6.66971 9.9438 7.30583 10.5269L25 26.7466L42.6942 10.5269C43.3303 9.9438 44.3187 9.98678 44.9018 10.6229C45.4849 11.259 45.442 12.2474 44.8058 12.8305L26.0558 30.018C25.4585 30.5656 24.5416 30.5656 23.9442 30.018L5.19419 12.8305C4.55807 12.2474 4.51509 11.259 5.09821 10.6229Z"
            fill="white" />
          <path fill-rule="evenodd" clip-rule="evenodd"
            d="M4.6875 11.6787C4.6875 10.8158 5.38706 10.1162 6.25 10.1162H43.75C44.6129 10.1162 45.3125 10.8158 45.3125 11.6787V38.2412C45.3125 39.07 44.9833 39.8649 44.3972 40.4509C43.8112 41.037 43.0163 41.3662 42.1875 41.3662H7.8125C6.9837 41.3662 6.18884 41.037 5.60279 40.4509C5.01674 39.8649 4.6875 39.07 4.6875 38.2412V11.6787ZM7.8125 13.2412V38.2412H42.1875V13.2412H7.8125Z"
            fill="white" />
          <path fill-rule="evenodd" clip-rule="evenodd"
            d="M22.7336 24.6851C23.3169 25.3211 23.2741 26.3095 22.6381 26.8928L7.79438 40.5061C7.1584 41.0893 6.17 41.0466 5.58674 40.4106C5.00347 39.7746 5.04621 38.7862 5.6822 38.2029L20.5259 24.5897C21.1619 24.0064 22.1503 24.0491 22.7336 24.6851Z"
            fill="white" />
          <path fill-rule="evenodd" clip-rule="evenodd"
            d="M27.2664 24.6851C27.8497 24.0491 28.8381 24.0064 29.4741 24.5897L44.3178 38.2029C44.9538 38.7862 44.9965 39.7746 44.4133 40.4106C43.83 41.0466 42.8416 41.0893 42.2056 40.5061L27.3619 26.8928C26.7259 26.3095 26.6832 25.3211 27.2664 24.6851Z"
            fill="white" />
        </svg>Correo electrónico</a>
    </div>
    <a href="" class="btn secondary">Agenda tu valoración virtual</a>
  </div>
  <section data data-aos="fade-down" data-aos-duration="3000">
    <div class="pacientes container">
      <div class=" pacientes__ayudados">
        <h4>Personas a las que hemos ayudado a sentirse mejor</h4>
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

  <?php include 'templates/preguntas.php'; ?>
</main>
<?php include "includes/footer.php"; ?>


<script>
  document.querySelectorAll(".video-btn").forEach((button, i) => {
    const video = document.getElementById(`video-${i}`);
    const image = document.getElementById(`image-${i}`);

    if (video && image) {
      const toggleVideoImage = () => {
        if (video.paused) {
          $(image).fadeOut();
          $(video).fadeIn();
          video.play();
        } else {
          $(image).fadeIn();
          $(video).fadeOut();
          video.pause();
          video.currentTime = 0;
        }
      };

      button.addEventListener("click", toggleVideoImage);
      video.addEventListener("click", toggleVideoImage);

    }

  });

</script>