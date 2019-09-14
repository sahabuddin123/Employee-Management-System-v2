<?php
namespace App\Contracts;
 
/**
 * Interface CategoryContract
 * @package App\Contracts
 */
interface AdminContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listAdmin(string $order = 'id', string $sort = 'desc', array $columns = ['*']);
 
    /**
     * @param int $id
     * @return mixed
     */
    public function findAdminById(int $id);
 
    /**
     * @param array $params
     * @return mixed
     */
    public function createAdmin(array $params);
 
    /**
     * @param array $params
     * @return mixed
     */
    public function updateAdmin(array $params);
 
    /**
     * @param $id
     * @return bool
     */
    public function deleteAdmin($id);
}