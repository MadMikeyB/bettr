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
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TargetRequest $request)
    {
        return Target::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Target $target
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
