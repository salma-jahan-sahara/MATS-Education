<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\PDF;
// use App\Http\Controllers\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route:: get('/login', function(){
//     return view('home.login');
// });

// Route:: get('/', [PagesController::class, 'index1'])->name('home1');






Route:: get('/', [PagesController::class, 'index'])->name('home');
Route:: get('/try', [PagesController::class, 'try'])->name('try');
Route:: get('/signin', [PagesController::class, 'signin'])->name('signin');
Route::post('/signin', [PagesController::class, 'signinsubmit'])->name('signin.submit');
Route:: get('/st/signout', [PagesController::class, 'signout'])->name('signout');
Route:: get('/st/signup', [PagesController::class, 'st_signup'])->name('stsignup');
Route:: post('/st/signup', [PagesController::class, 'st_signupsubmit'])->name('stsignupsubmit');
Route:: get('/st/head', [PagesController::class, 'st_head'])->name('sthead');
Route:: get('/st/headlr', [PagesController::class, 'st_headlr'])->name('stheadlr');
Route:: get('/st/changepass', [PagesController::class, 'changepass'])->middleware('auth.student')->name('changepass');
Route::post('/st/changepass', [PagesController::class, 'st_changepasssubmit'])->name('st_changepass.submit');
Route:: get('/picup', [PagesController::class, 'picup'])->name('picup');
Route:: post('/picup', [PagesController::class, 'picupsub'])->name('picupsub');
Route:: get('/st/profile', [PagesController::class, 'st_profile'])->middleware('auth.student')->name('stprofile');
Route:: post('/st/profile', [PagesController::class, 'st_profile'])->name('stprofile');
Route:: get('/st/edit', [PagesController::class, 'st_edit'])->middleware('auth.student')->name('stedit');
Route::post('/st/edit', [PagesController::class, 'st_editsubmit'])->name('st_edit.submit');
Route:: get('/messagein', [PagesController::class, 'messagein'])->name('messagein');
Route::post('/messagein', [PagesController::class, 'messageinsubmit'])->name('messagein.submit');
Route:: get('/messageshow', [PagesController::class, 'messageshow'])->name('messageshow');
Route:: get('/messagelist', [PagesController::class, 'messagelist'])->name('messagelist');
Route:: get('/messagesearch', [PagesController::class, 'messagesearch'])->name('messagesearch');
Route::post('/messagesearch', [PagesController::class, 'messagesearchsubmit'])->name('messagesearch.submit');
Route:: get('/message', [PagesController::class, 'message'])->name('message');
Route:: get('/meslistcon/{id}', [PagesController::class, 'meslistcon'])->name('meslistcon');
Route:: post('/message', [PagesController::class, 'messagesub'])->name('message.sub');
Route:: get('/forum/{c_id?}', [PagesController::class, 'forum'])->middleware('auth.student')->name('forum');
Route:: post('/forum/{c_id?}', [PagesController::class, 'fask'])->middleware('auth.student')->name('fask');
// Route:: post('/forum', [PagesController::class, 'fcom'])->name('fcom');
Route:: get('/certificate/{v_id?}', [PagesController::class, 'certificate'])->name('certificate');
Route:: get('/certgen/{c_id?}', [PagesController::class, 'certgen'])->middleware('auth.student')->name('certgen');
Route::get('/myCourses', [PagesController::class,'myCourses'])->name('myCourses');
Route::get('/course/{c_id}/{t_id?}', [PagesController::class, 'course'])->middleware('auth.student')->name('course');
Route::get('/courses/details/{c_id}', [PagesController::class,'details'])->name('details');
Route::post('/courses/details/{c_id}', [PagesController::class,'detailssub'])->middleware('auth.student')->name('detailssub');
Route::get('/genpdf', [PagesController::class, 'generatePDF'])->name('genpdf');//->middleware('auth.student')
Route::get('/category/{ct_id}', [PagesController::class,'category'])->name('category');
Route::get('/purchase', [PagesController::class,'purchase'])->middleware('auth.student')->name('purchase');
Route::get('/complete', [PagesController::class,'complete'])->middleware('auth.student')->name('complete');
Route::get('/pay', [PagesController::class,'pay'])->middleware('auth.student')->name('pay');
Route::post('/pay', [PagesController::class,'paysub'])->middleware('auth.student')->name('paysub');
Route::get('/payad', [PagesController::class,'payad'])->middleware('auth.student')->name('payad');
Route::post('/payad', [PagesController::class,'payadsub'])->middleware('auth.student')->name('payadsub');
Route::get('/search', [PagesController::class,'search'])->name('search');
Route::post('/search', [PagesController::class,'searchsub'])->name('searchsub');
Route::post('/qcheck', [PagesController::class,'q_check'])->middleware('auth.student')->name('q_check');


