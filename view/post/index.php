<?php
echo Render::view('post/form');

foreach ($posts as $row) {
	?>
	<div class="content-post-list">
		<div class="row">
				<div class="image">
				  <div class="thumbnail">
 					<img src="/uploads/posts/images/<?= $row->image; ?>" alt="">
 					<div class="caption">
   					<p><?= $row->content; ?> </p>
   					<p><a href="#" class="btn btn-primary" role="button"> Curtir <span class="badge"><?= $likes; ?></span></a> &nbsp;
   					<a href="#" class="btn btn-default" role="button">Comentar</a></p>
  				</div>
				</div>
			</div>
		</div>
	</div>
	<hr>
  <?php
}
?>
