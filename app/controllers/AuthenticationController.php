<?php

class AuthenticationController extends BaseController {

    public function __construct(){

        $this->beforeFilter(function(){
            $id = Session::get('expert_id');

            $logged = false;
            $myaccount_url = "";

            $u_id = Session::get('user_id');
            $e_id = Session::get('expert_id');

            if(!is_null($u_id)){
                $logged = true;
                $myaccount_url = "user/user-section";
            }
            else if(!is_null($e_id)){
                $logged = true;
                $myaccount_url = "expert/expert-section";
            }

            $country=Session::get('country');
            View::share('country', $country);

            $timezone=Session::get('timezone');
            View::share('timezone', $timezone);

            View::share('logged', $logged);
            View::share('myaccount_url', $myaccount_url);
            View::share('path', URL::to('/'));
        });
    }
	
	public function userLogin(){
		return View::make('authentication.userlogin');
	}
	
	public function expertLogin(){
		return View::make('authentication.expertlogin');
	}
	
	public function adminlogin(){
		return View::make('authentication.adminlogin');
	}
	
	public function register(){
		return View::make('authentication.register');
	}
	
	public function passwordRecovery(){
		return View::make('authentication.passwordrecovery');
	}
	
	public function passwordSent(){
		return View::make('authentication.passwordsent');
	}

    public function isValidAdmin()
    {
        $username = Input::get('username');
        $password = Input::get('password');

        $admin = Admin::where('username', '=', $username)
                        ->where('password','=',$password)->first();

        if(is_null($admin))
            return "invalid";
        else{
            Session::put('admin_id', $admin->id);

            return "correct";
        }
    }

	public function isValidUser()
	{
        $email = Input::get('email');
        $password = Input::get('password');

        $user = User::where('email', '=', $email)
                    ->where('password','=',$password)->first();

        if(is_null($user)){
            $ar = array("message"=>"invalid");
        }
        else{
            Session::put('user_id', $user->id);

            $ar = array("message"=>"correct", "id"=>$user->id);
        }

        return $ar;
	}

    public function isDuplicateUser()
    {
        $email = Input::get('email');

        $user = User::where('email', '=', $email)->first();

        return is_null($user) ? "no" : "yes";
    }

    public function saveUser(){

        if($this->isDuplicateUser()==="no"){

            $user = new User;

            $user->email = Input::get('email');
            $user->password = Input::get('password');
            $user->first_name = Input::get('first_name');
            $user->last_name = Input::get('last_name');
            $user->country = Input::get('country');
            $user->timezone = Input::get('timezone');
            $user->status = "active";
            $user->created_at = date("Y-m-d h:i:s");
            $user->updated_at = date("Y-m-d h:i:s");

            $user->save();

            Session::put('name', $user->first_name);
            Session::put('user_id', $user->id);

            $ar = array("message"=>"done", "id"=>$user->id);
        }
        else
            $ar = array("message"=>"duplicate");

        return $ar;
    }

    public function expertSaved(){
        return View::make('authentication.expertsaved');
    }

    public function expertRegister(){

        $categories = Category::where('status','=','active')->get();

        return View::make('authentication.expert-register')->with("categories", $categories);
    }

    public function saveExpert(){

        if($this->isDuplicateExpert()==="no"){

            $pic = "";
/*
            if (Input::file('file')->isValid())
            {
                $pic = Input::file('file')->getClientOriginalName();

                $destinationPath = public_path() . "/img/experts/";

                Input::file('file')->move($destinationPath, $pic);
            }*/

            $expert = new Expert;

            $expert->email = Input::get('email');
            $expert->password = Input::get('password');
            $expert->first_name = Input::get('first_name');
            $expert->last_name = Input::get('last_name');
            $expert->country = Input::get('country');
            $expert->timezone = Input::get('timezone');
            $expert->fees_rupee = 0;
            $expert->fees_dollar = 0;
            $expert->about = "";
            //$expert->date_of_birth = Input::get('year') . "-" . Input::get('month') . "-" . Input::get('day');
            $expert->status = "active";
            $expert->created_at = date("Y-m-d h:i:s");
            $expert->updated_at = date("Y-m-d h:i:s");

            $expert->save();

            Session::put('name', $expert->name);
            Session::put('expert_id', $expert->id);
            return "done";
        }
        else
            return "duplicate";
    }

    public function isDuplicateExpert()
    {
        $email = Input::get('email');

        $expert = Expert::where('email', '=', $email)->first();

        return is_null($expert) ? "no" : "yes";
    }

    public function userSaved(){

        if(is_null(Session::get('name')))
            return View::make('static.index');
        else
            return View::make('authentication.usersaved');
    }

    public function sendPassword(){

        $email = Input::get('email');

        $user = User::where('User.email','=',$email)->first();

        $data = array('name'=>$user->name);

        Mail::send('emails.resetpassword', $data, function($message)use ($user){

            $message->to($user->email, $user->name)->subject('You requested your password');
        });
    }

/************************ expert methods ************************/

    public function sendExpertPassword(){

        $email = Input::get('email');

        $expert = Expert::where('Expert.email','=',$email)->first();

        $data = array('name'=>$expert->name);

        Mail::send('emails.resetpassword', $data, function($message)use ($expert){

            $message->to($expert->email, $expert->name)->subject('You requested your password');
        });
    }

    public function isValidExpert()
    {
        $email = Input::get('email');
        $password = Input::get('password');

        $expert = Expert::where('email', '=', $email)->where('password','=', $password)->first();

        if(is_null($expert))
            return "invalid";
        else{
            Session::put('expert_id', $expert->id);

            return "correct";
        }
    }

    public function timezone($country){
        $timezones=Timezone::where('country','=',$country)->get();

        return $timezones;
    }
}