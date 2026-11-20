<?php

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

// A small notes page: proof that the app, its database and the migrations work together.
Route::get('/', function () {
    return view('notes', ['notes' => Note::latest()->take(50)->get()]);
});

Route::post('/notes', function (Request $request) {
    $data = $request->validate(['text' => ['required', 'string', 'max:500']]);
    Note::create($data);
    return redirect('/');
});

// /status (not /health: on Uppcoder the platform itself answers /health) - is the database reachable?
Route::get('/status', function () {
    try {
        $version = DB::selectOne('select version() as v')->v;
        return response()->json([
            'app' => 'ok',
            'database' => 'ok',
            'driver' => DB::connection()->getDriverName(),
            'server_version' => $version,
            'notes' => Note::count(),
        ]);
    } catch (\Throwable $e) {
        return response()->json(['app' => 'ok', 'database' => 'unreachable', 'error' => class_basename($e)], 503);
    }
});
