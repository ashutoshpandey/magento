<h3>Edit this user
    <br>
</h3>

<div class="panel">

<form class="frmuser">
    <input type="hidden" name="id" value="{{$user->id}}">
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-6 col-xs-12">
                <div class="txt-box col-lg-12">
                    <h4>Name</h4>
                    <input class="txt-info" type="text" name="first_name" style="width: 35%;" value="{{$user->first_name}}">
                    <input class="txt-info" type="text" name="last_name" style="width: 35%;margin-left: 10px;" value="{{$user->last_name}}">
                </div>

                <div class="txt-box col-lg-12">
                        <h4>Email</h4>
                        <input class="txt-info" type="text" name="email" value="{{$user->email}}">
                    </div>
                    <div class="txt-box col-lg-12">
                        <h4>Password</h4>
                        <input class="txt-info" type="password" name="password" value="{{$user->password}}"/>
                    </div>
                    <div class="txt-box col-lg-12">
                        <h4>Repeat password</h4>
                        <input class="txt-info" type="password" name="repeat_password" value="{{$user->password}}"/>
                    </div>
                    <div class="txt-box col-lg-12">
                        <h4>Phone</h4>
                        <input class="txt-info" type="text" name="phone" value="{{$user->phone}}"/>
                    </div>
                    <div class="txt-box col-lg-12">
                        <h4>Country</h4>
                        <select name="country">
                            <option hidden="hidden">Select Country</option>
                            <option value="India">India</option>
                            <option value="Canada">Canada</option>
                            <option value="America">America</option>
                            <option value="UK">UK</option>
                            <option value="Holland">Holland</option>
                        </select>
                    </div>
                    <div class="txt-box col-lg-12">
                        <h4>Time Zone</h4>
                        <select name="timezone">
                        </select>
                    </div>
                    <div class="txt-box col-lg-12">
                        <input type="button" id="btn" name="btnupdateuser" class="btn btn-success" value="Update User"/>
                        <br/><br/>
                        <span class="msg"></span>
                    </div>

            </div>
        </div>
    </div>

</form>

</div>
<script type="text/javascript">
    $("select[name='country']").val("{{$user->country}}");
</script>