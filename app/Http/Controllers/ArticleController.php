<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }
    public function search(Request $request)
    {

        // dd($request->search);
        $articles = Article::where('title', 'like', '%'.$request->search."%")->get();

        return view('articles.index', compact('articles'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {

        $path_image = '';
        if ($request->hasFile('image')) {
            $path_name = $request->file('image')->getClientOriginalName();
            $path_image = $request->file('image')->storeAs('public/images', $path_name);
        }

        $article = Article::create([
            'title' => $request->title,
            'image' =>  $path_image,
            'body' => $request->body,
            'slug' => str()->of($request->title)->slug('-'),
            'user_id' => auth()->user()->id
        ]);
        $article->categories()->attach($request->categories);
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
       
        return view('articles.show', compact('article'));
    }

  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        if ($article->user_id !== auth()->user()->id) {
            abort(403);
        }

        $categories = Category::all();

        return view('articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {

        $path_image = $article->image;
        if ($request->hasFile('image')) {
            $path_name = $request->file('image')->getClientOriginalName();
            $path_image = $request->file('image')->storeAs('public/images', $path_name);
        }

        $article->update([
            'title' => $request->title,
            'image' =>  $path_image,
            'body' => $request->body,
        ]);
        $article->categories()->detach();
        $article->categories()->attach($request->categories);

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->categories()->detach();
        $article->delete();
        return redirect()->route('articles.index');
    }
}