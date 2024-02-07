<?php

namespace App\Http\Controllers;

use App\Models\Topbar;
use Illuminate\Http\JsonResponse;
use App\Models\Branding;
use App\Helper\ResponseHelper;

class HomeController extends Controller
{
    public function HomePage(){
        return view('pages.front-end-page.home.home-page');
    }
    public function TopbarList():JsonResponse
    {
        $data= Topbar::all();
        return  ResponseHelper::Out('success',$data,200);
    }
}
