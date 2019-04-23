<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends AdminController
{
    public function __construct()
    {
        $this->template = 'admin.index';
    }

    public function index()
    {
        $categories = Category::all();

        $this->content = view('admin.categories.index',compact('categories'))->render();
        return $this->renderOutput();
    }

    public function create()
    {
        $this->content = view('admin.categories.create')->render();
        return $this->renderOutput();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'	=>	'required' //обязательно
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        $this->content = view('admin.categories.edit',compact('category'))->render();
        return $this->renderOutput();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'	=>	'required'
        ]);

        Category::find($id)->update($request->all());

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();

        return redirect()->route('categories.index');
    }
}
