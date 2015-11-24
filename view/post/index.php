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

              <button type="button" class="btn btn-default" aria-expanded="false" aria-controls="#comments_post_<?php echo $post->_id?>" data-toggle="collapse" href="#comments_post_<?php echo $post->_id?>">
                Comentários
                <span class="badge"><?php echo $post->commentCount(); ?></span>
              </button>

              <div class="collapse" id="comments_post_<?php echo $post->_id?>">
                <?php echo Render::view('comment/index', [
                  'post' => $post,

                ]); ?>
              </div>
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
