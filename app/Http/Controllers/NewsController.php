<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\News\NewsRepository;
use App\Models\News;
use App\Services\NewsService;

class NewsController extends Controller
{
    protected NewsService $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    public function index(): string
    {
        $news = News::all();
        $categories =Category::all();
        return view('news.index', [
            'newsList' => $news,
            'categories' => $categories
        ]);
    }

    public function show($id): string
    {
        $news = $this->newsService->queryShowNews($id) ?? null;
        if (!empty($news)) {
            return view('news.show', [
                'news' => $news
            ]);
        }
        return abort(404);
    }
    public function category($id): string
    {
        $news = $this->newsService->queryCategoryNews($id) ?? null;
        if (!empty($news)) {
            return view('news.category', [
                'news' => $news
            ]);
        }
        return abort(404);
    }
    /*
        private function getNewsById($id): array
        {
            foreach ($this->news as $news) {
                if ($news['id'] == $id) {
                    return $news;
                }
            }
            return [];
        }*/
}
