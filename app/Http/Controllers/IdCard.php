<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Sessions;
use App\Models\StudentAssignings;
use Illuminate\Http\Request;
use PDF;

class IdCard extends Controller
{
    public function index()
    {
        $data['sessions'] = Sessions::orderBy('id', 'desc')->get();
        $data['classes'] = Classes::all();
        return view('idcard.index', $data);
    }

    public function filter(Request $request)
    {
        $session_id = $request->session_id;
        $class_id = $request->class_id;

        $idcard = StudentAssignings::where('session_id', $session_id)->where('class_id', $class_id)->first();
        if ($idcard == true) {
            $data['idcard'] = StudentAssignings::where('session_id', $session_id)->where('class_id', $class_id)->get();

            $pdf = PDF::loadView('idcard.pdf_file', $data);
            return $pdf->stream('document.pdf');
        } else {
            Flash::error('Id Card not found.');
            return redirect()->back();
        }
    }
}
