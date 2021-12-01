<?php

namespace App\Contracts\Dao\Report;

/**
 * Interface for Data Accessing Object of Report
 */
interface ReportDaoInterface
{
    /**
     * To show report view
     * @return object $reports report
     */
    public function showReports();
    /**
     * To delete all reports
     */
    public function deleteReports();
}
