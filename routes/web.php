<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SiteCustomizeController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\StudentAttendanceController;
use App\Http\Controllers\StudentQuizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoCourseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/test', [FrontendController::class, 'test'])->name('test');

Auth::routes();

//frontend homepage
Route::get('/', [FrontendController::class, 'index'])->name('index');

//frontend enroll
Route::group(['prefix' => 'enroll', 'as' => 'enroll.'], function () {
    Route::get('/', [FrontendController::class, 'enroll'])->name('index');
    Route::post('/', [FrontendController::class, 'enroll_store'])->name('store');
    Route::get('/get/category/{id}', [FrontendController::class, 'get_category'])->name('get.catgory');
    Route::get('/get/price/{id}', [FrontendController::class, 'get_price'])->name('get.price');
    Route::get('/get/slot/{id}', [FrontendController::class, 'get_slot'])->name('get.slot');
    Route::post('/login', [FrontendController::class, 'login'])->name('login');
});

//frontend otherpages
Route::get('/about-us', [FrontendController::class, 'about'])->name('about');
Route::get('/courses', [FrontendController::class, 'courses_view'])->name('courses.view');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//OTP Verification
Route::get('/otp/verify', [OtpController::class, 'index'])->name('otp');
Route::post('/otp/verify', [OtpController::class, 'otp_verify'])->name('otp.verify');
Route::get('/otp/resend', [OtpController::class, 'resend'])->name('otp.resend');

