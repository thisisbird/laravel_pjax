<?php

namespace App\Http\Controllers;

use Google_Client;
use Google_Service_Oauth2;
use Illuminate\Http\Request;
use App\Http\Controllers\Frontend\Controller;
use Illuminate\Support\Facades\Cookie;

class OAuthController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return 301
     */
    public function google()
    {
        Cookie::queue('pre_url', url()->previous(), 50000);//如果不適用上面的use Cookie,這裏可以直接調用 \Cookie
        // Session::put('current_url',request()->fullUrl());
        $client = new Google_Client();
        // 設定憑證 (前面下載的 json 檔)
        $client->setAuthConfig(base_path('google_key.json'));
        // 這邊要填寫接受 code 的 API (必須與憑證中設定的網址完全相同)
        // $client->setAccessType('offline'); // offline access
        // $client->setIncludeGrantedScopes(true); // incremental auth
        $client->setScopes(array('https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/userinfo.profile'));
        // 產生 URL 給使用者
        $url = $client->createAuthUrl();
        return redirect($url);
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function googleCallback(Request $req)
    {
        $client = new Google_Client();
        // 設定憑證 (前面下載的 json 檔)
        // $client->setScopes(array('https://www.googleapis.com/auth/userinfo.email','https://www.googleapis.com/auth/userinfo.profile'));
        $client->setAuthConfig(base_path('google_key.json'));
// 使用者登入後 redirect 過來附帶的 code
        $client->authenticate($_GET['code']);
// 使用 Service 去取得使用者資訊以及 email
        $service = new Google_Service_Oauth2($client);
        $user_info = $service->userinfo->get();

        $open_id = $user_info->id;
        $email = $user_info->email;
        $name = $user_info->name;
        $photo_picture = $user_info->picture;

        dd($open_id,
            $email,
            $name,
            $photo_picture,
            Cookie::get('pre_url'));//取得登入前的網址
    }
    public function fb()
    {
        return view('backend.fb');
    }
}
