<?php namespace App\Config;

use CodeIgniter\Config\BaseConfig;

class Google extends BaseConfig
{
    public $clientId = '484010394624-v4k0lro2m843j3cpaarnu5vqoooe7m5t.apps.googleusercontent.com';
    public $clientSecret = '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';
    public $redirectUri = 'https://test-zone.xyz/auth/google/callback';
}
