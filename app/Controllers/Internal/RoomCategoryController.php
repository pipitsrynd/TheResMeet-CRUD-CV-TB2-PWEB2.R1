<?php

namespace App\Controllers\Internal;

use App\Controllers\BaseController;
use App\Models\RoomCategory;

class RoomCategoryController extends BaseController
{
    protected $roomCategoryModel;

    public function __construct(){
        $this->roomCategoryModel = new RoomCategory();
    }

    public function index()
    {
        $room_categories = $this->roomCategoryModel->findAll();
        return view('backend/pages/room_categories/index',[
            'room_categories' => $room_categories
        ]);
    }

    public function create(){
        return view('backend/pages/room_categories/create');
    }

    public function store(){
        $this->roomCategoryModel->save([
            'name' => $this->request->getVar('name'),
        ]);

        return redirect()->to('internal/room_categories')->with('success','Data Added Successfully');
    }

    public function edit($id){
        $room_category = $this->roomCategoryModel->find($id);
        return view('backend/pages/room_categories/edit',[
            'room_category'=>$room_category
        ]);
    }

    public function update($id){
        $this->roomCategoryModel->update($id,[
           'name'=> $this->request->getVar('name')
        ]);

        return redirect()->to('internal/room_categories')->with('success','Data Updated Successfully');
    }

    public function delete($id){
        $category = $this->roomCategoryModel->find($id);

        if($category){
            $this->roomCategoryModel->delete($id);
        }

        return redirect()->back()->with('success','Data Deleted Successfully');
    }
}
