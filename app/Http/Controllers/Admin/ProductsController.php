<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\ImgService;
use Illuminate\Http\Request;

class ProductsController extends Controller
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
        return view('admin.products.index');
    }

    public function getNew()
    {
        $model = null;
        return view('admin.products.new',compact('model'));
    }

    public function postNew(ProductRequest $request,ImgService $imgService)
    {
        $data = $request->except('_token','image');
        $product = Product::updateOrCreate($request->id, $data);
        if ($request->hasFile('image')) {
            $imgService->uplaod($request->file('image'), $product, 'image', 'products');
        }

        return redirect()->route('admin.products');
    }

    public function postDelete(Request $request,ImgService $imgService)
    {
        $id = $request->get('slug');
        $product = Product::findOrFail($id);
        $imgService->delete(storage_path("app" . DS ."public" . DS . "images" . DS . "products" . DS . $product->image));
        $product->delete();

        return response()->json(['url' => route('admin.products')]);
    }

    public function getEdit ($id)
    {
        $model = Product::findOrFail($id);

        return view('admin.products.new',compact('model'));
    }
}
