

<div class="gridRight">
  
<h1><?= $title ?></h1>


<?php foreach($repos_Data as $repo) : ?>

<h2><?php echo $repo['title']; ?></h2>

<div class="post_date">created on: <?php echo $repo['created_at']; ?></div></br>

<p><?php echo $repo['body']; ?></p>

</br>


<p><a class="btn btn-default" href="<?php echo site_url('/repos/' .$repo['slug']); ?>">read more</a></p>

</br>


<?php endforeach; ?>


</br>


<a class="btn btn-info" href="<?php echo base_url(); ?>repos/create">create repo</a>
  
</div><!-------End gridRight ---------->
