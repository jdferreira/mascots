<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InterestsController extends Controller
{
    /**
     * Return the interests based on a pattern
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request) {
        // Return JSON with an array of the interests that match the argument
        // (for some definition of "match")
        throw new \Exception('Not implemented');
    }
}
