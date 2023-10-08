<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Category;
use App\DataTables\PostsDataTable;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, PostsDataTable $dataTable)
    {
        return $dataTable->render('admin.post.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->orderBy('name', 'asc')->pluck('id', 'name');
        return view('admin.post.Create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // dd($request->all());
        $published_date = $this->parseDate($request->published_date);
        $user_id = Auth::user()->id;
        // dd($published_date);

        $post = Post::create([
            'title' => $request->title,
            'published' => $request->status,
            'content' => $request->content,
            'summary' => $request->summary,
            'user_id' => $user_id,
            'category_id' => $request->category_id,
            'published_date' => $published_date,
        ]);

        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $name = time().'_' . $filename;
            $img = Image::make($request->image);
            $img->fit(600, 381);
            $img->save(public_path('/images/posts/').$name);
            $post->image = $name;
            $post->save();
        }

        toastr()->success('News '.$post->title.' added');

        return redirect()->route('posts.index');
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
        $post = Post::with('category')->findOrFail($id);
        $categories = Category::select('id', 'name')->orderBy('name', 'asc')->pluck('id', 'name');

        return view('admin.post.edit', [
            'post'=>$post,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {

        $published_date = $this->parseDate($request->published_date);
        // dd($published_date);
        $post = Post::findOrFail($id);
        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $name = time().'_' . $filename;
            $img = Image::make($request->image);
            $img->fit(600, 381);
            $img->save(public_path('/images/posts/').$name);
            if(!empty($post->image)){
                unlink(public_path('/images/posts/'.$post->image));
            }
            $post->image = $name;
        }
        $post->title = $request->title;
        $post->published = $request->status;
        $post->content = $request->input('content');
        $post->summary = $request->input('summary');
        $post->category_id = $request->category_id;
        $post->published_date = $published_date;
        $post->save();
        toastr()->info('News '.$post->title.' updated');

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        if(!empty($post->image)) {
            unlink(public_path('images/posts/'.$post->image));
        }
        $post->delete();
        toastr()->error('News '.$post->title.' deleted');

        return redirect()->route('posts.index');
    }

    public function parseDate($date)
    {
        // $published = date_parse($date);
        // $published_date = $published['year'].'-'.$published['month'].'-'.$published['day'];
        $published = explode('-', $date);
        $published_date = $published[2].'-'.$published[1].'-'.$published[0];
        return  $published_date;
    }
}
