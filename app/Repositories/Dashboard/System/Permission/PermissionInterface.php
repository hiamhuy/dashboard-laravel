<?php

namespace App\Repositories\Dashboard\System\Permission;

use Illuminate\Http\Request;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

interface PermissionInterface
{
    public function getDataPaginate(Request $request);

}