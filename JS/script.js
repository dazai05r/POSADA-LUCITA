window.onload = function () {
  // Referencias para la sidebar
  const sidebar = document.querySelector(".sidebar");
  const closeBtn = document.querySelector("#btn");
  const searchBtn = document.querySelector(".bx-search");

  // Abrir/Cerrar Sidebar
  if (closeBtn && searchBtn) {
      closeBtn.addEventListener("click", toggleSidebar);
      searchBtn.addEventListener("click", toggleSidebar);
  }

  function toggleSidebar() {
      sidebar.classList.toggle("open");
      menuBtnChange();
  }

  function menuBtnChange() {
      if (sidebar.classList.contains("open")) {
          closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else {
          closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      }
  }

  // Ajustar sidebar según el tamaño de pantalla
  if (window.innerWidth <= 768) {
      sidebar.classList.remove("open");
  }

  window.addEventListener("resize", () => {
      if (window.innerWidth <= 768) {
          sidebar.classList.remove("open");
      }
  });

  // Filtro en la tabla
  const searchBar = document.getElementById("search-bar");
  if (searchBar) {
      searchBar.addEventListener("keyup", function () {
          const filter = this.value.toLowerCase();
          const rows = document.querySelectorAll(".styled-table tbody tr");

          rows.forEach((row) => {
              const cells = Array.from(row.getElementsByTagName("td"));
              const match = cells.some((cell) => cell.textContent.toLowerCase().includes(filter));
              row.style.display = match ? "" : "none";
          });
      });
  }

  // Control del modal
  const openModalButton = document.getElementById("open-modal");
  const closeModalButton = document.getElementById("btn-close");
  const modal = document.getElementById("updateModal");

  if (openModalButton && closeModalButton && modal) {
      openModalButton.addEventListener("click", () => {
          modal.style.display = "block";
      });

      closeModalButton.addEventListener("click", () => {
          modal.style.display = "none";
      });

      
  }
};

document.addEventListener("DOMContentLoaded", function () {
  const sidebar = document.querySelector(".sidebar");
  const closeBtn = document.querySelector("#btn"); // Botón para abrir/cerrar el menú
  const searchBtn = document.querySelector(".bx-search"); // Botón de búsqueda (opcional)

  // Alternar el estado del menú lateral
  function toggleSidebar() {
      sidebar.classList.toggle("open"); // Añade o quita la clase 'open' para mostrar/ocultar el menú
      menuBtnChange(); // Cambia el ícono del botón
  }

  // Cambiar ícono del botón según el estado del menú
  function menuBtnChange() {
      if (sidebar.classList.contains("open")) {
          closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); // Ícono cuando el menú está abierto
      } else {
          closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); // Ícono cuando el menú está cerrado
      }
  }

  // Asignar eventos a los botones
  closeBtn.addEventListener("click", toggleSidebar);
  searchBtn?.addEventListener("click", toggleSidebar); // El botón de búsqueda es opcional
});

