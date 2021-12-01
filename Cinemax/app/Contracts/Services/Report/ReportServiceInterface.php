<?php

namespace App\Contracts\Services\Report;

/**
 * Interface for report service
 */
interface ReportServiceInterface
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
