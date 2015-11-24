<?php
echo Render::view('post/form');

foreach ($posts as $post) {
	?>
	<div class="content-post-list">
		<div class="row">
				<div class="image">
				  <div class="thumbnail">
 					<img src="/uploads/posts/images/<?= $post->image; ?>" alt="">
 					<div class="caption">
   					<div><?= $post->content; ?> </div>
   					<div>
              <?php 
              if($post->userLike($_SESSION['session_user_id'])){
                ?>
                <a href="/post/dislike/?post_id=<?php echo $post->_id; ?>" class="btn btn-primary" role="button">
                  Descurtir 
                  <span class="badge"><?php echo $post->likeCount(); ?></span>
                </a>
                <?php
              }else{
                ?>
                <a href="/post/like/?post_id=<?php echo $post->_id; ?>" class="btn btn-primary" role="button">
                  Curtir 
                  <span class="badge"><?php echo $post->likeCount(); ?></span>
                </a>
                <?php
              }
              ?>
     					<a href="#" class="btn btn-default" role="button">Comentar</a>
            </div>
  				</div>
				</div>
			</div>
		</div>
	</div>
	<hr>
  <?php
}
?>
