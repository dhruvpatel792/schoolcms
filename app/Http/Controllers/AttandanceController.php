<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Attandance;
use Illuminate\Http\Request;

class AttandanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentsAllClass = User::select('studentsclass')->distinct()->get();
        $divisions = User::select('div')->distinct()->get();
        return view('attandance.index',
        array("studentsAllClass"=>$studentsAllClass,"div" => $divisions));
    }


    public function attandance(Request $request)
    {
        $id = $request->request->get('id');
        $std = $request->request->get('std');
        $div = $request->request->get('div');
        $date = $request->request->get('date');
        $isAttandance = $request->request->get('isAttandance');
        if($isAttandance=="true"){
            $attandance = Attandance::create(array("user_id" => $id,"studentsclass" => $std, "div" => $div , "date" => $date ));
        }else{
            $attandance = Attandance::where(array("user_id" => $id,"studentsclass" => $std, "div" => $div , "date" => $date ))->first();
            if($attandance){
                $attandance->delete();
            }
        }
    }

    public function getstudents(Request $request)
    {
        $std = $request->query->get('std');
        $div = $request->query->get('div');
        $date = $request->query->get('date');
        $users =User::where(array('studentsclass' => $std, 'div' => $div))->get();

        foreach($users as $user)
        {  
            $attandance = Attandance::where(array("user_id" => $user->id,"studentsclass" => $std, "div" => $div , "date" => $date ))->first();
            if($attandance){
                $user->isAttandance=true;
            }else{
                $user->isAttandance=false;
            }
        }
        return view('attandance.getstudents',compact("users"));
    }

}
