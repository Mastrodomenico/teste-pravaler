<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Repositories\InstitutionRepository;
use App\Repositories\StudentRepository;
use App\Repositories\CourseRepository;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inner.student.list', ['students' => StudentRepository::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inner.student.new', [
            'institutions' => InstitutionRepository::coursesGrouped()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        StudentRepository::create(...array_values($request->only('name', 'cpf', 'date_birth', 'email', 'phone', 'street', 'number', 'district', 'city', 'uf', 'status', 'course_id')));
        return redirect()->route('students.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('inner.student.edit', [
            'student' => $student,
            'institutions' => InstitutionRepository::coursesGrouped()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, $id)
    {
        StudentRepository::update(
            $request->get('name'),
            $request->get('cpf'),
            $request->get('date_birth'),
            $request->get('email'),
            $request->get('phone'),
            $request->get('street'),
            $request->get('number'),
            $request->get('district'),
            $request->get('city'),
            $request->get('uf'),
            $request->get('status'),
            $request->get('course_id'),
            $id);
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StudentRepository::destroy($id);
        return redirect()->route('students.index');
    }
}
