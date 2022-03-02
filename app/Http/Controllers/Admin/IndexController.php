<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\User;
use App\Rules\MatchOldPassword;
use App\Services\ImgService;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


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

    public function profile()
    {
        $model = Auth::user();
        return view('admin.profile',compact(['model']));
    }

    public function postProfile(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required','email'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        User::findOrFail(Auth::id())->update(['name' => $request->name,'email' => $request->email]);
        return redirect()->back()->with(['message' => __('Password change successfully.')]);
    }

    public function postChangePassword(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        User::findOrFail(Auth::id())->update(['password' => Hash::make($request->new_password)]);
        return redirect()->back()->with(['message' => __('Password change successfully.')]);
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
        }else{
            if(isset($model['pdf'])){
                $data['pdf'] = $model['pdf'];
            }
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

    public function about(Settings $settings)
    {
        $model = $settings->getEditableData("about")->toArray();

        return view('admin.about',compact('model'));
    }

    public function postAbout(Request $request,Settings $settings)
    {
        $data = $request->except('_token');
        $settings->updateOrCreateSettings("about", $data);

        return redirect()->back();
    }
}
