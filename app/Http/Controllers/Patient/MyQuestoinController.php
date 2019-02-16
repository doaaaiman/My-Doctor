<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Specialty;
use App\Answer;
use App\Question;
use App\User;
use App\Doctor;
use App\Http\Requests\QuestionRequest;

class MyQuestoinController extends BaseController
{
    public function index(Request $request)
    {     
        $q=$request['q'];
        
        $specialties = Specialty::all();
        $answers = Answer::all();
     
        $questions = Question::where('users_id',\Auth::user()->id);
        
        if($q)
            $questions->whereRaw('body',"%$q%");
    
         $questions = $questions->paginate(4)
                 ->appends(['q'=>$q]);
         
        return view('patient.question.index')
        ->with('title','List Questions')
        ->with('questions',$questions)
        ->with('specialties',$specialties)
        ->with('answers',$answers);
    }
    
    public function create()
    {
         $specialties = Specialty::all();
        return view('patient.question.create')
                ->with('title','Create New Question')
                ->with('specialties',$specialties);
    }

   
   public function store(QuestionRequest $request)
    {
      $user = \Auth::user();
      $request['users_id'] = $user->id;
        Question::create($request->all());
       //dd($q);
        \Session::flash('msg','s:Question Created Successfully');
        return redirect('/patient/question/create');
    }

    
    public function show($id)
    {
        //
    }
    
    /************* Answers***************/
    public function answers($id)
    {
         $question = Question::find($id);
         $answers=Answer::all();
          $doctors=User::all();
          
     return view('patient.question.allAnswers')
           ->with('title','All Answers')
            ->with('question',$question)
             ->with('answers',$answers)
              ->with('doctors',$doctors);
    }
    
        
//     public function delete($id)
//    {
//         $answer= Answer::find($id);
//         $answer->delete();
//
//        \Session::flash('msg','s:Answer Deleted Successfully');
//        return redirect('/admin/question');
//    }
    
//    public function addAnswer($id)
//    {
//         $question = Question::find($id);
//     return view('admin.question.createAnswer')
//           ->with('title','Create New answer')
//            ->with('question',$question);
//    }
//    
//public function postAddAnswer(Request $request,$id)
//    {
//     $request->validate([
//             'body'=>'required|max:250'
//        ]);
//     $user = \Auth::user();
//        
//        $request['users_id'] = $user->id;
//        $request['questions_id'] = $id;
//       $d= Answer::create($request->all());
//        //dd($d);
//        \Session::flash('msg','s:Answer Created Successfully');
//        return redirect('/admin/question');
//    }
    
    /*
     public function edit($id)
    {
        $question = Question::find($id);
       if(!$question){
            \Session::flash('msg','e:Invalid Question ID');
            return redirect('/admin/question');
        }
        $specialties = Specialty::all();
        return view('question.edit')
                ->with('title','Question Edit')
                ->with('question',$question)
                 ->with('specialties',$specialties);
    }

    
    public function update(QuestionRequest $request, $id)
    {
        //dd($request);
       $question = Question::find($id);
        $question->update($request->all());
        \Session::flash('msg','s:Question Updated Successfully');
        return redirect('/admin/question');
    }
*/
    
    public function destroy($id)
    {
        $question = Question::find($id);
        $question->delete();
        \Session::flash('msg','s:Question Deleted Successfully');
        return redirect('/admin/question');
    }

}
