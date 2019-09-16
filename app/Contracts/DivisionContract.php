<?php
namespace App\Contracts;
 
/**
 * Interface DivisionContract
 * @package App\Contracts
 */
interface DivisionContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listDivision(string $order = 'id', string $sort = 'desc', array $columns = ['*']);
 
    /**
     * @param int $id
     * @return mixed
     */
    public function findDivisionById(int $id);
 
    /**
     * @param array $params
     * @return mixed
     */
    public function createDivision(array $params);
 
    /**
     * @param array $params
     * @return mixed
     */
    public function updateDivision(array $params);
 
    /**
     * @param $id
     * @return bool
     */
    public function deleteDivision($id);
}