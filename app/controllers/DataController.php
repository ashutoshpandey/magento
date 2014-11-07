<?php

class DataController extends BaseController {

    public function categories(){

        $categories = Category::all();

        return $categories;
    }

    public function getCategories(){

        $categories = Category::where('status', '=', 'active')->get();

        return $categories;
    }

    public function subCategories($id){

        $subCategories = SubCategory::where('category_id', '=', $id)->get();

        return $subCategories;
    }

    public function getExperts($category_id){

        $experts = Expert::where('status','=', 'active')->where('category_id','=',$category_id)->get();

        if($experts){

            $country=Session::get('country');

            $list = array();

            foreach($experts as $expert){

                $appointments = Appointment::where('expert_id','=',$expert->id)
                    ->where(function($q){
                        $q->where('status','=','pending')
                            ->orWhere('status','=','patientcancelled');
                    })
                    ->where('appointment_date','>=',date('Y-m-d H:i:s'))->orderBy('appointment_date')->get();

                /*foreach($appointments as $appointment)
                    $appointment->appointment_date=Utility::toLocalDateByTimezone($appointment->appointment_date, $timezone);*/


                foreach($appointments as $appointment)
                    $appointment->appointment_date=$this->toLocalDateByTimezone($appointment->appointment_date, $expert->timezone);


                $list[] = array("expert"=>$expert, "availabilities"=>$appointments);
            }

            return View::make('data.loadexperts')->with("list", $list)->with("country",$country);
        }
        else
            return View::make('data.loadexperts')->with("experts", null);
    }

    public function bookAppointment($id){

        $user_id = Session::get('user_id');

        if(is_null($user_id)){
            return "dologin";
        }
        else{
            $appointment = Appointment::where('id','=',$id)->where('status','=','pending')->first();

            if(is_null($appointment))
                return "invalid";
            else{
                $appointment->user_id = Session::get('user_id');
                $appointment->status = "booked";
                $appointment->updated_at = date('Y-m-d h:i:s');

                $appointment->save();

                $this->sendVideoLink($appointment);

                return "done";
            }
        }
    }

    public function appointmentBooked($id){

        $appointment = Appointment::find($id);

        return View::make('data.appointmentbooked')->with("appointment", $appointment);
    }

    public function sendVideoLink($appointment){

        $data = array('appointment'=>$appointment);

        Mail::send('emails.videolink', $data, function($message)use ($appointment){

            $message->to($appointment->user->email, $appointment->user->first_name)->subject('You booked an appointment');
        });
    }

    public function expertProfile($id){

        $expert = Expert::find($id);

        return View::make('data.expertprofile')->with("expert", $expert);
    }

    public function bookingForm($id){

        $appointment = Appointment::find($id);

        return View::make('data.bookingform')->with("appointment", $appointment);
    }

    public function appointmentLogin(){
        return View::make('data.appointmentlogin');
    }

    public function loadSpecialist(){
        $expert = Expert::all();
        $category=Category::all();

        return $expert;
    }

    /******************** time zone methods ************************************/
    public static function toUTCDate($dt, $expert_id){

        $expert = Expert::find($expert_id);

        $country = $expert->country;

        $timezone = TimeZone::where('country','=',$country)->first();

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

        $timezone = TimeZone::where('country','=',$country)->first();

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

        $timezone = TimeZone::where('name','=',$timezone)->first();

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

        $s_timezone=Session::get('timezone');

        $s_timezone=str_replace("-","/",$s_timezone);
        $v_timezone=str_replace("-","/",$v_timezone);

        $tim=new DateTime($dt,new DateTimezone($v_timezone));

        $newTimezone= new DateTimeZone($s_timezone);
        $tim->setTimezone($newTimezone);

        return $tim->format('Y-m-d H:i:s');
    }

    public function loadTimezone($country){
        $timezones = Timezone::where('country','=',$country)->get();

        return $timezones;
    }
}