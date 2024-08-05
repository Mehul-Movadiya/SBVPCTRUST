<?php
include_once('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SBVPCT - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .team-member {
            transition: all 0.3s ease;
            padding: 20px;
            border-radius: 10px;
        }
        .team-member:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .member-img-wrapper {
            width: 200px;
            height: 200px;
            overflow: hidden;
            margin: 0 auto;
            border-radius: 50%;
        }
        .member-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .carousel-item img {
            height: 500px;
            object-fit: cover;
        }
    </style>
</head>
<body>

<!-- Carousel Start -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="images/banner1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block" style="color:red;">
                <!-- Add caption if needed -->
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/banner3.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <!-- Add caption if needed -->
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/banner2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <!-- Add caption if needed -->
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- Carousel End -->

<!-- About Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <img class="img-fluid rounded mb-5 mb-lg-0" src="img/logo.png" alt="">
            </div>
            <div class="col-lg-9">
                <h3 class="mb-4" style="font-family: 'baloo_bhairegular';">સર્વ બાવન ગોળ વાટલિયા પ્રજાપતિ ચેરીટેબલ ટ્રસ્ટ</h3>
                <p style="line-height: 2.5; font-weight:600;font-family: 'baloo_bhairegular';">
                    સમાજ, વિવિધ વ્યક્તિઓ, પરંપરાઓ, સંસ્કૃતિઓ અને સંકેતોની એક સંમિલિત અને સંજોગપૂર્ણ એકતાની 
                    અભિવ્યક્તિ છે. સમાજ એક ગોઠવણ, સહકાર, અને આદરની બંધનની રચના છે 
                    જે વ્યક્તિઓને એકબીજાની સહાય, સમર્થન અને સાથની આવશ્યકતા પરિણત કરે છે. 
                    આપણી, સમાજની ગુણવત્તા અને સામર્થ્યોના નીરીક્ષણથી આપણ| સમાજની 
                    વિકાસશીલતા અને પ્રગતિ નિર્ધારિત થાય છે. 
                    આ સંકેતો અને સંસ્કૃતિનો સંરક્ષણ અને વિકાસ સમાજની સામાજિક અને આર્થિક સ્થિતિને પ્રભાવિત કરે છે.
                </p>
                <a href="about.php" class="btn btn-primary mt-2 py-2 px-4">Read More</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Events Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center pb-2">
            <p class="section-title px-5">
                <span class="px-2">Events</span>
            </p>
            <h1 class="mb-4">Some of our Events</h1>
        </div>
        <div class="row">
            <?php 
            $data = $conn->query("SELECT * FROM function_view LIMIT 3");
            while($row = $data->fetch_assoc()) {
            ?> 
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm mb-2">
                    <!-- <img class="card-img-top mb-2" src="<?php echo $row['image'];?>" alt="" style="height: 200px; object-fit: cover;"> -->
                    <div class="card-body bg-light text-center p-4">
                        <h4><?php echo $row['f_title'];?></h4>
                        <div class="d-flex justify-content-center mb-3">
                            <small class="mr-3"><i class="fa fa-calendar text-primary"></i> <?php echo $row['f_date'];?></small>
                            <small class="mr-3"><i class="fa fa-clock text-primary"></i> <?php echo $row['time'];?></small>
                            <small class="mr-3"><i class="fa fa-map-marker-alt text-primary"></i> <?php echo $row['place'];?></small>
                        </div>
                        <p>
                        <?php 
                        $text = $row['description'];
                        echo (strlen($text) > 150) ? substr($text, 0, 147) . '...' : $text;
                        ?>
                        </p>
                        <a href="eventdetails.php?eid=<?php echo $row['f_id'];?>" class="btn btn-primary px-4 mx-auto my-2">Read More</a>
                    </div>
                </div>
            </div>      
            <?php
            }
            ?>   
        </div>
    </div>
</div>
<!-- Events End -->

<!-- Team Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center pb-2">
            <p class="section-title px-5">
                <span class="px-2">Our Admins</span>
            </p>
            <h1 class="mb-4">Meet Our Team</h1>
        </div>
        <div class="row justify-content-center">
            <?php 
            $data = $conn->query("SELECT * FROM committe_member_view LIMIT 4");
            while($row = $data->fetch_assoc()) {
            ?> 
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="team-member text-center">
                    <div class="member-img-wrapper mb-3">
                        <img class="img-fluid rounded-circle" src="memberimages/<?php echo $row['image']?>" alt="<?php echo $row['member_name']?>">
                    </div>
                    <h4><?php echo $row['member_name']?></h4>
                    <p class="text-muted"><?php echo $row['cm_role']?></p>
                </div>
            </div>
            <?php
            }
            ?>       
        </div>
    </div>
</div>
<!-- Team End -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
include_once('footer.php');
?>