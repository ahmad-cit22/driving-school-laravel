<?php

namespace App\Http\Controllers;

use App\Models\ClassVideo;
use App\Models\CourseCategory;
use App\Models\CourseType;
use App\Models\VideoCourse;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VideoCourseController extends Controller {
    //quizzes list

    public function index() {
        return view('admin.video_courses.index', [
            'course_categories' => CourseCategory::all(),
            'course_types' => CourseType::all(),
            'vid_courses' => VideoCourse::all(),
        ]);
    }

    public function add(Request $request) {

        $request->validate([
            'course_category' => 'required',
            'course_type' => 'required',
            'course_title' => 'required',
        ], [
            'course_category.required' => 'Please select the course category.',
            'course_type.required' => 'Please select the course type.',
            'course_title.required' => 'Please enter a title for the course.',
        ]);

        VideoCourse::insert([
            'course_category' => $request->course_category,
            'course_type' => $request->course_type,
            'course_title' => $request->course_title,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('addSuccess', 'Course Added Successfully!');
    }

    public function course_edit_modal($id) {
        return view('admin.madals.edit-vid-course', [
            'course' => VideoCourse::find($id),
            'course_categories' => CourseCategory::all(),
            'course_types' => CourseType::all(),
        ]);
    }

    public function course_update(Request $request) {

        $course = VideoCourse::find($request->id);
        $request->validate([
            'course_category' => 'required',
            'course_type' => 'required',
            'course_title' => 'required',
        ], [
            'course_category.required' => 'Please select the course category.',
            'course_type.required' => 'Please select the course type.',
            'course_title.required' => 'Please enter a title for the course.',
        ]);

        $course->update([
            'course_category' => $request->course_category,
            'course_type' => $request->course_type,
            'course_title' => $request->course_title,
        ]);

        session()->flash('success', 'Course Edited Successfully!');
    }

    public function course_delete($id) {
        if (VideoCourse::find($id)->delete()) {
            return back()->with('dltSuccess', 'Course deleted successfully');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function vid_courses_videos($course_id) {
        $vid_course = VideoCourse::find($course_id);
        $videos = ClassVideo::where('vid_course_id', $course_id)->get();

        return view('admin.video_courses.videos', [
            'vid_course' => $vid_course,
            'videos' => $videos,
        ]);
    }

    public function videos_store(Request $request, $course_id) {
        $vid_course = VideoCourse::find($course_id);

        $request->validate([
            'class_no' => 'required',
            'video_title' => 'required',
            'video_link' => 'required',
        ], [
            'class_no.required' => 'Please enter the class no.',
            'video_title.required' => 'Please enter the video title.',
            'video_link.required' => 'Please enter the link to the video.',
        ]);

        ClassVideo::insert([
            'vid_course_id' => $course_id,
            'class_no' => $request->class_no,
            'video_title' => $request->video_title,
            'video_link' => $request->video_link,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('addSuccess', 'New Video Added Successfully!');
    }

    public function video_edit_modal($id) {
        return view('admin.madals.edit-vid-course-video', [
            'video' => ClassVideo::find($id),
        ]);
    }

    public function video_update(Request $request) {

        $video = ClassVideo::find($request->id);

        $request->validate([
            'class_no' => 'required',
            'video_title' => 'required',
            'video_link' => 'required',
        ], [
            'class_no.required' => 'Please enter the class no.',
            'video_title.required' => 'Please enter the video title.',
            'video_link.required' => 'Please enter the link to the video.',
        ]);

        $video->update([
            'class_no' => $request->class_no,
            'video_title' => $request->video_title,
            'video_link' => $request->video_link,
        ]);

        session()->flash('success', 'Class Video Edited Successfully!');
    }

    public function video_delete($id) {
        if (ClassVideo::find($id)->delete()) {
            return back()->with('success', 'Class Video deleted successfully');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }


    public function student_vid_courses() {
        return view('admin.video_courses.vid_courses_students', [
            'vid_courses' => VideoCourse::all(),
        ]);
    }
    public function student_vid_courses_videos($course_id) {
        $vid_course = VideoCourse::find($course_id);
        $videos = ClassVideo::where('vid_course_id', $course_id)->get();

        return view('admin.video_courses.vid_courses_videos_students', [
            'vid_course' => $vid_course,
            'videos' => $videos,
        ]);
    }
}
