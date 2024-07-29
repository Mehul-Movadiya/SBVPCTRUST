<?php
include_once('header.php');
?>
<!-- partial -->
<div class="main-panel">
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $sid= $_POST['state_id'];
    $stateid = strip_tags(mysqli_real_escape_string($con, $sid)); 

    $sname = $_POST['state_name'];
    $statename = strip_tags(mysqli_real_escape_string($con, $sname)); 

    
    mysqli_query($con, "update state set state_name='?' where state_id='?'");
    $conn = new mysqli("localhost", 'root', '', "sbvp");

    $stmt = $conn->prepare("update state set state_name=? where state_id=?");
    $stmt->bind_param("ss", $statename, $stateid);
    // print_r($stmt);
    $stmt->execute();
    echo "updated";

    echo "<script>alert('updated');</script>";
}
$stateid = $_GET['state_id'];

$rs = mysqli_query($con, "select * from state where state_id=$stateid");
$row = mysqli_fetch_assoc($rs);

$stateid = $row['state_id'];
$statename = $row['state_name'];
?>
        <div class="content-wrapper">
          <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <div class="table-responsive">
                <div class="card">
                            
                            <div class="content">
                                <form method="POST">
                                    <br>
                                    <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="hidden" name="state_id" value="<?php echo $stateid; ?>">
                                                <input type="text" class="form-control" name="state_name" value="<?php echo $statename; ?>">
                                            </div>
                                        </div>
                                     <div class="clearfix"></div>
                                     <div class="card-footer">
                                     <button type="submit" class="btn btn-primary mr-2">Submit</button>
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