<?php

namespace App\Http\Traits;
use App\Models\Article;
use DB;

trait ArticleTrait{

    public function trend($take){

        $models = Article::where('status', 1)->join('article_comments','article_comments.article_id', '=', 'articles.id')
            ->groupBy(['articles.id','articles.name'])->orderBy(DB::raw("count(article_comments.id)") ,'DESC')
            ->take($take)->get(['articles.id',DB::raw('count(article_comments.id) as comments')]);

        $ids = [];

        foreach ($models as $model){
            $ids[] = $model->id;
        }

        $articles = Article::where('status', 1)->whereIn('id',$ids)->paginate(5);

        return $articles;
    }



}
