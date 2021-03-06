<?php

/*
* Oficial InEvent's PHP Library
*/

// Include our main class
require_once('sdk/InEvent.php');

// Gather our InEvent client
$client = new InEvent();

// Change the enviroment, (american or european)
$client->setRegion(InEvent::$REGION_EUROPE);

// Sign In for person
$response = InEvent\Person::signIn($client, [
	"username" => "youremail@domain.com"
], [
	"password" => "yourpassword"
]);

// Dumps our response
var_dump($response["body"]);

// Verifies if code is 200 OK
if ($response['code'] == 200) {
	// Sets our client tokenID
	$client->setTokenID($response['body']['data'][0]['tokenID']);

	// Gather person companies
	$response = InEvent\Company::find($client);

	// Dumps our response
	var_dump($response['body']);

} else {
	echo "Check your credentials and try again later.\n";

}
?>