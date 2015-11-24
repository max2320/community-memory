<form action="/post/save" method="post" enctype="multipart/form-data">
	<div>
		<textarea name="post[content]" rows="4" cols="50" class="form-control" placeholder="Deixe aqui uma recordação. Para que todos possam lembrar do acontecimento juntamente com você."></textarea>
	</div>
	<br clear="both"/>
	<div>
		<label align="left">Selecione um arquivo:</label>
		<input name="post[image]" type="file" />
	</div>
	<br clear="both"/>
	<div>
		<button class="btn btn-primary active">Enviar</button>
	</div>
	<hr>
</form>
