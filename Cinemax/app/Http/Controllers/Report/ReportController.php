<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Contracts\Services\Report\ReportServiceInterface;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReportsExport;

class ReportController extends Controller
{
    /**
     * report interface
     */
    private $reportInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ReportServiceInterface $reportServiceInterface)
    {
        $this->reportInterface = $reportServiceInterface;
    }
    /**
     * To show report view
     *
     * @return View report
     */
    public function showReports()
    {
        $reports = $this->reportInterface->showReports();
        return view('report.index', compact('reports'));
    }
    /**
     * Export to excel
     *
     */
    public function export()
    {
        return Excel::download(new ReportsExport, 'report.xlsx');
    }
    /**
     * Export to excel and delete
     *
     */
    public function deleteANDexport()
    {
        Report::query()->delete();
        return Excel::download(new ReportsExport, 'report.xlsx');

    }
}
