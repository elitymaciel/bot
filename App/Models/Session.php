<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Session extends Model
{
    protected $table = 'sessions';
    protected $fillable = [
        'id_session',
        'type',
        'urlcode',
        'created_at',
        'updated_at',
    ];
}
