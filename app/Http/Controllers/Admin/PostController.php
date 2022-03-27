<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class PostController extends Controller
{
    protected $validation = [
        "title" => 'required|max:255',
        "content" => 'required',
        "category_id" => 'nullable|exists:categories,id',
        "image" => 'nullable|mimes:jpeg,jpg,bmp,png',
        "tags" => 'exists:tags,id'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $tags = Tag::all();

        return view('admin.posts.index', compact('posts', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validation);

        $data = $request->all();

        if(isset($data["image"])){
            $img_path = Storage::put('uploads', $data["image"]);
            $data["image"] = $img_path;
        }

        $slug = Str::slug($data['title']);
        
        $count = 1;

        while(Post::where('slug', $slug)->first()){
            $slug = Str::slug($data['title'])."-".$count;
            $count++;
        }

        $data['slug'] = $slug;

        $newPost = new Post;

        $newPost->fill($data);
        $newPost->save();
        $newPost->tags()->sync($data['tags']);

        return redirect()->route('admin.posts.show', $newPost->id);

        /**
         *         $data = $request->all();

        * $newPost = new Post;
        * $newPost->title = $data['title'];
        * $newPost->content = $data['content'];
        * $newPost->published = $data['published'];
        * $newPost->slug = $data['slug'];
        * $newPost->save();
        * return redirect()->route('admin.posts.show', $newPost->id);
         */

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post)
    {
        $request->validate($this->validation);

        $data = $request->all();

        if(isset($data["image"])){
            $img_path = Storage::put('uploads', $data["image"]);
            $data["image"] = $img_path;
        }

        if($post->title == $data['title']){
            $slug = $data['slug'];
        }else{
            $slug = Str::slug($data['title']);
            $count = 1;
            while(Post::where('slug', $slug)
            ->where('id', '!=', $post->id)
            ->first()){
                $slug = Str::slug($data['title'])."-".$count;
                $count++;
            }
        }

        $data['slug'] = $slug;

        if(isset($data["image"])){
            $img_path = Storage::put('uploads', $data["image"]);
            $data["image"] = $img_path;
        }

        $post->update($data);

        $post->tags()->sync($data['tags']);

        return redirect()->route('admin.posts.show', $post);

        /**
         * $newPost = Post::find($id);

        * $data = $request->all();

        * $newPost->title = $data['title'];
        * $newPost->content = $data['content'];
        
         * $newPost->published = $data['published'];
        
        * $newPost->slug = $data['slug'];

        * $newPost->save();

        * return redirect()->route('admin.posts.show', $newPost->id);
         */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
