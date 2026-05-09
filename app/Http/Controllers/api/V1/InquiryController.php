<?php

namespace App\Http\Controllers\api\V1;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactInquiry;
use App\Models\DealerInquiry;
use App\Models\EmailTemplate;
use App\Models\Appointment;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
// use Validator;
use Illuminate\Support\Facades\Validator;

use function Composer\Autoload\includeFile;

class InquiryController extends Controller
{
    public function catalogue(request $request)
    { 
        $validator = Validator::make(
            $request->all(),
            [
                'first_name' => 'required|min:3|max:255',
                'last_name' => 'required|min:3|max:255',
                'email' => 'required',
                'phone' => 'required',
                'category' => 'required'
            ]
        );
         if ($validator->fails()) {
            return response()->json([
                'code'=>204,
                'success'   => false,
                'message' => $validator->errors()->first(),
                'data'=>array()
            ] );
        
        }

        $data = [];
        $data['name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['type'] = 'category';
        $data['type_id'] = $request->category;
        $data['type']='Catalogue';

        $inquiry = ContactInquiry::create($data);
        // return $inquiry;    
        $name = $inquiry->name;
        $lastname = $inquiry->last_name;
        $email = $inquiry->email;
        $phone = $inquiry->phone;
        $type = $inquiry->type;
        $type_id = $inquiry->type_id;
        $url = url('/');    
        $appname = config('app.name');
        $d = EmailTemplate::where('title', '=', 'Catalogue-inquiry-user')->first();
        // return $d;      
        $output = str_replace(
            array('##firstname##', '##lastname##', '##url##', '##appname##'),
            array($name, $lastname, $url, $appname),
            $d->template
        );
        // $mail['template'] = $output;
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
        // Mail::to($inquiry['email'])->send(new SendMail($mail));

        $admintemlate = EmailTemplate::where('title', '=', 'catelogues-inquiry-admin')->first();
        $adminoutput = str_replace(
            array('##fristname##', '##lastname##', '##email##', '##phone##', '##type##', '##url##', '##appname##'),
            array($name, $lastname, $email, $phone, $type, $url, $appname),
            $admintemlate->template
        );
        // $adminmail['template'] = $adminoutput;
        $adminmail['template'] ='<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
        </head>
        <body>
        '.$adminoutput.'</body>
        </html>';
        // return $adminmail;
        $amail = Config('app.receved_mail_address');
        foreach ([$amail] as $admin) {
            // Mail::to($admin)->send(new SendMail($adminmail));
        }
            return response()->json([
            'Success'=>true,
            'message' => 'form submited successfully',
            'code' => 200,
            'data' => array(
                //    'catalogue'=>$catalogue
            )
        ]);
    }
    public function catalogue2(request $request)
    { 
        $validator = Validator::make(
            $request->all(),
            [
                'first_name' => 'required|min:3|max:255',
                'last_name' => 'required|min:3|max:255',
                'email' => 'required',
                'phone' => 'required',
                'product' => 'required'
            ]
        );
         if ($validator->fails()) {
            return response()->json([
                'code'=>204,
                'success'   => false,
                'message' => $validator->errors()->first(),
                'data'=>array()
            ] );
        
        }

        $data = [];
        $data['name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['type_id'] = $request->product;
        $data['type']='Product';

        $inquiry = ContactInquiry::create($data);
        // return $inquiry;    
        $name = $inquiry->name;
        $lastname = $inquiry->last_name;
        $email = $inquiry->email;
        $phone = $inquiry->phone;
        $type = $inquiry->type;
        $type_id = $inquiry->type_id;
        $url = url('/');    
        $appname = config('app.name');
        $d = EmailTemplate::where('title', '=', 'Catalogue-inquiry-user')->first();
        // return $d;      
        $output = str_replace(
            array('##firstname##', '##lastname##', '##url##', '##appname##'),
            array($name, $lastname, $url, $appname),
            $d->template
        );
        // $mail['template'] = $output;
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
        // Mail::to($inquiry['email'])->send(new SendMail($mail));

        $admintemlate = EmailTemplate::where('title', '=', 'catelogues-inquiry-admin')->first();
        $adminoutput = str_replace(
            array('##fristname##', '##lastname##', '##email##', '##phone##', '##type##', '##url##', '##appname##'),
            array($name, $lastname, $email, $phone, $type, $url, $appname),
            $admintemlate->template
        );
        // $adminmail['template'] = $adminoutput;
        $adminmail['template'] ='<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
        </head>
        <body>
        '.$adminoutput.'</body>
        </html>';
        // return $adminmail;
        $amail = Config('app.receved_mail_address');
        foreach ([$amail] as $admin) {
            // Mail::to($admin)->send(new SendMail($adminmail));
        }
            return response()->json([
            'Success'=>true,
            'message' => 'form submited successfully',
            'code' => 200,
            'data' => array(
                //    'catalogue'=>$catalogue
            )
        ]);
    }
    public function quotes(request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:3|max:255',
                'last_name' => 'required|min:3|max:255',
                'email' => 'required',
                'phone' => 'required',
                'grade' => 'required',
                'qty' => 'required',
                'Boxes' => 'required',
                'message' => 'required',
            ]
        );
         if ($validator->fails()) {
            return response()->json([
                'code'=>204,
                'success'   => false,
                'message' => $validator->errors()->first(),
                'data'=>array()
            ]);
        
        }

        $data = [];
        $data['name'] = $request->name;
        $data['last_name'] = $request->last_name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['grade'] = $request->grade;
        $data['qty'] = $request->qty;
        $data['Boxes'] = $request->Boxes;
        $data['message'] = $request->message;
        $data['type_id']=$request->cat_id;
        $data['type']='product';
        $inquiry = ContactInquiry::create($data);
        // return $inquiry;
        $name = $inquiry->name;
        $lastname = $inquiry->last_name;
        $email = $inquiry->email;
        $phone = $inquiry->phone;
        $grade = $inquiry->grade;
        $qty = $inquiry->qty;
        $boxes = $inquiry->Boxes;
        $message = $inquiry->message;
        $url = url('/');
        $appname = config('app.name');
        $d = EmailTemplate::where('title', '=', 'quotes-inquiry-user')->first();
        $output = str_replace(
            array('##name##', '##lastname##', '##url##', '##appname##'),
            array($name, $lastname, $url, $appname),
            $d->template
        );
        // $mail['template'] = $output;
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
        // return $mail;
        // Mail::to($inquiry['email'])->send(new SendMail($mail));
        //admin -quotes fro send email to admin
        $admintemlate = EmailTemplate::where('title', '=', 'quotes-inquiry-admin')->first();
        $adminoutput = str_replace(
            array('##fristname##', '##lastname##', '##email##', '##phone##', '##grade##', '##qty##', '##boxes##', '##message##'),
            array($name, $lastname, $email, $phone, $grade, $qty, $boxes, $message),
            $admintemlate->template
        );
        // $adminmail['template'] = $adminoutput;
        $adminmail['template'] ='<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
        </head>
        <body>
        '.$adminoutput.'</body>
        </html>';
        // return $adminmail;
        $amail = Config('app.receved_mail_address');
        foreach ([$amail] as $admin) {
            // Mail::to($admin)->send(new SendMail($adminmail));
        }
       return response()->json([
            'success'=>true,
            'message' => 'form submited successfully',
            'code' => 200,
            'data' => array()
        ]);
    }

