<?php
class AccountController extends BaseController {
	
	// CREATE ACCOUNT
	public function getCreate(){
		return View::make('account.create');
	}

	public function postCreate(){
		$validator = Validator::make(Input::all(),
    		array(
    			'email' => 'required|max:50|email|unique:users',
    			'username' => 'required|max:20|min:3|unique:users',
    			'password' => 'required|min:6',
    			'password_confirmation' => 'required|same:password'
    		)
		);

		if($validator->fails()){
			return Redirect::route('account-create')
			->withErrors($validator)
			->withInput();

		}else{
			$email = Input::get('email');
			$username = Input::get('username');
			$password = Hash::make(Input::get('password'));
			//determing if image uploaded

 			//dd(Input::file('photo'));
			if (Input::hasFile('photo')) {
			 	$user_image = Input::file('photo');
			    $filename = $user_image->getClientOriginalName();
				$extension = $user_image->getClientOriginalExtension();
				$destination_path = $_SERVER['SERVER_NAME'].'/public/img/users/';
				try {
				    $file = $user_image->move($destination_path);
				} catch(Exception $e) {
				    // Handle your error here.
				    return Redirect::route('account-create')
				->with('global','There was a problem upload your photo.');
				}
			}else{
				$filename = 'No image';
			}
			//activation code
			$code = str_random(60);
			$user = User::create(array(
				'email'=>$email,
				'username'=>$username,
				'password'=>$password,
				'code' => $code,
				'userphoto' => $filename,
				'active' => 0
			));
			if($user){
					//send email
					Mail::send('emails.auth.activate', array('link' => URL::Route('account-activate',$code),'username'=>$username), function($message) use ($user){
    					$message->to($user->email, $user->username)->subject('Activate your account!');
					});
				return Redirect::route('/')
				->with('global','Your Account has been created! We have sent you a email, please active your email!');
			}
		}
	}//end postCreate



	// SIGN IN

	public function getSignIn(){
		return View::make('account.signin');
	}

	public function postSignIn(){
		$validator = Validator::make(Input::all(),
    		array(

    			'email' => 'required|email',
    			'password' => 'required'
    		)
		);

		if($validator->fails()){
			//redirect to sign in page
			return Redirect::route('account-sign-in')
			->withErrors($validator)
			->withInput();
		}else{
			//remeber me
			$remember = (Input::has('remember')) ? true : false;
			//attempt sign in
			$auth = Auth::attempt(array(
				'email' => Input::get('email'),
				'password' => Input::get('password'),
				'active' => 1
			), $remember);//end auth
			if($auth){
				//redirect to the intended page
				return Redirect::route('admin');
			}else{
				return Redirect::route('account-sign-in')
				->with('global','Email/password wrong,or account not activated!');
			}//endelse  auth
		}//end form validation else
		return Redirect::route('account-sign-in')
				->with('global','There was a problem signing you in. ');
	}

	public function getSignOut(){
		Auth::logout();
		return Redirect::route('/');
	}



	public function getActivate($code){
		$user = User::where('code','=',$code)->where('active','=', 0);
		if($user->count()){
			$user = $user->first();
			//update user to active state
			$user->active = 1;
			$user->code = '';
			if($user->save()){
					return Redirect::route('/')
				->with('global','Avtivated! You can now sign in!.');
			}
		}//endif user count
		return Redirect::route('/')
			->with('global','We could not active your account.Try again later.');
		// echo '<pre>',print_r($user),'</pre>';
	}
	//user update password or email address or username

	public function getChangeAccount(){
		return View::make('account.accountUpdates');
	}
	public function postChangeAccount(){
			$validator = Validator::make(Input::all(),
    		array(
    			'old_password' => 'required',
    			'password' => 'required|min:6',
    			'password_confirmation' => 'required|same:password'
    		)
		);
		if($validator->fails()){
			return Redirect::route('account-change')
			->withErrors($validator);
		}else{
			//change password
				$user = User::find(Auth::user()->id);
				$old_password = Input::get('old_password');
				$password = Input::get('password');
				//check if old password matches
				if(Hash::check($old_password,$user->getAuthPassword())){
					$user->password = Hash::make($password);
					if ($user->save()) {
						return Redirect::route('/')
							->with('global','Your password has been changed. ');
					}
				}
				else{
						return Redirect::route('account-change')
							->with('global','Your old password is incorrect.');
				}
		}
		return Redirect::route('account-change')
			->with('global','Your password could not be change! ');
	}
	public function getForgotPassword(){
		return View::make('account.forgot');
	}
	public function postForgotPassword(){
			$validator = Validator::make(Input::all(),
    		array(
    			'email' => 'required|email'
    			)
    		);
			if($validator->fails()){
					return Redirect::route('account-forgot-password')
					->withErrors($validator)
					->withInput();
			}else{
				$user = User::where('email','=',Input::get('email'));
				if($user->count()){
					$user = $user->first();
					//generate a new code and password
					$code = str_random(60);
					$password = str_random(10);
					$user->code = $code;
					$user->password_temp = Hash::make($password);
					if($user->save()){
						//Send email
						Mail::send('emails.auth.reminder', array('link' => URL::route('account-recover',$code),'username'=>$user->username,'password'=>$password), function($message) use ($user){
	    					$message->to($user->email, $user->username)->subject('Your New Password');
						});
						return Redirect::route('/')
						->with('global','We have sent you a new password by email. ');
					}
				}
			}
			return Redirect::route('account-forgot-password')
				->with('global','Could not request new password or your email is not exist.');
	}//end postForgotPassword
	public function getRecover($code){
		$user = User::where('code','=',$code)
				->where('password_temp','!=','');
		if($user->count()){
			$user=$user->first();
			$user->password 		= $user->password_temp;
			$user->password_temp	= '';
			$user->code 			= '';
			if($user->save()){
				return Redirect::route('/')
					->with('global','Your account has been recovered and you can sign in with your new password.');
			}
		}//end count
		return Redirect::route('/')
			->with('global','Could not recover your account. ');
	}
}