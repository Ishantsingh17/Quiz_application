<?php
session_start();
include "header1.php";

?>
<html>
    <head>
        <style>
            .exam_btn{
                padding-left:600px;
            }
              .create{
          border-radius: 6px;
          background-color: rgb(47, 177, 47);
          width: 100px;
          height: 50px;
          margin-left: 4px;
          color: white;
          font-weight: bold;
          font-size: 18px;
          border: 1px solid #ccc;
      }
      .create1{
          border-radius: 6px;
          background-color: red;
          width: 100px;
          height: 50px;
          margin-left: 4px;
          color: white;
          font-weight: bold;
          font-size: 18px;
          border: 1px solid #ccc;
      }
      .qtn{
        padding-top:4px;
      }
      .tea{
        padding-left:100px;
      }
        </style>
        <body>
            


        <div class="tea">
            <div id="current_que" style="float:left">0</div>
            <div style="float:left">/</div>
            <div id="total_que" style="float:left">0</div>

        </div> 
        <br>
        <br>
        <br>
        

        <div class="qtn" style="margin-top:3px">
         
           <div class="" style="min-height:30px; background-color:white; text-align:center; font-size 18px" id="load_questions"></div>

        </div>
        <div class="" style="margin-top:10px">

        <div class="exam_btn">  

            <input type="button" class="create" value="Previous" onclick = "load_previous();">&nbsp;
            <input type="button" class="create1" value="Next" onclick = "load_next();">

        </div>
       </div>

       </body>
    </head>
</html>
 

<script type="text/javascript">
    function load_total_que()
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){

                document.getElementById("total_que").innerHTML=xmlhttp.responseText;

                
                
            }
        };
        xmlhttp.open("GET","forajax/load_total_que.php",true);
        xmlhttp.send(null);
    }

    var questionno="1";
    load_questions(questionno);

    function load_questions(questionno)
    {
        document.getElementById("current_que").innerHTML=questionno;   
        var xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                if(xmlhttp.responseText=="over")
                {
                    window.location="result.php";
                }
                else{   
                    document.getElementById("load_questions").innerHTML=xmlhttp.responseText;
                    load_total_que();
                }

            }
        };
        xmlhttp.open("GET","forajax/load_questions.php?questionno="+ questionno,true);
        xmlhttp.send(null);

    }

    function radioclick(radiovalue,questionno)
    {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){

            }
        };
        xmlhttp.open("GET","forajax/save_answer_in_session.php?questionno="+ questionno +"&value1="+radiovalue,true);
        xmlhttp.send(null);

    }

    function load_previous()
    {
        if(questionno=="1")
        {
            load_questions(questionno);

        }
        else{
            questionno=eval(questionno)-1;
            load_questions(questionno);
        }
    }

    function load_next()
    {
        questionno=eval(questionno)+1;
        load_questions(questionno);
        

    }

 </script>   





