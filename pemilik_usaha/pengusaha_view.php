<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("lib_func.php"); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Geografis Potensi Usaha</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<!-- AWAL CONTENT  -- hapus dari sini kebawah (sampai AKHIR CONTENT) -->
    <table width="100%" align="center" border=0 > 
      <tr>
        <td colspan=2 align="center" >
          <?php header_web();?>
        </td>
      </tr>
      <tr> 
        <td width="250px" valign="top">
          <?php menu();?>
        </td> 
        <td valign="top" >
          <table class="table table-striped" align="center">
          </table>
          <?php
            $link=koneksi_db();
            $sql  = "SELECT * FROM pemilik_usaha WHERE nama='Ika Widya'";
            $res  = mysql_query($sql,$link);
			$data = mysql_fetch_array($res);
              ?>
			  <form method="get" action="pengusaha_form_edit.php">
              <table class="table table-striped" align="center">
                <tr>
                  <td colspan=11 align="center" valign="middle"><font></font><h3>Berikut Data Diri Anda</h3></td>
                </tr>
                  <tr>
                  	<td>Nama</td>
					<td>:</td>
					<td><?php echo $data['nama'];?></td>
				  </tr>
				  <tr>
                  	<td>Nomor KTP</td>
					<td>:</td>
					<td>
						<?php echo $data['no_ktp'];?>
						<input type="hidden" value="<?php echo $data['no_ktp'];?>" name="no_ktp">
					</td>
                  </tr>
				  <tr>
                  	<td>Alamat</td>
					<td>:</td>
					<td><?php echo $data['alamat'];?></td>
                  </tr>
				  <tr>
                  	<td>Tempat Lahir</td>
					<td>:</td>
					<td><?php echo $data['tpt_lahir'];?></td>
                  </tr>
				  <tr>
                  	<td>Tanggal Lahir</td>
					<td>:</td>
					<td><?php echo $data['tgl_lahir'];?></td>
                  </tr>
				  <tr>
                  	<td>File KTP</td>
					<td>:</td>
					<td>
                        <img src="../admin/gambar/<?php echo $data['foto_ktp'];?>" width="70px" height="70px">
                    </td>
                  </tr>
				  <tr>
                  	<td>No Telp</td>
					<td>:</td>
					<td><?php echo $data['no_telp'];?></td>
                  </tr>
				  <tr>
                  	<td>Email</td>
					<td>:</td>
                      <td><?php echo $data['email'];?></td>
                  </tr>
				  <tr>
				  	<td colspan="2">
						<div class="form-group">
						<div align="center" class="col-sm-offset-2 col-sm-10">
							<button class="btn btn-primary">Edit</button>
						</div>
						</div>
					</td>
				  </tr>
            </table>
			</form>
              </table>
        </td> 
      </tr>
      <tr>
        <td colspan=2>
          <?php footer_web();?>
        </td>
      </tr>
    </table>

<!-- AKHIR CONTENT - dari sini kebawah jgn dihapus -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
