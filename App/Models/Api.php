<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne; 

class Api extends Model
{
    /* asdf */
    public $timestamps = false;
    protected $table = 'api';
    protected $fillable = ['user_id', 'session', 'token'];
    protected $hidden = ['created_at', 'updated_at',]; 
    
   public function user(): HasOne
    {
         return $this->hasOne(User::class, 'user_id');
    } 
}