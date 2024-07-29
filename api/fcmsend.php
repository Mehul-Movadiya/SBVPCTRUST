<?php
	$token="fFARuD3WRnaa4XD6MBnSFV:APA91bGcMRzWrC4pc9iCjP-aue-Fkt_yOXz98nJq-ijGoVkbU0qRBBMAgzLjaLYmTqK-6S6pGK-wyesw7cs6f6vAdRfOZLpTrxMhcuG4ly5gc9SwTrYChEatq9i44RgtaIzUgRl4-ALX";
	//$token="fVUpu_DCT2C3mJ1fi47iJg:APA91bFW-pEkvMdwQ0NR3dARq94nhb7RlMSg7fk5IszWRWGhndV2gLFG8fYoFgonwAFXOfDp7AZ9utsmARyFaERwtFTrMu-ucQd17phL42I9TodZb3L5CwbtgNbJY3GH4UJNK34b-Sfm";
    $title="Hello";
	$message="How are you??";
	$result = push_notification_android($token, $title, $message);
	$obj = json_decode($result);
	if($obj->success>0){ ?>
		<div class="container">
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Notification sent successfully!
			</div>
		</div>
	<?php
	} else {?>
		<div class="container">
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Failed to send notification
			</div>
		</div>
	<?php
	}

function push_notification_android($device_id, $title, $message){
    //API URL of FCM
    $url = 'https://fcm.googleapis.com/fcm/send';

    /*api_key available in:
    Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key*/    
	$api_key = 'AAAAhrE0Q_Y:APA91bH7IXrvcRjEE-KhsGpZB9XYbFeH2F9eda-rl5D-dpbmgi_erok1foBfuo0DrPa8HAlevjybb5tHyDi88fwqglSgcQZWG3t9HUxK2rj_Tq4L9Beb0zb8JsLG5-cgWh1uoPehzAWI'; //Replace with yours
	
	$target = $device_id;
	
	$fields = array();
	$fields['priority'] = "high";
	$fields['notification'] = [ "title" => $title, 
				    "body" => $message, 
				    'data' => ['message' => $message],
				    "sound" => "default"];
	if (is_array($target)){
	    $fields['registration_ids'] = $target;
	} else{
	    $fields['to'] = $target;
	}

    //header includes Content type and api key
    $headers = array(
        'Content-Type:application/json',
        'Authorization:key='.$api_key
    );
                
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    if ($result === FALSE) {
        die('FCM Send Error: ' . curl_error($ch));
    }
    curl_close($ch);
    return $result;
}
?>