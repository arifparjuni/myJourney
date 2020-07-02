<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts', $posts));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // handle the file upload 
        if($request->hasFile('cover_image'))
        {
            // get filename with extensionn
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('cover_image')->getClientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else
        {
            $fileNameToStore = 'noimage.jpg';
        }

        // echo $filenameWithExt;
        // echo '<br>';
        // echo $filename;
        // echo '<br>';
        // echo $extension;
        // echo '<br>';
        // echo $fileNameToStore;
        // echo '<br>';
        // echo $path;
        
        // dd();

        // Post::create($request->all());

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();
        
        return redirect('posts')->with('success', 'Post berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post', $post));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post', $post));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        
        // handle the file upload
        if($request->hasFile('cover_image'))
        {
            // get filename with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // get just filnename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // getjust ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        
        // Post::where('id', $post->id)
        //             ->update([
        //                 'title' => $request->title,
        //                 'body' => $request->body
        //             ]);

        $post = Post::find($post->id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')) {
            $post->cover_image = $fileNameToStore;
        }

        $post->save();

        return redirect('posts')->with('success', 'Post berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Post::destroy($post->id);

        $post = Post::find($post->id);
        if($post->cover_image != 'noimage.jpg')
        {
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post->delete();

        return redirect('posts')->with('success', 'Post berhasil dihapus!');
    }
}
