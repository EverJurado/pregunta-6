<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <!-- Bootstrap 4 CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- Fontawesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <!-- Custom styles -->
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Inicio de Sesion</h3>
            </div>
            <div class="card-body">
                <form action="validarSESION.php" method="POST">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="Contraseña" name="contrasena" required>
                    </div>
                    <div class="row align-items-center remember">
                        <input type="checkbox">Recuerdame
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Iniciar" class="btn float-right login_btn">
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    No tienes una Cuenta?<a href="Registro.php">Registrate</a>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="#">Olvidaste la Contraseña?</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
