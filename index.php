<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>724 Media</title>

        <!-- Bootstrap Core CSS -->
        <link href="resources/assets/libs/startmin-master/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="resources/assets/libs/startmin-master/css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="resources/assets/libs/startmin-master/css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="resources/assets/libs/startmin-master/css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="resources/assets/libs/startmin-master/css/morris.css" rel="stylesheet">
        <link href="css/user.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="resources/assets/libs/startmin-master/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">724Media</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Sidebar -->
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">

                        <ul class="nav" id="side-menu">
                            
                            <li>
                                <a href="index.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="index.php">Usuarios</a>        
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Usuarios</h1>
                        </div>
                    </div>

                    <div id="contenido">
        	             <div class="pull-right">
                             <input id="btn_usuarios" type="button" class="btn btn-primary" value="Nuevo Usuario"/>
                        </div>
                        <br/><br/>
        	            <div class="panel panel-primary">
        	                <div class="panel-heading">
        	                    <h3 class="panel-title">Lista de Usuarios</h3>
        	                </div>
        	                <div class="panel-body">
        	                    <table class="table">
          							<thead class="thead-inverse">
        		                        <th>#</th>
        		                        <th>ID Usuario</th>
        		                        <th>Nombre</th>
                                        <th>Apellido</th>
        		                        <th>Email</th>
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
        	                                echo '<td>' . $row['email'] . '</td>';
        	                                echo '<td>' . $row['image'] . '</td>';
        	                                echo '<td><button class="btn btn-info" onclick="editar(' . $row['id_user'] . ')">Editar</button></td>';
        	                                echo '<td><button class="btn btn-danger" onclick="eliminar(' . $row['id_user'] . ', this)">Eliminar</button></td>';
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
                </div>
            </div>
        </div>

    <!-- jQuery -->
    <script src="js/jquery-3.1.1.js" type="text/javascript"></script>
    <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="http://malsup.github.io/jquery.form.js"></script>

    <!-- Js list users -->
    <script src="js/list_user.js" type="text/javascript"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="resources/assets/libs/startmin-master/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="resources/assets/libs/startmin-master/js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="resources/assets/libs/startmin-master/js/startmin.js"></script>

    </body>
</html>
