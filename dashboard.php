<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php 
$yThai = date("Y")+543;
$allStrategic = getAllDashboardData($yThai);
$dataPoints = getAllDashboardDataChart($yThai);
$dataPoints2 = getAllDashboardDataChartUse($yThai);

//$dataPoints2 = getAllDashboardDataChart2();
if(isset($_POST["search"])){
  $yThai = $_POST["txtSearch"];
  $allStrategic = getAllDashboardData($yThai);
  $dataPoints = getAllDashboardDataChart($yThai);
  $dataPoints2 = getAllDashboardDataChartUse($yThai);
  

}
?>
<script>
  /*window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainer", {
      animationEnabled: true,
  theme: "light2", // "light1", "light2", "dark1", "dark2"
  axisY: {
    title: "งบประมาณจัดสรร"
  },
  data: [{        
    type: "column",  
    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
  }]
});
    chart.render();

  }*/
</script>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "งบประมาณทั้งหมด"
	},	
	axisY: {
		title: "งบประมาณทั้งหมด",
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
		name: "งบประมาณทั้งหมด",
		legendText: "งบประมาณทั้งหมด",
		showInLegend: true, 
		dataPoints:<?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	},
	{
		type: "column",	
		name: "งบประมาณที่ใช้",
		legendText: "งบประมาณที่ใช้",
		axisYType: "secondary",
		showInLegend: true,
		dataPoints:<?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
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
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <h5 class="card-title">ค้นหารายการงบประมาณ</h5>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <input type="text" name="txtSearch" id="txtSearch" class="form-control border-input" placeholder="ปีงบประมาณ">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group" style="text-align: center;">
                      <input type="submit" name="search" class="btn btn-success " value="ค้นหา">
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </form>
      <br/>
      <div class="row">
        <div class="col-md-7">
          <div class="card">
            <div class="card-header card-header-primary">
              <h5 class="card-title">สรุปรายการคำของบประมาณ ปี <?php echo $yThai;?></h5>
            </div>

            <div class="card-body">

              <div class="row">
                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
              </div>

            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="card">
            <div class="card-header card-header-primary">
              <h5 class="card-title">เอกสารร่างคำขอ</h5>
            </div>

            <div class="card-body">
              <div class="row">
                <table class="table align-items-left" id="data_table">
                  <tbody>
                    <tr>
                      <td>ขออนุมัติจัดโครงการ</td>
                      <td>
                        <a href="https://docs.google.com/document/d/1uvraE-EY26MrBol1D81x3WTYLskCEhOKTy3rbC5tldw/edit?usp=sharing" target="_blank">Download</a>
                      </td>
                    </tr>
                    <tr>
                      <td>ขออนุมัติใช้งบประมาณ</td>
                      <td>
                        <a href="https://docs.google.com/document/d/1uvraE-EY26MrBol1D81x3WTYLskCEhOKTy3rbC5tldw/edit?usp=sharing" target="_blank">Download</a>
                      </td>
                    </tr>
                    <tr>
                      <td>ขออนุมัติเบิกจ่าย</td>
                      <td>
                        <a href="https://docs.google.com/document/d/1uvraE-EY26MrBol1D81x3WTYLskCEhOKTy3rbC5tldw/edit?usp=sharing" target="_blank">Download</a>
                      </td>
                    </tr>
                    <tr>
                      <td>ขอส่งสรุปผลการดำเนินงาน</td>
                      <td>
                        <a href="https://docs.google.com/document/d/1uvraE-EY26MrBol1D81x3WTYLskCEhOKTy3rbC5tldw/edit?usp=sharing" target="_blank">Download</a>
                      </td>
                    </tr>
                  </tbody>
                </table>

              </div>

            </div>
          </div>
        </div>

      </div>
      <br/>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h5 class="card-title">ประเด็นยุทธศาสตร์ ปี <?php echo $yThai;?></h5>
            </div>

            <div class="card-body">
              <table class="table align-items-left" id="data_table">
                <thead>
                  <tr>
                    <th>ยุทธศาสตร์</th>
                    <th>ปี</th>
                    <th>งบประมาณ</th>
                    <th>งบที่ใช้</th>
                    <?php if($_SESSION["role"] == 1){ ?>
                      <th>คงเหลือ</th>
                    <?php } ?>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(empty($allStrategic)){ ?>
                    <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
                  <?php }else{?>
                    <?php foreach($allStrategic as $data){ ?>
                      <tr>
                        <td><?php echo $data["strat_name"];?></td>
                        <td><?php echo $data["strat_year"];?></td>
                        <td><?php echo number_format($data["budget"]);?></td>
                        <td><?php echo number_format($data["budget"] - $data["balanced"]);?></td>
                        <?php if($_SESSION["role"] == 1){ ?>
                          <td><?php echo number_format($data["balanced"]);?></td>
                        <?php } ?>
                        <td><a href="dashboard_strategies.php?strategics_id=<?php echo $data["id"];?>" class="btn btn-info"><i class="fa fa-search"></i></a></td>
                      </tr>
                    <?php } ?>
                  <?php } ?>
                </tbody>
              </table>
              

            </div>
          </div>
        </div>
      </div>



      <?php
      require_once("footer.php");
      ?>

    </div>
  </main>
  
</body>

</html>