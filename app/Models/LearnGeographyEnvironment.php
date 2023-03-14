<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearnGeographyEnvironment extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_name',
        'topic_name',
        'title',
        'pdf_file_path',
    ];

    public function geoenv()
    {
        return $this->belongsTo(CategoryGeographyEnvironment::class,'topic_name');
    }
}
