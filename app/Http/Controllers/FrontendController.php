<?php

namespace App\Http\Controllers;

use App\Mail\StudentEnroll;
use App\Models\AboutPart;
use App\Models\AccountIncome;
use App\Models\BannerPart;
use App\Models\BookedSchedule;
use App\Models\Branch;
use App\Models\BranchCapability;
use App\Models\BranchPart;
use App\Models\CertifiedByPart;
use App\Models\ContactPart;
use App\Models\CounterFact;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseSlot;
use App\Models\CourseType;
use App\Models\DirectorSpeechPart;
use App\Models\Enroll;
use App\Models\FaqQuestion;
use App\Models\Feature;
use App\Models\FeaturePart;
use App\Models\TrainingProcessVideo;
use App\Models\User;
use App\Models\UserOtp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FrontendController extends Controller {
    public function test() {
        return view('admin.otp_verification.index');
        // send_sms('01839096877', 'কাজ করে');
        // $data = 'https://google.com';
        // Mail::to('rhrony0009@gmail.com')->send(new StudentEnroll($data));
    }

    public function index() {
        return view('frontend.index', [
            'banner_part' => BannerPart::all()->first(),
            'featurePart' => FeaturePart::all()->first(),
            'features' => Feature::orderBy('priority')->take(6)->get(),
            'counters' => CounterFact::orderBy('priority')->take(4)->get(),
            'categories' => CourseCategory::all(),
            'video' => TrainingProcessVideo::all()->first(),
            'courses' => Course::orderBy('priority')->get(),
            'certified_by_parts' => CertifiedByPart::all(),
            'faq_questions' => FaqQuestion::all(),
        ]);
    }

    public function enroll() {
        // $branches = Branch::with('slot')->get();
        $branches = Branch::with('capability')
            ->with('slot')
            ->get()
            ->reject(function ($data) {
                return $data->capability == null;
            })
            ->reject(function ($data) {
                return $data->slot == null;
            });
        $data = [
            'branches' => $branches,
            'types' => CourseType::all(),
            'courses' => Course::all(),
        ];
        return view('frontend.enroll', $data);
    }

    public function enroll_store(Request $request) {
        if (User::where('mobile', $request->mobile)->exists()) {
            return view('frontend.modals.login-modal', ['mobile' => $request->mobile]);
        }
        if (Auth::check()) {
            if ($request->payment_process == '1') {
                $validator = Validator::make($request->all(), [
                    'branch' => 'required',
                    'course_category' => 'required',
                    'course_type' => 'required',
                    'course_slot' => 'required',
                    'price' => 'required',
                    'paid' => 'required|numeric|min:1000',
                    'start_date' => 'required'
                ], [
                    'price.required' => 'Please select Course Category & Type to get the Fee.',
                    'paid.min' => "The paying amount must be not less than BDT 1000.",
                ]);

                if ($request->price < $request->paid) {
                    return response()->json(['paidErr' => "You can't pay more than the course fee! <br> Please fill up the form fields properly."]);
                }
            } else {
                $validator = Validator::make($request->all(), [
                    'branch' => 'required',
                    'course_category' => 'required',
                    'course_type' => 'required',
                    'course_slot' => 'required',
                    'price' => 'required',
                    'payment_process' => 'required',
                    'start_date' => 'required'
                ], [
                    'price.required' => 'Please select Course Category & Type to get the Fee.',
                ]);
            }
        } else {
            if ($request->payment_process == '1') {
                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'mobile' => 'required|unique:users,mobile|regex:/(01)[0-9]{9}/',
                    'email' => 'unique:users,email',
                    'branch' => 'required',
                    'course_category' => 'required',
                    'course_type' => 'required',
                    'course_slot' => 'required',
                    'price' => 'required',
                    'paid' => 'required|numeric|min:1000',
                    'start_date' => 'required',
                    'password' => 'required|same:confirm_password',
                    'confirm_password' => 'required',
                ], [
                    'paid.min' => "The paying amount must be not less than BDT 1000.",
                    'mobile.unique' => 'Mobile number has already been taken.',
                    'email.unique' => 'Email has already been taken.',
                    'price.required' => 'Please select Course Category & Type to get the Fee.',
                    'password.same' => 'Password and confirm password does not match.'
                ]);

                if ($request->price < $request->paid) {
                    return response()->json(['paidErr' => "You can't pay more than the course fee! Please fill up the form fields properly."]);
                }
            } else {
                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'mobile' => 'required|unique:users,mobile|regex:/(01)[0-9]{9}/',
                    'email' => 'unique:users,email',
                    'branch' => 'required',
                    'course_category' => 'required',
                    'course_type' => 'required',
                    'course_slot' => 'required',
                    'price' => 'required',
                    'payment_process' => 'required',
                    'start_date' => 'required',
                    'password' => 'required|same:confirm_password',
                    'confirm_password' => 'required',
                ], [
                    'mobile.unique' => 'Mobile number has already been taken.',
                    'email.unique' => 'Email has already been taken.',
                    'price.required' => 'Please select Course Category & Type to get the Fee.',
                    'password.same' => 'Password and confirm password does not match.'
                ]);
            }
        }

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        } else {
            $capability = BranchCapability::where('branch_id', $request->branch)->where('category_id', $request->course_category)->first()->available_vehical;

            for ($i = 0; $i < CourseType::find($request->course_type)->max_duration; $i++) {
                $date = Carbon::parse($request->start_date)->addDay($i);
                if (Enroll::where('branch_id', $request->branch)->where('course_category', $request->course_category)->where('course_slot', $request->course_slot)->with('booked')->whereHas('booked', function ($q) use ($date) {
                    $q->where('date', $date);
                })->count() >= $capability) {
                    return response()->json(['errors' => ['start_date' => 'Schedule already booked. Please choose another date or time slot.', 'course_slot' => '', 'course_category' => '', 'branch' => '']]);
                }
            }
            if (Auth::check()) {
                $user = auth()->user();
            } else {
                $password =  $request->password;
                $user = User::create([
                    'name' => $request->name,
                    'mobile' => $request->mobile,
                    'email' => $request->email,
                    'password' => bcrypt($password),
                    'branch_id' => $request->branch
                ]);
                $user->syncRoles(4);
                Auth::login($user);
                $otp = UserOtp::create([
                    'user_id' => $user->id,
                    'otp' => rand(0000, 9999),
                ]);
                $number = $user->mobile;
                $message = "আপনার ওটিপি হল: " . bangla_digit($otp->otp);
                send_sms($number, $message);
            }

            $course_id = Course::where('category_id', $request->course_category)->where('type_id', $request->course_type)->first()->id;

            if ($request->payment_process == '1') {
                $data = [
                    'user' => $user,
                    'course' => Course::where('category_id', $request->course_category)->where('type_id', $request->course_type)->first(),
                    'enroll_data' => $request->all()
                ];

                return redirect()->route('ssl.checkout.box')->with('enroll_details', $data);
            } else if ($request->payment_process == '2') {
                //enroll store
                // return response()->json(['success' => true]);


                $enroll = Enroll::create([
                    'user_id' => $user->id,
                    'branch_id' => $request->branch,
                    'course_id' => $course_id,
                    'course_category' => $request->course_category,
                    'course_type' => $request->course_type,
                    'course_slot' => $request->course_slot,
                    'price' => $request->price,
                    'payment_process' => $request->payment_process,
                    'start_date' => $request->start_date,
                ]);
                // return [$user->id, $request->start_date, $course_id];

                for ($i = 0; $i < CourseType::find($request->course_type)->max_duration; $i++) {
                    BookedSchedule::create([
                        'enroll_id' => $enroll->id,
                        'date' => Carbon::parse($request->start_date)->addDay($i)
                    ]);
                }

                $data = [
                    'user' => $user,
                    'enroll' => $enroll,
                ];

                Mail::to($user->email)->send(new StudentEnroll($data));
                session([
                    'enrollSuccess' => 'Course enrollment successful! You can see your course details in your dashboard.',
                ]);
                // return back()->with('enrollSuccess', 'Course enrollment successful!');
                // session()->flash('success', 'Course enrollment successful!');
                return response()->json(['success' => true]);
            }
        }
    }

    public function get_category($id) {
        $all_categories = BranchCapability::where('branch_id', $id)->where('available_vehical', '>', 0)->with('category')->orderBy('category_id', 'ASC')->get();

        $html = '<option></option>';
        foreach ($all_categories as $category) {
            $html .= '<option value="' . $category->category->id . '">' . $category->category->category_name . '</option>';
        }
        return $html;
    }

    public function get_price($id) {
        $idArr = explode('.', $id);
        $category_id = $idArr[0];
        $type_id = $idArr[1];

        $price = Course::where('category_id', $category_id)->where('type_id', $type_id)->first()->after_discount;
        return $price;
    }

    public function get_slot($id) {
        $all_slot = CourseSlot::where('branch_id', $id)->where('type', 1)->orderBy('start_time', 'ASC')->get();
        $html = '<option></option>';
        foreach ($all_slot as $slot) {
            $html .= "<option value='" . $slot->id . "'>" . Carbon::parse($slot->start_time)->format('h:i A') . "-" . Carbon::parse($slot->end_time)->format('h:i A') . "</option>";
        }
        return $html;
    }


    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required',
            'login_password' => 'required'
        ], [
            'login_password.required' => 'The password field is required.'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        if (Auth::attempt(['mobile' => $request->mobile, 'password' => $request->login_password])) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['errors' => ['login_password' => 'Password not match.']]);
        }
    }

    public function about() {
        $page_title = 'About Us';
        return view('frontend.about', [
            'page_title' => $page_title,
            'banner_part' => BannerPart::all()->first(),
            'featurePart' => FeaturePart::all()->first(),
            'features' => Feature::orderBy('priority')->take(6)->get(),
            'counters' => CounterFact::orderBy('priority')->take(4)->get(),
            'about_part' => AboutPart::all()->first(),
            'director_speech_part' => DirectorSpeechPart::all()->first(),
            'certified_by_parts' => CertifiedByPart::all(),
        ]);
    }

    public function contact() {
        $page_title = 'Contact With Us';
        $rand_1 = rand(1, 9);
        $rand_2 = rand(1, 9);
        $branches = Branch::all();
        $branch_content = BranchPart::all()->first();
        $contact_content = ContactPart::all()->first();

        return view('frontend.contact', [
            'page_title' => $page_title,
            'rand_1' => $rand_1,
            'rand_2' => $rand_2,
            'branches' => $branches,
            'branch_content' => $branch_content,
            'contact_content' => $contact_content,
        ]);
    }

    public function courses_view() {
        $page_title = 'Our Courses';

        return view('frontend.courses', [
            'page_title' => $page_title,
            'categories' => CourseCategory::all(),
            'courses' => Course::all(),
        ]);
    }
}
