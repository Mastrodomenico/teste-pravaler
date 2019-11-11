<?php

namespace App\Repositories;

use App\Course;
use App\Institution;
use Illuminate\Database\Eloquent\Collection;

class InstitutionRepository
{
    public static function all(): Collection
    {
        return Institution::all();
    }

    public static function allActive(): Collection
    {
        return Institution::where('status', 1)->get();
    }

    public static function get(Int $id): Institution
    {
        return Institution::find($id);
    }

    public static function create(String $name, String $cpnj, Bool $status): Institution
    {
        return Institution::create(['name' => $name, 'cnpj' => $cpnj, 'status' => $status]);
    }

    public static function update(String $name, String $cpnj, Bool $status, Int $id): Institution
    {
        Institution::where('id', $id)->update(['name' => $name, 'cnpj' => $cpnj, 'status' => $status]);
        return Institution::find($id);
    }

    public static function destroy(Int $id): Bool
    {
        return Institution::destroy($id);
    }

    public static function coursesGrouped(): Collection
    {
        $Institution = Institution::where('status', 1)->get();
        $Institution->map(function($item, $key) {
            return $item->courses = CourseRepository::byInstitutionId($item->id);
        });
        return $Institution;
    }

    public static function hasCourse(Int $id): Bool
    {
        return Course::where('institution_id', $id)->count() > 0;
    }

}
