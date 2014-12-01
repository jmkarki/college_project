<?php

class UserController extends BaseController {
		public function getIndex(){
		$user = new User;
		$role = $user->permission();
		if($role > 20){
			$roles = Role::all()->except(Auth::user()->role_id);
			$users = Company::find(Session::get('company_id'))
									->users->except(Auth::user()->user_id);
				foreach ($users as $eachUser) {
					$user_role = Role::find($eachUser->role_id);
					$eachUser->role = $user_role->name;
					$img = new Image;
					$eachUser->imgUrl =  $img->imgloc($eachUser->image_id);
				}
			$images = new Image;
	 		$userDet = array('img'=>$images->imgloc(Auth::user()->image_id), 'name' => Auth::user()->name);			
			return View::make('user.user-add-view')->with([
														'role' => $role,
														'users' => $users,													
														'roles' => $roles,
														'userDet'=> $userDet,
														'current' => ''
														]);		
		}
		return Redirect::to('/error');
	}

	public function postUser(){
		$user = new User;
		$user->role_id = Input::get('roles');
		$user->image_id = 1;
		$user->company_id = Session::get('company_id');
		$user->name = Input::get('fullname');
		$user->username = Input::get('username');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		//$user->phone_no = Input::get('phone');
		$user->save();

		return Redirect::to('/user/')
						->with('message','New User Information Added.');


	}
	public function getEachuser(){		
		if(Input::has('user_id')){
			$data = User::find(Input::get('user_id'));
			$img = new Image;
			$data->img =  $img->imgloc($data->image_id);
			return $data;
		}
	}
	public function postEachuserupdate(){
		if(Input::has('user_id')){
			$user = User::find(Input::get('user_id'));
			$user->name = Input::get('fullname');
	 		//$user->phone_no = Input::get('phone');
			$user->update();

			return 1;
		}
	}
	public function postResetpassword(){
 		$userid = Auth::user()->user_id;
		if(Input::has('user_id')){
			$userid = Input::get('user_id');
		}
		$user = User::find($userid);

		if(Input::has('old_password')){
			if (Hash::check(Input::get('old_password'), Auth::user()->password)){
				$user->password = Hash::make(Input::get('password'));
				$user->update();
			}else{

				return Redirect::to('user/profile')->with('error','Old Password is Incorrect.');
			}
		}

		$user->password = Hash::make(Input::get('password'));
		$user->update();
		if(Input::has('old_password')){
			return Redirect::to('/user/profile')->with('message','Password Updated.');;
		}

		return 1;
	}
	public function postDeactivate(){
		if(Input::has('user_id')){
			$user = User::find(Input::get('user_id'));
			$user->status = 1;
			$user->update();

			return 1;
		}
	}
	public function postActivate(){
		if(Input::has('user_id')){
			$user = User::find(Input::get('user_id'));
			$user->status = 0;
			$user->update();

			return 1;
		}
	}
	public function getCheckemail(){
		$data = User::where('email',Input::get('email'))->first();
		if(empty($data)){
			return 0;
		}
 		if($data->email == Input::get('email')){
			return 1;
		}
		return 0;
	}
	public function getCheckusername(){
		$data = User::where('username',Input::get('username'))->first();
		if(empty($data)){
			return 0;
		}
 		if($data->username == Input::get('username')){
			return 1;
		}
		return 0;
	}


	public function getProfile(){
		$images = new Image;
		$user = User::find(Auth::user()->user_id);
		$roleName = Role::find(Auth::user()->role_id)->name;
		$role = $user->permission();
		$user->img = $images->imgloc($user->image_id);
		$userDet = array('img'=>$images->imgloc(Auth::user()->image_id), 'name' => Auth::user()->name);

		return View::make('user.profile')->with([
														'img' => $userDet['img'],
														'user' => $user,
														'roleName' => $roleName,
														'role' => $role,
														'userDet' => $userDet,
														'current'=>'',
														]);
	}

	public function postProfile(){
		$users = User::find(Auth::user()->user_id);
		if(Input::get('no_img') == 0){
			$imgId = 2;
		}else if(Input::get('no_img') == 2){
			$imgId = $users->image_id;
		}
		if(Input::file('uploadImage') != ''){
			$files = new Image;
			$imgDet = $files->upload();
			$imgId = $imgDet->id;
		}

		$users->image_id = $imgId;
		$users->name = Input::get('name');
		//$users->phone_no = Input::get('phone_no');
		$users->update();

		return Redirect::to('user/profile')->with('message','Profile Updated.');
	}
}