<?php

namespace App\Services\Permission\Traits;


use App\Models\Role;

trait HasRoles
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }


    public function giveRolesTo(...$roles)
    {
        $roles = $this->getAllRoles($roles);

        if ($roles->isEmpty()){ return $this; }

        $this->roles()->syncWithoutDetaching($roles);

        return $this;
    }


    protected function getAllRoles($roles)
    {
        return Role::query()->whereIn('name', $roles)->get();
    }



    public function withdrawRoles(...$roles)
    {
        $roles = $this->getAllRoles($roles);

        $this->roles()->detach($roles);

        return $this;
    }


    public function refreshRoles($roles)
    {
//        dd('refreshRoles',$roles);
        $roles = $this->getAllRoles($roles);
//        dd('getAllRoles',$roles);

        $this->roles()->sync($roles);

        return $this;
    }


    public function hasRole(string $role)
    {
//        dd('hasRole' , $role ,$this->roles->contains('name' , $role));
        return $this->roles->contains('name' , $role);
    }






}
