<link rel="stylesheet" href="http://localhost/pda-projekt/application/views/login/login.css">
<link rel="stylesheet" href="http://localhost/pda-projekt/application/views/admin/admin.css">
</head>
<body>
  <div class="window">
    <div class="window-login">
    <a href="<?php echo site_url('admin/deleteauto/'.$cars[0]['id_car'].'')?>" onclick="return confirm('Are you sure to delete?')"><img src="http://localhost/pda-projekt/application/views/admin/trash.svg" alt="plus" class="plus-image"></a>
      <a href="<?php echo site_url('admin/');?>" class="link">Späť</a>
      <h1 class="window-login-title">Upraviť Auto</h1>
      <form method="post" action="">
      <input type="hidden" name="id_user" value="<?php echo $cars[0]['id_car']?>">
      <div class="input-box">
        <span class="input-box-title">Znacka</span>
        <input type="text" name="meno" value="<?php echo $cars[0]['znacka']?>">
      </div>
      <div class="input-box">
        <span class="input-box-title">SPZ</span>
        <input type="text" name="priezvisko" value="<?php echo $cars[0]['spz']?>">
      </div>
      <button type="submit" name="upravitAuto" class="input-box-button">Upraviť Auto</button>
      </form>
      <div class="error"><?php if (!empty($error_msg)) {echo $error_msg;}?></div>
    </div>
  </div>