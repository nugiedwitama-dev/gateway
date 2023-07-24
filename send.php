<?php
	include "koneksi.php";

    $nama = $_GET['nama'];

    $sql = "select * from siswa where nama='$nama'";
    $query = mysqli_query($konek,$sql);
    $result = mysqli_fetch_array($query);
    
    $target = $result['telp'].'|'.$result['nama'];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.fonnte.com/send',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array(
        'target' => "$target",
        'message' => 'Halo {name}',
        'delay' => '2', 
        'countryCode' => '62', //optional
    ),
    CURLOPT_HTTPHEADER => array(
        'Authorization: vR6GidYJFKSIfq37+IXq' //change TOKEN to your actual token
    ),
    ));
    $response = curl_exec($curl);

    curl_close($curl);
 echo "TERKIRIM";
