<?php 
include "librari/koneksi.php";
$query="SELECT a.kd_kecerdasan, a.nm_kecerdasan, b.kd_ciri, b.ciri FROM a.tb_kecerdasan, b.tb_ciri WHERE a.kd_kecerdasan = b.kd_kecerdasan
ORDER BY kd_kecerdasan";
	$tampil = mysqli_query ($koneksi, $query);
	  echo "<div class='table-responsive'>
		  	<table class='table table-striped table-bordered'>
	          <thead>
	          <tr>
			  
			  <th>Kode Kecerdasan</th>
			  <th>nama Kecerdasan</th>
			  <th>Kode Ciri</th>	
			  <th>ciri</th>	 
			  <th>Aksi</th>
			  </tr>
	          </thead>
	            <tbody>"; 	           
	      	while ($data=mysqli_fetch_array($tampil)){
        echo "<tr>            
             <td>$data[kd_kecerdasan]</td>
             <td>$data[nm_kecerdasan]</td>
             <td>$data[kd_ciri]</td>
             <td>$data[ciri]</td>
             </tr>" ;                     
      		}
      echo "</tbody>
        </table>
        </div>";
 ?>