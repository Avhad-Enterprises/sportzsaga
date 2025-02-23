<?php namespace App\Controllers;

use Google_Client;
use Google_Service_Oauth2;
use CodeIgniter\Controller;
use CodeIgniter\Session\Session;
use App\Models\Registerusers_model;

class GoogleAuth extends Controller
{
    public function login()
    {
        $client = new Google_Client();
        $client->setClientId(config('Google')->clientId);
        $client->setClientSecret(config('Google')->clientSecret);
        $client->setRedirectUri(config('Google')->redirectUri);
        $client->addScope('email');
        $client->addScope('profile');

        $authUrl = $client->createAuthUrl();
        return redirect()->to($authUrl);
    }

    public function callback()
    {
        $client = new Google_Client();
        $client->setClientId(config('Google')->clientId);
        $client->setClientSecret(config('Google')->clientSecret);
        $client->setRedirectUri(config('Google')->redirectUri);
        $client->addScope('email');
        $client->addScope('profile');
    
        $code = $this->request->getGet('code');
    
        if (!$code) {
            return redirect()->to('/loginsignup')->with('error', 'Authentication failed: No authorization code received.');
        }
    
        try {
            $accessToken = $client->fetchAccessTokenWithAuthCode($code);
        } catch (Exception $e) {
            return redirect()->to('/loginsignup')->with('error', 'Authentication failed: ' . $e->getMessage());
        }
    
        if (isset($accessToken['error'])) {
            return redirect()->to('/loginsignup')->with('error', 'Authentication failed: ' . $accessToken['error']);
        }
    
        $client->setAccessToken($accessToken['access_token']);
    
        // Get user info
        $oauth = new Google_Service_Oauth2($client);
        $userInfo = $oauth->userinfo->get();
    
        $session = \Config\Services::session();
    
        $userModel = new Registerusers_model();
        $user = $userModel->where('email', $userInfo->email)->first();
    
        if (!$user) {
            // Create a new user
            $userModel->save([
                'email' => $userInfo->email,
                'name' => $userInfo->name ?? 'Unknown',
                'picture' => $userInfo->picture ?? '',
                'google_id' => $userInfo->id,
                'gender' => $userInfo->gender ?? 'unknown',
                'location' => $userInfo->locale ?? 'unknown',
                'account_type' => 'customer',
            ]);
    
            // Set session flag indicating account was created
            $session->set('isNewAccount', true);
        }
    
        $session->set([
            'isLoggedIn' => true,
            'user_id' => $userInfo->id,
            'email' => $userInfo->email,
            'name' => $userInfo->name,
            'picture' => $userInfo->picture,
        ]);
    
        return redirect()->to('/');
    }

}
