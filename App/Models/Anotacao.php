<?php


namespace App\Models;
 
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Anotacao extends Model
{ 
    protected $table = 'anotacoes';
    protected $fillable = [
         'idUsuario',
         'titulo',
         'conteudo', 
         'created_at',
         'updated_at', 
    ]; 
    /* public function usuario(): HasMany
    {
        return $this->hasOne(Comentario::class, 'idAnotacoes');
    } */

    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class, 'idAnotacoes');
    }
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class, 'idAnotacoes');
    }
}