<p>Ola <?php echo $params->name ?>,</p>
<p>Para finalizar seu registro <a href="<?php echo UrlGenerator::generate('/auth/finishRegister', ['token' => $params->token]); ?>">clique aqui</a>