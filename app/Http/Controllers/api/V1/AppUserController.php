<?php

namespace App\Http\Controllers\api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppUser;
use App\Models\AppUserOtp;
use App\Models\Notification;
use App\Models\EmailTemplate;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\file;

use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AppUserCreateRequest;
use App\Providers\AppServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Template\Template;

class AppUserController extends Controller
{
    
    public function app_user_list(Request $request){
        $user = AppUser::get();
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'success fully got it',
            'data' => array(
                'app_users'=>$user,
            )

        ]);
    }
    
    public function register( AppUserCreateRequest $request)
    {
        $data = [];
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['mobile_no'] = $request->mobile_no;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
       
        $user = AppUser::create($data);
        
        DB::update('update app_user_otp set is_expire = 1 where user_id = ' . $user->id);
        $data1 = [];
        $data1['user_id'] = $user->id;
        $data1['otp'] = $request->input = rand(100000, 999999);
        $userotp = DB::table('app_user_otp')->insert($data1);

        $name=$user->first_name;
        $email=$user->email;
        $otp=$data1['otp'];
        $url= url('/');
        $appname=config('app.name');
        $d = EmailTemplate::where('title','=','registration')->first();
        $output = str_replace(
            array('##fristname##', '##email##', '##otp##','##url##','##appname##'),
            array($name, $email, $otp,$url,$appname),
            $d->template
        );
        // $mail['template']=$output;
        $mail['template'] ='<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
        </head>
        <body>
        '.$output.'</body>
        </html>';
        // return $dataa;
        Mail::to($data['email'])->send(new SendMail($mail));

        return response()->json([
            'success' => true,
            'message' => 'usre register successfully',
            'code' => 200,  
            'data' => array(
                'user' => $user,
            )
        ]);
    }

    public function otpverify(request $request)
    {
        $rules = [
            "user_id" => "required",
            "otp" => "required|min:6|max:6",
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success'   => false,
                'message' => $validator->errors()->first(),
                'data'=>array()
            ]);
        }
        if (AppUserOtp::where(['user_id' => $request->user_id, 'is_expire' => 0])->where('created_at', '>=', date('Y-m-d h:i:s',strtotime(Carbon::now()->addMinutes(-30))))->count() > 0) {
            $data = AppUserOtp::where(['user_id' => $request->user_id, 'is_expire' => 0])->where('created_at', '>=', date('Y-m-d h:i:s',strtotime(Carbon::now()->addMinutes(-30))))->orderBy('id', 'DESC')->first();
            if ($data->otp == $request->otp) {
                $data->is_expire = 1;
                $data->save();
                $user = AppUser::find($request->user_id);
                $user->is_verify = 1;
                $user->save();
                 return response()->json([
                    'success'=> true,
                    'message' => 'usre register successfully',
                    'code' => 200,
                    'data' => array(
                        'user' => $user
                    )
                ]);
            } else {
                return response()->json([
                    'success'=>false,
                    'message' => 'Otp Not Match',
                    'code' => 204,
                    'data' => array()
                ]);
            }
        }
        return response()->json([
            'success'=>false,
            'message' => 'Otp Not Found',
            'code' => 204,
            'data' => array()
        ]);
    }
    public function Resendotp(Request $request)
    {
        $rules = [
            "user_id" => "required",
        ];
        $validator = Validator::make($request->all(), $rules);

       if ($validator->fails()) {
            return response()->json([
                'code'=>204,
                'success'   => false,
                'message' => $validator->errors()->first(),
                'data'=>array()
            ] );
        
        }
        $user = Appuser::where(['id' => $request->user_id])->first();
        DB::update('update app_user_otp set is_expire = 1 where user_id = ' . $user->id);
        
        $data = [];
        $data['user_id'] = $user->id;
        $data['otp'] = $request->input = rand(100000, 999999);
        $data['created_at']= date('Y-m-d h:i:s',strtotime(Carbon::now()));
        AppUserOtp::create($data);


        $name=$user->first_name;
        $email=$user->email;
        $otp=$data['otp'];
        $url= url('/');
        $appname=config('app.name');
        $d = EmailTemplate::where('title','=','Resendotp')->first();
        $output = str_replace(
            array('##fristname##', '##email##', '##otp##','##url##','##appname##'),
            array($name, $email, $otp,$url,$appname),
            $d->template
        );
        // $mail['template']=$output;  
        $mail['template'] ='<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
        </head>
        <body>
        '.$output.'</body>
        </html>';
        // return $dataa;
        Mail::to($user['email'])->send(new SendMail($mail));
       
       return response()->json([
            'success'=>true,
            'message' => 'otp resend successfully',
            'code' => 200,
            'data' => array(
                'user' => $user
            )
        ]);
    }


    public function login(Request $request)
    {
        $rules = [
            "email" => "required",
            "password" => "required",'min:6','max:20',
        ];
        $validator = Validator::make($request->all(), $rules);

       if ($validator->fails()) {
            return response()->json([
                'code'=>204,
                'success'   => false,
                'message' => $validator->errors()->first(),
                'data'=>array()
            ] );
        }
        $email = $request->input('email');
        $password = $request->input('password');

        $user = AppUser::where('email', '=', $email)->first();
        if (!$user) {
            return response()->json([
                'code'=>204,
                'success' => false,
                'message' => 'Login Fail, please check email id',
                'data' => array()
            ]);
        }
        if($user->is_blocked == 1){
            return response()->json([
                'code'=>204,
                'success' => false,
                'message' => 'Login Fail, Your Account is blocked by Admin',
                'data' => array()
            ]);
        }
        if (!Hash::check($password, $user->password)) {
            return response()->json([
                'code'=>204,
                'success' => false,
                'message' => 'Login Fail, pls check password',
                'data' => array()
            ]);
        }

        return response()->json([
            'code'=>200,
            'success' => true,
            'message' => 'login successfully',
            'data' => array(
                'user' => $user
            )
        ]);
    }


    public function changepassword(request $request)
    {
        
        $user = Appuser::where(['id' => $request->id])->first();
        $rules = [
            "id"=>"required",
            "old_password" => "required",
            "password" => "required|min:6|max:20",
            "confirm_password" => "required|same:password"
        ];
        $validator = Validator::make($request->all(), $rules);

       if ($validator->fails()) {
            return response()->json([
                'code'=>204,
                'success'   => false,
                'message' => $validator->errors()->first(),
                'data'=>array()
            ]);
        }
        //  $user=$request->user(); 
        if (Hash::check($request->old_password, $user->password)) {

            $user->update([
                'password' => Hash::make($request->password)
            ]);
            // return $user;
             return response()->json([
                'success'=>true,
                'code'=>200,
                'message' => 'password updated successfulluy',
                'data' => array(
                    'user' => $user
                )
            ]);
        } else {

            return response()->json([
                'success'=>false,
                'code'=>204,
                'message' => 'old password does not match',
                'data' => array(
                    'user' => $user
                )
            ]);
        }   
    }

    public function updateprofile(request $request)
    {
        $user = AppUser::find($request->id);
        $rules = [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'mobile_no' => ['required', 'max:12'],
            'company_name' => ['required',],
            'country' => ['required',],
            'state' => ['required',],
            'city' => ['required',],


        ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
            return response()->json([
                'code'=>204,
                'success'   => false,
                'message' => $validator->errors()->first(),
                'data'=>array()
            ]);
        }
        if ($user) {
            $user->first_name = $request->first_name;
            $user->last_name    = $request->last_name;
            $user->mobile_no = $request->mobile_no;
            $user->company_name = $request->company_name;
            $user->country = $request->country;
            $user->state    = $request->state;
            $user->city    = $request->city;
            if ($image = $request->file('image')) {
                $destinationPath = 'public/Api_image/profile/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $user['image'] = "$profileImage";
            }
                

            $user->update();
        }
         return response()->json([
            'success'=>true,
            'message' => 'user update successfulluy',
            'code' => 200,
            'data' => array(
                'user' => $user
            )
        ]);
    }
    public function Notification()
    {
        
     $Notification = Notification::limit(20)->orderBy('id', 'desc')->get()->map(function ($data) {
            $data['description'] = str_replace('&nbsp;', ' ',strip_tags($data['description']));
            return $data;
        });
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'successfully got it',
            'data' => array(
            'Notification' => $Notification,
            )
        ]);
    }
    public function forgotpassword(request $request)
    {
        $email  = $request->only('email');
        $user = AppUser::where('email', $email)->first();
        // return $user;
        $validator = Validator::make($email, [
            'email' => "required|email|exists:app_users,email"
        ]);

       if ($validator->fails()) {
            return response()->json([
                'code'=>204,
                'success'   => false,
                'message' => $validator->errors()->first(),
                'data'=>array()
            ]);
        } else {
            $data = [];
            $data['forget_code'] = "123456"??rand(100000, 999999);
            $data['created_at']= date('Y-m-d h:i:s',strtotime(Carbon::now()));
            AppUser::where(['email' => $request->email])->update($data);

            $name=$user->first_name;
            $email=$user->email;
            $otp=$data['forget_code'];
            $url= url('/');
            $appname=config('app.name');
            $d = EmailTemplate::where('title','=','fargot-password')->first();
            $output = str_replace(
                array('##fristname##', '##email##', '##fargotcode##','##url##','##appname##'),
                array($name, $email, $otp,$url,$appname),
                $d->template
            );
            // $mail['template']=$output;  
            $mail['template'] ='<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Document</title>
            </head>
            <body>
            '.$output.'</body>
            </html>';
            // return $dataa;
            Mail::to($user['email'])->send(new SendMail($mail));
            return response()->json([
                'code'=>200,
                'success' => true,
                'message' => 'otp send tour email address pleasecheck ',
                'data' => array()
            ]);
        }
    }

    public function validateotp(request $request)
    {
        $rules = [
          
            'email' => ['required'],
            'forget_code' => ['required','min:6','max:6'],
        ];
        $validator = Validator::make($request->all(), $rules);   
       if ($validator->fails()) {
            return response()->json([
                'code'=>204,
                'success'   => false,
                'message' => $validator->errors()->first(),
                'data'=>array()
            ]);
        }

        $email = $request->input('email');
        $forget_code = $request->input('forget_code');  
        if ( AppUser::where( 'email' , '=', $email)->where('forget_code', '=',$forget_code)->where('updated_at', '>=', date('Y-m-d h:i:s',strtotime(Carbon::now()->addMinutes(-30))))->first()) {
            $user = AppUser::where( 'email' , '=', $email)->where('updated_at', '>=', date('Y-m-d h:i:s',strtotime(Carbon::now()->addMinutes(-30))))->update(['forget_code'=>null]);
            
            return response()->json([
                'success' => true,
                'code'=>200,
                'message' => 'otp validate',
                'data' => array(
                    'email'=>$email,
                )
            ]);
        }
        else{
            return response()->json([
                'success' => false,
                'code'=>204,
                'message' => ' Fail, pls check otp',
                'data' => array()
            ]);
        }
        return response()->json([
            'success' => false,
            'code'=>204,
            'message' => 'otp not found',
            'data' => array()
        ]);
        
    }
    
    public function resetpassword(Request $request)
    {
        $rules = [
            'email' => 'required|email|exists:app_users',
            "password" => "required|min:6|max:8",
            "conform_password" => "required|same:password"
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'code'=>204,
                'success'   => false,
                'message' => $validator->errors()->first(),
                'data'=>array()
            ]);
        }
         $user = AppUser::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
         return response()->json([
            'success' => true,
            'code'=>200,
            'message' => 'your password change successfully',
            'data' => array()
        ]);
    }
   public function showprofile(Request $request)
    {
        $rules = [
            'id' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'code'=>204,
                'success'   => false,
                'message' => $validator->errors()->first(),
                'data'=>array()
            ]);
        }
        $user=AppUser::get();
       if($request->has('id'))
       {
           $user=$user->where('id',$request->id);
       }
         return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'success fully got it',
            'data' => array(
                'user'=>$user,
            )

        ]);
    }
    public function block_app_user(Request $request){
        $rules = [
            'id' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'code'=>204,
                'success'   => false,
                'message' => $validator->errors()->first(),
                'data'=>array()
            ]);
        }
        $user = AppUser::where('id', $request->id)->update(['is_blocked' => 1]);
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'successfully blocked user',
            'data' => array(
                'user'=>$user,
            )

        ]);
    }
    
    public function unblock_app_user(Request $request){
        $rules = [
            'id' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'code'=>204,
                'success'   => false,
                'message' => $validator->errors()->first(),
                'data'=>array()
            ]);
        }
        $user = AppUser::where('id', $request->id)->update(['is_blocked' => 0]);
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'successfully unblock user',
            'data' => array(
                'user'=>$user,
            )

        ]);
    }
}
