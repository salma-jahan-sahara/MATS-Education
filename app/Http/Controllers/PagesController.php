<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Category;
use App\Models\Message;
use App\Models\User;
use App\Models\Course;
use App\Models\Userlogin;
use App\Models\Forum;
use App\Models\Forumcomment;
use App\Models\Instructor;
use App\Models\Certificate;
use App\Models\Student_course;
// use App\Models\Coursecomplete;
use App\Models\Rating;
use App\Models\Topic;
use App\Models\Quiz;
use App\Models\Payment;
use App\Models\Employee;


use Mail;
use App\Mail\CertificateMail;
use App\Mail\CertMail;

use Intervention\Image\Facades\Image;
use Session;
// use DateTime;

use Illuminate\Http\Request;
use PDF;


class PagesController extends Controller
{

    
    





    public function index(Request $req){

        $s_id=$req->session()->get('id');//take it from session
        $en_courses = Student_course::where('st_id','=',$s_id)->get();

        $courses = Course::all();
        $categories = Category::all();
        $topics = Topic::all();
        $instructors = Instructor::all();
        $ratings = Rating::all();
        $categorieshead=Category::all();
        $courseshead=Course::all(); 

        return view('student.home')
        ->with('en_courses',$en_courses)
        ->with('courses',$courses)
        ->with('categories',$categories)
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead)
        ->with('ratings',$ratings)
        ->with('topics',$topics)
        ->with('instructors',$instructors);
        
        
    }
    public function signin(){
        $categorieshead=Category::all();
        $courseshead=Course::all(); 
        return view('student.signin')
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead);
    }
    public function signinsubmit(Request $req){
        $categories=Category::all();
        $courses=Course::all();
        $categorieshead=Category::all();
        $courseshead=Course::all(); 
            $req->validate(
                [
                    'uname'=>'required|min:3',
                    'pass'=>'required',
                ]
        );
        $ul=Userlogin::where ('u_username', $req->uname)
        ->where ('u_password', md5($req->pass))
        ->first();
        
        $msg="";
        if($ul)
        {
          
        $ul->u_active="Active";
        $ul->save();

            session()->put('id', $ul->id);
            if($ul->u_type=="student"){

                $st=Student::where('u_id', $ul->id)->first();
                

                session()->put('name', $ul->u_name);
                session()->put('uname', $ul->u_username);
                session()->put('type', $ul->u_type);
                session()->put('id2', $st->id);
                session()->put('pro_pic', $ul->u_pro_pic);

                


                return redirect()->route('home')
                
            ->with('ul', $ul)
            ->with('courses', $courses)
            ->with('categories', $categories)
            ->with('courseshead', $courseshead)
            ->with('categorieshead', $categorieshead);
             

            }
            else if($ul->u_type=="instructor"){
                session(['username'=>$ul->u_username]);
                session(['userid'=>$ul->id]);

                
                session()->put('name', $ul->u_name);
                session()->put('uname', $ul->u_username);
                session()->put('type', $ul->u_type);
                session()->put('pro_pic', $ul->u_pro_pic);
               
                return redirect()->route('instructor.home');

            }
            else if($ul->u_type=="admin"){
                session()->put('name', $ul->u_name);
                session()->put('uname', $ul->u_username);
                session()->put('type', $ul->u_type);
                session()->put('pro_pic', $ul->u_pro_pic);
               
                return redirect()->route('admin.index');

            }
          
            
        }
        else{ 

          
            session()->put('msg', 'Student NOT Found!');
            return back();}
       
        
        // return "<h1>$req->uname's password is $req->pass!</h1>";
    }

    public function signout(Request $req){
        
        $st_id= $req->session()->get('id');
        $ul =Userlogin::where('id', $st_id)->first();

        $ul->u_active="Away";
        $ul->save();
        session()->flush();
        return redirect(route('home'));
    }

    public function st_head(Request $req){

        // $categories=Category::all();
        $categorieshead=Category::all();
        $courseshead=Course::all();        
        return view('layouts.app1')
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead);
    }
    public function st_headlr(){
        $categorieshead=Category::all();
        $courseshead=Course::all();    
        return view('includes.headlogreg')
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead);
    }
    
    public function st_profile(Request $req){
        $categorieshead=Category::all();
        $courseshead=Course::all(); 
        $categories=Category::all();
        // return view('layouts.app1')

        $ul=Userlogin::where('id', $req->session()->get('id'))->first();

        if($ul->u_type=="student"){
            $students =Student::where('id','=',$ul->u_id)        ->first();

        }
        

        

        return view('student.profile')
        ->with('students', $students)
        ->with('ul', $ul)
        ->with('categories', $categories)
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead);
    }


    public function course(Request $req){
        
        $categorieshead=Category::all();
        $courseshead=Course::all(); 
        $instructors=Instructor::all();  
        $ratings = Rating::all();
        $pccid=$req->c_id;//take it dynamically, course id
        $pctid=$req->t_id;
        $quizzes=Quiz::where('q_topic_fk','=',$pctid)->get();
        $topics=Topic::where('t_course_fk','=',$pccid)->get();
        $courses =Course::where('id','=',$pccid)->first();
        $stcourse=Student_course::where('st_id',$req->session()->get('id'))
        ->where('c_id', $pccid)->first();
        if($stcourse){$access="ache";}
        else{$access="nai";}
        $userlogins =Userlogin::where('id','=',$req->session()->get('id'))
        ->first();
        // $students=Student::all();
        return view('student.course')
        ->with('quizzes', $quizzes)
        ->with('userlogins', $userlogins)
        ->with('courses', $courses)
        ->with('ratings', $ratings)
        ->with('topics', $topics)
        ->with('instructors', $instructors)
        ->with('pctid', $pctid)
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead)
        ->with('access', $access)
        ->with('stcourse', $stcourse);
    }
    public function changepass(Request $req){
        $categorieshead=Category::all();
        $courseshead=Course::all(); 
        $categories=Category::all();
        $userlogins =Userlogin::where('id','=',$req->session()->get('id'))
        ->first();
        // $students=Student::all();
        return view('student.changepass')
        ->with('userlogins', $userlogins)
        ->with('categories', $categories)
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead);
    }
    public function st_changepasssubmit(Request $req){
        $categorieshead=Category::all();
        $courseshead=Course::all(); 
        //update sql here
        $students =Student::where('id','=',$req->session()->get('id2'))        ->first();
        $userlogins =Userlogin::where('id', $req->session()->get('id'))->first();
        $req->validate(
            [
                'old_pass'=>'required',
                'new_pass'=>'required',    
                'cnew_pass'=>'required|same:new_pass'
            ],
            [//these are optional
                'old_pass.required'=>'Insert your previous Password',
                'new_pass.required'=>'Enter new strong Password',
                'cnew_pass.required'=>'Confirm your Password',
                'cnew_pass.same'=>'Password not MATCHED!',
            ]
    );

    $st_id= $req->session()->get('id');
    $userlogins =Userlogin::where('id', $st_id)
    ->where('u_password', md5($req->old_pass))->first();
    if($userlogins){
        $userlogins-> u_password=md5($req->new_pass);
        $userlogins->save();
        return view('student.profile')
    ->with('userlogins', $userlogins)
    ->with('students', $students)
    ->with('courseshead', $courseshead)
    ->with('categorieshead', $categorieshead);
    }
    else{
        $userlogins =Userlogin::where('id', $req->session()->get('id'))->first();
        $categories=Category::all();
        Session::flash('message', 'Previous Password is WRONG!'); 
        return view('student.changepass')
        ->with('userlogins', $userlogins)
        ->with('categories', $categories)
        ->with('students', $students)
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead);

    }

    
    // return "edited";
    
    }
    
    public function st_edit(Request $req){
        $categorieshead=Category::all();
        $courseshead=Course::all(); 
        
        $categories=Category::all();
        $ul=Userlogin::where('id', $req->session()->get('id'))->first();
        if($ul->u_type=="student"){
            $students =Student::where('id','=',$ul->u_id)        ->first();
        }
        // $students=Student::all();
        return view('student.edit')
        ->with('students', $students)
        ->with('ul', $ul)
        ->with('categories', $categories)
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead);
    }

    public function st_editsubmit(Request $req){
        $categorieshead=Category::all();
        $courseshead=Course::all(); 
        // $req->st_name;
        // $req->pass;
            $req->validate(
                [
                    'st_name'=>'required|regex:/^[a-z A-Z]+$/',
                    // 'st_email'=>'required',    
                    'st_phone'=>'required|starts_with: "01"|regex:/^[0-9]{11}+$/'
                ],
                [//these are optional
                    'st_name.required'=>'Insert your academic name',
                    'st_name.regex'=>'Name should contain only characters!',
                    // 'st_email.required'=>'Email Required',
                    // 'st_email.email'=>'Check your email format',
                    'st_phone.required'=>'Phone Number Required',
                    'st_phone.starts_with'=>'Phone number starts with 01 only!',
                    'st_phone.regex'=>'Only 11 digits of number is allowed!',
                ]
        );

        $st_id= $req->session()->get('id2');
        $students =Student::where('id', $st_id)->first();

        $students->st_name=$req->st_name;
        $students->st_email=$req->st_email;
        $students->st_phone=$req->st_phone;
        
        if($req->st_address != ""){
            $students->st_address=$req->st_address;}

        $students->save();
        session()->put('name', $req->st_name);
        $ul=Userlogin::where('id', $req->session()->get('id'))->first();
        // return "edited";
        return view('student.profile')
        ->with('students', $students)
        ->with('courseshead', $courseshead)
        ->with('ul', $ul)
        ->with('categorieshead', $categorieshead);
        // return "<h1>$req->name is submitted!</h1>";
    }
    
    public function st_signup(){
        $categorieshead=Category::all();
        $courseshead=Course::all(); 
        $categories=Category::all();
        $courses=Course::all();    
        // $students=Student::all();
        return view('student.signup')
        ->with('courses', $courses)
        ->with('categories', $categories)
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead);
        
    }

    public function st_signupsubmit(Request $req){
        $categorieshead=Category::all();
        $courseshead=Course::all(); 
        // $req->st_name;
        // $req->pass;
        $categories=Category::all();
        $courses=Course::all();    
            $req->validate(
                [
                    'st_name'=>'required|regex:/^[a-z A-Z.-]+$/',
                    'st_username'=>'required|min:3|max:20|unique:students,st_username',
                    'st_email'=>'required',                                    
                    'st_password'=>'required',
                    'st_confpassword'=>'required|same:st_password',
                    'pro_pic'=>'mimes:jpg,png,jpeg,bmp',
                    'st_phone'=>'required|starts_with: "01"|regex:/^[0-9]{11}+$/'
                ],
                [//these are optional
                    'st_name.required'=>'Insert your academic name',
                    'st_name.regex'=>'Name should contain only characters!',
                    'st_username.required'=>'Unique Username Required',
                    'st_username.unique'=>'Username already exists',
                    'st_email.required'=>'Email Required',
                    // 'st_email.email'=>'Check your email format',
                    'st_password.required'=>'Must give a password',
                    'st_confpassword.required'=>'Retype password to confirm',
                    'st_confpassword.same'=>'Not matched with password',
                    //'st_address.required'=>'Address Required',
                    'st_phone.required'=>'Phone Number Required',
                    'pro_pic.mimes'=>'Image Format Invalid!',
                    'st_phone.starts_with'=>'Phone number starts with 01 only!',
                    'st_phone.regex'=>'Only 11 digits of number is allowed!',
                ]
                
        );

        $ul =new Userlogin();
        $ul-> u_username=$req->st_username;
        $ul-> u_name=$req->st_name;


        if($req->file('pro_pic')){


            
        
               $loc = $req->file('pro_pic')->getClientOriginalName();
        
               $path = $req->file('pro_pic')->storeAs('storage/student/',$loc);
        

        

            // $locname = $req->st_username.time().'.'.$req->file('pro_pic')->extension();
            // $loc=$req->file('pro_pic')->storeAs('public/student',$locname);
            // $ul-> u_pro_pic=$locname;
        }
            else{}

           


        $ul-> u_type="student";
        // $ul-> u_id=$sts->id;
        $ul-> u_password=md5($req->st_password);
        $ul->save();

        $uls=Userlogin::where('u_username', '=', $req->st_username)->first();

        $st =new Student();
        if($req->file('pro_pic')){
        $st-> st_pro_pic=$loc;}
        
        $st-> st_name=$req->st_name;
        $st-> st_username=$req->st_username;
        $st-> st_email=$req->st_email;
        $st-> u_id=$uls->id;
        $st-> st_address=$req->st_address;
        $st-> st_phone=$req->st_phone;
        
        $st->save();

        $sts=Student::where('u_id',$uls->id)->first();

        $ul =Userlogin::where('u_username', $req->st_username)->first();

        $ul->u_id=$sts->id;
        $ul->save();

        session()->put('id', $ul->id);
        session()->put('name', $req->st_name);
        session()->put('uname', $req->st_username);
        session()->put('type', $ul->u_type);
        session()->put('id2', $sts->id);
        if($req->file('pro_pic')){session()->put('pro_pic', $loc);}
        else{session()->put('pro_pic', 'dp.png');}
        return redirect()->route('home')
        ->with('courses', $courses)
        ->with('categories', $categories)
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead);




    }

    public function picup(){
        $categorieshead=Category::all();
        $courseshead=Course::all(); 
        // return 1;
        $categories=Category::all();
        $courses=Course::all();
        return view('student.picup')
        ->with('courses', $courses)
        ->with('categories', $categories)
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead);
    }

    public function picupsub(Request $req){
        $categorieshead=Category::all();
        $courseshead=Course::all(); 
        $this->validate($req,
            [
                'pro_pic'=>'mimes:jpg,png,jpeg,bmp'
            ],
            [//these are optional
                'pro_pic.mimes'=>'Image Format Invalid!',
            ]
            
    );   
        return $req->file('pro_pic')
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead)->getClientOriginalName();
    }


