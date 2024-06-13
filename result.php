<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KNN Results</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Results</h1>
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3">
                <?php
                if (isset($_GET['filename']) && isset($_GET['modelfile']) && isset($_GET['scalerfile'])) {
                    $filename = $_GET['filename'];
                    $modelfile = $_GET['modelfile'];
                    $scalerfile = $_GET['scalerfile'];
                    $hasil = shell_exec("python3 resulthasil.py " . escapeshellarg("uploads/" . $filename) . " " . escapeshellarg("model/" . $modelfile) . " " . escapeshellarg("scaler/" . $scalerfile) . " 2>&1");
                    // $output = shell_exec("python3 resultprediction.py " . escapeshellarg("uploads/" . $filename) . " " . escapeshellarg("model/" . $modelfile) . " " . escapeshellarg("scaler/" . $scalerfile) . " 2>&1");
                    // echo "<pre>$output</pre>";
                    
                } else {
                    echo "No filename, model file, or scaler file provided.";
                }
                ?>
                <a href="hasil/hasil.csv" class="btn btn-success btn-block" download>Download Result</a>
                <br>
                <br>
                <?php
                echo "<pre>$hasil</pre>";
                ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
