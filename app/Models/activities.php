<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activities extends Model
{
    use HasFactory;

    protected $primaryKey = 'A_Activity_ID';

    protected $fillable = [
        'K_Admin_ID',
        'J_Admin_ID',
        'T_Teacher_ID',
        'A_Activity_name',
        'A_Activity_details',
        'A_Activity_date',
        'A_Activity_time'
    ];

    public $timestamps = false; // Assuming your table does not have created_at and updated_at columns
}
