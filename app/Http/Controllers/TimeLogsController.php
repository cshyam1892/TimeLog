<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeLog;

class TimeLogsController extends Controller
{
    public function index() {
	$timelogs = auth()->user()->timelogs();
	return view('dashboard', compact('timelogs'));
    }

    public function add() {
	return view('add');
    }

    public function create(Request $request) {
	$this->validate($request, [
	    'dayName' => 'required',
	    'from' => 'required',
	    'to' => 'required'
	]);

	$timelog = new TimeLog();
	$timelog->dayName = $request->dayName;
	$timelog->from = $request->from;
	$timelog->to = $request->to;
	$timelog->user_id = auth()->user()->id;
	$timelog->save();
	return redirect('/dashboard');
    }
}
