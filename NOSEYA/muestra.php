


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/templatemo-style.css">
    <link rel="shortcut icon" href="../img/logob.png">
    <title>Home</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        .tm-footer {
            margin-top: auto;
        }
    </style>
</head>
<body >

    
    
    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row tm-mb-90 tm-gallery">
            <center>
                <h1> Informacion a cargar </h1>
            </center>   

            <?php
			
					// Check if the form was submitted
					if ($_SERVER["REQUEST_METHOD"] == "POST") {

					    // Check if a file was uploaded
					    if (isset($_FILES["csvFile"]) && $_FILES["csvFile"]["error"] == 0) {

					        // Get the uploaded file
					        $uploadedFile = $_FILES["csvFile"]["tmp_name"];

					        // Read the CSV file
					        $csvData = array_map('str_getcsv', file($uploadedFile));

					        

					        // Add button to go to the next tab (insert.php)
					        echo '<form action="agrega.php" method="post" target="_blank">';
								echo  "<div class='d-grid gap-2 d-md-flex justify-content-md-end'>";
									echo '<input type="hidden"  name="csvData" value="'.htmlspecialchars(json_encode($csvData)).'">';
									echo '<input type="submit" class="btn btn-success" value="Cargar">';
									echo "<a href='index.php' class='btn btn-danger'>No cargar</a> ";
								echo "</div>";
					        echo '</form>';

					    } else {
					        echo "Error uploading file.";
					    }

					} else {
					    echo "Invalid request.";
					}
				?>
            

            <div class="table-responsive">
            <table class="table table-striped ">
                
                <?php
				//header('Content-Type: text/html; charset=UTF-8');
					// Check if the form was submitted
					if ($_SERVER["REQUEST_METHOD"] == "POST") {

					    // Check if a file was uploaded
					    if (isset($_FILES["csvFile"]) && $_FILES["csvFile"]["error"] == 0) {

					        $uploadedFile = $_FILES["csvFile"]["tmp_name"];

							// Read the CSV file
							//$csvData = array_map('str_getcsv', file($uploadedFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES, null, 'UTF-8'));

							$csvData = array_map('str_getcsv', file($uploadedFile));

							// Variable de control para omitir la primera fila
							$firstRow = true;

							foreach ($csvData as $row) {
							    // Si es la primera fila, muéstrala sin procesar
							    if ($firstRow) {
							    	echo "<thead>";
										echo "<td class='table-dark text-center'>".$row[1]."</td>";
										echo "<td class='table-dark text-center'>".$row[3]."</td>";
			                            echo "<td class='table-dark text-center'>".$row[2]."</td>";
			                            echo "<td class='table-dark text-center'>".$row[4]."</td>";
			                            echo "<td class='table-dark text-center'>".$row[5]."</td>";
										echo "<td class='table-dark text-center'>contra 1</td>";
										echo "<td class='table-dark text-center'>contra 2</td>";
										echo "<td class='table-dark text-center'>categoria</td>";
										echo "<td class='table-dark text-center'>cambio contraseña</td>";
			                            echo "<td class='table-dark text-center'>".$row[0]."</td>";
			                            echo "<td class='table-dark text-center'>Rol</td>";
			                        echo "</thead>";
							        $firstRow = false;
							    } else {
							    	echo "<tbody>";
							        echo "<tr>";
							        //foreach ($row as $cell) {
							            echo "<td class='text-center'>".$row[1]."</td>";
			                            echo "<td class='text-center'>".$row[3]."</td>";
			                            echo "<td class='text-center'>".$row[2]."</td>";
			                            echo "<td class='text-center'>".$row[4]."</td>";
			                            echo "<td class='text-center'>".$row[5]."</td>";
			                            echo "<td class='text-center'>COBACH2023</td>";
										echo "<td class='text-center'>COBACH2023</td>";
										echo "<td class='text-center'></td>";
										echo "<td class='text-center'>0</td>";
										echo "<td class='text-center'>".$row[0]."</td>";
										echo "<td class='text-center'>2</td>";
							        //}
							        echo "</tr>";
							        echo "</tbody>";
							    }
							}

					    } else {
					        echo "Error uploading file.";
					    }

					} else {
					    echo "Invalid request.";
					}
				?>
                <tbody>

                </tbody>
            </table>
            <?php
				// Check if the form was submitted
				if ($_SERVER["REQUEST_METHOD"] == "POST") {

				    // Check if a file was uploaded
				    if (isset($_FILES["csvFile"]) && $_FILES["csvFile"]["error"] == 0) {

				        // Get the uploaded file
				        $uploadedFile = $_FILES["csvFile"]["tmp_name"];

				        // Read the CSV file
				        $csvData = array_map('str_getcsv', file($uploadedFile));

				        

				        // Add button to go to the next tab (insert.php)
				        echo '<form action="agrega.php" method="post" target="_blank">';
				        echo  "<div class='d-grid gap-2 d-md-flex justify-content-md-center'>";
				        echo '<input type="hidden"  name="csvData" value="'.htmlspecialchars(json_encode($csvData)).'">';
				        echo '<input type="submit" class="btn btn-success" value="Cargar">';
				        echo "<a href='index.php' class='btn btn-danger'>No cargar</a> ";
				        echo "</div>";
				        echo '</form>';

				    } else {
				        echo "Error uploading file.";
				    }

				} else {
				    echo "Invalid request.";
				}
			?>
            
        </div>
        </div>
        <div id="result"></div>
        
    </div>

    <footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
        <div class="row">
            <center>
                <div class="col-lg-8 col-md-7 col-12 px-5 mb-3">
                    Copyright © 2023 Colegio de Bachilleres del Estado de Chihuahua
                </div>
            </center>
        </div>
    </footer>

    <script src="../js/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
        
    </script>
    <script type="text/javascript">
        var Entra = new Boolean(false);
        function myFunction() {
            var currentScrollPos = window.pageYOffset;

            if(currentScrollPos === 0 && Entra == false) {
                document.getElementById("navbarSupportedContent").style.backgroundColor = "#008474";
                Entra=Boolean(true);

            } else {
                document.getElementById("navbarSupportedContent").style.backgroundColor = 'transparent';
                Entra=Boolean(false);
            }
        } 
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js" integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  

</body>

</html>