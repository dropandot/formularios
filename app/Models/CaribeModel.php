<?php
class CaribeModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPaisesCaribe()
    {
        $sql = "Select * from paises where etiqueta = 'caribe' order by id asc";
        $request = $this->select_all($sql);
        return $request;
    }

    public function getPaisesMexico()
    {
        $sql = "Select * from paises where etiqueta = 'mexico' order by id asc";
        $request = $this->select_all($sql);
        return $request;
    }

    public function getDestinosCaribe()
    {
        $sql = "select pd.nombre as 'pais', d.descripcion, d.imagen from destinos d ";
        $sql .= "inner join paises pd on pd.id = d.pais_id ";
        $sql .= "where d.etiqueta = 'caribe';";
        $request = $this->select_all($sql);
        return $request;
    }
    public function getDestinosMexico()
    {
        $sql = "select pd.nombre as 'pais', d.descripcion, d.imagen from destinos d ";
        $sql .= "inner join paises pd on pd.id = d.pais_id ";
        $sql .= "where d.etiqueta = 'mexico';";
        $request = $this->select_all($sql);
        return $request;
    }

    public function setRol(string $nombre, string $descripcion)
    {
        $query_insert = "insert into roles (nombre, descripcion, created_at) values ('$nombre', '$descripcion', now()) ";
        $arrData = array($nombre, $descripcion);
        $request_insert = $this->insert($query_insert, $arrData);
        return $request_insert;
    }
    public function getRol($id)
    {
        $sql = "Select * from roles where id = $id";
        $request = $this->select($sql);
        return $request;
    }
    public function updateRol(int $id, string $nombre, string $descripcion)
    {
        $sql = "update roles set nombre = ?, descripcion = ? where id = $id";
        $arrData = array($nombre, $descripcion);
        $request = $this->update($sql, $arrData);
        return $request;
    }

    public function getRoles()
    {
        $sql = "Select * from roles where id";
        $request = $this->select_all($sql);
        return $request;
    }

    public function deleteRol()
    {
    }
}
