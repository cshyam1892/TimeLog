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
	    'sdateandtime' => 'required',
	    'edateandtime' => 'required',
	    'hours' => 'required'
	]);

	$timelog = new TimeLog();
	$timelog->sdateandtime = $request->sdateandtime;
	$timelog->edateandtime = $request->edateandtime;
	$timelog->hours = $request->hours;
	$timelog->user_id = auth()->user()->id;
	$timelog->save();
	return redirect('/dashboard');
    }

    public function edit(TimeLog $timelog) {
	if (auth()->user()->id = $timelog->user_id) {
	    return view('edit', compact('timelog'));
	} else {
	    return redirect('/dashboard');
	}
    }

    public function update(Request $request, TimeLog $timelog) {
	if (isset($_POST['delete'])) {
	    $timelog->delete();
	    return redirect('/dashboard');
	} else {
	    $this->validate($request, [
		'sdateandtime' => 'required',
		'edateandtime' => 'required',
		'hours' => 'required'
	    ]);
	    $timelog->sdateandtime = $request->sdateandtime;
	    $timelog->edateandtime = $request->edateandtime;
	    $timelog->hours = $request->hours;
	    $timelog->save();
	    return redirect('/dashboard');
	}
    }
}
