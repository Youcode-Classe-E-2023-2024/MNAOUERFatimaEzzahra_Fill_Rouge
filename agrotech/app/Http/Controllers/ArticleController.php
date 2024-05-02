<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Articlefavoris;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function create()
    {
        $cats = Category::all();
        $tags = Tag::all();
        return view('createArticle', ['cats' => $cats, 'tags' => $tags]);
    }

//    article backoffice
    public function index()
    {
        $articles = Article::paginate(6);

        return view('Backoffice.article', ['articles' => $articles]);
    }

    public function addComment(Request $request)
    {
        $id = $request->get('id');
        $content = $request->get('content');
        $comment = Comment::create([
            'content' => $content,
            'article_id' => $id,
            'created_by' => Auth::id()
        ]);
        return   redirect(route('Detail.article', $id));
    }

    public function deleteComment($id)
    {
        $comment = Comment::findOrFail($id);
        $articleId = $comment->article_id;
//        dd($articleId);
        $comment -> delete();
        return   redirect(route('Detail.article', $articleId));
    }

    public function show(string $id)
    {
        $article = Article::with(['user', 'category', 'comments','tags'])->find($id);

        Article::where('id', $id)->increment('views');

        $tags = $article->tags;

        return view('articleDetail', ['article' => $article, 'tags' => $tags]);
    }

    public function favorite()
    {
        $articlefavoris = Articlefavoris::paginate(6);

//        dd(Articlefavoris::isFavoris(1, 3));

        return view('favorite',['articlefavoris' => $articlefavoris]);
    }

    public function articlefavoris(Request $request)
    {
        $id = $request->input('articleId');
//        dd($id);
        $articlefavoris = Articlefavoris::create([
            'created_by' => Auth::id(),
            'article_id' => $id
        ]);
        return   redirect()->back()->with('success');
    }

    public function store(StoreArticleRequest $request)
    {
//        dd($request['tags']);
        if ($request->has('picture')){
            $extension = $request->picture->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'storage/covers/';
        }

        $article = Article::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'categories_id' => $request['category'],
            'created_by' => 1,
            "picture" =>$request->picture->move($path, $filename),
        ]);

        $article->tags()->sync($request['tags']);

        return view('articleDetail', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::with('category')->find($id);
        $cats = Category::all();
        $tags = Tag::all();
        return view('profile.editArticle', ['cats' => $cats, 'article' => $article, 'tags'=>$tags]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request)
    {

        if ($request->has('picture')) {
            $extension = $request->picture->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'storage/covers/';
        }

        $request->validated();
        $id = $request->get('id');
        $article = Article::find($id);

        $article->update([
            "title" => $request->title,
            "description" => $request->description,
            "picture" =>$request->picture->move($path, $filename),
        ]);
        return view('articleDetail', ['article' => $article]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->get('id');
        $article = Article::find($id);
//        $article->status = 'rejected';
//        $article->save();
        $article -> delete();
        return to_route('home');
    }

    public function indexUser()
    {
        $articles = Article::with('category')->paginate(8);
        return view('articles', compact('articles'));

    }


    /**
     * Display a listing of the resource.
     */
    public function byCatName(string $keyWords)
    {
        $cats = Category::all();
        $category = Category::where('name', $keyWords)->first();

        $articles = $category->article()->paginate(4);

        return view('category', ['events' => $articles, 'cats' => $cats]);
    }

    /**
     * Display a listing of the resource.
     */
    public function byTitle(Request $request)
    {
        $keyWords = $request->get('search');
        $articles = Article::where('title', 'LIKE','%'.$keyWords.'%')->paginate(4);
        $cats = Category::all();

        return view('articles', ['articles' => $articles, 'cats' => $cats]);
    }


    public function filterArticles($id)
    {
        $articles = article::where('categories_id', $id)->paginate(4);
        $cats = Category::all();

        return view('articles', compact('articles', 'cats'));
    }


}
