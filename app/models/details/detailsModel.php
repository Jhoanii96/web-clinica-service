<?php

class detailsModel extends Model
{

    /* ----------------------------- CONSULTAS DE PERFIL ----------------------------- */

    
    public function mostrar_detalle_historial($cod_history, $username)
    {
        $query = "CALL mostrar_detalle_historial($cod_history, '$username');";
        $res = Model::query_execute($query);
        return $res;
    }

    public function mostrar_archivo_historial($cod_history, $username)
    {
        $query = "CALL mostrar_archivo_historial($cod_history, '$username');";
        $res = Model::query_execute($query);
        return $res;
    }
}
