<?php
if(isset($_GET['fid'])==false)
header("location: functionlist.php");
include_once('header.php');

?>
<div class="main-panel">  
  
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") 
{
    $fid=$_GET['fid'];
    $stmt = $conn->prepare("insert into functionimg (f_id)VALUES(?)");
    $stmt->bind_param("s", $fid);
    $stmt->execute();
    $last_id = $conn->insert_id;
    if (empty($_FILES['image']['name'])==false)
    {
      $target_dir = "../functionimages/";
      $imageFileType = strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));
      $target_file = $target_dir . "FI_".$last_id.".". $imageFileType;
      move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
      $target_file = "FI_".$last_id.".". $imageFileType;
  
      $stmt = $conn->prepare("update functionimg set imgurl=? where imgid=?");
      $stmt->bind_param("ss",$target_file,$last_id );
      $stmt->execute();
    }
    echo "<script>alert('inserted');</script>";
}
?>
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <h4 class="card-title" style="font-size:30px">Add Function Images</h4>
                <h4 class="card-title">Function: <?php if (isset($row['f_title'])) echo $row['f_title'];?></h4>
                  <p class="card-description">
                  
                  </p>
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Image</label>
                      <input type="file"  accept=".jpg, .jpeg, .png, .bmp"  class="form-control" id="image" name="image" placeholder="image" onchange="Filevalidation()">
                    </div>
                  
                    <button type="submit" class="btn btn-primary mr-2">Add Function Images</button>
                    <!-- <button class="btn btn-light">Cancel</button> -->
                  </form>
                </div>
              </div>
            </div>

            
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        
        <!-- partial -->
      </div>
<?php
include_once('footer.php');
?>
<script>
        Filevalidation = () => {
            const fi = document.getElementById('image');
            // Check if any file is selected.
            if (fi.files.length > 0) 
            {
                for (const i = 0; i <= fi.files.length - 1; i++) 
                {
 
                    const fsize = fi.files.item(i).size;
                    const file = Math.round((fsize / 1024));
                    // The size of the file.
                    if (file >= 2048)
                    {
                        alert("File too Big, please select a file less than 2mb");
                        fi.value='';
                    }
                }
            }
        }
</script>
