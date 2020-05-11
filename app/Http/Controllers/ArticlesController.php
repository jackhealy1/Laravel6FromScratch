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
        //validation
        request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        //persist the new resource
        $article = new Article();
        //clean up
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

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
        //validation
        request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        //persist the edited resource

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->save();

        return redirect('/articles/' . $article->id);
    }
    public function destroy()
    {
        //delete a resource
    }

}
