  <!DOCTYPE html>

  <body>
    <form action="" method="post">
    <div class="form-structor">
        <div class="signup">
        <h2 class="form-title" id="signup"><span>o</span>Iniciar Sesion</h2>
        <div class="form-holder">
            <input type="text" class="input" placeholder="Nombre de usuario" name="ingUsuario" required/>
            <input type="password" class="input" placeholder="Contraseña" name="ingPassword" required/>
        </div>
        <button class="submit-btn">Iniciar Sesion</button>
        </div>
        <div class="login slide-up">
        <div class="center">
            <h2 class="form-title" id="login"><span>o</span>Resgistrate</h2>
            <div class="form-holder">
            <input type="Nombre" class="input" placeholder="Nombre"/>
            <input type="Apellido" class="input" placeholder="Apellido" />
            <input type="email" class="input" placeholder="Correo" />
            <input type="password" class="input" placeholder="Contraseña" name="pass1" />
            <input type="password" class="input" placeholder="Repetir Contraseña" name="pass2" />
            </div>
            <button class="submit-btn">Crear Cuenta</button>
        </div>
        </div>
    </div>
    <?php
        $login= new controladorUsuario();
        $login->ctrIngresoUsuario();
    ?>
    </form>
  </body>
<script src="js/login.js"></script>
</html>