<?php

class ExpertController extends BaseController {

    public function __construct(){

        $this->beforeFilter(function(){
            $id = Session::get('expert_id');

            if(is_null($id))
                return Redirect::to('expert-login');

            $country=Session::get('country');

            View::share('path', URL::to('/'));

			View::share('country', $country);
        });
    }

    public function dashboard(){

        $id = Session::get('expert_id');

        $appointment_count = Appointment::where('expert_id', '=', $id)
                                        ->where('status','=','booked')
                                        ->where('appointment_date','>=', date('Y-m-d H:i:s'))->count();

        $availability_count = Appointment::where('expert_id', '=', $id)
            ->where('status','=','pending')
            ->where('appointment_date','>=', date('Y-m-d H:i:s'))->count();

        return View::make('expert.dashboard')->with('appointment_count', $appointment_count)->with('availability_count', $availability_count);
    }

    public function expertSection(){

        $id = Session::get('expert_id');

        $expert = Expert::find($id);

        return View::make('expert.expertsection')->with('expert_name', $expert->first_name . " " . $expert->last_name);
    }

    public function loadAvailabilities(){

        $id = Session::get('expert_id');

        $appointments = Appointment::where('expert_id','=',$id)
                                   ->where('status','=','pending')
                                   ->where('appointment_date','>=',date('Y-m-d H:i:s'))->get();

        return View::make('expert.loadavailabilities')->with('appointments', $appointments);
    }

    public function availabilities(){

        $id = Session::get('expert_id');

        return View::make('expert.availabilities');
    }

    public function appointment($id){

        $appointment = Appointment::find($id);

        return View::make('expert.appointment')->with("appointment",$appointment);
    }

    public function appointments(){

        $id = Session::get('expert_id');

        $currentDate = date("Y-m-d H:i:s");

        $appointments = Appointment::where('expert_id','=',$id)->
                                     where('status','=','booked')->
                                     where('appointment_date','>=',$currentDate)->get();

        return View::make('expert.appointments')->with('appointments', $appointments);
    }

    public function history(){

        $currentDate = date("Y-m-d H:i:s");

        $id = Session::get('expert_id');

        $appointments = Appointment::where('expert_id','=',$id)
                                    ->where(function($q) use($currentDate){
                                        $q->where('status','=','patientcancelled')
                                            ->orWhere('status','=','expertcancelled')
                                            ->orWhere('appointment_date','<',$currentDate);
                                    })->get();

        return View::make('expert.history')->with('appointments', $appointments);
    }

    public function cancelAvailability($id){

        $appointment = Appointment::find($id);

        if(is_null($appointment))
            return "invalid";
        else{
            if($appointment->status==="pending"){

                $appointment->delete();

                return "done";
            }
            else
                return "booked";
        }
    }

    public function cancelAppointment($id){

        $appointment = Appointment::find($id);

        if(is_null($appointment))
            return "invalid";
        else{
            $appointment->status = "expertcancelled";
            $appointment->updated_at = date('Y-m-d H:i:s');

            $appointment->save();

            return "done";
        }
    }

    public function cancelledAppointments(){

        $currentDate = date("Y-m-d H:i:s");

        $id = Session::get('expert_id');

        $appointments = Appointment::where('expert_id','=',$id)->
                                     where('status','=','cancelled')->get();

        return $appointments;
    }

    public function setAvailabilities(){
        return View::make('expert.setavailability');
    }

    public function saveAvailabilities(){

        $expert_id = Session::get('expert_id');

        $availabilities = Input::get('availability');

        if(is_null($availabilities) || count($availabilities)==0)
            return "invalid";
        else{
            $time_array = explode(",", $availabilities[0]);
            $start = date("Y-m-d H:i:s", strtotime(trim($time_array[1]) . " " . $time_array[0]));

            $time_array = explode(",", $availabilities[count($availabilities)-1]);
            $end = date("Y-m-d H:i:s", strtotime(trim($time_array[1]) . " " . $time_array[0]));

            DB::table('appointments')->where('expert_id', '=', $expert_id)
                              ->where('status', '=', 'pending')
                              ->where('appointment_date', '>=', $start)
                              ->where('appointment_date', '<=', $end)->delete();

            for($i=0; $i<count($availabilities); $i++){

                $time_array = explode(",", $availabilities[$i]);

                $appointment = new Appointment();

                $dt=date("Y-m-d H:i:ss",strtotime(trim($time_array[1])." ".$time_array[0]));
                //$utc_date=Utility::toUTCDate($dt,$expert_id);
                $utc_date = $this->toUTCDate($dt, $expert_id);

                if($utc_date==null)
                    return "error";

                $appointment->appointment_date = $dt;
                $appointment->created_at = date("Y-m-d H:i:s");
                $appointment->updated_at = date("Y-m-d H:i:s");
                $appointment->status = "pending";
                $appointment->expert_id = $expert_id;

                $appointment->save();
            }

            return "done";
        }
    }

    public function getAvailabilities(){

        $expert_id = Session::get('expert_id');

        $start_date = Input::get('start_date');
        $end_date = Input::get('end_date');

        $start_date = date("Y-m-d", strtotime($start_date));
        $end_date = date("Y-m-d", strtotime($end_date));

        $startdate = $start_date . " 00:00:01";
        $enddate = $end_date . " 23:59:59";

        $appointments = Appointment::where('status','=','pending')
                                   ->where('expert_id','=',$expert_id)
                                   ->where('appointment_date','>',$startdate)
                                   ->where('appointment_date','<',$enddate)->orderBy('appointment_date', 'ASC')->get();

//        foreach($appointments as $appointment)
//            $appointment->appointment_date=Utility::toLocalDate($appointment->appointment_date,$expert_id);

        foreach($appointments as $appointment)
            $appointment->appointment_date=$this->toLocalDate($appointment->appointment_date,$expert_id);

        return $appointments;
    }

