<?php

namespace App\Http\Controllers;

use App\Http\Requests\CollectorRequest;
use App\Models\Entity;
use App\Models\Similarity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollectorController extends Controller
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
        return view('collector')->with('pair', $this->getRandomPair());
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
    public static function randomPair()
    {
        $pair = $this->getRandomPair();
        
        // If the returned pair is not null, construct an array to send as JSON
        // with an 'ok' key containing the pair; otherwise the result of the
        // action contain an 'error' key with a description of the error.
        $result = isnull($pair) ?
            ['error' => 'Unable to find a pair'] :
            ['ok' => $pair];
        
        return response()->json($result);
    }
    
    /**
     * Return a random pair of entities that the user currently authenticated
     * has not yet evaluated.
     */
    private function getRandomPair()
    {
        // Find a pair of entities not previously processed by this user. Try a
        // predetermined number of times. If the threshold is met, then stop
        // trying and return null; otherwise, just return the entity pair
        $max_tries = 5;
        $tries = 0;
        
        do {
            $pair = Entity::inRandomOrder()->take(2)->get();
            $tries++;
        } while ($tries < $max_tries && static::collectedByUser($pair));
        
        if (static::collectedByUser($pair)) {
            return null;
        }
        else {
            return $pair->load('data');
        }
    }
    
    /**
     * Return true if the authenticated user has already provided an answer to
     * the similarity between two entities; if such is not the case, false.
     */
    private static function collectedByUser($entities) {
        // Pluck the id attribute of the retrieved entities
        $entities = $entities->pluck('id');
        
        // Determine whether the entities have been used previously by the user
        // to collect the similarity of a pair
        return Auth::user()->similarities()
            ->whereIn('entity1_id', $entities)
            ->whereIn('entity2_id', $entities)
            ->where('entity1_id', '!=', 'entity2_id')
            ->exists();
    }
}
