<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;
class User extends Authenticatable
{
    use Notifiable,HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'roll','password','name', 'email','manager','superuser','supervisor','planthead','vpo','vpca','director'
    ];

    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

   public function approvals()
   {
    return $this->hasMany(SendApproval::class);
   }
   public function creditapprovals()
   {
    return $this->hasMany(Credit::class);
   }
   public function capexapprovals()
   {
    return $this->hasMany(Capex::class);
   }
   public function dealerapprovals()
   {
    return $this->hasMany(Dealer::class);
   }
   public function vendorapprovals()
   {
    return $this->hasMany(Vendor::class);
   }

    public function setPasswordAttribute($value)
    {
      if($value)
      {
        $this->attributes['password']=app('hash')->needsRehash($value)?Hash::make($value):$value;
      }  
    }
   
}
