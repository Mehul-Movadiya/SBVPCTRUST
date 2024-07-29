<?php
include_once('../dbconfig.php');
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
              <form method="POST">
                <input type="text" name="table_search" class="form-control" placeholder="Search Here..." aria-label="search" aria-describedby="search">
                
                <br>

                <button type="submit" class="btn btn-primary mr-2">
                <i class="mdi mdi-account-search"></i> Search</button>
                
              </form>

              </div>
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
            </li>
          </ul>
        </div> -->
        <!-- .................. -->
        <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title" style="font-size:30px">Function Images</h2>
                  <form method="POST">
                        <div class="row">
                        <div class="col-lg-1">
                        <!-- <a class="btn btn-primary mr-2" style = "color: white;" href = "functionadd.php">
                  <i class="mdi mdi-account-star"></i>
                    </a> -->
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
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Image</th>
                                        <th>Images</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    //$con = mysqli_connect("localhost", "root", "", "sbvp");
                                    if (isset($_POST['table_search'])) {
                                        $txt = $_POST['table_search'];
                                        $rs = $conn->query("select * from `fimagesview` where f_title like '$txt%'");
                                        // $stmt->bind_param("sssssssss", $membername,$contactno, $email,$education,$profession,$dob,$gotraid,$homeaddress, $password);
                                        //print_r($stmt);
                                        // $data=$stmt->execute(); 
                                            // $rs = mysqli_query($con, "select * from `function_view` where f_title like '$txt%' OR com_name like '$txt%' OR registration like '$txt%' OR amount like '$txt%'");
                                    } else {
                                      $rs = $conn->query("select * from `fimagesview` order by imgid");
                                    }
                                    while($row = $rs -> fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row['imgid']; ?></td>
                                            <td><?php echo $row['f_title']; ?></td>
                                            <td><?php echo $row['f_date']; ?></td>
                                            <td><img src="../functionimages/<?php echo $row['imgurl']; ?>" height="50px"> </td>
                                            <td>
                                              <a class="mdi mdi-plus" href="functionimagesadd.php?fid=<?php echo $row['f_id']; ?>">Add Images</a> 
                                            </td>
                                            <td>
                                            <div class="col-sm-6 col-md-4 col-lg-3" style="max-width:100%;">
                                              <a class="mdi mdi-delete" href="deletefunctionimg.php?id=<?php echo $row['imgid']; ?>" onclick="return confirmDelete();"></a><script>
                                                function confirmDelete() {
                                                    return confirm("Are you sure you want to delete this?");
                                                }
                                                </script></div></td>
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