<?php

namespace App\Http\Livewire\Admin\Role;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class LiveRoleTable extends Component
{
    public function render()
    {
        $roles = Role::all();
        $roles = $roles->each(function ($role) {
            $role->count_user = User::role($role->name)->count();
        });
        return view('livewire.admin.role.live-role-table', compact('roles'));
    }
}
