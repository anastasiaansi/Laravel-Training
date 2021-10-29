<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewsRequest;
use App\Http\Requests\EditNewsRequest;
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('admin.news.create', [
            'categories' => $categories,
            'authors' => $authors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateNewsRequest $request
     * @return RedirectResponse
     */
    public function store(CreateNewsRequest $request): RedirectResponse
    {
        $news = News::create($request->validated());
        if ($news) {
            return redirect()->route('admin.news.index')
                ->with('success', 'create is success');
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
     * @param EditNewsRequest $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(EditNewsRequest $request, News $news): RedirectResponse
    {
        $news = $news->fill($request->validated())->save();

        if ($news) {
            return redirect()
                ->route('admin.news.index')
                ->with('success', __('messages.admin.news.success'));
        }

        return back()->with('error', __('messages.admin.news.fail'));
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
