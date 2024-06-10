<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class JaipAdmin extends Authenticatable
{
    use HasFactory;

    // Specify the connection to use
    protected $connection = 'muip_kafa';

    // Specify the table
    protected $table = 'jaip_admin';

    // Specify the primary key
    protected $primaryKey = 'J_Admin_ID';

    protected $fillable = [
        'J_Admin_ID', 
        'J_Admin_name',
        'J_Admin_IC',
        'J_Admin_email',
        'J_Admin_phone_no'
    ];

    protected $hidden = [
        'J_Admin_IC',
    ];

    public function getAuthPassword()
    {
        return $this->J_Admin_IC;
    }
    public function hasRole($role)
    {
        return $this->role === $role;
    }
}
