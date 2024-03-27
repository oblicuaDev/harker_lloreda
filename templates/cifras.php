<div class="cifras-container">
    <div class="cifras-grid">
      <div class="cifras-grid__item">
        <h6><?=$sdk->infoGnrl->acf->procedimientos_por_ano?></h6>
        <p><?= $sdk->palabras[$lang][20]?></p>
      </div>
      <div class="cifras-grid__item">
        <h6><?=$sdk->infoGnrl->acf->anos_de_experiencia?></h6>
        <p><?= $sdk->palabras[$lang][18]?></p>
      </div>
      <div class="cifras-grid__item">
        <h6><?=number_format($sdk->infoGnrl->acf->pacientes_atendidos_historicamente, 0, ".", ".")?></h6>
        <p><?= $sdk->palabras[$lang][19]?></p>
      </div>
    </div>
    <div class="bg">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="1920"
        height="293"
        viewBox="0 0 1920 293"
        fill="none"
      >
        <path
          d="M920.855 37.311C1362.26 -12.9171 1766.92 -6.0587 1920 37.3109L1920 293L0 293L-2.56149e-05 0.000381475C274.49 75.0999 487.877 86.58 920.855 37.311Z"
          fill="#335C82"
        />
      </svg>
    </div>
  </div>