<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->where('role', 'student')->paginate(5);
        //DB::select("SELECT * from users WHERE `role` = 'Student'");

        return view('students.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Teachers::create([
            'name'  =>  $request->name,
            'email' =>  $request->email,
            'contact' => $request->contact,
            'address' => $request->address,
            'role'  => $request->role,
            'enrollment' => $request->enrollment,
            'studentsclass' => $request->studentsclass,
            'div' => $request->div,
        ]);

        session()->flash('success','Student created successfully.');

        return redirect(route('students.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $student)
    {
        return view('students.show')->with('users',$student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $student)
    {
        return view('students.create')->with('users',$student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $student)
    {
        $student->update([
            'name'  =>  $request->name,
            'email' =>  $request->email,
            'contact' => $request->contact,
            'address' => $request->address,
            'enrollment' => $request->enrollment,
            'studentsclass' => $request->studentsclass,
            'div' => $request->div,
            ]);

        $student->save();

        session()->flash('success','Student Updated successfully.');

        return redirect(route('students.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $student)
    {
        $student->delete();

        session()->flash('success','Student Deleted successfully.');

        return redirect(route('students.index'));
    }

}
