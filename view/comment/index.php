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
   				<div>
              <?php 
              if($comment->userLike($_SESSION['session_user_id'])){
                ?>
                <a href="/comment/dislike/?comment_id=<?php echo $comment->_id; ?>" class="btn btn-primary" role="button">
                  Descurtir 
                  <span class="badge"><?php echo $comment->likeCount(); ?></span>
                </a>
                <?php
              }else{
                ?>
                <a href="/comment/like/?comment_id=<?php echo $comment->_id; ?>" class="btn btn-primary" role="button">
                  Curtir 
                  <span class="badge"><?php echo $comment->likeCount(); ?></span>
                </a>
                <?php
              }
              ?>
            <div>
  			</div>
			</div>
		</div>
	</div>
	<hr>
  <?php
}
?>