public function meslistcon(Request $req){
    $categorieshead=Category::all();
    $courseshead=Course::all(); 
    $req->session()->put('other', $req->id);
    return redirect('/message#bottom');
    }


    public function message(Request $req){ 
        $categorieshead=Category::all();
        $courseshead=Course::all(); 
        if(Session::get('other')){}
        else{$req->session()->put('other', 1);}
        
        $me=Session::get('id');
        $other=Session::get('other');
        $msg=Message::whereIn('sender_un', array($me, $other)) 
        ->whereIn('receiver_un', array($me, $other))
        ->orderBy('id', 'ASC')->get();

        $msgl=Message::where('sender_un', '=', $me)
        ->orWhere('receiver_un', '=', $me)
        ->orderBy('id', 'DESC')->get();

        // $msg=Message::where('sender_un', $me) //if i(rec) am 3, you(sender) are 5
        // ->where('receiver_un', $me)
        // ->orderBy('id', 'ASC')->get();
        $msgs=Message::all();
        $categories=Category::all();
        $userlogins =Userlogin::all();
        return view('student.message')
        ->with('msg', $msg)
        ->with('msgl', $msgl)
        ->with('userlogins', $userlogins)
        ->with('categories', $categories)
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead);
    }
    
    public function messagesub(Request $req){
        $categorieshead=Category::all();
        $courseshead=Course::all(); 
        $me=Session::get('id');
        $other=Session::get('other');
        if($req->do=="m_in"){
        $msg =new Message();
        $msg-> message=$req->messagein;
        $msg-> sender_un=$me;//$req->uname;
        $msg-> receiver_un=$other;//$req->id;
        $msg->save();
        return redirect('/message')
        ->with('msg', $msg)
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead);
    }
        else{
            
            $userlogins =Userlogin::where('id','=',$req->messagesearch)
            ->orWhere('u_username', '=', $req->messagesearch)
            ->orWhere('u_name', '=', $req->messagesearch)->first();
            if($userlogins){
                if($userlogins->id==Session::get('id')){
                    $req->session()->put('other', 1);
                }
                else{
                    $req->session()->put('other', $userlogins->id);
                }
            
            $other=Session::get('other');
            return redirect('/message')
            ->with('courseshead', $courseshead)
            ->with('categorieshead', $categorieshead);
        
        }
            else {return "user not found!";}
        }
        
        // ->with('userlogins', $userlogins)
        // ->with('categories', $categories);
    }

    public function messagein(){
        $categorieshead=Category::all();
        $courseshead=Course::all(); 
        return view('student.messagein')
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead);
    }


    public function messageshow(){
        $categorieshead=Category::all();
        $courseshead=Course::all(); 
        $userlogins=Userlogin::all(); 
        $me=Session::get('id');
        $other=Session::get('other');
        $msg=Message::whereIn('sender_un', array($me, $other)) 
        ->whereIn('receiver_un', array($me, $other))
        ->orderBy('id', 'ASC')->get();
        // return $msg;
        // $students=Student::all();
        return view('student.messageshow')->with('msg', $msg)
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead)
        ->with('userlogins', $userlogins);
    }

    public function messagelist(){
        $categorieshead=Category::all();
        $courseshead=Course::all(); 
        $me=Session::get('id');
        $other=Session::get('other');
        $msgl=Message::where('sender_un', '=', $me)
        ->orWhere('receiver_un', '=', $me)->get();
        // return $msg;
        // $students=Student::all();
        return view('student.messagelist')->with('msgl', $msgl)
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead);
    }

    public function messagesearch(){
        $categorieshead=Category::all();
        $courseshead=Course::all(); 
        $me=Session::get('id');
        $other=Session::get('other');
        $userlogins =Userlogin::where('id','=',1)->first();
        // return $userlogins;
        // $students=Student::all();
        return view('student.messagesearch')
        ->with('userlogins', $userlogins)
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead);
    }


    public function messagesearchsubmit(Request $req){
        $categorieshead=Category::all();
        $courseshead=Course::all(); 
        $me=Session::get('id');
        $other=Session::get('other');
        $userlogins =Userlogin::where('id','=',$req->messagesearch)->first();
        return $userlogins;
        // $students=Student::all();
        
        return redirect('/messagesearch')->with('userlogins', $userlogins)
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead);
        // return view('student.messagesearch')
    }
    

    public function forum(Request $req){ 
        $categorieshead=Category::all();
        $courseshead=Course::all(); 
        $pcfid=$req->c_id;//take it from session
        $st=Student::all();
        $ul=Userlogin::all();
        $cs=Course::where('id', $pcfid)->first();
        $forums=Forum::where('c_id', $pcfid)
        ->orderBy('id', 'DESC')->get();//suppose course id 4
        $fcs=Forumcomment::all();
        return view('student.forum')
        ->with('st', $st)
        ->with('ul', $ul)
        ->with('forums', $forums)
        ->with('cs', $cs)
        ->with('fcs', $fcs)
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead);
    }

    public function fask(Request $req){ 
        $categorieshead=Category::all();
        $courseshead=Course::all(); 
        
        $pcfid=$req->c_id;;//take it from session
        $st=Student::all();
        $ul=Userlogin::all();
        $fcs=Forumcomment::all();
        $forums=Forum::where('c_id', $pcfid)->orderBy('id', 'DESC')->get();
        $cs=Course::where('id', $pcfid)->first();
        if($req->option=="ask"){
        $forumss =new Forum();
        $forumss-> c_id=$pcfid;
        $forumss->st_id= Session::get('id');
        $forumss-> f_question=$req->f_question;
        $forumss->save();}
        else{
            $fc =new Forumcomment();
        $fc-> fc_uid= Session::get('id');
        $fc-> fc_comment=$req->fc_comment;//take it from session
        $fc-> fc_forum_fk=$req->f_id;
        $fc->save();
        }
        // return redirect()->route('forum')
        return view('student.forum')
        ->with('st', $st)
        ->with('ul', $ul)
        ->with('forums', $forums)
        ->with('cs', $cs)
        ->with('fcs', $fcs)
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead);
        // return view('student.forum')
        // ->with('st', $st)
        // ->with('ul', $ul)
        // ->with('forums', $forums)
        // ->with('cs', $cs)
        // ->with('fcs', $fcs);
    }

    public function fcom(Request $req){ 
        $categorieshead=Category::all();
        $courseshead=Course::all(); 
        $pcfid=4;//take it from session
        $st=Student::all();
        $ul=Userlogin::all();
        $fcs=Forumcomment::all();
        $forums=Forum::where('c_id', $pcfid)->orderBy('id', 'DESC')->get();
        $cs=Course::where('id', $pcfid)->first();
        $pcuid=Session::get('id');//take it from session user id
        $fc =new Forumcomment();
        $fc-> fc_uid=$pcuid;
        $fc-> fc_comment=$req->fc_comment;//take it from session
        $fc-> fc_forum_fk=$req->f_id;
        $fc->save();
        return "commented";
    }

