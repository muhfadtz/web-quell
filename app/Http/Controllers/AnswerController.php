<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;

class AnswerController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'answer' => 'required',
            'question_id' => 'required|exists:questions,id',
        ]);

        // Simpan jawaban ke dalam database
        $answer = new Answer();
        $answer->content = $request->answer;
        $answer->user_id = auth()->user()->id; // Anda mungkin perlu menyesuaikan ini dengan cara Anda mengelola autentikasi pengguna
        $answer->question_id = $request->question_id;
        $answer->save();

        // Redirect atau melakukan sesuatu setelah jawaban disimpan
    }

    // Metode lainnya seperti update, delete, dll.
}
