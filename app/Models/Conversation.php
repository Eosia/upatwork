<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    Message, Job
};

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = ['from', 'to', 'job_id'];

    public function messages()
    {
        return $this->hasMany('Message');
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }


}