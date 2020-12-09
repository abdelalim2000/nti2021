<?php
include_once "Classes/HiredEmployee.php";
$hired = new HiredEmployee();

if (isset($_POST['getSalary'])) {
    //setting data to fields
    $hired->setName($_POST['emName']);
    $hired->setBasicSalary($_POST['bSalary']);
    $hired->setAbsentCont($_POST['cDays']);
    $hired->setAbsentSplit($_POST['sDays']);
    //process
    $basicSalary = $hired->getBasicSalary();
    $contDays = $hired->getAbsentCont();
    $splitDays = $hired->getAbsentSplit();
    $baseSalary = $hired->calcBased($basicSalary);
    $continusDays = $hired->showValueCont($contDays);
    $discValue = $hired->showDiscValue($continusDays, $splitDays);
    $salry = $hired->showSalary($basicSalary, $discValue);
}

?>

<!doctype html>
<html lang="en">

<?php require_once "includes/header.php" ?>
<div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="my-3">
        <div class="formgroup">
            <label for="emName">Employee Name</label>
            <input type="text" name="emName" id="emName" class="form-control">
        </div>
        <div class="formgroup">
            <label for="bSalary">Basic Salary</label>
            <input type="text" name="bSalary" id="bSalary" class="form-control">
        </div>
        <div class="formgroup">
            <label for="cDays">Absent Continus Days</label>
            <input type="text" name="cDays" id="cDays" class="form-control">
        </div>
        <div class="formgroup">
            <label for="sDays">Absent Split Days</label>
            <input type="text" name="sDays" id="sDays" class="form-control">
        </div>
        <button type="submit" name="getSalary" class="form-control btn btn-outline-success">Get Salary</button>
    </form>
    <?php if (isset($_POST['getSalary'])) : ?>
        <table class="table table-boared table-striped table-hover my-3">
            <tr>
                <th>Name</th>
                <td colspan="3"><?php echo $hired->getName() ?></td>
            </tr>
            <tr>
                <th>
                    Basic Salary
                </th>
                <td colspan="3"><?php echo $basicSalary ?></td>
            </tr>
            <tr>
                <th>
                    Discount Value
                </th>
                <td colspan="3"><?php echo $discValue ?></td>
            </tr>
            <tr>
                <th>
                    Salary After Discount
                </th>
                <td colspan="3">
                    <?php echo $salry ?>
                </td>
            </tr>
        </table>
    <?php endif; ?>
</div>
<?php require_once "includes/footer.php" ?>

</html>
