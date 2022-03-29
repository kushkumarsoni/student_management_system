<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    use HasFactory;

    protected $table = "students";
    protected $fillable = ['sname','fname','email','address','dob','phone','gender','image','branch_id','course_id','class'];

    public function branch() {
        return $this->belongsTo(Branch::class);
    }

    public function course() {
        return $this->belongsTo(Course::class);
    }

    public static function getStudent() {
    
        $student =DB::table('students as s')
                ->join('branchs as b', 's.branch_id', '=', 'b.id')
                ->join('courses as c', 's.course_id', '=', 'c.id')
                ->select(
            's.id',
            's.sname',
            's.fname',
            's.email',
            's.dob',
            'c.name',
            'b.name',
            's.address',
            's.class',
            's.phone',
            's.gender'
        )
                ->get()->toArray();
        return $student;
    }
}
