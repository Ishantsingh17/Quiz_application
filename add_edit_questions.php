<?php

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)
{
    header("location: login.php");
}


?>

<?php
include "../config.php";
$id=$_GET["id"];
$exam_category='';
$res=mysqli_query($conn,"SELECT * FROM exam_category WHERE id=$id");
while($row=mysqli_fetch_array($res))
{
    $exam_category=$row["category"];
}

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
    <h1>Add question inside <?php echo "<font color='red'>".$exam_category."</font>"; ?></h1>
    <div class="grid-container">

      <!-- Header -->
      <header class="header">
     
        
      
       
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
            <a href="/login/add_edit_exam_questions.php">
            <span class="material-icons-outlined">dashboard</span> add_edit_exam_questions
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
          <p class="font-weight-bold">ADD NEW QUESTIONS</p>
        </div>
    <form action="" method="post">
        <div class="form-control">
            <label for="name" id="label-name">
                ADD QUESTION
            </label>
 
            <!-- Input Type Text -->
            <input type="text"
                    name="question" >
        </div>
        <div class="form-control">
            <label for="name" id="label-name">
                ADD Opt1
            </label>
 
            <!-- Input Type Text -->
            <input type="text"
                    name="opt1" >
        </div>
        <div class="form-control">
            <label for="name" id="label-name">
                ADD Opt2
            </label>
 
            <!-- Input Type Text -->
            <input type="text"
                    name="opt2" >
        </div>
        <div class="form-control">
            <label for="name" id="label-name">
                ADD Opt3
            </label>
 
            <!-- Input Type Text -->
            <input type="text"
                    name="opt3" >
        </div>
        <div class="form-control">
            <label for="name" id="label-name">
                ADD Opt4
            </label>
 
            <!-- Input Type Text -->
            <input type="text"
                    name="opt4" >
        </div>
        <div class="form-control">
            <label for="name" id="label-name">
                ADD Answer
            </label>
 
            <!-- Input Type Text -->
            <input type="text"
                    name="answer" >
        </div>
  
     
        <p><button class="create" type="submit"  name="submit1" >ADD QUESTION</button></p>

        <br>
        <br>

        
          
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
    $loop=0;
    $count=0;

    $res=mysqli_query($conn,"SELECT * FROM questions WHERE category='$exam_category' order by id asc") or die(mysqli_error($conn));
    $count=mysqli_num_rows($res);
    if($count==0)
    {

    }
    else{
         
        while($row=mysqli_fetch_array($res))
        {
            $loop=$loop+1;
            mysqli_query($conn,"UPDATE questions set question_no='$loop' WHERE id=$row[id]");

        }
    }

    $loop=$loop+1;
    mysqli_query($conn,"INSERT INTO questions values(NULL,'$loop','$_POST[question]','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]','$_POST[answer]','$exam_category')") or die(mysqli_error($conn));


    ?>
    <script type="text/javascript">
    alert("questions added successfully");
    window.location.href=window.location.href;
    </script>
    <?php 
    
}
?>
 

