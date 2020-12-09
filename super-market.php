<?php

$market = ["cName" => '', "department" => '', "city" => '', "pQT" => 0, "products" => ["pQTY" => [], "pName" => [],
    "pPrice" => []], "total" => 0, "subTotal" => [], "discountValue" => 0, "afterDiscount" => 0
    , "percent" => 0, "delivery" => 0, "netTotal" => 0];

if (isset($_POST['getProduct'])) {
    $market['cName'] = $_POST['cName'];
    $market['department'] = $_POST['department'];
    $market['city'] = $_POST['city'];
    $market['pQT'] = $_POST['pQT'];
}

if (isset($_POST['getRecipet'])) {
    $market['cName'] = $_POST['cName'];
    $market['department'] = $_POST['department'];
    $market['city'] = $_POST['city'];
    $market['pQT'] = $_POST['pQT'];
    #process
    for ($i = 1; $i <= $market['pQT']; $i++) {
        $market['products']['pName'][$i] = $_POST["pName{$i}"];
        $market['products']['pPrice'][$i] = $_POST["pPrice{$i}"];
        $market['products']['pQTY'][$i] = $_POST["pQTY{$i}"];
        $market['subTotal'][$i] = $market['products']['pPrice'][$i] * $market['products']['pQTY'][$i];
        $market['total'] += $market['subTotal'][$i];
    }

    if ($market['total'] < 500) {
        $market['percent'] = 0;
    } elseif ($market['total'] < 1500) {
        $market['percent'] = 0.10;
    } elseif ($market['total'] < 2500) {
        $market['percent'] = 0.12;
    } else {
        $market['percent'] = 0.15;
    }

    $market['discountValue'] = $market['total'] * $market['percent'];
    $market['afterDiscount'] = $market['total'] - $market['discountValue'];

    switch ($market['city']) {
        case "Giza":
            $market['delivery'] = 30;
            break;
        case "Cairo":
            $market['delivery'] = 50;
            break;
        default:
            $market['delivery'] = 40;
    }

    $market['netTotal'] = $market['afterDiscount'] + $market['delivery'];

}


?>
<!doctype html>
<html lang="en">
<?php require_once 'includes/header.php' ?>

<div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="my-3">
        <div class="form-group">
            <label for="cName">Client Name</label>
            <input required type="text" name="cName" id="cName" value="<?php echo $market['cName'] ?>"
                   class="form-control" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label for="department">Department</label>
            <select required name="department" id="department" class="form-control">
                <option>--Departments--</option>
                <option value="electronics"
                    <?php
                    if (isset($_POST['department']) && $_POST['department'] === 'electronics') {
                        echo "selected";
                    }
                    ?>
                >Electronics
                </option>
                <option value="snacks"
                    <?php
                    if (isset($_POST['department']) && $_POST['department'] === 'snacks') {
                        echo "selected";
                    }
                    ?>
                >Snacks
                </option>
                <option value="others"
                    <?php
                    if (isset($_POST['department']) && $_POST['department'] === 'others') {
                        echo "selected";
                    }
                    ?>
                >Others
                </option>
            </select>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <div class="form-check">
                <input type="radio" name="city" id="city" value="cairo"
                    <?php
                    if (isset($_POST['city']) && $_POST['city'] === 'cairo') {
                        echo "checked";
                    }
                    ?>
                >
                <label for="city">Cairo</label>
            </div>
            <div class="form-check">
                <input type="radio" name="city" id="city" value="giza"
                    <?php
                    if (isset($_POST['city']) && $_POST['city'] === 'giza') {
                        echo "checked";
                    }
                    ?>
                >
                <label for="city">Giza</label>
            </div>
            <div class="form-check">
                <input type="radio" name="city" id="city" value="6`October"
                    <?php
                    if (isset($_POST['city']) && $_POST['city'] === '6`October') {
                        echo "checked";
                    }
                    ?>
                >
                <label for="city">6`October</label>
            </div>
        </div>
        <div class="form-group">
            <label for="cName">Product QTY</label>
            <input required type="number" name="pQT" id="pQT" value="<?php echo $market['pQT'] ?>"
                   class="form-control">
        </div>
        <input type="submit" value="Get Products" name="getProduct" class="btn btn-outline-success form-control">
        <?php if (isset($_POST['getProduct'])) : ?>
            <table class="table border table striped my-2">
                <tr>
                    <td>Product Name</td>
                    <td>Product QTY</td>
                    <td>Product price</td>
                </tr>
                <?php for ($i = 1;
                           $i <= $market['pQT'];
                           $i++) : ?>
                    <tr>
                        <td>
                            <input required type="text" name="pName<?php echo $i ?>" id="pName" class="form-control"
                                   value="<?php echo isset($market['pName'][$i]) ?>" placeholder="Enter Product name">
                        </td>
                        <td>
                            <input required type="number" name="pQTY<?php echo $i ?>" id="pQTY" class="form-control"
                                   value="<?php echo isset($market['pQTY'][$i]) ?>" placeholder="Enter Product QTY">
                        </td>
                        <td>
                            <input required type=" number" name="pPrice<?php echo $i ?>" id="pPrice"
                                   class="form-control"
                                   value="<?php echo isset($market['pPrice'][$i]) ?>" placeholder="Enter Product price">
                        </td>
                    </tr>
                <?php endfor; ?>
                <tr>
                    <td colspan=" 4">
                        <input type="submit" value="Get recipet" name="getRecipet"
                               class="btn btn-outline-success form-control">
                    </td>
                </tr>
            </table>
        <?php endif; ?>
    </form>
    <?php if (isset($_POST['getRecipet'])) : ?>
        <table class="table table-border table-striped text-muted table-hover my-3 bg-white">
            <tr>
                <th>Client Name</th>
                <td colspan="3"><?php echo $market['cName'] ?></td>
            </tr>
            <tr>
                <th>
                    Product QTY
                </th>
                <td colspan="3"><?php echo $market['pQT'] ?></td>
            </tr>
            <tr>
                <th>Product Name</th>
                <th>Product QTY</th>
                <th>Product Price</th>
                <th>Product Subtotal</th>
            </tr>
            <?php for ($i = 1; $i <= $market['pQT']; $i++) : ?>
                <tr>
                    <td><?php echo $market['products']['pName'][$i] ?></td>
                    <td><?php echo $market['products']['pQTY'][$i] ?> unit</td>
                    <td><?php echo $market['products']['pPrice'][$i] ?> $</td>
                    <td><?php echo $market['subTotal'][$i] ?> $</td>
                </tr>
            <?php endfor; ?>
            <tr>
                <th>Total</th>
                <td colspan="3"><?php echo $market['total'] ?> $</td>
            </tr>
            <tr>
                <th>Discount</th>
                <td colspan="3"><?php echo $market['percent'] * 100 ?> %</td>
            </tr>
            <tr>
                <th>Discount Value</th>
                <td colspan="3"><?php echo $market['discountValue'] ?> $</td>
            </tr>
            <tr>
                <th>Delivery</th>
                <td colspan="3"><?php echo $market['delivery'] ?> $</td>
            </tr>
            <tr>
                <th>Net Total</th>
                <td colspan="3"><?php echo $market['netTotal'] ?> $</td>
            </tr>
        </table>
    <?php endif; ?>
</div>

<?php require_once 'includes/footer.php' ?>
</html>