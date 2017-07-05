<div class="gridRight">

<h2><?php echo $repos_Data['title']; ?></h2>


<div class="post_date">created on: <?php echo $repos_Data['created_at']; ?></div></br>


<p><?php echo $repos_Data['body']; ?></p>


</br>

<a class="btn btn-default pull-left" href="<?php echo base_url(); ?>repos/edit/<?php echo $repos_Data['slug']; ?>">edit</a>


<?php echo form_open('/repos/delete/'.$repos_Data['id']); ?>

<input type="submit" value="Delete" class="btn btn-danger">
</form>




</div><!-------End gridRight ---------->