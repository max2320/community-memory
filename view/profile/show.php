<div class="row">
  <div class="col-sm-4">
    <div clas="img-middle">
      <img src="/uploads/profiles/photos/<?php echo $profile->photo; ?>" class="img-responsive img-circle">
    </div>
  </div>
  <div class="col-sm-8">
    <div class="profile-name">
      <?php echo $profile->getUserName(); ?>
    </div>
    <div class="profile-birth-date">
      <label>Data de Nascimento: </label>
      <?php echo $profile->getUserBirthDate(); ?>
    </div>

    <?php if($profile->user_id != $_SESSION['session_user_id']){ ?>
      <?php if(!$profile->canFriend($profile->user_id)){ ?>
        <div class="friend-request-btn">
          <a href="/profile/friend/?friend_id=<?php echo $profile->user_id; ?>" class="btn btn-success"><i class="fa fa-plus"></i> amigo</a>
        </div>
      <?php }else{ ?>
        <div class="friend-request-btn">
          <a href="/profile/unfriend/?friend_id=<?php echo $profile->user_id; ?>" class="btn btn-danger"><i class="fa fa-minus"></i> amigo</a>
        </div>
      <?php } ?>
    <?php } ?>
  </div>
</div>

<h4>Amigos</h4>
<div class="row friend-list">
  <?php foreach($profile->friends() as $friend){ ?>
    <a href="/profile/show/?id=<?php $friend->profileId(); ?>">
      <div clas="img-middle col-sm-2 col-md-1">
        <img src="/uploads/profiles/photos/<?php $friend->profileImage(); ?>" class="img-responsive"/>
      </div>
    </a>
  <?php } ?>
  <a href="/profile/find">
    <i class="fa fa-search"></i>
  </a>
</div>
<h4>Meus Posts</h4>


<?php echo Render::view('post/index',[
  'posts' => $profile->posts(),
]); ?>
