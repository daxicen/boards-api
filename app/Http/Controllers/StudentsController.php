<?php

namespace App\Http\Controllers;

use App\ApplicationInstance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Student;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth');
    }

    public function index(){
        return view('student.student');
    }

    public function createStudent(Request $request){

            //Checking whether the email is already taken
            $validator = Validator::make($request->all(), [
                'email' => 'unique:students|max:140',
            ]);

            if ($validator->fails()) {

                return response()->json(['status' => 'error','error_code' => '1004', 'message' => 'Email Taken', ]);

            }else{

                $student = new Student;
                $student->full_name = $request->input('first_name') ." ". $request->input('last_name') ;
                $student->email =$request->input('email') ;
                $student->password = Hash::make($request->input('password') );

                $student->department = 'none';
                $student->course = 'none';
                $student->year = 'none' ;
                $student->title = 'none' ;

                $student->verification_code = $this->random_string(6);
                $student->verification_status = 'false';


                $student->save();

                $appInstance = ApplicationInstance::find($request->input('app_instance'));
                $appInstance->student_id = $student->id;
                $appInstance->registration_status = 'true';
                $appInstance->save();

                return response()->json(['status' => 'success', 'message' => 'Student Created And associated with this app instance']);
            }


    }

    public function getStudent($app_instance){
        $appInstance = ApplicationInstance::find($app_instance );

        $student = Student::find($appInstance->student_id);

        return response()->json(['status' => 'success', 'student' => $student]);

    }

    public function updateStudent(Request $request, $app_instance){

        $appInstance = ApplicationInstance::find($app_instance );

        $student = Student::find($appInstance->student_id);

        $student->full_name = $request->input('full_name');

        $student->department = $request->input('department');
        $student->course = $request->input('course');
        $student->year = $request->input('year');

        $student->title = $request->input('title');

        $student->photo_link = $request->input('photo_link');

        $student->save();

        return response()->json(['status' => 'success', 'message' => 'Update successful']);

    }

    public function login(Request $request, $app_instance){

        $credentials = ['email'=>$request->input('email'), 'password'=>$request->input('password') ];

        // Attempt to login
        if(Auth::guard('student')->attempt($credentials)) {

            $loggedStudent  = DB::table('students')->Where('email', $request->input('email') )->first();

            //associate appInstance with logged user
            $app_instance = ApplicationInstance::find($app_instance);
            $app_instance->student_id = $loggedStudent->id ;
            $app_instance->save();
            return response()->json(['status' => 'success', 'student' => $loggedStudent ]);

        }else{
            return response()->json(['status' => 'failure' ]);
        }

    }

    //for email verification
    public function random_string($length) {
        $key = '';
        $keys = array_merge(range(0, 9), range('A', 'Z'));

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }

}
