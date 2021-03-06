<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Table;

class TablesController extends Controller
{
    public function index(){
        $query = Table::query();
        $id = Auth::user()->id;
        $query->where("userid",$id);
        $todos = $query->get();
        //indexビューを呼び出して、$todosを渡す
        return view('tables.index',['todos'=>$todos]);
    }
    public function new(Request $request){
        //tablesに新しく内容を登録して、indexに戻す
        $todo = new Table();
        $todo->content = $request->new;
        $todo->status = 1;
        $todo->due_date = date('Y-m-d');
        $id = Auth::user()->id;
        $todo->userid = $id;
        $todo->save();
        // Auth::user()->save($todo);
        return redirect('/');
    }
    public function delete($id){
        $todo = Table::find($id);
        $todo->delete();
        return redirect('/');
    }
    public function edit($id){
        $edit = Table::findOrFail($id);
        return view('tables.edit')->with('edit', $edit);
    }
    public function
    complete(Request $request, $id){
        //レコードを検索
        $complete = Table::findOrFail($id);
        $complete->content = $request->content;
        $complete->status = $request->status;
        $complete->due_date = $request->limit;
        $complete->save();
        return redirect('/');
    }
}
