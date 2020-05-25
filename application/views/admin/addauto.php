<link rel="stylesheet" href="http://localhost/pda-projekt/application/views/login/login.css">
</head>
<body>
  <div class="window">
    <div class="window-login">
      <a href="<?php echo site_url('admin/');?>" class="link">Späť</a>
      <h1 class="window-login-title">Pridať Auto</h1>
      <form method="post" action="">
      <div class="input-box">
        <span class="input-box-title">Značka</span>
        <input type="text" name="znacka">
      </div>
      <div class="input-box">
        <span class="input-box-title">Spz</span>
        <input type="text" name="spz">
      </div>
      <button type="submit" name="pridatAuto" class="input-box-button">Pridať zamestnanca</button>
      </form>
      <div class="error"><?php if (!empty($error_msg)) {echo $error_msg;}?></div>
    </div>
  </div>