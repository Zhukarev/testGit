<?php
function run(){
	if($_POST["field_select"])

	$url = "https://api.github.com/search/users?q=tom+" . $_POST["field_select"][0] .":". $_POST["field_operator"][0]. $_POST["input_value"][0];

 	$curl = curl_init();
  	curl_setopt($curl, CURLOPT_URL, $url);
  	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_HTTPHEADER,
    
    array(
            'User-Agent: PHP Script',
            'Content-Type: application/json;charset=utf-8',
            'Authorization: bearer '.'81f4a09f6d1286db915c8c2d9da30bc5ed9bd682' 
        )
    );

  	$content = curl_exec($curl);
  	curl_close($curl);
  	$decode = json_decode($content);
  	$value_end = "<table>";
  	foreach ($decode->items as $key => $value) {
		$value_end .= "<tr><td>" . $value->login ."</td><td><a href = '" . $value->avatar_url. "'> url</a></tr>"; 
  	} 
 	echo $value_end."</table>";
 	// return $value_end."</table>";
}

run();
?>