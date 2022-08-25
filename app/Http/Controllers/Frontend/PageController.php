<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('frontend.pages.about');
    }
    public function missionVision()
    {
        return view('frontend.pages.missionVision');
    }
    public function ventureEducation()
    {
        return view('frontend.pages.ventureEducation');
    }
}
