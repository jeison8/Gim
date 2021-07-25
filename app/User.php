<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email','document','phone','address','password','start_date','finish_date','price','img','is_admin','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //scope
    public function scopeName($query,$name)
    {
        if ($name) {
             	return $query->where('name', 'like', '%'.$name.'%'); 
            }
    }

    public function scopeCc($query,$cc)
    {
        if ($cc) {
             	return $query->where('document', 'like', '%'.$cc.'%'); 
            }
    }
      
    public function scopeMonth($query,$month)
    {
        if ($month) {
             	return $query->whereMonth('start_date', '=', $month)->orWhereMonth('finish_date', '=', $month); 
            }
    }

    public function scopeStatus($query,$status)
    {
        if ($status) {
             	return $query->where('status',$status); 
            }
    }



		// if ($request->findMonth != null) {
		// 	$users = User::whereMonth('start_date', '=', $request->findMonth)
		// 	->orWhereMonth('finish_date', '=', $request->findMonth)->paginate(20); 
		// }


}
