<?php
include_once "Classes/Student.php";
$student = new Student();
if (isset($_POST['getDegree'])) {
    //setting fields
    $student->setSName($_POST['sName']);
    $student->setTotalDegree($_POST['tDegree']);
    $student->setCountOfSubjects($_POST['subject']);
    $name = $student->getSName();
    //process
    $totalDegree = $student->getTotalDegree();
    $countOfSubjects = $student->getCountOfSubjects();
    $student->showPercentage($totalDegree, $countOfSubjects);
    $student->showGrade($percentage);
    $student->showGradeSign($grade);
    $percentage = $student->getPercentage();
    $grade = $student->getGrade();
    $gradeSign = $student->getSign();
}

?>

<!doctype html>
<html lang="en">
<?php require_once "includes/header.php" ?>
<div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="my-3">
        <div class="form-group">
            <label for="sName">Student Name:</label>
            <input required type="text" name="sName" id="sName" class="form-control"
                   value="<?php echo $student->getSName() ?>" placeholder="Enter student name">
        </div>
        <div class="form-group">
            <label for="tDegree">Total Degree:</label>
            <input required type="text" name="tDegree" id="tDegree" class="form-control"
                   value="<?php echo $student->getTotalDegree() ?>" placeholder="Enter the total degree">
        </div>
        <div class="form-group">
            <label for="cSubjects">Subjects Count:</label>
            <input required type="text" name="subject" id="cSubjects" class="form-control"
                   value="<?php echo $student->getCountOfSubjects() ?>" placeholder="enter subjects number">
        </div>
        <button type="submit" name="getDegree" class="form-control btn btn-outline-success">Get Student Degree</button>
    </form>
    <?php if (isset($_POST['getDegree'])) : ?>
        <table class="table table-border table-striped table-hover my-2">
            <tr>
                <th>Student Name</th>
                <td colspan="3"><?php echo $name ?></td>
            </tr>
            <tr>
                <th>Percentage</th>
                <td colspan="3"><?php echo $percentage ?>
                    %
                </td>
            </tr>
            <tr>
                <th>Grade</th>
                <td colspan="3">your grade
                    is <?php echo $gradeSign ?></td>
            </tr>
        </table>
    <?php endif; ?>
</div>
<?php require_once "includes/footer.php" ?>
</html>
