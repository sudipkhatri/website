<?php 
include('function.php');

if (!isAdmin()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: register.php');
}

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user']);
  header("location: index.php");
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
           <li ><a href="dashboardadmin.php">View department</a></li>
      <li><a href="adddepartment.php">Add department</a></li>
        <li><a href="addadmin2.php">Add department admin</a></li>
        <li class="active"><a href="view_result.php">View Result</a></li>
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
    <form method="post" action="view_result.php" >
    <div class="input-group">
       <select name ="department_id" >
          <option>select department</option>
           <?php
          $sql = "SELECT department FROM department";
            $result = $db->query($sql);
      
       while($row = $result->fetch_assoc()) {

        ?>
         <option value="<?php echo $row["department"];?>"> <?php echo $row["department"];?>  </option>
      

  
   <?php
         }
      ?>
      
     </select>&nbsp;
     <label>please select to calculate marks</label>
   <select name="ielts_percent">
    
    <option>ielts percent</option> 
    <option value="0.1">10</option>
     <option value="0.2">20</option>
      <option value="0.3">30</option>
       <option value="0.4">40</option>
        <option value="0.5">50</option>
         <option value="0.6">60</option>
          <option value="0.7">70</option>
           <option value="0.8">80</option>
            <option value="0.9">90</option>
             <option value="1">100</option>
              <option value="0.0">0</option>
   </select>&nbsp;
    <select name="gpa_percent">
    
    <option>gpa percent</option> 
    <option value="0.1">10</option>
     <option value="0.2">20</option>
      <option value="0.3">30</option>
       <option value="0.4">40</option>
        <option value="0.5">50</option>
         <option value="0.6">60</option>
          <option value="0.7">70</option>
           <option value="0.8">80</option>
            <option value="0.9">90</option>
             <option value="1">100</option>
              <option value="0.0">0</option>
   </select>&nbsp;
      <select name="genre_percent">
    
    <option>journal percent</option> 
    <option value="0.1">10</option>
     <option value="0.2">20</option>
      <option value="0.3">30</option>
       <option value="0.4">40</option>
        <option value="0.5">50</option>
         <option value="0.6">60</option>
          <option value="0.7">70</option>
           <option value="0.8">80</option>
            <option value="0.9">90</option>
             <option value="1">100</option>
              <option value="0.0">0</option>
   </select>&nbsp;


     <button type="submit" class="btn" name="submit_1"> View result </button> &nbsp;
      
   
     

    </div>
  </form>
   
      <?php
   
      if (isset($_POST['submit_1'])) {
        $dep=$_POST['department_id'];
          $GLOBALS['DEPE']=$_POST['department_id'];
        $_SESSION['department1']=$_POST['department_id'];

        ?>
        <form method="post">

           <div class="input-group">
            
          <button type="submit" class="btn" name="publish_science" value="<php $_POST['department_id'];?>">Publish</button><br>
           

       </div>
       <div class="input-group">
            
        
             <input  type="text" class="btn" name="publish_department"  value="<?php $dep=$_POST['department_id'];

         echo "$dep"; ?>" readonly> &nbsp;

       </div>
          
        </form>
         <thead>
      <tr>
        
        <th>Username</th>
        
        <th>department</th>
        <th>ielts </th>
        <th>gpa </th>
        <th>journal </th>
        <th>total </th>
        <th>update</th>
        <th>delete</th>
      </tr>
    </thead>
    <tbody>
     
        <?php
          $ielts_percent=$_POST['ielts_percent'];
          $gpa_percent=$_POST['gpa_percent'];
          $genre_percent=$_POST['genre_percent'];
          $sql = "SELECT users.id,users.username, users.id,result.department,result.ielts_score,result.gpa_score,result.genre,
ROUND(((result.gpa_score*100)/4)*$gpa_percent+ ((result.ielts_score*100)/9)*$ielts_percent+((result.genre*100)/3)*$genre_percent,2) AS total_percentage
FROM result

INNER JOIN users ON result.user_id=users.id
WHERE result.department='$dep'
ORDER BY total_percentage desc";
?>

         <?php
$result = $db->query($sql);

       while($row = $result->fetch_assoc()) {
        $id= $row["id"];

  



     
    
        ?>

        <tr>
        
        <td> <?php echo $row["username"]; ?></td>
    
        
        <td><?php echo $row["department"]; ?></td>
        <td><?php echo $row["ielts_score"]; ?></td>
        <td><?php echo $row["gpa_score"]; ?></td>
        <td><?php echo $row["genre"]; ?></td>

        <td><?php echo $row["total_percentage"]; ?></td>
        <td><a href="update.php?GETID=<?php echo $id?>">update</a></td>
        <td><a href="delete.php?del=<?php echo $id?>">delete</a></td>
      </tr>
  
   <?php
      }
    

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