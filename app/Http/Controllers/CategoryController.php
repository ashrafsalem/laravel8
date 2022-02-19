<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function allCategory(){
        
        $cats = DB::table('categories')
        ->join('users', 'categories.user_id', 'users.id')
        ->select('categories.*', 'users.name')
        ->latest()->paginate(3);
        
        //$cats = Category::latest()->paginate(3);
        // $cats = DB::table('categories')->latest()->get();
        return view('admin.category.index', [
            'cats' => $cats
        ]);
    }

    public function addCategory(Request $request){
        $validate_form = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],
        [
            'category_name.required'=>'Please Enter Category Name',
        ]);

        // insert by eloquent orm way
        // Category::insert([
        //     'category_name' => $request->category_name,
        //     'user_id'       => Auth::user()->id,
        //     'created_at'    => Carbon::now(),
        //     'updated_at'    => Carbon::now()
        // ]);

            // $category = new Category();
            // $category->category_name = $request->category_name;
            // $category->user_id = Auth::user()->id;
            // $category->save();
        
        // insert by query builder
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['user_id'] = Auth::user()->id;
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();
        DB::table('categories')->insert($data);

        return Redirect()->back()->with('success', 'Category Added Successfully');
    }
}
