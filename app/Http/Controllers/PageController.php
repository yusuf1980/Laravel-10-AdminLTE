<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Page;
use Illuminate\Support\Facades\Redirect;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::orderBy('title')->get();
        return view('admin.page.index', [
            'pages' => $pages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePageRequest $request)
    {
        $page = Page::create([
            'title' => $request->title,
            'content' => $request->content
        ]);
        toastr()->success('Page '.$page->title.' added');

        return redirect()->route('pages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page = Page::findOrFail($id);
        return view('admin.page.edit', [
            'page'=>$page,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePageRequest $request, string $id)
    {
        $page = Page::findOrFail($id);
        $page->title = $request->title;
        $page->content = $request->input('content');
        $page->save();
        toastr()->info('Page '.$page->title.' updated');

        return Redirect::route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $page = Page::findOrFail($id);
        $page->delete();
        toastr()->error('Page '.$page->title.' deleted');

        return Redirect::route('pages.index');
    }
}
