<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = Category::with('news')->paginate(10);
        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    /**
     * @param Category $category
     */
    public function show(Category $category)
    {
        //
    }

    /**
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category
        ]);

    }

    /** Update the specified resource in storage.
    *
    * @param EditCategoryRequest $request
    * @param News $news
    * @return \Illuminate\Http\RedirectResponse
    */
    public function update(EditCategoryRequest $request, Category $category)
    {

        $category = $category->fill($request->validated())->save();

        if ($category) {
            return redirect()
                ->route('admin.categories.index')
                ->with('success', 'category is saved');
        }

        return back()->with('error', 'categories is not save');
    }

    /**
     * @param CreateCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateCategoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        $category = Category::create($request->validated());
        if ($category) {
            return redirect()->route('admin.categories.index')->with('success', 'All save');
        }

        return back()->withInput()->with('error', 'Not Saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')
            ->withSuccess(__('Category delete successfully.'));
    }
}
