<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class KafaAdmin extends Authenticatable
{
    use HasFactory;

    // Specify the connection to use
    protected $connection = 'muip_kafa';

    // Specify the table
    protected $table = 'kafa_admin';

    // Specify the primary key
    protected $primaryKey = 'K_Admin_ID';

    protected $fillable = [
        'K_Admin_ID', 
        'K_Admin_Name',
        'K_Admin_IC',
        'K_Admin_email',
        'K_Admin_phone_no'
    ];

    protected $hidden = [
        'K_Admin_IC',
    ];

    public function getAuthPassword()
    {
        return $this->K_Admin_IC;
    }
    public function hasRole($role)
    {
        return $this->role === $role;
    }
}
