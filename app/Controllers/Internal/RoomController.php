<?php

namespace App\Controllers\Internal;

use App\Controllers\BaseController;
use App\Models\Room;

class RoomController extends BaseController
{
    protected $roomModel;

    public function __construct(){
        $this->roomModel = new Room();
    }

    public function index()
    {
        $rooms = $this->roomModel->findAll();

        return view('backend/pages/rooms/index',[
            'rooms'=>$rooms
        ]);
    }

    public function create(){
        return view('backend/pages/rooms/create');
    }

    public function store(){
        $slug = url_title($this->request->getVar('name'),'-',true);
        $this->roomModel->save([
            'name' => $this->request->getVar('name'),
            'slug' => $slug,
            'description' => $this->request->getVar('description'),
            'num_person' => $this->request->getVar('num_person'),
            'room_category_id' => $this->request->getVar('room_category_id')
        ]);

        return redirect()->to('internal/rooms')->with('success','Data Added Successfully');
    }
}
