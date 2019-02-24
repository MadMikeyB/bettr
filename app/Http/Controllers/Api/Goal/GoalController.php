<?php

namespace App\Http\Controllers\Api\Goal;

use App\Models\Goal;
use Illuminate\Http\Request;
use App\Http\Requests\GoalRequest;
use App\Http\Controllers\Controller;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('orderBy')) {
            switch ($request->orderBy) {
                case 'latest':
                    return Goal::latest('created_at')->get();
                    break;
                
                default:
                    return Goal::all();
                    break;
            }
        }
        return Goal::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoalRequest $request)
    {
        return Goal::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Goal $goal)
    {
        return $goal;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GoalRequest $request, Goal $goal)
    {
        if (auth()->id() === $goal->user_id) {
            $goal->update($request->all());
            return $goal;
        }

        return response()->json(['error' => true], 403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Goal $goal)
    {
        if (auth()->id() === $goal->user_id) {
            $goal->delete();
            return response()->json(['error' => false], 204);
        }

        return response()->json(['error' => true], 403);
    }
}
