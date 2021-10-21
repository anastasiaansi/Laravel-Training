<?php

namespace App\Services;

use App\Models\News;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Database\Eloquent\Collection;

class NewsService
{

    public function queryShowNews(int $id)
    {
        $query =QueryBuilder::for(News::class)
            ->with(['author','category'])
            ->where('id', '=', $id)->firstOrFail();
        return $query;
    }

    public function queryCategoryNews(int $id)
    {
        $query = QueryBuilder::for(News::class)->with(['author','category'])
            ->where('category_id', '=', $id);
        return $query->get();
    }

}
