<!-- Preloader -->
<div id="preloader">
    <div id="container" class="container-preloader">
        <div class="animation-preloader">
        <div class="spinner"></div>
        <div class="txt-loading">
            <span preloader-text="H" class="characters">H</span>

            <span preloader-text="A" class="characters">A</span>

            <span preloader-text="R" class="characters">R</span>

            <span preloader-text="K" class="characters">K</span>

            <span preloader-text="E" class="characters">E</span>

            <span preloader-text="R" class="characters">R</span>

            <span preloader-text="&" class="characters">&</span>

            <span preloader-text="L" class="characters">L</span>

            <span preloader-text="L" class="characters">L</span>

            <span preloader-text="O" class="characters">O</span>

            <span preloader-text="R" class="characters">R</span>

            <span preloader-text="E" class="characters">E</span>

            <span preloader-text="D" class="characters">D</span>

            <span preloader-text="A" class="characters">A</span>
        </div>
        </div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
</div>
<!-- /Preloader -->
<footer>
      <div class="container">
        <article>
          <img src="img/logo_white.svg" alt="logo" />
          <a href="doc-inter.html"><?= $sdk->palabras[$lang][7]?></a>
          <a href="mas-info.html"><?= $sdk->palabras[$lang][2]?></a>
          <a href="doc-inter2.html"><?= $sdk->palabras[$lang][0]?></a>
          <a href=""><?=$sdk->palabras[$lang][1]?></a>
          <a href="pago.html"><?= $sdk->palabras[$lang][9]?></a>
        </article>
        <article>
          <a href=""><?= $sdk->palabras[$lang][8]?></a>
          <a href="proce-inter.html"><?= $sdk->palabras[$lang][13]?></a>
          <a href=""><?= $sdk->palabras[$lang][14]?></a>
          <a href=""><?= $sdk->palabras[$lang][10]?></a>
          <a href="fidelizacion.html"><?= $sdk->palabras[$lang][11]?></a>
          <a href="convenios.html"><?= $sdk->palabras[$lang][3]?></a>
          <a href=""><?= $sdk->palabras[$lang][17]?></a>
        </article>
        <article>
          <small
            ><?=$sdk->infoGnrl->acf->direccion_?></small
          >
          <small><?= $sdk->palabras[$lang][15]?>: 
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

              echo $texto_formateado;?>
          </small>
          <small>Whatsapp: <a href=""><?=$sdk->infoGnrl->acf->whatsapp?></a></small>
          <small><?=$sdk->infoGnrl->acf->ciudad?></small>
          <!-- <?=$sdk->infoGnrl->acf->link_de_tiktok?> -->
          <!-- <?=$sdk->infoGnrl->acf->link_de_youtube?> -->
          <div class="socials">
            <a href="<?=$sdk->infoGnrl->acf->link_de_facebook?>" target="_blank"
              ><svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
              >
                <g clip-path="url(#clip0_595_2587)">
                  <path
                    d="M24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 17.9895 4.3882 22.954 10.125 23.8542V15.4688H7.07812V12H10.125V9.35625C10.125 6.34875 11.9166 4.6875 14.6576 4.6875C15.9701 4.6875 17.3438 4.92188 17.3438 4.92188V7.875H15.8306C14.34 7.875 13.875 8.80008 13.875 9.75V12H17.2031L16.6711 15.4688H13.875V23.8542C19.6118 22.954 24 17.9895 24 12Z"
                    fill="currentColor"
                  />
                </g>
                <defs>
                  <clipPath id="clip0_595_2587">
                    <rect width="24" height="24" fill="currentColor" />
                  </clipPath>
                </defs></svg
            ></a>
            <a href="<?=$sdk->infoGnrl->acf->link_de_instagram?>" target="_blank"
              ><svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
              >
                <g clip-path="url(#clip0_595_2583)">
                  <path
                    d="M11.76 2.16094C14.9021 2.16094 15.2742 2.175 16.5099 2.23125C17.6584 2.28281 18.2785 2.47969 18.692 2.64375C19.2386 2.85938 19.6337 3.12188 20.0425 3.53906C20.456 3.96094 20.7086 4.35938 20.9199 4.91719C21.0807 5.33906 21.2737 5.97656 21.3242 7.14375C21.3793 8.40937 21.3931 8.78906 21.3931 11.9906C21.3931 15.1969 21.3793 15.5766 21.3242 16.8375C21.2737 18.0094 21.0807 18.6422 20.9199 19.0641C20.7086 19.6219 20.4514 20.025 20.0425 20.4422C19.6291 20.8641 19.2386 21.1219 18.692 21.3375C18.2785 21.5016 17.6538 21.6984 16.5099 21.75C15.2696 21.8062 14.8975 21.8203 11.76 21.8203C8.61788 21.8203 8.24578 21.8062 7.01006 21.75C5.86163 21.6984 5.24147 21.5016 4.82803 21.3375C4.28137 21.1219 3.88631 20.8594 3.47747 20.4422C3.06403 20.0203 2.81137 19.6219 2.60006 19.0641C2.43928 18.6422 2.24634 18.0047 2.19581 16.8375C2.14069 15.5719 2.12691 15.1922 2.12691 11.9906C2.12691 8.78438 2.14069 8.40469 2.19581 7.14375C2.24634 5.97187 2.43928 5.33906 2.60006 4.91719C2.81137 4.35938 3.06862 3.95625 3.47747 3.53906C3.89091 3.11719 4.28137 2.85938 4.82803 2.64375C5.24147 2.47969 5.86622 2.28281 7.01006 2.23125C8.24578 2.175 8.61788 2.16094 11.76 2.16094ZM11.76 0C8.56734 0 8.16769 0.0140625 6.91359 0.0703125C5.66409 0.126563 4.80506 0.332812 4.06087 0.628125C3.28453 0.9375 2.62762 1.34531 1.97531 2.01562C1.31841 2.68125 0.91875 3.35156 0.615562 4.13906C0.326156 4.90313 0.124031 5.775 0.0689062 7.05C0.0137813 8.33437 0 8.74219 0 12C0 15.2578 0.0137813 15.6656 0.0689062 16.9453C0.124031 18.2203 0.326156 19.0969 0.615562 19.8563C0.91875 20.6484 1.31841 21.3188 1.97531 21.9844C2.62762 22.65 3.28453 23.0625 4.05628 23.3672C4.80506 23.6625 5.6595 23.8687 6.909 23.925C8.16309 23.9812 8.56275 23.9953 11.7554 23.9953C14.9481 23.9953 15.3477 23.9812 16.6018 23.925C17.8513 23.8687 18.7103 23.6625 19.4545 23.3672C20.2263 23.0625 20.8832 22.65 21.5355 21.9844C22.1878 21.3188 22.5921 20.6484 22.8907 19.8609C23.1801 19.0969 23.3822 18.225 23.4373 16.95C23.4924 15.6703 23.5062 15.2625 23.5062 12.0047C23.5062 8.74688 23.4924 8.33906 23.4373 7.05938C23.3822 5.78438 23.1801 4.90781 22.8907 4.14844C22.6012 3.35156 22.2016 2.68125 21.5447 2.01562C20.8924 1.35 20.2355 0.9375 19.4637 0.632812C18.7149 0.3375 17.8605 0.13125 16.611 0.075C15.3523 0.0140625 14.9527 0 11.76 0Z"
                    fill="currentColor"
                  />
                  <path
                    d="M11.76 5.83594C8.42496 5.83594 5.71924 8.59688 5.71924 12C5.71924 15.4031 8.42496 18.1641 11.76 18.1641C15.0951 18.1641 17.8008 15.4031 17.8008 12C17.8008 8.59688 15.0951 5.83594 11.76 5.83594ZM11.76 15.9984C9.59636 15.9984 7.84155 14.2078 7.84155 12C7.84155 9.79219 9.59636 8.00156 11.76 8.00156C13.9237 8.00156 15.6785 9.79219 15.6785 12C15.6785 14.2078 13.9237 15.9984 11.76 15.9984Z"
                    fill="currentColor"
                  />
                  <path
                    d="M19.45 5.59238C19.45 6.38926 18.816 7.03145 18.0397 7.03145C17.2587 7.03145 16.6294 6.38457 16.6294 5.59238C16.6294 4.79551 17.2633 4.15332 18.0397 4.15332C18.816 4.15332 19.45 4.8002 19.45 5.59238Z"
                    fill="currentColor"
                  />
                </g>
                <defs>
                  <clipPath id="clip0_595_2583">
                    <rect width="23.52" height="24" fill="currentColor" />
                  </clipPath>
                </defs></svg
            ></a>
            <a target="_blank" href="<?php
                // Utilizamos expresiones regulares para extraer los dígitos
                $digitos = preg_replace('/[^\d]/', '', $sdk->infoGnrl->acf->whatsapp);

                // Añadimos el código del país al principio (57 en este caso)
                $codigoPais = '57';
                $telefonoFinal = $digitos;

                echo "https://wa.me/".$telefonoFinal . "&text=" . $sdk->infoGnrl->acf->mensaje_whatsapp;?>"
              ><svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
              >
                <path
                  d="M0 24L1.687 17.837C0.645998 16.033 0.0989998 13.988 0.0999998 11.891C0.103 5.335 5.43799 0 11.993 0C15.174 0.001 18.16 1.24 20.406 3.488C22.6509 5.736 23.8869 8.724 23.8859 11.902C23.8829 18.459 18.548 23.794 11.993 23.794C10.003 23.793 8.04198 23.294 6.30499 22.346L0 24ZM6.59698 20.193C8.27298 21.188 9.87298 21.784 11.989 21.785C17.437 21.785 21.875 17.351 21.878 11.9C21.88 6.438 17.463 2.01 11.997 2.008C6.54498 2.008 2.11 6.442 2.108 11.892C2.107 14.117 2.75899 15.783 3.85399 17.526L2.85499 21.174L6.59698 20.193ZM17.984 14.729C17.91 14.605 17.712 14.531 17.414 14.382C17.117 14.233 15.656 13.514 15.383 13.415C15.111 13.316 14.913 13.266 14.714 13.564C14.516 13.861 13.946 14.531 13.773 14.729C13.6 14.927 13.426 14.952 13.129 14.803C12.832 14.654 11.874 14.341 10.739 13.328C9.85598 12.54 9.25898 11.567 9.08598 11.269C8.91298 10.972 9.06798 10.811 9.21598 10.663C9.34998 10.53 9.51298 10.316 9.66198 10.142C9.81298 9.97 9.86198 9.846 9.96198 9.647C10.061 9.449 10.012 9.275 9.93698 9.126C9.86198 8.978 9.26798 7.515 9.02098 6.92C8.77898 6.341 8.53398 6.419 8.35198 6.41L7.78198 6.4C7.58398 6.4 7.26198 6.474 6.98998 6.772C6.71798 7.07 5.94999 7.788 5.94999 9.251C5.94999 10.714 7.01498 12.127 7.16298 12.325C7.31198 12.523 9.25798 15.525 12.239 16.812C12.948 17.118 13.502 17.301 13.933 17.438C14.645 17.664 15.293 17.632 15.805 17.556C16.376 17.471 17.563 16.837 17.811 16.143C18.059 15.448 18.059 14.853 17.984 14.729Z"
                  fill="currentColor"
                /></svg
            ></a>
          </div>
        </article>
      </div>
    </footer>
    <footer class="child-footer">
      <div class="grid-container">
        <div class="grid-item">
          <a href="<?=$sdk->infoGnrl->acf->estados_financieros?>" target="_blank"><small><?= $sdk->palabras[$lang][5]?></small></a>
        </div>
        <div class="grid-item">
          <small><?=date("Y")?></small>
        </div>
        <div class="grid-item">
          <a href="" target="_blank"><small><?= $sdk->palabras[$lang][12]?></small></a>
        </div>
      </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="js/main.js?v=<?=time()?>"></script>
  </body>
</html>
