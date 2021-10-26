<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $news = News::paginate(8);
        return view('admin.news.index', [
            'newsList' => $news
        ]);
    }

    /**
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::all();
        return view('admin.news.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string']
        ]);
        $news = News::create(
            $request->only(['category_id', 'title', 'short_description','description', 'status', 'author'])
        );

        if ($news) {
            return redirect()->route('admin.news.index')
                ->with('success','create is success');
        }

        return back()->with('error', 'create is fail');
    }

    /**
     * Display the specified resource.
     *
     * @param News $news
     * @return void
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return void
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories,
            'authors' => $authors
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, News $news)
    {
        $news = $news->fill(
            $request->only(['category_id', 'title', 'short_description', 'description', 'status', 'author_id'])
        )->save();

        if($news) {
            return redirect()
                ->route('admin.news.index')
                ->with('success', 'News is saved');
        }

        return back()->with('error', 'News is fail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return Response
     */
    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('admin.news.index')
            ->withSuccess(__('News delete successfully.'));
    }
}
