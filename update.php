<?php
include('connection.php');


$newLat = $_POST['latitude'];
$newLng = $_POST['longitude'];
$lng = $_POST['initialLongitude'];
$lat = $_POST['initialLatitude'];
$newNama = $_POST['nama'];
$newDeskripsi = $_POST['deskripsi'];
$newPulau = $_POST['pulau'];
$newNo_rmh = $_POST['no_rmh'];
$newAlamat = $_POST['alamat'];

$sql = "UPDATE poi SET latitude = :newLat, longitude = :newLng";

if (!empty($newNama)) {
    $sql .= ", nama = :nama";
}

if (!empty($newDeskripsi)) {
    $sql .= ", deskripsi = :deskripsi";
}

if (!empty($newPulau)) {
    $sql .= ", pulau = :pulau";
}

if (!empty($newNo_rmh)) {
    $sql .= ", no_rmh = :no_rmh";
}

if (!empty($newAlamat)) {
    $sql .= ", alamat = :alamat";
}


$sql .= " WHERE latitude = :lat AND longitude = :lng";

$stmt = $db->prepare($sql);
$stmt->bindParam(':lat', $lat);
$stmt->bindParam(':lng', $lng);
$stmt->bindParam(':newLng', $newLng);
$stmt->bindParam(':newLat', $newLat);
if (!empty($newNama)) {
    $stmt->bindParam(':nama', $newNama);
}
if (!empty($newDeskripsi)) {
    $stmt->bindParam(':deskripsi', $newDeskripsi);
}
if (!empty($newPulau)) {
    $stmt->bindParam(':pulau', $newPulau);
}
if (!empty($newNo_rmh)) {
    $stmt->bindParam(':no_rmh', $newNo_rmh);
}
if (!empty($newAlamat)) {
    $stmt->bindParam(':alamat', $newAlamat);
}

$response = array();
if ($stmt->execute()) {
    $response['status'] = 'success';
    $response['message'] = 'Data berhasil diperbarui';
    $response['data'] = $_POST;
} else {
    $response['status'] = 'error';
    $response['message'] = 'Gagal memperbarui data';
}

header('Content-Type: application/json');
echo json_encode($response);

