<?php

namespace App\Vito\Plugins\Arifnd\VitoDnsPorkbun;

use App\Vito\Plugins\Arifnd\VitoDnsPorkbun\DNSProviders\Porkbun;
use App\Plugins\AbstractPlugin;
use App\Plugins\RegisterDNSProvider;
use App\DTOs\DynamicField;
use App\DTOs\DynamicForm;

class Plugin extends AbstractPlugin
{
    protected string $name = 'Porkbun';

    protected string $description = 'Porkbun DNS plugin for VitoDeploy';

    public function register(): void {}

    public function boot(): void
    {
        $this->porkbun();
    }

    private function porkbun(): void
    {
        RegisterDNSProvider::make(Porkbun::id())
            ->label('Porkbun')
            ->handler(Porkbun::class)
            ->form(
                DynamicForm::make([
                    DynamicField::make('apikey')
                        ->text()
                        ->label('API Key')
                        ->description('Porkbun API key'),
                    DynamicField::make('secretapikey')
                        ->text()
                        ->label('Secret Key')
                        ->description('Porkbun Secret key'),
                ])
            )
            ->register();
    }
}