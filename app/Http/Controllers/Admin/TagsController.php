<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends AdminController
{
    public function __construct()
    {
        $this->template = 'admin.index';
    }

    public function index()
    {
        $tags = Tag::all();

        $this->content = view('admin.tag.index',compact('tags'))->render();
        return $this->renderOutput();
    }

    public function create()
    {
        $this->content = view('admin.tag.create')->render();
        return $this->renderOutput();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' =>  'required'
        ]);

        Tag::create($request->all());

        return redirect()->route('tags.index');
    }

    public function edit($id)
    {

        $tag = Tag::find($id);

        $this->content = view('admin.tag.edit',compact('tag'))->render();
        return $this->renderOutput();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' =>  'required'
        ]);

        Tag::find($id)->update($request->all());

        return redirect()->route('tags.index');
    }

    public function destroy($id)
    {
        Tag::find($id)->delete();
        return redirect()->route('tags.index');
    }
}
