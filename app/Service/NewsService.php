<?php

namespace App\Services;

use App\Models\News;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Database\Eloquent\Collection;

class NewsService
{

    public function queryShowNews(int $id): News
    {
        return QueryBuilder::for(News::class)
            ->where('id', '=', $id)->firstOrFail();
    }

    public function queryCategoryNews(int $id)
    {
        $query = QueryBuilder::for(News::class)
            ->where('category_id', '=', $id);
        return $query->get();
    }

}
