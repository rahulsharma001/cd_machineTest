<?php

namespace App\Repository\Eloquent;

use App\Repository\InstructorRepoInterface;
use App\User;
use Illuminate\Support\Facades\Hash;

class InstructorRepo implements InstructorRepoInterface
{

    // Get all instances of model
    public function all()
    {
        return User::whereHas('roles', function ($q) {
            $q->where('name', 'instructor');
        })->get();
    }

    // create a new record in the database
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    // update record in the database
    public function update(array $data, $id)
    {

        $record = User::find($id);

        return $record->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    // soft deletes the record
    public function delete($id)
    {
        return User::destroy($id);
    }

    // show the record with the given id
    public function show($id)
    {
        return User::findOrFail($id);
    }

    // Eager load database relationships
    public function with($relations)
    {
        return User::with($relations)->get();
    }
}
