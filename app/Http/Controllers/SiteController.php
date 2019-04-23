<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    protected $template;

    protected $content = FALSE;

    protected $vars;

    public function __construct()
    {

    }

    public function renderOutput()
    {
        $sidebar = view('front.sidebar')->render();
        $this->vars = array_add($this->vars, 'sidebar',$sidebar);

        if($this->content) {
            $this->vars = array_add($this->vars,'content',$this->content);
        }

        return view($this->template)->with($this->vars);
    }
}
