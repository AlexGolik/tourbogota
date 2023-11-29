<?php
    require_once '../Model/Persona.php';
    $persona = Persona::mostrar();
?>
<?php
    require_once '../Model/Roles.php';
    $roles = Roles::mostrar();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Turismo - Bogotá</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
</head>
<body>
	<div class="wrapper">
		

        <?php include('../Views/menu/Navbar-header.php'); ?>

		<?php include('../Views/menu/sidebar.php'); ?>

        <!-- contenido dashboard -->
		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Dashboard - admin</h2>
								<h5 class="text-white op-7 mb-2">Bienvenido Admin Dashboard</h5>
							</div>
							<div class="ml-md-auto py-2 py-md-0">
								<a href="#" class="btn btn-white btn-border btn-round mr-2">Reportes</a>
								<a href="#" class="btn btn-secondary btn-round">Agregar Usuarios</a>
							</div>
						</div>
					</div>
				</div>
                <div class="page-inner mt--5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Row</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    Add Row
                                </button>
                            </div>
                        </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                            New</span> 
                                            <span class="fw-light">
                                                Row
                                            </span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="small">Create a new row using this form, make sure you fill them all</p>
                                        <div class="wrapper wrapper-login">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="card-title">Registrar Usuarios</div>
                                                        </div>
                                                            <form action="../Controller/controller-persona.php" method="POST">
                                                                <div class="card-body">
                                                                    <div class="form-group form-floating-label">
                                                                        <input id="nombres" name="nombres" type="text" class="form-control input-border-bottom" required>
                                                                        <label for="nombres" class="placeholder">Nombres</label>
                                                                    </div>
                                                                    <div class="form-group form-floating-label">
                                                                        <input id="apellidos" name="apellidos" type="text" class="form-control input-border-bottom" required>
                                                                        <label for="apellidos" class="placeholder">Apellidos</label>
                                                                    </div>
                                                                    <div class="form-group form-floating-label">
                                                                        <select class="form-control input-solid" id="genero" name="genero" required>
                                                                            <option value="">&nbsp;</option>
                                                                            <option value="masculino">Masculino</option>
                                                                            <option value="femenino">Femenino</option>
                                                                        </select>
                                                                        <label for="genero" class="placeholder">Género</label>
                                                                    </div>
                                                                    <div class="form-group form-floating-label">
                                                                        <input id="nacionalidad" name="nacionalidad" type="text" class="form-control input-border-bottom" required>
                                                                        <label for="nacionalidad" class="placeholder">Nacionalidad</label>
                                                                    </div>
                                                                    <div class="form-group form-floating-label">
                                                                        <input id="correo" name="correo" type="email" class="form-control input-border-bottom" required>
                                                                        <label for="correo" class="placeholder">Correo</label>
                                                                    </div>
                                                                    <div class="form-group form-floating-label">
                                                                        <input id="telefono" name="telefono" type="number" class="form-control input-border-bottom" required>
                                                                        <label for="telefono" class="placeholder">Teléfono</label>
                                                                    </div>
                                                                    <input type="text" id="estado_idestado" value="1" name="estado_idestado" hidden>
                                                                    <div class="form-group form-floating-label">
                                                                        <select class="form-control input-solid" id="Roles_idRoles" name="Roles_idRoles" required>
                                                                            <option value="">&nbsp;</option>
                                                                            <?php foreach ($roles as $item): ?>
                                                                            <option value="<?php echo $item['idRoles']; ?>"><?php echo $item['nombreRoles']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                        <label for="Roles_idRoles" class="placeholder">Roles</label>
                                                                    </div>
                                                                    
                                                                    <button class="btn btn-success" type="submit" value="Guardar">
                                                                                        <span class="btn-label">
                                                                                            <i class="fa fa-check"></i>
                                                                                        </span>
                                                                                        Guardar
                                                                                    </button>
                                                                    </div>
                                                            </form>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer no-bd">
                                        <button type="button" id="addRowButton" class="btn btn-primary">Add</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>nombre</th>
                                        <th>apellidos</th>
                                        <th>Rol</th>
                                        <th>nacionalidad</th>
                                        <th>correo</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>id</th>
                                        <th>nombre</th>
                                        <th>apellidos</th>
                                        <th>Rol</th>
                                        <th>nacionalidad</th>
                                        <th>correo</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($persona as $item): ?>
                                    <tr>
                                        <td><?php echo $item['idpersona']; ?></td>
                                        <td><?php echo $item['nombres']; ?></td>
                                        <td><?php echo $item['apellidos']; ?></td>
                                        <td><?php echo $item['nombreRoles']; ?></td>
                                        <td><?php echo $item['nacionalidad']; ?></td>
                                        <td><?php echo $item['correo']; ?></td>
                                        <td>
                                            <div class="form-button-action">
                                                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <footer class="footer">
                        <div class="container-fluid">
                            <nav class="pull-left">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="https://www.themekita.com">
                                            ThemeKita
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            Help
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            Licenses
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <div class="copyright ml-auto">
                                2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">ThemeKita</a>
                            </div>				
                        </div>
                    </footer>
		</div>
		
	</div>
	<!--   Core JS Files   -->
	<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="../assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="../assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="../assets/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../assets/js/setting-demo.js"></script>
	<script src="../assets/js/demo.js"></script>
	<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>
</body>
</html>