<?php

if ( !defined('ABSPATH' ) ) {
  die();
}

add_action('rest_api_init','edf_custom_route_callback');


function edf_custom_route_callback() {
  register_rest_route('flightstatus/v1','flight',array(
    'methods'=>"POST",
    'callback'=>"flight_return_callback",
    'args'=>array(
      'flightcode'=>array(
        'type'=>"string",
        'required'=>true
      )
    )
  ));

}
function flight_return_callback(WP_REST_REQUEST $request) {
  $flightcode=$request->get_param('flightcode');
  
  require_once EDF_PLUGIN_PATH."vendor/autoload.php";
  use Goutte\Client;
  $client = new Client();

  $total_flights=1;

  $crawler = $client->request('GET', "https://www.google.com/search?q=$flight_code");

  $flight_name = $crawler->filter('div.g:nth-of-type(1) h3 ')->each(function ($node) {
  return $flight_name=$node->html();
    
  });















  return $client;

}