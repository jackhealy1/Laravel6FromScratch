<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        //render a list
        $article = Article::latest()->get();

        return view('articles.index', ['article' => $article]);
    }
    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    public function create()
    {
        //shows a view to create a new resource
        return view('articles.create');
    }

    public function store()
    {
        //validation and creation of new article
        Article::create($this->validateArticle());

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
            'body' => 'required'
        ]);
    }
}
