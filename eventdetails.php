<?php
if (!isset($_GET['eid'])) {
    header("location: events.php");
    exit();
}
include_once('dbconfig.php');
include_once('header.php');
?>

<!-- Header Start -->
<div class="container-fluid bg-primary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h3 class="display-3 font-weight-bold text-white">Event Detail</h3>
        <div class="d-inline-flex text-white">
            <p class="m-0"><a class="text-white" href="">Home</a></p>
            <p class="m-0 px-2">/</p>
            <p class="m-0">Event Detail</p>
        </div>
    </div>
</div>
<!-- Header End -->

<?php 
$fid = $_GET['eid'];
$data = $conn->query("SELECT * FROM function_view WHERE f_id='$fid'");
$row = $data->fetch_assoc();
?>

<!-- Detail Start -->
<div class="container py-5">
    <div class="row pt-5">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="d-flex flex-column text-left mb-3">
                <p class="section-title pr-5"><span class="pr-2">Event Details</span></p>
                <h1 class="mb-3"><?php echo htmlspecialchars($row['f_title']); ?></h1>
                <div class="d-flex">
                    <p class="mr-3"><i class="fa fa-calendar text-primary"></i> <?php echo htmlspecialchars($row['f_date']); ?></p>
                    <p class="mr-3"><i class="fa fa-clock text-primary"></i> <?php echo htmlspecialchars($row['time']); ?></p>
                    <p class="mr-3"><i class="fa fa-map-marker text-primary"></i> <?php echo htmlspecialchars($row['place']); ?></p>
                </div>
            </div>
            <div class="mb-5">
                <img class="img-fluid rounded w-100 mb-4" src="<?php echo htmlspecialchars($row['image']); ?>" alt="Image" />
                <p><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
            </div>
        </div>
    </div>
</div>
<!-- Detail End -->

<?php 
$data1 = $conn->query("SELECT * FROM functionimg WHERE f_id='$fid'");
if ($data1->num_rows > 0) {
?> 
<!-- Portfolio Start -->
<div class="container-fluid pt-5 pb-3">
    <div class="container">
        <div class="row portfolio-container">
            <?php while($row1 = $data1->fetch_assoc()) { ?>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item">
                    <div class="position-relative overflow-hidden mb-2">
                        <div class="image-wrapper">
                            <img class="img-fluid w-100" src="functionimages/<?php echo htmlspecialchars($row1['imgurl']); ?>" alt="Image" />
                        </div>
                        <div class="portfolio-overlay">
                            <a class="btn btn-outline-light" href="functionimages/<?php echo htmlspecialchars($row1['imgurl']); ?>" data-lightbox="portfolio">
                                <i class="fa fa-plus text-primary"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>       
        </div>
    </div>
</div>

<!-- Portfolio End -->

<?php } ?>

<?php include_once('footer.php'); ?>


<!-- Custom CSS -->
<style>
    .portfolio-item {
        position: relative;
        overflow: hidden;
    }
    .image-wrapper {
        width: 100%;
        padding-top: 75%; /* 4:3 Aspect Ratio */
        position: relative;
        overflow: hidden;
    }
    .image-wrapper img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .portfolio-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        opacity: 0;
        transition: opacity 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .portfolio-item:hover .portfolio-overlay {
        opacity: 1;
    }
    .portfolio-overlay a {
        display: inline-block;
        padding: 10px 20px;
        border: 2px solid #fff;
        color: #fff;
        text-decoration: none;
        transition: 0.3s;
    }
    .portfolio-overlay a:hover {
        background: #fff;
        color: #000;
    }
</style>