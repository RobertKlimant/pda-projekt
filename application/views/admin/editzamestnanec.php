<link rel="stylesheet" href="http://localhost/pda-projekt/application/views/login/login.css">
<link rel="stylesheet" href="http://localhost/pda-projekt/application/views/admin/admin.css">
</head>
<body>
  <div class="window">
    <div class="window-login">
    <a href="<?php echo site_url('admin/delete/'.$arrayZamestnanci[0]['id'].'')?>" onclick="return confirm('Are you sure to delete?')"><img src="http://localhost/pda-projekt/application/views/admin/trash.svg" alt="plus" class="plus-image"></a>
      <a href="<?php echo site_url('admin/');?>" class="link">Späť</a>
      <h1 class="window-login-title">Upraviť Zamestnanca</h1>
      <form method="post" action="">
      <input type="hidden" name="id_user" value="<?php echo $arrayZamestnanci[0]['id']?>">
      <div class="input-box">
        <span class="input-box-title">Meno</span>
        <input type="text" name="meno" value="<?php echo $arrayZamestnanci[0]['meno']?>">
      </div>
      <div class="input-box">
        <span class="input-box-title">Priezvisko</span>
        <input type="text" name="priezvisko" value="<?php echo $arrayZamestnanci[0]['priezvisko']?>">
      </div>
      <div class="input-box">
        <span class="input-box-title">Prihlasovacie meno</span>
        <input type="text" name="loginname" value="<?php echo $arrayZamestnanci[0]['idnumber']?>">
      </div>
      <div class="input-box">
        <span class="input-box-title">Prihlasovacie heslo</span>
        <input type="password" name="loginpassword" value="<?php echo $arrayZamestnanci[0]['password']?>">
      </div>
      <div class="input-box">
        <span class="input-box-title">Plat</span>
        <input type="text" name="plat" value="<?php echo $arrayZamestnanci[0]['plat']?>">
      </div>
      <div class="input-box">
        <span class="input-box-title">Prihlasovacie heslo</span>
        <select name="jazdi">
          <?php
            if (!empty($cars)) {
              if ($arrayZamestnanci[0]['spz'] != '---') {
                echo '<option value="nejde">---</option>';
                foreach ($arrayZamestnanci as $value) {
                  echo '<option value="'.$value['id_car'].'" selected disabled>'.$value['spz'].' - '.$value['znacka'].'</option>';
                }
              } else {
                echo '<option value="nejde" selected disabled>---</option>';
              }

              foreach ($cars as $value) {
                echo '<option value="'.$value['id_car'].'">'.$value['spz'].' - '.$value['znacka'].'</option>';
              }
            }
          ?>
        </select>
      </div>
      <button type="submit" name="upravitZamestnanca" class="input-box-button">Upraviť zamestnanca</button>
      </form>
      <div class="error"><?php if (!empty($error_msg)) {echo $error_msg;}?></div>
    </div>
  </div>