//     Integrity constraint violation:
// 1452 Cannot add or update a child row:
// a foreign key constraint fails



// public function certMail(Request $req){
//     $details = [
//         'title' => 'Mail from MATS Education',
//     ];
//     Mail::to('tahmidmahbub168@gmail.com')->send(new CertMail());
//          return 'Great! Successfully send in your mail';   
//   }

// public function viewcert(Request $req){
//     $verify=$req->v_id;
//     $cfs=Certificate::where('v_id', $verify)->first();
//     if($cfs){
//         $gcert="yes";
//     $ul=Userlogin::where('id', $cfs->st_id)->first();
//     $cs=Course::where('id', $cfs->c_id)->first();
//     $inst=Instructor::where('id', $cs->c_instructor_fk)->first();
//     return  view('emails.CertificateMailView')
//     ->with('ul', $ul)
//     ->with('inst', $inst)
//     ->with('cs', $cs)
//     ->with('cfs', $cfs)
//     ->with('gcert', $gcert)
//         ->with('verify', $verify);}
//         else{
//             $gcert="no";
//             return view('emails.CertificateMailView')
//             ->with('verify', $verify)
//             ->with('gcert', $gcert);
//         }   
//   }





public function certificate(Request $req)  
    {  $categorieshead=Category::all();
        $courseshead=Course::all(); 

        $verify=$req->v_id;
        if($verify){
            
        $cfs=Certificate::where('v_id', $verify)->first();
        if($cfs){
            $gcert="yes";
        $ul=Userlogin::where('id', $cfs->st_id)->first();
        $std=Student::where('id',$ul->u_id)->first();
        $cs=Course::where('id', $cfs->c_id)->first();
        $inst=Instructor::where('id', $cs->c_instructor_fk)->first();

        if(Session::get('name')){$viewer=$req->session()->get('name');}
        else{$viewer= "Anonymous";}


            //mail start
        $data["email"] = $std->st_email;
        $data["title"] = "MATS Certificate Viewed by ".$viewer."!";
        $data["body"] = "Hello, ".$ul->u_name." your certificate is viewed by ".strtoupper($viewer)."!";
        $data["mats"] = "-MATS Education";
 
        $files = [
            public_path('cert/h3.jpg'),
        ];
  
        Mail::send('emails.CertificateMailView', $data, function($message)use($data, $files) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"]);
 
            foreach ($files as $file){
                $message->attach($file);
            }
            
        });
        // mail end










        
        return  view('student.certificates.certificate')
        ->with('ul', $ul)
        ->with('inst', $inst)
        ->with('cs', $cs)
        ->with('cfs', $cfs)
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead)
        ->with('gcert', $gcert)
            ->with('verify', $verify);}
            else{
                $gcert="no";
                return  view('student.certificates.certificate')
                ->with('verify', $verify)
                ->with('gcert', $gcert)
                ->with('courseshead', $courseshead)
                ->with('categorieshead', $categorieshead);
            }
        }
            else{
                return view('student.certificates.certificate')
                ->with('courseshead', $courseshead)
                ->with('categorieshead', $categorieshead)->with('verify', $verify);
            }

            
            
        
       
       return view('student.certificates.certificate')
        ->with('v_id', $v_id); 
    } 

    public function generatePDF()
    {
        $data = ['title' => 'MATS Certificate'];
  
        // return $pdf->download('itsolutionstuff.pdf');

        $pdf = PDF::loadView('student.myPDF', $data);
    $pdf->setPaper('A3', 'landscape');
    
    // Mail::to('tahmidmahbub168@gmail.com')->send(new CertMail());
    return $pdf->stream('MATS_Certificate.pdf');
    }

    
