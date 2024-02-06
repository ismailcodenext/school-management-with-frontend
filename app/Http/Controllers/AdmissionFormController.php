<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdmissionFormController extends Controller
{
    public function AdmissionFormPage(){
        return view('pages.front-end-page.home.admission-form-page');
    }


}
