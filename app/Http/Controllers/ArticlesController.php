<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        if (request('tag')){
            $article = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {
            $article = Article::latest()->get();
        }
        
        return view('articles.index', ['article' => $article]);

    }

    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    public function create()
    {
        //shows a view to create a new resource
        return view('articles.create', [
            'tags' => Tag::all()
        ]);
    }

    public function store()
    {
        $this->validateArticle();
        //validation and creation of new article
        $article = new Article(request(['title', 'excerpt', 'body']));
        $article->user_id = 1; // auth()->id()
        $article->save();

        $article->tags()->attach(request('tags'));

        return redirect('/articles');
    }

    public function edit(Article $article)
    {

        //show a view to edit an existing resource
        //find the article associated with the id
        return view('articles.edit', ['article' => $article]);
    }

    public function update(Article $article)
    {
        //validate, update and persist the article
        $article->update($this->validateArticle());

        return redirect($article->path());
    }

    public function destroy()
    {
        //delete a resource
    }

    protected function validateArticle()  
    { 
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);
    }
}
