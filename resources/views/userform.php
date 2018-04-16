<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>User Portal</h2>
 <?php if (count($errors) > 0){?>
    <div class="alert alert-danger">
        <ul>
           <?php foreach ($errors->all() as $error){?>
                <li><?=$error?></li>
           <?php } ?>
        </ul>
    </div>
 <?php } ?>

  <form method="post" action="<?=action('UsersController@store')?>">
    <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" class="form-control" id="name" value="">
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" name="email" class="form-control" id="email" value="">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" name="password" class="form-control" id="pwd">
  </div>  

  <div class="form-group">
    <label for="cpwd">Confirm Password:</label>
    <input type="password" name="password_confirmation" class="form-control" id="cpwd">
  </div>
  <?php echo csrf_field(); ?>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
</body>
</html>
