// Toggle class active
const ulNav = document.querySelector(".ul-nav");

// Ketika menu di klik
document.querySelector("#menu").onclick = () => {
  ulNav.classList.toggle("active");
};

// Klik di luar sidebar untuk menghilangkan nav
const menu = document.querySelector("#menu");

document.addEventListener("click", function (e) {
  if (!menu.contains(e.target) && !ulNav.contains(e.target)) {
    ulNav.classList.remove("active");
  }
});
