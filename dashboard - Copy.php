<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php 
//$allStrategic = getAllDashboardData();
//$dataPoints = getAllDashboardDataChart();
//$dataPoints2 = getAllDashboardDataChart2();
?>

<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "งบประมาณ"
	},	
	axisY: {
		title: "งบประมาณที่ได้",
		titleFontColor: "#4F81BC",
		lineColor: "#4F81BC",
		labelFontColor: "#4F81BC",
		tickColor: "#4F81BC"
	},
	axisY2: {
		title: "งบประมาณที่ใช้",
		titleFontColor: "#C0504E",
		lineColor: "#C0504E",
		labelFontColor: "#C0504E",
		tickColor: "#C0504E"
	},	
	toolTip: {
		shared: true
	},
	legend: {
		cursor:"pointer",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "งบประมาณที่ได้",
		showInLegend: true, 
    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
		/*dataPoints:[
			{ label: "Saudi", y: 266.21 },
			{ label: "Venezuela", y: 302.25 },
			{ label: "Iran", y: 157.20 },
			{ label: "Iraq", y: 148.77 },
			{ label: "Kuwait", y: 101.50 },
			{ label: "UAE", y: 97.8 }
		]*/
	},
	{
		type: "column",	
		name: "งบประมาณที่ใช้",
		axisYType: "secondary",
		showInLegend: true,
    dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
		/*dataPoints:[
			{ label: "Saudi", y: 10.46 },
			{ label: "Venezuela", y: 2.27 },
			{ label: "Iran", y: 3.99 },
			{ label: "Iraq", y: 4.45 },
			{ label: "Kuwait", y: 2.92 },
			{ label: "UAE", y: 3.1 }
		]*/
	}]
});
chart.render();

function toggleDataSeries(e) {
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else {
		e.dataSeries.visible = true;
	}
	chart.render();
}

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
                <h4 class="card-title">Dashboard</h4>
              </div>

              <div class="card-body">
                <div class="row">
                  <div class="col-md-8" style="text-align:right;">
                    <div class="form-group">
                      ข้อมูลประจำปี
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                    </div>
                  </div>
                </div>
              <!--<div class="row">
                  <div class="col-md-6" style="text-align:right;">
                    <div class="form-group">
                      ข้อมูลประจำปี
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <select name="years" class="form-control">
                        <option value="2566">2566</option>
                        <option value="2565">2565</option>
                        <option value="2564">2564</option>
                        <option value="2563">2563</option>
                        <option value="2562">2562</option>
                      </select>
                    </div>
                  </div>
                </div>-->
                <!--<div class="row">

                  <div class="col-md-12">
                    <div class="form-group">

                      <table class="table align-items-left" id="data_table">
                        <thead>
                          <tr>
                            <th>ยุทธศาสตร์</th>
                            <th>ปี</th>
                            <th>งบประมาณ</th>
                            <th>คงเหลือ</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if(empty($allStrategic)){ ?>
                            <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
                          <?php }else{?>
                            <?php foreach($allStrategic as $data){ ?>
                              <tr>
                                <td><a href="dashboard_strategies.php?strategics_id=<?php echo $data["id"];?>"><?php echo $data["strat_name"];?></a></td>
                                <td><?php echo $data["strat_year"];?></td>
                                <td><?php echo number_format($data["budget"]);?></td>
                                <td><?php echo number_format($data["balanced"]);?></td>
                              </tr>
                            <?php } ?>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>-->
                
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