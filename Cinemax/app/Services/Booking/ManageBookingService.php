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
        return  $this->bookingDao->manageBooking();
    }

    /**
     * delete by booking id
     */
    public function deleteBooking($booking)
    {
        return $this->bookingDao->deleteBooking($booking);
    }
    /**
     * delete all booking
     */
    public function deleteAll()
    {
        return $this->bookingDao->deleteAll();
    }

       /**
     * search name
     * @param $request
     */
    public function searchName($request)
    {
       return $this->bookingDao->searchName($request);
    
    }


}
