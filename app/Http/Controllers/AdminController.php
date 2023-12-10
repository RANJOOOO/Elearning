<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\adminmains;
use App\Models\multiplecourses;
use App\Models\multiplelessons;
use App\Models\multiplesections;
use App\Models\multipleunits;
use App\Models\plainhtml;
use App\Models\quizmultiplechoices;
use App\Models\quizwithchoices;
use App\Models\singletextfield;
use App\Models\singletextarea;
use App\Models\unitexams;


class AdminController extends Controller
{

    // public function showLoginForm()
    // {
    //     // return view('admin.auth.login');
    //     return 'hello';
    // }

    public function showAdminForm()
    {
        $admins = adminmains::all();
        return view('admin/auth/mainPage', compact('admins'));
    }
    public function showDetailsCourses($adminCourseId)
    {
        
        $admin = adminmains::findOrFail($adminCourseId);
        $data = $admin->adminMultipleCourses->sortBy('order');
        return view('admin.auth.courseDetail', compact('data', 'admin'));
    }
    public function createCourse($admin)
    {
        
        // return "Hello";
        return view('admin.auth.createCourse', compact('admin'));

    }



    
    public function createCoursenow(Request $request)
    {
    
         // Validate the request
    $request->validate([
        
        'courseName' => 'required',
        'courseTitle' => 'required',
        'description' => 'required',
        'order' => 'required',
        // Add other validation rules as needed
    ]);

    // Create a new course instance
    $course = new multiplecourses([
        'courseName' => $request->input('courseName'),
        'courseTitle' => $request->input('courseTitle'),
        'description' => $request->input('description'),
        'order' => $request->input('order'),
        

        // Add other fields as needed
    ]);

    // Set the adminCourse_id before saving
    $course->adminCourse_id = $request->adminid;

    // Save the course
    $course->save();

    return "Successfully Created";



    }




    public function showSectionForm($course)
    {
        $data = multiplecourses::findOrFail($course);
        $info = $data->sections->sortBy('order');
        return view('admin.auth.sectionDetail', compact('info', 'data'));


    }
    public function createSection($data)
    {
        
        // return "Hello";
        return view('admin.auth.createSection', compact('data'));

    }
    public function createSectionnow(Request $request)
    {
            // Validate the request
           
    $request->validate([
        
        'sectionName' => 'required',
        'sectionTitle' => 'required',
        'description' => 'required',
        'order' => 'required',
        // Add other validation rules as needed
    ]);

    // Create a new course instance
    $course = new multiplesections([
        'sectionName' => $request->input('sectionName'),
        'sectionTitle' => $request->input('sectionTitle'),
        'description' => $request->input('description'),
        'order' => $request->input('order'),
        

        // Add other fields as needed
    ]);

    // Set the adminCourse_id before saving
    $course->Coursepage_id = $request->courseid;

    // Save the course
    $course->save();

    return "Successfully Created";
    }

    public function editCourse($data)
    {
        $course = multiplecourses::find($data);
        return view('admin.auth.courseEdit', compact('course'));

    }
    public function updateCourse(Request $request, $id){
        $request->validate([
            'courseTitle' => 'required|string|max:255',
            'courseName' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'required|integer',


            // Add validation rules for other fields as needed
        ]);
    
        $course = multiplecourses::findOrFail($id);
    
        $course->update([
            'courseTitle' => $request->input('courseTitle'),
            'courseName' => $request->input('courseName'),
            'description' => $request->input('description'),
            'order' => $request->input('order'),
            // Update other fields as needed
        ]);
        return view('admin.auth.courseEdit', compact('course'));

    }
    public function showUnitForm($section)
    {
        $data = multiplesections::findOrFail($section);
        $new = $data->units->sortBy('order');
        return view('admin.auth.unitDetail', compact('new', 'data'));

    }
    public function createunit($data)
    {
        return view('admin.auth.createUnit', compact('data'));


    }
    public function createUnitnow(Request $request)
    {

              
    $request->validate([
        
        'unitName' => 'required',
        'unitTitle' => 'required',
        'description' => 'required',
        'order' => 'required',
        // Add other validation rules as needed
    ]);

    // Create a new course instance
    $course = new multipleunits([
        'unitName' => $request->input('unitName'),
        'unitTitle' => $request->input('unitTitle'),
        'description' => $request->input('description'),
        'order' => $request->input('order'),
        

        // Add other fields as needed
    ]);

    // Set the adminCourse_id before saving
    $course->adminSection_id = $request->unitid;
    $data=$request->unitid;

    // Save the course
    $course->save();
    return view('admin.auth.createUnit', compact('data'));
    return "Successfully Created";

    }
    public function editSection($data)
    {
        $course = multiplesections::find($data);
        return view('admin.auth.sectionEdit', compact('course'));
    }
    public function updateSection(Request $request, $id)
    {
        $request->validate([
            'sectionTitle' => 'required|string|max:255',
            'sectionName' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'required|integer',

            // Add validation rules for other fields as needed
        ]);
    
        $course = multiplesections::findOrFail($id);
    
        $course->update([
            'sectionTitle' => $request->input('sectionTitle'),
            'sectionName' => $request->input('sectionName'),
            'description' => $request->input('description'),
            'order' => $request->input('order'),
            // Update other fields as needed
        ]);
        return view('admin.auth.sectionEdit', compact('course'));

    }

