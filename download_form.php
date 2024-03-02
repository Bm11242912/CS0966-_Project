<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php

$allActivity = getAllActivity();

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
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>ดาวน์โหลดแบบฟอร์ม</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table style="width:100%">
                  <tr>
                    <td style="width:50%;"></td>
                    <td style="width:50%;">
                      <input type="text" name="search" id="search" class="form-control border-input" onKeyup="filterSearch();" placeholder="ค้นหา">
                    </td>
                  </tr>

                </table>
                <br/>
                <table class="table align-items-left" id="data_table">
                  <thead>
                    <tr>
                      <th>ขั้นตอน</th>
                      <th></th>
                    </tr>
                  </thead>
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

      <script>
        function filterSearch() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("search");
          filter = input.value.toUpperCase();
          table = document.getElementById("data_table");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            td1 = tr[i].getElementsByTagName("td")[1];
            td2 = tr[i].getElementsByTagName("td")[2];
            if (td || td1 || td2) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || td1.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > -1 ) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
      </script>

      <?php
      require_once("footer.php");
      ?>

    </div>
  </main>

</body>

</html>