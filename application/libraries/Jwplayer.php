<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jwplayer {
	 //flag is true means header data field same 
    function video_details($url = null,$mediaid= null){
				
				if(is_null($url) || is_null($mediaid)){
					return array('status'=>'error','message'=>'Api Source path or Media Id is Missing');
				}
				require_once APPPATH . 'third_party/api.php';
				
				$botr_api = new BotrAPI('XqKXLzcr', '3oUd0EnUlWY5bWKzZICavvhN');
				
				return $botr_api->call($url, array('video_key' => $mediaid));
		}

}