    public function delear(request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'first_name' => 'required|min:3|max:255',
                'last_name' => 'required|min:3|max:255',
                'email' => 'required',
                'phone' => 'required',
                'company_name' => 'required',
                'country' => 'required',
                'state' => 'required',
                'city' => 'required',
                'message' => 'required',
            ]
        );
         if ($validator->fails()) {
            return response()->json([
                'code'=>204,
                'success'   => false,
                'message' => $validator->errors()->first(),
                'data'=>array()
            ]);
         }
            
        $data = [];
        $data['company_name'] = $request->company_name;
        $data['name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['country'] = $request->country;
        $data['city'] = $request->city;
        $data['state'] = $request->state;
        $data['message'] = $request->message;
        $data['type']= 'dealer';
        $inquiry = DealerInquiry::create($data);
        // return $inquiry;
        $name = $inquiry->name;
        $lastname = $inquiry->last_name;
        $companayname = $inquiry->company_name;
        $email = $inquiry->email;
        $phone = $inquiry->phone;
        $country = $inquiry->country_id;
        $city = $inquiry->city_id;
        $state = $inquiry->state_id;
        $message = $inquiry->message;
        $url = url('/');
        $appname = config('app.name');
        $d = EmailTemplate::where('title', '=', 'Dealer-inquiry-user')->first();
        $output = str_replace(
            array('##fristname##', '##lastname##', '##url##', '##appname##'),
            array($name, $lastname, $url, $appname),
            $d->template
        );
        // $mail['template'] = $output;
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
    //    return $mail;
        // Mail::to($inquiry['email'])->send(new SendMail($mail));

        // admin mail send template
        $admintemlate = EmailTemplate::where('title', '=', 'dealer-inquiry-admin')->first();
        
        $adminoutput = str_replace(
            array('##fristname##', '##lastname##', '##companyname##', '##email##', '##phone##', '##country##', '##city##', '##state##', '##message##', '##url##', '##appname##'),
            array($name, $lastname, $companayname, $email, $phone, $country, $city, $state, $message, $url, $appname),
            $admintemlate->template      
        );
      
        // $adminmail['template'] = $adminoutput;  
        $adminmail['template'] ='<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
        </head>
        <body>
        '.$adminoutput.'</body>
        </html>';
        // return $adminmail;
        $amail = Config('app.receved_mail_address');
        foreach ([$amail] as $admin) {
            // Mail::to($admin)->send(new SendMail($adminmail));
        }
       return response()->json([
            'success'=>true,
            'message' => 'form submited successfully',
            'code' => 200,
            'data' => array()
        ]);
    
}
     public function appointment(request $request)
     {
        $validator = Validator::make(
            $request->all(),
            [
                'first_name' => 'required|min:3|max:255',
                'last_name' => 'required|min:3|max:255',
                'email' => 'required',
                'phone' => 'required',
                'subject' => 'required',
                'appointment_date' => 'required',
                'message' => 'required',
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'code'=>204,
                'success'   => false,
                'message' => $validator->errors()->first(),
                'data'=>array()
            ] );
        
        }
        $data = [];
        $data['fristname'] = $request->first_name;
        $data['lastname'] = $request->last_name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['subject'] = $request->subject;
        $data['appointment_date'] = $request->appointment_date;
        $data['message'] = $request->message;
        $inquiry = Appointment::create($data);


        $name = $inquiry->fristname;
        $lastname = $inquiry->lastname;
        $email = $inquiry->email;
        $phone = $inquiry->phone;
        $subject = $inquiry->subject;
        $date = $inquiry->appointment_date;
        $message = $inquiry->message;
        $url = url('/');
        $appname = config('app.name');
        $d = EmailTemplate::where('title', '=', 'appointment-inquiry-user')->first();
        $output = str_replace(
            array('##fristname##', '##lastname##', '##appname##', '##appointment-date##','##subject##', '##url##'),
            array($name, $lastname, $appname, $date,$subject, $url),
            $d->template
        );
        // $mail['template'] = $output;
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
        // return $mail;
        // Mail::to($inquiry['email'])->send(new SendMail($mail));

        // admin mail send template
        $admintemlate = EmailTemplate::where('title', '=', 'appointment-inquiry-admin')->first();
        $adminoutput = str_replace(
            array('##fristname##', '##lastname##', '##email##', '##phone##', '##subject##', '##date##', '##message##'),
            array($name, $lastname, $email, $phone, $subject, $date, $message),
            $admintemlate->template
        );
        // $adminmail['template'] = $adminoutput;
        $adminmail['template'] ='<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
        </head>
        <body>
        '.$adminoutput.'</body>
        </html>';
        // return $adminmail;
        $amail = Config('app.receved_mail_address');
        foreach ([$amail] as $admin) {
            // Mail::to($admin)->send(new SendMail($adminmail));
        }
        return response()->json([
            'success'=>true,
            'message' => 'form submited successfully',
            'code' => 200,
            'data' => array()
        ]);
    }
}