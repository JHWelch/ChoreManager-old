<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DigestController extends Controller
{
    public function day()
    {
        $chores = DB::table('chores')
            ->join('chore_instances', 'chores.id', '=', 'chore_instances.chore_id')
            ->where(
                [
                    ['chore_instances.due_date', '=', Carbon::now()->toDateString()],
                    ['owner_id', '=', auth()->id()],
                ]
            )
            ->get();

        return view(
            'digests.digest',
            [
                'chores' => $chores,
                'digest_name' => 'Today',

            ]
        );
    }

    public function month()
    {
        $startOfMonth = new Carbon('first day of this month');
        $endOfMonth = new Carbon('last day of this month');

        $chores = DB::table('chores')
            ->join('chore_instances', 'chores.id', '=', 'chore_instances.chore_id')
            ->where(
                [
                    ['chore_instances.due_date', '>=', $startOfMonth],
                    ['chore_instances.due_date', '<=', $endOfMonth],
                    ['owner_id', '=', auth()->id()],
                ]
            )
            ->orderBy('chore_instances.due_date')
            ->get();

        return view(
            'digests.digest',
            [
                'chores' => $chores,
                'digest_name' => 'This Month',

            ]
        );
    }

    public function week()
    {
        $startOfWeek = new Carbon('this week');
        $endOfWeek = new Carbon('this week +6 days');

        $chores = DB::table('chores')
            ->join('chore_instances', 'chores.id', '=', 'chore_instances.chore_id')
            ->where(
                [
                    ['chore_instances.due_date', '>=', $startOfWeek],
                    ['chore_instances.due_date', '<=', $endOfWeek],
                    ['owner_id', '=', auth()->id()],
                ]
            )
            ->orderBy('chore_instances.due_date')
            ->get();

        return view(
            'digests.digest',
            [
                'chores' => $chores,
                'digest_name' => 'This Week',

            ]
        );
    }
}
