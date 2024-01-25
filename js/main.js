document.addEventListener("DOMContentLoaded", () => {
  console.log("READY!");
  Fancybox.bind("[data-fancybox]", {});
  AOS.init();
  if (document.querySelector(".splideHome")) {
    new Splide(".splideHome", {
      pagination: false,
    }).mount();
  }

  if (document.querySelector(".splideEquipo")) {
    new Splide(".splideEquipo", {
      pagination: true,
      perPage: 1
    }).mount();

  }
  if (document.querySelector("#primary-slider")) {
    new Splide("#primary-slider", {
      pagination: true,
      gap:30,
      perPage: 1
    }).mount();

  }
  if (document.querySelector("#personas-slider")) {
    new Splide("#personas-slider", {
      pagination: true,
      gap:30,
      perPage: 1
    }).mount();

  }
  if (document.querySelector(".category-splide")) {
    new Splide(".category-splide", {
      pagination: false,
      perPage: 3,
      gap: 10,
      breakpoints: {
        768: {
      perPage: 1,
      padding: { left: 0, right: "15%" }
      },
    }
    }).mount();
  }

  if (document.querySelector(".teens-splide")) {
    new Splide(".teens-splide", {
      pagination: false,
      perPage: 3,
      gap: 10,
      breakpoints: {
		    768: {
			perPage: 1,
		  },
    }
    }).mount();
  }

  if (document.querySelector(".body-splide")) {
    new Splide(".body-splide", {
      pagination: false,
      perPage: 3,
      gap: 10,
      breakpoints: {
		    768: {
			perPage: 1,
		  },
    }
    }).mount();
  }

  if (document.querySelector(".ellos-splide")) {
    new Splide(".ellos-splide", {
      pagination: false,
      perPage: 3,
      gap: 10,
      breakpoints: {
        768: {
          arrows: false,
			perPage: 1,
      padding: { left: 0, right: "15%" }
		  },
    }
    }).mount();
  }

  if (document.querySelector(".splide-comparison")) {
    new Splide(".splide-comparison", {
      pagination: false,
      drag: false,
      classes: {
        prev: "splide__arrow splide__arrow--prev",
        next: "splide__arrow splide__arrow--next",
      },
    }).mount();
  }
  if(document.querySelectorAll(".proced-extr__quirurgico")){
    // Obtén todos los elementos que coinciden con los selectores
    var elementos = document.querySelectorAll(".proced-extr__quirurgico a, .proced-extr__no-quirurgico a");
    
    // Inicializa una variable para almacenar la altura máxima
    var alturaMaxima = 0;
    
    // Itera sobre cada elemento para encontrar la altura máxima
    elementos.forEach(function(elemento) {
        var alturaElemento = elemento.clientHeight; // Obtén la altura del elemento
    
        // Compara y actualiza la altura máxima si es necesario
        if (alturaElemento > alturaMaxima) {
            alturaMaxima = alturaElemento;
        }
    });
    
    // Itera nuevamente para establecer la altura máxima en todos los elementos
    elementos.forEach(function(elemento) {
        elemento.style.height = alturaMaxima + "px";
    });
  }
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

preloader;

$(document).ready(function () {
  setTimeout(function () {
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
  }, 1500);
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
if (imageComparisonSlider) {
  init(imageComparisonSlider);
}

document.querySelector("#openMenu").addEventListener("click", () => {
  document.querySelector("nav").classList.add("active");
});
document.querySelector("#closeMenu").addEventListener("click", () => {
  document.querySelector("nav").classList.remove("active");
});
