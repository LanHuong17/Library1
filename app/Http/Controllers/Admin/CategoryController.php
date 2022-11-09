<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $validatedData = $request->validated();

        $category = new Category;
        $category->category_id = $validatedData['category_id'];
        $category->name = $validatedData['name'];
        $category->description = $validatedData['description'];
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/category', $filename);
            
            $category->image = $filename;
        }
        
        /* $category->status = $validatedData['status']; */
        $category->save();

        return redirect('admin/category')->with('message', 'Category add successfully!');
    }
}
