<?php  


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class BlogController extends Controller {


	// blogs GET
	public function listAllBlogs(){
		return view('blog.listAllBlogs',
			array(
				'blogs' => Blog::all()
			)
		);
	}


	// users GET
	public function listAllUsers(){
		return View::make('account.listAllUsers',
			array(
				'users' => User::all()
			)
		);

	}


	// {username} GET
	public function listUserBlogs($username){

		if (strcmp($username, "admin") == 0){
			if (Auth::check()){
				return Redirect::route("listUserBlogs", array('username' => urldecode(Auth::user()->username)));
			} else {
				return Redirect::route("account-sign-in")
			 ->with('global', 'Your name is not admin!!!');
			}
			
		}

		$username = urldecode($username);
		$user = User::where('username','=',$username)->where('active','=', 1);
		if ($user->count()){
			$user = $user->first();
			$userBlogs = Blog::where('user_id', '=', $user->id);
			return View::make('blog.listUserBlogs',
				array(
					'blogs' => Blog::all(),
					'username' => $username
				)
			);
		} else {
		  return Redirect::route('/')
               ->with('global', 'this person wrote nothing. listUserBlogs');
		}

		return Redirect::route('/')
               ->with('global', 'no this person here.');
	}	


	// blog/{id} GET
	public function viewBlog($id){
        $blog = Blog::findOrFail($id);
        return View::make('blog.view',
            array(
                'blog' => $blog
            )
        );
	}

	
	// blog/new GET
	public function newBlog($username){
		$user = Auth::user();
		if ($user){
			if (Auth::user()->username == urldecode($username)){
				return View::make('blog.newBlog', array(
				'user' => $user));
			} else {
				return Redirect::route('home')
				  ->with('global', 'write your own blogs.');
			}
		} else {
			return Redirect::route('home')
               ->with('global', 'no this person here.');
		}

	}


	// {username}/new POST
	public function createBlog($username){
		$validator = Validator::make(Input::all(),
			array(
				'title' => 'required|max:100',
				'content' => 'required'
			)
		);

		if($validator->fails()){
			return Redirect::route('newBlog', array('username' => $username))
			->withErrors($validator)
			->withInput(); 
		} else {
			$title = Input::get('title');
			$content = Input::get('content');
			$user_id = Auth::id();
			$user = Auth::user();

			$blog = Blog::create(array(
                    'title' => $title,
                    'content' => $content,
                    'user_id' => $user_id
 				)
			);

			if ($blog){
				return Redirect::route('listUserBlogs', array(
					'username' => urlencode($user->username)))
				->with('global', 'Succeeded to post a blog');
			}
		}
	}



	// blog/{id} PUT
	public function updateBlog($id){

		$validator = Validator::make(Input::all(),
			array(
				'title' => 'required|max:100',
				'content' => 'required'
			)
		);

		if($validator->fails()){
			return Redirect::route('account-create')
			->withErrors($validator)
			->withInput(); 
		} else {
			$title = Input::get('title');
			$content = Input::get('content');
			$user_id = Auth::id();
			$user = Auth::user();

			$blog = Blog::findOrFail($id);

			$boolean = $blog->update(array(
                    'title' => $title,
                    'content' => $content,
                    'user_id' => $user_id
 				)
			);

			if ($boolean){
				return Redirect::route('listUserBlogs', array(
					'username' => urlencode($user->username)))
				->with('global', 'Succeeded to update a blog');
			}
		}

	}


	// blog/{id} DELETE
	public function deleteBlog($id){
		$blog = Blog::findOrFail($id);
		if ($blog->user_id == Auth::id()){
			$boolean = $blog->delete();
			if ($boolean) {
				return Redirect::route('home')
				    ->with('global', 'sccusseeded to delete a blog.');
			} else {
				return Redirect::route('home')
				    ->with('global', 'failed to delete a blog.');
			} 
		} else{
			return Redirect::route('home')
				    ->with('global', 'delete your own blogs.');
		}
	}


	// blog/{id}/edit GET
	public function editBlog($id){
		$blog = Blog::findOrFail($id);
		if ($blog->user_id == Auth::id()){
			$title = $blog -> title;
			$content = $blog -> content;
			return View::make('blog.editBlog', array(
				'id' => $id,
				'title' => $title,
				'content' => $content)
			);
		} else {
			return Redirect::route('home')
				    ->with('global', 'update your own blogs.');
		}
	}

	public function createComment($id){

		$blog=Blog::findOrFail($id);

		// create a new comment
		$comment = Comment::create(
			array(
				'blog_id' => $id,
				'name' => Auth::user() -> username,
				'content' => nl2br(Input::get('content'))
			)
		);

		if ($comment) {
			return Redirect::route('viewBlog', array('id' => $id));
		} else {
			return; 
		}

	}

	public function deleteComment($comment_id){
		$comment = Comment::findOrFail($comment_id);
		$id = $comment->blog_id;
		if (strcmp($comment->name, Auth::user()->username) == 0){
			$boolean = $comment->delete();
			if ($boolean) {
				return Redirect::route('viewBlog', array('id' => $id))
				    ->with('global', 'sccusseeded to delete a comment.');
			} else {
				return Redirect::route('viewBlog', array('id' => $id))
				    ->with('global', 'failed to delete a comment.');
			} 
		} else{
			return Redirect::route('viewBlog', array('id' => $id))
				    ->with('global', 'go to delete your own blogs.');
		}
	}


	// admin

	public function listCurrentUserBlogs(){


		$username = Auth::user()->username;
		$username = urldecode($username);
		$user = User::where('username','=',$username)->where('active','=', 1);
		if ($user->count()){
			$user = $user->first();
			$userBlogs = Blog::where('user_id', '=', $user->id);
			return View::make('blog.listUserBlogs',
				array(
					'blogs' => Blog::all(),
					'username' => $username
				)
			);
		} else {
		  return Redirect::route('/')
               ->with('global', 'this person wrote nothing.!!!');
		}

		return Redirect::route('/')
               ->with('global', 'no this person here.');
	}
}


?>