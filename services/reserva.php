<?php 
class Reserva{
  public $id_reserva;
  public $fecha;
  public $hora;
  public $num_personas;
  public $nombre_cliente;
  public $telf_cliente;
  public $id_mesa;
 public function __construct($id,$fecha,$hora,$num_personas,$nombre_cliente,$telf_cliente,$id_mesa){
    $this->id_reserva=$id;
    $this->fecha=$fecha;
    $this->hora=$hora;
    $this->num_personas=$num_personas;
    $this->nombre_cliente=$nombre_cliente;
    $this->telf_cliente=$telf_cliente;
    $this->id_mesa=$id_mesa;
 }

}