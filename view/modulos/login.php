  <!DOCTYPE html>

  <body>
    <form action="" method="post">
    <div class="form-structor">
        <div class="signup">
        <h2 class="form-title" id="signup"><span>o</span>Iniciar Sesion</h2>
        <div class="form-holder">
            <input type="text" class="input" placeholder="Nombre de usuario" name="ingUsuario"/>
            <input type="password" class="input" placeholder="Contraseña" name="ingPassword"/>
        </div>
        <button class="submit-btn">Iniciar Sesion</button>
        </div>
        <div class="login slide-up">
        <div class="center">
            <h2 class="form-title" id="login"><span>o</span>Resgistrate</h2>
            <div class="form-holder">
            <input type="email" class="input" placeholder="Correo" />
            <input type="password" class="input" placeholder="Contraseña" />
            <input type="password" class="input" placeholder="Contraseña" />
            <input type="password" class="input" placeholder="Contraseña" />
            <input type="password" class="input" placeholder="Contraseña" />
            <input type="password" class="input" placeholder="Contraseña" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <button class="submit-btn">Iniciar Sesion</button>
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