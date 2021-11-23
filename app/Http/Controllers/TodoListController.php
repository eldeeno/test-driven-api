<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoListRequest;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = TodoList::all();
        return response($lists);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TodoListRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoListRequest $request)
    {
        return TodoList::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TodoList $todoList)
    {
        return response($todoList);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TodoListRequest $request
     * @param TodoList $todoList
     * @return \Illuminate\Http\Response
     */
    public function update(TodoListRequest $request, TodoList $todoList)
    {
        $todoList->update($request->all());
        return response($todoList);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TodoList $todoList)
    {
        $todoList->delete();
        return response('',Response::HTTP_NO_CONTENT);
    }
}
