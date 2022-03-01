<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Product;
use App\Services\ImgService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DatatableController extends Controller
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
    public function getAllProducts()
    {
        return Datatables::of(Product::query())
            ->editColumn('image', function ($product) {
                return "<img src='".ImgService::renderImg('products',$product->image)."' class='img img-responsive' style='width:150px;'>";
            })->editColumn('status', function ($product) {
                return ($product->status) ? '<span class="badge btn-success">Published</span>' : '<span class="badge btn-danger">Draft</span>';
            })
            ->editColumn('created_at', function ($product) {
                return BBgetDateFormat($product->created_at);
            })->editColumn('category', function ($product) {
                return ($product->category =='1') ? '<span class="badge btn-success">Dogs</span>' : '<span class="badge btn-success">Cats</span>';
            })
            ->addColumn('actions', function ($product) {
                return "<div class='datatable-td__action'>"
                    . "<a class='btn btn-warning' href='" . route("admin.products.edit", $product->id) . "'>Edit</a>"
                    ."<a class='btn btn-danger delete-button' data-key='" . $product->id . "' data-href='" . route("admin.products.delete.post") . "'>x</a>"
                    . '</div>';
            })->rawColumns(['actions', 'created_at', 'status','image','category'])
            ->make(true);
    }
}