    public function viewtest()
    {

        return view('admin.auth.htmltest');

    }
    public function checktest(Request $request)
    {
        $data=$request->description;
        // return $data;
        return view('admin.auth.checkhtml', compact('data'));

    }
    public function showLessonForm($unit)
    {
        $data = multipleunits::findOrFail($unit);
        $new = $data->lessons->sortBy('order');
        return view('admin.auth.lessonDetail', compact('new', 'data'));
    }
    public function lessoncreate($data)
    {
        return view('admin.auth.createLesson', compact('data'));


    }
    public function lessonstore(Request $request)
    {
                  
    $request->validate([
        
        'lessonName' => 'required',
        'lessonTitle' => 'required',
        'description' => 'required',
        'order' => 'required',
        // Add other validation rules as needed
    ]);

    // Create a new course instance
    $course = new multiplelessons([
        'lessonName' => $request->input('lessonName'),
        'lessonTitle' => $request->input('lessonTitle'),
        'description' => $request->input('description'),
        'order' => $request->input('order'),
        

        // Add other fields as needed
    ]);

    // Set the adminCourse_id before saving
    $course->adminUnit_id = $request->unitid;
    $data=$request->unitid;

    // Save the course
    $course->save();
    return view('admin.auth.createLesson', compact('data'));

    

    }
    public function editUnit($data){
        $unit = multipleunits::find($data);
        return view('admin.auth.unitEdit', compact('unit'));
    }
    public function updateUnit(Request $request, $id)
    {
        $request->validate([
            'unitTitle' => 'required|string|max:255',
            'unitName' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'required|integer',

            // Add validation rules for other fields as needed
        ]);
    
        $unit = multipleunits::findOrFail($id);
    
        $unit->update([
            'unitTitle' => $request->input('unitTitle'),
            'unitName' => $request->input('unitName'),
            'description' => $request->input('description'),
            'order' => $request->input('order'),
            // Update other fields as needed
        ]);
        return view('admin.auth.unitEdit', compact('unit'));


    }


    public function showPageForm($lesson)
    {
        $data = multiplelessons::findOrFail($lesson);
        $new = $data->pages->sortBy('order');
        $x= $new->first()['id'];


        $plainHtmlData = plainhtml::all()->sortBy('order');
        $singleTextFieldData = singletextfield::all()->sortBy('order');
        $singleTextAreaData = singletextarea::all()->sortBy('order');
        $quizMultipleChoices = quizmultiplechoices::all()->sortBy('order');
        $quizWithChoices = quizwithchoices::all()->sortBy('order');


        return view('admin.auth.pageDetail', [
            'plainHtmlData' => $plainHtmlData,
            'singleTextFieldData' => $singleTextFieldData,
            'singleTextAreaData' => $singleTextAreaData,
            'quizMultipleChioces'=>$quizMultipleChoices,
            'quizWithChoices'=>$quizWithChoices,
            'new'=>$new,
            'data'=>$data,
            'x'=>$x,
            // ... include other data
        ]);



        // return view('admin.auth.pageDetail', compact('new', 'data','x'));
        

    }
    public function editLesson($data){
        $lesson = multiplelessons::find($data);
        // return $lesson;
        return view('admin.auth.lessonEdit', compact('lesson'));
    }