    public function profile(){

        $id = Session::get('expert_id');

        $categories = Category::all();

        $expert = Expert::find($id);

        return View::make('expert.profile')->with("expert", $expert)->with('categories', $categories);
    }

    public function updateProfile(){

		$id = Session::get('expert_id');

        $expert = Expert::find($id);

        if(is_null($expert))
            return "invalid";
        else{
            $pic = "";

            if (Input::hasFile('file') && Input::file('file')->isValid())
            {
                $pic = Input::file('file')->getClientOriginalName();

                $destinationPath = public_path() . "/img/experts/";

                Input::file('file')->move($destinationPath, $pic);
            }
            else if(Input::get('remove_pic'))
                $expert->pic="";
            else
                $pic=$expert->pic;

            $expert->category_id = Input::get('category_id');
            $expert->subcategory_id = Input::get('subcategory_id');

            $expert->email = Input::get('email');
            $expert->password = Input::get('password');
            $expert->first_name = Input::get('first_name');
            $expert->last_name = Input::get('last_name');
            $expert->country = Input::get('country');
            $expert->timezone = Input::get('timezone');
            $expert->pic = $pic;
            $expert->fees_rupee = Input::get('fees-rupee');
            $expert->fees_dollar = Input::get('fees-dollar');
            $expert->about = Input::get('about');
            $expert->status = "active";
            $expert->updated_at = date("Y-m-d h:i:s");

            $expert->save();

            return "done";
        }
    }

    public function videoChat($id){

        $expert_id = Session::get('expert_id');

        $appointment = Appointment::find($id);

        if($expert_id===$appointment->expert_id){

            $time1 = strtotime(date("Y-m-d h:i:s"));
            $time2 = strtotime($appointment->appointment_date);
            $tm = round(abs($time1 - $time2) / 1000);
//echo "[" . date("Y-m-d h:i:s") . " , " .  $appointment->appointment_date . " ]";
            if($tm/60<10){
                $start = true;

                //return View::make('static.videochat')->with("session_id", $appointment->id)->with("token_id", $expert_id)->with('start',true);

                return Redirect::to('/video-chat')->with("session_id", $appointment->id)->with("token_id", $expert_id)->with('start',true);
            }
            else{
                return Redirect::to('/video-chat')->with("start", false);
                //return View::make('static.videochat')->with("start", false);
            }
        }
        else{
            return Redirect::to('static/videochat')->with("start", false);
            //return View::make('static.videochat')->with("start", false);
        }
    }

    public function user($id){

        $appointment = Appointment::find($id);

        $user = User::find($appointment->user_id);

        return View::make('expert.user')->with("user", $user);
    }

    public function expertLogout(){

        Session::flush();

        Auth::logout();

        return Redirect::to('expert-login');
    }
	
    public function subCategories($id){

        $subCategories = SubCategory::where('category_id', '=', $id)
                                    ->where('status','=','active')->get();

        return $subCategories;
    }

/******************** time zone methods ************************************/
    public static function toUTCDate($dt, $expert_id){

        $expert = Expert::find($expert_id);

        $country = $expert->country;

        $timezone = Timezone::where('country','=',$country)->first();

        if($timezone){
            $offset = floatval($timezone->gmt);

            $time = strtotime($dt);

            if($offset>0)
                $time = $time - $offset*3600;
            else
                $time = $time + $offset*3600;

            if($offset>0)
                return date("Y-m-d H:i:s", $time);
            else
                return date("Y-m-d H:i:s", $time);
        }
        else
            return null;
    }

    public static function toLocalDate($dt, $expert_id){

        $expert = Expert::find($expert_id);

        $country = $expert->country;

        $timezone = Timezone::where('country','=',$country)->first();

        if($timezone){
            $offset = floatval($timezone->gmt);

            $time = strtotime($dt);

            if($offset>0)
                $time = $time + $offset*3600;
            else
                $time = $time - $offset*3600;

            if($offset>0)
                return date("Y-m-d H:i:s", $time);
            else
                return date("Y-m-d H:i:s", $time);
        }
        else
            return null;
    }

    public static function toUTCDateByTimezone($dt, $timezone){

        $timezone = Timezone::where('name','=',$timezone)->first();

        if($timezone){
            $offset = floatval($timezone->gmt);

            $time = strtotime($dt);

            if($offset>0)
                $time = $time - $offset*3600;
            else
                $time = $time + $offset*3600;

            if($offset>0)
                return date("Y-m-d H:i:s", $time);
            else
                return date("Y-m-d H:i:s", $time);
        }
        else
            return null;
    }

    public static function toLocalDateByTimezone($dt, $v_timezone){

        if($v_timezone==="UTC")
            return $dt;

        $timezone = Timezone::where('name','=',$v_timezone)->first();

        if($timezone){

            $offset = floatval($timezone->gmt);

            $time = strtotime($dt);

            $time = $time + $offset*3600;           // $offset could be +ve or -ve

            if($offset>0)
                return date("Y-m-d H:i:s", $time);
            else
                return date("Y-m-d H:i:s", $time);
        }
        else
            return null;
    }
    public function timeZone($country){

        $timezones = Timezone::where('country','=',$country)->get();

        return $timezones;
    }
}