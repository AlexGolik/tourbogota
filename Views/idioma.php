<?php
require_once '../Model/Roles.php';
$roles = Roles::mostrar();

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['../assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/azzara.min.css">
</head>
<body class="login">
    
<div class="wrapper wrapper-login">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Registrar Usuarios</div>
                </div>
                <form action="../Controller/controller-persona.php" method="POST">
                    <div class="card-body">
                        <div class="form-group form-floating-label">
                            <input id="nombres" name="nombre" type="text" class="form-control input-border-bottom" required>
                            <label for="nombres" class="placeholder">Nombres</label>
                        </div>
                        <div class="form-group form-floating-label">
                            <input id="apellidos" name="nivel" type="text" class="form-control input-border-bottom" required>
                            <label for="apellidos" class="placeholder">Apellidos</label>
                        </div>
                        <div class="form-group form-floating-label">
                            <input id="nacionalidad" name="persona_idpersona" type="text" class="form-control input-border-bottom" required>
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
	<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>
	<script src="../assets/js/ready.js"></script>
</body>
</html>