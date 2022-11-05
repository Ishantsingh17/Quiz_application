<?php

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)
{
    header("location: login.php");
}


?>

<?php
include "../config.php"
?>






<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="newadmin.css">
    <style>
        .material-symbols-outlined {
        font-variation-settings:
        'FILL' 0,
        'wght' 400,
        'GRAD' 0,
        'opsz' 48
    }

    .form-control {
            text-align: left;
            margin-bottom: 25px;
        }

        .form-control label {
            display: block;
            margin-bottom: 10px;
        }
        .form-control input,
        .form-control select,
        .form-control textarea {
            border: 1px solid #777;
            border-radius: 2px;
            font-family: inherit;
            padding: 10px;
            display: block;
            width: 25%;
        }

        table, th, td {
          border:1px solid black;
        }
        .create{
          border-radius: 6px;
          background-color: rgb(47, 177, 47);
          width: 230px;
          height: 50px;
          margin-left: 4px;
          color: white;
          font-weight: bold;
          font-size: 18px;
          border: 1px solid #ccc;
      }
     
    </style>
  </head>
  <body>
    <div class="grid-container">

      <!-- Header -->
      <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
          <span class="material-icons-outlined">menu</span>
        </div>
      
        <div class="header-right">
          
          <span class="material-icons-outlined">account_circle</span>
          
        </div>
      </header>
      <!-- End Header -->

      <!-- Sidebar -->
      <aside id="sidebar">
        <div class="sidebar-title">
          <div class="sidebar-brand">
            <span class="material-icons-outlined">inventory</span> ADMIN PANEL
          </div>
          <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
        </div>

        <ul class="sidebar-list">
          <li class="sidebar-list-item">
            <a href="/login/welcome.php">
            <span class="material-icons-outlined">dashboard</span> Dashboard
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="add_edit_exam_questions.php">
            <span class="material-icons-outlined">dashboard</span> add and edit questions
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="edit_exam.php">
            <span class="material-icons-outlined">dashboard</span> edit categories
            </a>
          </li>
          <li class="sidebar-list-item">
          <a href="/logout.php">
          <span class="material-symbols-outlined">close</span> Logout
          </a>
          </li>
          
        </ul>
      </aside>
      <!-- End Sidebar -->

      <!-- Main -->
      <main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">ADD EXAM</p>
        </div>
    <form action="" method="post">
        <div class="form-control">
            <label for="name" id="label-name">
                New Exam Category
            </label>
 
            <!-- Input Type Text -->
            <input type="text"
                    name="examname"
                    />
        </div>
  
        <div class="form-control">
            <label for="email" id="label-email">
                Exam Time in Minutes
            </label>
 
            <!-- Input Type Email-->
            <input type="text" name="examtime"
                   
                    />
        </div>
        <p><button class="create" type="submit"  name="submit1" >ADD EXAM</button></p>

        <br>
        <br>

        <table style="width:50%">
            <tr>
                <th>#</th>
                <th>Exam name </th>
                <th>Exam time</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            $count=0;
            $res=mysqli_query($conn,"SELECT * FROM exam_category");
            while($row=mysqli_fetch_array($res))
            {
          $count=$count+1;
              ?>
              <tr>
                <th><?php echo $count; ?></th>
                <td><?php echo $row["category"]; ?></td>
                <td><?php echo $row["exam_time_in_minutes"]; ?></td>
                <td><a href="edit_exam.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
                <td><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
              </tr>
              <?php
            }
            ?>

          
        </table>

    
    </form>    
      </main>
      <!-- End Main -->

    </div>

    <!-- Scripts -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="js/adminscripts.js"></script>
  </body>
</html>

<?php
if(isset($_POST["submit1"]))
{
  mysqli_query($conn,"INSERT INTO exam_category VALUES(NULL,'$_POST[examname]','$_POST[examtime]')") or die(mysqli_error($conn));
  ?>
  <script type="text/javascript">
    alert("exam added successfully");
    window.location.href=window.location.href;
    </script>
  <?php
}
?>