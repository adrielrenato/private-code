<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Requests\GroupFormRequest;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', new Group());

        $groups = Group::orderBy('name', 'asc')
            ->get();

        return view('groups.index', ['groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', new Group());

        return view('groups.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\GroupFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupFormRequest $request)
    {
        $this->authorize('create', new Group());

        Group::create($request->validated());

        return redirect()->route('groups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::findOrFail($id);

        $this->authorize('update', $group);

        return view('groups.create-edit', ['group' => $group]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\GroupFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GroupFormRequest $request, $id)
    {
        $group = Group::findOrFail($id);

        $this->authorize('update', $group);

        $group->fill($request->validated())
            ->save();

        return redirect()->route('groups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::findOrFail($id);

        $this->authorize('delete', $group);

        $group->delete();

        return redirect()->route('groups.index');
    }
}