//Admin Dashboard
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'otp'], 'as' => 'admin.'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/course-details/{enroll_id}', [AdminController::class, 'view_course_details'])->name('view.details');

    //branches
    Route::get('/branches', [BranchController::class, 'index'])->name('branches');
    Route::post('/branches/store', [BranchController::class, 'store'])->name('branches.store');
    Route::get('/branches/{id}', [BranchController::class, 'show'])->name('branches.show');
    Route::get('/branches/edit/{id}', [BranchController::class, 'edit'])->name('branches.edit');
    Route::post('/branches/update', [BranchController::class, 'update'])->name('branches.update');
    Route::post('/branches/assign', [BranchController::class, 'assign'])->name('branches.assign');
    Route::get('/branches/assign/{id}', [BranchController::class, 'assign_modal'])->name('branches.assign.modal');
    Route::post('/branches/upload/signature', [BranchController::class, 'upload_signature'])->name('branches.upload.signature');
    Route::get('/branches/upload/signature/{id}', [BranchController::class, 'upload_signature_modal'])->name('branches.upload.signature.modal');
    Route::post('/branches/edit/signature', [BranchController::class, 'edit_signature'])->name('branches.edit.signature');
    Route::get('/branches/edit/signature/{id}', [BranchController::class, 'edit_signature_modal'])->name('branches.edit.signature.modal');

    //accounts

    //income
    Route::get('/accounts/income', [AccountController::class, 'income'])->name('income');
    Route::post('/accounts/income/add', [AccountController::class, 'income_add'])->name('income.add');
    Route::get('/accounts/income/edit/{id}', [AccountController::class, 'income_edit_modal'])->name('income.edit');
    Route::post('/accounts/income/update', [AccountController::class, 'income_update'])->name('income.update');
    Route::get('/accounts/income/delete/{id}', [AccountController::class, 'income_delete'])->name('income.delete');

    //expense
    Route::get('/accounts/expense', [AccountController::class, 'expense'])->name('expense');
    Route::post('/accounts/expense/add', [AccountController::class, 'expense_add'])->name('expense.add');
    Route::get('/accounts/expense/edit/{id}', [AccountController::class, 'expense_edit_modal'])->name('expense.edit');
    Route::post('/accounts/expense/update', [AccountController::class, 'expense_update'])->name('expense.update');
    Route::get('/accounts/expense/delete/{id}', [AccountController::class, 'expense_delete'])->name('expense.delete');


    //attendance
    Route::get('/student/attendance/{enroll_id}', [StudentAttendanceController::class, 'index'])->name('attendance');
    Route::post('/student/attendance/add', [StudentAttendanceController::class, 'attendance_add'])->name('attendance.add');
    // Route::get('/student/attendance/edit/{id}', [StudentAttendanceController::class, 'attendance_edit_modal'])->name('attendance.edit');
    // Route::post('/student/attendance/update', [StudentAttendanceController::class, 'attendance_update'])->name('attendance.update');
    // Route::get('/student/attendance/delete/{id}', [StudentAttendanceController::class, 'attendance_delete'])->name('attendance.delete');

    //users
    Route::get('/users', [UserController::class, 'users'])->name('users');
    Route::get('/users/{id}', [UserController::class, 'users_edit'])->name('users.edit');
    Route::post('/users/add', [UserController::class, 'users_add'])->name('users.add');
    Route::post('/users/update/info', [UserController::class, 'users_update_info'])->name('user.update.info');
    Route::post('/users/update/password', [UserController::class, 'users_update_password'])->name('user.update.password');
    Route::post('/users/update/profile/picture', [UserController::class, 'users_update_profile_pic'])->name('user.update.pro.pic');
    Route::get('/users/delete/{id}', [UserController::class, 'users_delete'])->name('users.delete');

    //students
    Route::get('/students', [UserController::class, 'students'])->name('students');
    Route::get('/students/id/generate/{id}', [UserController::class, 'generate_id'])->name('students.generate');
    Route::get('/students/id/verify/{id}', [UserController::class, 'verify_id'])->name('students.id.verify');

    //Roles
    Route::post('/roles/assign/', [RoleController::class, 'assign_role'])->name('role.assign');

    //courses
    Route::get('/courses/categories', [CourseController::class, 'index'])->name('courses');
    Route::get('/courses/list', [CourseController::class, 'courses_list'])->name('courses.list');
    Route::post('/courses/add', [CourseController::class, 'courses_add'])->name('courses.add');
    Route::get('/courses/edit/{id}', [CourseController::class, 'course_edit_modal'])->name('course.edit');
    Route::post('/courses/update', [CourseController::class, 'course_update'])->name('course.update');
    Route::get('/courses/delete/{id}', [CourseController::class, 'course_delete'])->name('course.delete');

    //Course Category
    Route::post('/courses/category/add', [CourseController::class, 'category_add'])->name('courses.category.add');
    Route::get('/courses/category/edit/{id}', [CourseController::class, 'category_edit_modal'])->name('courses.category.edit');
    Route::post('/courses/category/update', [CourseController::class, 'category_update'])->name('courses.category.update');
    Route::get('/courses/category/delete/{id}', [CourseController::class, 'category_delete'])->name('courses.category.delete');
    //Course Type
    Route::post('/courses/type/add', [CourseController::class, 'type_add'])->name('courses.type.add');
    Route::get('/courses/type/edit/{id}', [CourseController::class, 'type_edit_modal'])->name('courses.type.edit');
    Route::post('/courses/type/update', [CourseController::class, 'type_update'])->name('courses.type.update');
    Route::get('/courses/type/delete/{id}', [CourseController::class, 'type_delete'])->name('courses.type.delete');
    //Course Slot
    Route::post('/courses/slot/add', [CourseController::class, 'slot_add'])->name('courses.slot.add');
    Route::get('/courses/slot/get/day/{id}', [CourseController::class, 'slot_get_day'])->name('courses.slot.get.day');
    Route::get('/courses/slot/delete/{id}', [CourseController::class, 'slot_delete'])->name('courses.slot.delete');
    //Vehicle Capability
    Route::post('/courses/capability/add', [CourseController::class, 'capability_add'])->name('courses.capability.add');
    Route::get('/courses/capability/edit/{id}', [CourseController::class, 'capability_edit_modal'])->name('courses.capability.edit');
    Route::post('/courses/capability/update', [CourseController::class, 'capability_update'])->name('courses.capability.update');
    Route::get('/courses/capability/delete/{id}', [CourseController::class, 'capability_delete'])->name('courses.capability.delete');


    //certificate
    Route::get('/certificate/view/{id}', [CertificateController::class, 'certificate_view'])->name('certificate.view');
    Route::get('/certificate/generate/{id}', [CertificateController::class, 'certificate_generate'])->name('certificate.generate');
    Route::get('/certificate/verify-form', [CertificateController::class, 'certificate_verify_view'])->name('certificate.verify.view');
    Route::post('/certificate/verify', [CertificateController::class, 'certificate_verify'])->name('certificate.verify');

    //Enrolls
    Route::get('/enrollments', [EnrollController::class, 'index'])->name('enroll.index');
    Route::get('/enroll/approve/{id}', [EnrollController::class, 'approve'])->name('enroll.approve');
    Route::get('/enroll/delete/{id}', [EnrollController::class, 'delete'])->name('enroll.delete');
    Route::get('/enroll/{id}', [EnrollController::class, 'show'])->name('enroll.show');
    Route::get('/enroll/{id}/fetch', [EnrollController::class, 'fetch'])->name('enroll.fetch');

    //Settings
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings/update', [SettingsController::class, 'update'])->name('settings.update');

    //quizzes
    Route::get('/quizzes', [QuizController::class, 'index'])->name('quizzes');
    Route::post('/quizzes/add', [QuizController::class, 'add'])->name('quizzes.add');

    Route::get('/quizzes/questions/{q_id}', [QuizController::class, 'questions'])->name('quiz.questions');
    Route::post('/quizzes/add-questions/{q_id}', [QuizController::class, 'store_questions'])->name('quiz.questions.store');

    Route::get('/quiz/edit/{id}', [QuizController::class, 'quiz_edit_modal'])->name('quiz.edit');
    Route::post('/quiz/update', [QuizController::class, 'quiz_update'])->name('quiz.update');
    Route::get('/quiz/delete/{id}', [QuizController::class, 'quiz_delete'])->name('quiz.delete');

    Route::get('/quiz/report/{id}', [QuizController::class, 'quiz_report'])->name('quiz.report');
    Route::get('/quiz/report/edit/{id}', [QuizController::class, 'quiz_report_edit_modal'])->name('quiz.report.edit');
    Route::post('/quiz/report/update', [QuizController::class, 'quiz_report_update'])->name('quiz.report.update');
    Route::get('/quiz/report/delete/{id}', [QuizController::class, 'quiz_report_delete'])->name('quiz.report.delete');

    Route::get('/quiz/questions/edit/{id}', [QuizController::class, 'question_edit_modal'])->name('question.edit');
    Route::post('/quiz/questions/update', [QuizController::class, 'question_update'])->name('question.update');
    Route::get('/quiz/questions/delete/{id}', [QuizController::class, 'question_delete'])->name('question.delete');

    // quiz participate
    Route::get('/quizzes/list', [StudentQuizController::class, 'index'])->name('quiz.list');
    Route::get('/quizzes/participate/{quiz_id}', [StudentQuizController::class, 'quiz_participate'])->name('quiz.participate');
    Route::post('/quiz/submit/{quiz_id}', [StudentQuizController::class, 'quiz_submit'])->name('quiz.submit');
    Route::get('/quizzes/view-report/{quiz_id}', [StudentQuizController::class, 'quiz_view_report'])->name('quiz.view.report');

    //site customization
    //homepage
    Route::get('/site-customize/homepage', [SiteCustomizeController::class, 'customize_home'])->name('customize.home');
    Route::post('/site-customize/homepage/banner', [SiteCustomizeController::class, 'customize_home_banner'])->name('customize.home.banner');

    Route::post('/site-customize/homepage/feature', [SiteCustomizeController::class, 'customize_home_feature'])->name('customize.home.feature');
    Route::post('/site-customize/homepage/feature/add', [SiteCustomizeController::class, 'add_new_feature'])->name('add.new.feature');

    Route::get('/site-customize/homepage/feature/edit/{id}', [SiteCustomizeController::class, 'feature_edit_modal'])->name('feature.edit');
    Route::post('/site-customize/homepage/feature/update', [SiteCustomizeController::class, 'feature_update'])->name('feature.update');
    Route::get('/site-customize/homepage/feature/delete/{id}', [SiteCustomizeController::class, 'feature_delete'])->name('feature.delete');

    Route::post('/site-customize/homepage/counter/add', [SiteCustomizeController::class, 'add_new_counter'])->name('add.new.counter');
    Route::get('/site-customize/homepage/counter/edit/{id}', [SiteCustomizeController::class, 'counter_edit_modal'])->name('counter.edit');
    Route::post('/site-customize/homepage/counter/update', [SiteCustomizeController::class, 'counter_update'])->name('counter.update');
    Route::get('/site-customize/homepage/counter/delete/{id}', [SiteCustomizeController::class, 'counter_delete'])->name('counter.delete');

    Route::post('/site-customize/homepage/training-video/add', [SiteCustomizeController::class, 'add_training_video'])->name('add.training.video');
    Route::get('/site-customize/homepage/training-video/delete/{id}', [SiteCustomizeController::class, 'training_video_delete'])->name('training.video.delete');

    //faq
    Route::post('/site-customize/homepage/faq-add', [SiteCustomizeController::class, 'customize_faq_add'])->name('customize.faq.add');
    Route::get('/site-customize/homepage/faq-edit/{id}', [SiteCustomizeController::class, 'customize_faq_edit'])->name('customize.faq.edit');
    Route::post('/site-customize/homepage/faq-update', [SiteCustomizeController::class, 'customize_faq_update'])->name('customize.faq.update');
    Route::get('/site-customize/homepage/faq-delete/{id}', [SiteCustomizeController::class, 'customize_faq_delete'])->name('customize.faq.delete');

    //contact page
    Route::get('/site-customize/contact-page', [SiteCustomizeController::class, 'customize_contact_page'])->name('customize.contact');

    //branches
    Route::post('/site-customize/contact-page/branch-part', [SiteCustomizeController::class, 'customize_branch_part'])->name('customize.contact.branch');
    //contact
    Route::post('/site-customize/contact-page/contact-part', [SiteCustomizeController::class, 'customize_contact_part'])->name('customize.contact.contact');

    //about page
    Route::get('/site-customize/about-page', [SiteCustomizeController::class, 'customize_about_page'])->name('customize.about');
    //about
    Route::post('/site-customize/about-page/about-us', [SiteCustomizeController::class, 'customize_about_part'])->name('customize.about.about');
    Route::post('/site-customize/about-page/director-speech', [SiteCustomizeController::class, 'customize_director_speech_part'])->name('customize.about.director_speech');
    //certified by
    Route::post('/site-customize/about-page/certified-by-add', [SiteCustomizeController::class, 'customize_certified_by_add'])->name('customize.certified_by.add');
    Route::get('/site-customize/about-page/certified-by-edit/{id}', [SiteCustomizeController::class, 'customize_certified_by_edit'])->name('customize.certified_by.edit');
    Route::post('/site-customize/about-page/certified-by-update', [SiteCustomizeController::class, 'customize_certified_by_update'])->name('customize.certified_by.update');
    Route::get('/site-customize/about-page/certified-by-delete/{id}', [SiteCustomizeController::class, 'customize_certified_by_delete'])->name('customize.certified_by.delete');
   

    //video courses (admin)
    Route::get('/video-courses', [VideoCourseController::class, 'index'])->name('vid_courses');
    Route::post('/video-courses/add', [VideoCourseController::class, 'add'])->name('vid_courses.add');
    Route::get('/video-courses/edit/{id}', [VideoCourseController::class, 'course_edit_modal'])->name('vid_course.edit');
    Route::post('/video-courses/update', [VideoCourseController::class, 'course_update'])->name('vid_course.update');
    Route::get('/video-courses/delete/{id}', [VideoCourseController::class, 'course_delete'])->name('vid_course.delete');

    Route::get('/video_courses/videos/{course_id}', [VideoCourseController::class, 'vid_courses_videos'])->name('vid_courses.videos');
    Route::post('/video_courses/add-videos/{course_id}', [VideoCourseController::class, 'videos_store'])->name('vid_courses.videos.store');
    Route::get('/video-courses/video/edit/{id}', [VideoCourseController::class, 'video_edit_modal'])->name('video.edit');
    Route::post('/video-courses/video/update', [VideoCourseController::class, 'video_update'])->name('video.update');
    Route::get('/video-courses/video/delete/{id}', [VideoCourseController::class, 'video_delete'])->name('video.delete');

    //video courses for students
    Route::get('/students/video-courses', [VideoCourseController::class, 'student_vid_courses'])->name('student.vid_courses');
    Route::get('/students/video_courses/videos/{course_id}', [VideoCourseController::class, 'student_vid_courses_videos'])->name('student.vid_courses.videos');
});



// SSLCOMMERZ Start
Route::get('/ssl-checkout-box', [SslCommerzPaymentController::class, 'easyCheckout'])->name('ssl.checkout.box');
// Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index'])->name('pay.ssl');
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
