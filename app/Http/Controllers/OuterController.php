<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;

class OuterController extends Controller
{
    public function index()
    {
        $articles = Articles::get();
        return view('welcome' , [
            'nama' => 'Selamat Datang !!!',
            'data' => $articles,
        ]);
    }

    public function article_detail($id)
    {
        return view('article' , [
            'title' => 'Artikel ' . $id,
            'article' => Articles::find($id),
        ]);
    }
}
