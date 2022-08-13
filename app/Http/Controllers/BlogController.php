<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog.index' , compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $directory = 'images/blog/';
        $image->move($directory, $imageName);
        $imageUrl = $directory.$imageName;

        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'status' => 'required',
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = SlugService::createSlug(Blog::class, 'slug', $request->title);
        $blog->image = $imageUrl;
        $blog->details = $request->details;
        $blog->status = $request->status;
        $blog->save();

        return back()->with('message','Blog added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit',[
            'blog' => $blog
        ]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);
        $blogImage = $request->file('image');
        if($blogImage){

            unlink($blog->image);
            $imageName = $blogImage->getClientOriginalName();
            $directory = 'images/blog/';
            $blogImage->move($directory, $imageName);
            $imageUrl = $directory.$imageName;


            $blog->title = $request->title;
            $blog->slug = SlugService::createSlug(Blog::class, 'slug', $request->title);
            $blog->image = $imageUrl;
            $blog->details = $request->details;
            $blog->status = $request->status;
            $blog->save();
        }
        else{
            $blog->title = $request->title;
            $blog->slug = SlugService::createSlug(Blog::class, 'slug', $request->title);
            $blog->details = $request->details;
            $blog->status = $request->status;
            $blog->save();
        }
        return back()->with('message','Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        unlink($blog->image);
        $blog->delete();
        return back();
    }
}
