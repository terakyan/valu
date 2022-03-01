<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend.home');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function downloadPdf(Settings $settings)
    {
        $model = $settings->getEditableData("main_settings")->toArray();
        $path = storage_path("app" . DS ."public"  . DS ."documents" . DS . "pdf" . DS . $model['pdf']);
        return response()->download($path,'каталог.pdf');
    }
}
