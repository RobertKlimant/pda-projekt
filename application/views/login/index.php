<link rel="stylesheet" href="http://localhost/pda-projekt/application/views/login/login.css">
</head>
<body>
  <div class="window">
    <div class="window-login">
      <h1 class="window-login-title">TAXII</h1>
      <h3 class="window-login-undertitle">login</h3>
      <form method="post" action="">
      <div class="input-box">
        <span class="input-box-title">ID number</span>
        <input type="text" name="idnumber" value="<?php if (!empty($idnumber)) {echo $idnumber;}?>">
      </div>
      <div class="input-box">
        <span class="input-box-title">Passoword</span>
        <input type="password" name="password">
      </div>
      <button type="submit" name="submit" class="input-box-button">Log in</button>
      </form>
      <div class="error"><?php if (!empty($error_msg)) {echo $error_msg;}?></div>
    </div>
  </div>