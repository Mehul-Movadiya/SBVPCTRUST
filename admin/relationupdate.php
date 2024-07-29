<?php
include_once('header.php');
?>
<!-- partial -->
<div class="main-panel">
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $rid = $_POST['relation_id'];
    $relationid = strip_tags($rid); 

    $rname = $_POST['relation_name'];
    $relationname = strip_tags($rname); 

    $stmt = $conn->prepare("update relation set relation_name=? where relation_id=?");
    $stmt->bind_param("ss", $relationname, $relationid);
    // print_r($stmt);
    $stmt->execute();
    
    echo "<script>alert('updated');</script>";
}
$relationid = $_GET['relation_id'];

$rs = $conn->query("select * from relation where relation_id=$relationid");
$row = $rs -> fetch_assoc();

$relationid = $row['relation_id'];
$relationname = $row['relation_name'];
?>
        <div class="content-wrapper">
          <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Relation</h4>

                <div class="table-responsive">
                <div class="card">
                            
                            <div class="content">
                                <form method="POST">
                                    <br>
                                    <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="hidden" name="relation_id" value="<?php echo $relationid; ?>">
                                                <input type="text" class="form-control" name="relation_name" value="<?php echo $relationname; ?>">
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