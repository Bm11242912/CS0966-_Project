<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php 
$allStrategyInStrategics = getAllStrategyInStrategicsDashboard($_GET["strategics_id"]);
$dataPoints = getAllDashboardDetailStrategyChart($_GET["strategics_id"]);

?>

<script>
  window.onload = function() {


    var chart = new CanvasJS.Chart("chartContainer", {
      animationEnabled: true,
      title: {
        text: "งบประมาณ"
      },
      subtitles: [{
        text: ""
      }],
      data: [{
        type: "pie",
        yValueFormatString: "#,##0\" \"",
        indexLabel: "({label})",
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
      }]
    });
    chart.render();

  }
</script>
<body class="g-sidenav-show  bg-gray-100">
  <?php
  require_once("side_bar.php");
  ?>
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <?php
    require_once("nav.php");
    ?>
    <div class="container-fluid py-4">


      <form name="prduct_detail_form" action="" method="post" enctype="multipart/form-data">
        <input type="hidden" class="form-control" name="id" value="<?php echo $currentMajor["mid"];?>">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">ข้อมูลกลยุทธ์</h4>
              </div>

              <div class="card-body">
                <div class="row">

                  <div class="col-md-12">
                    <div class="form-group">

                      <table class="table align-items-left" id="data_table">
                        <thead>
                          <tr>
                            <th colspan="3">กลุยุทธ์</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if(empty($allStrategyInStrategics)){ ?>
                            <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
                          <?php }else{?>
                            <?php foreach($allStrategyInStrategics as $data){ ?>
                              <?php $allProjectInStrategiesId = getAllProjectInStrategiesId($data["id"]);?>
                              <tr>
                                <td colspan="3"><?php echo $data["strategy_name"];?></td>
                              </tr>
                              <?php if(empty($allProjectInStrategiesId)){ ?>
                                <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
                              <?php }else{?>
                                <?php foreach($allProjectInStrategiesId as $dataPro){ ?>
                                  <tr>
                                    <td><?php echo $dataPro["project_id"];?></td>
                                    <td><?php echo $dataPro["project_name"];?></td>
                                    <td><?php echo number_format($dataPro["budget"]);?> บาท</td>
                                  </tr>
                                <?php } ?>
                              <?php } ?>

                            <?php } ?>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                
                <div class="clearfix"></div>

              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Budget Chart</h4>
              </div>

              <div class="card-body">
                <div class="row">
                  <div id="chartContainer" style="height: 500px; width: 100%;"></div>

                </div>
                
                <div class="clearfix"></div>

              </div>
            </div>
          </div>

        </div>
      </form>


      <?php
      require_once("footer.php");
      ?>

    </div>
  </main>
  
</body>

</html>