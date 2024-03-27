setCredits("#335c82", "Harker & Lloreda");
const imageCache = {};
function changeLang(langCode) {
  var url = new URL(document.location);
  var pathArray = url.pathname.split("/");
  var currentLang = pathArray[3];

  if (currentLang === langCode) {
    return;
  }

  if (currentLang) {
    pathArray[3] = langCode;
  } else {
    pathArray.splice(1, 0, langCode);
  }

  // Obtener el ID del dataset del elemento <main> según el idioma actual
  var newID = document.querySelector("main").dataset[`tr${langCode}id`];
  var newSlug = document.querySelector("main").dataset[`tr${langCode}slug`];
  // Si hay un nuevo ID definido, reemplazarlo en la URL
  if (newID && newSlug) {
    var idIndex = pathArray.length - 1;
    pathArray[idIndex] = `${newSlug}-${newID}`;
    url.pathname = pathArray.join("/");
    location.href = url.href;
  } else {
    url.pathname = pathArray.join("/");
    location.href = url.href;
  }
}

const getImageFromCacheOrFetch = async (url) => {
  // Verifica si la imagen está en caché
  if (imageCache[url]) {
    return imageCache[url];
  }
  // Si no está en caché, descarga la imagen
  const response = await fetch(url);
  const imageBlob = await response.blob();

  // Crea una URL de objeto para la imagen descargada
  const imageUrl = URL.createObjectURL(imageBlob);
  // Almacena la URL de la imagen en caché
  imageCache[url] = imageUrl;
  return imageUrl;
};
function get_alias(str) {
  str = str.replace(/¡/g, "", str); //Signo de exclamación abierta.&iexcl;
  str = str.replace(/'/g, "", str); //Signo de exclamación abierta.&iexcl;
  str = str.replace(/!/g, "", str); //Signo de exclamación abierta.&iexcl;
  str = str.replace(/¢/g, "-", str); //Signo de centavo.&cent;
  str = str.replace(/£/g, "-", str); //Signo de libra esterlina.&pound;
  str = str.replace(/¤/g, "-", str); //Signo monetario.&curren;
  str = str.replace(/¥/g, "-", str); //Signo del yen.&yen;
  str = str.replace(/¦/g, "-", str); //Barra vertical partida.&brvbar;
  str = str.replace(/§/g, "-", str); //Signo de sección.&sect;
  str = str.replace(/¨/g, "-", str); //Diéresis.&uml;
  str = str.replace(/©/g, "-", str); //Signo de derecho de copia.&copy;
  str = str.replace(/ª/g, "-", str); //Indicador ordinal femenino.&ordf;
  str = str.replace(/«/g, "-", str); //Signo de comillas francesas de apertura.&laquo;
  str = str.replace(/¬/g, "-", str); //Signo de negación.&not;
  str = str.replace(/®/g, "-", str); //Signo de marca registrada.&reg;
  str = str.replace(/¯/g, "&-", str); //Macrón.&macr;
  str = str.replace(/°/g, "-", str); //Signo de grado.&deg;
  str = str.replace(/±/g, "-", str); //Signo de más-menos.&plusmn;
  str = str.replace(/²/g, "-", str); //Superíndice dos.&sup2;
  str = str.replace(/³/g, "-", str); //Superíndice tres.&sup3;
  str = str.replace(/´/g, "-", str); //Acento agudo.&acute;
  str = str.replace(/µ/g, "-", str); //Signo de micro.&micro;
  str = str.replace(/¶/g, "-", str); //Signo de calderón.&para;
  str = str.replace(/·/g, "-", str); //Punto centrado.&middot;
  str = str.replace(/¸/g, "-", str); //Cedilla.&cedil;
  str = str.replace(/¹/g, "-", str); //Superíndice 1.&sup1;
  str = str.replace(/º/g, "-", str); //Indicador ordinal masculino.&ordm;
  str = str.replace(/»/g, "-", str); //Signo de comillas francesas de cierre.&raquo;
  str = str.replace(/¼/g, "-", str); //Fracción vulgar de un cuarto.&frac14;
  str = str.replace(/½/g, "-", str); //Fracción vulgar de un medio.&frac12;
  str = str.replace(/¾/g, "-", str); //Fracción vulgar de tres cuartos.&frac34;
  str = str.replace(/¿/g, "-", str); //Signo de interrogación abierta.&iquest;
  str = str.replace(/×/g, "-", str); //Signo de multiplicación.&times;
  str = str.replace(/÷/g, "-", str); //Signo de división.&divide;
  str = str.replace(/À/g, "a", str); //A mayúscula con acento grave.&Agrave;
  str = str.replace(/Á/g, "a", str); //A mayúscula con acento agudo.&Aacute;
  str = str.replace(/Â/g, "a", str); //A mayúscula con circunflejo.&Acirc;
  str = str.replace(/Ã/g, "a", str); //A mayúscula con tilde.&Atilde;
  str = str.replace(/Ä/g, "a", str); //A mayúscula con diéresis.&Auml;
  str = str.replace(/Å/g, "a", str); //A mayúscula con círculo encima.&Aring;
  str = str.replace(/Æ/g, "a", str); //AE mayúscula.&AElig;
  str = str.replace(/Ç/g, "c", str); //C mayúscula con cedilla.&Ccedil;
  str = str.replace(/È/g, "e", str); //E mayúscula con acento grave.&Egrave;
  str = str.replace(/É/g, "e", str); //E mayúscula con acento agudo.&Eacute;
  str = str.replace(/Ê/g, "e", str); //E mayúscula con circunflejo.&Ecirc;
  str = str.replace(/Ë/g, "e", str); //E mayúscula con diéresis.&Euml;
  str = str.replace(/Ì/g, "i", str); //I mayúscula con acento grave.&Igrave;
  str = str.replace(/Í/g, "i", str); //I mayúscula con acento agudo.&Iacute;
  str = str.replace(/Î/g, "i", str); //I mayúscula con circunflejo.&Icirc;
  str = str.replace(/Ï/g, "i", str); //I mayúscula con diéresis.&Iuml;
  str = str.replace(/Ð/g, "d", str); //ETH mayúscula.&ETH;
  str = str.replace(/Ñ/g, "n", str); //N mayúscula con tilde.&Ntilde;
  str = str.replace(/Ò/g, "o", str); //O mayúscula con acento grave.&Ograve;
  str = str.replace(/Ó/g, "o", str); //O mayúscula con acento agudo.&Oacute;
  str = str.replace(/Ô/g, "o", str); //O mayúscula con circunflejo.&Ocirc;
  str = str.replace(/Õ/g, "o", str); //O mayúscula con tilde.&Otilde;
  str = str.replace(/Ö/g, "o", str); //O mayúscula con diéresis.&Ouml;
  str = str.replace(/Ø/g, "o", str); //O mayúscula con barra inclinada.&Oslash;
  str = str.replace(/Ù/g, "u", str); //U mayúscula con acento grave.&Ugrave;
  str = str.replace(/Ú/g, "u", str); //U mayúscula con acento agudo.&Uacute;
  str = str.replace(/Û/g, "u", str); //U mayúscula con circunflejo.&Ucirc;
  str = str.replace(/Ü/g, "u", str); //U mayúscula con diéresis.&Uuml;
  str = str.replace(/Ý/g, "y", str); //Y mayúscula con acento agudo.&Yacute;
  str = str.replace(/Þ/g, "b", str); //Thorn mayúscula.&THORN;
  str = str.replace(/ß/g, "b", str); //S aguda alemana.&szlig;
  str = str.replace(/à/g, "a", str); //a minúscula con acento grave.&agrave;
  str = str.replace(/á/g, "a", str); //a minúscula con acento agudo.&aacute;
  str = str.replace(/â/g, "a", str); //a minúscula con circunflejo.&acirc;
  str = str.replace(/ã/g, "a", str); //a minúscula con tilde.&atilde;
  str = str.replace(/ä/g, "a", str); //a minúscula con diéresis.&auml;
  str = str.replace(/å/g, "a", str); //a minúscula con círculo encima.&aring;
  str = str.replace(/æ/g, "a", str); //ae minúscula.&aelig;
  str = str.replace(/ç/g, "a", str); //c minúscula con cedilla.&ccedil;
  str = str.replace(/è/g, "e", str); //e minúscula con acento grave.&egrave;
  str = str.replace(/é/g, "e", str); //e minúscula con acento agudo.&eacute;
  str = str.replace(/ê/g, "e", str); //e minúscula con circunflejo.&ecirc;
  str = str.replace(/ë/g, "e", str); //e minúscula con diéresis.&euml;
  str = str.replace(/ì/g, "i", str); //i minúscula con acento grave.&igrave;
  str = str.replace(/í/g, "i", str); //i minúscula con acento agudo.&iacute;
  str = str.replace(/î/g, "i", str); //i minúscula con circunflejo.&icirc;
  str = str.replace(/ï/g, "i", str); //i minúscula con diéresis.&iuml;
  str = str.replace(/ð/g, "i", str); //eth minúscula.&eth;
  str = str.replace(/ñ/g, "n", str); //n minúscula con tilde.&ntilde;
  str = str.replace(/ò/g, "o", str); //o minúscula con acento grave.&ograve;
  str = str.replace(/ó/g, "o", str); //o minúscula con acento agudo.&oacute;
  str = str.replace(/ô/g, "o", str); //o minúscula con circunflejo.&ocirc;
  str = str.replace(/õ/g, "o", str); //o minúscula con tilde.&otilde;
  str = str.replace(/ö/g, "o", str); //o minúscula con diéresis.&ouml;
  str = str.replace(/ø/g, "o", str); //o minúscula con barra inclinada.&oslash;
  str = str.replace(/ù/g, "o", str); //u minúscula con acento grave.&ugrave;
  str = str.replace(/ú/g, "u", str); //u minúscula con acento agudo.&uacute;
  str = str.replace(/û/g, "u", str); //u minúscula con circunflejo.&ucirc;
  str = str.replace(/ü/g, "u", str); //u minúscula con diéresis.&uuml;
  str = str.replace(/ý/g, "y", str); //y minúscula con acento agudo.&yacute;
  str = str.replace(/þ/g, "b", str); //thorn minúscula.&thorn;
  str = str.replace(/ÿ/g, "y", str); //y minúscula con diéresis.&yuml;
  str = str.replace(/Œ/g, "d", str); //OE Mayúscula.&OElig;
  str = str.replace(/œ/g, "-", str); //oe minúscula.&oelig;
  str = str.replace(/Ÿ/g, "-", str); //Y mayúscula con diéresis.&Yuml;
  str = str.replace(/ˆ/g, "", str); //Acento circunflejo.&circ;
  str = str.replace(/˜/g, "", str); //Tilde.&tilde;
  str = str.replace(/–/g, "", str); //Guiún corto.&ndash;
  str = str.replace(/—/g, "", str); //Guiún largo.&mdash;
  str = str.replace(/'/g, "", str); //Comilla simple izquierda.&lsquo;
  str = str.replace(/'/g, "", str); //Comilla simple derecha.&rsquo;
  str = str.replace(/,/g, "", str); //Comilla simple inferior.&sbquo;
  str = str.replace(/"/g, "", str); //Comillas doble derecha.&rdquo;
  str = str.replace(/"/g, "", str); //Comillas doble inferior.&bdquo;
  str = str.replace(/†/g, "-", str); //Daga.&dagger;
  str = str.replace(/‡/g, "-", str); //Daga doble.&Dagger;
  str = str.replace(/…/g, "-", str); //Elipsis horizontal.&hellip;
  str = str.replace(/‰/g, "-", str); //Signo de por mil.&permil;
  str = str.replace(/‹/g, "-", str); //Signo izquierdo de una cita.&lsaquo;
  str = str.replace(/›/g, "-", str); //Signo derecho de una cita.&rsaquo;
  str = str.replace(/€/g, "-", str); //Euro.&euro;
  str = str.replace(/™/g, "-", str); //Marca registrada.&trade;
  str = str.replace(/ & /g, "-", str); //Marca registrada.&trade;
  str = str.replace(/\(/g, "-", str);
  str = str.replace(/\)/g, "-", str);
  str = str.replace(/�/g, "-", str);
  str = str.replace(/\//g, "-", str);
  str = str.replace(":", "", str);
  str = str.replace(/ de /g, "-", str); //Espacios
  str = str.replace(/ y /g, "-", str); //Espacios
  str = str.replace(/ a /g, "-", str); //Espacios
  str = str.replace(/ DE /g, "-", str); //Espacios
  str = str.replace(/ A /g, "-", str); //Espacios
  str = str.replace(/ Y /g, "-", str); //Espacios
  str = str.replace(/ /g, "-", str); //Espacios
  str = str.replace(/  /g, "-", str); //Espacios
  str = str.replace(/\./g, "", str); //Punto
  str = str.replace("’", "", str);
  str = str.replace("‘", "", str);
  str = str.replace("“", "", str);
  str = str.replace("”", "", str);
  str = str.replace("+", "", str);

  //Mayusculas
  str = str.toLowerCase();

  return str;
}
function initSplides() {
  if (document.querySelector(".splideHome")) {
    new Splide(".splideHome", {
      type: "loop",
      pagination: false,
    }).mount();
  }
  if (document.querySelector(".splideEquipo")) {
    new Splide(".splideEquipo", {
      type: "loop",
      pagination: true,
      perPage: 1,
    }).mount();
  }
  if (document.querySelector("#personas-slider")) {
    new Splide("#personas-slider", {
      type: "loop",
      pagination: true,
      gap: 30,
      perPage: 1,
    }).mount();
  }

  if (document.querySelector(".teens-splide")) {
    new Splide(".teens-splide", {
      type: "loop",
      pagination: false,
      perPage: 3,
      gap: 10,
      breakpoints: {
        768: {
          perPage: 1,
        },
      },
    }).mount();
  }

  if (document.querySelector(".body-splide")) {
    new Splide(".body-splide", {
      type: "loop",
      pagination: false,
      perPage: 3,
      gap: 10,
      breakpoints: {
        768: {
          perPage: 1,
        },
      },
    }).mount();
  }

  if (document.querySelector(".ellos-splide")) {
    new Splide(".ellos-splide", {
      type: "loop",
      pagination: false,
      perPage: 3,
      gap: 10,
      breakpoints: {
        768: {
          arrows: false,
          perPage: 1,
          padding: { left: 0, right: "15%" },
        },
      },
    }).mount();
  }

  if (document.querySelector(".splide-comparison")) {
    new Splide(".splide-comparison", {
      type: "loop",
      pagination: false,
      drag: false,
      classes: {
        prev: "splide__arrow splide__arrow--prev",
        next: "splide__arrow splide__arrow--next",
      },
    }).mount();
  }
}
function calcHeightProcedimientos() {
  if (document.querySelectorAll(".proced-extr__quirurgico")) {
    // Obtén todos los elementos que coinciden con los selectores
    var elementos = document.querySelectorAll(
      ".proced-extr__quirurgico a, .proced-extr__no-quirurgico a"
    );

    // Inicializa una variable para almacenar la altura máxima
    var alturaMaxima = 0;

    // Itera sobre cada elemento para encontrar la altura máxima
    elementos.forEach(function (elemento) {
      var alturaElemento = elemento.clientHeight; // Obtén la altura del elemento

      // Compara y actualiza la altura máxima si es necesario
      if (alturaElemento > alturaMaxima) {
        alturaMaxima = alturaElemento;
      }
    });

    // Itera nuevamente para establecer la altura máxima en todos los elementos
    elementos.forEach(function (elemento) {
      elemento.style.height = alturaMaxima + "px";
    });
  }
}
async function getEquipoDestacadoHome() {
  const container = document.querySelector("#equipo_destacado .container");
  if (!container) return;

  const response = await fetch(`${actualLang}/g/destacados_home/`);
  const equipoHome = await response.json();

  container.innerHTML = ""; // Limpiar el contenido antes de agregar nuevo HTML

  // Array para almacenar promesas de carga de imágenes
  equipoHome.sort((a, b) => a.acf.orden - b.acf.orden);
  const imagePromises = equipoHome.map(async (equipo, i) => {
    const image = await getImageFromCacheOrFetch(equipo.acf.foto_vertical_);
    const template = `
      <div class="container doctor ${
        i % 2 == 0 ? "left-doc" : ""
      }" data-orden="${equipo.acf.orden}">
        <div class="txt">
          <h4>${equipo.title.rendered}</h4>
          <p>${equipo.acf.profesion}</p>
          <p>${equipo.acf.institucion_educativa_opcional}</p>
          <p>${equipo.acf.subtitulo}</p>
          <a href="${actualLang}/equipo-humano/${get_alias(
      equipo.title.rendered
    )}-${equipo.translations[actualLang]}" class="btn primary">
            ${equipo.acf.texto_cta_home}
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
        <div class="video-card">
          <button type="button" class="video-toggle-btn" data-index="${i}">
            <div class="pause">
                <svg xmlns="http://www.w3.org/2000/svg" width="84" height="84" viewBox="0 0 84 84" fill="none">
              <rect width="84" height="84" rx="42" fill="#335C82" stroke="#335C82" stroke-width="2"></rect>
              <line x1="34" y1="28" x2="34" y2="56" stroke="white" stroke-width="3"/>
              <line x1="50" y1="28" x2="50" y2="56" stroke="white" stroke-width="3"/>
          </svg>
            </div>
            <div class="play">
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
            </div>
          </button>
          <img src="${image}" alt="${
      equipo.title.rendered
    }" class="video-image" id="image-${i}" />
          <video src="${
            equipo.acf.video_vertical_
          }" class="video-element" id="video-${i}">
            <source src="${equipo.acf.video_vertical_}";/>
          </video>
        </div>
      </div>`;
    container.innerHTML += template;
  });

  // Esperar a que todas las imágenes se carguen antes de asignar eventos
  await Promise.all(imagePromises);

  // Asignar eventos a los botones de reproducción/pausa
  container.querySelectorAll(".video-toggle-btn").forEach((btn, i) => {
    btn.addEventListener("click", async () => {
      const playBtn = btn.querySelector(".play");
      const pauseBtn = btn.querySelector(".pause");
      const video = document.getElementById(`video-${i}`);

      if (playBtn.style.display === "block") {
        playBtn.style.display = "none";
        pauseBtn.style.display = "block";
        document.querySelector(`#image-${i}`).style.display = "none";
        video.style.display = "block";
        await video.play();
      } else {
        pauseBtn.style.display = "none";
        playBtn.style.display = "block";
        document.querySelector(`#image-${i}`).style.display = "block";
        video.style.display = "none";
        video.pause();
        video.currentTime = 0;
      }
    });
  });
}
async function getCategoriasProcedimientos() {
  try {
    const response = await fetch(`${actualLang}/g/categorias_procedimientos/`);
    const categoriasProcedimientos = await response.json();

    categoriasProcedimientos.forEach((categoria, i) => {
      createCategoryLink(categoria);
      createCategoryCard(categoria);
    });

    adjustCardGrid(categoriasProcedimientos.length);
  } catch (error) {
    console.error("Error fetching categorias:", error);
  }
}
async function createCategoryLink(categoria) {
  const link = `${actualLang}/procedimientos/${get_alias(
    categoria.title.rendered
  )}-${categoria.translations[actualLang]}`;
  const categoryLink = `<li><a href="${link}">${categoria.title.rendered}</a></li>`;
  document.querySelector("#categoriasPro").innerHTML += categoryLink;
}
async function createCategoryCard(categoria) {
  const image = await getImageFromCacheOrFetch(categoria.acf.foto_cuadrada);
  const link = `${actualLang}/procedimientos/${get_alias(
    categoria.title.rendered
  )}-${categoria.translations[actualLang]}`;
  const template = `<a href="${link}" class="card-category"><img src="${image}" alt="${categoria.title.rendered}"><span>${categoria.title.rendered}</span></a>`;
  if (document.querySelector(".cards .card-grid")) {
    document.querySelector(".cards .card-grid").innerHTML += template;
  }
}
function adjustCardGrid(length) {
  if (document.querySelector(".cards .card-grid")) {
    document.querySelector(
      ".cards .card-grid"
    ).style.gridTemplateColumns = `repeat(${length}, 1fr)`;
  }
}
async function getExtraInfoHome() {
  if (document.querySelector(".home")) {
    const response = await fetch(`${actualLang}/g/home_extra_info/`);
    const infoExtra = await response.json();
    console.log(infoExtra);
    let imagenfuera = await getImageFromCacheOrFetch(
      infoExtra.fuera.acf.imagen_para_home
    );
    let imagentour = await getImageFromCacheOrFetch(
      infoExtra.tour.acf.imagen_de_instalaciones_tour_virtual
    );
    document.querySelector(
      "#fuera"
    ).innerHTML = `<div class="txt"><h4>${infoExtra.fuera.acf.titulo_para_home}</h4>${infoExtra.fuera.acf.descripcion_para_home}<a href="${actualLang}/pacientes-fuera-de-colombia" class="btn primary">${infoExtra.fuera.acf.texto_cta_para_home}<svg  width="20"  height="21"  viewBox="0 0 20 21"  fill="none"  xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M10 3.38379C6.20304 3.38379 3.125 6.46183 3.125 10.2588C3.125 14.0557 6.20304 17.1338 10 17.1338C13.797 17.1338 16.875 14.0557 16.875 10.2588C16.875 6.46183 13.797 3.38379 10 3.38379ZM1.875 10.2588C1.875 5.77148 5.51269 2.13379 10 2.13379C14.4873 2.13379 18.125 5.77148 18.125 10.2588C18.125 14.7461 14.4873 18.3838 10 18.3838C5.51269 18.3838 1.875 14.7461 1.875 10.2588Z" fill="currentColor"/><path fill-rule="evenodd" clip-rule="evenodd" d="M10.0346 7.16841C10.2787 6.92433 10.6744 6.92433 10.9185 7.16841L13.5669 9.81685C13.811 10.0609 13.811 10.4567 13.5669 10.7007L10.9185 13.3492C10.6744 13.5932 10.2787 13.5932 10.0346 13.3492C9.79054 13.1051 9.79054 12.7094 10.0346 12.4653L12.2411 10.2588L10.0346 8.05229C9.79054 7.80822 9.79054 7.41249 10.0346 7.16841Z" fill="currentColor"/><path fill-rule="evenodd" clip-rule="evenodd" d="M6.25 10.2588C6.25 9.91361 6.52982 9.63379 6.875 9.63379H13.125C13.4702 9.63379 13.75 9.91361 13.75 10.2588C13.75 10.604 13.4702 10.8838 13.125 10.8838H6.875C6.52982 10.8838 6.25 10.604 6.25 10.2588Z" fill="currentColor"/></svg></a></div><img src="${imagenfuera}" alt="${infoExtra.fuera.acf.titulo_para_home}" />`;
    document.querySelector(
      "#tour"
    ).innerHTML = `<img src="${imagentour}" alt="${infoExtra.tour.acf.titulo_tour_virtual}" /><div class="txt txt__2"><h4>${infoExtra.tour.acf.titulo_tour_virtual}</h4>${infoExtra.tour.acf.descripcion_tour_virtual}<a href="${infoGnrl.acf.video_180_link}" data-fancybox class="btn primary">${infoExtra.tour.acf.texto_boton_tour_virtual}<svg  width="20"  height="21"  viewBox="0 0 20 21"  fill="none"  xmlns="http://www.w3.org/2000/svg"><path  fill-rule="evenodd"  clip-rule="evenodd"  d="M10 3.38379C6.20304 3.38379 3.125 6.46183 3.125 10.2588C3.125 14.0557 6.20304 17.1338 10 17.1338C13.797 17.1338 16.875 14.0557 16.875 10.2588C16.875 6.46183 13.797 3.38379 10 3.38379ZM1.875 10.2588C1.875 5.77148 5.51269 2.13379 10 2.13379C14.4873 2.13379 18.125 5.77148 18.125 10.2588C18.125 14.7461 14.4873 18.3838 10 18.3838C5.51269 18.3838 1.875 14.7461 1.875 10.2588Z"  fill="currentColor"/><path  fill-rule="evenodd"  clip-rule="evenodd"  d="M10.0346 7.16841C10.2787 6.92433 10.6744 6.92433 10.9185 7.16841L13.5669 9.81685C13.811 10.0609 13.811 10.4567 13.5669 10.7007L10.9185 13.3492C10.6744 13.5932 10.2787 13.5932 10.0346 13.3492C9.79054 13.1051 9.79054 12.7094 10.0346 12.4653L12.2411 10.2588L10.0346 8.05229C9.79054 7.80822 9.79054 7.41249 10.0346 7.16841Z"  fill="currentColor"/><path  fill-rule="evenodd"  clip-rule="evenodd"  d="M6.25 10.2588C6.25 9.91361 6.52982 9.63379 6.875 9.63379H13.125C13.4702 9.63379 13.75 9.91361 13.75 10.2588C13.75 10.604 13.4702 10.8838 13.125 10.8838H6.875C6.52982 10.8838 6.25 10.604 6.25 10.2588Z"  fill="currentColor"/></svg></a></div>`;
  }
}
async function getOtherTeamMembers() {
  if (document.querySelector("#teamSlider")) {
    const response = await fetch(`${actualLang}/g/teamMembers/`);
    const teamMembers = await response.json();
    const promises = teamMembers
      .sort((a, b) => a.acf.orden - b.acf.orden)
      .map(async (equipo, i) => {
        let image = await getImageFromCacheOrFetch(equipo.acf.foto_vertical_);
        let template = `
      <li class="splide__slide">
        <div class="container doctor">
          <div class="image-card">
            <a href="${equipo.acf.video_vertical_}"
            class="video-card"
            data-fancybox="gallery">
            <img src="${image}" alt="${equipo.title.rendered}" />
            </a>
          </div>
          <div class="txt">
            <h4>${equipo.title.rendered}</h4>
            <p>${equipo.acf.profesion}</p>
            <p>${equipo.acf.institucion_educativa_opcional}</p>
            <p>${equipo.acf.subtitulo}</p>
          </div>
        </div>
      </li>`;
        return template;
      });
    // Wait for all promises to resolve
    const resolvedTemplates = await Promise.all(promises);

    // Print the data after all promises are resolved
    document.querySelector("#teamSlider .splide__list").innerHTML +=
      resolvedTemplates.join("");
    new Splide("#teamSlider", {
      type: "loop",
      pagination: true,
      gap: 30,
      perPage: 1,
    }).mount();
  }
}
const getEmpresasConvenios = async () => {
  if (document.querySelector(".convenios")) {
    const response = await fetch(`${actualLang}/g/empresas_convenios/`);
    const empresas = await response.json();
    empresas.forEach((empresa) => {
      let template = `<div class="company"><div class="image"><img src="${empresa.acf.logo}" alt="${empresa.title.rendered}" /></div><small>${empresa.title.rendered}</small></div>`;
      document.querySelector("#empresas_convenio").innerHTML += template;
    });
  }
};
const getProcedimientosPorLinea = async () => {
  let lineaID = document.querySelector("main").dataset.linea;
  if (lineaID) {
    const response = await fetch(
      `${actualLang}/g/procedimientosLinea/?linea=${lineaID}`
    );
    const procedimientos = await response.json();
    // Filtrar procedimientos
    const destacados = [];
    const all = [];
    procedimientos.forEach((objeto) => {
      if (objeto.acf.destacar_pro) {
        destacados.push(objeto);
      } else {
        all.push(objeto);
      }
    });
    destacados.forEach((el) => {
      let template = `<li class="splide__slide"><a href="${actualLang}/procedimiento/${get_alias(
        el.title.rendered
      )}-${el.translations[actualLang]}" class="procedimiento-card"><img src="${
        el.acf.foto_listado_procedimiento
          ? el.acf.foto_listado_procedimiento
          : "https://placehold.co/400x600.png"
      }" alt="${el.title.rendered}" /><span>${el.title.rendered}</span><small>${
        el.acf.nombre_cientifico
      }</small></a></li>`;
      document.querySelector(
        ".favoritos__2 .category-splide .splide__list"
      ).innerHTML += template;
    });
    all.forEach((el) => {
      let template = `<a href="${actualLang}/procedimiento/${get_alias(
        el.title.rendered
      )}-${el.translations[actualLang]}" class="procedimientos__opc"><h4>${
        el.title.rendered
      }</h4><p>${el.acf.nombre_cientifico}</p></a>`;
      document.querySelector(".procedimiento .procedimientos").innerHTML +=
        template;
    });
    new Splide(".category-splide", {
      pagination: false,
      perPage: 3,
      gap: 10,
      breakpoints: {
        768: {
          perPage: 1,
          padding: { left: 0, right: "15%" },
        },
      },
    }).mount();
  }
};
const getProcedimientosPorCategoria = async () => {
  const mainElement = document.querySelector("main");
  if (!mainElement) return; // Verifica si existe el elemento main

  const category = mainElement.dataset.category;
  if (!category) return; // Verifica si se ha especificado la categoría

  try {
    const response = await fetch(
      `${actualLang}/g/procedimientosCategory/?category=${category}`
    );
    if (!response.ok) {
      throw new Error("Error al obtener los procedimientos.");
    }
    const procedimientos = await response.json();

    // Filtrar procedimientos
    const destacados = [];
    const quirurgicos1 = [];
    const quirurgicos2 = [];

    procedimientos.forEach((objeto) => {
      if (objeto.acf.destacar_pro) {
        destacados.push(objeto);
      } else {
        if (objeto.acf.quirurgico_o_no_quirurgico == "1") {
          quirurgicos1.push(objeto);
        } else if (objeto.acf.quirurgico_o_no_quirurgico == "2") {
          quirurgicos2.push(objeto);
        }
      }
    });
    // Asumiendo que quirurgicos1 y quirurgicos2 son arrays, como en tu código original
    // Primero, asegurémonos de mostrar ambos tabs, independientemente de sus condiciones
    document.querySelector("#tabq").style.display = "block";
    document.querySelector("#tabnoq").style.display = "block";

    // Luego, revisamos las condiciones para activar los tabs apropiadamente
    if (quirurgicos1.length > 0 && quirurgicos2.length > 0) {
      // Ambos tienen elementos, activamos uno basado en una regla específica
      // Por ejemplo, podríamos priorizar quirurgicos1 aquí
      document.querySelector("#fav_quirurgico").classList.add("active-tab");
      document.querySelector("#tabq").classList.add("active-link");

      // Aseguramos que el otro tab no esté activo pero se muestre
      document
        .querySelector("#fav_no_quirurgico")
        .classList.remove("active-tab");
      document.querySelector("#tabnoq").classList.remove("active-link");
    } else if (quirurgicos1.length > 0) {
      // Solo quirurgicos1 tiene elementos
      document.querySelector("#fav_quirurgico").classList.add("active-tab");
      document.querySelector("#tabq").classList.add("active-link");

      // Nos aseguramos de que el otro tab no esté activo
      document
        .querySelector("#fav_no_quirurgico")
        .classList.remove("active-tab");
      document.querySelector("#tabnoq").classList.remove("active-link");
    } else if (quirurgicos2.length > 0) {
      // Solo quirurgicos2 tiene elementos
      document.querySelector("#fav_no_quirurgico").classList.add("active-tab");
      document.querySelector("#tabnoq").classList.add("active-link");

      // Nos aseguramos de que el otro tab no esté activo
      document.querySelector("#fav_quirurgico").classList.remove("active-tab");
      document.querySelector("#tabq").classList.remove("active-link");
    } else {
      // Ninguno tiene elementos, podríamos decidir qué hacer en este caso
      // Por ejemplo, desactivar ambos y esconderlos o dejar uno activo como default
      document.querySelector("#fav_quirurgico").classList.remove("active-tab");
      document.querySelector("#tabq").classList.remove("active-link");
      document
        .querySelector("#fav_no_quirurgico")
        .classList.remove("active-tab");
      document.querySelector("#tabnoq").classList.remove("active-link");

      // Opcional: Esconder ambos si es el comportamiento deseado
      document.querySelector("#tabq").style.display = "none";
      document.querySelector("#tabnoq").style.display = "none";
    }

    // Mostrar resultados
    const containerDestacados = document.querySelector(
      ".category-splide .splide__list"
    );
    const favQuirurgicoElement = document.querySelector(
      "#fav_quirurgico .procedimientos"
    );
    const favNoQuirurgicoElement = document.querySelector(
      "#fav_no_quirurgico .procedimientos"
    );
    destacados.forEach((destacado) => {
      const destacadosHTML = `<li class="splide__slide"><a class="procedimiento-card" href="${actualLang}/procedimiento/${get_alias(
        destacado.title.rendered
      )}-${destacado.translations[actualLang]}"><img src="${
        destacado.acf.foto_listado_procedimiento
          ? destacado.acf.foto_listado_procedimiento
          : "https://placehold.co/400x600.png"
      }" alt="pro" /><span>${destacado.title.rendered}</span><small>${
        destacado.acf.nombre_cientifico
      }</small></a></li>`;
      containerDestacados.innerHTML += destacadosHTML;
    });
    quirurgicos1.forEach((quirurgico1) => {
      const quirurgicos1HTML = `<div class="procedimientos__opcc"><a href="${actualLang}/procedimiento/${get_alias(
        quirurgico1.title.rendered
      )}-${quirurgico1.translations[actualLang]}"><h4>${
        quirurgico1.title.rendered
      }</h4><p>${quirurgico1.acf.nombre_cientifico}</p></a></div>`;
      favQuirurgicoElement.innerHTML += quirurgicos1HTML;
    });
    quirurgicos2.forEach((quirurgico2) => {
      const quirurgicos2HTML = `<div class="procedimientos__opcc"><a href="${actualLang}/procedimiento/${get_alias(
        quirurgico2.title.rendered
      )}-${quirurgico2.translations[actualLang]}"><h4>${
        quirurgico2.title.rendered
      }</h4><p>${quirurgico2.acf.nombre_cientifico}</p></a></div>`;
      favNoQuirurgicoElement.innerHTML += quirurgicos2HTML;
    });
    new Splide(".category-splide", {
      pagination: false,
      perPage: 3,
      gap: 10,
      breakpoints: {
        768: {
          perPage: 1,
          padding: { left: 0, right: "15%" },
        },
      },
    }).mount();
    $("#preloader").fadeOut();
  } catch (error) {
    console.error("Error:", error.message);
  }
};
const getProcedimientosPorDoctor = async () => {
  const mainElement = document.querySelector("main");
  if (!mainElement) return; // Verifica si existe el elemento main

  const procedimientos = mainElement.dataset.doctorpro;
  if (!procedimientos) return; // Verifica si se ha especificado la categoría

  try {
    let arrayProcedimientos = JSON.parse(procedimientos);
    let urls = [];
    arrayProcedimientos.forEach((proID) =>
      urls.push(`${actualLang}/g/procedimientosDoctor/?idPro=${proID}`)
    );
    // Map each ID to a promise representing the fetch operation
    const fetchPromises = urls.map(async (url) => {
      const response = await fetch(url);
      return response.json(); // Return the JSON parsed response
    });
    // Wait for all fetch operations to complete
    const allProcedimientos = await Promise.all(fetchPromises);

    // Mostrar resultados
    const containerDestacados = document.querySelector(
      ".category-splide .splide__list"
    );
    allProcedimientos.forEach((destacado) => {
      const destacadosHTML = `<li class="splide__slide"><a class="procedimiento-card" href="${actualLang}/procedimiento/${get_alias(
        destacado.title.rendered
      )}-${destacado.translations[actualLang]}"><img src="${
        destacado.acf.foto_listado_procedimiento
          ? destacado.acf.foto_listado_procedimiento
          : "https://placehold.co/400x600.png"
      }" alt="pro" /><span>${destacado.title.rendered}</span><small>${
        destacado.acf.nombre_cientifico
      }</small></a></li>`;
      containerDestacados.innerHTML += destacadosHTML;
    });
    new Splide(".category-splide", {
      pagination: false,
      perPage: 3,
      gap: 10,
      breakpoints: {
        768: {
          perPage: 1,
          padding: { left: 0, right: "15%" },
        },
      },
    }).mount();
    $("#preloader").fadeOut();
  } catch (error) {
    console.error("Error:", error.message);
  }
};
const getProcedimientosDestacados = async () => {
  if (document.querySelector(".procedimientos-body")) {
    const response = await fetch(`${actualLang}/g/procedimientosDestacados/`);
    const procedimientos = await response.json();
    procedimientos.forEach((el) => {
      let {
        id,
        title: { rendered },
        acf: { nombre_cientifico, foto_listado_procedimiento },
      } = el;
      let template = `<li class="splide__slide"><a href="${actualLang}/procedimiento/${get_alias(
        rendered
      )}-${id}" class="procedimiento-card"><img src="${
        foto_listado_procedimiento
          ? foto_listado_procedimiento
          : `https://placehold.co/400x600?text=Procedimimentos`
      }" alt="pro" /><span>${rendered}</span><small>${nombre_cientifico}</small></a></li>`;
      document.querySelector(
        "#procedimientosDestacados .splide__track .splide__list"
      ).innerHTML += template;
    });
    new Splide("#procedimientosDestacados", {
      type: "loop",
      pagination: false,
      perPage: 3,
      gap: 10,
      breakpoints: {
        768: {
          perPage: 1,
          padding: { left: 0, right: "15%" },
        },
      },
    }).mount();
  }
};
const getProcedimientosInternational = async () => {
  if (document.querySelector(".fueracol")) {
    const response = await fetch(
      `${actualLang}/g/procedimientosInternational/`
    );
    const procedimientos = await response.json();
    procedimientos.forEach((el) => {
      let {
        id,
        title: { rendered },
        acf: {
          nombre_cientifico,
          foto_listado_procedimiento,
          quirurgico_o_no_quirurgico,
        },
      } = el;
      let template = `<li class="splide__slide"><a href="${actualLang}/procedimiento/${get_alias(
        rendered
      )}-${id}" class="procedimiento-card"><div class="badge">${
        quirurgico_o_no_quirurgico == "1" ? "Quirúrgico" : "No quirúrgico"
      }</div><img src="${
        foto_listado_procedimiento
          ? foto_listado_procedimiento
          : `https://placehold.co/400x600?text=Procedimimentos`
      }" alt="pro" /><span>${rendered}</span><small>${nombre_cientifico}</small></a></li>`;
      document.querySelector(
        "#procedimientosDestacados .splide__track .splide__list"
      ).innerHTML += template;
    });
    new Splide("#procedimientosDestacados", {
      type: "loop",
      pagination: false,
      perPage: 3,
      gap: 10,
      breakpoints: {
        768: {
          perPage: 1,
          padding: { left: 0, right: "15%" },
        },
      },
    }).mount();
  }
};
const getTestimoniosDoctor = async () => {
  const testimoniosSlider = document.querySelector("#testimoniosSlider");
  if (testimoniosSlider && document.querySelector("main").dataset.doctorid) {
    const response = await fetch(
      `${actualLang}/g/testimoniosDoctor/?idDoctor=${
        document.querySelector("main").dataset.doctorid
      }`
    );
    const procedimientos = await response.json();

    const createTestimonioTemplate = (testimonio, i, image) => {
      const { title, content, acf } = testimonio;
      return `
        <li class="splide__slide">
          <div class="testimonio">
            <div class="txt">
              <h3>${title.rendered}</h3>
              ${content.rendered}
              <p>${acf.procedimiento_que_se_realizo[0].post_title}</p>
              <p>${palabras[actualLang][59]} ${acf.hace_cuanto_asiste_a_harker_lloreda}</p>
              <a href="" class="btn primary"> <svg width="20" height="21" viewBox="0 0 20 21"
              fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M10 3.38379C6.20304 3.38379 3.125 6.46183 3.125 10.2588C3.125 14.0557 6.20304 17.1338 10 17.1338C13.797 17.1338 16.875 14.0557 16.875 10.2588C16.875 6.46183 13.797 3.38379 10 3.38379ZM1.875 10.2588C1.875 5.77148 5.51269 2.13379 10 2.13379C14.4873 2.13379 18.125 5.77148 18.125 10.2588C18.125 14.7461 14.4873 18.3838 10 18.3838C5.51269 18.3838 1.875 14.7461 1.875 10.2588Z"
                fill="currentColor" />
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M10.0346 7.16841C10.2787 6.92433 10.6744 6.92433 10.9185 7.16841L13.5669 9.81685C13.811 10.0609 13.811 10.4567 13.5669 10.7007L10.9185 13.3492C10.6744 13.5932 10.2787 13.5932 10.0346 13.3492C9.79054 13.1051 9.79054 12.7094 10.0346 12.4653L12.2411 10.2588L10.0346 8.05229C9.79054 7.80822 9.79054 7.41249 10.0346 7.16841Z"
                fill="currentColor" />
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M6.25 10.2588C6.25 9.91361 6.52982 9.63379 6.875 9.63379H13.125C13.4702 9.63379 13.75 9.91361 13.75 10.2588C13.75 10.604 13.4702 10.8838 13.125 10.8838H6.875C6.52982 10.8838 6.25 10.604 6.25 10.2588Z"
                fill="currentColor" />
            </svg>${acf.text_de_call_to_action}</a>
            </div>
            <div class="video-card">
            <button type="button" class="video-toggle-btn" data-index="${i}">
              <div class="pause">
                  <svg xmlns="http://www.w3.org/2000/svg" width="84" height="84" viewBox="0 0 84 84" fill="none">
                <rect width="84" height="84" rx="42" fill="#335C82" stroke="#335C82" stroke-width="2"></rect>
                <line x1="34" y1="28" x2="34" y2="56" stroke="white" stroke-width="3"/>
                <line x1="50" y1="28" x2="50" y2="56" stroke="white" stroke-width="3"/>
            </svg>
              </div>
              <div class="play">
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
              </div>
            </button>
              <img src="${image}" alt="${title.rendered}" id="image-${i}" class="video-image" />
              <video src="${acf.video_vertical}" id="video-${i}" class="video-element"><source src="${acf.video_vertical}";/></video>
            </div>
          </div>
        </li>`;
    };

    const testimonioTemplates = await Promise.all(
      procedimientos.map(async (testimonio, i) => {
        const image = await getImageFromCacheOrFetch(testimonio.acf.testcover);
        return createTestimonioTemplate(testimonio, i, image);
      })
    );

    testimoniosSlider.querySelector(".splide__list").innerHTML +=
      testimonioTemplates.join("");

    testimoniosSlider
      .querySelectorAll(".video-toggle-btn")
      .forEach((btn, i) => {
        btn.addEventListener("click", async () => {
          const playBtn = btn.querySelector(".play");
          const pauseBtn = btn.querySelector(".pause");
          const video = document.getElementById(`video-${i}`);

          if (playBtn.style.display === "block") {
            playBtn.style.display = "none";
            pauseBtn.style.display = "block";
            document.querySelector(`#image-${i}`).style.display = "none";
            video.style.display = "block";
            await video.play();
          } else {
            pauseBtn.style.display = "none";
            playBtn.style.display = "block";
            document.querySelector(`#image-${i}`).style.display = "block";
            video.style.display = "none";
            video.pause();
            video.currentTime = 0;
          }
        });
      });
    new Splide(testimoniosSlider, {
      type: "loop",
      pagination: true,
      gap: 30,
      perPage: 1,
    }).mount();
  }
};
const getTestimoniosPorLinea = async () => {
  const testimoniosSlider = document.querySelector("#testimoniosSlider");
  if (testimoniosSlider && document.querySelector("main").dataset.linea) {
    const response = await fetch(
      `${actualLang}/g/testimoniosLinea/?idLinea=${
        document.querySelector("main").dataset.linea
      }`
    );
    const procedimientos = await response.json();
    console.log(procedimientos);
    const createTestimonioTemplate = (testimonio, i, image) => {
      const { title, content, acf } = testimonio;
      return `
        <li class="splide__slide">
          <div class="testimonio">
            <div class="txt">
              <h3>${title.rendered}</h3>
              ${content.rendered}
              <p>${acf.procedimiento_que_se_realizo[0].post_title}</p>
              <p>${palabras[actualLang][59]} ${acf.hace_cuanto_asiste_a_harker_lloreda}</p>
              <a href="" class="btn primary"> <svg width="20" height="21" viewBox="0 0 20 21"
              fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M10 3.38379C6.20304 3.38379 3.125 6.46183 3.125 10.2588C3.125 14.0557 6.20304 17.1338 10 17.1338C13.797 17.1338 16.875 14.0557 16.875 10.2588C16.875 6.46183 13.797 3.38379 10 3.38379ZM1.875 10.2588C1.875 5.77148 5.51269 2.13379 10 2.13379C14.4873 2.13379 18.125 5.77148 18.125 10.2588C18.125 14.7461 14.4873 18.3838 10 18.3838C5.51269 18.3838 1.875 14.7461 1.875 10.2588Z"
                fill="currentColor" />
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M10.0346 7.16841C10.2787 6.92433 10.6744 6.92433 10.9185 7.16841L13.5669 9.81685C13.811 10.0609 13.811 10.4567 13.5669 10.7007L10.9185 13.3492C10.6744 13.5932 10.2787 13.5932 10.0346 13.3492C9.79054 13.1051 9.79054 12.7094 10.0346 12.4653L12.2411 10.2588L10.0346 8.05229C9.79054 7.80822 9.79054 7.41249 10.0346 7.16841Z"
                fill="currentColor" />
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M6.25 10.2588C6.25 9.91361 6.52982 9.63379 6.875 9.63379H13.125C13.4702 9.63379 13.75 9.91361 13.75 10.2588C13.75 10.604 13.4702 10.8838 13.125 10.8838H6.875C6.52982 10.8838 6.25 10.604 6.25 10.2588Z"
                fill="currentColor" />
            </svg>${acf.text_de_call_to_action}</a>
            </div>
            <div class="video-card">
            <button type="button" class="video-toggle-btn" data-index="${i}">
              <div class="pause">
                  <svg xmlns="http://www.w3.org/2000/svg" width="84" height="84" viewBox="0 0 84 84" fill="none">
                <rect width="84" height="84" rx="42" fill="#335C82" stroke="#335C82" stroke-width="2"></rect>
                <line x1="34" y1="28" x2="34" y2="56" stroke="white" stroke-width="3"/>
                <line x1="50" y1="28" x2="50" y2="56" stroke="white" stroke-width="3"/>
            </svg>
              </div>
              <div class="play">
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
              </div>
            </button>
              <img src="${image}" alt="${title.rendered}" id="image-${i}" class="video-image" />
              <video src="${acf.video_vertical}" id="video-${i}" class="video-element"><source src="${acf.video_vertical}";/></video>
            </div>
          </div>
        </li>`;
    };

    const testimonioTemplates = await Promise.all(
      procedimientos.map(async (testimonio, i) => {
        const image = await getImageFromCacheOrFetch(testimonio.acf.testcover);
        return createTestimonioTemplate(testimonio, i, image);
      })
    );

    testimoniosSlider.querySelector(".splide__list").innerHTML +=
      testimonioTemplates.join("");

    testimoniosSlider
      .querySelectorAll(".video-toggle-btn")
      .forEach((btn, i) => {
        btn.addEventListener("click", async () => {
          const playBtn = btn.querySelector(".play");
          const pauseBtn = btn.querySelector(".pause");
          const video = document.getElementById(`video-${i}`);

          if (playBtn.style.display === "block") {
            playBtn.style.display = "none";
            pauseBtn.style.display = "block";
            document.querySelector(`#image-${i}`).style.display = "none";
            video.style.display = "block";
            await video.play();
          } else {
            pauseBtn.style.display = "none";
            playBtn.style.display = "block";
            document.querySelector(`#image-${i}`).style.display = "block";
            video.style.display = "none";
            video.pause();
            video.currentTime = 0;
          }
        });
      });
    new Splide(testimoniosSlider, {
      type: "loop",
      pagination: true,
      gap: 30,
      perPage: 1,
    }).mount();
  }
};
const getTestimoniosInternational = async () => {
  const testimoniosSlider = document.querySelector("#testimoniosSlider");
  if (testimoniosSlider && document.querySelector(".fueracol")) {
    const response = await fetch(`${actualLang}/g/testimoniosInter`);
    const procedimientos = await response.json();
    const createTestimonioTemplate = (testimonio, i, image) => {
      const { title, content, acf } = testimonio;
      return `
        <li class="splide__slide">
          <div class="testimonio">
            <div class="txt">
              <h3>${title.rendered}</h3>
              ${content.rendered}
              <p>${acf.procedimiento_que_se_realizo[0].post_title}</p>
              <p>${palabras[actualLang][59]} ${acf.hace_cuanto_asiste_a_harker_lloreda}</p>
              <a href="" class="btn primary"> <svg width="20" height="21" viewBox="0 0 20 21"
              fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M10 3.38379C6.20304 3.38379 3.125 6.46183 3.125 10.2588C3.125 14.0557 6.20304 17.1338 10 17.1338C13.797 17.1338 16.875 14.0557 16.875 10.2588C16.875 6.46183 13.797 3.38379 10 3.38379ZM1.875 10.2588C1.875 5.77148 5.51269 2.13379 10 2.13379C14.4873 2.13379 18.125 5.77148 18.125 10.2588C18.125 14.7461 14.4873 18.3838 10 18.3838C5.51269 18.3838 1.875 14.7461 1.875 10.2588Z"
                fill="currentColor" />
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M10.0346 7.16841C10.2787 6.92433 10.6744 6.92433 10.9185 7.16841L13.5669 9.81685C13.811 10.0609 13.811 10.4567 13.5669 10.7007L10.9185 13.3492C10.6744 13.5932 10.2787 13.5932 10.0346 13.3492C9.79054 13.1051 9.79054 12.7094 10.0346 12.4653L12.2411 10.2588L10.0346 8.05229C9.79054 7.80822 9.79054 7.41249 10.0346 7.16841Z"
                fill="currentColor" />
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M6.25 10.2588C6.25 9.91361 6.52982 9.63379 6.875 9.63379H13.125C13.4702 9.63379 13.75 9.91361 13.75 10.2588C13.75 10.604 13.4702 10.8838 13.125 10.8838H6.875C6.52982 10.8838 6.25 10.604 6.25 10.2588Z"
                fill="currentColor" />
            </svg>${acf.text_de_call_to_action}</a>
            </div>
            <div class="video-card">
              <button type="button" id="video-btn-${i}" class="video-btn-testimonio">
                <svg xmlns="http://www.w3.org/2000/svg" width="84" height="84" viewBox="0 0 84 84" fill="none">
                  <rect width="84" height="84" rx="42" fill="#335C82"/>
                  <path d="M33.0283 56.1202V28.8798C33.0283 28.0788 33.923 27.6029 34.5872 28.0505L54.7978 41.6707C55.386 42.0671 55.386 42.9329 54.7978 43.3293L34.5872 56.9495C33.923 57.3971 33.0283 56.9212 33.0283 56.1202Z" stroke="white" stroke-width="2" stroke-linecap="round"/>
                </svg>
              </button>
              <img src="${image}" alt="${title.rendered}" id="image-${i}-testimonio" />
              <video src="${acf.video_vertical}" id="video-${i}-testimonio"><source src="${acf.video_vertical}";/></video>
            </div>
          </div>
        </li>`;
    };
    const testimonioTemplates = await Promise.all(
      procedimientos.map(async (testimonio, i) => {
        const image = await getImageFromCacheOrFetch(testimonio.acf.testcover);
        return createTestimonioTemplate(testimonio, i, image);
      })
    );

    testimoniosSlider.querySelector(".splide__list").innerHTML +=
      testimonioTemplates.join("");

    testimoniosSlider
      .querySelectorAll(".video-btn-testimonio")
      .forEach((button, i) => {
        const video = document.getElementById(`video-${i}-testimonio`);
        const image = document.getElementById(`image-${i}-testimonio`);

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
      });

    new Splide(testimoniosSlider, {
      type: procedimientos.length > 1 ? "loop" : "slide",
      pagination: true,
      gap: 30,
      perPage: 1,
    }).mount();
  }
};
const getTestimoniosProcedimientos = async () => {
  const testimoniosSlider = document.querySelector("#testimoniosSlider");
  if (testimoniosSlider && document.querySelector("main").dataset.proid) {
    const response = await fetch(
      `${actualLang}/g/testimoniosPro/?idPro=${
        document.querySelector("main").dataset.proid
      }`
    );
    const procedimientos = await response.json();

    if (procedimientos.length > 0) {
      document.querySelector("#pacientes").style.display = "none";
      document.querySelector(".pacientes__ayudados").style.display = "none";
    } else {
      document.querySelector("#pacientes").style.display = "none";
    }

    const createTestimonioTemplate = (testimonio, i, image) => {
      const { title, content, acf } = testimonio;
      return `
        <li class="splide__slide">
          <div class="testimonio">
            <div class="txt">
              <h3>${title.rendered}</h3>
              ${content.rendered}
              <p>${palabras[actualLang][59]} ${acf.hace_cuanto_asiste_a_harker_lloreda}</p>
              <a href="" class="btn primary"> <svg width="20" height="21" viewBox="0 0 20 21"
              fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M10 3.38379C6.20304 3.38379 3.125 6.46183 3.125 10.2588C3.125 14.0557 6.20304 17.1338 10 17.1338C13.797 17.1338 16.875 14.0557 16.875 10.2588C16.875 6.46183 13.797 3.38379 10 3.38379ZM1.875 10.2588C1.875 5.77148 5.51269 2.13379 10 2.13379C14.4873 2.13379 18.125 5.77148 18.125 10.2588C18.125 14.7461 14.4873 18.3838 10 18.3838C5.51269 18.3838 1.875 14.7461 1.875 10.2588Z"
                fill="currentColor" />
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M10.0346 7.16841C10.2787 6.92433 10.6744 6.92433 10.9185 7.16841L13.5669 9.81685C13.811 10.0609 13.811 10.4567 13.5669 10.7007L10.9185 13.3492C10.6744 13.5932 10.2787 13.5932 10.0346 13.3492C9.79054 13.1051 9.79054 12.7094 10.0346 12.4653L12.2411 10.2588L10.0346 8.05229C9.79054 7.80822 9.79054 7.41249 10.0346 7.16841Z"
                fill="currentColor" />
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M6.25 10.2588C6.25 9.91361 6.52982 9.63379 6.875 9.63379H13.125C13.4702 9.63379 13.75 9.91361 13.75 10.2588C13.75 10.604 13.4702 10.8838 13.125 10.8838H6.875C6.52982 10.8838 6.25 10.604 6.25 10.2588Z"
                fill="currentColor" />
            </svg>${acf.text_de_call_to_action}</a>
            </div>
            <div class="video-card">
              <button type="button" id="video-btn-${i}" class="video-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="84" height="84" viewBox="0 0 84 84" fill="none">
                  <rect width="84" height="84" rx="42" fill="#335C82"/>
                  <path d="M33.0283 56.1202V28.8798C33.0283 28.0788 33.923 27.6029 34.5872 28.0505L54.7978 41.6707C55.386 42.0671 55.386 42.9329 54.7978 43.3293L34.5872 56.9495C33.923 57.3971 33.0283 56.9212 33.0283 56.1202Z" stroke="white" stroke-width="2" stroke-linecap="round"/>
                </svg>
              </button>
              <img src="${image}" alt="${title.rendered}" id="image-${i}" />
              <video src="${acf.video_vertical}" id="video-${i}"><source src="${acf.video_vertical}";/></video>
            </div>
          </div>
        </li>`;
    };

    const testimonioTemplates = await Promise.all(
      procedimientos.map(async (testimonio, i) => {
        const image = await getImageFromCacheOrFetch(testimonio.acf.testcover);
        return createTestimonioTemplate(testimonio, i, image);
      })
    );

    testimoniosSlider.querySelector(".splide__list").innerHTML +=
      testimonioTemplates.join("");

    testimoniosSlider.querySelectorAll(".video-btn").forEach((button, i) => {
      const video = document.getElementById(`video-${i}`);
      const image = document.getElementById(`image-${i}`);

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
    });

    new Splide(testimoniosSlider, {
      type: "loop",
      pagination: true,
      gap: 30,
      perPage: 1,
    }).mount();
  }
};
const getAntesDespuesProcedimientos = async () => {
  if (document.querySelector("main").dataset.antesdespues) {
    let antesDespuesID = JSON.parse(
      document.querySelector("main").dataset.antesdespues
    );
    // Map each ID to a promise representing the fetch operation
    const fetchPromises = antesDespuesID.map(async (id) => {
      const response = await fetch(`${actualLang}/g/antesDespues/?id=${id}`);
      return response.json(); // Return the JSON parsed response
    });
    // Wait for all fetch operations to complete
    const antesDespuesArrays = await Promise.all(fetchPromises);
    // Flatten the arrays and log each element
    antesDespuesArrays.forEach((antesDespues) => {
      let {
        title: { rendered },
        acf: { imagen_antes, imagen_despues },
      } = antesDespues;
      let template = `  <li class="splide__slide"><div class="image-compare"> <img src="${imagen_antes}" alt="${rendered}"  />
      <img src="${imagen_despues}" alt="${rendered}" /></div></li>`;
      document.querySelector(".splide-comparison .splide__list").innerHTML +=
        template;
    });
    new Splide(".splide-comparison", {
      type: "loop",
      pagination: false,
      drag: false,
      classes: {
        prev: "splide__arrow splide__arrow--prev",
        next: "splide__arrow splide__arrow--next",
      },
    }).mount();
    const viewers = document.querySelectorAll(".image-compare");

    viewers.forEach((element) => {
      let view = new ImageCompare(element, {
        controlColor: "#335c82",
        controlShadow: false,
        addCircle: true,
        addCircleBlur: true,
        // Label Defaults
        showLabels: true,
        labelOptions: {
          before: "Antes",
          after: "Después",
          onHover: true,
        },
        smoothing: false,
        // Other options
        hoverStart: false,
        verticalMode: false,
        startingPoint: 50,
        fluidMode: false,
      }).mount();
    });
  } else {
    if (document.querySelector(".resultados-div")) {
      document.querySelector(".resultados-div").style.display = "none";
    }
  }
};

document.addEventListener("DOMContentLoaded", () => {
  $("#preloader").fadeOut();
  if (document.querySelector("#fureacolSplide")) {
    var splide = new Splide("#fureacolSplide", {
      arrows: true,
      focus: "center",
      gap: 20,
      pagination: false,
      perPage: 1,
    }).mount();
    const toggleVideoImage = (video, image) => {
      if (video) {
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
      }
    };
    splide.on("moved", function () {
      // Seleccionar todos los elementos de vídeo
      const videos = document.querySelectorAll("video");
      // Iterar sobre cada vídeo para encontrar el que no está pausado
      let videoNoPausado = null;
      for (let i = 0; i < videos.length; i++) {
        if (!videos[i].paused) {
          videoNoPausado = videos[i];
          break; // Detener la iteración cuando se encuentre un vídeo no pausado
        }
      }

      // videoNoPausado ahora contiene el primer vídeo que no está pausado, si lo hay
      if (videoNoPausado) {
        videoNoPausado.pause();
      }
    });
  }
  $("#container").addClass("loaded");
  // Once the container has finished, the scroll appears
  if ($("#container").hasClass("loaded")) {
    // It is so that once the container is gone, the entire preloader section is deleted
    $("#preloader")
      .delay(1500)
      .queue(function () {
        $(this).remove();
      });
  }
  Fancybox.bind("[data-fancybox]", {});
  AOS.init({ once: true });
  initSplides();
  calcHeightProcedimientos();
  getEquipoDestacadoHome();
  getExtraInfoHome();
  getCategoriasProcedimientos();
  getOtherTeamMembers();
  getEmpresasConvenios();
  getProcedimientosPorLinea();
  getProcedimientosDestacados();
  getProcedimientosInternational();
  getProcedimientosPorCategoria();
  getAntesDespuesProcedimientos();
  getTestimoniosDoctor();
  getTestimoniosPorLinea();
  getTestimoniosInternational();
  getTestimoniosProcedimientos();
  getProcedimientosPorDoctor();
});
function toggleIcon(expandIconPlus, expandIconMinus, isOpen) {
  if (isOpen) {
    expandIconPlus.style.display = "none";
    expandIconMinus.style.display = "block";
  } else {
    expandIconPlus.style.display = "block";
    expandIconMinus.style.display = "none";
  }
}
function createAccordion(el) {
  let animation = null;
  let isClosing = false;
  let isExpanding = false;
  const summary = el.querySelector("summary");
  const content = el.querySelector(".faq-content");
  const expandIconPlus = summary.querySelector(".icon-tabler-circle-plus");
  const expandIconMinus = summary.querySelector(".icon-tabler-circle-minus");

  function onClick(e) {
    e.preventDefault();
    el.style.overflow = "hidden";
    if (isClosing || !el.open) {
      open();
    } else if (isExpanding || el.open) {
      shrink();
    }
  }

  function shrink() {
    isClosing = true;
    const startHeight = `${el.offsetHeight}px`;
    const endHeight = `${summary.offsetHeight}px`;
    if (animation) {
      animation.cancel();
    }
    animation = el.animate(
      {
        height: [startHeight, endHeight],
      },
      {
        duration: 400,
        easing: "ease-out",
      }
    );
    animation.onfinish = () => {
      toggleIcon(expandIconPlus, expandIconMinus, false);
      onAnimationFinish(false);
    };
    animation.oncancel = () => {
      toggleIcon(expandIconPlus, expandIconMinus, false);
      isClosing = false;
    };
  }

  function open() {
    el.style.height = `${el.offsetHeight}px`;
    el.open = true;
    window.requestAnimationFrame(expand);
  }

  function expand() {
    isExpanding = true;
    const startHeight = `${el.offsetHeight}px`;
    const endHeight = `${summary.offsetHeight + content.offsetHeight}px`;
    if (animation) {
      animation.cancel();
    }
    animation = el.animate(
      {
        height: [startHeight, endHeight],
      },
      {
        duration: 350,
        easing: "ease-out",
      }
    );
    animation.onfinish = () => {
      toggleIcon(expandIconPlus, expandIconMinus, true);
      onAnimationFinish(true);
    };
    animation.oncancel = () => {
      toggleIcon(expandIconPlus, expandIconMinus, true);
      isExpanding = false;
    };
  }

  function onAnimationFinish(open) {
    el.open = open;
    animation = null;
    isClosing = false;
    isExpanding = false;
    el.style.height = el.style.overflow = "";
  }

  summary.addEventListener("click", onClick);
}
document.querySelectorAll("details").forEach(createAccordion);
document.querySelectorAll(".video-container .play").forEach((button) => {
  button.addEventListener("click", () => {
    const videoContainer = button.parentNode;
    const video = videoContainer.querySelector("video");

    if (video.paused) {
      button.innerHTML =
        '<svg xmlns="http://www.w3.org/2000/svg" width="84" height="84" viewBox="0 0 84 84" fill="none"><rect width="84" height="84" rx="42" fill="#335C82" /><path d="M42 84C65.4508 84 84 65.4508 84 42C84 18.5492 65.4508 0 42 0C18.5492 0 0 18.5492 0 42C0 65.4508 18.5492 84 42 84Z" fill="white" /><rect x="31.5" y="22.5" width="8" height="39" fill="#193751" /><rect x="44.5" y="22.5" width="8" height="39" fill="#193751" /></svg>';
      video.play();
    } else {
      button.innerHTML =
        '<svg xmlns="http://www.w3.org/2000/svg" width="84" height="84" viewBox="0 0 84 84" fill="none"><rect width="84" height="84" rx="42" fill="#335C82" /><path d="M33.0283 56.1202V28.8798C33.0283 28.0788 33.923 27.6029 34.5872 28.0505L54.7978 41.6707C55.386 42.0671 55.386 42.9329 54.7978 43.3293L34.5872 56.9495C33.923 57.3971 33.0283 56.9212 33.0283 56.1202Z" stroke="white" stroke-width="2" stroke-linecap="round" /></svg>';
      video.pause();
    }
  });
});
document.querySelectorAll(".video-container video").forEach((video) => {
  video.addEventListener("click", () => {
    const videoContainer = video.parentNode;
    const playButton = videoContainer.querySelector(".play");

    if (video.paused) {
      playButton.innerHTML =
        '<svg xmlns="http://www.w3.org/2000/svg" width="84" height="84" viewBox="0 0 84 84" fill="none"><rect width="84" height="84" rx="42" fill="#335C82" /><path d="M42 84C65.4508 84 84 65.4508 84 42C84 18.5492 65.4508 0 42 0C18.5492 0 0 18.5492 0 42C0 65.4508 18.5492 84 42 84Z" fill="white" /><rect x="31.5" y="22.5" width="8" height="39" fill="#193751" /><rect x="44.5" y="22.5" width="8" height="39" fill="#193751" /></svg>';
      video.volume = 0.1;
      video.play();
    } else {
      playButton.innerHTML =
        '<svg xmlns="http://www.w3.org/2000/svg" width="84" height="84" viewBox="0 0 84 84" fill="none"><rect width="84" height="84" rx="42" fill="#335C82" /><path d="M33.0283 56.1202V28.8798C33.0283 28.0788 33.923 27.6029 34.5872 28.0505L54.7978 41.6707C55.386 42.0671 55.386 42.9329 54.7978 43.3293L34.5872 56.9495C33.923 57.3971 33.0283 56.9212 33.0283 56.1202Z" stroke="white" stroke-width="2" stroke-linecap="round" /></svg>';
      video.pause();
    }
  });
});

// tabs
var tablinks = document.getElementsByClassName("tab-links");
var tabcontents = document.getElementsByClassName("tab-contents");

function opentab(tabname) {
  for (tablink of tablinks) {
    tablink.classList.remove("active-link");
  }
  for (tabcontent of tabcontents) {
    tabcontent.classList.remove("active-tab");
  }
  event.currentTarget.classList.add("active-link");
  document.getElementById(tabname).classList.add("active-tab");
}

// form restriction for numbers only
function validarInputNumerico(input) {
  input.value = input.value.replace(/[^0-9]/g, "");
}

// transition on click
function opentab(tabId) {
  // Oculta todos los contenidos y desactiva todas las pestañas
  const tabContents = document.querySelectorAll(".tab-contents");
  const tabLinks = document.querySelectorAll(".tab-links");

  tabContents.forEach((tabContent) => {
    tabContent.classList.remove("active-tab");
  });

  tabLinks.forEach((tabLink) => {
    tabLink.classList.remove("active-link");
  });

  // Muestra el contenido del tab seleccionado y activa la pestaña
  document.getElementById(tabId).classList.add("active-tab");
  event.currentTarget.classList.add("active-link");
}

document.querySelector("#openMenu").addEventListener("click", () => {
  document.querySelector("nav").classList.add("active");
});
document.querySelector("#closeMenu").addEventListener("click", () => {
  document.querySelector("nav").classList.remove("active");
});
if (document.querySelector("#splideGallery")) {
  var splide = new Splide("#splideGallery", {
    type: "loop",
    perPage: 3,
    gap: 15,
  });
  splide.mount();
}

if (document.querySelector(".card-wrapper")) {
  var card = new Card({
    form: "#data-form",
    container: ".card-wrapper",
    formSelectors: {
      numberInput: ".kr-pan input",
      expiryInput: ".kr-expiry input",
      cvcInput: ".kr-security-code input",
      nameInput: "input#name",
    },
    formatting: true,
    name: "JULIAN DELGADO",
    expiry: "••/••",
    cvc: "•••",
    messages: {
      validDate: "expire\ndate",
      monthYear: "mm/yy",
    },
    debug: true,
  });
}
// Función para dar formato a los números con separadores de miles
function number_format(number, decimals, decPoint, thousandsSep) {
  decimals = decimals || 0;
  number = parseFloat(number);
  if (!decPoint || !thousandsSep) {
    decPoint = ".";
    thousandsSep = ",";
  }
  var roundedNumber = Math.round(Math.abs(number) * ("1e" + decimals)) + "";
  var numbersString = decimals
    ? roundedNumber.slice(0, decimals * -1)
    : roundedNumber;
  var decimalsString = decimals ? roundedNumber.slice(decimals * -1) : "";
  var formattedNumber = "";
  while (numbersString.length > 3) {
    formattedNumber = thousandsSep + numbersString.slice(-3) + formattedNumber;
    numbersString = numbersString.slice(0, -3);
  }
  return (
    (number < 0 ? "-" : "") +
    numbersString +
    formattedNumber +
    (decimalsString ? decPoint + decimalsString : "")
  );
}

const changeValuePrice = (el) => {
  if (el.value == "otro") {
    document.querySelector("#price").removeAttribute("readonly");
    document.querySelector("#concept").setAttribute("type", "text");
  } else {
    let select = document.querySelector(`option[value="${el.value}"]`);
    document.querySelector("#concept").setAttribute("type", "hidden");
    document.querySelector("#price").value = `$${number_format(
      select.dataset.price,
      0,
      ".",
      "."
    )}`;
    document.querySelector("#priceNoFormatted").value = select.dataset.price;
    console.log(select.dataset.price);
    document.querySelector('label[for="amount"]').classList.add("active");
  }
};

$("#data-form").validate({
  ignore: "",
  errorElement: "div",
  errorPlacement: function (error, element) {
    error.prependTo(element.parent());
  },
  rules: {
    vads_cust_first_name: { required: true },
    vads_cust_cell_phone: { required: true },
    vads_cust_id: { required: true },
    vads_cust_email: { required: true },
    vads_cust_address_number: { required: true },
    politics: { required: true },
  },
  messages: {
    vads_cust_first_name: { required: "Este campo es obligatorio" },
    vads_cust_cell_phone: { required: "Este campo es obligatorio" },
    vads_cust_id: { required: "Este campo es obligatorio" },
    vads_cust_email: { required: "Este campo es obligatorio" },
    vads_cust_address_number: { required: "Este campo es obligatorio" },
    politics: { required: "Este campo es obligatorio" },
  },
  submitHandler: function (form) {
    $("#data-form button[type=submit]").attr("disabled", true);
    $("#data-form button[type=submit]").text("Enviando");
    form.submit();
  },
});

async function TestPayCard() {
  var myHeaders = new Headers();
  myHeaders.append("Content-Type", "application/json");
  myHeaders.append(
    "Authorization",
    "Basic NDE0ODExMDI6dGVzdHBhc3N3b3JkX2wyUDRIT0diekZ3ZUJUVEROeVA4c09nc0FsclZqUWF1YTR5d2ppU1VQMU1qRg=="
  );
  myHeaders.append(
    "Cookie",
    "JSESSIONID=ee5c91b122a5143ec11E54B93dbc25672CdBfDb7.vadworldapi01-bdx-prod-fr-lyra"
  );
  var timeZoneOffset = new Date().getTimezoneOffset();
  if (
    typeof window !== "undefined" &&
    typeof window.navigator !== "undefined" &&
    typeof window.navigator.userAgent === "string"
  ) {
    // JavaScript is likely enabled
    javaEnabled = true;
  } else {
    // JavaScript may be disabled
    javaEnabled = false;
  }
  var raw = JSON.stringify({
    currency: "COP",
    paymentForms: [
      {
        paymentMethodType: "CARD",
        pan: "5303710242236294",
        expiryMonth: "01",
        expiryYear: "26",
        securityCode: "037",
      },
    ],
    customer: {
      email: "dreinovcorp@gmail.com",
    },
    device: {
      deviceType: "BROWSER",
      acceptHeader: "application/json",
      javaEnabled,
      language: navigator.language,
      colorDepth: screen.colorDepth,
      screenHeight: screen.height,
      screenWidth: screen.width,
      timeZoneOffset,
      userAgent: navigator.userAgent,
    },
  });

  var requestOptions = {
    method: "POST",
    headers: myHeaders,
    body: raw,
    redirect: "follow",
  };

  await fetch(
    "https://api.payzen.lat/api-payment/V4/PCI/Charge/VerifyPaymentMethod",
    requestOptions
  )
    .then((response) => response.json())
    .then((result) => console.log(result))
    .catch((error) => console.log("error", error));
}
