<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Activitylog\Models\Activity;

class LogController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', new Activity());
        
        $logs = Activity::paginate(15);

        return view('logs.index', ['logs' => $logs]);
    }
}
