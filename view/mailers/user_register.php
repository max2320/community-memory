<p>Ola <?php echo $params->name ?>,</p>
<p>Seja bem vindo ao Community Memory, uma rede social para pessoas com Alzheimer.</p>
<p>Para finalizar seu cadastro <a href="<?php echo UrlGenerator::generate('/auth/finishRegister', ['token' => $params->token]); ?>">Clique aqui!</a>