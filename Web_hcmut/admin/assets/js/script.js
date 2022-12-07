activeSidebarItem();

function activeSidebarItem() {
  const path =
    location.pathname.slice(1).split("/").reverse()[0] || "index.php";
  document.querySelectorAll(".nav-link").forEach((item) => {
    if (item.getAttribute("href") === path) {
      item.parentElement.classList.add("active");
    } else {
      item.parentElement.classList.remove("active");
    }
  });
}
