<?php

namespace App\Services\OpenWeatherMaps;

use App\Services\Globals\Curl;
use App\Repositories\Mongodb\OpenWeatherMapRepository;
use App\Jobs\Datapoints\OpenWeatherMapJob;

/**
 * 
 */
class PullDataService
{
	public static function make($postalcode=31500,$country="my")
	{
		$response = Curl::get(config("openweathermap.api")."?zip=".$postalcode.",".$country."&appid=".config("openweathermap.apikey"));

		$data = json_decode($response->getBody()->getContents());

		$repository = new OpenWeatherMapRepository();

		$repository->save(31500,(array) $data);
	}
}