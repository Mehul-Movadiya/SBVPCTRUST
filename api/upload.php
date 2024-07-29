<?php
 
    $json = json_decode(file_get_contents('php://input'),true);
    
    
    $name = $json["name"]; //within square bracket should be same as Utils.imageName & Utils.image
    $image = $json["image"];
    $mid = $json["mid"];
   // $mac_address = $json["mac_address"];
 
    $response = array();
 
    $decodedImage = base64_decode("$image");
 
    $return = file_put_contents("../memberimages/"."M_".$mid.".JPG", $decodedImage);
    
    $store_path = "M_".$mid.".JPG";
    // $con=mysqli_connect("localhost","root","","sbvp");
    include("dbconfig.php");
    $qry="update `member` set image='$store_path' where member_id='$mid'";
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