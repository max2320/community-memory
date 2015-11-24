<?php
echo Render::view('comment/form');

foreach ($comments as $comment) {
	?>
	<div class="content-comment-list">
		<div class="row">
			<div class="image">
 				<div class="caption">
   				<div><?= $comment->content; ?> </div>
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
                <a href="/comment/like/?post_id=<?php echo $comment->_id; ?>" class="btn btn-primary" role="button">
                  Curtir 
                  <span class="badge"><?php echo $comment->likeCount(); ?></span>
                </a>
                <?php
              }
              ?>
            </div>
  			</div>
			</div>
		</div>
	</div>
	<hr>
  <?php
}
?>
