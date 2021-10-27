<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Backend\Permissions;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            Permissions::sidebar();
            return $next($request);
        });
    }

    public function uploadImage(Request $request){

        // dd($request->all());
        if ($_FILES['file']['name']) {
            if (!$_FILES['file']['error']) {
              $name = md5(rand(100, 200));
              $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
              $filename = $name.
              '.'.$ext;
              $destination = '/assets/images/'.$filename; //change this directory
              $location = $_FILES["file"]["tmp_name"];
              move_uploaded_file($location, $destination);
              echo 'http://test.yourdomain.al/images/'.$filename; //change this URL
            } else {
              echo $message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['file']['error'];
            }
          }
        return '3.bp.blogspot.com/-CzMYrETakh4/WCNId2m_18I/AAAAAAAAJRg/1sFU-2y4754WW4yYMQWO_K_w-pC9dpMfwCLcB/s1600/Noto-Google-Universal-Font-1.jpg';
    }
}
