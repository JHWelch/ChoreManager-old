<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DigestController extends Controller
{
    protected function getChoresBetween($startDate, $endDate)
    {
        return DB::table('chores')
            ->join('chore_instances', 'chores.id', '=', 'chore_instances.chore_id')
            ->where(
                [
                    ['chore_instances.due_date', '>=', $startDate],
                    ['chore_instances.due_date', '<=', $endDate],
                    ['owner_id', '=', auth()->id()],
                ]
            )
            ->whereNull('completed_date')
            ->orderBy('chore_instances.due_date')
            ->get();
    }

    public function day()
    {
        $now = Carbon::now()->toDateString();

        $chores = $this->getChoresBetween($now, $now);

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

        $chores = $this->getChoresBetween($startOfMonth, $endOfMonth);

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

        $chores = $this->getChoresBetween($startOfWeek, $endOfWeek);

        return view(
            'digests.digest',
            [
                'chores' => $chores,
                'digest_name' => 'This Week',
            ]
        );
    }
}
