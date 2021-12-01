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
     * @param ReportDaoInterface $reportDao
     * @return 
     */
    public function __construct(ReportDaoInterface $reportDao)
    {
        $this->reportDao = $reportDao;
    }
    /**
     * To show report view
     * @return object $reports report
     */
    public function showReports()
    {
        return  $this->reportDao->showReports();    
    }
    /**
     * To delete all reports
     */
    public function deleteReports()
    {
        $this->reportDao->deleteReports();
    }
}