public function certgen(Request $req){ 
    $categorieshead=Category::all();
    $courseshead=Course::all(); 
        $pcuid=$req->session()->get('id');//take it from session user id 
        $pccid=$req->c_id;//take it from session Course id 
        $cfsv=Certificate::where('c_id', $pccid)
        ->where('st_id', $pcuid)->first();

        if($cfsv){
            $verify=$cfsv->v_id;
            // return "already generated";
        }
        else{
        function generateRandomString($length=10){
            return substr(str_shuffle(str_repeat($x='qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM', ceil($length/strlen($x)))), 1, $length);
      }
      $verify= generateRandomString(5);
        
        // $ins=Instructor::where('c_id', $pccid)->first();
        $ul=Userlogin::where('id', $pcuid)->first();
        $cs=Course::where('id', $pccid)->first();
        $ins=Instructor::where('id', $cs->c_instructor_fk)->first();

        $cf =new Certificate();
        $cf-> c_id=$pccid;
        $cf-> st_id=$pcuid;
        $cf-> ins_id=$ins->id;
        $cf-> v_id=$verify;
        $cf->save();

        
        }
        $cfs=Certificate::where('v_id', $verify)->first();
        $ul=Userlogin::where('id', $cfs->st_id)->first();
        $sc=Student_course::where('st_id', $pcuid)
        ->where('c_id', $pccid)->first();
        $cs=Course::where('id', $cfs->c_id)->first();
        $inst=Instructor::where('id', $cs->c_instructor_fk)->first();
        return  view('student.certificates.certgen')
        ->with('ul', $ul)
        ->with('inst', $inst)
        ->with('cs', $cs)
        ->with('sc', $sc)
        ->with('cfs', $cfs)
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead);

    }


    public function myCourses(){
        $categorieshead=Category::all();
        $courseshead=Course::all(); 

        $student_courses = Student_course::all();
        $student=Student::all();
        return view('student.myCourse')

        ->with('student_courses',$student_courses)
        ->with('student',$student)
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead);

    }

    public function details(Request $req){
        $categorieshead=Category::all();
        $courseshead=Course::all();
        $c_id=$req->c_id;
        $instructors = Instructor::all();
        $ratings = Rating::all();
        $course = Course::where('id','=', $c_id)->first();
        return view('student.courseDetails')
        ->with('course', $course)
        ->with('c_id', $c_id)
        ->with('ratings',$ratings)
        ->with('instructors',$instructors)
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead);

    }
    
    public function detailssub(Request $req){
      
        $categorieshead=Category::all();
        $courseshead=Course::all();
        $c_id=$req->c_id;
        $c_name=$req->c_name;
        $c_price=$req->c_price;
        $s_id=$req->session()->get('id');
        
        return view('student.pay')
        ->with('c_name', $c_name)
        ->with('c_id', $c_id)
        ->with('c_price',$c_price)
        ->with('s_id',$s_id)
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead);
        

    }

    public function paysub(Request $req){

        $req->validate(
            [
                'mfs'=>'required'
            ],
            [//these are optional
                'mfs.required'=>'Select any option',
            ]
            
    );

    $pm =new Payment();
    $pm-> c_id=$req->c_id;
    $pm-> st_id=$req->st_id;
    $pm-> p_amount=$req->p_amount;
    $pm-> p_mfs=$req->mfs;
    $pm-> p_phone=$req->phone;
    $pm-> p_trxid=$req->trx_id;
    $pm->save();

    $ul=Userlogin::where('id', $req->st_id)->first();    
    $std=Student::where('id',$ul->u_id)->first();
    $cs=Course::where('id',$req->c_id)->first();

    
    
    $data["email"] = $std->st_email;
        $data["title"] = "MATS Received Payment Request for ".$cs->c_title;
        $data["greet"] = "Good day, ".$ul->u_name;
        $data["body"] = "We recieved your payment request of ".$req->p_amount." taka for the course, ".$cs->c_title.". We will review your payment information within 10 minutes during office hours. After the time, if the course is not found in enrolled courses, check the paying information.";
        $data["cn"] = "Course Name: ".$cs->c_title;
        $data["tk"] = "Amount: ".$req->p_amount." taka";
        $data["mfs"] = "Patyment Method: ".$req->mfs;
        $data["trx"] = "TrxID: ".$req->trx_id;
        $data["check"] = " If you think you did a mistake, please resubmit the form.";
        $data["mistake"] = " If you think you did a mistake, please resubmit the form.";
        $data["mats"] = "-MATS Education";
        
  
        Mail::send('emails.payView', $data, function($message)use($data) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"]);
 
            
            
        });


    return "Payment Requested!  Wait for admin approval. Go to <a href='\'>home</a>";

    }

    public function category(Request $req){
        $categorieshead=Category::all();
        $courseshead=Course::all();
        $ct_id=$req->ct_id;
        $instructors = Instructor::all();
        $ratings = Rating::all();
        $course = Course::where('c_category_fk','=', $ct_id)->get();
        return view('student.category')
        ->with('course', $course)
        ->with('ratings',$ratings)
        ->with('instructors',$instructors)
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead)
        ->with('ct_id', $ct_id);

    }
    
    
    public function purchase(Request $req){

        $s_id=$req->session()->get('id');//take it from session
        $en_courses = Student_course::where('st_id','=',$s_id)->get();

        $courses = Course::all();
        $instructors = Instructor::all();
        $ratings = Rating::all();
        $categorieshead=Category::all();
        $courseshead=Course::all(); 

        return view('student.purchase')
        ->with('en_courses',$en_courses)
        ->with('courses',$courses)
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead)
        ->with('ratings',$ratings)
        ->with('instructors',$instructors);



    }

    public function complete(Request $req){

        $s_id=$req->session()->get('id');//take it from session
        $en_courses = Student_course::where('st_id','=',$s_id)->get();

        $courses = Course::all();
        $instructors = Instructor::all();
        $ratings = Rating::all();
        $categorieshead=Category::all();
        $courseshead=Course::all(); 

        return view('student.complete')
        ->with('en_courses',$en_courses)
        ->with('courses',$courses)
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead)
        ->with('ratings',$ratings)
        ->with('instructors',$instructors);



    }

    

    public function pay(Request $req){

        $s_id=$req->session()->get('id');//take it from session
        $en_courses = Student_course::where('st_id','=',$s_id)->get();

        $courses = Course::all();
        $instructors = Instructor::all();
        $ratings = Rating::all();
        $categorieshead=Category::all();
        $courseshead=Course::all(); 

        return view('student.complete')
        ->with('en_courses',$en_courses)
        ->with('courses',$courses)
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead)
        ->with('ratings',$ratings)
        ->with('instructors',$instructors);



    }

    public function payad(){
        $payments = Payment::where('p_status','=',"Requested")->get();
        return view('payad')
        ->with('payments', $payments);
    }


 

    public function search(){
        $categorieshead=Category::all();
        $courseshead=Course::all(); 

        return view('student.search')
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead);
    }


    public function searchsub(Request $req){
        $categorieshead=Category::all();
        $courseshead=Course::all(); 
        $catsearch=Category::where('cat_name','Like',"%{$req->search}%")->get();
        $coursearch=Course::where('c_title','Like',"%{$req->search}%")->get();
        $insearch=Instructor::where('ins_name','Like',"%{$req->search}%")->get();

        return view('student.search')
        ->with('courseshead', $courseshead)
        ->with('categorieshead', $categorieshead);
    }
    

    public function try(Request $req){
        // $file=$req->file!;
    }

   
    
    //ovy

    public function InstructorList(Request $req){
        $instructors = Instructor::all();
        $categories = Category::all();
        $catid="all";
        if(isset($req->catid)){$catid =decrypt($req->catid) ;}
        return view('Public.InstructorList')->with('instructors', $instructors)
                                            ->with('categories', $categories)
                                            ->with('catid',$catid);
    }

    public function InstructorDetails(Request $req){
        $instructor = Instructor::where('id','=',decrypt($req->id))->first();
        
        return view('Public.InstructorDetails')->with('instructor', $instructor);
    }


    //ovy



    //mridul

    public function admin(){
        return view('admin.index');
    }

    public function studentlist(){

        $Students = Student::all();
        // return $Students;
        return view('admin.studentlist')
        ->with('Students', $Students);

    }

    public function studentdetail(Request $req){
       
        $student = Student::where('id','=',decrypt($req->id))
        ->select('st_name','id','st_username','st_phone','st_email','st_address','st_pro_pic')
        ->first();


        //return $student->courses;

        return view('admin.studentdetail')
        ->with('student',$student)
        ;
    }

    public function studentedit(Request $req){
    
        $student = Student::where('id','=',decrypt($req->id))
        ->first();
    
        return view('admin.studentedit')
            ->with('student', $student);
        
    }
    
     public function studenteditsubmit(Request $req){
    
            $this->validate($req,
            [
                'st_name'=>'required'
            ],
            [
                'st_name.required'=>'Please enter username'
            ]
            );
        
            $st_update = Student::where('id','=',$req->id)->first();
            $st_update->st_name = $req->st_name;
            $st_update->st_username = $req->st_username;
            $st_update->st_phone = $req->st_phone;
            $st_update->st_email = $req->st_email;
            $st_update->st_address = $req->st_address;
            $st_update->save();
            
            return redirect()->route('admin.studentlist');    
    }

    public function studentdelete(Request $req){
        $student = Student::where('id',decrypt($req->id))->first();
        $student->delete();
        return redirect()->route('admin.studentlist');
    }





    public function adinstructorlist(){

        $Instructors = Instructor::all();
        // return $Instructors;
        return view('admin.instructorlist')
        ->with('Instructors', $Instructors);
    }

    public function instructordetail(Request $req){
       
        $instructor = Instructor::where('id','=',decrypt($req->id))
        ->select('ins_name','id','ins_username','ins_degree','ins_bio','ins_phone','ins_email','ins_exp','ins_joindate','ins_dp')
        ->first();

        return view('admin.instructordetail')
        ->with('instructor',$instructor)
        ;
    }

    

    public function instructoredit(Request $req){
    
        $instructor = Instructor::where('id','=',decrypt($req->id))
        ->first();
    
        return view('admin.instructoredit')
            ->with('instructor', $instructor);
        
        }
    
    public function instructoreditsubmit(Request $req){
    
            $this->validate($req,
            [
                'ins_name'=>'required'
            ],
            [
                'ins_name.required'=>'Please enter ins_name'
            ]
            );
        
            $i_update =  Instructor::where('id','=',$req->id)->first();

            $i_update->ins_name = $req->ins_name;
            $i_update->ins_degree = $req->ins_degree;
            $i_update->ins_bio = $req->ins_bio;
            $i_update->ins_phone = $req->ins_phone;
            $i_update->ins_email = $req->ins_email;
            $i_update->ins_exp = $req->ins_exp;
            $i_update->ins_joindate = $req->ins_joindate;


            $i_update->save();
            
            return redirect()->route('admin.instructorlist');
    
    }

    public function instructordelete(Request $req){
        $instructor = Instructor::where('id',decrypt($req->id))->first();
        $instructor->delete();
        return redirect()->route('admin.instructorlist');
    }





    public function add_instructor(){
    
        return view('admin.add_instructor');
            
        
    }
    
    public function add_instructorsubmit(Request $req){
    
            $this->validate($req,
            [
                'ins_name'=>'required',
                'ins_username'=>'required',
                'ins_degree'=>'required',
                'ins_bio'=>'required',
                'ins_phone'=>'required',
                'ins_email'=>'required',
                'ins_exp'=>'required',
                'ins_password'=>'required'
            ],
            [
                'ins_name.required'=>'Please enter ins_name',
                
                'ins_username.required'=>'Please enter ins_name',
            ]
            );
        
            $add_ins = new Instructor();
            $add_ins->ins_name = $req->ins_name;
            $add_ins->ins_username = $req->ins_username;
            $add_ins->ins_degree = $req->ins_degree;
            $add_ins->ins_bio = $req->ins_bio;
            $add_ins->ins_phone = $req->ins_phone;
            $add_ins->ins_email = $req->ins_email;
            $add_ins->ins_exp = $req->ins_exp;
            $add_ins->save();

            $user = new Userlogin();
            $user->u_username = $req->ins_username;
            $user->u_type = 'instructor';
            $user->u_password = $req->ins_password;
            $user->u_access= 'yes';
            $user->u_name= 'instructor';

            
            
            
            $user->save();



            
            return redirect()->route('admin.instructorlist');
    
    }

    

    public function instructor_reg(){
    
        return view('Instructor.instructor_reg');
            
        
    }
    
    public function instructor_regsubmit(Request $req){
    
            $this->validate($req,
            [
                'ins_name'=>'required',
                'ins_username'=>'required',
                'ins_degree'=>'required',
                'ins_bio'=>'required',
                'ins_phone'=>'required',
                'ins_email'=>'required',
                'ins_exp'=>'required',
                'ins_password'=>'required'
            ],
            [
                'ins_name.required'=>'Please enter ins_name'
            ]
            );
        
            $add_ins = new Instructor();
            $add_ins->ins_name = $req->ins_name;
            $add_ins->ins_username = $req->ins_username;
            $add_ins->ins_degree = $req->ins_degree;
            $add_ins->ins_bio = $req->ins_bio;
            $add_ins->ins_phone = $req->ins_phone;
            $add_ins->ins_email = $req->ins_email;
            $add_ins->ins_exp = $req->ins_exp;
            $add_ins->save();

            $user = new Userlogin();
            $user->u_username = $req->ins_username;
            $user->u_type = 'instructor';
            $user->u_password = $req->ins_password;
            $user->u_access= 'No';
            $user->u_name= 'instructor';
        
            $user->save();

            return "<h1>$req->ins_name as Instructor requested is created wait for Admin's Aproval </h1>";
 
           // return redirect()->route('instructor.instructor_reg');
    
    }






    public function courselist(){

        $courses = course::all();
        // return $courses;
        return view('admin.courselist')
        ->with('courses', $courses);
    }

    public function coursedetail(Request $req){
       
        $course = Course::where('id','=',decrypt($req->id))
        ->select('c_title','id','c_description','c_price','c_adminfeedback','c_thumbnail','c_status')
        ->first(); 

       // return $course->students;

        return view('admin.coursedetail')
        ->with('course',$course)
        ;
    }




    public function courseedit(Request $req){
    
    $course = Course::where('id','=',decrypt($req->id))
    ->first();

    return view('admin.courseedit')
        ->with('course', $course);
    
    }

    public function courseeditsubmit(Request $req){

        $this->validate($req,
        [
            'c_title'=>'required'
        ],
        [
            'c_title.required'=>'Please enter username'
        ]
        );
    
        $c_update = Course::where('id','=',$req->id)->first();
        $c_update->c_title = $req->c_title;
        $c_update->c_price = $req->c_price;
        $c_update->c_adminfeedback = $req->c_adminfeedback;
        $c_update->c_status = $req->c_status;
        $c_update->save();
        
        // return "courseupdate";
        
        return redirect()->route('admin.courselist');

    }

    public function coursedelete(Request $req){
        $course = Course::where('id',decrypt($req->id))->first();
        $course->delete();
        return redirect()->route('admin.courselist');
    }







    public function adsearch(Request $req){
    
        $key=$req->search;

        $students = Student::where('st_name','Like',"%{$key}%")
        ->select('st_name','id','st_username','st_phone','st_email','st_address')
        ->get();

        
        $instructors = Instructor::where('ins_name','Like',"%{$key}%")
        ->select('ins_name','id','ins_username','ins_degree','ins_bio','ins_phone','ins_email','ins_exp','ins_joindate')
        ->get();


        $courses = Course::where('c_title','Like',"%{$key}%")
        ->select('c_title','id','c_description','c_price','c_adminfeedback','c_thumbnail','c_status')
        ->get();


        return view('admin.search')
        ->with('students',$students)
        ->with('instructors',$instructors)
        ->with('courses',$courses);
        
    }





    public function payment_req(){
    
        //$payments = Payment::all();
        $payments = Payment::where('p_status','=',"Requested")->get();
       // return $payments;
        return view('admin.payment_req')
        ->with('payments', $payments);
        
    }

    public function payadsub(Request $req){

        $payreq =Payment::where('id', $req->p_id)->first();

        if($req->dec=="Accept"){

            $payreq->p_status="Accepted";

            $payreq->save();

            $sc =new Student_course();            

            $sc-> st_id=$req->st_id;
            $sc-> c_id=$req->c_id;
            $sc-> tot_topic="10";
            $sc-> complete_topic="0";
            $sc-> sc_status="Incomplete";

            $sc->save();

        }

        else{

            $payreq->p_status="Rejected";
            $payreq->save();

        }

        $payments = Payment::where('p_status','=',"Requested")->get();

        return redirect()->route('admin.payment_req')
        ->with('payments', $payments);

    }



    public function instructor_requests(){
    
        //$payments = Payment::all();
        $userlogins = Userlogin::where('u_access','=',"No")->get();
       // return $payments;
        return view('admin.instructor_requests')
        ->with('userlogins', $userlogins);
        
    }

    public function instructor_requestssubmit(Request $req){

        $userlogin =Userlogin::where('id', $req->u_id)->first();

        if($req->dec=="Accept"){

            $userlogin->u_access="yes";

            $userlogin->save();

        }

        else{

            $userlogin->p_status="no";
            $userlogin->save();

        }

        return redirect()->route('admin.instructor_requests');

    }

    public function instructor_requestsdetail(Request $req){
       
        $instructor = Instructor::where('ins_username','=',decrypt($req->id))
        ->select('ins_name','id','ins_username','ins_degree','ins_bio','ins_phone','ins_email','ins_exp','ins_joindate')
        ->first();

        return view('admin.instructor_requestsdetail')
        ->with('instructor',$instructor)
        ;
    }



    //mridul













    public function bengal(){
        return view('bengal.home');
    }
    public function bview(){
        $employees = Employee::all();
        return view('bengal.view')
        ->with('employees',$employees);
    }
    public function binsert(){
        $employees = Employee::all();
        return view('bengal.insert')
        ->with('employees',$employees);
    }
    public function binsertsub(Request $req){
        $employees =new Employee();
        $employees-> name=$req->name;
        $employees-> phone=$req->phone;
        $employees-> dept=$req->dept;
        $employees-> salary=$req->salary;
        $employees-> save();        
        return "<a href='/bengal/view'>View</a>";
    }
    public function bupdate(Request $req){
        $employees = Employee::where('id',$req->id)->first();
        return view('bengal.update')
        ->with('employees',$employees);
    }
    public function bupdatesub(Request $req){
        $employees = Employee::where('id',$req->id)->first();
        $employees-> name=$req->name;
        $employees-> phone=$req->phone;
        $employees-> dept=$req->dept;
        $employees-> salary=$req->salary;
        $employees-> save();        
        return "<a href='/bengal/view'>Updated</a>";
    }
    public function bdelete(Request $req){
        $empdel = Employee::where('id',$req->id)->first();
        $empdel-> delete();        
        $employees = Employee::all();
        return view('bengal.view')
        ->with('employees',$employees);
    }

    
    public function bsearchlink(Request $req){
        $employees=Employee::where('name', 'like', '%' . $req->name . '%')->get();

        return view('bengal.searchlink')
        ->with('employees',$employees);
    }
    public function bsearch(){
       
        return view('bengal.sea');
    }
    public function bsearchsub(Request $req){
        $employees=Employee::where('name', 'like', '%' . $req->name . '%')->get();

        return view('bengal.search')
        ->with('employees',$employees);
    }
    








}





