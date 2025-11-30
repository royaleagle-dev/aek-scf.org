<?php

//get user followers.

header('Content-Type: application/json; charset=utf-8');

class Instaapi_getReels extends Controller{

	public function __construct(){

	}
    public function index(){
        
        //get instagram ID
        $id = $_GET['post_id'];
        $pagination = $_GET['pagination_token'];
        $amount = $_GET['amount'];
        $user_id = $_GET['user_id'];
        
        if(isset($_GET['pagination_token'])){
            
            
            $curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://instagram-scraper-api2.p.rapidapi.com/v1.2/reels?username_or_id_or_url=$user_id&url_embed_safe=true&pagination_token=$pagination",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: instagram-scraper-api2.p.rapidapi.com",
		"x-rapidapi-key: ce8b53d9c4msh8e8a057bf10c0eap17ae92jsnea6935f33efa"
	],
]);
    
            
            
            
        }else{
            
            
            
            $curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://instagram-scraper-api2.p.rapidapi.com/v1.2/reels?username_or_id_or_url=$user_id&url_embed_safe=true",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: instagram-scraper-api2.p.rapidapi.com",
		"x-rapidapi-key: ce8b53d9c4msh8e8a057bf10c0eap17ae92jsnea6935f33efa"
	],
]);
    
            
            
            
        }
            
            

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	//echo $response;
	
	$response = json_decode($response);
	$reelItems=[];
	//print_r($response->items);
	foreach($response->data->items as $item){
	    $postItems[] = [
	        
	        'caption' => $item->caption->text,
	        'mentions' => $item->caption->mentions,
	        'hashtags' => $item->caption->hashtags,
	        'video_url' => $item->video_url_original,
	        
	    ];
	}
	//print_r($postItems);
	$postData = [
	    'count' => $response->data->count,
	    'data' => $postItems,
	    'pagination_token' => $response->pagination_token,
	        
	];
	
	echo json_encode($postData);
}


        
        
        
        
    }
}
        
?>