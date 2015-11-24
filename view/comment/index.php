<?php
echo Render::view('comment/form', [
  'post_id'=> $post->_id
]);

foreach ($post->comments() as $comment) {
	?>
	<div class="content-comment-list">
		<div class="row">
			<div class="image">
 				<div class="caption">
          <div><?= $comment->content; ?> </div>
   				<div><?= Date::formatToShow($comment->date_time, true); ?> </div>
  			</div>
			</div>
		</div>
	</div>
	<hr>
  <?php
}
?>
