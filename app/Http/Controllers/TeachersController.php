<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
/*
use App\Teachers;
use App\Http\Requests\teachers\createtablerequest;
use App\Http\Requests\teachers\updatetablerequest;
*/
class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->where('role', 'Teacher')->paginate(1);
       //DB::select("SELECT * from users WHERE `role` = 'Teacher'");
        return view('teachers.index',['users'=>$users]);
        //->with('users',User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teachers.create');
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
        ]);

        session()->flash('success','Teacher created successfully.');

        return redirect(route('teacher.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('teachers.create')->with('users',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        $user->update([
            'name'  =>  $request->name,
            'email' =>  $request->email,
            'contact' => $request->contact,
            'address' => $request->address,
            ]);

        $user->save();

        session()->flash('success','Teacher Updated successfully.');

        return redirect(route('teacher.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $teacher)
    {
        $teacher->delete();

        session()->flash('success','Teacher Deleted successfully.');

        return redirect(route('teacher.index'));
    }
}
