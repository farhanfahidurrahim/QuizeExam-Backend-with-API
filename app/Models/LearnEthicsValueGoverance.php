<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearnEthicsValueGoverance extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_name',
        'topic_name',
        'title',
        'pdf_file_path',
    ];

    public function evg()
    {
        return $this->belongsTo(CategoryEthicsValueGoverance::class,'topic_name');
    }
}
