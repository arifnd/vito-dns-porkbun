<?php

namespace App\Vito\Plugins\Arifnd\VitoDnsPorkbun;

use App\Plugins\AbstractPlugin;

class Plugin extends AbstractPlugin
{
    protected string $name = 'Porkbun';

    protected string $description = 'Porkbun DNS plugin for VitoDeploy';

    public function boot(): void
    {
        // Register plugin features here
        // https://vitodeploy.com/docs/plugins
    }
}