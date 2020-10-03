<?php

namespace App\Http\Controllers;

use App\students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TeacherstudentsController extends Controller
{
    
    //
    public function index()
    {
        //
        if(Auth::user()->role == 3){
            $data = students::where('wallet_id', Auth::user()->id)->get();
            $allStudents = students::orderBy('id', 'DESC')->get();
            if($data->count() == 0){

                alert()->warning('لا يوجد لديك أي طالب حالياً يرجى مراجعة  مدير المدرسة');

            }
            return view('control.teacher.index',compact('data'));
        }else{
            alert()->warning('لا يوجد لديك أي صلاحية');
            return redirect()->back();
        }
    }

   
}
