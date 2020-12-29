<?php

namespace App\Http\Controllers;

use App\Instructor;
use App\Repository\InstructorRepoInterface;
use App\User;
use Illuminate\Http\Request;
use DataTables;
use Spatie\Permission\Models\Role;

class InstructorController extends Controller
{
    protected $instructor;

    public function __construct(InstructorRepoInterface $instructor)
    {
        $this->instructor = $instructor;
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

            $data = $this->instructor->all();
            $role = auth()->user()->hasRole('super-admin');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) use ($role) {

                    $btn = $role ?  '<a href="instructor/' . $row->id . '/edit" data-id="' . $row->id . '"  class="edit-instructor edit btn btn-info btn-sm">Edit</a>
                         <a href="javascript:void(0)" data-id="' . $row->id . '" class="delete-instructor edit btn btn-danger btn-sm">Delete</a>' : '';

                    return $btn;
                })
                ->make(true);
        }
        return view('instructor.browse');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instructor.add-edit');
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
        $role = Role::whereName('instructor')->first();

        $instructor = $this->instructor->create($request->all());
        $instructor->assignRole($role);

        if ($instructor)
            return redirect()->route('instructor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(User $instructor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function edit(User $instructor)
    {
        return view('instructor.add-edit', compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $instructor)
    {
        $res = $this->instructor->update($request->all(), $instructor->id);
        if ($res)
            return redirect()->route('instructor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $instructor)
    {
        $delete = $this->instructor->delete($instructor->id);
        if ($delete) {
            return redirect()->back();
        }
    }
}
