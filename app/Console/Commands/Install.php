<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use TCG\Voyager\VoyagerServiceProvider;
class Install extends Command
{
    protected $signature = 'medicweb:install';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->call('key:generate');
        $this->call('migrate:refresh');
        $this->call('storage:link');
        $this->call('db:seed');
        $this->call('vendor:publish', ['--provider' => VoyagerServiceProvider::class, '--tag' => ['config', 'voyager_avatar']]);
        $this->info('
            █ █▄░█ █▀ ▀█▀ ▄▀█ █░░ █░░ █▀▀ █▀▄ █ █ █
            █ █░▀█ ▄█ ░█░ █▀█ █▄▄ █▄▄ ██▄ █▄▀ ▄ ▄ ▄
        ');
    }
}
