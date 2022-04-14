<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\RoomCategory;
use App\Models\Room;
use App\Models\RoomImage;

class RoomController extends BaseController
{
    private $categoryModel, $roomModel, $roomImageModel;

    public function __construct(){
        $this->categoryModel = new RoomCategory();
        $this->roomModel = new Room();
        $this->roomImageModel = new RoomImage();
    }

    public function index()
    {
        $categories = $this->categoryModel->findAll();
        $rooms = $this->roomModel->findAll();
        $image_array = [];

        foreach($rooms as $room){
            $room_image = $this->roomImageModel->where('room_id',$room['id'])->first()['image_name'];

            $image_array['img'][] = $room_image;
        }

        dd($image_array);
    }
}
