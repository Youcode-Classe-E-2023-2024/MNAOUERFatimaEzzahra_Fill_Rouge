<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
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

    public function store(StoreArticleRequest $request)
    {
//        $picture = $request->file('picture');
////getClientOriginalExtension() génère un nom de fichier aléatoire pour éviter les conflits de noms de fichiers pour que le nom de fichier soit unique
//        $filename = Str::random(20) . '.' . $picture->getClientOriginalExtension();
//        $path = $picture->storeAs('images', $filename, 'public');
////storeAs() pour déplacer le fichier vers le répertoire 'public/storage/images'
////en utilisant le nom de fichier généré précédemment et "Public" spécifie le lecteur de stockage à utiliser

        $article = Article::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'categories_id' => $request['category'],
            'created_by' => 1,
            'picture' => '/storage/' // . $path,
        ]);

        $article->tags()->sync($request['tags']);

        return to_route('home', $article->id);
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
        $article = Article::with(['user', 'category', 'comments'])->find($id);

        return view('articleDetail', ['article' => $article]);
    }

    public function favoris()
    {

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
        $validated = $request->validated();

        $id = $request->get('id');
        $article = Article::find($id);

        $article->update($validated);
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
}
