<form action="/comment/save/?post_id=<?php echo $post_id; ?>" method="post" enctype="multipart/form-data">
  <input type="hidden" name="comment[post_id]" value="<?php echo $post_id; ?>"/>
	<div>
		<textarea name="comment[content]" rows="4" cols="50" class="form-control" placeholder="Escreva um comentário ..."></textarea>
	</div>
	<br clear="both"/>
	<div>
		<button class="btn btn-primary active">Enviar</button>
	</div>
	<hr>
</form>
