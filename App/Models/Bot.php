<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bot extends Model
{
    //protected $timestamps = false;
    public $timestamps = false; // defina como protegida
    protected $table = 'bots';
    protected $fillable = [
        'id_mensage',
        'id_users',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ]; 
    
    public function menssage(): HasMany
    {
        return $this->hasMany(Mensagem::class, 'bot_id');
    } 
}
