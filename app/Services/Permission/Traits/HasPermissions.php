<?php

namespace App\Services\Permission\Traits;



use App\Models\Permission;

trait HasPermissions
{
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }


    public function givePermissionsTo(...$permissions)
    {

        $permissions = $this->getAllPermissions($permissions);

        if ($permissions->isEmpty()) return $this;


        $this->permissions()->syncWithoutDetaching($permissions);


        return $this;
    }


    protected function getAllPermissions($permissions)
    {
//        dd('getAllPermissions',$permissions,Permission::whereIn('name', $permissions)->get());
        return Permission::whereIn('name', $permissions)->get();
    }



    public function withdrawPermissions(...$permissions)
    {
        $permissions = $this->getAllPermissions($permissions);

        $this->permissions()->detach($permissions);

        return $this;
    }


    public function refreshPermissions($permissions)
    {
//        dd('refreshPermissions' , $permissions);
        $permissions = $this->getAllPermissions($permissions);

        $this->permissions()->sync($permissions);


        return $this;
    }


    public function hasPermission(Permission $permission)
    {

//        dd($this,$this->permissions);
        return  $this->permissions->contains($permission)  || $this->hasPermissionsThroughRole($permission)  ;
    }


    protected function hasPermissionsThroughRole(Permission $permission)
    {
        foreach ($permission->roles as $role) {
//            dd('hasPermissionsThroughRole',$permission->roles ,$role,$this->roles );//,$this->roles->contains('name',$role->name) );

//            dd($role ,$this->roles);
//            dd($this,$this->roles);
            if ($this->roles->contains($role)) return true;
        }
        return false;
    }


}