//ovy
Route::get('OurInstructors',[PagesController::class,'InstructorList'])->name('public.instructorlist');
Route::get('OurInstructors/{id}',[PagesController::class,'InstructorDetails'])->name('public.instructordetails');
Route::get('ContactUs',[PagesController::class,'ContactUs'])->name('public.contactus');


Route::get('Instructor',[InstructorController::class,'Home'])->name('instructor.home');
Route::get('Instructor/createcourse',[InstructorController::class,'CreateCourse'])->name('instructor.createcourse');
Route::post('Instructor/createcourse',[InstructorController::class,'CreateCourseSubmit'])->name('instructor.createcoursesubmit');
Route::get('Instructor/createtopic/{courseid}',[InstructorController::class,'CreateTopic'])->name('instructor.createtopic');
Route::post('Instructor/createcoursetopic',[InstructorController::class,'CreateTopicSubmit'])->name('instructor.createtopicsubmit');
Route::get('Instructor/viewcourse/{id}',[InstructorController::class,'ViewCourse'])->name('instructor.viewcourse');
Route::get('Instructor/topic/{id}',[InstructorController::class,'ViewTopic'])->name('instructor.viewtopic');
Route::get('Instructor/topic/{topicid}/addquiz',[InstructorController::class,'Addquiz'])->name('instructor.addquiz');
Route::post('Instructor/topic/addquiz',[InstructorController::class,'Addquizsubmit'])->name('instructor.addquizsubmit');
Route::get('Instructor/course/{cid}/students',[InstructorController::class,'ViewStudentList'])->name('instructor.coursestudentlist');
Route::get('Instructor/course/students/{stid}',[InstructorController::class,'ViewStudentDetails'])->name('instructor.studentdetails');
Route::get('Instructor/course/forum',[InstructorController::class,'Forum'])->name('instructor.forum');
Route::post('Instructor/course/forums',[InstructorController::class,'ForumSubmit'])->name('instructor.forumsubmit');
Route::post('Instructor/course/forumcs',[InstructorController::class,'ForumCommentSubmit'])->name('instructor.forumcommentsubmit');

Route::get('Instructor/editcourse',[InstructorController::class,'EditCourse'])->name('instructor.editcourse');
Route::post('Instructor/editcourse',[InstructorController::class,'EditCourseSubmit'])->name('instructor.editcoursesubmit');
Route::get('Instructor/edittopic',[InstructorController::class,'EditTopic'])->name('instructor.edittopic');
Route::post('Instructor/edittopic',[InstructorController::class,'EditTopicSubmit'])->name('instructor.edittopicsubmit');

Route::get('Instructor/deletecourse',[InstructorController::class,'DeleteCourse'])->name('instructor.deletecourse');
Route::get('Instructor/deletecourse/{id}',[InstructorController::class,'DeleteCourseSubmit'])->name('instructor.deletecoursesubmit');

Route::get('Instructor/financial',[InstructorController::class,'Financial'])->name('instructor.financial');
Route::get('Instructor/profile',[InstructorController::class,'MyProfile'])->name('instructor.profile');
Route::get('Instructor/editprofile/{id}',[InstructorController::class,'EditProfile'])->name('instructor.editprofile');
Route::post('Instructor/editprofile',[InstructorController::class,'EditProfileSubmit'])->name('instructor.editprofilesubmit');

//ovy


//mridul


Route::get('/admin',[PagesController::class,'admin'])->middleware('auth.admin')->name('admin.index');

Route::get('/admin/studentlist',[PagesController::class,'studentlist'])->middleware('auth.admin')->name('admin.studentlist');
Route::get('/admin/studentdetail/{id}',[PagesController::class,'studentdetail'])->middleware('auth.admin')->middleware('auth.admin')->name('admin.studentdetail');
Route::get('/admin/studentedit',[PagesController::class,'studentedit'])->middleware('auth.admin')->name('admin.studentedit');
Route::post('/admin/studenteditsubmit',[PagesController::class,'studenteditsubmit'])->middleware('auth.admin')->name('admin.studenteditsubmit');
Route::get('/admin/studentdelete/{id}',[PagesController::class,'studentdelete'])->middleware('auth.admin')->name('admin.studentdelete');


