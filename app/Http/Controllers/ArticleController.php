<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Wisata;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Kategori_Article;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\UpdateArticleRequest;



class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Article::latest();

        if(request('search')){
            $data->where('judul', 'like', '%' . request('search') . '%')->orWhere('isi', 'like', '%' . request('search') . '%');
        }
        return view('admin.article.index', [
            'tittle' => 'article',
            'data' => $data->paginate(12)
        ]);
    }

    public function index_client(){

        $data = Article::latest();
        if(request('search')){
            $data->where('judul', 'like', '%' . request('search') . '%')->orWhere('isi', 'like', '%' . request('search') . '%');
        }

        if(request('kategori')){
            $data->where('kategori', 'like', '%' . request('kategori') . '%');
        }
        return view('article.index', [
            'data' => $data->paginate(12),
            'kategori' => Kategori_Article::get()

        ]);
    }

    public function show_client($slug){

        $data = Article::where('slug', $slug)->first();
        $id = [$data->id];
        $teks = $data->judul . ' '.  $data->isi;
        $data_search = explode(' ', $teks);
        $wisata = Wisata::latest();
        $article = Article::latest()->whereNotIn('id', $id);

        foreach($data_search as $search){
            $kota = Kota::where('nama_kota', 'like', '%' . $search . '%')->first();

            if($kota !== null){
                $kota_id = $kota->id;
            }else{
                $kota_id = 0;
            }
             $wisata->where('status', true)->where('nama_wisata', 'like', '%' . $search . '%')->orWhere('location', 'like', '%' . $search . '%')->orWhere('deskripsi', 'like', '%' . $search . '%')->orWhere('kota_id', 'like', '%' . $kota_id . '%');

        }
        if($wisata->count() === 0){
            $wisata = Wisata::latest();
        }
        
        return view('article.show', [
            'data' => $data,
            'wisata' => $wisata->where('status', true)->paginate(4),
            'article' => $article->paginate(4)
        ]);
        
    }

    public function upload_image_tiny(Request $request){
        $fileName=$request->file('file')->getClientOriginalName();
        $path=$request->file('file')->storeAs('uploads', $fileName, 'public');
        return response()->json(['location'=>"/storage/$path"]); 
        
        /*$imgpath = request()->file('file')->store('uploads', 'public'); 
        return response()->json(['location' => "/storage/$imgpath"]);*/
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.article.add', [
            'tittle' => 'article',
            'kategori' => Kategori_Article::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        if($files=$request->file('image')){
            $extension=$files->getClientOriginalExtension();
            $name = hash('sha256', time()) . '.' . $extension;
            $files->move('image',$name);
    }
        $up = Article::create([
            'judul' => $request->judul,
            'image' => $name,
            'kategori' => $request->kategori,
            'isi' => $request->isi
        ]);

        if($up){
        return redirect('/admin/article')->with('success', 'berhasil upload');
        }else{
        return redirect('/admin/article')->with('error', 'gagal uplaod');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //
        return view('admin.article.edit', [
            'data' => Article::where('slug', $slug)->first(),
            'kategori' => Kategori_Article::get(),
            'tittle' => 'article'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article, $slug)
    {
        //

        $validasi = $request->validate([
            'judul' => 'required',
            'image' => 'max:2048',
            'kategori' => 'required',
            'isi' => 'required'
        ]);

        $image = Article::where('slug', $slug)->pluck('image')->first();

        if($files=$request->file('image')){
            $extension=$files->getClientOriginalExtension();
            $img = hash('sha256', time()) .'.' . $extension;
            $move = $files->move('image',$img);

            if($move){
                $storage = public_path('image/'.$image);
                if(File::exists($storage)){
                    unlink($storage);
                }
            }
        }else{
            $img = $image;
        }
  
        $up = Article::where('slug', $slug)->update([
            'judul' => $validasi['judul'],
            'kategori' => $validasi['kategori'],
            'image' => $img,
            'isi' => $validasi['isi']
        ]);

        if($up){
            return redirect('/admin/article')->with('success', 'berhasil mengupdate');
        }else{
            return redirect('/admin/article')->with('error', 'gagal mengupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article, $slug)
    {
        //

        $img = Article::where('slug', $slug)->pluck('image')->first();

        $proses = Article::where('slug', $slug)->delete();

        if($proses){
            $storage = public_path('image/'.$img);

            if(File::exists($storage)){
                unlink($storage);

                return redirect('/admin/article')->with('success', 'berhasil menghapus');
            }
        }

        return redirect('/admin/article')->with('warning', 'gagal menghapus');
    }
}
