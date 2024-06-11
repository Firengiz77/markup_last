document.addEventListener("DOMContentLoaded", function () {
    const slides = document.querySelectorAll(".slide");
    const dots = document.querySelectorAll(".dot");
    let currentIndex = 0;
  
    function showSlide(index) {
      slides.forEach((slide) => {
        slide.style.display = "none";
      });
      slides[index].style.display = "block";
  
      dots.forEach((dot) => {
        dot.classList.remove("active");
      });
      dots[index].classList.add("active");
    }
  
    function nextSlide() {
      currentIndex = (currentIndex + 1) % slides.length;
      showSlide(currentIndex);
    }
  
    setInterval(nextSlide, 3000);
  
    showSlide(currentIndex);
  
    dots.forEach((dot, index) => {
      dot.addEventListener("click", function () {
        showSlide(index);
        currentIndex = index;
      });
    });
  });
  