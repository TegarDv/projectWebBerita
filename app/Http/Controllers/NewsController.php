<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Kategori;
use Illuminate\Support\Facades\Gate;


class NewsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware(function($request, $next){
        //     if(Gate::allows('manage-users')) return $next($request);
        //     abort(403, 'Anda tidak memiliki cukup hak akses');
        // });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $news = News::all();
        return view('news.index',['news'=>$news]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('news.create',['kategori'=>$kategori]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //add data
        $news = new News;

        if($request->file('photo')){ $image_name = $request->file('photo')->store('images','public'); }

        $news->judul = $request->judul;

        $kategori = new Kategori;
        $kategori->id = $request->Kategori;

        $news->isi = $request->isi;
        $news->photo = $image_name;
        $news->kategori()->associate($kategori);
        $news->save();

        // if true, redirect to index
        return redirect()->route('news.index')
            ->with('success', 'Add data news success!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);
        return view('news.view',['news'=>$news]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = news::find($id);
        $kategori = Kategori::all();
        return view('news.edit',['news'=>$news, 'kategori'=>$kategori]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $news = News::find($id);
        $news->judul = $request->judul;

        if($news->photo && file_exists(storage_path('app/public/$news->photo'))){
            \Storage::delete('public/'.$news->photo);
        }
        $image_name = $request->file('photo')->store('images','public');
        $news->photo = $image_name;
        $kategori = new Kategori;
        $kategori->id = $request->Kategori;
        $news->kategori()->associate($kategori);
        
        $news->isi = $request->isi;
        $news->save();
        return redirect()->route('news.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyKategori($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect()->route('news.index');
    }
}
