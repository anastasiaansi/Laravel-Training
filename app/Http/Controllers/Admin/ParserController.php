<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsJob;
use App\Models\News;
use Illuminate\Http\Request;
use App\Contracts\Parser;
use Illuminate\Http\Response;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request, Parser $parser)
    {
        $links = [
            'https://news.yandex.ru/auto.rss',
            'https://news.yandex.ru/auto_racing.rss',
            'https://news.yandex.ru/army.rss',
            'https://news.yandex.ru/gadgets.rss',
            'https://news.yandex.ru/index.rss',
            'https://news.yandex.ru/martial_arts.rss',
            'https://news.yandex.ru/communal.rss',
            'https://news.yandex.ru/health.rss',
            'https://news.yandex.ru/games.rss',
            'https://news.yandex.ru/internet.rss',
            'https://news.yandex.ru/cyber_sport.rss',
            'https://news.yandex.ru/movies.rss',
            'https://news.yandex.ru/cosmos.rss',
            'https://news.yandex.ru/culture.rss',
            'https://news.yandex.ru/fire.rss',
            'https://news.yandex.ru/championsleague.rss',
            'https://news.yandex.ru/music.rss',
        ];
        foreach ($links as $link) {
            $this->dispatch(new NewsJob($link));
        }
        echo "Danke, läuft";
    }

    public function store()
    {
        $this->validateRequestNews();
        $item = new News();

        $item->title = request('title');
        $item->description = request('description');

        $item->save();

        return redirect(route('news.index'));
    }

    protected function validateRequestNews()
    {
        return request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
    }
}
