<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;

class UpdatePackagesStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'package:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates status of orders and packages.';

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
     * @return int
     */
    public function handle()
    {
        $result = App::call("App\Http\Controllers\InPostController@update");
        if ($result->status() == 200) {
            $this->info('Successfully run InPost updating module.');
        }

        $result = App::call("App\Http\Controllers\DPDController@update");

        if ($result->status() == 200) {
            $this->info('Successfully run DPD updating module.');
        }

        return 0;
    }
}
