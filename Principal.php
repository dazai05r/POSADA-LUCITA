<!DOCTYPE html>
<html lang="en">
<head>
  <title>Responsive Sidebar</title>
  <link rel="stylesheet" href="css/menu.css">
  <link rel="stylesheet" href="css/Horizontal.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

</head>
<body>
<header class="header" id="header">
        <nav class="nav container">
        <a href="#" class="nav__logo">POSADA LUCITA</a>
            <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
            <li class="nav__item">
    <a href="#" class="nav__link" id="reservaciones-link">
        <i class="bx bx-calendar"></i> <!-- Icono para Reservaciones -->
        <span class="link_name">Reservaciones</span>
    </a>
    <ul class="dropdown" id="reservaciones-dropdown">
        <li><a href="#">Subopción 1</a></li>
        <li><a href="#">Subopción 2</a></li>
    </ul>
</li>

<li class="nav__item">
    <a href="#" class="nav__link" id="registros-link">
        <i class="bx bx-file"></i> <!-- Icono para Registros -->
        <span class="link_name">Registros</span>
    </a>
    <ul class="dropdown" id="registros-dropdown">
        <li><a href="#">Subopción 1</a></li>
        <li><a href="#">Subopción 2</a></li>
    </ul>
</li>

<li class="nav__item">
    <a href="#" class="nav__link" id="usuarios-link">
        <i class="bx bx-user"></i> <!-- Icono para Usuarios -->
        <span class="link_name">Usuarios</span>
    </a>
    <ul class="dropdown" id="usuarios-dropdown">
        <li><a href="#">Subopción 1</a></li>
        <li><a href="#">Subopción 2</a></li>
    </ul>
</li>

              <!-- Close button -->
              <div class="nav__close" id="nav-close">
                  <i class="ri-close-line"></i>
              </div>
  <div class="sidebar">
    <div class="logo_details">
      <i class="bx bxl-audible icon"></i>
      <div class="logo_name">OPCIONES</div>
      <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="#">
          <i class="bx bx-user"></i> <!-- Icono de usuario para CLIENTES -->
          <span class="link_name">CLIENTES</span>
        </a>
      </li>
      
      <li>
        <a href="#">
          <i class="bx bx-clipboard"></i> <!-- Icono para REPORTES -->
          <span class="link_name">REPORTES</span>
          
        </a>
      </li>
      <!-- Más elementos del menú -->
      <li class="profile">
        <div class="profile_details">
          <img src="IMAGEN/images (3).png" alt="profile image">
          <div class="profile_content">
            <div class="name">Anna Jhon</div>
            <div class="designation">Admin</div>
          </div>
        </div>
        <i class="bx bx-log-out" id="log_out"></i>
      </li>
    </ul>
  </div>
  
  <script src="JS/script.js"></script>
</body>
</html>
