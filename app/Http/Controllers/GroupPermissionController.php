<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupPermission;
use App\Models\Permission;
use Illuminate\Http\Request;

class GroupPermissionController extends Controller
{
    public function index($id)
    {
        $group = Group::findOrFail($id);

        $this->authorize('viewAny', $group);

        $groupPermissions = GroupPermission::with(['permission'])
            ->where('group_id', $group->id)
            ->get();

        return view('groups-permissions.index', ['groupPermissions' => $groupPermissions]);
    }

    public function store(Group $group)
    {
        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            GroupPermission::create([
                'group_id' => $group->id,
                'permission_id' => $permission->id,
                'active' => false,
            ]);
        }
    }

    public function edit($groupId, $groupPermissionId)
    {
        $group = Group::findOrFail($groupId);

        $this->authorize('update', $group);

        $groupPermission = GroupPermission::with(['permission', 'group'])
            ->where('id', $groupPermissionId)
            ->firstOrFail();

        return view('groups-permissions.edit', ['groupPermission' => $groupPermission]);
    }

    public function update(Request $request, $groupId, $groupPermissionId)
    {
        $group = Group::findOrFail($groupId);

        $this->authorize('update', $group);

        $groupPermission = GroupPermission::findOrFail($groupPermissionId);

        $groupPermission->fill(['active' => $request->get('active')])
            ->save();

        return redirect()->route('groups-permissions.index', ['group' => $group->id]);
    }
}
