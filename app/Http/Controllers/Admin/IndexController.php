<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Services\ImgService;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.index');
    }

    public function settings(Settings $settings)
    {
        $model = $settings->getEditableData("main_settings")->toArray();

        return view('admin.settings',compact('model'));
    }

    public function postSettingSave(Request $request,Settings $settings,ImgService $imgService)
    {
        $data = $request->except('_token', 'pdf');
        $model = $settings->getEditableData("main_settings")->toArray();

        if ($request->hasFile('pdf')) {
            if(isset($model['pdf'])){
                $imgService->delete(storage_path("app" . DS ."public"  . DS ."documents" . DS . "pdf" . DS . $model['pdf']));
            }

            $filename = $imgService->uploadFileToStorage($request->file('pdf'), 'pdf', 'documents');
            $data['pdf'] = $filename;
        }
        $settings->updateOrCreateSettings("main_settings", $data);

        return redirect()->back();
    }

    public function downloadPdf(Settings $settings)
    {
        $model = $settings->getEditableData("main_settings")->toArray();
        $path = storage_path("app" . DS ."public"  . DS ."documents" . DS . "pdf" . DS . $model['pdf']);
        return response()->download($path,'каталог.pdf');
    }
}
