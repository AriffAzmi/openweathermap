<?php

namespace App\Services\Globals;

use GuzzleHttp\Client;

/**
 * 
 */
class Curl
{
	public static function get($uri=null,$headers=[])
	{
		try {
			
			$client = new Client([
			    // You can set any number of default request options.
			    'timeout'  => 2.0,
			]);

			return $client->request('GET',$uri,$headers);

		} catch (\Exception $e) {
			
			Log::channel("curl_get_error")->info($e->getMessage().PHP_EOL."URI: ".$uri);
		}
	}

	// public static function post($uri=null,$body=[],$headers=[])
	// {
	// 	try {
			
	// 		return Http::withHeaders($headers)->post($uri,$body);
	// 		return $client->request('GET',$uri,$headers);

	// 	} catch (\Exception $e) {
			
	// 		Log::channel("curl_post_error")->info($e->getMessage().PHP_EOL."URI: ".$uri);
	// 	}
	// }
}