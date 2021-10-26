<?php

namespace App\Http\Controllers\Admin;

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

    public function update(Request $request, Category $category)
    {

        //validation here

        $category->name = $request->input('name');
        $category->description = $request->input('description');

        if($category->save()) {
            return redirect()
                ->route('admin.categories.index')
                ->with('success', 'category is saved');
        }

        return back()->with('error', 'categories is not save');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {

        $category = Category::create(
            $request->only(['name', 'description'])
        );

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
