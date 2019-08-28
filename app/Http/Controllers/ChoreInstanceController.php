<?php

namespace App\Http\Controllers;

use App\ChoreInstance;
use Illuminate\Http\Request;

class ChoreInstanceController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\ChoreInstance  $choreInstance
     * @return \Illuminate\Http\Response
     */
    public function show(ChoreInstance $choreInstance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ChoreInstance  $choreInstance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChoreInstance $choreInstance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ChoreInstance $choreInstance Chore being destroyed
     *
     * @return Nothing
     */
    public function destroy(ChoreInstance $choreInstance)
    {
        //
    }

    public function complete(ChoreInstance $choreInstance)
    {
        $this->authorize('update', $choreInstance);

        $choreInstance->complete();

    }
}
