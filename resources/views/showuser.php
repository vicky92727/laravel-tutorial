<!DOCTYPE html>
<html lang="en">
<head>
  <title>Laravel Tutorial | Users</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo asset('public/assets/bootstrap/css/bootstrap.min.css') ?> ">
<!--===============================================================================================-->  
  <script src="<?php echo asset('public/assets/jquery/jquery-3.2.1.min.js') ?> "></script>
  <!--===============================================================================================-->
  <script src="<?php echo asset('public/assets/bootstrap/js/bootstrap.min.js') ?> "></script>
  <!--===============================================================================================-->
</head>
<body>

<div class="container">
  <h2>User Portal</h2>
  <?php if (count($errors) > 0) {?>
    <div class="alert alert-danger">
        <ul>
           <?php foreach ($errors->all() as $error) { ?>
                <li><?php echo $error ?></li>
           <?php }; ?>
        </ul>
    </div>
<?php } ?>

<?php if(Session::has('flash_message')) {?>
    <div class="alert alert-success">
        <?php echo Session::get('flash_message')?> 
    </div>
<?php } ?>

  <form method="post" action="<?=action('UsersController@update',$user['id'])?>" >
    <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" class="form-control" id="name" value="<?=$user['name']?>">
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" name="email" class="form-control" id="email" value="<?=$user['email']?>">
  </div>
  <div class="form-group">
    <label for="email">Salary:</label>
    <input type="number" min="1" minlength="1" name="salary" class="form-control" id="email" value="<?=$user['salary']['salary']?>">
  </div>
 
  <?php echo csrf_field();
  echo method_field("PATCH");?>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>


  
</body>
</html>
