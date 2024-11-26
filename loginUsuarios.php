<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
  <div class="signup-container">
    <h2 class="title">LOGIN</h2>
    <div class="profile-section">
      <div class="profile-photo">
      <img src="IMAGEN/images (3).png" alt="Profile Photo">
      </div>
    </div>
    <form action="inicio.php" method="GET">
      <div class="input-group">
        <label for="username">Nombre de Usuario</label>
        <input type="text" id="username" name="usuario" placeholder="Usuario">
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="clave" placeholder="********">
      </div>
      <button type="submit" class="signup-btn">ACCEDER</button>
    </form>
  </div>
</body>
</html>
