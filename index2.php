<html>
    <head>
        <meta charset="UTF-8">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>      
        <!-- Latest compiled and minified JavaScript -->
        <script src="js/jquery-3.1.1.js" type="text/javascript"></script>
        <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/list_user.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>        
        <div id="contenido" >
            
            <input id="btn_usuarios" type="button" class="btn btn-primary" value="Nuevo Usuario"/><br/><br/>
            
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Lista de Usuarios</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <th>#</th>
                        <th>ID Usuario</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Imagen</th>
                        <th>Editar</th>
                        <th>Eliminar</th>            
                        </thead>
                        <tbody>
                            <?php
                            require 'php/database.php';
                            $pdo = database::connect();
                            $sql = 'SELECT * FROM user';
                            $con = 1;
                            foreach ($pdo->query($sql) as $row) {
                                echo "<tr>";
                                echo '<td>' . $con . '</td>';
                                echo '<td>' . $row['id_user'] . '</td>';
                                echo '<td>' . $row['name'] . '</td>';
                                echo '<td>' . $row['last_name'] . '</td>';
                                echo '<td>' . $row['image'] . '</td>';
                                echo '<td><button class="btn btn-primary" onclick="editar(' . $row['id_user'] . ')">Editar</button></td>';
                                echo '<td><button class="btn btn-primary" onclick="eliminar(' . $row['id_user'] . ', this)">Eliminar</button></td>';
                                echo '</tr>';
                                $con++;
                            }
                            database::disconnect();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>