Route::get('admin/add_instructor',[PagesController::class,'add_instructor'])->middleware('auth.admin')->name('admin.add_instructor');
Route::post('admin/add_instructor',[PagesController::class,'add_instructorsubmit'])->middleware('auth.admin')->name('admin.add_instructorsubmit');

Route::get('/admin/instructorlist',[PagesController::class,'adinstructorlist'])->middleware('auth.admin')->name('admin.instructorlist');
Route::get('/admin/instructordetail/{id}',[PagesController::class,'instructordetail'])->middleware('auth.admin')->name('admin.instructordetail');
Route::get('/admin/instructoredit',[PagesController::class,'instructoredit'])->middleware('auth.admin')->name('admin.instructoredit');
Route::post('/admin/instructoreditsubmit',[PagesController::class,'instructoreditsubmit'])->middleware('auth.admin')->name('admin.instructoreditsubmit');
Route::get('/admin/instructordelete/{id}',[PagesController::class,'instructordelete'])->middleware('auth.admin')->name('admin.instructordelete');


Route::get('/admin/courselist',[PagesController::class,'courselist'])->middleware('auth.admin')->name('admin.courselist');
Route::get('/admin/coursedetail/{id}',[PagesController::class,'coursedetail'])->middleware('auth.admin')->name('admin.coursedetail');
Route::get('/admin/courseedit',[PagesController::class,'courseedit'])->middleware('auth.admin')->name('admin.courseedit');
Route::post('/admin/courseeditsubmit',[PagesController::class,'courseeditsubmit'])->middleware('auth.admin')->name('admin.courseeditsubmit');
Route::get('/admin/coursedelete/{id}',[PagesController::class,'coursedelete'])->middleware('auth.admin')->name('admin.coursedelete');


 Route::post('/admin/search',[PagesController::class,'adsearch'])->middleware('auth.admin')->name('admin.search');
//Route::post('/admin/search',[PagesController::class,'searchsubmit'])->name('admin.searchsubmit');


Route::get('/admin/payment_req',[PagesController::class,'payment_req'])->middleware('auth.admin')->name('admin.payment_req');
Route::post('/admin/payment_req',[PagesController::class,'payadsub'])->middleware('auth.admin')->name('admin.payadsub');


Route::get('/admin/instructor_requests',[PagesController::class,'instructor_requests'])->middleware('auth.admin')->name('admin.instructor_requests');
Route::post('/admin/instructor_requests',[PagesController::class,'instructor_requestssubmit'])->middleware('auth.admin')->name('admin.instructor_requestssubmit');
Route::get('/admin/instructor_requestsdetail',[PagesController::class,'instructor_requestsdetail'])->middleware('auth.admin')->name('admin.instructor_requestsdetail');




Route::get('instructor/instructor_reg',[PagesController::class,'instructor_reg'])->name('instructor.instructor_reg');
Route::post('instructor/instructor_reg',[PagesController::class,'instructor_regsubmit'])->name('instructor.instructor_regsubmit');



//mridul


// email
Route::get('sendcert/{v_id?}', [PagesController::class, 'certMail']);
Route::get('viewcert/{v_id?}', [PagesController::class, 'viewcert']);












Route:: get('/bengal', [PagesController::class, 'bengal'])->name('bengal');
Route:: get('/bengal/insert', [PagesController::class, 'binsert'])->name('binsert');
Route:: post('/bengal/insert', [PagesController::class, 'binsertsub'])->name('binsertsub');

Route:: get('/bengal/update/{id?}', [PagesController::class, 'bupdate'])->name('bupdate');
Route:: post('/bengal/update/{id?}', [PagesController::class, 'bupdatesub'])->name('bupdatesub');
Route:: get('/bengal/delete', [PagesController::class, 'bdelete'])->name('bdelete');
Route:: get('/bengal/delete/{id?}', [PagesController::class, 'bdelete'])->name('bdelete');
Route:: get('/bengal/view', [PagesController::class, 'bview'])->name('bview');

Route:: get('/bengal/search/{name?}', [PagesController::class, 'bsearchlink'])->name('bsearchlink');
Route:: get('/bengal/search', [PagesController::class, 'bsearch'])->name('bsearch');
Route:: post('/bengal/search', [PagesController::class, 'bsearchsub'])->name('bsearchsub');