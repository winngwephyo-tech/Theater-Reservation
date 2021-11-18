<?php

namespace App\Exports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class ReportsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $reports = DB::table('reports')
            ->join('movies', 'reports.movie_id', '=', 'movies.id')
            ->select('movies.title', 'reports.income', 'reports.rating', 'reports.created_at', 'reports.updated_at', 'reports.deleted_at')
            ->get();
        return $reports;
    }
}
