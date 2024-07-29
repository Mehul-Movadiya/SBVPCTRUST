<?php
include_once('header.php');
?>
<div class="main-panel">
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if ($_FILES["image"]["size"] > (2*1024*1024))
  {
    echo "<script>alert('Sorry, your file is too large.');";
  }
  else
  {
    $funtitle = $_POST['f_title'];
    $ftitle = strip_tags($funtitle); 

    $comid = $_POST['committee_id'];
    $committeeid = strip_tags($comid); 

    $reg = $_POST['registration'];
    $registration = strip_tags($reg); 

    $desc = $_POST['description'];
    $description = strip_tags($desc); 

    $fundate = $_POST['f_date'];
    $fdate = strip_tags($fundate); 

    $ftime = $_POST['time'];
    $time = strip_tags($ftime); 

    $fplace = $_POST['place'];
    $place = strip_tags($fplace); 

    $funrdate = $_POST['r_date'];
    $rdate = strip_tags($funrdate); 

    $famount = $_POST['amount'];
    $amount = strip_tags($famount); 
    $stmt = $conn->prepare("insert into function_ (f_title,committee_id,registration,description,f_date,time,place,r_date,amount)VALUES(?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssissssss", $ftitle,$committeeid,$registration,$description,$fdate,$time,$place,$rdate,$amount);
    $stmt->execute();
    $last_id = $conn->insert_id;

    $target_dir = "../functionimages/";
    $imageFileType = strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));
    $target_file = $target_dir . "F_".$last_id.".". $imageFileType;
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    $target_file = "F_".$last_id.".". $imageFileType;

    $stmt = $conn->prepare("update function_ set image=? where f_id=?");
    $stmt->bind_param("ss",$target_file,$last_id );
    $stmt->execute();
    echo "<script>alert('inserted');</script>";
  }
}
?> 
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"style="font-size:30px">Add Function</h4>
                  <p class="card-description">
                  
                  </p>
                  <form method="POST" enctype="multipart/form-data">
                                    <br>
                                    
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" class="form-control" id="f_title" name="f_title" placeholder="Title" required>
                                            </div>
                                        
                                        
                                            <div class="form-group">
                                                <label>Committee</label>
                                                <select name="committee_id" class="form-control" required>
                                                <?php
                                                    $rs = $conn->query("select * from committee");
                                                    while ($row = $rs -> fetch_assoc()) {
                                                    echo "<option value='" . $row['committee_id'] . "'>" . $row['com_name'] . "</option>";
                                                }
                                            ?>
                                            </select>
                                                
                                            </div>
                <div class="group-form">
                <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Registration Required?</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="registration" id="registration" value="1" checked="">
                                Yes
                              <i class="input-helper"></i></label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="registration" id="registration" value="0">
                                No
                                <i class="input-helper"></i></label>
                            </div>
                          </div>
                        </div>
                                            </div>
                                        
                                            <!-- <div class="form-group">
                                                <label>Required Registration?</label>
                                                <input type="radio" class="form-check-input" id="registration" name="registration" value="1" required>Yes</input>
                                                <input type="radio" class="form-check-input" id="registration" name="registration" value="0" required>No</input>
                 
                                            </div>
                                         -->
                                        
                                            <div class="form-group">
                                                <label>Description</label>
                                                <input type="text" class="form-control" id="description" name="description" placeholder="Description" required>
                                            </div>
                                        
                                        
                                            <div class="form-group">
                                                <label>Function Date</label>
                                                <input type="date" class="form-control" id="f_date" name="f_date" placeholder="Date" required>
                                            </div>
                                        
                                        
                                            <div class="form-group">
                                                <label>Function Time</label>
                                                <input type="time" class="form-control" id="time" name="time" placeholder="Time" required>
                                            </div>
                                        
                                        
                                            <div class="form-group">
                                                <label>Function Place</label>
                                                <input type="text" class="form-control" id="place" name="place" placeholder="Place" required>
                                            
                                        </div>
                                        
                                            <div class="form-group">
                                                <label>Registration Date</label>
                                                <input type="date" class="form-control" id="r_date" name="r_date" placeholder="Date">
                                            </div>
                                        
                                        
                                            <div class="form-group">
                                                <label>Amount for Registration</label>
                                                <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount">
                                            
                                        </div>
                                        
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file"  accept=".jpg, .jpeg, .png, .bmp"  class="form-control" id="image" name="image" placeholder="image" required onchange="Filevalidation()">
                                            </div>
                                        
                                     <div class="clearfix"></div>
                                     
                                     <button type="submit" class="btn btn-primary mr-2">Add Function</button>
                                   
                                </form>
                  </div>
              </div>
            </div>

            
          </div>
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
