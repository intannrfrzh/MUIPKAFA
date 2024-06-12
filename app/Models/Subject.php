<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    // Specify the connection to use
    protected $connection = 'muip_kafa';

    // Specify the table if it differs from the default 'subjects'
    protected $table = 'subject';

    // Specify the primary key if it differs from the default 'id'
    protected $primaryKey = 'S_Subject_ID';

    // Specify any fields that can be mass assigned
    protected $fillable = [
        'S_Subject_ID',
        'T_Teacher_ID',
        'S_Subject_name',
    ];

    /**
     * Define the relationship with the StudentResult model.
     */
    public function results()
    {
        return $this->hasMany(StudentResult::class, 'S_Subject_ID', 'S_Subject_ID');
    }
}
