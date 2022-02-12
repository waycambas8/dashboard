<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class InstallerComposer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'waycambas8:get_env';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get your env here dude!';

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
        // proses copy .env
        $process = new Process(['cp', '.env.example','.env']);
        //proses generate key aplikasi
        $process->run();
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        $this->info("Generate .ENV berhasil");
    }
}
