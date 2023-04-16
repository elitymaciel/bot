<?php 

namespace App\Models; 
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model {

    protected $table = 'users';
    protected $fillable = [
         'username',
         'last_name',
         'email',
         'id_session',
         'password',
         'token',
         'avatar',
         'created_at',
         'updated_at',
         'permissao',
         'reset_password',
         'is_deleted'
    ];

    /* public function Anotacaoes(): HasMany
    {
        return $this->hasMany(Anotacao::class, 'idUsuario');
    }  */

    public function Api(): HasMany
    {
        return $this->hasMany(Api::class);
    }
    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    /* protected $hidden = [
        'password', 'remember_token',
    ]; */
    /*
    * Get Todo of User
    *
    */
   /*  public function todo()
    {
        return $this->hasMany('Todo');
    } */
}