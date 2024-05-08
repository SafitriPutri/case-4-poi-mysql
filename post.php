<?php
include('connection.php');

  $data = $_POST;
  $nama = $data['nama'];
  $deskripsi = $data['deskripsi'];
  $pulau = $data['pulau'];
  $latitude = $data['latitude'];
  $longitude = $data['longitude'];
  $pulau = $data['pulau'];
  $no_rmh = $data['no_rmh'];
  $alamat = $data['alamat'];

  $sql = "INSERT INTO poi (nama, deskripsi,latitude,longitude, pulau, no_rmh, alamat) VALUES (:nama, :deskripsi,:latitude,:longitude, :pulau, :no_rmh, :alamat)";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':nama', $nama);
  $stmt->bindParam(':deskripsi', $deskripsi);
  $stmt->bindParam(':pulau', $pulau);
  $stmt->bindParam(':no_rmh', $no_rmh);
  $stmt->bindParam(':latitude', $latitude);
  $stmt->bindParam(':longitude', $longitude);
  $stmt->bindParam(':alamat', $alamat);
  $stmt->execute();
