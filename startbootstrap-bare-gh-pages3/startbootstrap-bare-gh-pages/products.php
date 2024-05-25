<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Products - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Page content-->
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Products Page</h2>
                <p class="text-center">Welcome to the products page!</p>
            </div>
        </div>
    </div>

    <!-- Display uploaded images with names -->
    <div class="container mt-5">
        <h3 class="text-center">Uploaded Images</h3>
        <div class="row justify-content-center">
            <?php
            // Path to the XML file
            $xmlFile = "database_xml/images.xml";

            // Check if the XML file exists
            if (file_exists($xmlFile)) {
                // Load the XML file
                $xml = simplexml_load_file($xmlFile);

                // Check if loading the XML file was successful
                if ($xml) {
                    // Loop through each image in the XML file and display it
                    foreach ($xml->image as $image) {
                        // Display the image using the img tag
                        echo "<div class='col-md-12'><img src='" . $image->path ."' class='img-fluid'></div>";
                        // Display the image name
                        echo "<div class='col-md-12 text-center'>" . "</div>";
                    }
                } else {
                    // Display an error message if the XML file cannot be loaded
                    echo "<div class='col-md-12'><p class='text-center'>Error loading XML file.</p></div>";
                }
            } else {
                // Display an error message if the XML file does not exist
                echo "<div class='col-md-12'><p class='text-center'>XML file does not exist.</p></div>";
            }
            ?>
        </div>
    </div>

    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
