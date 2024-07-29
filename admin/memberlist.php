<?php
include_once('header.php');

?>
      
      <!-- partial -->

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
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
        </div>
        
<br> -->
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <div class="row">
                  
                  <div class="col-lg-10">
                  <h2 class="card-title" style="font-size:30px">Member List</h2>
                  </div>
                  <div  class="col-lg-2">
                    <?php
                  $rs = $conn->query("select count(*) as total from member");
                  $row = $rs -> fetch_assoc();
                  $cnt=$row["total"];
                  echo "Added Membes:$cnt";
                  ?>
                                    </div>
                </div>
                  <form method="POST">
                        <div class="row">
                        <div class="col-lg-2">
                        <a class="btn btn-primary mr-2" style = "color: white;" href = "memberadd.php">
                  Add Member</a>
                        </div>
                        <div class="col-lg-7">
                            <input type="text" name="table_search" class="form-control" placeholder="Search Here..." aria-label="search" aria-describedby="search">
                        </div>
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-primary mr-2">
                                <i class="mdi mdi-account-search"></i> Search</button>
                        </div>
                        
                        </div>
                        </form>
        <!-- .................. -->
            <!-- <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Member List</h4>
                  <a class="card-description" style = "color: blue;" href = "memberadd.php">
                  <i class="mdi mdi-account-star"></i>
                    Add </a>
                  </p> -->
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Image</th>
                          <th>Name</th>
                        	<th>Email</th>
                          <th>Education</th>
                          <th>Profession</th>
                          <th>Date of Birth</th>
                          <th>Gender</th>
                          <th>Gotra</th>
                          <th>Address</th>
                          <th>Contact No.</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                  
                        // $con = mysqli_connect("localhost", "root", "", "sbvp");
                                    if (isset($_POST['table_search'])) {
                                        $txt = $_POST['table_search'];
                                        $rs = $conn->query("select * from memberview where member_name like '$txt%' OR contact_no LIKE '$txt%'");
                                    }else {
                                      $rs = $conn->query("select * from memberview");
                                    }
                                     while ($row = $rs -> fetch_assoc()) {
                                     ?>
                                     <tr>
                                <td><img src="../memberimages/<?php echo $row['image']; ?>" height="100px"> </td>
                                    <td><?php echo $row['member_name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['education']; ?></td>
                                    <td><?php echo $row['profession']; ?></td>
                                    <td><?php echo $row['dob']; ?></td>
                                    <td><?php echo $row['gender']; ?></td>
                                    <td><?php echo $row['gotra_name']; ?></td>
                                    <td><?php echo $row['home_address']; ?></td>
                                    <td><?php echo $row['contact_no']; ?></td>
                                    <td>
                                    <div class="col-sm-6 col-md-4 col-lg-3" style="max-width:100%;">
                                    <a class="mdi mdi-pencil" href="memberupdate.php?member_id=<?php echo $row['member_id']; ?>"></a>  
                                     <a class="mdi mdi-delete" href="deletemember.php?id=<?php echo $row['member_id']; ?>" onclick="return confirmDelete();"></a><script>
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
                    <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
<?php
include_once('footer.php');
?>
