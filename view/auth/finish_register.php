<div>
  <p>Ola <strong><?php echo $user->name; ?></strong></p>
  <p> Para finalizar seu cadastro precisamos deu defina sua senha e coloque sua foto de perfil</p>
  <?php if(!empty($error)){ ?>
    <div class="alert alert-info">
      <?php echo $error; ?>
    </div>
  <?php } ?>
  <form action="/auth/finishRegister" method="post" enctype="multipart/form-data">
    <input type="hidden" name="user[token]" value="<?php echo $token ?>";
    <div>
      <label>Senha</label>
      <input type="password" name="user[password]" id="user_password"/>
    </div>
    <div>
      <label>Confirmação da Senha</label>
      <input type="password" name="user[confirm_password]" id="user_password"/>
    </div>
    <div>
      <label>Foto do perfil</label>
      <input type='file' name="profile[photo]" id="profile_photo">
    </div>
    <div>
      <button class="btn btn-primary">Confirmar</button>
    </div>
  </form>
</div>