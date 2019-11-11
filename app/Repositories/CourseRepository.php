<?php

namespace App\Repositories;

use App\Course;
use App\Institution;
use App\Student;
use Illuminate\Database\Eloquent\Collection;

class CourseRepository
{
    public static function all(): Collection
    {
        return Course::all();
    }

    public static function allActive(): Collection
    {
        return Course::where('status', 1)->get();
    }

    public static function get(Int $id): Course
    {
        return Course::find($id);
    }

    public static function create(String $name, Int $institution_id, Int $duration_week, Bool $status): Course
    {
        return Course::create([
            'name' => $name,
            'institution_id' => $institution_id,
            'status' => $status,
            'duration_week' => $duration_week
        ]);
    }

    public static function update(String $name, Int $institution_id, Int $duration_week, Bool $status, Int $id): Course
    {
        Course::where('id', $id)->update([
            'name' => $name,
            'institution_id' => $institution_id,
            'status' => $status,
            'duration_week' => $duration_week
        ]);
        return Course::find($id);
    }

    public static function destroy(Int $id): Bool
    {
        return Course::destroy($id);
    }

    public static function byInstitutionId(Int $institution_id): Collection
    {
        return Course::where('institution_id', $institution_id)->where('status', 1)->get();
    }

    public static function hasCourse(Int $id): Bool
    {
        return Student::where('course_id', $id)->count() > 0;
    }

}
