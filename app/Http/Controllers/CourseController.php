<?php

namespace App\Http\Controllers;

use App\Course;
use App\Repository\CourseRepoInterface;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $course;

    public function __construct(CourseRepoInterface $course)
    {
        $this->course = $course;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            // $data = User::whereHas('roles', function ($q) {
            //     $q->where('name', 'instructor');
            // })->get();

            $data = $this->course->all();
            $role = auth()->user()->hasRole('super-admin');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) use ($role) {

                    $btn = $role ?  '<a href="course/' . $row->id . '/edit" data-id="' . $row->id . '"  class="edit-course edit btn btn-info btn-sm">Edit</a>
                         <a href="javascript:void(0)" data-id="' . $row->id . '" class="delete-course edit btn btn-danger btn-sm">Delete</a>' : '';

                    return $btn;
                })
                ->make(true);
        }
        return view('course.browse');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course.add-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // $role = Role::whereName('instructor')->first();

        $course = $this->course->create($request->all());
        // $course->assignRole($role);

        if ($course)
            return redirect()->route('course.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('course.add-edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $res = $this->course->update($request->all(), $course->id);
        if ($res)
            return redirect()->route('course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $delete = $this->course->delete($course->id);
        if ($delete) {
            return redirect()->back();
        }
    }
}
