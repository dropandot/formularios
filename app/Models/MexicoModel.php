<?php
class MexicoModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getPaisesMexico()
    {
        $sql = "Select * from paises where etiqueta = 'mexico' order by id asc";
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
}
