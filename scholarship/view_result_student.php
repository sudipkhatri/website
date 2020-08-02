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
           <li ><a href="student.php">Apply for Scholarship</a></li>
           <li class="active"><a href="view_result_student.php">View Result</a></li>
           <li><a href="view_result_student.php?logout='1'">logout</a></li>


         </div>
         <br>

         <div class="col-sm-9">
          <div class="well">
            <div class="table-responsive">          
              <table class="table">
                <thead>
                  <tr>
                    <th>User ID</th>
                    <th>Username</th>

                    <th>department</th>
                    <th>ielts </th>
                    <th>gpa </th>
                    <th>genre </th>
                    <th>total percentage</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $name=$_SESSION['username'];
                  $user_id="";

                  $sql = "SELECT result.department FROM result 
                  INNER JOIN users ON result.user_id=users.id

                  WHERE users.username='$name'";
                  $result = $db1->query($sql);


  // output data of each row
                  while($row = $result->fetch_assoc()) {

                    $user_id=$row["department"];
                    $sql1 = "SELECT * FROM $user_id";
                    $result1 = $db1->query($sql1);
                    if ($result1->num_rows > 0) {
                      while($row1 = $result1->fetch_assoc()) {
                        ?>
                        <tr>
                          <td> <?php echo $row1["id"]; ?></td>
                          <td> <?php echo $row1["username"]; ?></td>
                          <td><?php echo $row1["department"]; ?></td>
                          <td><?php echo $row1["ielts_score"]; ?></td>
                          <td><?php echo $row1["gpa_score"]; ?></td>
                          <td><?php echo $row1["genre"]; ?></td>
                          <td><?php echo $row1["total_percentage"]; ?></td>
                        </tr>

                        <?php
                      }
                    }else{
                      echo '<script type="text/javascript">';
        echo ' alert("the result is not published")';  //not showing an alert box.
        echo '</script>';
      }

    }

    ?>


  </tbody>
</table>



</div>
</div>



</div>

</div>
</div>
</div>

</body>
</html>