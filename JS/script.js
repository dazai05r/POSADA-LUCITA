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

  document.getElementById("search-bar").addEventListener("keyup", function () {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll(".styled-table tbody tr");
  
    rows.forEach((row) => {
      const cells = Array.from(row.getElementsByTagName("td"));
      const match = cells.some((cell) => cell.textContent.toLowerCase().includes(filter));
      row.style.display = match ? "" : "none"; // Muestra solo las filas que coinciden
    });
  });
  document.getElementById("myForm").addEventListener("submit", function(event) {
    const emailInput = document.getElementById("email");
    const phoneInput = document.getElementById("phone");
    const emailValue = emailInput.value;
    const phoneValue = phoneInput.value;
  
    // Convertir correo a minúsculas
    emailInput.value = emailValue.toLowerCase();
  
    // Validar número de teléfono (10 dígitos)
    if (!/^\d{10}$/.test(phoneValue)) {
      event.preventDefault(); // Evita el envío del formulario
      alert("El número de teléfono debe contener exactamente 10 dígitos.");
      phoneInput.focus();
    }
  });

  