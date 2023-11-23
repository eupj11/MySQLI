<?php

    include_once("config/conexion.php");

    class CRUD {

        function insertar($nombre,$email){

            $conexion = new Conexion();
            $myConn = $conexion->conectar_con_la_BD();

            $sql = "INSERT INTO usuarios (usuario_nombre,usuario_email) VALUES ('$nombre','$email')";

            $resultado = mysqli_query($myConn,$sql);

            if($resultado){
                echo "Insertado";
            }else{
                echo "No insertado";
            }

            mysqli_close($myConn);


        }




        function mostrar_registro($id){

            $conexion = new Conexion();
            $myConn = $conexion->conectar_con_la_BD();

            $sql = "SELECT * FROM usuarios WHERE usuario_id = $id";

            $resultado = mysqli_query($myConn,$sql);

            while($fila = mysqli_fetch_array($resultado)){
                echo $fila['usuario_nombre'].", ".$fila['usuario_fecha_creacion'];
            }

            $conexion->cerrar_conexion($myConn);
            
        }

        function mostrarTodo(){

            $conexion = new Conexion();
            $myConn = $conexion->conectar_con_la_BD();

            $sql = "SELECT * FROM usuarios";

            $resultado = mysqli_query($myConn,$sql);

            while($fila = mysqli_fetch_array($resultado)){
                echo $fila['usuario_nombre'].", ".$fila['usuario_fecha_creacion']."<br>";
            }

            $conexion->cerrar_conexion($myConn);

        }

        function actualizar($id,$nombre,$email){

            $conexion = new Conexion();


            $sql ="UPDATE usuarios SET usuario_nombre = '".$nombre."', usuario_email = '".$email."' WHERE usuario_id = '".$id."'";

            $resultado = mysqli_query($conexion->conectar_con_la_BD(),$sql);

            if($resultado){
                echo "Actualizado";
            }else{
                echo "No actualizado";
            }

            $conexion->cerrar_conexion($conexion->conectar_con_la_BD());

        }


        function borrar($id){

            $conexion = new Conexion();

            $sql = "DELETE FROM usuarios WHERE usuario_id = $id";

            $resultado = mysqli_query($conexion->conectar_con_la_BD(),$sql);

            if($resultado){
                echo "Borrado";
            }else{
                echo "No borrado";
            }

            $conexion->cerrar_conexion($conexion->conectar_con_la_BD());


        }



    }

    $crud = new CRUD();
    //$crud->insertar("Juan","juanito@gmail.com");
    $crud->borrar(3);
    $crud->actualizar(1,"Juana","juana@gmail.com");
    echo "<b>Mostrar uno: </b><br>";
    $crud->mostrar_registro(1);
    echo "<br><br><br><b>Mostrar todo: </b><br>";
    $crud->mostrarTodo();

?>