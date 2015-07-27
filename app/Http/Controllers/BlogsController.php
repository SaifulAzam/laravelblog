<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBlogRequest;
use Request;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $blogs = Blog::latest('published_at')->published()->get();
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        $blog = Blog::findOrFail($id);

        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function createBlog()
    {
        return view('blogs.createBlog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function storeBlog(CreateBlogRequest $request)
    {
        //
        $input = $request->all();
        $input['user_id'] = 1;
        Blog::create($input);
        return redirect('blogs');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
