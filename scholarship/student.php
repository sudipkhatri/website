<?php 


  include('futction_result.php');


    if (!isLoggedIn()) {
  $_SESSION['msg'] = "You must log in first";


  header('location: register.php');
}
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Dashboard</title>
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
        <li ><a href="student.php">Apply For Scholarship</a></li>
        <li ><a href="view_result_student.php">View Result</a></li>
        
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>Dashboard(<?php
      $name=$_SESSION['username'];
      echo "$name";?>)</h2>
      <ul class="nav nav-pills nav-stacked">
           <li class="active"><a href="student.php">Apply for Scholarship</a></li>
        <li><a href="view_result_student.php">View Result</a></li>
        <li><a href="student.php?logout='1'">logout</a></li>
        
  
       
    </div>
    <br>
    
    <div class="col-sm-9">
      <div class="well">
  
    <h2>Scholarship apply form </h2>
  <form method="post" action="student.php">



    
     <div class="input-group">
      <label>Select organization to apply</label>
      <select type="text" name="organization" value="">
        <?php
          $sql = "SELECT organization FROM organization";
            $result = $db1->query($sql);
      
       while($row = $result->fetch_assoc()) {
        

        ?>
         <option value=" <?php echo $row["organization"];?>"> <?php echo $row["organization"];?>  </option>
      

  
   <?php
         }
      ?>
    </select>
    </div>
    <div class="input-group">
      <label>Department</label>
      <select type="text" name="department" value="">
        <?php
          $sql = "SELECT department FROM department";
            $result = $db1->query($sql);
      
       while($row = $result->fetch_assoc()) {
        

        ?>
         <option value=" <?php echo $row["department"];?>"> <?php echo $row["department"];?>  </option>
      

  
   <?php
         }
      ?>
    </select>
    </div>
      <div class="input-group">
      <label>IELTS score</label>
      <input type="text" name="ielts_score" value="">
    </div>
      <div class="input-group">
      <label>GPA score</label>
      <input type="text" name="gpa_score" value="">
    </div>
    <div class="input-group">
      <label>Number of journal</label>
      
      <select name="genre" value="">
        <option>1</option>
        <option>2</option>
        <option>3</option>
      </select>
    </div>
      <div class="input-group">
      <label>IELTS</label>
    <input type="file" id="ielts" name="ielts">
    </div>
      <div class="input-group">
      <label>GPA </label>
     <input type="file" id="gpa" name="gpa">
    </div>
     
 
   

    <div class="input-group">
        <button type="submit" class="btn" name="apply">Submit</button>
    </div>
  </form>
      </div>
      
  </div>
</div>
</div>

</body>
</html>