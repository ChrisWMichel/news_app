<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;
use carbon\Carbon;

class ArticleController extends Controller
{

    public function index()
    {
        return view('admin.articles');
    }


    public function addArticle(Request $request)
    {
        $tags = Article::getMetaData($request->url);

        $article = Article::create([
          'category_id' => $request->category_id,
            'image_url' => $tags['image'],
            'title' => strip_tags($tags['title']) ,
            'author' => $tags['author'],
            'description' => strip_tags($tags['description']) ,
            'url' => $tags['url'],
            'site' => $tags['site'],
            'active' => 1
        ]);

        $tags['article_id'] = $article->id; /**/

        return response()->json(['article' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addComment(Request $request, $id)
    {
        $article = Article::find($id);

        $article->admin_comment = $request->comment;
        $article->save();

    }


    public function manageArticles()
    {
        return view('admin.manage_articles');
    }


    public function getActiveArticles()
    {
        //$articles = Article::where('active', 1)->get();
        $articles = Article::orderBy('created_at', 'desc')->where('active', 1)->get();

        return response()->json(['articles' => $articles]);
    }


    public function updateArticle(Request $request, $id)
    {
        $article = Article::find($id);

        $article->update([
          'admin_comment' => $request->admin_comment,
            'image_url' => $request->image_url,
            'title' => $request->title,
            'site' => $request->site,
            'description' => $request->description
        ]);
        $article->save();

        return response()->json(['article' => $article]);
    }

    public function updateActive($id){
        $article = Article::find($id);
        $date = new \DateTime();

        if($article->active){
            $article->active = 0;
            $article->inactive_date = $date->format('m-d-y H:i:s');
        }else{
            $article->active = 1;
        }
        $article->save();

        return response()->json(['article' => $article]);
    }

    public function getArchives(){
        $archives = Article::orderBy('created_at', 'desc')->where('active', 0)->get();

        return response()->json(['archive' => $archives]);
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $cat_id = $article->category_id;
        $article->delete();

        return response()->json(['cat_id' => $cat_id]);
    }
}
