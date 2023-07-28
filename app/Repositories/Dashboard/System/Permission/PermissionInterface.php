<?php

namespace App\Repositories\Dashboard\System\Permission;

use Illuminate\Http\Request;

interface PermissionInterface
{
    public function getAll();
    public function getDataPaginate(Request $request);
    public function findById($id);
    public function insertData(Request $request);
    public function updateData(Request $request, $id);
    public function deleteData($id);
    public function notifyDelete();

    public function assignPermission($request,$id);

}