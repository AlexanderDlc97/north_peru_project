<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'lastname_apellidos',
        'imagen',
        'nro_contacto',
        'tipo_documento',
        'nro_documento',
        'direccion',
        'email',
        'password',
        'confirmpassword',
        'estado',
        'role_id',
        'sectore_id',
        'ubigeo_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function sectore()
    {
        return $this->belongsTo(Sector::class);
    }
    public function documento()
    {
        return $this->hasOne(Documento::class);
    }

    public function ubigeo()
    {
        return $this->belongsTo(Ubigeo::class);
    }

    public function cargos()
    {
        return $this->belongsToMany(Cargo::class);
    }

    public function hasAnyCargo($cargos){
        if(is_array($cargos)){
            foreach($cargos as $cargo){
                if($this->hasCargo($cargo)){
                    return true;
                }
            }
        }else{
            if($this->hasCargo($cargos)){
                return true;
            }
        }

        return false;
    }

    public function hasCargo($cargo){
        if($this->cargos()->where('name',$cargo)->first()){
            return true;
        }
        return false;
    }
}
