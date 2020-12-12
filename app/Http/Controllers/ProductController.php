<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use DataTables;
use App\Repository\Eloquent;
use App\Repository\Eloquent\ProductRepository;
use App\Repository\ProductRepoInterface;

class ProductController extends Controller
{
    protected $product;

    public function __construct(ProductRepoInterface $product)
    {
        // set the product
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = $this->product->with('category');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('description', function ($row) {
                    return $row->description;
                })
                ->addColumn('category',function($row){
                    return $row->category->name;
                })
                ->addColumn('action', function ($row) {

                    $btn = '<a href="product/' . $row->id . '/edit" data-id="' . $row->id . '"  class="edit-product edit btn btn-info btn-sm">Edit</a>
                         <a href="javascript:void(0)" data-id="' . $row->id . '" class="delete-product edit btn btn-danger btn-sm">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['description', 'action'])
                ->escapeColumns(['description'])
                ->make(true);
        }
        return view('products.browse');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.add-edit', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = $this->product->create($request->all());

        if ($res) {
            return redirect()->route('product.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.add-edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $update = $this->product->update($request->all(), $product->id);
        if ($update) {
            return redirect()->route('product.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $delete = $this->product->delete($product->id);
        if ($delete) {
            return redirect()->back();
        }
    }
}
