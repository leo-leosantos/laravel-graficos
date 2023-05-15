<?php

namespace App\Repositories\Core;

//use DB;

use Illuminate\Database\DatabaseManager as DB;
use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Exceptions\PropertyTableNotExists;

class BaseQueryBuilderRepository implements RepositoryInterface
{
    protected $tb;
    protected  $db;
    protected  $orderBy = [
        'column' => 'id',
        'order' => 'DESC'
    ];
    public function __construct(DB $db)
    {
        $this->tb = $this->resolveTable();
        $this->db = $db;
    }

    public function getAll()
    {
        return $this->db
            ->table($this->tb)
            ->orderBy($this->orderBy['column'], $this->orderBy['order'])
            ->get();
    }
    public function findById($id)
    {
        return $this->db->table($this->tb)->find($id);
    }
    public function findWhere($column, $valor)
    {
        return $this->db->table($this->tb)
                        ->where($column, $valor)
                        ->orderBy($this->orderBy['column'], $this->orderBy['order'])
                        ->get();
    }
    public function findWhereFirst($column, $valor)
    {
        return $this->db->table($this->tb)->where($column, $valor)->first();
    }
    public function paginate($totalPage = 10)
    {
        return $this->db
            ->table($this->tb)
            ->orderBy($this->orderBy['column'], $this->orderBy['order'])
            ->paginate($totalPage);
    }
    public function store(array $data)
    {
        return $this->db->table($this->tb)->insert($data);
    }
    public function update(int $id, array $data)
    {
        return $this->db->table($this->tb)->where('id', $id)
            ->update($data);
    }
    public function delete($id)
    {
        return $this->db->table($this->tb)->where('id', $id)
            ->delete($id);
    }


    public function resolveTable()
    {
        if (!property_exists($this, 'table')) {
            throw new PropertyTableNotExists("propriedade table nao encontrada");
        }
        return $this->table;
    }
    public function orderBy($column, $order = 'DESC')
    {
        $this->orderBy = [
            'column' => $column,
            'order' => $order
        ];
        $this->orderBy['column'] = $column;
        $this->orderBy['order'] = $order;

        return  $this;
    }
}
