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
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

  <script src="<?php echo asset('public/assets/bootstrap/js/bootstrap.min.js') ?> "></script>
  
  <!--===============================================================================================-->
</head>
<style type="text/css">
  #myInput {
  background-image: url('<?php echo asset('public/assets/images/icons/searchicon.png') ?>');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
</style>
<body>

<div class="container">
  <h2>User Portal</h2>
  <div class="row">
      <p class="clearfix"><a class="btn btn-primary" href="<?=action('UsersController@create')?>">Add User</a></p>            
  <?php if (session()->has('user')){?>
      <p> &nbsp; <a class="btn btn-primary" href="<?=action('LoginController@logout')?>">Logout</a></p>
  <?php } ?>
  </div>
  
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
  <table class="table table-striped">

    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Salary</th>
            <th>Action</th>
        </tr>
    </thead>
     <tbody>
        <?php foreach($users as $user){?>
        <tr>
            <td><?=$user['id']?></td>
        
            <td><?=$user['name']?></td>
        
            <td><?=$user['email']?></td>
            <td>$ <?=$user['salary']['salary'] ? $user['salary']['salary'] : 0?></td>
        
            <td>
                <a onclick="setuserid(this.id);" id="<?=$user['id']?>" data-toggle="modal" data-target="#myModal" href="javascript:void(0)">Add Salary | </a> 
                <a href="<?=action('UsersController@show',$user['id'])?>">Edit | </a> 
                <a href="<?=action('UsersController@destroy',$user['id'])?>">Delete</a> 
                
            </td>
        </tr>
        <?php } ?>
     </tbody>

  </table>

</div>
<!-- Modal -->
<div class="modal fade" id="myModal" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">User Salary</h4>
      </div>
      <form method="post" action="<?=action('UsersController@updateSalary')?>">
        <?php echo csrf_field()?>
      <div class="modal-body">
        
            <div class="form-group">
                <label for="salary">Salary:</label>
                <input minlength="1" min="1" type="number" name="salary" class="form-control" id="salary" value="">
                <input type="hidden" name="userid" id="uid" value="">
            </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div>
  </div>

   <form id="searchform" method="get" action="<?=action('UsersController@search')?>">
        <input type="hidden" id="searchkey" name="searchkey" value="">
    </form>
</div>
<script type="text/javascript">
    function setuserid(id){
        $('#uid').val(id);
    }

    function myFunction() {
      var searchkey = $('#myInput').val();
      $('#searchkey').val(searchkey);

      setTimeout(function() {
        $('#searchform').submit();
      }, 2000);
      
    }
    
</script>
</body>
</html>
