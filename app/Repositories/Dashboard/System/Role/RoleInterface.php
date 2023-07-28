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
    public function getAll();
    public function role_has_permissions();
    public function get_list_and_checked();
    public function getDataPaginate(Request $request);
    public function findById($id);
    public function insertData(Request $request);
    public function updateData(Request $request, $id);
    public function deleteData($id);
    public function notifyDelete();
    public function assignRole(Request $request, $id);
}