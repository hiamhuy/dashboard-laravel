<?php

namespace App\Repositories\Dashboard\System\User;

use Illuminate\Http\Request;

interface UserInterface
{
    public function getDataPaginate(Request $request);
}