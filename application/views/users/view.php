<link rel="stylesheet" href="http://localhost/pda-projekt/application/views/login/login.css">
<link rel="stylesheet" href="http://localhost/pda-projekt/application/views/users/users.css">
</head>
<body>
  <div class="window">
    <div class="window-login">
      <a href="<?php echo site_url('users/');?>" class="link">Späť</a>
      <h1 class="window-login-title" style="text-align:left;">Detialy jazdy č. <?php echo $array[0]['id_jazda']?></h1>
      <div class="window-detail-car">Auto: <b><?php echo $array[0]['spz'].' - '.$array[0]['znacka']?></b></div>
      <div class="window-detail-car">Kilometre: <b><?php echo $array[0]['kilometre']?>KM</b></div>
      <div class="window-detail-car">Zárobok: <b><?php echo $array[0]['suma']?>€</b></div>
    </div>
  </div>