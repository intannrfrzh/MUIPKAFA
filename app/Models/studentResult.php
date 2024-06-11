<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentResult extends Model
{
    use HasFactory;

    public $timestamps = false;

    // Specify the connection to use
    protected $connection = 'muip_kafa';

    // Specify the table if it differs from the default 'student_results'
    protected $table = 'student_result';

    // Specify the primary key if it differs from the default 'id'
    protected $primaryKey = 'id';

    // Specify any fields that can be mass assigned
    protected $fillable = [
        'SR_Student_ID',
        'T_Teacher_ID',
        'S_Subject_ID',
        'R_Result_grade',
        'R_Result_Verfication'
    ];

    /**
     * Define the relationship with the StudentRegistration model.
     */
    public function student()
    {
        return $this->belongsTo(StudentRegistration::class, 'SR_Student_ID', 'User_ID');
    }
    
    /**
     * Define the relationship with the Subject model.
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'S_Subject_ID', 'S_Subject_ID');
    }
}

