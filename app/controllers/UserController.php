<?php

class UserController extends BaseController {

    public function __construct(){

        $this->beforeFilter(function(){
            $id = Session::get('user_id');

			View::share('path', URL::to('/'));

            if(is_null($id))
                return Redirect::to('user-login');
        });
    }

    public function dashboard(){

        $id = Session::get('user_id');

        $appointments = Appointment::where('user_id', '=', $id)
            ->where('status','=','booked')
            ->where('appointment_date','>=', date('Y-m-d h:i:s'))->get();

        $appointment_count = Appointment::where('user_id', '=', $id)
            ->where('status','=','booked')
            ->where('appointment_date','>=', date('Y-m-d h:i:s'))->count();

        $next_appointment_obj = Appointment::where('user_id', '=', $id)
            ->where('status','=','booked')
            ->where('appointment_date','>=', date('Y-m-d h:i:s'))->orderBy('appointment_date')->first();

        if(is_null($next_appointment_obj))
            $next_appointment = "None";
        else
            $next_appointment = date("d M Y", strtotime($next_appointment_obj->appointment_date));

        return View::make('user.dashboard')
            ->with('appointment_count', $appointment_count)
            ->with('next_appointment', $next_appointment)
            ->with('appointments', $appointments);
    }

    public function userSection(){

        $id = Session::get('user_id');

        $user = User::find($id);

        return View::make('user.usersection')->with('user_name', $user->first_name . " " . $user->last_name);
    }

    public function appointments(){

        $currentDate = date("Y-m-d h:i:s");

        $id = Session::get('expert_id');

        $appointments = Appointment::where('Appointment.user_id','=',$id)->
                                     where('Appointment.status','=','active')->
                                     where('Appointment.appointment_date','>=',$currentDate)->get();

        return $appointments;
    }

    public function history(){

        $currentDate = date("Y-m-d h:i:s");

        $id = Session::get('user_id');

        $appointments = Appointment::where('user_id','=',$id)
                                   ->where(function($q) use($currentDate){
                                            $q->where('status','=','patientcancelled')
                                              ->orWhere('status','=','expertcancelled')
                                              ->orWhere('appointment_date','<',$currentDate);
                                        })->get();

        return View::make('user.history')->with("appointments", $appointments);
    }

    public function cancelledAppointments(){

        $currentDate = date("Y-m-d h:i:s");

        $id = Session::get('user_id');

        $appointments = Appointment::where('Appointment.user_id','=',$id)->
                                     where('Appointment.status','=','cancelled')->get();

        return $appointments;
    }

    public function payments(){

    }

    public function bookAppointment($id){

        $appointment = Appointment::find($id);

        if(is_null($appointment))
            return "invalid";
        else{
            $appointment->user_id = Session::get('user_id');
            $appointment->status = "booked";
            $appointment->updated_at = date('Y-m-d h:i:s');

            $appointment->save();

            return $appointment->id;
        }
    }

    public function appointmentBooked($id){

        $appointment = Appointment::find($id);

        return View::make('user.appointmentbooked')->with("appointment", $appointment);
    }

    public function cancelAppointment($id){

        $appointment = Appointment::find($id);

        if(is_null($appointment))
            return "invalid";
        else{
            $appointment->status = "patientcancelled";
            $appointment->updated_at = date('Y-m-d h:i:s');

            $appointment->save();

            return "done";
        }
    }

    public function appointment($id){

        $appointment = Appointment::find($id);

        return View::make('user.appointment')->with("appointment",$appointment);
    }

    public function profile(){

        $id = Session::get('user_id');

        $user = User::find($id);

        $ardate = explode("-", $user->date_of_birth);

        return View::make('user.profile')->with("user", $user)->with("ardate", $ardate);
    }

    public function updateProfile(){

        $id = Session::get('user_id');

        $user = User::find($id);

        if(is_null($user))
            return "invalid";
        else{

            $user->first_name = Input::get('first_name');
            $user->last_name = Input::get('last_name');
            $user->phone = Input::get('phone');
            $user->email = Input::get('email');
            $user->password = Input::get('password');
            $user->country = Input::get('country');
            $user->timezone = Input::get('timezone');

            $user->save();

            return "done";
        }
    }

    public function getExperts(){

        $subcategory_id = Input::get('subcategory_id');

        $experts = Expert::where('Expert.subcategory_id','=',$subcategory_id);

        return $experts;
    }

    public function categories(){

        $categories = Category::all();

        return $categories;
    }

    public function subCategories($id){

        $subCategories = SubCategory::where('category_id', '=', $id)->get();

        return $subCategories;
    }

    public function expertList(){

        $categories = Category::where('status','=','active')->get();

        return View::make('user.expertlist')->with("categories", $categories);
    }

    public function loadExperts(){

        $category_id = Input::get('category_id');
        $subcategory_id = Input::get('subcategory_id');

        $experts = Expert::where('category_id','=', $category_id)
                         ->where('subcategory_id','=', $subcategory_id)
                         ->where('status','=', 'active')->get();

        if($experts){

            $list = array();

            foreach($experts as $expert){

                $availabilities = Appointment::where('expert_id','=',$expert->id)
                                             ->where(function($q){
                                                $q->where('status','=','pending')
                                                  ->orWhere('status','=','patientcancelled');
                                                })
                                             ->where('appointment_date','>=',date('Y-m-d H:i:s'))->orderBy('appointment_date')->get();

                if(is_null($availabilities) || $availabilities->isEmpty())
                    ;
                else
                    $list[] = array("expert"=>$expert, "availabilities"=>$availabilities);
            }

            return View::make('user.loadexperts')->with("list", $list);
        }
        else
            return View::make('user.loadexperts')->with("experts", null);
    }

    public function expert($id){

        $appointment = Appointment::find($id);

        $expert = Expert::find($appointment->expert_id);

        return View::make('user.expert')->with("expert", $expert);
    }

    public function videoChat($id){

        $user_id = Session::get('user_id');

        $appointment = Appointment::find($id);

        if($user_id===$appointment->user_id){

            $time1 = strtotime(date("Y-m-d h:i:s"));
            $time2 = strtotime($appointment->appointment_date);
            $tm = round(abs($time1 - $time2) / 60,2);

            if($tm<10){
                $start = true;

                return View::make('static.videochat')->with("session_id", $appointment->id)->with("token_id", $user_id);
            }
            else
                return View::make('static.videochat')->with("start", false);
        }
        else
            return View::make('static.videochat')->with("start", false);
    }

    public function userLogout(){

        Session::flush();

        Auth::logout();

        return Redirect::to('user-login');
    }
    public function timeZone($country){

        $timezones = Timezone::where('country','=',$country)->get();

        return $timezones;
    }
}