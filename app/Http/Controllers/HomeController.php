<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Models\Branding;
use App\Helper\ResponseHelper;

class HomeController extends Controller
{
    public function HomePage(){
        return view('pages.front-end-page.home.home-page');
    }
    public function HomeList():JsonResponse
    {
        $data= Branding::all();
        return  ResponseHelper::Out('success',$data,200);
    }
}
