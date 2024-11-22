window.onload = function () {
    const sidebar = document.querySelector(".sidebar");
    const closeBtn = document.querySelector("#btn");
    const searchBtn = document.querySelector(".bx-search");
  
    // Evento para abrir/cerrar el menú al hacer clic en el botón
    closeBtn.addEventListener("click", toggleSidebar);
  
    // Evento para abrir el menú al hacer clic en el botón de búsqueda
    searchBtn.addEventListener("click", toggleSidebar);
  
    function toggleSidebar() {
      sidebar.classList.toggle("open");
      menuBtnChange(); // Cambiar ícono del botón
    }
  
    function menuBtnChange() {
      if (sidebar.classList.contains("open")) {
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); // Cambia ícono al abrir
      } else {
        closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); // Cambia ícono al cerrar
      }
    }
  
    // Detectar el tamaño de la pantalla al cargar y ajustar el menú
    if (window.innerWidth <= 768) {
      sidebar.classList.remove("open"); // Cerrar menú en pantallas pequeñas
    }
  
    // Hacer el menú responsivo si cambia el tamaño de la ventana
    window.addEventListener("resize", function () {
      if (window.innerWidth <= 768) {
        sidebar.classList.remove("open"); // Cierra el menú en pantallas pequeñas
      }
    });
  };
  
  /* Establecemos las variables para los menús y los enlaces */
const navItems = document.querySelectorAll('.nav__item'); // Todos los ítems del menú
const dropdowns = document.querySelectorAll('.dropdown'); // Todos los submenús

/* Añadimos un evento de clic para cada item de menú */
navItems.forEach(item => {
  item.addEventListener('click', (e) => {
    const dropdown = item.querySelector('.dropdown'); // Obtener el submenú correspondiente

    // Si el submenú ya está visible, lo ocultamos
    if (dropdown.classList.contains('show-dropdown')) {
      dropdown.classList.remove('show-dropdown');
    } else {
      // Primero cerramos todos los submenús abiertos
      dropdowns.forEach(dropdown => dropdown.classList.remove('show-dropdown'));
      // Luego mostramos el submenú del ítem seleccionado
      dropdown.classList.add('show-dropdown');
    }
  });
});
