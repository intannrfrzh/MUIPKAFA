<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasFactory;

    // Specify the connection to use
    protected $connection = 'muip_kafa';

    // Specify the table
    protected $table = 'teacher';

    // Specify the primary key
    protected $primaryKey = 'T_Teacher_ID';

    protected $fillable = [
        'T_Teacher_ID',
        'T_Teacher_name',
        'T_Teacher_IC',
        'T_Teacher_email',
        'T_Teacher_phone_no'
    ];

    protected $hidden = [
        'T_Teacher_ID',
    ];

    public function getAuthPassword()
    {
        return $this->T_Teacher_ID;
    }

    public function hasRole($role)
    {
        return $this->role === $role;
    }
}

