<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function cliente(){
        $this->db = \Config\Database::connect();
        $query =  $this->db->query('SELECT id_cliente, numero_factura, nombres_cliente, direccion, telefono FROM cliente');
        $results = $query->getResult();
        return $this-> response->setJSON($results);            
        }
        public function factura(){
            $this->db = \Config\Database::connect();
            $query =  $this->db->query('SELECT * FROM factura');
            $results = $query->getResult();
            return $this-> response->setJSON($results);            
            }
        public function mayor25(){
            $this->db = \Config\Database::connect();
         $query =  $this->db->query('SELECT c.ID_Cliente, c.Nombres_Cliente, c.Direccion, c.Telefono, c.Correo_Electronico FROM CLIENTE c JOIN FACTURA f ON c.Numero_Factura = f.Numero_Factura GROUP BY
        c.ID_Cliente, c.Nombres_Cliente, c.Direccion, c.Telefono, c.Correo_Electronico HAVING SUM(f.Precio * f.Cantidad) > 25;');
         $results = $query->getResult();
         return $this-> response->setJSON($results);
    }
    public function insertar($id_cliente,$numero_factura,$nombres_cliente,$direccion,$telefono,$correo_electronico,$sexo,$estado_civil){
     $this->db = \Config\Database::connect();
     $query =  $this->db->query("INSERT INTO cliente (id_cliente,numero_factura,nombres_cliente,direccion,telefono,correo_electronico,sexo,estado_civil) VALUES ($id_cliente,$numero_factura,'$nombres_cliente','$direccion','$telefono','$correo_electronico','$sexo','$estado_civil')");
     if ($query) return $this-> response->setJSON($results); 
     else return $this-> response->setJSON($error); 
}
}
