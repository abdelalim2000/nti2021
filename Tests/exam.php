<?php
session_start();
$_SESSION['quizData'] = [
    "q" => [
        ["question" => 'In PHP we dublicate values with ?', "answer1" => 'if', "answer2" => 'switch', "answer3" => 'for', "answer4" => '&&',
            "correctAnswer" => 'for', "stuAnswer" => '', "isCorrect" => false],
        ["question" => 'In PHP we create condition with ?', "answer1" => 'for', "answer2" => '&&', "answer3" => 'if', "answer4" => '{}',
            "correctAnswer" => 'if', "stuAnswer" => '', "isCorrect" => false],
        ["question" => 'We create local host Server using ?', "answer1" => 'VScode', "answer2" => 'IDE', "answer3" => 'Xampp', "answer4" => 'Server',
            "correctAnswer" => 'Xampp', "stuAnswer" => '', "isCorrect" => false],
        ["question" => 'In PHP we transfar values between pages with ?', "answer1" => 'array', "answer2" => 'variable', "answer3" => 'session', "answer4" => 'func',
            "correctAnswer" => 'session', "stuAnswer" => '', "isCorrect" => false],
        ["question" => 'In PHP we declare varibale with ?', "answer1" => '$', "answer2" => '#', "answer3" => '!', "answer4" => '%',
            "correctAnswer" => '$', "stuAnswer" => '', "isCorrect" => false],
    ],
    "stuName" => '',
    "correctQuestionsNum" => 0,
    "inCorrectQuestionsNum" => 0
];
$_SESSION['quizData']['stuName'] = $_SESSION['stuName'];

if (isset($_POST['finish'])) {
    session_destroy();
    header("location: quizRegister.php");
}
?>

<!doctype html>
<html>
<?php require_once 'includes/header.php' ?>

<?php if (!isset($_SESSION['stuName'])) :
    header("location: quizRegister.php"); ?>

<?php else: ?>
    <div class="container">
        <h1 class="text-center">Welcome : <?php echo $_SESSION['stuName'] ?></h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="my-3">
            <?php
            if (!isset($_SESSION['CQ'])) {
                $CQ = 0;
                echo "<label>Q : {$_SESSION['quizData']['q'][0]['question']}</label>";
                echo "<div class='form-group'>
                            <div class='form-check'>
                                <input type='radio' name='answer' id='answer1'>
                                <label for='answer1'>{$_SESSION['quizData']['q'][0]['answer1']}</label>
                            </div>
                            <div class='form-check'>
                                <input type='radio' name='answer' id='answer2'>
                                <label for='answer2'>{$_SESSION['quizData']['q'][0]['answer2']}</label>
                            </div>
                            <div class='form-check'>
                                <input type='radio' name='answer' id='answer3'>
                                <label for='answer3'>{$_SESSION['quizData']['q'][0]['answer3']}</label>
                            </div>
                            <div class='form-check'>
                                <input type='radio' name='answer' id='answer4'>
                                <label for='answer4'>{$_SESSION['quizData']['q'][0]['answer4']}</label>
                            </div>
                      </div>
                      <input type='submit' name='prev' value='Previous' class='btn btn-outline-warning'/>
                      <input type='submit' name='next' value='Next' class='btn btn-outline-success'/>
                      <input type='submit' name='finish' value='Finish Exam' class='btn btn-outline-danger'/>";
                $_SESSION['CQ'] = $CQ++;
            }
            if (isset($_POST['next'])) {
                if ($_SESSION['CQ'] <= 5) {
                    echo "<label>Q : {$_SESSION['quizData']['q'][$_SESSION['CQ']]['question']}</label>";
                    echo "<div class='form-group'>
                            <div class='form-check'>
                                <input type='radio' name='answer' id='answer1'>
                                <label for='answer1'>{$_SESSION['quizData']['q'][$_SESSION['CQ']]['answer1']}</label>
                            </div>
                            <div class='form-check'>
                                <input type='radio' name='answer' id='answer2'>
                                <label for='answer2'>{$_SESSION['quizData']['q'][$_SESSION['CQ']]['answer2']}</label>
                            </div>
                            <div class='form-check'>
                                <input type='radio' name='answer' id='answer3'>
                                <label for='answer3'>{$_SESSION['quizData']['q'][$_SESSION['CQ']]['answer3']}</label>
                            </div>
                            <div class='form-check'>
                                <input type='radio' name='answer' id='answer4'>
                                <label for='answer4'>{$_SESSION['quizData']['q'][$_SESSION['CQ']]['answer4']}</label>
                            </div>
                      </div>
                      <input type='submit' name='prev' value='Previous' class='btn btn-outline-warning'/>
                      <input type='submit' name='next' value='Next' class='btn btn-outline-success'/>
                      <input type='submit' name='finish' value='Finish Exam' class='btn btn-outline-danger'/>";
                    $_SESSION['CQ']++;
                } else {
                    echo "<h2> Question has ended press finish </h2>";
                }
            }

            if (isset($_POST['prev'])) {
                if ($_SESSION['CQ'] >= 0) {
                    echo "<label>Q : {$_SESSION['quizData']['q'][$_SESSION['CQ']]['question']}</label>";
                    echo "<div class='form-group'>
                            <div class='form-check'>
                                <input type='radio' name='answer' id='answer1'>
                                <label for='answer1'>{$_SESSION['quizData']['q'][$_SESSION['CQ']]['answer1']}</label>
                            </div>
                            <div class='form-check'>
                                <input type='radio' name='answer' id='answer2'>
                                <label for='answer2'>{$_SESSION['quizData']['q'][$_SESSION['CQ']]['answer2']}</label>
                            </div>
                            <div class='form-check'>
                                <input type='radio' name='answer' id='answer3'>
                                <label for='answer3'>{$_SESSION['quizData']['q'][$_SESSION['CQ']]['answer3']}</label>
                            </div>
                            <div class='form-check'>
                                <input type='radio' name='answer' id='answer4'>
                                <label for='answer4'>{$_SESSION['quizData']['q'][$_SESSION['CQ']]['answer4']}</label>
                            </div>
                      </div>
                      <input type='submit' name='prev' value='Previous' class='btn btn-outline-warning'/>
                      <input type='submit' name='next' value='Next' class='btn btn-outline-success'/>
                      <input type='submit' name='finish' value='Finish Exam' class='btn btn-outline-danger'/>";
                    $_SESSION['CQ']--;
                }
            }

            if (isset($_POST['finihs'])) {
                session_destroy();
                header("location: quizRegister.php");
            }

            ?>
        </form>
        <p class="lead text-right text-muted">
            Goodluck with your exam
        </p>
    </div>
<?php endif; ?>
<?php require_once 'includes/footer.php' ?>
</html>
