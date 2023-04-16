<?php


namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{ 
    protected $table = 'chat';
    protected $fillable = [
        'session',
        'from_number',
        'to_number',
        'content',
        'type',
        'file_name',
        'urlcode'	
    ];
}