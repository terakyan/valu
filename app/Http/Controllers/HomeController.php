<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Settings;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $settings;

    public function __construct(Settings $settings)
    {
        $this->settings = $settings;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $settings = $this->settings->getEditableData("main_settings")->toArray();
        $dogs = Product::where('status',true)->where('category',1)->get();
        $cats = Product::where('status',true)->where('category',2)->get();
        return view('frontend.home',compact(['settings','dogs','cats']));
    }

    public function about()
    {
        $model = $this->settings->getEditableData("about")->toArray();

        return view('frontend.about',compact('model'));
    }

    public function contact()
    {
        $model = $this->settings->getEditableData("main_settings")->toArray();

        return view('frontend.contact',compact('model'));
    }

    public function downloadPdf()
    {
        $model = $this->settings->getEditableData("main_settings")->toArray();
        if(!isset($model['pdf'])) return redirect()->back();
        $path = storage_path("app" . DS ."public"  . DS ."documents" . DS . "pdf" . DS . $model['pdf']);
        return response()->download($path,'каталог.pdf');
    }
}
