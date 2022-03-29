<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'id',
            'sname',
            'fname',
            'email',
            'dob',
            'course',
            'branch',
            'address',
            'class',
            'phone',
            'gender',
        ];
    }
    public function collection()
    {
        //return Student::all();
        return collect(Student::getStudent());
    }
}
