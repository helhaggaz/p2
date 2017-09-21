
<?php
require('helpers.php');
if ($_GET) {
    #dump($_GET); # Output from logic, only for debugging purposes to see the contents of POST
}
# Retrieve data from the form
if (isset($_GET['splitWays'])) {
    $splitWays = $_GET['splitWays'];
} else {
    $splitWays = '';
}
if (isset($_GET['tabAmount'])) {
    $tabAmount = $_GET['tabAmount'];
} else {
    $tabAmount = '';
}
if (isset($_GET['roundUp'])) {
    $roundUp = true;
} else {
    $roundUp = false;
}
$tip = '';
$roundUpChecked = '';
if (isset($_GET['tip'])) {
    $tip = $_GET['tip'];
    if ($roundUp) {
        $roundUpChecked = 'CHECKED';
    }
# Calculate the payment

if ($roundUp) {
  $payment= ceil(($tabAmount + $tabAmount*$tip/100)/$splitWays);
} else {
  $payment= round(($tabAmount + $tabAmount*$tip/100)/$splitWays,2);
}

}
