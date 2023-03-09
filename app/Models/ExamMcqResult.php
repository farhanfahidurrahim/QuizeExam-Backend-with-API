<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamMcqResult extends Model
{
    use HasFactory;

    protected $table="exam_mcq_results";
    protected $casts = [
        'exam_info' => 'array'
    ];
}
