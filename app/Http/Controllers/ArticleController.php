<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate(10);
        return view('pages.articles',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create-article');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'title'=>'required|min:10',
            'category'=>'required',
            'description'=>'required|min:10',
            'thumbnail'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            ]);
        $thumbnail_name = 'img_'.time() .'.'.$request->thumbnail->extension();
        $request->thumbnail->move(public_path('images'),$thumbnail_name);
        Article::create([
            'title'=>$request->title,
            'category'=>$request->category,
            'description'=>$request->description,
            'thumbnail'=>$thumbnail_name,
            'author_id'=>Auth::id(),
        ]);
        return redirect('article');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $post = Article::find($article->id);
        return view('pages.article',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $article = Article::find($article->id);
        return view('pages.edit-article',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        Article::find($article->id)->delete();
        return redirect('article');
    }
}
