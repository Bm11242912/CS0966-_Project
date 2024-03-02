<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>

<?php 
$allProjectInStrategiesId = getAllProjectInStrategiesId($_GET["strategies_id"]);
$dataPoints = getAllProjectInStrategiesIdPieChart($_GET["strategies_id"]);

?>
<style>
td>div {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  width: 140px
}
</style>

<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	theme: "dark2",
	exportFileName: "Doughnut Chart",
	exportEnabled: true,
	animationEnabled: true,
	title:{
		text: ""
	},
	legend:{
		cursor: "pointer",
		itemclick: explodePie
	},
	data: [{
		type: "doughnut",
		innerRadius: 90,
		showInLegend: true,
		toolTipContent: "<b>{name}</b>: ${y} (#percent%)",
		indexLabel: "{name} - #percent%",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

function explodePie (e) {
	if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
	} else {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
	}
	e.chart.render();
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

      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">ข้อมูลโครงการ</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div id="chartContainer" style="height: 500px; width: 100%;"></div>
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
              <h4 class="card-title">ข้อมูลโครงการ</h4>
            </div>

            <div class="card-body">
              <div class="row">
                <table style="width:100%">
                  <tr>
                    <td style="width:50%;"></td>
                    <td style="width:50%;">
                      <input type="text" name="search" id="search" class="form-control border-input" onKeyup="filterSearch();" placeholder="ค้นหา" style="width:95%;" >
                    </td>
                  </tr>

                </table>
                <br/>
                <div class="col-md-12">
                  <div class="form-group">
                    <table class="table align-items-left" id="data_table">
                      <thead>
                          <th>รหัสโครงการ</th>
                          <th>โครงการ</th>
                          <th>ผู้รับผิดชอบ</th>
                          <th>เจ้าหน้าที่ประสานงาน</th>
                          <th>งบประมาณ</th>
                          <th>งบที่ใช้</th>
                          <?php if($_SESSION["role"] == 1){ ?>
                            <th >คงเหลือ</th>
                          <?php } ?>
                      </thead>
                      <tbody>
                        <?php if(empty($allProjectInStrategiesId)){ ?>
                        <?php }else{?>
                          <?php foreach($allProjectInStrategiesId as $data){ ?>
                            <tr>
                              <td ><div title="<?php echo $data["project_id"];?>"><?php echo $data["project_id"];?></div></td>
                              <td ><div title="<?php echo $data["project_name"];?>"><?php echo $data["project_name"];?></td>
                              <td ><div title="<?php echo $data["responsible"];?>"><?php echo $data["responsible"];?></td>
                              <td ><div title="<?php echo $data["coordination"];?>"><?php echo $data["coordination"];?></td>
                              <td ><div title="<?php echo number_format($data["budget"]);?>"><?php echo number_format($data["budget"]);?></td>
                              <td ><div title="<?php echo number_format($data["budget"] - $data["balanced"]);?>"><?php echo number_format($data["budget"] - $data["balanced"]);?></td>
                              <?php if($_SESSION["role"] == 1){ ?>
                                <td ><div title="<?php echo number_format($data["balanced"]);?>"><?php echo number_format($data["balanced"]);?></td>
                              <?php } ?>
                            </tr>
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
        


      </div>


      <?php
      require_once("footer.php");
      ?>

      <script>
        function filterSearch() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("search");
          filter = input.value.toUpperCase();
          table = document.getElementById("data_table");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td1 = tr[i].getElementsByTagName("td")[1];
            td2 = tr[i].getElementsByTagName("td")[2];
            td3 = tr[i].getElementsByTagName("td")[3];
            if (td1 || td2 || td3 ) {
              if (td1.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > -1 || td3.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
      </script>

    </div>
  </main>
  
</body>

</html>