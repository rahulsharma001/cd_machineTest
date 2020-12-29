<?php

namespace App\Repository\Eloquent;

use App\Course;
use App\Repository\CourseRepoInterface;

class CourseRepo implements CourseRepoInterface
{

    // Get all instances of model
    public function all()
    {
        return Course::all();
    }

    // create a new record in the database
    public function create(array $data)
    {
        $request = request();

        /* image upload */
        $image = $request->file('photo');
        $coursePicName = time() . "-photo." . $image->getClientOriginalExtension();

        $upload_path = 'storage/course_images/';
        $courseImageUrl = $coursePicName;
        $uploadSuccess = $image->move($upload_path, $coursePicName);

        return Course::create([
            'name' => $data['name'],
            'photo' => $courseImageUrl,
            'level' => $data['level'],
            'description' => $data['description'],
        ]);
    }

    // update record in the database
    public function update(array $data, $id)
    {

        $request = request();

        /* image upload */
        $image = $request->file('photo');
        $coursePicName = time() . "-photo." . $image->getClientOriginalExtension();

        $upload_path = 'storage/course_images/';
        $courseImageUrl = $upload_path . $coursePicName;
        $uploadSuccess = $image->move($upload_path, $coursePicName);

        $record = Course::find($id);

        return $record->update([
            'name' => $data['name'],
            'photo' => $courseImageUrl,
            'level' => $data['level'],
            'description' => $data['description'],
        ]);
    }

    // soft deletes the record
    public function delete($id)
    {
        return Course::destroy($id);
    }

    // show the record with the given id
    public function show($id)
    {
        return Course::findOrFail($id);
    }

    // Eager load database relationships
    public function with($relations)
    {
        return Course::with($relations)->get();
    }
}
