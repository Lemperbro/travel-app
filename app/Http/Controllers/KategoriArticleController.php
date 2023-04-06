<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKategori_ArticleRequest;
use App\Http\Requests\UpdateKategori_ArticleRequest;
use App\Models\Kategori_Article;

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
    public function store(StoreKategori_ArticleRequest $request)
    {
        //
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
