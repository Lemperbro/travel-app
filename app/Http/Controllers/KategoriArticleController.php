<?php

namespace App\Http\Controllers;

use App\Models\Kategori_Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreKategori_ArticleRequest;
use App\Http\Requests\UpdateKategori_ArticleRequest;
use Illuminate\Support\Facades\Redirect;

class KategoriArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.article.kategori', [
            'tittle' => 'kategori',
            'data' => Kategori_Article::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKategori_ArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validasi = $request->validate([
            'kategori' => 'required|unique:kategori__articles,kategori'
        ]);
        Kategori_Article::create([
            'kategori' => $validasi['kategori']
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori_Article  $kategori_Article
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori_Article $kategori_Article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori_Article  $kategori_Article
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori_Article $kategori_Article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKategori_ArticleRequest  $request
     * @param  \App\Models\Kategori_Article  $kategori_Article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKategori_ArticleRequest $request, Kategori_Article $kategori_Article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori_Article  $kategori_Article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori_Article $kategori_Article)
    {
        //
    }
}
