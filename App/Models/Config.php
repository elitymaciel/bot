<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Config extends Model
{
    protected $table = 'configuracoes';
    public $timestamps = false;
    protected $fillable = [
        'config',
        'valor'	
    ];
}
