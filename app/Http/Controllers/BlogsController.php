<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Blog;
use Redirect;
use App\User;
use App\Category;
use Auth;
use App\Http\Requests\BlogFormRequest;

class BlogsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $blogs = Blog::latest('published_at')->published()->paginate(5);
        $categories = Category::all();
        return view('blogs.index', compact('blogs', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        $categories = Category::lists('name' , 'id');
        return view('blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(BlogFormRequest $request)
    {
        //
        // temparary code before finish auth part
        $user = Auth::user();
        $blog = $user->blogs()->create($request->all());
        // temparary code before finish auth part
        


        // $blog = Blog::create($request->all());
        $blog->categories()->sync($request->get('categories'));

        
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
        return view('blogs.show', compact('blog', 'slug'));
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
        $categories = Category::lists('name' , 'id');
        return view('blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(BlogFormRequest $request, Blog $blog)
    {
        //
        $blog->update($request->all());
        
        $blog->categories()->sync($request->get('categories'));
        
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
