<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function getAll(){
        $paginas=Page::all();
        return view('admin.page.p-all',compact('pagina'));
    }
}
