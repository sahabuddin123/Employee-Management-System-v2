<?php
namespace App\Contracts;
 
/**
 * Interface CategoryContract
 * @package App\Contracts
 */
interface EmployeesContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listEmployees(string $order = 'id', string $sort = 'desc', array $columns = ['*']);
 
    /**
     * @param int $id
     * @return mixed
     */
    public function findEmployeesById(int $id);
 
    /**
     * @param array $params
     * @return mixed
     */
    public function createEmployees(array $params);
 
    /**
     * @param array $params
     * @return mixed
     */
    public function updateEmployees(array $params);
 
    /**
     * @param $id
     * @return bool
     */
    public function deleteEmployees($id);
}