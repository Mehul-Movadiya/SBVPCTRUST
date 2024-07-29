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
                  <h2 class="card-title" style="font-size:30px">Committee List</h2>
                  <form method="POST">
                        <div class="row">
                        <div class="col-lg-2">
                        <a class="btn btn-primary mr-2" style = "color: white;" href = "committeeadd.php">
                  Add Committee
                    </a>
                        </div>
                        <div class="col-lg-8">
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
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Village</th>
                                        <th>Contact No.</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // $con = mysqli_connect("localhost", "root", "", "sbvp");
                                    if (isset($_POST['table_search'])) {
                                        $txt = $_POST['table_search'];
                                        $rs = $conn->query("select * from committee where com_name like '$txt%' OR com_role like '$txt%'");
                                    } else {
                                      $rs = $conn->query("select * from committee");
                                    }
                                    while ($row = $rs -> fetch_assoc()) {
                                    ?>


                                        <tr>
                                            <td><?php echo $row['committee_id']; ?> </td>
                                            <td><?php echo $row['com_name']; ?></td>
                                            <td><?php echo $row['com_role']; ?></td>
                                            <td><?php echo $row['com_village']; ?></td>
                                            <td><?php echo $row['com_phone_no']; ?></td>

                                            <td>
                                            <div class="col-sm-6 col-md-4 col-lg-3" style="max-width:100%;">
                                              <a class="mdi mdi-pencil" href="committeeupdate.php?committee_id=<?php echo $row['committee_id']; ?>"></a>  
                                            <a class="mdi mdi-delete" href="deletecommittee.php?id=<?php echo $row['committee_id']; ?>" onclick="return confirmDelete();"></a><script>
                                                function confirmDelete() {
                                                    return confirm("Are you sure you want to delete this?");
                                                }
                                                </script></td>
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