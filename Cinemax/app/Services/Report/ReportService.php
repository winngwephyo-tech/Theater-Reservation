<?php

namespace App\Services\Report;

use App\Contracts\Dao\Report\ReportDaoInterface;
use App\Contracts\Services\Report\ReportServiceInterface;

/**
 * Service class for report.
 */
class ReportService implements ReportServiceInterface
{
    /**
     * report dao
     */
    private $reportDao;
    /**
     * Class Constructor
     * @param ReportDaoInterface
     * @return 
     */
    public function __construct(ReportDaoInterface $reportDao)
    {
        $this->reportDao = $reportDao;
    }
    /**
     * To show report view
     *
     * @return $reports
     */
    public function showReports()
    {
        $reports = $this->reportDao->showReports();
        return $reports;
    }
}