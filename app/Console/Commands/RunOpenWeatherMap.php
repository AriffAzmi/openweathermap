<?php

namespace App\Console\Commands;

use App\Jobs\Datapoints\OpenWeatherMapJob;
use Illuminate\Console\Command;

class RunOpenWeatherMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'openweathermap:run {postalcode} {country}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Schedule new job to pull data for the given postalcode and country';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // dispatch(new OpenWeatherMapJob($this->argument("postalcode"),$this->argument("country")));
        // ->delay(now()->addMinutes(1));

        $this->info('OpenWeatherMapJob for '.$this->argument("postalcode").",".$this->argument("country")." successfully dispatch.");
    }
}