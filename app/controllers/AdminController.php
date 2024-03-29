<?php

class AdminController extends BaseController {

    public function __construct(){

        $this->beforeFilter(function(){
            $id = Session::get('admin_id');

            View::share('path', URL::to('/'));

            if(is_null($id))
                return Redirect::to('admin');
        });
    }

    public function dashboard(){
        return View::make('admin.dashboard');
    }

    public function adminSection(){

        return View::make('admin.adminsection');
    }

    public function appointments(){

        $appointments = null;

        $filter = Input::get('filter');

        if($filter=="expert"){

            $expert_id = Input::get('expert_id');

            $appointments = Appointment::where('status','=','booked')->where('Appointment.expert_id','=',$expert_id)->get();

        }
        else if($filter=="date"){

            $startDate = Input::get('startDate');
            $endDate = Input::get('endDate');

            $appointments = Appointment::where('Appointment.appointment_date','>=',$startDate)->
										 where('Appointment.appointment_date','<=',$endDate)->
										 where('status','=','booked')->get();

        }
        else if($filter=="expertdate"){

            $expert_id = Input::get('expert_id');

            $startDate = Input::get('startDate');
            $endDate = Input::get('endDate');

            $appointments = Appointment::where('Appointment.appointment_date','>=',$startDate)->
                                         where('Appointment.appointment_date','<=',$endDate)->
										 where('status','=','booked')->
                                         where('Appointment.expert_id','=',$expert_id)->get();

        }
        else{
            $appointments = Appointment::where('status','=','booked')->where('appointment_date','>=',date("Y-m-d H:i:s"))->get();
        }

		if(isset($appointments))
			return View::make('admin.appointments')->with('appointments', $appointments)->with('found', true);
		else
			return View::make('admin.appointments')->with('found', false);
    }

    public function editUser($id){

        $user = User::find($id);

        return View::make('admin.edituser')->with('user', $user);
    }

    public function removeUser($id){

        $user = User::find($id);

        if(is_null($user))
            return "invalid";
        else{
            $user->delete();

            return "done";
        }
    }

    public function updateUser(){

        $id = Input::get('id');

        $user = User::find($id);

        if(is_null($user))
            return "invalid";
        else{
            $user->first_name = Input::get('first_name');
            $user->last_name = Input::get('last_name');
            $user->email = Input::get('email');
            $user->phone = Input::get('phone');
            $user->password = Input::get('password');
            $user->country = Input::get('country');
            $user->timezone = Input::get('timezone');
            $user->save();

            return "done";
        }
    }

    public function createExpert(){

        $categories = Category::where('status','=','active')->get();

        return View::make('admin.createexpert')->with("categories", $categories);
    }

