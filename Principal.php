<?php
include 'components/sql.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sede = "SELECT id_Sede FROM Asesoria GROUP BY id_Sede";
$result_sede = $conn->query($sede);

$asesor = "SELECT Nombre FROM Asesor";
$result_asesor = $conn->query($asesor);

$categoria = "SELECT Nombre FROM Categoria";
$result_categoria = $conn->query($categoria);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proyecto-Examen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="contenedor d-flex flex-column">
        <h1>Busqueda</h1>
        <div class="input-group mb-3">
            <span class="input-group-text">Sede: </span>
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownSedeButton" data-bs-toggle="dropdown" aria-expanded="false">
                Todas las sedes
            </button>
            <ul class="dropdown-menu">
                <?php
                if ($result_sede->num_rows > 0) {
                    while ($row = $result_sede->fetch_assoc()) {
                        echo "<li><button class='dropdown-item' type='button' onclick='selectOption(\"" . $row["id_Sede"] . "\", \"dropdownSedeButton\")'>" . $row["id_Sede"] . "</button></li>";
                    }
                } else {
                    echo "<li><button class='dropdown-item' type='button'>No hay sedes disponibles</button></li>";
                }
                ?>
            </ul>
        </div>

        <div class="d-flex gap-3">
            <div class="input-group mb-3">
                <span class="input-group-text">Inicio: </span>
                <input type="date" class="form-control">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Fin: </span>
                <input type="date" class="form-control">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Talent:</span>
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownTalentButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Seleccione un miembro
                </button>
                <ul class="dropdown-menu">
                    <?php
                    if ($result_asesor->num_rows > 0) {
                        while ($row = $result_asesor->fetch_assoc()) {
                            echo "<li><button class='dropdown-item' type='button' onclick='selectOption(\"" . $row["Nombre"] . "\", \"dropdownTalentButton\")'>" . $row["Nombre"] . "</button></li>";
                        }
                    } else {
                        echo "<li><button class='dropdown-item' type='button'>No hay sedes disponibles</button></li>";
                    }
                    ?>
                </ul>
            </div>
            <div>
                <input class="btn btn-primary" type="submit" value="Limpiar">
            </div> 
        </div>

        <div class="d-flex gap-3">
            <div class="input-group mb-3">
                <span class="input-group-text">Categoría:</span>
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownCategoryButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Seleccione una categoría
                </button>
                <ul class="dropdown-menu">
                    <?php
                    if ($result_categoria->num_rows > 0) {
                        while ($row = $result_categoria->fetch_assoc()) {
                            echo "<li><button class='dropdown-item' type='button' onclick='selectOption(\"" . $row["Nombre"] . "\", \"dropdownCategoryButton\")'>" . $row["Nombre"] . "</button></li>";
                        }
                    } else {
                        echo "<li><button class='dropdown-item' type='button'>No hay categorías disponibles</button></li>";
                    }
                    ?>
                </ul>
            </div>
            <div>
                <input class="btn btn-primary" type="submit" value="Buscar">
            </div> 
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/Botones.js"></script>
</body>
</html>

