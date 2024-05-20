<?php

namespace App\Http\Controllers;

use App\Models\Question; // Mengimpor model Question
use Illuminate\Http\Request;
use App\Http\Requests\AskQuestionRequest;

class QuestionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index(Request $request)
{
    // Mengambil daftar pertanyaan dari database
    $questions = Question::paginate(10);// Misalnya, ambil semua pertanyaan dari database
    
    // Mengirimkan data ke view bersama dengan variabel $title
    return view('questions.index', [
        'questions' => $questions,
        'title' => 'Q&A' // Judul halaman
    ]);
}

    /**
     * Display a listing of the resource.ac
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    $buttonText = "Ask Question"; // Definisikan nilai untuk variabel $buttonText
    $question = new Question();
    
    return view('questions.create', compact('buttonText', 'question')); // Sertakan variabel $buttonText dalam data yang dilewatkan ke tampilan
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);
    
        $question = new Question();
        $question->title = $request->title;
        $question->body = $request->body;
        $question->user_id = auth()->id(); // Mengambil ID pengguna yang sedang terautentikasi
    
        $question->save();
    
        return redirect()->route('questions.index')->with('success', "Your question has been submitted");
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question) // Menggunakan parameter $question
    {
        $question->increment('views');
        return view('questions.show', compact('question')); // Menggunakan 'questions.show' bukan 'question.show'
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question) // Menggunakan parameter $question
    {
        return view("questions.edit", compact('question')); // Menggunakan 'questions.edit' bukan 'question.edit'
    }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Question  $question
         * @return \Illuminate\Http\Response
         */
        public function update(AskQuestionRequest $request, Question $question) // Menggunakan parameter $question
        {
            $this->authorize("update", $question);
            $question->update($request->only('titleQuestion', 'body'));
            return redirect('/questions')->with('success', "Your question has been updated.");
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question) // Menggunakan parameter $question
    {
        $this->authorize("delete", $question);
        $question->delete();
        return redirect('/questions')->with('success', "Your question has been deleted.");
    }
}
