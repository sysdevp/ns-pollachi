<?php

namespace App\Http\Controllers;
// use Mail;
 use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use App\Models\MailSetting;
use App\Models\Bank;


use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Input;

class MailSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mailsetting=MailSetting::all();
        return view('admin.settings.mailsetting.view',compact('mailsetting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.settings.mailsetting.add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|unique:banks,name,NULL,id,deleted_at,NULL',
        //     'code' => 'required|unique:banks,code,NULL,id,deleted_at,NULL',
        // ])->validate();

        $validator = Validator::make($request->all(), [
            'mail_driver' => 'required|unique:mail_settings,mail_driver,id,deleted_at,NULL',
            'mail_host' => 'required|unique:mail_settings,mail_host,id,deleted_at,NULL',
            'mail_port' => 'required|unique:mail_settings,mail_port,id,deleted_at,NULL',
            'mail_username' => 'required|unique:mail_settings,mail_username,id,deleted_at,NULL',
            'mail_password' => 'required|unique:mail_settings,mail_password,id,deleted_at,NULL',
            'mail_encryption' => 'required|unique:mail_settings,mail_encryption,id,deleted_at,NULL',
        ])->validate();

        $mailsetting = new MailSetting();
        $mailsetting->mail_driver    = $request->mail_driver;
        $mailsetting->mail_host    = $request->mail_host;
        $mailsetting->mail_port    = $request->mail_port;
        $mailsetting->mail_username    = $request->mail_username;
        $mailsetting->mail_password    = $request->mail_password;
        $mailsetting->mail_encryption    = $request->mail_encryption;


        $mailsetting->created_by = 0;
        $mailsetting->updated_by = 0;
      if ($mailsetting->save()) {
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $mailsetting=MailSetting::find($id);
        return view('admin.settings.mailsetting.show',compact('mailsetting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $mailsetting=MailSetting::find($id);
       // print_r($mailsetting);exit;
        return view('admin.settings.mailsetting.edit',compact('mailsetting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $mailsetting=MailSetting::find($id);

        $validator = Validator::make($request->all(), [
            'mail_driver' => 'required|unique:mail_settings,mail_driver,'.$id.',id,deleted_at,NULL',
            'mail_host' => 'required|unique:mail_settings,mail_host,'.$id.',id,deleted_at,NULL',
            'mail_port' => 'required|unique:mail_settings,mail_port,'.$id.',id,deleted_at,NULL',
            'mail_username' => 'required|unique:mail_settings,mail_username,'.$id.',id,deleted_at,NULL',
            'mail_password' => 'required|unique:mail_settings,mail_password,'.$id.',id,deleted_at,NULL',
            'mail_encryption' => 'required|unique:mail_settings,mail_encryption,'.$id.',id,deleted_at,NULL',
        ])->validate();

        $mailsetting->mail_driver    = $request->mail_driver;
        $mailsetting->mail_host    = $request->mail_host;
        $mailsetting->mail_port    = $request->mail_port;
        $mailsetting->mail_username    = $request->mail_username;
        $mailsetting->mail_password    = $request->mail_password;
        $mailsetting->mail_encryption    = $request->mail_encryption;


        $mailsetting->created_by = 0;
        $mailsetting->updated_by = 0;
      if ($mailsetting->save()) {
            return Redirect::back()->with('success', 'Updated Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mailsetting=MailSetting::find($id);

        if ($mailsetting->delete()) {
            return Redirect::back()->with('success', 'Deleted successfully');
         }else{
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }
    public function send_email(Request $request,$id)
    {
       
        $mailsetting=MailSetting::find($id);

        Config::set('mail.MAIL_DRIVER',$mailsetting->mail_driver);
        Config::set('mail.MAIL_HOST',$mailsetting->mail_host);
        Config::set('mail.MAIL_PORT',$mailsetting->mail_post);
        Config::set('mail.MAIL_ENCRYPTION',$mailsetting->mail_encryption);
        Config::set('mail.MAIL_USERNAME',$mailsetting->mail_username);
        Config::set('mail.MAIL_PASSWORD',$mailsetting->mail_password);
        
        $data = array(
            'name' 		=> "Mazenet", 
            'email'		=> $request->send_email, 
            'message'	=> "Checking Email",
            //Send Request is send_feedback
            'request'	=> 'send_feedback'
        );

        try {
            Mail::to($request->send_email)->send(new SendMail($data));
            if (!Mail::failures()) {
                $response['message'] = "success";
            } else {
                $response['message'] = "failed";
            }

        } catch (Exception $e) {
            $response['message'] = "Error";
        }

    	return redirect()->back()->with('success', 'Email sent successfully. Check your email.');
    }
}
