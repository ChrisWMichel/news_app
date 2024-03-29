<?php

function checkPermission($permissions){

    if(in_array('guest', $permissions)){
        return true;
    }else{
        $userAccess = getMyPermission(auth()->user()->is_permission);

        foreach ($permissions as $key => $value){
            if($value == $userAccess){
                return true;
            }
        }
    }

    return false;
}

function getMyPermission($id){

    switch ($id){
        case 1:
            return 'admin';
            break;
        case 2:
            return 'superadmin';
            break;
        case 3:
            return 'member';
            break;
    }
}

