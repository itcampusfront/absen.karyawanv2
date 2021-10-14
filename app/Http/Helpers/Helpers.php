<?php

use App\Models\Role;
use App\Models\Setting;

// Role
if(!function_exists('role')) {
    function role($key) {
        // Get the role by ID
        if(is_int($key)) {
            $role = Role::find($key);
            return $role ? $role->name : null;
        }
        // Get the role by key
        elseif(is_string($key)) {
            $role = Role::where('code','=',$key)->first();
            return $role ? $role->id : null;
        }
        else return null;
    }
}

// Setting
if(!function_exists('setting')) {
    function setting($key) {
        // Get the setting value by key
        $setting = Setting::where('code','=',$key)->first();
        return $setting ? $setting->value : '';
    }
}