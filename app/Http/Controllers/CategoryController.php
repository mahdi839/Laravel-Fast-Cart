<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $deleted_categories =  Category::onlyTrashed()->get();
       $categories =  Category::all();
       return view('backend.category.index',compact('categories', 'deleted_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name',
            'category_details' => 'required',
            'category_icon' => 'required|file|mimes:png,jpg,jpeg'

        ]);
        // slug generation start

      $slug = Str::slug($request->category_name);

        // slug generation end

        // photo upload start
         $generated_category_icon_name = date('Y_m_d')."".time().Str::random(5).'.'.$request->file('category_icon')->getClientOriginalExtension();

        Image::make($request->file('category_icon'))->resize(200, 200)->save(base_path('public/uploads/category_icons/'.$generated_category_icon_name));
            // photo upload end

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => $slug,
            'category_details' => $request->category_details,
            'category_icon' => $generated_category_icon_name,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('success','New category added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {

       return view('backend.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('backend.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {

        $category->category_name = $request->category_name;
        $category->category_details = $request->category_details;
        $category->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {



        $category->delete();
        return back();
    }
    public function restore($id){
     Category::onlyTrashed()->where('id',$id)->restore();
     return back();
    }
     public function parmanent_delete($id){

       unlink(base_path('public/uploads/category_icons/'). Category::onlyTrashed()->where('id',$id)->first()->category_icon);
     Category::onlyTrashed()->where('id',$id)->forceDelete();
     return back();
    }
}
