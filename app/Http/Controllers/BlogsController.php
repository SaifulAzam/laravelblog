<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Blog;
use Redirect;
use App\User;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $blogs = Blog::latest('published_at')->published()->paginate(5);
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
        // temparary code before finish auth part
        $user = User::find(2);
        $blog = $user->blogs()->create($request->all());
        // temparary code before finish auth part
        


        // $blog = Blog::create($request->all());

        
        return redirect('blogs')->with('message', 'Your blog has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Blog $blog)
    {
        //
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Blog $blog)
    {
        //
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
        $blog->update($request->all());
        return redirect('blogs')->with('message', 'The blog has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Blog $blog)
    {
        //
        Blog::destroy($blog->id);
        return redirect('blogs')->with('message', 'The blog has been deleted!');
    }
}
