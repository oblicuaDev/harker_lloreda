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

  url.pathname = pathArray.join("/");
  location.href = url.href;
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
  if (document.querySelector("#primary-slider")) {
    new Splide("#primary-slider", {
      type: "loop",
      pagination: true,
      gap: 30,
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
  if (document.querySelector(".category-splide")) {
    new Splide(".category-splide", {
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
  if (document.querySelector(".home")) {
    const response = await fetch(
      `/lab/harker_lloreda/${actualLang}/g/destacados_home/`
    );
    const equipoHome = await response.json();
    if (actualLang == "es") {
      var idPrimero = 284; // Puedes cambiar esto al ID que necesites
    } else {
      var idPrimero = 230; // Puedes cambiar esto al ID que necesites
    }

    let EquipoSorted = equipoHome.sort(function (a, b) {
      // Comprobamos si alguno de los IDs es el ID que debe ir primero
      var aPrimero = a.id === idPrimero;
      var bPrimero = b.id === idPrimero;

      // Si ambos deben ir primero o ninguno debe ir primero, comparamos por ID normalmente
      if (aPrimero === bPrimero) {
        return 0;
      }

      // Si solo uno de ellos debe ir primero, ese va primero
      return aPrimero ? -1 : 1;
    });
    console.log(EquipoSorted);

    equipoHome.forEach(async (equipo, i) => {
      let image = await getImageFromCacheOrFetch(equipo.acf.foto_vertical_);
      let template = `
      <div class="container doctor ${i % 2 == 0 ? "left-doc" : ""}">
            <div class="txt">
              <h4>${equipo.title.rendered}</h4>
              <p>${equipo.acf.profesion}</p>
              <p>${equipo.acf.institucion_educativa_opcional}</p>
              <p>${equipo.acf.subtitulo}</p>
              <a href="" class="btn primary"
                >${equipo.acf.texto_cta_home}
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
            <a
              href="${equipo.acf.video_vertical_}"
              class="video-card"
              data-fancybox="gallery"
            >
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
              <img src="${image}" alt="${equipo.title.rendered}" />
            </a>
          </div>`;
      document.querySelector("#equipo_destacado .container").innerHTML +=
        template;
    });
  }
}
async function getCategoriasProcedimientos() {
  if (document.querySelector(".cards .card-grid")) {
    const response = await fetch(
      `/lab/harker_lloreda/${actualLang}/g/categorias_procedimientos/`
    );
    const categoriasProcedimientos = await response.json();
    categoriasProcedimientos.forEach(async (categoria, i) => {
      let image = await getImageFromCacheOrFetch(categoria.acf.foto_cuadrada);
      let link = `${actualLang}/procedimientos/${get_alias(
        categoria.title.rendered
      )}-${categoria.id}`;
      let template = `<a href="${link}" class="card-category"><img src="${image}" alt="${categoria.title.rendered}"><span>${categoria.title.rendered}</span></a>`;
      document.querySelector(".cards .card-grid").innerHTML += template;
      document.querySelector(
        "#categoriasPro"
      ).innerHTML += `  <li><a href="${link}">${categoria.title.rendered}</a></li>`;
    });
  }
}
async function getExtraInfoHome() {
  if (document.querySelector(".home")) {
    const response = await fetch(
      `/lab/harker_lloreda/${actualLang}/g/home_extra_info/`
    );
    const infoExtra = await response.json();
    let imagenfuera = await getImageFromCacheOrFetch(
      infoExtra.fuera.acf.imagen_para_home
    );
    let imagentour = await getImageFromCacheOrFetch(
      infoExtra.tour.acf.imagen_de_instalaciones_tour_virtual
    );
    document.querySelector(
      "#fuera"
    ).innerHTML = `<div class="txt"><h4>${infoExtra.fuera.acf.titulo_para_home}</h4>${infoExtra.fuera.acf.descripcion_para_home}<a href="" class="btn primary">${infoExtra.fuera.acf.texto_cta_para_home}<svg  width="20"  height="21"  viewBox="0 0 20 21"  fill="none"  xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M10 3.38379C6.20304 3.38379 3.125 6.46183 3.125 10.2588C3.125 14.0557 6.20304 17.1338 10 17.1338C13.797 17.1338 16.875 14.0557 16.875 10.2588C16.875 6.46183 13.797 3.38379 10 3.38379ZM1.875 10.2588C1.875 5.77148 5.51269 2.13379 10 2.13379C14.4873 2.13379 18.125 5.77148 18.125 10.2588C18.125 14.7461 14.4873 18.3838 10 18.3838C5.51269 18.3838 1.875 14.7461 1.875 10.2588Z" fill="currentColor"/><path fill-rule="evenodd" clip-rule="evenodd" d="M10.0346 7.16841C10.2787 6.92433 10.6744 6.92433 10.9185 7.16841L13.5669 9.81685C13.811 10.0609 13.811 10.4567 13.5669 10.7007L10.9185 13.3492C10.6744 13.5932 10.2787 13.5932 10.0346 13.3492C9.79054 13.1051 9.79054 12.7094 10.0346 12.4653L12.2411 10.2588L10.0346 8.05229C9.79054 7.80822 9.79054 7.41249 10.0346 7.16841Z" fill="currentColor"/><path fill-rule="evenodd" clip-rule="evenodd" d="M6.25 10.2588C6.25 9.91361 6.52982 9.63379 6.875 9.63379H13.125C13.4702 9.63379 13.75 9.91361 13.75 10.2588C13.75 10.604 13.4702 10.8838 13.125 10.8838H6.875C6.52982 10.8838 6.25 10.604 6.25 10.2588Z" fill="currentColor"/></svg></a></div><img src="${imagenfuera}" alt="${infoExtra.fuera.acf.titulo_para_home}" />`;
    document.querySelector(
      "#tour"
    ).innerHTML = `<img src="${imagentour}" alt="${infoExtra.tour.acf.titulo_tour_virtual}" /><div class="txt txt__2"><h4>${infoExtra.tour.acf.titulo_tour_virtual}</h4>${infoExtra.tour.acf.descripcion_tour_virtual}<a href="" class="btn primary">${infoExtra.tour.acf.texto_boton_tour_virtual}<svg  width="20"  height="21"  viewBox="0 0 20 21"  fill="none"  xmlns="http://www.w3.org/2000/svg"><path  fill-rule="evenodd"  clip-rule="evenodd"  d="M10 3.38379C6.20304 3.38379 3.125 6.46183 3.125 10.2588C3.125 14.0557 6.20304 17.1338 10 17.1338C13.797 17.1338 16.875 14.0557 16.875 10.2588C16.875 6.46183 13.797 3.38379 10 3.38379ZM1.875 10.2588C1.875 5.77148 5.51269 2.13379 10 2.13379C14.4873 2.13379 18.125 5.77148 18.125 10.2588C18.125 14.7461 14.4873 18.3838 10 18.3838C5.51269 18.3838 1.875 14.7461 1.875 10.2588Z"  fill="currentColor"/><path  fill-rule="evenodd"  clip-rule="evenodd"  d="M10.0346 7.16841C10.2787 6.92433 10.6744 6.92433 10.9185 7.16841L13.5669 9.81685C13.811 10.0609 13.811 10.4567 13.5669 10.7007L10.9185 13.3492C10.6744 13.5932 10.2787 13.5932 10.0346 13.3492C9.79054 13.1051 9.79054 12.7094 10.0346 12.4653L12.2411 10.2588L10.0346 8.05229C9.79054 7.80822 9.79054 7.41249 10.0346 7.16841Z"  fill="currentColor"/><path  fill-rule="evenodd"  clip-rule="evenodd"  d="M6.25 10.2588C6.25 9.91361 6.52982 9.63379 6.875 9.63379H13.125C13.4702 9.63379 13.75 9.91361 13.75 10.2588C13.75 10.604 13.4702 10.8838 13.125 10.8838H6.875C6.52982 10.8838 6.25 10.604 6.25 10.2588Z"  fill="currentColor"/></svg></a>
    </div>`;
  }
}
document.addEventListener("DOMContentLoaded", () => {
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
  AOS.init();
  initSplides();
  calcHeightProcedimientos();
  getEquipoDestacadoHome();
  getExtraInfoHome();
  getCategoriasProcedimientos();
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
      video.play();
    } else {
      playButton.innerHTML =
        '<svg xmlns="http://www.w3.org/2000/svg" width="84" height="84" viewBox="0 0 84 84" fill="none"><rect width="84" height="84" rx="42" fill="#335C82" /><path d="M33.0283 56.1202V28.8798C33.0283 28.0788 33.923 27.6029 34.5872 28.0505L54.7978 41.6707C55.386 42.0671 55.386 42.9329 54.7978 43.3293L34.5872 56.9495C33.923 57.3971 33.0283 56.9212 33.0283 56.1202Z" stroke="white" stroke-width="2" stroke-linecap="round" /></svg>';
      video.pause();
    }
  });
});
const imageComparisonSlider = document.querySelector(
  '[data-component="image-comparison-slider"]'
);
function setSliderstate(e, element) {
  const sliderRange = element.querySelector("[data-image-comparison-range]");

  if (e.type === "input") {
    sliderRange.classList.add("image-comparison__range--active");
    return;
  }

  sliderRange.classList.remove("image-comparison__range--active");
  element.removeEventListener("mousemove", moveSliderThumb);
}
function moveSliderThumb(e) {
  const sliderRange = document.querySelector("[data-image-comparison-range]");
  const thumb = document.querySelector("[data-image-comparison-thumb]");
  let position = e.layerY - 20;

  if (e.layerY <= sliderRange.offsetTop) {
    position = -20;
  }

  if (e.layerY >= sliderRange.offsetHeight) {
    position = sliderRange.offsetHeight - 20;
  }

  thumb.style.top = `${position}px`;
}
function moveSliderRange(e, element) {
  const value = e.target.value;
  const slider = element.querySelector("[data-image-comparison-slider]");
  const imageWrapperOverlay = element.querySelector(
    "[data-image-comparison-overlay]"
  );

  slider.style.left = `${value}%`;
  imageWrapperOverlay.style.width = `${value}%`;

  element.addEventListener("mousemove", moveSliderThumb);
  setSliderstate(e, element);
}

function init(element) {
  const sliderRange = element.querySelector("[data-image-comparison-range]");

  if ("ontouchstart" in window === false) {
    sliderRange.addEventListener("mouseup", (e) => setSliderstate(e, element));
    sliderRange.addEventListener("mousedown", moveSliderThumb);
  }

  sliderRange.addEventListener("input", (e) => moveSliderRange(e, element));
  sliderRange.addEventListener("change", (e) => moveSliderRange(e, element));
}

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
if (imageComparisonSlider) {
  init(imageComparisonSlider);
}

document.querySelector("#openMenu").addEventListener("click", () => {
  document.querySelector("nav").classList.add("active");
});
document.querySelector("#closeMenu").addEventListener("click", () => {
  document.querySelector("nav").classList.remove("active");
});
