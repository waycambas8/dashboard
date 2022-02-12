<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'waycambas8:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install you application';

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
        $install = \Artisan::call('key:generate');
        $install = \Artisan::call('storage:link');

        $this->info("Barhasil Install, Have a nice try!");
    }
}
