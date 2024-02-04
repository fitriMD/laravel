<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Employee extends Model
{
    use HasFactory;
    protected $table = "employees";
    public $timestamps = false;
    protected $primaryKey = 'ID';

    protected $fillable = [
        'ID',
        'FIRSTNAME',
        'LASTNAME',
        'GENDER',
        'ADDRESS',
        'DOB',
        'STATUS',
        'DEPT_ID',
    ];

    public function department(){
        return $this->belongsTo(Department::class);
    }
}
