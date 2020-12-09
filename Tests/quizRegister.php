<?php
session_start();

$_SESSION['users'] = [
    ["user" => 'mohamed', "pass" => '12345',],
    ["user" => 'aymen', "pass" => 'admin'],
    ["user" => 'John', "pass" => 'john'],
    ["user" => 'nti2021', "pass" => '12345'],
];

$errors = ["msg" => '', "class" => ''];
$userN = '';
$pass = '';
$stuName = '';

if (isset($_POST['login'])) {
    foreach ($_SESSION['users'] as $user) {
        if ($user['user'] === $_POST['user'] && $user['pass'] === $_POST['pass']) {
            $userN = $_POST['user'];
            $stuName = $_POST['stuName'];
            $pass = $_POST['pass'];
            $_SESSION['stuName'] = $_POST['stuName'];
            header("location: exam.php");
        } else {
            $errors['msg'] = "Worng username Or password";
            $errors['class'] = "alert alert-danger";
        }
    }
}


?>

<!doctype html>
<html lang="en">
<?php require_once "includes/header.php" ?>

<div class="container my-3">

    <?php if (isset($errors)) : ?>
        <div class="<?php echo $errors['class'] ?>"><?php echo $errors['msg'] ?></div>
    <?php endif; ?>

    <h1 class="text-center">Hello and welcom to your exam</h1>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="form-group">
            <label for="user">User Name</label>
            <input required type="text" name="user" id="user" class="form-control"
                   placeholder="Enter Username">
        </div>
        <div class="form-group">
            <label for="stuName">Student Name</label>
            <input required type="text" name="stuName" id="stuName" class="form-control"
                   placeholder="Enter Your Name">
        </div>
        <div class="form-group">
            <label for="pass">Password</label>
            <input required type="text" name="pass" id="pass" class="form-control"
                   placeholder="Enter Password">
        </div>
        <input type="submit" value="Login" name="login" class="btn btn-outline-success form-control">
    </form>
</div>

<?php require_once "includes/footer.php" ?>
</html>
