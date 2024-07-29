<?php
include_once('header.php');
?>
<!-- partial -->
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

          <!-- for searching.............. -->
          <!-- <div class="navbar-menu-wrapper navbar-search-wrapper d-none d-lg-flex align-items-center">
          <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
              <div class="input-group">
              
              </div>
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
            </li>
          </ul>
        </div> -->
        <!-- .................. -->
<br>
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Area List</h4>
                  <form method="POST">
                        <div class="row">
                        <div class="col-lg-1">
                        <a class="btn btn-primary mr-2" style = "color: white;" href = "areaadd.php">
                  <i class="mdi mdi-account-star"></i>
                   </a>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" name="table_search" class="form-control" placeholder="Search Here..." aria-label="search" aria-describedby="search">
                        </div>
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-primary mr-2">
                                <i class="mdi mdi-account-search"></i> Search</button>
                        </div>
                        
                        </div>
                        </form>

               
                
              
                  <div class="table-responsive">

                  <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>pincode</th>
                                        <th>name</th>
                                        <th>city_name</th>
                                        <th>Operations</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // $con = mysqli_connect("localhost", "root", "", "sbvp");
                                    if (isset($_POST['table_search'])) {
                                        $txt = $_POST['table_search'];
                                        $rs = mysqli_query($con, "select * from area_view where area_name like '$txt%'");
                                    } else {
                                        $rs = mysqli_query($con, "select * from area_view");
                                    }
                                    while ($row = mysqli_fetch_assoc($rs)) {
                                    ?>


                                        <tr>
                                            <td><?php echo $row['area_pincode']; ?> </td>
                                            <td><?php echo $row['area_name']; ?></td>
                                            <td><?php echo $row['city_name']; ?></td>

                                            <td>
                                            <div class="col-sm-6 col-md-4 col-lg-3" style="max-width:100%;">
                                              <a class="mdi mdi-pencil" href="areaupdate.php?area_pincode=<?php echo $row['area_pincode']; ?>"></a> 
                                            <a class="mdi mdi-delete" href="deletearea.php?id=<?php echo $row['area_pincode']; ?>"onclick="return confirmDelete();"></a><script>
                                                function confirmDelete() {
                                                    return confirm("Are you sure you want to delete this?");
                                                }
                                                </script></div>
                                                </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>    
                                </table>
                  </div>
                </div>
              </div>
            </div>
<?php
include_once('footer.php');
?>