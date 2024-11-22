  <!DOCTYPE html>

  <body>
    <form action="" method="post">
    <div class="form-structor">
      <div class="signup">
        <h2 class="form-title" id="signup"><span>o</span>Iniciar Sesion</h2>
        <div class="form-holder">
            <input type="text" class="input" placeholder="Nombre de usuario o correo" name="ingUsuario" />
            <input type="password" class="input" placeholder="Contraseña" name="ingPassword" />
        </div>
        <button class="submit-btn sign-in">Iniciar Sesion</button>
        <a href="#" style="color: white;">¿Olvidaste tu contraseña?</a>
      </div>
      
      <div class="login slide-up">
        <div class="center">
          <h2 class="form-title" id="login"><span>o</span>Resgistrate</h2>
          <div class="form-holder">
          <input type="text" class="input" name="nuevoNombre" placeholder="Nombres"/>
          <input type="text" class="input" name="nuevoApellido" placeholder="Apellidos" />
          <input type="text" class="input" name="nuevoUsuario" placeholder="Nombre de usuario" />
          <input type="email" class="input" name="nuevoCorreo" placeholder="Correo" />
          <input type="password" class="input" name="nuevoPassword" placeholder="Contraseña" />
          </div>
          <button class="registro-btn" name="resgistro_btn">Crear Cuenta</button>
          
        </div>
        
      </div>
      
    </div>
    <?php
      $login= new controladorUsuario();
      $login->ctrIngresoUsuario();
      $signup= new controladorUsuario();
      $signup->ctrCrearUsuario();
    ?>
    </form>
  </body>
<script src="js/login.js"></script>
</html>