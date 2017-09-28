
<?php
require('Form.php');
require('helpers.php');

use DWA\Form;

$form = new Form($_GET);
$tipped = false;
if ($form->isSubmitted()) {
  # Retrieve data from the form
  $splitWays = $form->get('splitWays', '');
  $tabAmount = $form->get('tabAmount', '');
  $roundUp = $form->get('roundUp', 'off');
  $tip = $form->get('tip', 0);

  # Validate
  $errors = $form->validate([
    'splitWays' => 'required|numeric',
    'tabAmount' => 'required|numeric'
  ]);
  # If there were no validation errors, proceed...
  if (empty($errors)) {
    # Calculate the payment
    if ($roundUp=='on') {
      $payment= ceil(($tabAmount + $tabAmount*$tip/100)/$splitWays);
    } else {
      $payment= round(($tabAmount + $tabAmount*$tip/100)/$splitWays,2);
    }
    if ($tip>0) {$tipped = true;}
  }

}
