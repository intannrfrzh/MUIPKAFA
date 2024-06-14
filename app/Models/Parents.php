<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    protected $table = 'parent';  // Specify table name if it doesn't follow the plural convention

    protected $primaryKey = 'I_Parent_ID';  // Set the primary key

    // Disable timestamps
    public $timestamps = false;

    protected $fillable = [
        'I_Parent_ID',
        'I_Parent_Name',
        'I_Parent_IC',
        'I_Parent_Email',
        'I_Parent_Phone',
    ];
}
