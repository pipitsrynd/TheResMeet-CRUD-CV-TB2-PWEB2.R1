<?php

namespace App\Controllers\Internal;

use App\Controllers\BaseController;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\RoomImage;

class DashboardController extends BaseController
{
    protected $roomImageModel, $roomModel, $roomCategoryModel, $reservationModel;

    public function __construct()
    {
        $this->roomImageModel = new RoomImage();
        $this->roomModel = new Room();
        $this->roomCategoryModel = new RoomCategory();
        $this->reservationModel = new Reservation();
    }
    public function index()
    {
        $rooms = $this->roomModel->findAll();
        $room_categories = $this->roomCategoryModel->findAll();
        $room_images = $this->roomImageModel->findAll();
        $reservations = $this->reservationModel->join('rooms', 'rooms.id=reservations.room_id')
            ->join('users', 'users.id=reservations.user_id')
            ->select([
                'reservations.*', 'rooms.name as room_name', 'users.name as user_name'
            ])->findAll();
        return view('backend/dashboard', [
            'rooms' => count($rooms),
            'room_categories' => count($room_categories),
            'room_images' => count($room_images),
            'reservations' => $reservations
        ]);
    }
}
