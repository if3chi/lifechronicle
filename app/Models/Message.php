<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'phone',
        'filename',
        'message',
        'published',
    ];

    public function getTimeAttribute()
    {
        return Carbon::parse($this->created_at)->format('F Y');
    }

    public function getMsgAttribute()
    {
        return strtr(
            substr($this->message, 0, 256),
            ["<br />" => ' ']
        );
    }

    public function getUrlAttribute()
    {
        return url($this->filename);
    }
}
