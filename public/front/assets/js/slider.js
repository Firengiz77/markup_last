document.addEventListener("DOMContentLoaded", function () {
  const OPTIONS = { loop: true };
  const SLIDE_COUNT = 11;
  const SLIDES_TO_SHOW = 3;
  const slides = Array.from(
    { length: SLIDE_COUNT },
    (_, i) => `/sliderImg/slide${i + 1}.svg`
  );
  const container = document.querySelector(".embla__container");

  const autoScrollInterval = 1500; 

  let currentIndex = 0;

  slides.concat(slides.slice(0, SLIDES_TO_SHOW)).forEach((slide, index) => {
    const slideElement = document.createElement("div");
    slideElement.classList.add("embla__slide");
    slideElement.innerHTML = `<img src="${slide}" alt="Slide ${
      index + 1
    }" class="embla__slide__image">`;
    container.appendChild(slideElement);
  });

  const emblaNode = document.querySelector(".embla");
  if (!emblaNode) return;
  const viewportNode = emblaNode.querySelector(".embla__viewport");
  const prevBtn = emblaNode.querySelector(".embla__button--prev");
  const nextBtn = emblaNode.querySelector(".embla__button--next");
  const playBtn = document.querySelector(".embla__play");

  const emblaApi = EmblaCarousel(viewportNode, OPTIONS);

  function updateCarousel() {
    currentIndex += SLIDES_TO_SHOW;
    if (currentIndex >= SLIDE_COUNT && OPTIONS.loop) {
      container.style.transition = "none";
      container.style.transform = `translateX(0%)`;
      currentIndex = 0;
      setTimeout(() => {
        container.style.transition = "transform 0.3s ease";
        updateCarousel();
      }, 50);
    } else {
      const offset = (currentIndex * -100) / SLIDES_TO_SHOW;
      container.style.transform = `translateX(${offset}%)`;
    }
  }

  setInterval(updateCarousel, autoScrollInterval);

  const removePrevNextBtnsClickHandlers = addPrevNextBtnsClickHandlers(
    emblaApi,
    prevBtn,
    nextBtn
  );
  const removePlayBtnListeners = addPlayBtnListeners(emblaApi, playBtn);

  removePrevNextBtnsClickHandlers();
  removePlayBtnListeners();
});

function addPlayBtnListeners(emblaApi, playBtn) {
  const togglePlayBtnState = () => {
    const autoScroll = emblaApi?.plugins()?.autoScroll;
    if (!autoScroll) return;

    const buttonText = autoScroll.isPlaying() ? "Stop" : "Start";
    playBtn.innerHTML = buttonText;
  };

  const onPlayBtnClick = () => {
    const autoScroll = emblaApi?.plugins()?.autoScroll;
    if (!autoScroll) return;

    const playOrStop = autoScroll.isPlaying()
      ? autoScroll.stop
      : autoScroll.play;
    playOrStop();
  };

  playBtn.addEventListener("click", onPlayBtnClick);
  emblaApi
    .on("autoScroll:play", togglePlayBtnState)
    .on("autoScroll:stop", togglePlayBtnState)
    .on("reInit", togglePlayBtnState);

  return () => {
    playBtn.removeEventListener("click", onPlayBtnClick);
    emblaApi
      .off("autoScroll:play", togglePlayBtnState)
      .off("autoScroll:stop", togglePlayBtnState)
      .off("reInit", togglePlayBtnState);
  };
}

function addPrevNextBtnsClickHandlers(emblaApi, prevBtn, nextBtn) {
  const scrollPrev = () => {
    emblaApi.scrollPrev();
  };
  const scrollNext = () => {
    emblaApi.scrollNext();
  };
  prevBtn.addEventListener("click", scrollPrev, false);
  nextBtn.addEventListener("click", scrollNext, false);

  const removeTogglePrevNextBtnsActive = addTogglePrevNextBtnsActive(
    emblaApi,
    prevBtn,
    nextBtn
  );

  return () => {
    removeTogglePrevNextBtnsActive();
    prevBtn.removeEventListener("click", scrollPrev, false);
    nextBtn.removeEventListener("click", scrollNext, false);
  };
}

function addTogglePrevNextBtnsActive(emblaApi, prevBtn, nextBtn) {
  const togglePrevNextBtnsState = () => {
    if (emblaApi.canScrollPrev()) prevBtn.removeAttribute("disabled");
    else prevBtn.setAttribute("disabled", "disabled");

    if (emblaApi.canScrollNext()) nextBtn.removeAttribute("disabled");
    else nextBtn.setAttribute("disabled", "disabled");
  };

  emblaApi
    .on("select", togglePrevNextBtnsState)
    .on("init", togglePrevNextBtnsState)
    .on("reInit", togglePrevNextBtnsState);

  return () => {
    prevBtn.removeAttribute("disabled");
    nextBtn.removeAttribute("disabled");
  };
}
