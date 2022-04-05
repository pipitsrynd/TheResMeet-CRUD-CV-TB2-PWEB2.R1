<?php

namespace App\Controllers\Internal;

use App\Controllers\BaseController;
use App\Models\Room;
use App\Models\RoomCategory;

class RoomController extends BaseController
{
    protected $roomModel,$roomCategoryModel;

    public function __construct(){
        $this->roomModel = new Room();
        $this->roomCategoryModel = new RoomCategory();
    }

    public function index()
    {
        $rooms = $this->roomModel->join('room_categories','room_categories.id = rooms.room_category_id')
            ->select([
                'rooms.id',
                'rooms.name as room_name',
                'rooms.description',
                'rooms.num_person',
                'rooms.slug',
                'room_categories.name as category_name'
            ])->findAll();

        return view('backend/pages/rooms/index',[
            'rooms'=>$rooms
        ]);
    }

    public function create(){
        $categories = $this->roomCategoryModel->findAll();
        return view('backend/pages/rooms/create',[
            'categories'=>$categories
        ]);
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

    public function edit($id){
        $room = $this->roomModel->find($id);
        $categories = $this->roomCategoryModel->findAll();
        return view('backend/pages/rooms/edit',[
            'categories' => $categories,
            'room' => $room,
        ]);
    }

    public function update($id){
        $slug = url_title($this->request->getVar('name'),'-',true);
        $this->roomModel->update($id,[
            'name' => $this->request->getVar('name'),
            'slug' => $slug,
            'description' => $this->request->getVar('description'),
            'num_person' => $this->request->getVar('num_person'),
            'room_category_id' => $this->request->getVar('room_category_id')
        ]);

        return redirect()->to('internal/rooms')->with('success','Data Updated Successfully');
    }

    public function delete($id){
        $room = $this->roomModel->find($id);

        if($room){
            $this->roomModel->delete($id);
        }

        return redirect()->back()->with('success','Data Deleted Successfully');
    }
}
