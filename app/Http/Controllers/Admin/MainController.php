<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class MainController extends AdminController
{
    public function __construct()
    {
        $this->template = 'admin.index';
    }

    public function index()
    {
        $this->content = view('admin.dashboard')->render();
        return $this->renderOutput();
    }
}
