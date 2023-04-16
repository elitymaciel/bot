<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Drawflow extends Model
{
    protected $table = 'drawflow';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'data',
        'class',
        'html',
        'typenode',
        'inputs',
        'outputs',
        'pos_x',
        'pos_y', 
    ];
}