    public function updateLesson(Request $request, $id)
    {
        $request->validate([
            'lessonTitle' => 'required|string|max:255',
            'lessonName' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'required|integer',

            // Add validation rules for other fields as needed
        ]);
    
        $lesson = multiplelessons::findOrFail($id);
    
        $lesson->update([
            'lessonTitle' => $request->input('lessonTitle'),
            'lessonName' => $request->input('lessonName'),
            'description' => $request->input('description'),
            'order' => $request->input('order'),
            // Update other fields as needed
        ]);
        return view('admin.auth.lessonEdit', compact('lesson'));


    }


    public function pageType($data){

        return view('admin.auth.pageType', compact('data'));
    }
    public function createPlainHtmlPage($data){
        // return $data;
        return view('admin.auth.pagePlainHtml', compact('data'));

    }
    public function storePlainHtmlPage(Request $request)
    {

        
        // return $request->plainHtmlid;
        $request->validate([
        
            'Title' => 'required',
            'html_code' => 'required',
            'order' => 'required',
            'page_type' => 'required',
            // Add other validation rules as needed
        ]);
    
        // Create a new course instance
        $course = new plainhtml([
            'Title' => $request->input('Title'),
            'html_code' => $request->input('html_code'),
            'order' => $request->input('order'),
            'page_type'=>$request->input('page_type'),
            
    
            // Add other fields as needed
        ]);
    
        
        $course->adminPage_id = $request->plainHtmlid;
        $data=$request->plainHtmlid;
    
        // Save the course
        $course->save();
        return view('admin.auth.pagePlainHtml', compact('data'));


    }
    public function uploadckeditorimg(Request $request)
    {
        if($request->hasFile('upload')){
            $originName=$request->file('upload')->getClientOriginalName();
            $fileName=pathinfo($originName, PATHINFO_FILENAME);
            $extension=$request->file('upload')->getClientOriginalExtension();
            $fileName=$fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move(public_path('media'), $fileName);
            $url=asset('media/'.$fileName);
            return response()->json(['fileName'=>$fileName, 'uploaded'=>1,'url'=>$url]);

        }
    }
    public function createsingletextfield($data){
       
        return view('admin.auth.pagesingletextfield', compact('data'));


    }
    public function storesingletextfield(Request $request)
    {

        $request->validate([
        
            'Title' => 'required',
            'html_code' => 'required',
            'order' => 'required',
            'textFieldTitle'=>'required',
            'page_type'=>'required',

            // Add other validation rules as needed
        ]);
    
        // Create a new course instance
        $course = new singletextfield([
            'Title' => $request->input('Title'),
            'html_code' => $request->input('html_code'),
            'order' => $request->input('order'),
            'textFieldTitle' => $request->input('textFieldTitle'),
            'page_type' => $request->input('page_type'),
            
    
            // Add other fields as needed
        ]);
    
        
        $course->adminPage_id = $request->pagesingletextfieldid;
        $data=$request->pagesingletextfieldid;
    
        // Save the course
        $course->save();
        return view('admin.auth.pagesingletextfield', compact('data'));

    }
    public function createsingletextarea($data)
    {
        return view('admin.auth.pagesingletextarea', compact('data'));


    }
    public function storesingletextarea(Request $request)
    {
        $request->validate([
        
            'Title' => 'required',
            'html_code' => 'required',
            'order' => 'required',
            'textAreaTitle'=>'required',
            'page_type'=>'required',

            // Add other validation rules as needed
        ]);
    
        // Create a new course instance
        $course = new singletextarea([
            'Title' => $request->input('Title'),
            'html_code' => $request->input('html_code'),
            'order' => $request->input('order'),
            'textAreaTitle' => $request->input('textAreaTitle'),
            'page_type' => $request->input('page_type'),
            
    
            // Add other fields as needed
        ]);
    
        
        $course->adminPage_id = $request->pagesingletextareaid;
        $data=$request->pagesingletextareaid;
    
        // Save the course
        $course->save();
        return view('admin.auth.pagesingletextarea', compact('data'));


    }
    public function createquizwithchoices($data)
    {
        return view('admin.auth.quizwithchoices', compact('data'));

    }
    public function storequizwithchoices(Request $request){
        // return $request;





        $request->validate([
        
            'Title' => 'required',
            'html_code' => 'required',
            'order' => 'required',
            'page_type'=>'required',
            'Answer'=>'required',
            'text1'=>'required',
            'text2'=>'required',
            'text3'=>'required',
            'text4'=>'required',
            'url1'=>'required',
            'url2'=>'required',
            'url3'=>'required',
            'url4'=>'required',

            // Add other validation rules as needed
        ]);
    
        // Create a new course instance
        $course = new quizwithchoices([
            'Title' => $request->input('Title'),
            'html_code' => $request->input('html_code'),
            'order' => $request->input('order'),
            'page_type' => $request->input('page_type'),
            // 'numbering' => $request->input('numbering'),
            'text1' => $request->input('text1'),
            'text2' => $request->input('text2'),
            'text3' => $request->input('text3'),
            'text4' => $request->input('text4'),
            'url1' => $request->input('url1'),
            'url2' => $request->input('url2'),
            'url3' => $request->input('url3'),
            'url4' => $request->input('url4'),
            'Answer' => $request->input('Answer'),

            // Add other fields as needed
        ]);
        
        
        

        $course->adminPage_id = $request->quizwithchoicesid;
        $data=$request->quizwithchoicesid;
        $course->save();
        return view('admin.auth.quizwithchoices', compact('data'));
    }

