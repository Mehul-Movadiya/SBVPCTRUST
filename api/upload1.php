<?php
 include('dbconfig.php');
    $json = json_decode(file_get_contents('php://input'),true);
    
    
//    $name = $json["name"]; //within square bracket should be same as Utils.imageName & Utils.image
    $image = $json["image"];
    $rid = $json["r_id"];
   // $mac_address = $json["mac_address"];
 
    $response = array();
 
    $decodedImage = base64_decode("$image");
 
    //$return = file_put_contents("images/".$name.".JPG", $decodedImage);
    $return = file_put_contents("../relativeimages/"."R_".$rid.".JPG", $decodedImage);
    
    $store_path = "R_".$rid.".JPG";
//    $con=mysqli_connect("localhost","root","","sbvp");
    $qry="update relative set image='$store_path' where relative_id='$rid'";
    mysqli_query($con,$qry);
     
    if($return !== false){
      
        
        
        
        $response['success'] = 1;
        $response['message'] = "Image Uploaded Successfully";
        
        
         
        
    }else{
        $response['success'] = 0;
        $response['message'] = "Image Uploaded Failed";
    }
 
    echo json_encode($response);




?>