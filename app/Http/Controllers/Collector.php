<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CollectorRequest;

class Collector extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the main collector view
     *
     * @return \Illuminate\Http\Response
     */
    public function show() {
        return view('collector');
    }
    
    /**
     * Process an incoming CollectorRequest
     *
     * @param \App\Http\Requests\CollectorRequest $request
     * @return \Illuminate\Http\Response
     */
    public function collect(CollectorRequest $request) {
        // Either return a 204 (NoContent) or a 422 (Unprocessable Entity)
        // HTML code
        throw new \Exception('Not implemented');
    }
    
    /**
     * Return a random pair of entities for the user to evaluate next
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public static function randomPair(Request $request)
    {
        throw new \Exception('Not implemented');
    }
}
