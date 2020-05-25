<link rel="stylesheet" href="http://localhost/pda-projekt/application/views/users/users.css">
</head>
<body>
  <div class="window-user">
    <div class="window-user-name"><?php if (!empty($array)){
      echo $array[0]['meno'].' '.$array[0]['priezvisko'];
    }?></div>
    <span style="text-decoration: underline; font-size: 14px;">Dnes: <?php echo date("d.m.Y")?></span>
    <div class="window-user-kilometers">Najazdené: <b><?php
      if (!empty($array)) {
        $sumKilometre = 0;
        $act_date = date("Y-m-d");
        if ($array[0]['kilometre'] != 0) {
          foreach($array as $value) {
            $moment_date = date("Y-m-d", strtotime($value['time']));
            if ($act_date == $moment_date) {
              $sumKilometre += $value['kilometre'];
            }
          }
        }
        echo $sumKilometre;
      }
    ?>KM</b></div>
    <div class="window-user-amount">Zarobené: <b><?php
      if (!empty($array)) {
        $sumSuma = 0;
        $act_date = date("Y-m-d");
        if ($array[0]['kilometre'] != 0) {
          foreach($array as $value) {
            $moment_date = date("Y-m-d", strtotime($value['time']));
            if ($act_date == $moment_date) {
              $sumSuma += $value['suma'];
            }
          }
        }
        echo $sumSuma;
      }
    ?>€</b></div>
    <div class="window-user-car">Jazdíš na: <b><?php
      if (!empty($array)) {
        if (array_key_exists('spz', $array[0])) {
          echo $array[0]['spz'];
        } else {
          echo 'Nejazdíš';
        }
      }
    ?></b></div>
    <?php
      if (!empty($array)) {
        if (array_key_exists('spz', $array[0])) {
          echo '<a href="'.site_url('users/add/').'"><div class="window-user-add">Pridať jazdu</div></a>';
        } else {
          echo '';
        }
      }
    ?>
    <a href="<?php echo site_url('users/logout/');?>"><div class="window-user-logout">Odhlásiť sa</div></a>
    <div class="window-user-drives">
      <div class="window-user-drives-title">Tvoje jazdy</div>
      <div class="window-user-drives-views">
        <?php
          if (!empty($spodokArray)) {
            foreach ($spodokArray as $value) {
              echo '
              <a href="'.site_url('users/view/'.$value['id_jazda'].'').'"><div class="window-user-drives-views-info">
                <div class="window-user-drives-views-info-kilometers">
                  <div class="window-user-drives-views-info-kilometers-title">Najazdené</div>
                  <div class="window-user-drives-views-info-kilometers-info">'.$value['kilometre'].'KM</div>
                </div>
                <div class="window-user-drives-views-info-amount">
                  <div class="window-user-drives-views-info-amount-title">Zárobok</div>
                  <div class="window-user-drives-views-info-amount-info">'.$value['suma'].'€</div>
                </div>
                <div class="window-user-drives-views-info-car">
                  <div class="window-user-drives-views-info-car-title">Auto</div>
                  <div class="window-user-drives-views-info-car-info">'.$value['spz'].'</div>
                </div>
              </div></a>';
            }
          }
        ?>

      </div>
    </div>
  </div>