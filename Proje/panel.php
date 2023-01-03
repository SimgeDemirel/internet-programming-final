<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #2945c2;
  color: white;
}
</style>
</head>
<body>

<h1>Müşteri Bilgileri</h1>

<table id="customers">
 <tr>
    <th>Ad Soyad</th>
    <th>Telefon</th>
    <th>Tc Kimlik Numarası</th>
    <th>Vergi Numarası</th>
    <th>Mesaj</th>
 </tr>

 <?php

 session_start();
 if($_SESSION["user"]=="")
 
 {
  echo "
  <script>window.location.href='cikis.php'</script>";
 }
 else{
  include("baglanti.php");

$sec="Select * From iletisim";
$sonuc=$baglanti->query($sec);

if($sonuc->num_rows>0)
{
   while($cek=$sonuc->fetch_assoc())
   {
    echo "
    <tr>
         <td>".$cek['adsoyad']."</td>
         <td>".$cek['telefon']."</td>
         <td>".$cek['tcno']."</td>
         <td>".$cek['vergino']."</td>
        <td>".$cek['mesaj']."</td>
    </tr>
          
    ";
   }
}
else{
  echo "Veritabanında kayıtlı hiçbir veri bulunamamıştır.";

}

}

?>
 
</table>

</body>
</html>

