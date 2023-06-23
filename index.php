<?php

 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <title>Login</title>
     <script src="vendor/components/jquery/jquery.min.js"></script>
     <script src="./login.js"></script>
 </head>
 <body>
     <h1>Login</h1>
     <form id="loginForm" method="POST">
         <label for="usuario">usuario:</label>
         <input type="text" id="usuario" name="usuario" required><br><br>
         <label for="contrasenia">contraseña:</label>
         <input type="password" id="contrasenia" name="contrasenia" required><br><br>
         <input type="submit" value="Login">
     </form>
     <div id="result"></div>
 </body>
 </html>
