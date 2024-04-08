// app/Services/FacebookService.php

namespace App\Services;

use Facebook\Facebook;

class FacebookService
{
    protected $fb;

    public function __construct()
    {
        $this->fb = new Facebook([
            'app_id' => env('FACEBOOK_APP_ID'),
            'app_secret' => env('FACEBOOK_APP_SECRET'),
            'default_graph_version' => env('FACEBOOK_DEFAULT_GRAPH_VERSION'),
        ]);
    }

    public function getUserProfile($accessToken)
    {
        $response = $this->fb->get('/me?fields=id,name,email', $accessToken);
        return $response->getGraphUser();
    }

    // Add more methods as needed for posting, etc.
}
