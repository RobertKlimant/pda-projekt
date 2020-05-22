<link rel="stylesheet" href="http://localhost/pda-projekt/application/views/login/login.css">
</head>
<body>
  <div class="window">
    <div class="window-login">
      <a href="<?php echo site_url('users/');?>">Späť</a>
      <h1 class="window-login-title">Pridaj jazdu <?php echo $array[0]['meno']?></h1>
      <form method="post" action="">
      <div class="input-box">
        <span class="input-box-title">Kilometre</span>
        <input type="text" name="kilometers">
      </div>
      <div class="input-box">
        <span class="input-box-title">Suma</span>
        <input type="text" name="amount">
      </div>
      <button type="submit" name="pridatJazdu" class="input-box-button">Pridať jazdu</button>
      </form>
      <div class="error"><?php if (!empty($error_msg)) {echo $error_msg;}?></div>
    </div>
  </div>