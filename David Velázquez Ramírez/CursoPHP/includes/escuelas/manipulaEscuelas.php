<?php

    include_once '/xampp/htdocs/CursoPHP/includes/db.php';

    class manipulaEscuelas extends DB
    {
        /*private IDEscuela;
        private IDUsuario;
        private NombreEscuela;*/

        public function consultaEscuela($idusuario)
        {
            $arrayData = $query = $this->connect()->prepare('SELECT IDEscuela, NombreEscuela FROM escuelas WHERE IDUsuario = :idusuario');
            $arrayData = $query->execute(['idusuario' => $idusuario]);

            $arrayData = $query->fetchAll();

            return $arrayData;
        }

    }