    public function saveExpert(){

        if($this->isDuplicateExpert()==="no"){

            $pic = "";

            if (Input::hasFile('file') && Input::file('file')->isValid())
            {
                $pic = Input::file('file')->getClientOriginalName();

                $destinationPath = public_path() . "/img/experts/";

                Input::file('file')->move($destinationPath, $pic);
            }

            $expert = new Expert;

            $expert->email = Input::get('email');
            $expert->password = Input::get('password');
            $expert->first_name = Input::get('first_name');
            $expert->last_name = Input::get('last_name');
            $expert->country = Input::get('country');
            $expert->timezone = Input::get('timezone');
            $expert->category_id = Input::get('category_id');
            $expert->subcategory_id = Input::get('subcategory_id');
            $expert->fees_rupee = Input::get('fees-rupee');
            $expert->fees_dollar = Input::get('fees-dollar');
            $expert->pic = $pic;
            $expert->about = "";
            $expert->status = "active";
            $expert->created_at = date("Y-m-d h:i:s");
            $expert->updated_at = date("Y-m-d h:i:s");
            $expert->about = Input::get('textarea');
            $expert->save();

            Session::put('name', $expert->name);

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

    public function expertSaved(){

        return View::make('admin.expertsaved');
    }

    public function editExpert($id){

        $expert = Expert::find($id);
        $categories = Category::where('status','=','active')->get();

        $ardate = explode("-", $expert->date_of_birth);

        return View::make('admin.editexpert')->with('expert', $expert)
                                             ->with('categories',$categories)
                                             ->with('ardate',$ardate);
    }

    public function updateExpert(){

        $id = Input::get('id');

        $expert = Expert::find($id);

        if(is_null($expert))
            return "invalid";
        else{

            $pic = "";

            $hasPic = false;

            if (Input::hasFile('file') && Input::file('file')->isValid())
            {
                $pic = Input::file('file')->getClientOriginalName();

                $destinationPath = public_path() . "/img/experts/";

                $hasPic = true;

                Input::file('file')->move($destinationPath, $pic);
            }

            $expert->email = Input::get('email');
            $expert->password = Input::get('password');
            $expert->first_name = Input::get('first_name');
            $expert->last_name = Input::get('last_name');
            $expert->country = Input::get('country');
            $expert->timezone = Input::get('timezone');
            $expert->about = Input::get('about');
            $expert->fees_rupee = Input::get('fees_rupee');
            $expert->fees_dollar = Input::get('fees_dollar');

            if($hasPic)
                $expert->pic = $pic;

            $expert->category_id = Input::get('category_id');
            $expert->subcategory_id = Input::get('subcategory_id');
            $expert->status = "active";
            $expert->updated_at = date("Y-m-d h:i:s");

            $expert->save();

            return "done";
        }
    }

    public function removeExpert($id){

        $expert = Expert::find($id);

        if(is_null($expert))
            return "invalid";
        else{
            $expert->delete();

            return "done";
        }
    }

    public function users(){

        $users = User::all();

        return View::make('admin.users')->with("users", $users);
    }

    public function experts(){

        $experts = Expert::all();

        return View::make('admin.experts')->with("experts", $experts);
    }

	public function createCategory()
	{
		return View::make('admin.createcategory');
	}

    public function createSubCategory()
    {
        $categories = Category::all();

        return View::make('admin.createsubcategory')->with("categories", $categories);
    }

    public function manageCategories(){
        return View::make('admin.categories');
    }

    public function loadCategories(){

        $categories = Category::where('status','=','active')->get();

        return View::make('admin.loadcategories')->with("categories", $categories);
    }

    public function categories(){

        $categories = Category::where('status','=','active')->get();

        return $categories;
    }

    public function saveCategory(){

        $name = Input::get('name');

        $tempCategory = Category::where('name','=',$name)->get();

        if(is_null($tempCategory) || $tempCategory->isEmpty()){

            $category = new Category();

            $category->name = $name;
            $category->created_at = date("Y-m-d h:i:s");
            $category->status = "active";

            $category->save();

            return "done";
        }
        else
            return "duplicate";
    }

    public function saveSubCategory(){

        $name = Input::get('name');

        $tempSubCategory = SubCategory::where('name','=',$name)->get();

        if(is_null($tempSubCategory) || $tempSubCategory->isEmpty()){

            $category_id = Input::get('category_id');

            $subCategory = new SubCategory();

            $subCategory->name = $name;
            $subCategory->category_id = $category_id;
            $subCategory->created_at = date("Y-m-d h:i:s");
            $subCategory->status = "active";

            $subCategory->save();

            return "done";
        }
        else
            return "duplicate";
    }

    public function editCategory($id){

        $category = Category::find($id);

        return View::make('admin.editcategory')->with("category", $category);
    }

    public function removeCategory($id){

        $category = Category::find($id);

        if(is_null($category))
            return "invalid";
        else{
            $category->delete();

            return "done";
        }
    }

    public function editSubCategory($id){

        $subCategory = SubCategory::find($id);
        $categories = Category::where('status','=','active')->get();

        return View::make('admin.editsubcategory')->with("subCategory", $subCategory)->with("categories", $categories);
    }

    public function removeSubCategory($id){

        $subCategory = SubCategory::find($id);

        if(is_null($subCategory))
            return "invalid";
        else{
            $subCategory->delete();

            return "done";
        }
    }

    public function updateCategory(){

        $id = Input::get('category_id');

        $category = Category::find($id);

        if(is_null($category))
            return "invalid";
        else{
            $category->name = Input::get('name');

            $category->save();

            return "done";
        }
    }

    public function manageSubcategories(){

        $categories = Category::where('status','=','active')->get();

        return View::make('admin.managesubcategories')->with("categories", $categories);
    }

    public function subcategoryTable($id){

        $subCategories = SubCategory::where('category_id', '=', $id)->get();

        return View::make('admin.subcategorytable')->with('subCategories', $subCategories);
    }

    public function subCategories($id){

        $subCategories = SubCategory::where('category_id', '=', $id)
                                    ->where('status','=','active')->get();

        return $subCategories;
    }

    public function updateSubCategory(){

        $id = Input::get('subcategory_id');

        $subCategory = SubCategory::find($id);

        if(is_null($subCategory))
            return "invalid";
        else{
            $subCategory->name = Input::get('name');

            $subCategory->save();

            return "done";
        }
    }

    public function cancelAppointment($id){

        $appointment = Appointment::find($id);

        if(is_null($appointment))
            return "invalid";
        else{
            $appointment->status = "admincancelled";
            $appointment->updated_at = date('Y-m-d h:i:s');

            $appointment->save();

            return "done";
        }
    }

    public function adminLogout(){

        Session::flush();

        Auth::logout();

        return Redirect::to('admin');
    }

    public function expert($id){

        $appointment = Appointment::find($id);

        $expert = Expert::find($appointment->expert_id);

        return View::make('admin.expert')->with("expert", $expert);
    }

    public function user($id){

        $appointment = Appointment::find($id);

        $user = User::find($appointment->user_id);

        return View::make('admin.user')->with("user", $user);
    }
    public function timeZone($country){

        $timezones = Timezone::where('country','=',$country)->get();

        return $timezones;
    }
}