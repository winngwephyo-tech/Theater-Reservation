<?php

namespace App\Dao\Report;

use App\Contracts\Dao\Report\ReportDaoInterface;
use App\Models\Report;
use Illuminate\Support\Facades\DB;

/**
 * Data accessing object for report
 */
class ReportDao implements ReportDaoInterface
{
    /**
     * To show report view
     *
     * @return $reports
     */
    public function showReports()
    {
        $reports = DB::table('reports')
            ->join('movies', 'reports.movie_id', '=', 'movies.id')
            ->whereNull('reports.deleted_at')
            ->select('reports.*', 'movies.title')
            ->get();
        return $reports;
    }

}
