<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Department extends Model
{
    use HasFactory;
    protected $table = "departments";
    public $timestamps = false;
    protected $primaryKey = 'ID';

    protected $fillable = [
        'ID',
        'NAME',
    ];

    public function employee(){
        return $this->hasMany(Employee::class);
    }
}
