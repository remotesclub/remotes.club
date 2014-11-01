<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>remotes.club</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pure/0.5.0/pure-min.css">
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/grid-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="css/grid.css">
    <!--<![endif]-->
    <link rel="stylesheet" href="css/remotes.css">
</head>
<?php include '/home/www/phplib/request_form.php'; ?>
<body>
<div id="wrapper">
<h1>remotes.club Account Request Form</h1>
<div class="pure-g">
  <div class="pure-u-1-1">
    <div class="error"><?=$error?></div>
<?php /* Show the main form */
  if(empty($code) && empty($vcode)): ?>
    <form class="pure-form pure-form-stacked" method="POST">
      <div class="pure-u-1 pure-u-md-1-3">
        <label for="userid">Desired user id</label>
        <input type="text" name="userid" placeholder="normally 8 or less chars" value="<?=$userid??""?>" required>
      </div>
      <div class="pure-u-1 pure-u-md-1-2">
        <label for="email">Email address</label>
        <input class="pure-input-1-2" type="email" name="email" value="<?=$email??""?>" required>
      </div>
      <div class="pure-u-1 pure-u-md-1-3">
        <label for="pubkey">Your <a href="https://help.github.com/articles/generating-ssh-keys/">public ssh key</a></label>
        <textarea name="pubkey" placeholder="Just copy and paste your public key here.
Carriage returns and linefeeds will be removed, so don't
worry about trying to manually remove those." 
                  cols="80" rows="10" required><?=$pubkey??""?></textarea>
      </div>
      <div class="pure-u-1 pure-u-md-1-3">
        <label for="note">Brief description</label>
        <textarea name="note" placeholder="Who are you? Which company do you work for and where do you work remotely from?"
                  cols="80" rows="10"><?=$note??""?></textarea>
      </div>
      <div class="pure-u-1 pure-u-md-1-3">
        <button type="submit" class="pure-button pure-button-primary">Submit</button>
      </div>
    </form>
<?php /* Show the verification code input form */
  elseif(!empty($code) && empty($vcode)): ?>
    <p>You should have received a code in your email.</p>
    <form class="pure-form pure-form-stacked" method="POST">
      <div class="pure-u-1 pure-u-md-1-2">
        <label for="vuserid">Desired user id</label>
        <input type="text" name="vuserid" value="<?=$userid?>" readonly>
      </div>
      <div class="pure-u-1 pure-u-md-1-2">
        <label for="vcode">Email verification code</label>
        <input class="pure-input-1-2" type="text" name="vcode" required>
      </div>
      <div class="pure-u-1 pure-u-md-1-3">
        <button type="submit" class="pure-button pure-button-primary">Submit</button>
      </div>
    </form>
<?php /* Success */
  elseif($request_accepted): ?>
   <p>Ok, your account request is in the system. Someone will get to it soon.</p>  
<?php endif?>
  </div>
</div>
</div>
</body>
</html>
