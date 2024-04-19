<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearSessionCommand extends Command
{
    //add command php artisan session:clear
    protected $signature = 'session:clear';
    protected $description = 'Clear all session data';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        session()->flush();
        $this->info('Session data cleared successfully.');
    }
}
