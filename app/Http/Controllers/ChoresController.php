<?php

namespace App\Http\Controllers;

use App\Chore;
use Illuminate\Http\Request;

class ChoresController extends Controller
{

    public function index()
    {
        $chores = auth()->user()->chores;

        return view('chores.index', compact('chores'));
    }

    public function create()
    {
        $frequencies = Chore::FREQUENCIES;

        return view('chores.create', compact('frequencies'));
    }

    public function store()
    {
        $attributes = $this->validateChore();
        $attributes['owner_id'] = auth()->id();

        $dueDate = request()->validate(['due_date' => ['required']]);

        $newChore = Chore::create($attributes);

        $newChore->createInstanceAt($dueDate['due_date']);

        return redirect('/chores');
    }

    public function show(Chore $chore)
    {
        $this->authorize('update', $chore);
        $instances = $chore->instances();

        return view('chores.show', compact('chore', 'instances'));
    }

    public function edit(Chore $chore)
    {
        $this->authorize('update', $chore);
        $frequencies = Chore::FREQUENCIES;

        return view('chores.edit', compact('chore', 'frequencies'));
    }

    public function update(Chore $chore)
    {
        $this->authorize('update', $chore);

        $chore->update(
            $this->validateChore()
        );

        return redirect('/chores');
    }

    public function destroy(Chore $chore)
    {
        $this->authorize('update', $chore);

        $chore->delete();

        return redirect('/chores');
    }

    protected function validateChore()
    {
        return request()->validate(
            [
                'title' => ['required', 'min:3'],
                'description' => ['required', 'min:3'],
                'frequency_id' => ['required'],

            ]
        );
    }
}
