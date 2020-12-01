<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoList;

class TodoListController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function createTodo(Request $request)
    {
        $create = new TodoList();
        $create->name_todo = $request->name_todo;
        $create->date_todo = $request->date_todo;
        $create->desc_todo = $request->desc_todo;
        $result = $create->save();

        if($result){
            $response = [
                'status'=> true,
                'message'=> 'Simpan data berhasil',
                'data'=> $request->all()
            ];
        }else{
            $response = [
                'status'=>false,
                'message'=> 'Simpan data gagal'
            ];
        }

        return $response;
    }
    
    public function showAllData()
    {
        $data = TodoList::all();        
        $response = [
            'data'=> $data
        ];

        return $response;
    }

    public function showDetailData($id)
    {
        $data = TodoList::where('id', $id)->first();
        if($data){
            $response = [
                'status'=> true,
                'message'=> 'Data ditemukan',
                'data'=> $data
            ];
        }else{
            $response = [
                'status'=> false,
                'message'=> 'Data tidak ditemukan',
                'data'=> $data
            ];
        }
        
        return response($response);
    }

    public function updateTodo(Request $request, $id)
    {
        $data = TodoList::find($id);
        $update = $data->update([
            'name_todo'=> $request->name_todo,
            'date_todo'=> $request->date_todo,
            'desc_todo'=> $request->desc_todo,
            'status_todo'=> $request->status_todo,
        ]);

        if ($update) {
            $response  = [
                "status"  => true,
                "message" => "Update data berhasil",
            ];
        } else {
            $response  = [
               "status"  => false,
                "message" => "Update data gagal",
            ];
        }

        return response($response);
    }

    public function deleteTodo($id)
    {
        $data = TodoList::find($id);
        $delete = $data->delete();

        if ($delete) {
            $response  = [
                "status"  => true,
                "message" => "Hapus data berhasil",
            ];
        } else {
            $response  = [
               "status"  => false,
                "message" => "Hapus data gagal",
            ];
        }

        return response($response);
    }
}
