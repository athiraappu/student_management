<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\StudentMark;
use DB;

class MarksController extends Controller
{
    
    public function index(Request $request)
    {
    	$students_marks = DB::table('student_master as sm')
                ->leftjoin('students_mark as stm','stm.student_id','sm.id')
                ->leftjoin('subject as sub','sub.id','stm.subject_id')
                ->selectRaw('stm.id,sm.name,sub.subject_name,stm.term,stm.mark')
                ->get();
         // dd($students_marks);
    	return view('marks/index',compact('students_marks'));
    }

    public function create(Request $request){
    	$students = Student::all();
    	$subjects = Subject::all();

        return view('marks/create',compact('students','subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'student' => 'required',
        ]);

        $data['student_id'] = $request->student;
        foreach ($request->addMoreInputFields as $key => $value) {
        	 $data['subject_id'] = $value['subject'];
             $data['term'] = $value['term'];
             $data['mark'] = $value['mark'];

             StudentMark::create($data);
        }
        // $student = Student::create($storeData);
        return redirect('marks/index')->with('completed', 'Student has been saved!');
    }

    public function edit($id)
    {
    	$students = Student::all();
    	$subjects = Subject::all();

        $students_marks = DB::table('student_master as sm')
                ->leftjoin('students_mark as stm','stm.student_id','sm.id')
                ->leftjoin('subject as sub','sub.id','stm.subject_id')
                ->selectRaw('stm.id as pk,sm.id as student_id,sm.name,sub.subject_name,sub.id as subject_id,stm.term,stm.mark')
                ->where('stm.id',$id)
                ->first();
                // dd($students_marks);
        return view('marks/create',compact('students','subjects','students_marks'));  
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

         $updateData['student_id'] = $request->student;

        foreach ($request->addMoreInputFields as $key => $value) {
        	 $updateData['subject_id'] = $value['subject'];
             $updateData['term'] = $value['term'];
             $updateData['mark'] = $value['mark'];

             $if_exists = StudentMark::where('student_id',$request->student)
           				->where('subject_id',$value['subject'])
           				->count();
           	if($if_exists >0){
           		StudentMark::where('id',$id)->update($updateData);
           		 // StudentMark::whereId($id)->update($updateData);
           	}else{
           		StudentMark::create($updateData);
           	}
        }
        Student::whereId($id)->update($updateData);
        return back()->with('success', 'completed', 'Student has been updated');
        // return redirect('/students')->with('completed', 'Student has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
         return back()->with('success', 'completed', 'Student has been deleted');
    }
}
