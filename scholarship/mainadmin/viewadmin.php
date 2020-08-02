<?php 
include('../function.php');

if (!ismainAdmin()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: ../register.php');
}

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user']);
  header("location: ../index.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Dashoboard</title>
  <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li ><a href="dashboardadmin.php">View department</a></li>
        <li><a href="adddepartment.php">Add department</a></li>

        <li><a href="addadmin2.php">Add department admin</a></li>
         <li><a href="view_result.php">View Result</a></li>
   
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>Admin Dashoboard</h2>
      <ul class="nav nav-pills nav-stacked">
        <li ><a href="mainadmin.php">Add admin</a></li>
          <li ><a href="addorganization.php">Add Organization</a></li>
           <li ><a href="dashboardadmin.php">View department</a></li>
      <li><a href="adddepartment.php">Add department</a></li>
        <li><a href="addadmin2.php">Add department admin</a></li>
        <li  class="active"><a href="viewadmin.php">View admin</a></li>
        <li><a href="view_result.php">View Result</a></li>
         <li><a href="view_result.php?logout='1'">logout</a></li>
        
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
      <div class="well">


        <div class="container">
  <h2>Result</h2>
  <div class="container">
                                            
  <div class="dropdown">


     
   
   
   
   
  </div>
</div>

                                                                                        
       <div class="table-responsive">          
  <table class="table">
   
   
    
         <thead>
      <tr>
        <th>user id</th>
        <th>Username</th>
        
     
        <th>email </th>
        <th>user type </th>
        <th>organization</th>
      
        <th>delete</th>
      </tr>
    </thead>
    <tbody>
     
        <?php
        
          $sql = "SELECT *FROM users
WHERE user_type='admin'"
;


        
$result = $db->query($sql);

       while($row = $result->fetch_assoc()) {
        $id= $row["id"];

  



     
    
        ?>

        <tr>
            <td> <?php echo $row["id"]; ?></td>
        <td> <?php echo $row["username"]; ?></td>
    
     
    
     
        <td><?php echo $row["email"]; ?></td>
        <td><?php echo $row["user_type"]; ?></td>
        <td><?php echo $row["organization"]; ?></td>

       
        
        <td><a href="deleteadmin.php?del_admin=<?php echo $id?>">delete</a></td>
      </tr>
  
   <?php
      
    

         }



    
  
 
      ?>
    
    </tbody>
  </table>

     

      
      </div>
    </div>




       
      
  
</div>
</div>

</body>
</html>