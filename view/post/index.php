<?php
echo Render::view('post/form');

foreach ($list->fetchAll(PDO::FETCH_ASSOC) as $row) {
	$content = $row["content"];
	$image = $row["image"];
	$likes = $row["likes"];
  // var_dump($row);
	?>
	<div class="content-post-list">
		<div class="row">
				<div class="image">
				  <div class="thumbnail">
 					<img src="<?= $image; ?>" alt="...">
 					<div class="caption">
   					<p><?= $content; ?> </p>
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