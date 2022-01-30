<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Http\Requests\Admin\ProductStoreRequest;
use App\Http\Requests\Admin\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the products.
     *
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     */
    public function store(ProductStoreRequest $request)
    {
        $product = Product::query()->create([
            "name" => $request->get('name'),
            "price" => $request->get('price'),
            "stock" => $request->get('stock'),
            "description" => $request->get('description'),
            'category_id' => $request->get('category_id'),
            'slug' => Str::random(6),
        ]);

        $this->structure($request->get('category_id') , $product);




        if ($request->get('percent') !== 0) {
            $coupon = $product->coupons()->create([
                'code' => $product->slug,
                'percent' => $request->get('percent'),
                'is_active' => 1,
            ]);
        }


        return redirect()->back()->with('success', "محصول با موفقیت ثبت شد");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     */
    public function show(Product $product)
    {
        //
    }

    public function structure($category_id,$product)
    {
        $category = Category::query()->where('id',$category_id)->first();
        $category_item = [];
        while(!is_null($category->category_id)){
            $category_item[]=$category->id;

            $category = Category::query()->where('id',$category->category_id)->first();
        }
        $category_item[]=$category->id;



        $product->categories()->sync($category_item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product->update([
            "name" => $request->get('name', $product->name),
            "price" => $request->get('price', $product->price),
            "stock" => $request->get('stock', $product->stock),
            "description" => $request->get('description', $product->description),
            'category_id' => $request->get('category_id', $product->category_id),
        ]);

        $this->structure($request->get('category_id') , $product);


        if ($request->get('percent') !== 0 && $product->validCoupon()->count()<1) {

            $product->validCoupon()->Create([
                'percent' => $request->get('percent'),
                'is_active' => 1,
                'code' => $product->slug,
            ]);
        }else {
            $product->validCoupon()->update([
                'percent' => $request->get('percent'),
                'is_active' => 1
                ]);
        }


        return redirect()->back()->with('success', "محصول با موفقیت ثبت شد");

    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Product $product)
    {
        $product->delete();
        $product->validCoupon()->delete();

        return redirect()->back()->with('success', "محصول با موفقیت حذف شد");

    }
}
