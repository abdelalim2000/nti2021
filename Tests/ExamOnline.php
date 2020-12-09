<?php
  session_start();
  if(!isset($_SESSION["cr"]))
     $_SESSION["cr"]=0;
  if(!isset($_SESSION["ci"]))
    $_SESSION["ci"]=0;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
<div class="container">

    <form method="post">
    <h4><center>
<?php 
    if(isset($_SESSION["name"]))
        echo("Welcome : ".$_SESSION["name"]); 
    else
        header("location:Start.php");
?>
<br/><br/>
<input type="submit" name="btnex" value ="Exit From Exam"  class="btn btn-danger"/>
<br/>
</center>
<?php
    if(isset($_POST["btnex"]))
    {
        session_destroy();
        header("location:Start.php");
    }
?>
</h4>
<h4>
    <?php
    if(!isset($_SESSION["q"]))
    {        
        $question=array(
            array("To Declare Variable Using ?","%","&","#","$"),
            array("To dublicate Code  Using ?","If","Switch","For","$"),
            array("To Put Condition Code  Using ?","While","Switch","For","$"),
            array("To Make Localhost as a Server  Using ?","VCode","neatbeans","Xammp","PHP Compiler"),
            array("To Start Block Code Php Using ?","<","<?","?>","<!")
        );
        $x=0;
        echo("Q : 1 ".$question[$x][0]."<br/>");
        echo("<div class='radio' style='margin-left:20px;padding:10px'>");
            echo("<input type='radio' value='{$question[$x][1]}' name='rdanswer' />".$question[$x][1]."<br/>");
            echo("<input type='radio' value='{$question[$x][2]}' name='rdanswer'/>".$question[$x][2]."<br/>");
            echo("<input type='radio' value='{$question[$x][3]}' name='rdanswer' />".$question[$x][3]."<br/>");
            echo("<input type='radio' value='{$question[$x][4]}' name='rdanswer'/>".$question[$x][4]."<br/>");
            echo("<br/><input type='submit' value='Next Question' class='btn btn-primary' name='btnnext'/>&nbsp;&nbsp;");
            echo("<input type='submit' value='Previouse Question' class='btn btn-success' name='btnprev'/>&nbsp;&nbsp;");
         echo("</div>");
        $x++;
        $_SESSION["q"]=$x;
    }
        if(isset($_POST["btnnext"]))
        {
            if($_SESSION["q"]<=4)
            {
               
                $question=array(
                    array("To Declare Variable Using ?","%","&","#","$"),
                    array("To dublicate Code  Using ?","If","Switch","For","$"),
                    array("To Put Condition Code  Using ?","While","Switch","For","$"),
                    array("To Make Localhost as a Server  Using ?","VCode","neatbeans","Xammp","PHP Compiler"),
                    array("To Declare Array Multi dimention Using ?","<>","<)","[][]","[]()")
                );
                $model=array("$","For","Switch","Xammp","[][]");
        
                echo("Q : ".$_SESSION['q']."-".$question[$_SESSION["q"]][0]."<br/>");
                echo("<div class='radio' style='margin-left:20px;padding:10px'>");
                    echo("<input type='radio' value='{$question[$_SESSION['q']][1]}' name='rdanswer' />".$question[$_SESSION['q']][1]."<br/>");
                    echo("<input type='radio' value='{$question[$_SESSION['q']][2]}' name='rdanswer'/>".$question[$_SESSION['q']][2]."<br/>");
                    echo("<input type='radio' value='{$question[$_SESSION['q']][3]}' name='rdanswer' />".$question[$_SESSION['q']][3]."<br/>");
                    echo("<input type='radio' value='{$question[$_SESSION['q']][4]}' name='rdanswer'/>".$question[$_SESSION['q']][4]."<br/>");
                    echo("<br/><input type='submit' value='Next Question' class='btn btn-primary' name='btnnext'/>&nbsp;&nbsp;");
                    echo("<input type='submit' value='Previouse Question' class='btn btn-success' name='btnprev'/>&nbsp;&nbsp;");
                    
                echo("</div>");
                  
                $sanswer=$_POST["rdanswer"];
              
                $d=$_SESSION["q"]-1;
                echo($sanswer."   ".$model[$d]);
                if($sanswer===$model[$d])
                {
                  $_SESSION["cr"]++;
                   
                   echo( $_SESSION["cr"]);
                }
                else
                {
                   $_SESSION["ci"]++;
                    
                    echo( $_SESSION["ci"]);

                   
                }


                $_SESSION["q"]++;
             
            }
            else{  
                echo("This Last Question Press Finish<br/>");
                echo("<input type='submit' value='Previouse Question' class='btn btn-success' name='btnprev'/>&nbsp;&nbsp;");
                echo("<input type='submit' value='Finish Exam' class='btn btn-danger' name='btnfin'/>&nbsp;&nbsp;");
            }

        }
        if(isset($_POST["btnprev"]))
        {
          
             if($_SESSION["q"]>0)
             {
                --$_SESSION["q"];
                echo($_SESSION["q"]);
            
                // echo("<input type='submit' value='Previouse Question' class='btn btn-success' name='btnprev'/>&nbsp;&nbsp;");
                 $question=array(
                     array("To Declare Variable Using ?","%","&","#","$"),
                     array("To dublicate Code  Using ?","If","Switch","For","$"),
                     array("To Put Condition Code  Using ?","While","Switch","For","$"),
                     array("To Make Localhost as a Server  Using ?","VCode","neatbeans","Xammp","PHP Compiler"),
                     array("To Declare Array Multi dimention Using ?","<>","<)","[][]","[]()")
                 );
         
                 echo("Q : ".$_SESSION['q']."-".$question[$_SESSION["q"]][0]."<br/>");
                 echo("<div class='radio' style='margin-left:20px;padding:10px'>");
                     echo("<input type='radio' value='{$question[$_SESSION['q']][1]}' name='rdanswer' />".$question[$_SESSION['q']][1]."<br/>");
                     echo("<input type='radio' value='{$question[$_SESSION['q']][2]}' name='rdanswer'/>".$question[$_SESSION['q']][2]."<br/>");
                     echo("<input type='radio' value='{$question[$_SESSION['q']][3]}' name='rdanswer' />".$question[$_SESSION['q']][3]."<br/>");
                     echo("<input type='radio' value='{$question[$_SESSION['q']][4]}' name='rdanswer'/>".$question[$_SESSION['q']][4]."<br/>");
                     echo("<br/><input type='submit' value='Next Question' class='btn btn-primary' name='btnnext'/>&nbsp;&nbsp;");
                     echo("<input type='submit' value='Previouse Question' class='btn btn-success' name='btnprev'/>&nbsp;&nbsp;");
                     
                 echo("</div>");
              
             
             }
             else{  
                 echo("This First Question Press Finish<br/>");
                 echo("<input type='submit' value='Next Question' class='btn btn-success' name='btnnext'/>&nbsp;&nbsp;");
                  
             }
           
        }
if(isset($_POST["btnfin"]))
{
    echo("Correct Question : ".$_SESSION["cr"]."<br/>");
    echo("Incorrect Question : ".$_SESSION["ci"]."<br/>");
}

    ?>

</h4>
    </form>
</div>
    
</body>
</html>