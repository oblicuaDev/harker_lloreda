<header>
  <div class="top-bar">
    <div class="container">
      <div class="links">
        <a href="<?=$lang?>/equipo-humano"><?= $sdk->palabras[$lang][4]?></a>
        <a href="http://eshop.harkerlloreda.com/index.php" target="_blank"><?= $sdk->palabras[$lang][16]?></a>
        <a href="<?=$lang?>/pago-en-linea"><?= $sdk->palabras[$lang][9]?></a>
      </div>
      <div class="right">
        <ul class="lang-selector">
          <li>
            <span class="uppercase"><img src="img/flag_<?=strtolower($lang)?>.svg" alt="<?=$lang?>" /> <?=$lang?><svg xmlns="http://www.w3.org/2000/svg" width="7" height="4" viewBox="0 0 7 4" fill="none">
                <path d="M1 1L3.5 3.5L6 1" stroke="white" stroke-width="0.5" stroke-linecap="round" />
              </svg></span>
            <ul>
              <li><button type="button" onclick="changeLang('es')"><img src="img/flag_es.svg" alt="ES" /> ES</button></li>
              <li><button type="button" onclick="changeLang('en')"><img src="img/flag_en.svg" alt="EN" /> EN</button></li>
            </ul>
          </li>
        </ul>
        <ul class="agendamenu">
          <li>
            <a href="<?=$lang?>/agenda-tu-cita">
              <?=$sdk->palabras[$lang][0]?>
            </a>
            <ul>
              <li><a href=""><?=$sdk->palabras[$lang][22]?></a></li>
              <li><a href=""><?=$sdk->palabras[$lang][23]?></a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="container">
    <a href="/lab/harker_lloreda/<?=$lang?>">
      <img src="img/logo_gray.svg" alt="logo" />
    </a>
    <nav>
      <button id="closeMenu"><img src="img/close.png" alt="icono"></button>
      <ul>
        <li>
          <a href="<?=$lang?>/procedimientos"><?= $sdk->palabras[$lang][13]?></a>
          <ul id="categoriasPro">
          </ul>
        </li>
        <li><a href=""><?= $sdk->palabras[$lang][6]?></a></li>
        <li><a href="<?=$lang?>/para-ellos"><?= $sdk->palabras[$lang][10]?></a></li>
        <li><a href="<?=$lang?>/pacientes-fuera-de-colombia"><?= $sdk->palabras[$lang][8]?></a></li>
      </ul>
    </nav>
    <button id="openMenu"><img src="img/menu.png" alt="icono"></button>
  </div>
</header>