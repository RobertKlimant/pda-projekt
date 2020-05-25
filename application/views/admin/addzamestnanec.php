<link rel="stylesheet" href="http://localhost/pda-projekt/application/views/login/login.css">
</head>
<body>
  <div class="window">
    <div class="window-login">
      <a href="<?php echo site_url('admin/');?>" class="link">Späť</a>
      <h1 class="window-login-title">Pridať Zamestnanca</h1>
      <form method="post" action="">
      <div class="input-box">
        <span class="input-box-title">Meno</span>
        <input type="text" name="meno">
      </div>
      <div class="input-box">
        <span class="input-box-title">Priezvisko</span>
        <input type="text" name="priezvisko">
      </div>
      <div class="input-box">
        <span class="input-box-title">Prihlasovacie meno</span>
        <input type="text" name="loginname">
      </div>
      <div class="input-box">
        <span class="input-box-title">Prihlasovacie heslo</span>
        <input type="password" name="loginpassword">
      </div>
      <div class="input-box">
        <span class="input-box-title">Plat</span>
        <input type="text" name="plat">
      </div>
      <button type="submit" name="pridatZamestnanca" class="input-box-button">Pridať zamestnanca</button>
      </form>
      <div class="error"><?php if (!empty($error_msg)) {echo $error_msg;}?></div>
    </div>
  </div>