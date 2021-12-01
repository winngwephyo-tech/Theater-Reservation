<?php

namespace App\Services\Booking;

use App\Contracts\Dao\Booking\ManageBookingDaoInterface;
use App\Contracts\Dao\Movie\MovieDaoInterface;
use App\Contracts\Services\Booking\ManageBookingServiceInterface;
use App\Models\Booking;

/**
 * Service class for report.
 */
class ManageBookingService implements ManageBookingServiceInterface
{
    /**
     * booking dao
     */
    private $bookingDao;
    /**
     * Class Constructor
     * @param ManageBookingDaoInterface $bookingDao
     *  @return void
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
     * @param Booking $booking
     * @return void
     */
    public function deleteBooking($booking)
    {
        return $this->bookingDao->deleteBooking($booking);
    }
    /**
     * delete all booking
     * @return void
     * 
     */
    public function deleteAll()
    {
        return $this->bookingDao->deleteAll();
    }

    /**
     * search name
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response 
     */
    public function searchName($request)
    {
        return $this->bookingDao->searchName($request);
    }
}
