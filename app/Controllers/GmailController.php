<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Google\Client;
use Google\Service\Gmail;

class GmailController extends Controller
{
    private $client;

    public function Complaints()
    {
        return view('complaints_view');
    }
}
