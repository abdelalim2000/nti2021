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
    <center>
    <h1>Control Univeristy  Page </h1>
    </center>
    <form method="post">
    Enter Student Name: <br/>
<input type="text" class="form-control"  value="<?php echo isset($_POST['txtname'])?$_POST['txtname']:'' ?>" name="txtname" placeholder="Enter Student Name "/>
<br/>
Enter Count Of Subject : <br/>
<input type="number" class="form-control"  value="<?php echo isset($_POST['txtcount'])?$_POST['txtcount']:'' ?>" name="txtcount" placeholder="Enter Count Of Subject  "/>
<br/>
<input class="btn btn-success form-control" type="submit" name="btn" value="Show Inputs For Subjects" style="margin-bottom:20px"/>


<?php
if(isset($_POST["btn"]))
{
    $n=$_POST["txtcount"];
    echo("<table class='table table-border table-striped'>");
    echo("<tr><th>Subject Name</th><th>Degree</th></tr>");
    for($x=1;$x<=$n;$x++)
    {
        echo("<tr><td><input type='text' name='txtsubname$x' placeholder='Enter Subject Name' class='form-control'/></td>");
        echo("<td><input type='text' name='txtdegree$x' placeholder='Enter Subject Degree' class='form-control'/></td></tr>");
    }
    echo('<tr><td colspan="2"><input class="btn btn-danger form-control" type="submit" name="btncalc" value="Calculate Summation"/></td></tr>');

    echo("</table>");
    
}
if(isset($_POST["btncalc"]))
{
    $n=$_POST["txtcount"];
    $total=0;$degree;$name;$percent;$grade;$gradeSign;$subgrade;$min=100;$max=0;$minname;$maxname;$subname;
    $name=$_POST["txtname"];
    echo("<table class='table table-border table-striped'>");
    echo("<tr><th>Subject Name</th><th>Degree</th><th>Grade</th></tr>");
    echo("<tr><td>Student Name</td><td colspan='2'>$name</td></tr>");
echo("<tr><td>Count Of Subject</td><td colspan='2'>$n</td></tr>");
    for($x=1;$x<=$n;$x++)
    {
        $degree=$_POST["txtdegree{$x}"];
        $subname=$_POST["txtsubname{$x}"];
        $total+=$degree;

        if($degree>$max)
        {
            $max=$degree;
            $maxname=$subname;
        }
        if($degree<$min)
        {
            $min=$degree;
            $minname=$subname;
        }

        if($degree<50)
        {
            $subgrade="Fail";
        }
        else if($degree<65)
        {
            $subgrade="Pass";
        }
        else if($degree<75)
        {
            $subgrade="Good";
        }
        else if($degree<85)
        {
            $subgrade="Very Good";
        }
        else
            $subgrade="Excllent";

        echo("<tr><td>$subname</td><td>$degree</td><td>$subgrade</td></tr>");    
        
    }
    $percent=$total/$n;
    if($percent<50)
    {
        $grade="Fail";
    }
    else if($percent<65)
    {
        $grade="Pass";
    }
    else if($percent<75)
    {
        $grade="Good";
    }
    else if($percent<85)
    {
        $grade="Very Good";
    }
    else
        $grade="Excllent";

    switch($grade){
        
        case "Fail":
        $gradeSign="F";
         break;

         case "Pass":
         $gradeSign="D";
          break;
          case "Good":
          $gradeSign="C";
           break;
           case "Very Good":
           $gradeSign="B";
           break;
           default:
           $gradeSign="A";
        break;

    }
    echo("<tr><td>Total</td><td colspan='2'>$total</td></tr>");
    echo("<tr><td>Percentage</td><td colspan='2'>$percent</td></tr>");
    echo("<tr><td>General Grade</td><td colspan='2'>$grade</td></tr>");
    echo("<tr><td>Grade Sign</td><td colspan='2'>$gradeSign</td></tr>");
    echo("<tr><td>Maximum Subject</td><td>$max</td><td>$maxname</td></tr>");
    echo("<tr><td>Minmum Subject</td><td>$min</td><td>$minname</td></tr>");




}

?>



    </form>

</div>

</body>
</html>