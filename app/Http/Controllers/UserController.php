<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function list(){
        if (request()->wantsJson()) {
            $itemsPerPage = (int) request('countPerPage');
            $users = User::filtered();

            return response()->json(
                [
                    "success" => true,
                    "data" =>  $users->paginate($itemsPerPage != 'undefined' ? $itemsPerPage : 10)->onEachSide(2),

                    // header for datatable
                    "headers" => [
                        [
                            "value" => "id",
                            "text" => "ID"
                        ],
                        [
                            "value" => "name",
                            "text" => "Name"
                        ],
                        [
                            "value" => "last_name",
                            "text" => "Last Name"
                        ],
                        [
                            "value" => "cell_phone",
                            "text" => "Cell Phone"
                        ],
                        [
                            "value" => "address",
                            "text" => "Address"
                        ],
                        [
                            "value" => "email",
                            "text" => "Email"
                        ],
                    ]
                ]
            );

        }
    }

}
