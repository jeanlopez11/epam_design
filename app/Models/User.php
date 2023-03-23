<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Notifications\CustomResetPassword;
use App\Notifications\CustomVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable implements MustVerifyEmail
{
  use HasApiTokens, HasFactory, Notifiable;

  static $rules = [
    'cedula' => 'required',
    'name' => 'required',
    'last_name' => 'required',
    'phone_number' => 'required',
    'email' => 'required',
    'estado' => 'required',
    'password' => 'password',

  ];

  protected $perPage = 20;
  protected $fillable = ['cedula', 'name', 'last_name', 'phone_number', 'email', 'estado', 'password'];
  protected $hidden = [
    'password',
    'remember_token',
  ];
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];
  public function detalleUsersContratos()
  {
    return $this->hasMany('App\Models\DetalleUsersContrato', 'user_id', 'id');
  }
  public function sendPasswordResetNotification($token)
  {
    $this->notify(new CustomResetPassword($token));
  }
  public function sendEmailVerificationNotification()
  {
    $this->notify(new CustomVerifyEmail());

    //  $this->notify(new Notifications\CustomVerifyEmail($this->id, $this->Hash));
  }
}
