<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $fillable = [
        'name',
		'last_name',
        'email',
        'password',
    ];

	protected $appends = ['full_name'];

    protected $hidden = [
        'password',
    ];

	 //Accesor
	 public function getFullNameAttribute($value)
	 {
		return "{$this->name} {$this->last_name}";
	 }

	//  mutator
	 public function setPasswordAttribute($value)
	 {
		$this->attributes['password'] = bcrypt($value);
	 }

	 protected $casts = [
		 'created_at' => 'datetime:y-m-d',
		 'updated_at' => 'datetime:y-m-d',
	 ];
    // protected $casts = [
    //     'email_verified_at' => 'bolean',
    // ];
}
