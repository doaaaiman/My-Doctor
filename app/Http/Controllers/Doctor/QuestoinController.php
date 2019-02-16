<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use App\Answer;
use App\Doctor;
use App\User;
use App\Specialty;

class QuestoinController extends BaseController
{
   
    public function index(Request $request)
    {
        $user = \Auth::user();
       $type_id=\Auth::user()->type_id;
    
           $doctor = Doctor::find($type_id);
           //dd($doctor);
           $specialty= $doctor->specialties_id;
           
        $q=$request['q'];
        
        $specialties_id=$request['specialties_id'];
        $specialties = Specialty::all();
        $answers = Answer::all();
        $questions = Question::whereRaw('true');
        
       
        $questions=$questions
                ->where('specialties_id',$specialty); 
      
        if($q)
            $questions->whereRaw('(body like ? or specialties_id in (select id from specialties where name like ?))',["%$q%","%$q%"]);
        if($specialties_id)
            $questions->where('specialties_id',$specialties_id);
        
         $questions = $questions->paginate(4)
                 ->appends(['q'=>$q,'$specialties_id'=>$specialties_id]);
         
        return view('doctor.question.index')
        ->with('title','List Questions')
        ->with('questions',$questions)
        ->with('specialties',$specialties)
        ->with('answers',$answers);
    }

    /************* Answers***************/
    public function answers($id)
    {
        $doctors=User::all();
         $question = Question::find($id);
         $answers=Answer::all();
         
     return view('doctor.question.allAnswers')
           ->with('title','All Answers')
            ->with('question',$question)
             ->with('answers',$answers)
             ->with('doctors',$doctors);
    }
    
    public function addAnswer($id)
    {
         $question = Question::find($id);
     return view('doctor.question.createAnswer')
           ->with('title','Create New answer')
            ->with('question',$question);
    }
    
public function postAddAnswer(Request $request,$id)
    {
     $request->validate([
             'body'=>'required|max:250'
        ]);
     $user = \Auth::user();
        
        $request['users_id'] = $user->id;
        $request['questions_id'] = $id;
       $d= Answer::create($request->all());
        //dd($d);
        \Session::flash('msg','s:Answer Created Successfully');
        return redirect('/doctor/question');
    }
    
}
