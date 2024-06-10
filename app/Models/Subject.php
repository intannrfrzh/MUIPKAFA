<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    // Specify the connection to use
    protected $connection = 'muip_kafa';

    // Specify the table
    protected $table = 'subject';

    // Specify the primary key
    protected $primaryKey = 'S_Subject_ID';

    // Specify any fields that can be mass assigned
    protected $fillable = [
        'T_Teacher_ID',
        'S_Subject_name'
    ];

    public function hasRole($role)
    {
        return $this->role === $role;
    }
    
}

