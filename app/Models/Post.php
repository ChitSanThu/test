<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function owner()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function scopeCreatedBy($query)
    {
        $query->where('created_by',auth()->user()->id);
    }
    public function getTimeDiffAttribute()
    {
        return \Carbon\Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
    }
}
