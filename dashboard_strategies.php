<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php 
$allStrategyInStrategics = getAllStrategyInStrategicsDashboard($_GET["strategics_id"]);

?>

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
                <h4 class="card-title">ข้อมูลกลยุทธ์</h4>
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
                          <tr>
                            <th colspan="2">กลยุทธ์</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if(empty($allStrategyInStrategics)){ ?>
                          <?php }else{?>
                            <?php foreach($allStrategyInStrategics as $data){ ?>
                              <tr>
                                <td><?php echo $data["strategy_name"];?></td>
                                <td><a href="dashboard_project.php?strategies_id=<?php echo $data["id"];?>" class="btn btn-info"><i class="fa fa-search"></i></a></td>
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
            td = tr[i].getElementsByTagName("td")[0];
            if (td ) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
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