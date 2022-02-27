<?php

declare(strict_types=1);

namespace Core;

/**
 * Class Model
 */
abstract class Model implements DbModelInterface
{

    /**
     * @var string
     */
    protected $tableName;

    /**
     * @var string
     */
    protected $idColumn;

    /**
     * @var array
     */
    protected $columns = [];

    /**
     * @var
     */
    protected $collection;

    /**
     * @var string
     */
    protected $sql;

    /**
     * @var array
     */
    protected $params = [];

    /**
     * @return $this
     */
    public function initCollection()
    {
        $columns = implode(',', $this->getColumns());
        $this->sql = "select $columns from " . $this->getTableName();

        return $this;
    }

    /**
     * @return array
     */
    public function getColumns()
    {
        $db = new DB();
        $sql = "show columns from {$this->getTableName()};";
        $results = $db->query($sql);
        foreach ($results as $result) {
            $this->columns[] = $result['Field'];
        }
        return $this->columns;
    }

    /**
     * @param array $params
     *the array must be of the form ['table field name' => 'ASC' or 'DESC']
     * @return $this
     */
    public function sort(array $params = [])
    {
        $sortParams = '';
        foreach ($params as $key => $param) {
            $sortParams .= "`$key` $param, ";
        }
        $sortParams = rtrim($sortParams, ", ");

        $this->sql .= " order by $sortParams";

        return $this;
    }

    /**
     * @param $params
     */
    public function filter($params)
    {
        /*
          TODO
         */
        return $this;
    }

    /**
     * @return $this
     */
    public function getCollection()
    {
        $db = new DB();
        $this->sql .= ";";
        $this->collection = $db->query($this->sql, $this->params);
        return $this;
    }

    /**
     * @return mixed
     */
    public function select()
    {
        return $this->collection;
    }

    /**
     * @return array|null
     */
    public function selectFirst(): ?array
    {
        return $this->collection[0] ?? null;
    }

    /**
     * Оновлює запис по id
     *
     * @param string $id
     * @param array $values
     * @return bool
     */
    public function updateItem(string $id, array $values) :bool
    {
        $value = $this->getUnnamedParametersForUpdate($values);
        $value['item_parameters'][] = $id;
        $sql = "UPDATE {$this->getTableName()} SET {$value['unnamed_parameters']} WHERE id = ?";
        $db = new DB();
        $result = $db->query($sql, $value['item_parameters']);

        return true;

    }

    /**
     * Створює запис
     *
     * @param array $values
     * @return bool
     */
    public function addItem(array $values) :bool
    {
        $value = $this->getUnnamedParametersForCreate($values);
        $sql = "INSERT INTO {$this->getTableName()} ({$value['param_value']}) VALUES ({$value['param_unnamed']})";
        $db = new DB();
        $result = $db->query($sql, $value['item_parameters']);

        return true;

    }

    public function deleteItem(string $id){
        $sql = "DELETE FROM {$this->getTableName()} WHERE id = ?;";
        $db = new DB();
        $params = [$id];
        $result = $db->query($sql,$params);

        return true;
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function getItem($id): ?array
    {
        $sql = "select * from {$this->getTableName()} where $this->idColumn = ?;";
        $db = new DB();
        $params = [$id];
        return $db->query($sql, $params)[0] ?? null;
    }

    /**
     * @return array
     */
    public function getPostValues()
    {
        $values = [];
        $columns = $this->getColumns();
        foreach ($columns as $column) {

            $column_value = filter_input(INPUT_POST, $column);
            if ($column_value && $column !== $this->idColumn) {
                $values[$column] = $column_value;
            }
        }
        return $values;
    }

    /**
     * @return string
     */
    public function getTableName(): string
    {
        return $this->tableName;
    }

    public function getPrimaryKeyName(): string
    {
        return $this->idColumn;
    }

    public function getId(): ?int
    {
        $conection = new DB();
        $db = $conection->getConnection();
        $id = (int) $db->lastInsertId();

        return $id;
    }

    /**
     * Створює масив неіменованих параметрів для оновлення даних
     *
     * @param array $values
     * ['name_columns' => $value];
     * @return array
     * (['unnamed_parameters' => parameters, 'item_parameters' => item])
     */
    protected function getUnnamedParametersForUpdate(array $values): array
    {
        $item = [];
        $params = '';
        foreach ($values as $key => $value) {

            $item[] = $value;
            $params .= "$key = ?, ";
        }

        $params = rtrim($params, ", ");

        $result['unnamed_parameters'] = $params;
        $result['item_parameters'] = $item;
        ;
        return $result;

    }

    /**
     * Створює масив неіменованих параметрів для створення даних
     *
     * @param array $values
     * @return array
     *  * (['param_value' => value, 'param_unnamed' => value, item_parameters => value])
     */
    protected function getUnnamedParametersForCreate(array $values): array
    {
        $item = [];
        $paramValue = '';
        $paramUnnamed = '';
        foreach ($values as $key => $value) {

            $item[] = $value;
            $paramValue .= "$key, ";
            $paramUnnamed .= ":$key, ";

        }

        $paramValue = rtrim($paramValue, ", ");
        $paramUnnamed = rtrim($paramUnnamed, ", ");

        $result['param_value'] = $paramValue;
        $result['param_unnamed'] = $paramUnnamed;
        $result['item_parameters'] = $item;

        return $result;

    }



}
