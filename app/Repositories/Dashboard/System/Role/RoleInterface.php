<?php

namespace App\Repositories\Dashboard\System\Role;

use Illuminate\Http\Request;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class RoleInterface.
 */
interface RoleInterface
{
    public function getDataPaginate(Request $request);
}