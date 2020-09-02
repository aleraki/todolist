<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Table;

class TablesController extends Controller
{
    public function index(){
        $todos = Table::all();
        //indexビューを呼び出して、$todosを渡す
        return view('tables.index',['todos'=>$todos]);
    }
    public function new(Request $request){
        //tablesに新しく内容を登録して、indexに戻す
        $todo = new Table();
        $todo->content = $request->new;
        $todo->status = 1;
        $todo->due_date = date('Y-m-d');
        $todo->save();
        return redirect('/');
    }
    public function delete(Request $request){
        $todo = Table::findOrFail($request->id);
        $todo->delete();
        return redirect('/');
    }
}
