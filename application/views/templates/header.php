<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>reposApp</title>
    
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
<link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,700,900" rel="stylesheet">
<script src="http://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
    
<style type="text/css"></style>

</head>

<link rel="shortcut icon" href="/website/images/rbIcon.png"/>

<body>

<div class="Wrapper">

<div class="gridLeft">
  
  <div id="logoDiv"><img src="<?php echo base_url(); ?>assets/images/github.svg" id="logo" alt="MyLogo-Pic"/></div>
  
  <h1>github repos.</h1>
  
  <a href="<?php echo base_url(); ?>">home</a>
  
<?php 

foreach ($bar as $row)

		{
			?>
			<a href="<?php echo base_url(); ?><?php echo $row['title'] ?>"><?php echo $row['title'] ?></a>
            
            <?php
		}



?>


</br>
</br>
</br>
</br>

<?php if(!$this->session->userdata('logged_in')) : ?>

<div class="ExampleListWrapper">

<div class="ExampleList">

<svg version="1.1" id="blueArrow" class="" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
width="25px" height="13.178px" viewBox="0 0 25 13.178" style="enable-background:new 0 0 25 13.178;" xml:space="preserve" onclick="toggleElement('adminForm');">

<style type="text/css">

<![CDATA[.st0{fill:#666;}]]>

</style>

<path class="st0" d="M0,0.96c0-0.245,0.093-0.491,0.284-0.677c0.375-0.377,0.983-0.377,1.359,0L12.5,11.141L23.358,0.283
c0.377-0.377,0.983-0.377,1.358,0c0.377,0.375,0.377,0.984,0,1.359L13.664,12.694c-0.643,0.646-1.685,0.646-2.328,0L0.284,1.642
C0.097,1.455,0,1.208,0,0.96z"/>

</svg>


<h3>admin</h3>

</div>


<div id="adminForm">

<div class="FormWrapper">           

<?php echo validation_errors(); ?>
<?php echo form_open('Pages/user_login_process'); ?>

	  <!--<label for="username">name:</label>-->
      <input type="text" name="username" class="form-control" placeholder="Enter name" required autofocus>
      
      <!--<label for="password">password:</label>-->
      <input type="password" name="password" class="form-control" placeholder="Enter password" required autofocus>
      
      <br/>
      <button type="submit" class="btn">Login</button>
      
      
<?php echo form_close(); ?>
    
</div><!-----End FormWrapper----->

</div><!-----End adminForm----->

</div><!-------End ExampleListWrapper---------->

 
<?php endif; ?>

<?php if($this->session->userdata('logged_in')) : ?>
            <a href="<?php echo base_url(); ?>pages/logout">Logout</a>
<?php endif; ?>


</br>

 <div class="messageWrapper"> 

<?php if($this->session->flashdata('user_loggedin')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
      <?php endif; ?>

<?php if($this->session->flashdata('user_loggedout')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
      <?php endif; ?>
      
<?php if($this->session->flashdata('login_failed')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
      <?php endif; ?>
      
</div><!-----end messageWrapper----->
      
  
</div><!-------End gridLeft ---------->