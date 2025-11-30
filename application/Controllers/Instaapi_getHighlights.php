<?php

//get user followers.

header('Content-Type: application/json; charset=utf-8');

class Instaapi_getHighlights extends Controller{

	public function __construct(){

	}
    public function index(){
        
        
        
        
        //get instagram ID
        $id = $_GET['user_id'];
        $pagination = $_GET['pagination_token'];
        $amount = $_GET['amount'];
        $query = $_GET['query'];
        
            
            
            $curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://instagram-scraper-api2.p.rapidapi.com/v1/highlights?username_or_id_or_url=$id",
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
    
            
            
            

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}


        
        
        
        
    }
}
        
?>