    public function createquizmultiplechoices($data)
    {
        return view('admin.auth.quizmultiplechoices', compact('data'));


    }
    public function storequizmultiplechoices(Request $request)
    {

        $request->validate([
        
            'Title' => 'required',
            'html_code' => 'required',
            'order' => 'required',
            'page_type'=>'required',
            'order'=>'required',
            'Answer'=>'required',
            'choice1'=>'required',
            'choice2'=>'required',
            'choice3'=>'required',
            'choice4'=>'required',

            // Add other validation rules as needed
        ]);
    
        // Create a new course instance
        $course = new quizmultiplechoices([
            'Title' => $request->input('Title'),
            'html_code' => $request->input('html_code'),
            'order' => $request->input('order'),
            'Answer' => $request->input('Answer'),
            'page_type' => $request->input('page_type'),
            'choice1' => $request->input('choice1'),
            'choice2' => $request->input('choice2'),
            'choice3' => $request->input('choice3'),
            'choice4' => $request->input('choice4'),
            
    
            // Add other fields as needed
        ]);
    
        
        $course->adminPage_id = $request->quizmultiplechoices;
        $data=$request->quizmultiplechoices;
    
        // Save the course
        $course->save();
        return view('admin.auth.quizmultiplechoices', compact('data'));


    }
    public function editPageDetail($page_type,$id)
    {


        $page = null;

    // Based on the page_type, retrieve the corresponding page
    switch ($page_type) 
    {
        case 'PlainHTML':
            $page = PlainHtml::findOrFail($id);
            return view('admin.auth.editPlainHtml', compact('page'));
            break;
        case 'SingleTextField':
            $page = SingleTextField::findOrFail($id);
            return view('admin.auth.editSingleTextField', compact('page'));
            break;
        case 'SingleTextarea':
            $page = SingleTextarea::findOrFail($id);
            return view('admin.auth.editSingleTextarea', compact('page'));

        case 'quizwithchoices':
            $page = quizwithchoices::findOrFail($id);
            return view('admin.auth.editquizwithchoices', compact('page'));
        case 'quizmultiplechoices':
            $page = quizmultiplechoices::findOrFail($id);
            return view('admin.auth.editquizmultiplechoices', compact('page'));

        break;

    }
 




}
    public function updateplainHtml(Request $request, $id)
    {
        $request->validate([
        
            'Title' => 'required',
            'html_code' => 'required',
            'order' => 'required',
            // Add other validation rules as needed
        ]);
        $plainhtml = PlainHtml::findOrFail($id);

        $plainhtml->update([
            'Title' => $request->input('Title'),
            'html_code' => $request->input('html_code'),
            'order' => $request->input('order'),
            // Update other fields as needed
        ]);
        return"updated successfully";



    }
    public function updatesingleTextField(Request $request,$id)
    {
        $request->validate([
        
            'Title' => 'required',
            'html_code' => 'required',
            'order' => 'required',
            'textFieldTitle'=>'required'
            // Add other validation rules as needed
        ]);
        $singletextfield = SingleTextField::findOrFail($id);

        $singletextfield->update([
            'Title' => $request->input('Title'),
            'html_code' => $request->input('html_code'),
            'order' => $request->input('order'),
            'textFieldTitle'=>$request->input('textFieldTitle'),
            // Update other fields as needed
        ]);
        return"updated successfully";


    }
    public function updatesingleTextarea(Request $request, $id)
    {

        $request->validate([
        
            'Title' => 'required',
            'html_code' => 'required',
            'order' => 'required',
            'textAreaTitle'=>'required'
            // Add other validation rules as needed
        ]);
        $singletextarea = SingleTextarea::findOrFail($id);

        $singletextarea->update([
            'Title' => $request->input('Title'),
            'html_code' => $request->input('html_code'),
            'order' => $request->input('order'),
            'textAreaTitle'=>$request->input('textAreaTitle'),
            // Update other fields as needed
        ]);
        return"updated successfully";

    }
    public function updatequizwithchoices(Request $request, $id)
    {

        $request->validate([
        
            'Title' => 'required',
            'html_code' => 'required',
            'order' => 'required',
            'text1' => 'required',
            'text2' => 'required',
            'text3' => 'required',
            'text4' => 'required',
            'url1' => 'required',
            'url2' => 'required',
            'url3' => 'required',
            'url4' => 'required',
            'Answer' => 'required',
            // Add other validation rules as needed
        ]);
        $quiz = quizwithchoices::findOrFail($id);

        $quiz->update([
            'Title' => $request->input('Title'),
            'html_code' => $request->input('html_code'),
            'order' => $request->input('order'),
            'text1' => $request->input('text1'),
            'text2' => $request->input('text2'),
            'text3' => $request->input('text3'),
            'text4' => $request->input('text4'),
            'url1' => $request->input('url1'),
            'url2' => $request->input('url2'),
            'url3' => $request->input('url3'),
            'url4' => $request->input('url4'),
            'Answer' => $request->input('Answer'),

            // Update other fields as needed
        ]);
        return"updated successfully";

    }
    public function updatequizmultiplechoices(Request $request, $id)
    {
        $request->validate([
        
            'Title' => 'required',
            'html_code' => 'required',
            'order' => 'required',
            'choice1' => 'required',
            'choice2' => 'required',
            'choice3' => 'required',
            'choice4' => 'required',
            
            // Add other validation rules as needed
        ]);
        $quiz = quizmultiplechoices::findOrFail($id);

        $quiz->update([
            'Title' => $request->input('Title'),
            'html_code' => $request->input('html_code'),
            'order' => $request->input('order'),
            'choice1' => $request->input('choice1'),
            'choice2' => $request->input('choice2'),
            'choice3' => $request->input('choice3'),
            'choice4' => $request->input('choice4'),
            'Answer' => $request->input('Answer'),

            // Update other fields as needed
        ]);
        return"updated successfully";




    }












    public function showUnitExam($unit)
    {
        $data = multipleunits::findOrFail($unit);
        // $new = $data->unit;
        // return$new;
        // return $data;
        return view('admin.auth.unitExamCreate', compact('data'));

    }
    public function storeUnitExam(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text_field' => 'required',
            'html_code' => 'required',
            // 'adminUnit_id' => 'required',
        ]);

        $unitexam = unitexams::create([
            'title' => $request->input('title'),
            'description' => $request->input('html_code'),
            'text_field'=>$request->input('text_field'),
            'adminUnit_id' => $request->input('unitid'),
        ]);
        return "Created successfully";

        return redirect()->route('unitexam.show', ['unitexam' => $unitexam]);
    }


}
