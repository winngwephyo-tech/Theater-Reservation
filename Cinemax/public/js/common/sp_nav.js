const hamburger=document.querySelector(".nav-icon");
const navMenu=document.querySelector(".nav-after-login");

hamburger.addEventListener("click", () => {
  hamburger.classList.toggle("active");
  navMenu.classList.toggle("active");
})
