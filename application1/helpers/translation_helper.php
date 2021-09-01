<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function translateText($text) {
	$app_api_key = 'hjkgvkfgjfgdl654g64565gfdkjjjjjjgoerwo7g45rg54tytytkrdop[p'; 

	$apiKey = 'AIzaSyDQT7yMU9qlMZhNkboZTKLUHsP_JWVnxcs';
    // $text ="Hello world!";
    $url = 'https://www.googleapis.com/language/translate/v2?key=' . $apiKey . '&q=' . rawurlencode($text) . '&source=en&target=ar';

    $handle = curl_init($url);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($handle);
    $responseDecoded = json_decode($response, true);
    // print_r($responseDecoded);
    $responseCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);      //Here we fetch the HTTP response code
    curl_close($handle);

    if($responseCode != 200) {
          
        echo 'Fetching translation failed! Server response code:' . $responseCode . '<br>';
        echo 'Error description: ' . $responseDecoded['error']['errors'][0]['message'];
    }
    else {
    
        // echo 'Source: ' . $text . '<br>';
        return $responseDecoded['data']['translations'][0]['translatedText'];
    }

}

function translateTextEn($text) {
	$app_api_key = 'hjkgvkfgjfgdl654g64565gfdkjjjjjjgoerwo7g45rg54tytytkrdop[p'; 

	$apiKey = 'AIzaSyDQT7yMU9qlMZhNkboZTKLUHsP_JWVnxcs';
    // $text ="Hello world!";
    $url = 'https://www.googleapis.com/language/translate/v2?key=' . $apiKey . '&q=' . rawurlencode($text) . '&source=ar&target=en';

    $handle = curl_init($url);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($handle);
    $responseDecoded = json_decode($response, true);
    // print_r($responseDecoded);
    $responseCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);      //Here we fetch the HTTP response code
    curl_close($handle);

    if($responseCode != 200) {
          
        echo 'Fetching translation failed! Server response code:' . $responseCode . '<br>';
        echo 'Error description: ' . $responseDecoded['error']['errors'][0]['message'];
    }
    else {
    
        // echo 'Source: ' . $text . '<br>';
        return $responseDecoded['data']['translations'][0]['translatedText'];
    }

}




?>