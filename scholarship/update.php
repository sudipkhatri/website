<?php 
include('function.php');

if (!isAdmin()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: index.php');
  
}
$user_id=$_GET['GETID'];




if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user']);
  header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update result</title>
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



  <div class="container-fluid">
    <div class="row content">
      
      
      
      <div class="col-sm-9">
        <div class="well">
          
          <h2>Admin - create user</h2>
          <form method="post" action="view_result.php">

           <div class="input-group">
            <label>Department</label>
            <select type="text" name="department" value="">
              <?php
              $sql = "SELECT department FROM department";
              $result = $db->query($sql);
              
              while($row = $result->fetch_assoc()) {

                ?>
                <option value="<?php echo $row["department"];?>"> <?php echo $row["department"];?>  </option>
                

                
                <?php
              }
              ?>
            </select>
            
          </div>
          
          <?php
          $sql = "SELECT * FROM result
          WHERE user_id='$user_id'";
          $result = $db->query($sql);
          
          while($row = $result->fetch_assoc()) {
            $user_id=$row["user_id"];
            
            $department=$row["department"];
            $ielts_score=$row["ielts_score"];
            $gpa_score=$row["gpa_score"];
            $genre=$row["genre"];
          }



          ?>
          <div class="input-group">
            <label>User id</label>

            <input type="text" name="user_id" value="<?php echo"$user_id"?>" readonly>
          </div>

          <div class="input-group">
            <label>IELTS score</label>

            <input type="text" name="ielts_score" value="<?php echo"$ielts_score"?>">
          </div>

          
          
          <div class="input-group">
            <label>GPA score</label>
            <input type="text" name="gpa_score" value="<?php echo"$gpa_score"?>">
          </div>
          <div class="input-group">
            <label>Number of journal</label>
            
            <select name="genre" value="<?php echo"$genre"?>">
              <option><?php echo"$genre"?></option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
            </select>
          </div>
          
          
          
          

          <div class="input-group">
            <button type="submit" class="btn" name="update">UPDATE</button>
          </div>
          

          
        </form>
      </div>
      
    </div>
  </div>
</div>

</body>
</html>