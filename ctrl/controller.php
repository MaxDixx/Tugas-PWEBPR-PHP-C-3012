<?php
require_once 'ctrl/conn.php';

function sanitizeInput($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

function insertGuru($nama_guru, $foto_guru, $mata_pelajaran, $wali_kelas, $nohp) {
    global $con;
    $stmt = mysqli_prepare($con, "INSERT INTO data_guru (nama_guru, foto_guru, mata_pelajaran, wali_kelas, nohp)
                            VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssss", $nama_guru, $foto_guru, $mata_pelajaran, $wali_kelas, $nohp);
    return mysqli_stmt_execute($stmt);
}

function updateGuru($id_guru, $nama_guru, $foto_guru, $mata_pelajaran, $wali_kelas, $nohp) {
    global $con;
    $stmt = mysqli_prepare($con, "UPDATE data_guru SET nama_guru=?, foto_guru=?, mata_pelajaran=?, wali_kelas=?, nohp=?
                            WHERE id_guru=?");
    mysqli_stmt_bind_param($stmt, "ssssss", $nama_guru, $foto_guru, $mata_pelajaran, $wali_kelas, $nohp, $id_guru);
    return mysqli_stmt_execute($stmt);
}

function deleteGuru($id_guru) {
    global $con;
    $stmt = mysqli_prepare($con, "DELETE FROM data_guru WHERE id_guru=?");
    mysqli_stmt_bind_param($stmt, "s", $id_guru);
    return mysqli_stmt_execute($stmt);
}

function uploadFoto($uploadDirectory, $file) {
    $target_file = $uploadDirectory . basename($file["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        return false;
    }
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        return $target_file;
    } else {
        return false;
    }
}

$sql = "SELECT * FROM data_guru";
$result = mysqli_query($con, $sql);

$id_guru = "";
$nama_guru = "";
$foto_guru = "";
$mata_pelajaran = "";
$wali_kelas = "";
$nohp = "";
$foto_guru = "";
$submit = isset($_POST['submit'])? $_POST['submit'] : '';
$uploadDirectory = 'C:/laragon/www/ANGKASA RAYA/fotoguru/';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $submit = sanitizeInput($_POST['submit']);
        $id_guru = sanitizeInput($_POST['id_guru']);
        $nama_guru = sanitizeInput($_POST['nama_guru']);
        $mata_pelajaran = sanitizeInput($_POST['mata_pelajaran']);
        $wali_kelas = sanitizeInput($_POST['wali_kelas']);
        $nohp = sanitizeInput($_POST['nohp']);
        if ($submit == 'Simpan') {
            if (!empty($_FILES['foto_guru']['name'])) {
                $foto_guru = uploadFoto($uploadDirectory, $_FILES['foto_guru']);
                if ($foto_guru) {
                    insertGuru($nama_guru, $foto_guru, $mata_pelajaran, $wali_kelas, $nohp);
                } else {
                    echo "Error uploading file";
                }
            } else {
                echo "Foto tidak boleh kosong";
            }
        } elseif ($submit == 'Ubah') {
            if (!empty($_FILES['foto_guru']['name'])) {
                $foto_guru = uploadFoto($uploadDirectory, $_FILES['foto_guru']);
                if ($foto_guru) {
                    updateGuru($id_guru, $nama_guru, $foto_guru, $mata_pelajaran, $wali_kelas, $nohp);
                } else {
                    echo "Error uploading file";
                }
            } else {
                updateGuru($id_guru, $nama_guru, $foto_guru, $mata_pelajaran, $wali_kelas, $nohp);
            }
        } elseif ($submit == 'Hapus') {
            deleteGuru($id_guru);
        }
    }
}
?>