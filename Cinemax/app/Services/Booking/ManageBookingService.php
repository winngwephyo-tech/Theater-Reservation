<?php

namespace App\Services\Booking;

use App\Contracts\Dao\Booking\ManageBookingDaoInterface;
use App\Contracts\Services\Booking\ManageBookingServiceInterface;

/**
 * Service class for report.
 */
class ManageBookingService implements ManageBookingServiceInterface
{
    /**
     * report dao
     */
    private $bookingDao;
    /**
     * Class Constructor
     * @param ReportDaoInterface
     * @return 
     */
    public function __construct(ManageBookingDaoInterface $bookingDao)
    {
        $this->bookingDao = $bookingDao;
    }
    /**
     * To show report view
     *
     * @return $reports
     */
    public function manageBooking()
    {
        $bookingList = $this->bookingDao->manageBooking();
        return $bookingList;
    }
}