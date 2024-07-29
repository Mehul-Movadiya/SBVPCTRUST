<?php
include_once('header.php');
?>
<!-- partial -->
<div class="main-panel">
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $gid = $_POST['gotra_id'];
    $gotraid = strip_tags($gid); 

    $gname = $_POST['gotra_name'];
    $gotraname = strip_tags($gname); 

    $stmt = $conn->prepare("update gotra set gotra_name=? where gotra_id=?");
    $stmt->bind_param("ss", $gotraname, $gotraid);
    // print_r($stmt);
    $stmt->execute();
    
    echo "<script>alert('updated');</script>";
}
$gotraid = $_GET['gotra_id'];

$rs = $conn->query("select * from gotra where gotra_id=$gotraid");
$row = $rs -> fetch_assoc();

$gotraid = $row['gotra_id'];
$gotraname = $row['gotra_name'];
?>
        <div class="content-wrapper">
          <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <h4 class="card-title" style="font-size:30px">Update Shakh Details</h4>
                <div class="table-responsive">
                <div class="card">
                            
                            <div class="content">
                                <form method="POST">
                                    <br>
                                    <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Shakh Name</label>
                                                <input type="hidden" name="gotra_id" value="<?php echo $gotraid; ?>">
                                                <input type="text" class="form-control" name="gotra_name" value="<?php echo $gotraname; ?>">
                                            </div>
                                        </div>
                                     <div class="clearfix"></div>
                                     <div class="card-footer">
                                     <button type="submit" class="btn btn-primary mr-2">Update Shakh</button>
                                    </div>
                                </form>
                            </div>
                        </div>
</div>
</div>
                        </div>
</div>

<?php
include_once('footer.php');
?>