<?php
include_once('header.php');
?>
<style>
    .team-member {
        transition: all 0.3s ease;
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
</style>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" >
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/banner1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block" style="color:red;">
        <!-- <h5>Welcome To</h5>
        <p>SARV BAVAN GOL VATALIYA PRAJAPATI CHARITABLE TRUST</p> -->
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/banner3.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <!-- <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p> -->
        
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/banner2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <!-- <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p> -->
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
    <!-- Header Start -->
    <!-- <div class="container-fluid bg-primary px-0 px-md-5 mb-5" style="background-image:url('images/banner1.jpg'); background-position:center;background-size:cover;min-height:50%">
      <div class="row align-items-center px-3">
        <div class="col-lg-6 text-center text-lg-left">
          <h3 class="display-3 font-weight-bold text-white">
          સર્વ બાવનગોળ વાટલિયા પ્રજાપતિ ચેરીટેબલ સમાજ
          </h3>
          
          <a href="about.php" class="btn btn-secondary mt-1 py-3 px-5">Details</a>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
          <img class="img-fluid mt-5" src="img/logo.png" width="600px" alt="" />
        </div>
      </div>
    </div> -->
    <!-- Header End -->
    
    
    <!-- About Start -->
    <div class="container-fluid py-5">
      <div class="container">
        
        <div class="row align-items-center">
          <div class="col-lg-3">
            <img
              class="img-fluid rounded mb-5 mb-lg-0"
              src="img/logo.png"
              alt=""
            />
          </div>
          <div class="col-lg-9">
            <!-- <p class="section-title pr-5">
              <span class="pr-2">About Us</span>
            </p> -->
            <h3 class="mb-4" style="font-family: 'baloo_bhairegular';">સર્વ બાવન ગોળ વાટલિયા પ્રજાપતિ ચેરીટેબલ ટ્રસ્ટ</h3>
            <p  style="line-height: 2.5; font-weight:600;font-family: 'baloo_bhairegular';">
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

    <!-- Class Start -->
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
$data = $conn->query("select *  from function_view limit 3");
// $stmt->bind_param("sssssssss", $membername,$contactno, $email,$education,$profession,$dob,$gotraid,$homeaddress, $password);
//print_r($stmt);
// $data=$stmt->execute(); 
while($row = $data -> fetch_assoc())
{
?> 

<div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm mb-2">
              <img class="card-img-top mb-2" src="<?php echo $row['image'];?>" alt="" style="max-height:100px" />
              <div class="card-body bg-light text-center p-4">
                <h4 class=""><?php echo $row['f_title'];?></h4>
                <div class="d-flex justify-content-center mb-3">
                  <small class="mr-3"
                    ><i class="fa fa-user text-primary"></i> <?php echo $row['f_date'];?></small
                  >
                  <small class="mr-3"
                    ><i class="fa fa-folder text-primary"></i> <?php echo $row['time'];?></small
                  >
                  <small class="mr-3"
                    ><i class="fa fa-comments text-primary"></i> <?php echo $row['place'];?></small
                  >
                </div>
                <p>
                <?php 
                $text = $row['description'];
                if (strlen($text) > 150) {
                    $text = substr($text, 0, 150); // Get the first 100 characters
                    $last_period_position = strrpos($text, ' '); // Find the position of the last period
                    if ($last_period_position !== false) {
                        $text = substr($text, 0, $last_period_position + 1); // Include the last period
                    }
                }
                echo $text;
                
                ?>
                </p>
                <a href="eventdetails.php?eid=<?php echo $row['f_id'];?>" class="btn btn-primary px-4 mx-auto my-2"
                  >Read More</a
                >
              </div>
            </div>
          </div>      
          <?php
}
?>   
        </div>
      </div>
    </div>
    <!-- Class End -->

    
    <!-- Team Start -->
    <div class="container-fluid pt-5">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Our Admins</span>
          </p>
          <h1 class="mb-4">Meet Our Team</h1>
        </div>
        <div class="row">
        <?php 
$data = $conn->query("select *  from committe_member_view limit 4");
// $stmt->bind_param("sssssssss", $membername,$contactno, $email,$education,$profession,$dob,$gotraid,$homeaddress, $password);
//print_r($stmt);
// $data=$stmt->execute(); 
while($row = $data -> fetch_assoc())
{
?> 
          <div class="col-md-6 col-lg-3 text-center team mb-5">
            <div
              class="position-relative overflow-hidden mb-4"
              style="border-radius: 100%"
            >
              <img class="img-fluid w-100" src="memberimages/<?php echo $row['image']?>" alt="" style="max-height:200px; " />
              <div
                class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute"
              >
                <!-- <a
                  class="btn btn-outline-light text-center mr-2 px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-twitter"></i
                ></a>
                <a
                  class="btn btn-outline-light text-center mr-2 px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a
                  class="btn btn-outline-light text-center px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-linkedin-in"></i
                ></a> -->
              </div>
            </div>
            <h4><?php echo $row['member_name']?></h4>
            <i><?php echo $row['cm_role']?></i>
          </div>
<?php
}
?>       
          
        </div>
      </div>
    </div>
    <!-- Team End -->

    <!-- Testimonial Start -->
    
    <!-- Testimonial End -->

    <!-- Blog Start -->
    
    <!-- Blog End -->

<?php
include_once('footer.php');
?>