<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function categories()
    {
        $data = Category::where('user_id', auth()->user()->id)->get();

        $totalCategories = Category::where('user_id', auth()->user()->id)->count();
        $activeCategories = Category::where(['status' => 1, 'user_id' => auth()->user()->id])->count();
        $inactiveCategories = Category::where(['status' => 0, 'user_id' => auth()->user()->id])->count();

        return view('categories', compact(
            'data',
            'totalCategories',
            'activeCategories',
            'inactiveCategories'
        ));
    }

    public function store(Request $request)
    {
        Category::create([
            'category_name' => $request->category_name,
            'category_type' => $request->category_type,
            'status' => $request->status,
            'user_id' => auth()->user()->id,
        ]);

        return redirect('categories')
            ->with('success', 'Category Added Successfully');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        $data = Category::get();

        $totalCategories = Category::count();
        $activeCategories = Category::where('status', 1)->count();
        $inactiveCategories = Category::where('status', 0)->count();

        return view('categories', compact(
            'category',
            'data',
            'totalCategories',
            'activeCategories',
            'inactiveCategories'
        ));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->update([
            'category_name' => $request->category_name,
            'category_type' => $request->category_type,
            'status' => $request->status,
        ]);

        return redirect('categories')
            ->with('success', 'Category Updated Successfully');
    }
}
