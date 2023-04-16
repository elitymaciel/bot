<?php


namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{ 
    protected $table = 'atendimentos';
    protected $fillable = [
        'session',
        'cliente',
        'atendente'		
    ];
}