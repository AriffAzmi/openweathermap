<?php

namespace App\Jobs\Datapoints;

use App\Jobs\Job;
use App\Services\OpenWeatherMaps\PullDataService;

class OpenWeatherMapJob extends Job
{
    /**
     * Postal code value
     *
     * @var string
     */
    protected $postalcode;

    /**
     * Country value
     *
     * @var string
     */
    protected $country;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($postalcode,$country)
    {
        $this->postalcode = $postalcode;
        $this->country = $country;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        /**
        *   TODO
        *   
        *   1) Add event listener to call data prediction analysis
        */
        
        return PullDataService::make($this->postalcode,$this->country);
    }
}
