<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{

    protected $fillable = [
        'test_id',
        'question_id',
        'answer_id',
    ];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }

}
