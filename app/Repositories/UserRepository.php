<?php

namespace App\Repositories;

use App\Course;
use App\Institution;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public static function all(): Collection
    {
        return User::all();
    }

    public static function get(Int $id): User
    {
        return User::find($id);
    }

    public static function create(String $name, String $email, String $password): User
    {
        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
    }

    public static function update(String $name, String $email, Int $id, String $password = null): User
    {
        if($password == null){
            User::where('id',$id)->update([
                'name' => $name,
                'email' => $email
            ]);
        }else{
            User::where('id',$id)->update([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
            ]);
        }

        return User::find($id);
    }

    public static function destroy(Int $id): Bool
    {
        return Course::destroy($id);
    }

    public static function byInstitutionId(Int $institution_id): Collection
    {
        return Course::where('institution_id', $institution_id)->where('status', 1)->get();
    }

}
