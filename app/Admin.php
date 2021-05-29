<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{

    protected $table = "admin";
    protected $primaryKey = "admin_id";
    protected $fillable = "['admin_id','admin_username','admin_password','admin_name','admin_sdt']";

    public $timestamps = false;
}
