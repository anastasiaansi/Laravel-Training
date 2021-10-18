<?php

namespace App\Repositories\News;

use  App\Repositories\NewsRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class NewsRepository implements NewsRepositoryInterface
{
    /** @var Model */
    protected $news;

    /**
     * RewardRepository constructor.
     */
    public function __construct(Model $news)
    {
        $this->news = $news;
    }

    public function find($id): ?Model
    {
       return $this->news->find($id);
    }
}
