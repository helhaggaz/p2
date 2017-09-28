<?php require('p2_logic.php'); ?>

<!DOCTYPE html>
<html lang='en'>
  <head>
  	<title>Bill Splitter</title>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

    <!-- Bootstrap CSS -->
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

    <link href='/css/styles.css' rel='stylesheet'>

  </head>
  <body>
    <h1 class='text-center'>
      <br>
      <strong>Bill Splitter</strong>
      <br>
      <br>
    </h1>

    <form class='form-horizontal'>
      <div class='form-group'>
        <label for='splitWays' class='col-sm-2 control-label'>Split how many ways?</label>
        <div class='col-sm-10'>
          <input type='text' class='form-control' name='splitWays' id='splitWays' value='<?=$form->prefill('splitWays', '')?>'>
          <h6 style='color:red;'>* Required</h6>
        </div>
      </div>
      <div class='form-group'>
        <label for='tabAmount' class='col-sm-2 control-label'>How much was the tab?</label>
        <div class='col-sm-10'>
          <input type='text' class='form-control' name='tabAmount' id='tabAmount' value='<?=$form->prefill('tabAmount', '')?>'>
          <h6 style='color:red;'>* Required</h6>
        </div>
      </div>
      <div class='form-group'>
        <label for='tip' class='col-sm-2 control-label'>How was the service?</label>
        <div class='col-sm-10'>
          <select name='tip' id='tip' class='form-control'>
              <option value='0'>Choose one...</option>
              <option value='10' <?php if ($tip == '10') echo 'SELECTED'?>>Fair (10% tip)</option>
              <option value='15' <?php if ($tip == '15') echo 'SELECTED'?>>Better (15% tip)</option>
              <option value='18' <?php if ($tip == '18') echo 'SELECTED'?>>Good (18% tip)</option>
              <option value='20' <?php if ($tip == '20') echo 'SELECTED'?>>Excellent (20% tip)</option>
          </select>
        </div>
      </div>
      <div class='form-group'>
        <div class='col-sm-offset-2 col-sm-10'>
          <div class='checkbox'>
            <label for='roundUp'>
              <input type='checkbox' name='roundUp' id='roundUp' <?php if ($form->isChosen('roundUp')) echo 'CHECKED' ?>>Round up?
            </label>
          </div>
        </div>
      </div>
      <div class='form-group'>
        <div class='col-sm-offset-2 col-sm-10'>
          <button type='submit' class='btn btn-default'>Calculate</button>
        </div>
      </div>
    </form>

    <?php if (!empty($errors)) : ?>
        <div class='alert alert-danger'>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?=$error?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif ?>

    <?php if ($form->isSubmitted() and empty($errors)) : ?>
        <div class='alert alert-success'>
          <span class='glyphicon glyphicon-check' aria-hidden='true'></span>
            Everyone owes <strong>$<?=$payment?></strong></div>
            <?php if ($tipped) : ?>
              <i class='fa fa-smile-o' style='font-size:34px;color:red'>  Thanks and wish to see you soon!</i>
            <?php endif;?>
    <?php endif;?>

  </body>
</html>
