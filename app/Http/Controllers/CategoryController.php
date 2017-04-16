<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCategory()
    {
        return view('admin.category.createCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCategory(Request $request)
    {
        $this->validate($request,[
            'categoryName' =>  'required',
            'categoryDescription' => 'required',
            'publicationStatus' => 'required',
        ]);
        $category = new Category();
        $category->categoryName=$request->categoryName;
        $category->categoryDescription=$request->categoryDescription;
        $category->publicationStatus=$request->publicationStatus;
        $category->save();
        return redirect('add-category')->with('message','Category Info Save Successfully');
       // return "Category Info Save Successfully";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCategory()
    {
        $categories=Category::all();
       return view('admin.category.manageCategory',['categories'=>$categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editCategory($id)
    {
        $category=Category::where('id',$id)->first();
        return view('admin.category.editCategory',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCategory(Request $request)
    {
       $category=Category::find($request->categoryId);
       $category->categoryName=$request->categoryName;
       $category->categoryDescription=$request->categoryDescription;
       $category->publicationStatus=$request->publicationStatus;
       $category->save();
       return redirect('/manage-category')->with('message','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCategory($id)
    {
       $category = Category::find($id);
       $category->delete();
       return redirect('/manage-category')->with('message','Deleted Successfully');
    }
}
