@extends('layouts.main')

@section('container')
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="col-span-2 md:col-span-1">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-bold">Recent Questions</h2>
                    <a href="{{ route('questions.create')}}" class="btn btn-secondary">Ask Question</a>
                </div>

                @include ('layouts._messages')

                @if ($questions->count() > 0)
                    @foreach ($questions->reverse() as $question)
                        <!-- Question Section -->
                        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                            <div class="flex items-center mb-2">
                                <p class="font-bold text-blue-600">{{ $question->user->name }}</p>
                                <p class="text-sm text-gray-500 ml-auto">{{ $question->created_date }}</p>
                            </div>
                            <h3 class="text-xl font-semibold text-blue-600 mb-2">{{ $question->title }}</h3>
                            <p class="text-gray-800">{{ Str::limit($question->body, 250) }}</p>
                        </div>
                        
                        <!-- Answer Form -->
                        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                            <form action="{{ route('answers.store') }}" method="post" class="mt-4">
                                @csrf
                                <div class="form-group">
                                    <label for="answer" class="block">Your Answer</label>
                                    <textarea class="form-control mt-2 w-full" id="answer" name="answer" rows="3"></textarea>
                                </div>
                                <input type="hidden" name="question_id" value="{{ $question->id }}">
                                <button type="submit" class="btn btn-primary mt-2">Submit Answer</button>
                            </form>
                        </div>

                        <!-- Display Answers -->
                        @if ($question->answers()->count() > 0)
                            @foreach($question->answers as $answer)
                                <!-- Answer Section -->
                                <div class="bg-gray-100 p-4 rounded-lg mb-2">
                                    <div class="flex items-center mb-2">
                                        <p class="font-bold text-blue-600">{{ $answer->user->name }}</p>
                                    </div>
                                    <p class="text-gray-800">{{ $answer->content }}</p>
                                </div>
                                @if (!$loop->last)
                                    <hr class="my-2">
                                @endif
                            @endforeach
                        @else
                            <div class="bg-gray-100 p-4 rounded-lg mb-2">
                                <p class="text-gray-800">No answers yet.</p>
                            </div>
                        @endif

                        <hr class="my-6">
                    @endforeach
                @else
                    <p class="text-gray-600">No questions found.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
