<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PictureStoreRequest;
use App\Models\Picture;
use App\Models\Product;
use http\Exception\BadConversionException;
use Illuminate\Http\Request;

class PictureProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PictureStoreRequest $request, Product $product)
    {
        try {
            if ($product->pictures()->count()<4){
                if ($request->hasFile('files')) {
                    foreach ($request->file('files') as $file) {

                        $filenameNew = uniqid() . '.' . explode('.', $file->getClientOriginalName())[1];
                        $path = $file->storeAs('/public/product/' . $product->id . '/' . 'image', $filenameNew);
                        $product->pictures()->create([
                            'path' => $path
                        ]);

                    }
                }


                return redirect()->back()->with('success', 'تصاویر با موفقیت آپلود شدند');
            }else {
                return redirect()->back()->withError('تعداد تصاویر آپلود شده  بیشتر از 4 تصویر می باشد.');
            }


        } catch (\Exception $exception) {

        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.pictures.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Picture $picture)
    {
        $picture->delete();
        return back()->with('success','تصویر با موفقیت حذف شد.');
        //
    }
}
