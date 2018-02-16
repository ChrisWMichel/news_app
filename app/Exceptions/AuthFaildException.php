<?php

namespace App\Exceptions;

use Exception;

class AuthFaildException extends Exception
{
    public function render(){
        return response()->json([
          'message' => 'These credentials do not match our records.'
        ], 422);
    }

}
