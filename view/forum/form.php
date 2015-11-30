<form action="/forum/save" method="post" enctype="multipart/form-data">
	<div>
		<input type="text" name="forum[title]" class="form-control" placeholder="Título da discussão"/>
	</div>
	<div>
		<textarea name="forum[content]" rows="4" cols="50" class="form-control"></textarea>
	</div>
	<br clear="both"/>
	<div>
		<button class="btn btn-primary active">Enviar</button>
	</div>
	<hr>
</form>
