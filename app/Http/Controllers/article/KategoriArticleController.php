<?php

namespace App\Http\Controllers\article;

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

        return redirect()->back()->with('toast_success', 'successful additional to the Kategori');
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
    public function update(Request $request, Kategori_Article $kategori_Article, $id)
    {
        //
        $validasi = $request->validate([
            'kategori' => 'required'
        ]);

        $proses = Kategori_Article::where('id',$id)->update([
            'kategori' => $request->kategori
        ]);

        if($proses){
            return redirect()->back()->with('toast_success', 'update successful to the Kategori');
        }else{
            return redirect()->back()->with('toast_error', 'failed update to the Kategori');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori_Article  $kategori_Article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori_Article $kategori_Article, $id)
    {
        //
        $data = Kategori_Article::where('id', $id)->first();
        $proses = Kategori_Article::where('id', $id)->delete();

        if($proses){
            return redirect()->back()->with('toast_success', 'delete successful to the '.$data->kategori);
        }else{
            return redirect()->back()->with('toast_error', 'delete failed to the '.$data->kategori);

        }
    }
}
