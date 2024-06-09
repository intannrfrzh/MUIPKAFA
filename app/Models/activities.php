<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class activities extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'A_Activity_name',
        'A_Activity_details',
        'A_Activity_datestart',
        'A_Activity_timestart',
        'A_Activity_status',
        'A_Activity_dateend',
        'A_Activity_timeend',
        'A_Activity_status',
        'K_Admin_ID',
    ];

    public $timestamps = false; // Assuming your table does not have created_at and updated_at columns
}
