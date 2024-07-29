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
                  <h2 class="card-title"  style="font-size:30px">Relations List</h2>
                  <form method="POST">
                        <div class="row">
                        <div class="col-lg-2">
                        <a class="btn btn-primary mr-2" style = "color: white;" href = "relationadd.php">
                  Add Relation
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
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // $con = mysqli_connect("localhost", "root", "", "sbvp");
                                    $per_page_record = 10;  // Number of entries to show in a page.   
                                    // Look for a GET variable page if not found default is 1.        
                                    if (isset($_GET["page"])) {    
                                        $page  = $_GET["page"];    
                                    }    
                                    else {    
                                      $page=1;    
                                    }    
                                
                                    $start_from = ($page-1) * $per_page_record;     
    
                                    if (isset($_POST['table_search'])) {
                                        $txt = $_POST['table_search'];
                                        $rs = $conn->query("select * from relation where relation_name like '$txt%' LIMIT $start_from, $per_page_record");
                                    } else {
                                        $rs = $conn->query("select * from relation LIMIT $start_from, $per_page_record");
                                    }
                                    while ($row = $rs -> fetch_assoc()) {
                                    ?>


                                        <tr>
                                            <td><?php echo $row['relation_id']; ?> </td>
                                            <td><?php echo $row['relation_name']; ?></td>
                                            <td>
                                            <div class="col-sm-6 col-md-4 col-lg-3" style="max-width:100%;">
                                              <a class="mdi mdi-pencil" href="relationupdate.php?relation_id=<?php echo $row['relation_id']; ?>"></a> 
                                            <a class="mdi mdi-delete" href="deleterelation.php?id=<?php echo $row['relation_id']; ?>"onclick="return confirmDelete();"></a><script>
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
                                <div class="pagination"> 
                                  
                                    <?php  
                                      $query = "SELECT COUNT(*) FROM relation";     
                                      $rs_result = mysqli_query($conn, $query);     
                                      $row = mysqli_fetch_row($rs_result);     
                                      $total_records = $row[0];     
          
                                      echo "</br>";     
                                          // Number of pages required.   
                                          $total_pages = ceil($total_records / $per_page_record);     
                                          $pagLink = "";       
                                        
                                          if($page>=2){   
                                              echo "<a href='relationlist.php?page=".($page-1)."'>  Prev </a>";   
                                          }       
                                                    
                                          for ($i=1; $i<=$total_pages; $i++) {   
                                            if ($i == $page) {   
                                                $pagLink .= "<a class = 'active' href='relationlist.php?page="  
                                                                                  .$i."'>".$i." </a>";   
                                            }               
                                            else  {   
                                                $pagLink .= "<a href='relationlist.php?page=".$i."'>   
                                                                                  ".$i." </a>";     
                                            }   
                                          };     
                                          echo $pagLink;   
                                    
                                          if($page<$total_pages){   
                                              echo "<a href='relationlist.php?page=".($page+1)."'>  Next </a>";   
                                          }   
                                    
                            ?>    
                    </div> 
                    
                  </div>
                </div>
              </div>
            </div>
<?php
include_once('footer.php');
?>