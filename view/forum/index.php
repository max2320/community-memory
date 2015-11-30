<?php
echo Render::view('forum/form');

foreach ($forums as $forum) {
	?>
	<div class="content-post-list">
		<div class="row">
			<div class="caption">
        <div><?= $forum->title; ?> </div>
				<div><?= $fotum->content; ?> </div>
 					<div>
              <button type="button" class="btn btn-default" aria-expanded="false" aria-controls="#comments_forum_<?php echo $forum->_id?>" data-toggle="collapse" href="#comments_forum_<?php echo $forum->_id?>">
                Comentários
                <span class="badge"><?php echo $forum->commentCount(); ?></span>
              </button>

              <div class="collapse" id="comments_forum_<?php echo $forum->_id?>">
                <?php echo Render::view('comment/index', [
                  'forum' => $forum,

                ]); ?>
              </div>
          </div>
  		</div>
		</div>
	</div>
	<hr>
  <?php
}
?>
