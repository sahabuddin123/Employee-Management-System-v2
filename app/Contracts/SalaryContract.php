<?php
namespace App\Contracts;
 
/**
 * Interface CategoryContract
 * @package App\Contracts
 */
interface SalaryContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listSalary(string $order = 'id', string $sort = 'desc', array $columns = ['*']);
 
    /**
     * @param int $id
     * @return mixed
     */
    public function findSalaryById(int $id);
 
    /**
     * @param array $params
     * @return mixed
     */
    public function createSalary(array $params);
 
    /**
     * @param array $params
     * @return mixed
     */
    public function updateSalary(array $params);
 
    /**
     * @param $id
     * @return bool
     */
    public function deleteSalary($id);
}