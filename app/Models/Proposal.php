<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
  User, Job, CoverLetter
};

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = ['job_id', 'user_id', 'validated', 'coverLetter_id', 'content'];


    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->user_id = auth()->user()->id;
        });
    }

    public function user()
    {
        return $this->belongTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function coverLetter()
    {
        return $this->hasOne(CoverLetter::class);
    }



}
