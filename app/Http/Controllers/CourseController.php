<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Repositories\CourseRepository;
use App\Repositories\InstitutionRepository;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inner.course.list', ['courses' => CourseRepository::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inner.course.new', [
            'institutions' => InstitutionRepository::allActive()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        CourseRepository::create(...array_values($request->only('name', 'institution_id', 'duration_week', 'status')));
        return redirect()->route('courses.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('inner.course.edit', [
            'course' => $course,
            'institutions' => InstitutionRepository::allActive()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, $id)
    {
        CourseRepository::update(
            $request->get('name'),
            $request->get('institution_id'),
            $request->get('duration_week'),
            $request->get('status'),
            $id);
        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!CourseRepository::hasCourse($id)){
            CourseRepository::destroy($id);
            return redirect()->route('courses.index');
        }
        $errors = new \Illuminate\Support\MessageBag();

        $errors->add('integrity', 'Esse curso contem alunos cadastrados');
        return redirect()->route('courses.edit', $id)->withErrors($errors);

    }
}
