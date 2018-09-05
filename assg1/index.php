<!--Name: Abdul Alsowailem -->
<!--Students id: s4580796 -->
<html lang="en">
<head>
    <title>Index</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="./js/bootstrap.js"></script>
</head>
<body>
<?php
include "./header.php";

//variables
$title = "";
$firstName = $errFName = "";
$lastName = $errLName = "";
$address = $errAddr = "";
$suburb = $errSub = "";
$state = "";
$postCode = $errPCode = "";
$email = $errEmail = "";
$amount = $errAmount = "";
$cardType = $errCType = "";
$cardHolder = $errCHolder = "";
$cardNum = $errCNum = "";
$expiryDate = $errEDate = "";
$sCode = $errSCode = "";
$errTerm = "";
$isOK = "";
//check post form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //check firstname
    if (empty($_POST["firstname"])) {
        $errFName = "Please enter your first name";
        $isOK = false;
    } else {
        $firstName = checkInput($_POST["firstname"]);
        //check first name: only character and spaces
        if (!preg_match("/^[a-zA-Z ]*$/", $firstName)) {
            $errFName = "Firstname is only character and spaces";
            $isOK = false;
        }
        else{
            $firstName = checkInput($_POST["firstname"]);
            $isOK = true;
        }
    }
    //check lastname
    if (empty($_POST["lastname"])) {
        $errLName = "Please enter your last name";
        $isOK = false;
    } else {
        $lastName = checkInput($_POST["lastname"]);
        //check last name: only alpha and spaces
        if (!preg_match("/^[a-zA-Z ]*$/", $lastName)) {
            $errLName = "Lastname is only character and spaces";
            $isOK = false;
        }
        else{
            $lastName = checkInput($_POST["lastname"]);
            $isOK = true;
        }
    }
    //check street address
    if (empty($_POST["street_address"])) {
        $errAddr = "Please enter your address";
        $isOK = false;
    } else {
        $address = checkInput($_POST["street_address"]);
        //check address: only alpha, numeric and spaces
        if (!preg_match("/^[a-zA-Z0-9 ]*$/", $address)) {
            $errAddr = "Address is alpha, numeric and spaces";
            $isOK = false;
        }
        else{
            $address = checkInput($_POST["street_address"]);
            $isOK = true;
        }
    }
    //check suburb
    $suburb = checkInput($_POST["suburb"]);
    //check suburb: only alpha and spaces
    if (!preg_match("/^[a-zA-Z ]*$/", $suburb)) {
        $errSub = "Suburb is alpha and spaces";
        $isOK = false;
    }
    else{
        $suburb = checkInput($_POST["suburb"]);
        $isOK = true;
    }
    //get state
    $state = $_POST["state"];
    //check post code
    $postCode = checkInput($_POST["postcode"]);
    //check postcode: 4 digits
    if (!preg_match("/^[0-9]{4}$/", $postCode) && $postCode != "") {
        $errPCode = "Postcode is 4 digits";
        $isOK = false;
    }
    else{
        $postCode = checkInput($_POST["postcode"]);
        $isOK = true;
    }
    //check email
    $email = checkInput($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) && $email != "") {
        $errEmail = "Not valid email format";
        $isOK = false;
    }
    else{
        $email = checkInput($_POST["email"]);
        $isOK = true;
    }
    //check payment amount
    if (empty($_POST["amount"])) {
        $errAmount = "Please enter amount";
        $isOK = false;
    } else {
        $amount = checkInput($_POST["amount"]);
        //check amount: only float value
        if (is_float($amount)) {
            $errAmount = "Amount: float value";
            $isOK = false;
        }
        else{
            $amount = checkInput($_POST["amount"]);
            $isOK = true;
        }
    }
    //check card type
    if (empty($_POST["cardType"])) {
        $errCType = "Please select card type";
        $isOK = false;
    } else {
        $cardType = checkInput($_POST["cardType"]);
        $isOK = true;
    }

    //check card holder
    if (empty($_POST["cardHolder"])) {
        $errCHolder = "Please enter card holder";
        $isOK = false;
    } else {
        $cardHolder = checkInput($_POST["cardHolder"]);
        //check amount: only float value
        if (!preg_match("/^[a-zA-Z ]*$/", $cardHolder)) {
            $errCHolder = "Card holder is only character and spaces";
            $isOK = false;
        }
        else{
            $cardHolder = checkInput($_POST["cardHolder"]);
            $isOK = true;
        }
    }
    //check card number
    if (empty($_POST["cardNumber"])) {
        $errCNum = "Please enter card holder";
        $isOK = false;
    } else {
        $cardNum = checkInput($_POST["cardNumber"]);
        //check card number: 13 to 16 digits
        if (!preg_match("/^[0-9]{13,16}$/", $cardNum)) {
            $errCNum = "Card number is 13 or 16 digits";
            $isOK = false;
        }
        else{
            $cardNum = checkInput($_POST["cardNumber"]);
            $isOK = true;
        }
    }
    //check expiry date
    if (empty($_POST["expiryMonth"]) && empty($_POST["expiryYear"])) {
        $errEDate = "Please select month and year";
        echo $_POST["expiryMonth"];
        $isOK = false;
    } else {
        $expiryDate = checkInput($_POST["expiryMonth"]) . "/" . checkInput($_POST["expiryYear"]);
        $isOK = true;
    }
    //check security code
    if (empty($_POST["sCode"])) {
        $errSCode = "Please enter security code";
        $isOK = false;
    } else {
        $sCode = checkInput($_POST["sCode"]);
        //check security code: 3 digits
        if (!preg_match("/^[0-9]{3}$/", $sCode)) {
            $errSCode = "Security code is 3 digits";
            $isOK = false;
        }
        else{
            $sCode = checkInput($_POST["sCode"]);
            $isOK = true;
        }
    }
    //check term
    if (empty($_POST["terms"])) {
        $errTerm = "Please agree with our terms";
        $isOK = false;
    }
    else{
        $isOK = true;
    }
}
//if(!isset($_POST["submit"])) {
if ($isOK == false) {
    ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center ">
                <div class="h1 bg-info">
                    PAYMENT FORM
                </div>
            </div>
        </div>
        <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
              novalidate="true">
            <div class="row">
                <div class="col-sm-6 jumbotron">
                    <!-- Title -->
                    <div class="form-group">
                        <label class="control-label" for="title">
                            Title
                        </label>
                        <select name="title" class="form-control">
                            <option value="mr">Mr</option>
                            <option value="mrs">Mrs</option>
                            <option value="ms">Ms</option>
                            <option value="dr">Dr</option>
                        </select>
                    </div>
                    <!-- end Title -->
                    <!-- First name -->
                    <div class="form-group">
                        <label class="control-label" for="firstname">
                            First Name
                            <small class="text-danger" id="firstname">
                                * <?php echo $errFName; ?>
                            </small>
                        </label>
                        <input class="form-control" type="text" name="firstname" value="<?php echo $firstName; ?>">
                    </div>
                    <!-- end firstname -->
                    <!-- Last name -->
                    <div class="form-group">
                        <label class="control-label" for="lastname">
                            Last Name
                            <small class="text-danger" id="lastname">
                                * <?php echo $errLName; ?>
                            </small>
                        </label>
                        <input class="form-control" type="text" name="lastname" value="<?php echo $lastName; ?>">
                    </div>
                    <!-- end last name -->
                    <!-- street address-->
                    <div class="form-group">
                        <label class="control-label" for="street_address">
                            Street Address
                            <small class="text-danger" id="street_address">
                                * <?php echo $errAddr; ?>
                            </small>
                        </label>
                        <input class="form-control" type="text" name="street_address"
                               value="<?php echo $address; ?>">
                    </div>
                    <!-- end street address-->
                    <!-- suburb-->
                    <div class="form-group">
                        <label class="control-label" for="suburb">
                            Suburb
                        </label>
                        <small class="text-danger" id="suburb">
                            <?php echo $errSub; ?>
                        </small>
                        <input class="form-control" type="text" name="suburb" value="<?php echo $suburb; ?>">
                    </div>
                    <!-- end suburb-->
                    <!-- State-->
                    <div class="form-group">
                        <label class="control-label" for="state">
                            City
                        </label>
                        <select name="state" class="form-control">
                            <option <?php if ($state == 'act') echo 'selected'; ?> value="act">ACT</option>
                            <option <?php if ($state == 'nsw') echo 'selected'; ?> value="nsw">NSW</option>
                            <option <?php if ($state == 'nt') echo 'selected'; ?> value="nt">NT</option>
                            <option <?php if ($state == 'qld') echo 'selected'; ?> value="qld">QLD</option>
                            <option <?php if ($state == 'sa') echo 'selected'; ?> value="sa">SA</option>
                            <option <?php if ($state == 'tas') echo 'selected'; ?> value="tas">TAS</option>
                            <option <?php if ($state == 'vic') echo 'selected'; ?> value="vic">VIC</option>
                            <option <?php if ($state == 'wa') echo 'selected'; ?> value="wa">WA</option>
                        </select>
                    </div>
                    <!-- end state-->
                    <!-- postcode-->
                    <div class="form-group">
                        <label class="control-label" for="postcode">
                            Postcode
                            <small class="text-danger" id="postcode">
                                <?php echo $errPCode; ?>
                            </small>
                        </label>
                        <input class="form-control" type="text" name="postcode" value="<?php echo $postCode; ?>">
                    </div>
                    <!-- end postcode-->
                    <!-- email-->
                    <div class="form-group">
                        <label class="control-label" for="email">
                            Email
                            <small class="text-danger" id="email">
                                <?php echo $errEmail; ?>
                            </small>
                        </label>
                        <input class="form-control" type="email" name="email" value="<?php echo $email; ?>">
                    </div>
                    <!-- end email-->
                </div>
                <div class="col-sm-6 jumbotron">
                    <!-- payment amount-->
                    <div class="form-group">
                        <label class="control-label" for="amount">
                            Amount
                            <small class="text-danger" id="city">
                                * <?php echo $errAmount; ?>
                            </small>
                        </label>
                        <input class="form-control" type="text" name="amount" value="<?php echo $amount; ?>">
                    </div>
                    <!-- end payment amount-->
                    <!-- card type-->
                    <div class="form-group">
                        <label class="control-label" for="cardType">
                            Card type
                            <small class="text-danger">
                                * <?php echo $errCType; ?>
                            </small>
                        </label>
                        <div class="btn-block">
                            <label class="radio-inline">
                                <input type="radio" name="cardType"
                                       value="amex" <?php if (isset($cardType) && $cardType == "amex") echo "checked"; ?>>&nbsp;&nbsp;AMEX
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="cardType"
                                       value="master" <?php if (isset($cardType) && $cardType == "master") echo "checked"; ?>>&nbsp;&nbsp;MasterCard
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="cardType"
                                       value="visa" <?php if (isset($cardType) && $cardType == "visa") echo "checked"; ?>>&nbsp;&nbsp;Visa
                            </label>
                        </div>
                    </div>
                    <!-- end card type-->
                    <!-- card holder-->
                    <div class="form-group">
                        <label class="control-label" for="cardHolder">
                            Card holder
                            <small class="text-danger" id="cardHolder">
                                * <?php echo $errCHolder; ?>
                            </small>
                        </label>
                        <input class="form-control" type="text" name="cardHolder"
                               value="<?php echo $cardHolder; ?>">
                    </div>
                    <!-- end card holder-->
                    <!-- card number-->
                    <div class="form-group">
                        <label class="control-label" for="cardNumber">
                            Card number
                            <small class="text-danger" id="cardNumber">
                                * <?php echo $errCNum; ?>
                            </small>
                        </label>
                        <input class="form-control" type="text" name="cardNumber" value="<?php echo $cardNum; ?>">
                    </div>
                    <!-- end card number-->
                    <!-- Expire date-->
                    <div class="form-group">
                        <label class="control-label">
                            Expiry Date
                            <small class="text-danger">
                                * <?php echo $errEDate; ?>
                            </small>
                        </label>
                        <div class="row">
                            <div class="col-xs-3">
                                <select class="form-control col-sm-2" name="expiryMonth" id="expiryMonth">
                                    <option value="">Month</option>
                                    <option value="01">Jan (01)</option>
                                    <option value="02">Feb (02)</option>
                                    <option value="03">Mar (03)</option>
                                    <option value="04">Apr (04)</option>
                                    <option value="05">May (05)</option>
                                    <option value="06">June (06)</option>
                                    <option value="07">July (07)</option>
                                    <option value="08">Aug (08)</option>
                                    <option value="09">Sep (09)</option>
                                    <option value="10">Oct (10)</option>
                                    <option value="11">Nov (11)</option>
                                    <option value="12">Dec (12)</option>
                                </select>
                            </div>
                            <div class="col-xs-3">
                                <select class="form-control" name="expiryYear">
                                    <option value="">Year</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <!-- End Expire date-->
                    <!-- Security code-->
                    <div class="form-group">
                        <label class="control-label" for="sCode">
                            Security code
                            <small class="text-danger" id="sCode">
                                * <?php echo $errSCode; ?>
                            </small>
                        </label>
                        <input class="form-control" type="text" name="sCode" value="<?php echo $sCode; ?>">
                    </div>
                    <!-- End security code-->
                    <!-- Term-->
                    <div class="form-group">
                        <div class="checkbox">
                            <label>

                                <input type="checkbox" name="terms" value="terms">&nbsp;&nbsp;Accept Terms and
                                Conditions
                                <small class="text-danger">
                                    * <?php echo $errTerm; ?>
                                </small>
                                <br>
                            </label>
                        </div>
                    </div>
                    <!-- End Term-->
                    <br>
                    <div class="form-group">
                        <input type="submit" value="Submit" class="btn btn-primary btn-block" name="submit">
                    </div>
                    <br>
                    <br>
                </div>
            </div>
        </form>
    </div>

    <!-- Payment information -->
<?php
} else {
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center ">
                <div class="h1 bg-info">
                    PAYMENT INFORMATION
                </div>
            </div>
        </div>
        <div class="row">
            <table class="table table-bordered table-responsive">
                <tbody>
                <tr>
                    <th>Full name</th>
                    <td><?php echo $title . " " . $firstName . " " . $lastName; ?></td>
                </tr>
                <tr>
                    <th>Street address</th>
                    <td><?php echo $address; ?></td>
                </tr>
                <tr>
                    <th>Suburb</th>
                    <td><?php echo $suburb; ?></td>
                </tr>
                <tr>
                    <th>State</th>
                    <td><?php echo strtoupper($state); ?></td>
                </tr>
                <tr>
                    <th>Postcode</th>
                    <td><?php echo $postCode; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $email; ?></td>
                </tr>
                <tr>
                    <th>Amount</th>
                    <td><?php echo $amount; ?></td>
                </tr>
                <tr>
                    <th>Card type</th>
                    <td><?php echo $cardType; ?></td>
                </tr>
                <tr>
                    <th>Card holder</th>
                    <td><?php echo $cardHolder; ?></td>
                </tr>
                <tr>
                    <th>Card number</th>
                    <td><?php echo $cardNum; ?></td>
                </tr>
                <tr>
                    <th>Expiry date</th>
                    <td><?php echo $expiryDate; ?></td>
                </tr>
                <tr>
                    <th>Security code</th>
                    <td><?php echo $sCode; ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php
}
//}
?>
<?php
include ("./footer.php");
//fuction
//this function for normalized input
function checkInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
</body>
</html>
