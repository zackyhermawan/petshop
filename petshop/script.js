const listMenu = document.querySelector(".list-menu");
document.querySelector("#hamburger-menu").onclick = ()=> {
  listMenu.classList.toggle("open-navigation");
}

const sidebar = document.querySelector(".sidebar");
const mainContent = document.querySelector(".content-dashboard");
const sidebarToggle = document.querySelector("#sidebarToggle");

sidebarToggle.addEventListener("click", function () {
  sidebar.classList.toggle("active");

  mainContent.classList.toggle("fullscreen");
});

function filterProducts() {
  const selectedCategory = document.getElementById("sort-category").value; 
  const products = document.querySelectorAll(".card");

  products.forEach((product) => {
    const category = product.getAttribute("data-category"); 
    if (selectedCategory === "all" || category === selectedCategory) {
      product.style.display = "block"; 
    } else {
      product.style.display = "none"; 
    }
  });
}

document.addEventListener("DOMContentLoaded", () => {
  filterProducts();
});
