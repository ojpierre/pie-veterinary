/*----------SLIDESHOW-------------*/
document.addEventListener("DOMContentLoaded", function () {
  const images = document.querySelectorAll(".slide img");
  let currentImageIndex = 0;

  function nextImage() {
    images[currentImageIndex].classList.remove("active");
    currentImageIndex = (currentImageIndex + 1) % images.length;
    images[currentImageIndex].classList.add("active");
  }

  setInterval(nextImage, 2000); // Change image every 2 seconds
});
