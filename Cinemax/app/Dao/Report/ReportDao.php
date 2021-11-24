<?php

namespace App\Dao\Report;

use App\Contracts\Dao\Report\ReportDaoInterface;
use App\Models\Report;

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
        $reports = Report::join('movies', 'reports.movie_id', '=', 'movies.id')
                   ->whereNull('reports.deleted_at')
                   ->select('reports.*', 'movies.title')
                   ->get();
        return $reports;
    }

}
