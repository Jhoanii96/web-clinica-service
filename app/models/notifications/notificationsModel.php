<?php

class notificationModel extends Model{
 
  public function showNotifications($idUser){
    $query = "SELECT me.Titulo,me.Descripcion FROM mensaje_usuario meu INNER JOIN mensaje me ON meu.Id_Mensaje = me.Id_Mensaje WHERE meu.Id_Usuario = $idUser ORDER BY meu.Fecha desc";
    return Model::query_execute($query);
  }
}
?>