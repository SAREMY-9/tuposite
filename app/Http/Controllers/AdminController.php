<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use constGuards;

use constDefaults;

use App\Models\Admins;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Hash;

use Illuminate\Support\Str;

use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    
    public function loginHandler(Request $request ){

        $fieldType= filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if($fieldType=='email'){

        $request->validate([
        'login_id'=>'required|email|exists:admins,email',
        'password'=>'required|min:8|max:45'

        ],
    [

         'login_id.required'=>'Email or Username is required',
         'login_id.email'=>'Invalid email address',
         'login_id.exists'=>'Email does not exist in our system',
         'password.required'=>'Password is required'
 
    ]);
        }

        else{


            $request->validate([
                'login_id'=>'required|exists:admins,username',
                'password'=>'required|min:8|max:45'

            ],[


                'login_id.required'=>'Email or Username is required',
                'login_id.exists'=>'Username does not exist in our system',
                'password.required'=>'Password is required'
            ]);
        }

        //after validation is  done now check the credentials entered
        //continue from here sasa kesho 19/03/24

        $creds= array(

            $fieldType=>$request->login_id,
            'password'=>$request->password
        );

        if(Auth::guard('admin')->attempt($creds)){

            return redirect()->route('admin.home');
        }   else {

            session()->flash('fail','Incorect credentials');
            return redirect()->route('admin.login');
        }
    }
    

    public function logoutHandler(Request $request){
        Auth::guard('admin')->logout(); 
        session()->flash('fail','You are Logged out'); 
        return redirect()->route('admin.login');


    }


    //password reset links


    public function sendPasswordResetLink(Request $request){
         $request->validate([
            'email'=>'required|email|exists:admins,email'
         ],[

            'email.required'=>'The :attribute is required',
            'email.email'=>'Invalid email address',
            'email.exists'=>'Email does not exist in our system'
         ]);


         //get admin details

         $admin= Admins::where('email',$request->email)->first();


         //generate tokens

         $token =base64_encode(Str::random(64));

         //check if there's an existing token in password_reset_tokentable

         $oldToken= DB::table('password_reset_tokens')
                    ->where(['email'=>$request->email,'guard'=>constGuards::ADMIN])
                    ->first();


                    if($oldToken){

                        //update token

                        DB::table('password_reset_tokens')
                        ->where(['email'=>$request->email,'guard'=>constGuards::ADMIN])
                        ->update([

                            'token'=>$token,
                            'created_at'=>Carbon::now()
                        ]);
                    }

                    else {

                        //there's no token found
                        DB::table('password_reset_tokens')->insert([
                            'email'=>$request->email,
                            'guard'=>constGuards::ADMIN,
                            'token'=>$token,
                            'created_at'=>Carbon::now()
                        ]);
                    }

                    $actionLink = route('admin.reset-password',['token'=>$token,'email'=>$request->email]);

                    $data = array(

                        'actionLink' => $actionLink,
                        'admin'=>$admin
                    );

                    $mail_body = view('email-template.admin-forgot-email-template', $data)->render();

                    $mailConfig = array(


                        'mail_from_email'=>getenv('EMAIL_FROM_ADDRESS'),
                        'mail_from_name'=>getenv('EMAIL_FROM_NAME'),
                        'mail_recipient_email' => $admin->email,
                        'mail_recipient_name' => $admin->name,
                        'mail_subject' => 'Reset password',
                        'mail_body' =>$mail_body

                    );

                    if( sendEmail($mailConfig)){

                        session()->flash('success','We have emailed your password reset link');
                        return redirect()->route('admin.forgot-password');



                    }

                    else  {


                        ($mailConfig);

                        session()->flash('fail','Something went wrong ');
                        return redirect()->route('admin.forgot-password');
                    }


    }



    public function resetPassword(Request $request, $token=null){


        $check_token = DB::table('password_reset_tokens')
                       ->where(['token'=>$token, 'guard'=>constGuards::ADMIN])
                       ->first();

                       if($check_token){

                        //if token exist check if the token is not expired

                        $diffMins =Carbon::createdFromFormat('Y-m-d W:1:s', $check_token->created_at)->diffInMins
                         (Carbon::now());

                         if($diffMins > constDefaults::tokenExpiredMinutes){

                            //token is expired

                            session()->flash('fail','Token expired, request another reset password link.');
                            return redirect()->route('admin.forgot-password',['token'=>$token]);



                         }

                         else{

                            return view('back.pages.admin.auth.reset-password')->with(['token'=>$token]);

                         }

                       }  
                       
                       else{

                        session()->flash('fail','Invalid token, Request another password link');
                        return redirect()->route('admin.forgot-password',['token'=>$token]);

                       }
    }

     //This function we're yet to confirm it's functioning coz of the invalid address error
   


}
