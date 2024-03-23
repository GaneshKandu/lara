<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lara:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'lara test command';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        echo "\n\nfCommand working\n\n";
    }
}
