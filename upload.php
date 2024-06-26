<?php
$upload_dir = 'uploads/';
$model_dir = 'model/';
$scaler_dir = 'scaler/';

if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}
if (!is_dir($model_dir)) {
    mkdir($model_dir, 0777, true);
}
if (!is_dir($scaler_dir)) {
    mkdir($scaler_dir, 0777, true);
}

$file_success = false;
$model_success = false;
$scaler_success = false;

$uploaded_file = '';
$model_file = '';
$scaler_file = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
        $uploaded_file = $upload_dir . basename($_FILES['file']['name']);
        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploaded_file)) {
            $file_success = true;
        } else {
            $file_success = false;
        }
    }

    if (isset($_FILES['model']) && $_FILES['model']['error'] == UPLOAD_ERR_OK) {
        $model_file = $model_dir . basename($_FILES['model']['name']);
        if (move_uploaded_file($_FILES['model']['tmp_name'], $model_file)) {
            $model_success = true;
        } else {
            $model_success = false;
        }
    }

    if (isset($_FILES['scaler']) && $_FILES['scaler']['error'] == UPLOAD_ERR_OK) {
        $scaler_file = $scaler_dir . basename($_FILES['scaler']['name']);
        if (move_uploaded_file($_FILES['scaler']['tmp_name'], $scaler_file)) {
            $scaler_success = true;
        } else {
            $scaler_success = false;
        }
    }

    if ($file_success && $model_success && $scaler_success) {
        header("Location: index.html?filename=" . urlencode(basename($_FILES['file']['name'])) . "&modelfile=" . urlencode(basename($_FILES['model']['name'])) . "&scalerfile=" . urlencode(basename($_FILES['scaler']['name'])));
        exit();
    } else {
        echo 'File upload error.';
    }
} else {
    echo 'Invalid request method.';
}
?>
