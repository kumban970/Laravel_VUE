<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = \App\Article::paginate(2);

        return $articles->toJson();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
          'title' => 'required',
          'content' => 'required',
          'agent' => 'required',
          'lokasi' => 'required',
          'report_date' => 'required',
        ]);

        $article = new Article();
        $article->title = $validatedData['title'];
        $article->content = $validatedData['content'];
        $article->agent = $validatedData['agent'];
        $article->lokasi = $validatedData['lokasi'];
        $article->report_date = $validatedData['report_date'];
        $article->save();

        $msg = [
            'success' => true,
            'message' => 'Article created successfully!'
        ];

        return response()->json($msg);
    }

    public function getArticle($id) // for edit and show
    {
        $article = \App\Article::find($id);

        return $article->toJson();
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
         'title' => 'required',
          'content' => 'required',
          'agent' => 'required',
          'lokasi' => 'required',
          'report_date' => 'required',
        ]);

        $article = \App\Article::find($id);
        $article->title = $validatedData['title'];
        $article->content = $validatedData['content'];
        $article->agent = $validatedData['agent'];
        $article->lokasi = $validatedData['lokasi'];
        $article->report_date = $validatedData['report_date'];
        $article->save();

        $msg = [
            'success' => true,
            'message' => 'Article updated successfully'
        ];

        return response()->json($msg);
    }

    public function delete($id)
    {
        $article = \App\Article::find($id);
        if(!empty($article)){
            $article->delete();
            $msg = [
                'success' => true,
                'message' => 'Article deleted successfully!'
            ];
            return response()->json($msg);
        } else {
            $msg = [
                'success' => false,
                'message' => 'Article deleted failed!'
            ];
            return response()->json($msg);
        }
    }
}
