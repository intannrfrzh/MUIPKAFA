<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class StudentRegistration extends Authenticatable
{
    use HasFactory;

    // Specify the connection to use
    protected $connection = 'muip_kafa';

    // Specify the table
    protected $table = 'student_registration';

    // Specify the primary key
    protected $primaryKey = 'User_ID';

    // Specify any fields that can be mass assigned
    protected $fillable = [
        'User_ID',
        'K_Admin_ID',
        'S_Subject_ID',
        'I_Parent_ID',
        'SR_Student_Name',
        'Sr_Student_IC',
        'SR_Student_gender',
        'Sr_Student_phone_no'
    ];

    
    public function hasRole($role)
    {
        return $this->role === $role;
    }

    // Define the relationship with the student result
    public function results()
    {
        return $this->hasMany(StudentResult::class, 'SR_Student_ID', 'User_ID');
    }
}
