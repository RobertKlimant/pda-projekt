<link rel="stylesheet" href="http://localhost/pda-projekt/application/views/users/users.css">
<link rel="stylesheet" href="http://localhost/pda-projekt/application/views/admin/admin.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>
  <div class="window-info">
    <div class="window-user-drives">
    <a href="<?php echo site_url('admin/addzamestnanec')?>"><img src="http://localhost/pda-projekt/application/views/admin/plus.svg" alt="plus" class="plus-image"></a>
      <div class="window-user-drives-title">Zamestnanci</div>
      <span>Počet zamestnancov: <?php
        if (!empty($arrayZamestnanci)) {
          $pocet = 0;
          foreach ($arrayZamestnanci as $value) {
            $pocet ++;
          }
          echo $pocet;
        }
      ?></span>
      <div class="window-user-drives-views">
        <?php
          if (!empty($arrayZamestnanci)) {
            $i = 0;
            foreach ($arrayZamestnanci as $value) {
              echo '
                <a href="'.site_url('admin/editzamestnanec/'.$value['id'].'').'"><div class="window-user-drives-views-info">
                <div class="window-user-drives-views-info-kilometers">
                  <div class="window-user-drives-views-info-kilometers-title">Celé meno</div>
                  <div class="window-user-drives-views-info-kilometers-info">'.$value['meno'].' '.$value['priezvisko'].'</div>
                </div>
                <div class="window-user-drives-views-info-amount">
                  <div class="window-user-drives-views-info-amount-title">Jazdí</div>
                  <div class="window-user-drives-views-info-amount-info">'.$value['spz'].'</div>
                </div>
              </div></a>
              ';
            }
          }
        ?>
      </div>
    </div>
    <div class="window-user-drives">
      <div class="window-user-drives-title">Jazdy</div>
      <span>Počet jázd: <?php
        if (!empty($arrayJazdy)) {
          $pocet = 0;
          foreach ($arrayJazdy as $value) {
            $pocet++;
          }
          echo $pocet;
        }
      ?></span>
      <div class="window-user-drives-views">
        <?php
          if (!empty($arrayJazdy)) {
            foreach ($arrayJazdy as $value) {
              echo '
              <a href="'.site_url('admin/viewjazda/'.$value['id_jazda'].'').'"><div class="window-user-drives-views-info">
                <div class="window-user-drives-views-info-kilometers">
                  <div class="window-user-drives-views-info-kilometers-title">Kilometre</div>
                  <div class="window-user-drives-views-info-kilometers-info">'.$value['kilometre'].'KM</div>
                </div>
                <div class="window-user-drives-views-info-amount">
                  <div class="window-user-drives-views-info-amount-title">Suma</div>
                  <div class="window-user-drives-views-info-amount-info">'.$value['suma'].'€</div>
                </div>
              </div></a>';
            }
          }
        ?>
      </div>
    </div>
    <div class="window-user-drives">
    <a href="<?php echo site_url('admin/addauto')?>"><img src="http://localhost/pda-projekt/application/views/admin/plus.svg" alt="plus" class="plus-image"></a>
      <div class="window-user-drives-title">Auta</div>
      <span>Počet áut: <?php
        if (!empty($arrayAuta)) {
          $pocet = 0;
          foreach ($arrayAuta as $value) {
            $pocet++;
          }
          echo $pocet;
        }
      ?></span>
      <div class="window-user-drives-views">
        <?php
          if (!empty($arrayAuta)) {
            foreach ($arrayAuta as $value) {
              echo '
              <a href="'.site_url('admin/editauto/'.$value['id_car'].'').'"><div class="window-user-drives-views-info">
                <div class="window-user-drives-views-info-kilometers">
                  <div class="window-user-drives-views-info-kilometers-title">SPZ</div>
                  <div class="window-user-drives-views-info-kilometers-info">'.$value['spz'].'</div>
                </div>
                <div class="window-user-drives-views-info-amount">
                  <div class="window-user-drives-views-info-amount-title">Značka</div>
                  <div class="window-user-drives-views-info-amount-info">'.$value['znacka'].'</div>
                </div>
              </div></a>
              ';
            }
          }
        ?>
      </div>
    </div>
  </div>

  <div class="chart-view">
    <canvas id="myChart" width="400" height="400"></canvas>
  </div>

  <script type="text/javascript">

  var ctx2 = document.getElementById('myChart');
  ctx2.height = 300;
  ctx2.width = 500;
  var myChart = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: [<?php
            foreach ($graf as $value) {
              echo "'".$value['date']."',";
            }
          ?>],
        datasets: [{
            label: 'Počet jázd',
            data: [
              <?php
            foreach ($graf as $value) {
              echo $value['pocet'].',';
            }
          ?>
            ],
            borderColor: 'rgb(33,150,243)',
            borderWidth: 2,
            fill: false,
            lineTension: 0.1,
            borderDash: [5],
            pointBorderWidth: 3
        }]
    },
    options: {
      title:{
        display: true,
        text: "Počet jázdy za posledných 5 dní",
        fontSize: 30,
        fontColor: 'rgb(0,0,0)'
      },
      legend:{
        display: false
      },
      scales: {
        yAxes:[{
          ticks:{
            beginAtZero: true,
            fontSize: 13,
            maxTicksLimit: 7
          },
          gridLines:{
            color: 'rgb(0,0,0,0)'
          }
        }],
        xAxes:[{
          ticks:{
            beginAtZero: true,
            fontSize: 13,
          },
          gridLines:{
            color: 'rgb(0,0,0,0)'
          }
        }],
      }
    }
  });
  </script>