<?php

namespace App\Http\Controllers\Api\Target;

use App\Models\Target;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TargetRequest;

class TargetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('goal_id')) {
            return Target::where('goal_id', $request->goal_id)->latest('created_at')->get();
        }

        return Target::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TargetRequest $request)
    {
        $target = Target::create($request->except('complete_by'));
        if ($request->has('complete_by')) {
            $completeBy = now()->parse($request->complete_by)->toDateTimeString();
            $target->update(['complete_by' => $completeBy]);
        }
        return $target;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Target $target
     * @return \Illuminate\Http\Response
     */
    public function show(Target $target)
    {
        return $target;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Target $target
     * @return \Illuminate\Http\Response
     */
    public function update(TargetRequest $request, Target $target)
    {
        if (auth()->id() === $target->user_id) {
            $target->update($request->all());
            return $target;
        }

        return response()->json(['error' => true], 403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Target $target
     * @return \Illuminate\Http\Response
     */
    public function destroy(Target $target)
    {
        if (auth()->id() === $target->user_id) {
            $target->delete();
            return response()->json(['error' => false], 204);
        }

        return response()->json(['error' => true], 403);
    }
}
