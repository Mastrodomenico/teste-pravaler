<?php

namespace App\Repositories;

use App\Student;
use Illuminate\Database\Eloquent\Collection;

class StudentRepository
{
    public static function all(): Collection
    {
        return Student::all();
    }

    public static function get(Int $id): Student
    {
        return Student::find($id);
    }

    public static function create(String $name, String $cpf, String $date_birth, String $email, String $phone, String $street, String $number, String $district, String $city, String $uf, Bool $status, Int $course_id): Student
    {
        return Student::create([
            'name' => $name,
            'cpf' => $cpf,
            'date_birth' => $date_birth,
            'email' => $email,
            'phone' => $phone,
            'street' => $street,
            'number' => $number,
            'district' => $district,
            'city' => $city,
            'uf' => $uf,
            'status' => $status,
            'course_id' => $course_id
        ]);
    }

    public static function update(String $name, String $cpf, String $date_birth, String $email, String $phone, String $street, String $number, String $district, String $city, String $uf, Bool $status, Int $course_id, Int $id): Student
    {
        Student::find($id)->update([
            'name' => $name,
            'cpf' => $cpf,
            'date_birth' => $date_birth,
            'email' => $email,
            'phone' => $phone,
            'street' => $street,
            'number' => $number,
            'district' => $district,
            'city' => $city,
            'uf' => $uf,
            'status' => $status,
            'course_id' => $course_id
        ]);
        return Student::find($id);
    }

    public static function destroy(Int $id): Bool
    {
        return Student::destroy($id);
    }

}
