<form action="/auth/register" method="post">
  <div class="form-group">
    <label>Nome</label>
    
    <input type='text' name="user[name]" id="name" placeholder="Nome" required="required" class="form-control"/>
  </div>

  <div class="form-group">
    <label>Data de Nascimento</label>

    <input type='date' name="user[birth_date]" id="birth_date" placeholder="Data de Nascimento" required="required" class="form-control"/>
  </div>

  <div class="form-group">
    <label>E-mail</label>

    <input type='email' name="user[email]" id="email" placeholder="E-mail" required="required" class="form-control"/>
  </div>

  <div class="form-group">
    <button class="btn btn-primary">Prosseguir</button>
  </div>
</form>