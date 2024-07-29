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
                  <h2 class="card-title" style="font-size:30px">Committee Member List</h2>
                  <form method="POST">
                        <div class="row">
                        <div class="col-lg-2">
                        <a class="btn btn-primary mr-2" style = "color: white;" href = "committeememberadd.php">
                  Add Committee Member
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
                                        <th>Committee Name</th>
                                        <th>Member Name</th>
                                        <th>E-mail</th>
                                        <th>Join Date</th>
                                        <th>Status</th>
                                        <th>Left date</th>
                                        <th>Village</th>
                                        <th>Contact</th>
                                        <th>Image</th>
                                        <th>Role</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // $con = mysqli_connect("localhost", "root", "", "sbvp");
                                    if (isset($_POST['table_search'])) {
                                        $txt = $_POST['table_search'];
                                        $rs = $conn->query("select * from committe_member_view where com_name like '$txt%' OR member_name like '$txt%'");
                                    } else {
                                      $rs = $conn->query("select * from committe_member_view");
                                    }
                                    while ($row = $rs -> fetch_assoc()) {
                                    ?>

                                        <tr>
                                            <td><?php echo $row['cm_id']; ?> </td>
                                            <td><?php echo $row['com_name']; ?> </td>
                                            <td><?php echo $row['member_name']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['joindate']; ?></td>
                                            <td><?php echo $row['status']; ?></td>
                                            <td><?php echo $row['leftdate']; ?></td>
                                            <td><?php echo $row['village']; ?></td>
                                            <td><?php echo $row['cm_phone_no']; ?></td>
                                            <td>
                                              <img src="../memberimages/<?php echo $row['image']; ?>" height="100px">
                                            </td>
                                            <td><?php echo $row['cm_role']; ?></td>
                                            <td>
                                            <div class="col-sm-6 col-md-4 col-lg-3" style="max-width:100%;">
                                              <a class="mdi mdi-pencil" href="ComMemberupdate.php?cm_id=<?php echo $row['cm_id']; ?>"></a>
                                                <a class="mdi mdi-delete" href="deletecommitteemember.php?id=<?php echo $row['cm_id']; ?>" onclick="return confirmDelete();"></a><script>
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