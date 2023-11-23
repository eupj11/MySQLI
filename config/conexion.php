<?php

    class Conexion{

        function conectar_con_la_BD(){


            $conexion = mysqli_connect("localhost","root","","crud_mysql");
            
            
            return $conexion;

        }


        function cerrar_conexion($conexion){
            mysqli_close($conexion);
        }


    

}



?>