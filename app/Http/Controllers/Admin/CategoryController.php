<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function list()
    {
        $categories = Category::query()->where('category_id', null)->get();
        return $categories;
    }

    /**
     * Display a listing of the Categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new Category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in Category.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {

        Category::query()->create([
            "name" => $request->get("category_name"),
            "description" => $request->get("description"),
            "category_id" => $request->get("category_id"),
            "slug" => Str::random(6),
        ]);




        return redirect()->back()->with('success_create_category', 'دسته بندی با موفقیت ثبت شد.');
    }

    private function validateForm(Request $request)
    {

    }

    /**
     * Show the form for editing the specified Category.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::all();
//        dd("edit is category :" , $category ,$categories);
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in Category.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {

        $category->update([
            'name' => $request->get('category_name'),
            'description' => $request->get('description'),
            'category_id' => $request->get('category_id'),
        ]);

        return redirect()->route('admin.categories.index')->with('success_create_category', 'دسته بندی با موفقیت ثبت شد.');

    }

    /**
     * Remove the specified resource from Category.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('success', "حذف با موفقیت انجام شد");
    }

    public function create_sub_category(Category $category)
    {
        return view('admin.categories.subCategories.create', compact('category'));
    }
}
