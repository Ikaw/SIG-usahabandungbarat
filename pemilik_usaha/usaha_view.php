<?php
  session_start();
?>
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
<div class="container-fluid">
  <?php header_web();?>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
      <?php menu();?>
    </div>
    <div class="col-md-9">
      <div class="row">
        <div class="col-md-4">
          <a href="usaha_form_tambah.php">
            <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#tambah">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"> Tambah Data</span>
            </button>
          </a>
        </div>
        <div class="col-lg-8">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Pencarian...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">Cari</button>
              </span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php
            $noktp = $_SESSION['no_ktp'];
            $link=koneksi_db();
            $sql="select * from data_usaha where no_ktp = '$noktp' order by nama_usaha";
            $res=mysql_query($sql,$link);
            $banyakrecord=mysql_num_rows($res);
            if($banyakrecord>0){
              $i=0;
              while($data=mysql_fetch_array($res)){
                    $i++;
                    ?>

              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <div class="from-group">
                      <label for="id_usaha" class="col-sm-4  control-label">ID Usaha</label>
                      <div class="col-md-6">
                        <input type="text" value="<?=$data['id_usaha']?>" class="form-control">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
                          <!--Hapus Data-->
                            <a href="javascript:;" data-id="<?php echo $data['id_usaha']; ?>" data-toggle="modal" data-target="#modal-konfirmasi">
                              <button class="btn btn-primary">
                                <span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span>
                              </button>
                            </a>
                              <div class="modal fade" id="modal-konfirmasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                      <h4 class="modal-title" id="myModalLabel">Hapus Data Usaha</h4>
                                    </div>
                                    <div class="modal-body">
                                      Apakah anda yakin akan menghapus Usaha <?php echo $data['nama_usaha'];?> ??
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                      <a href="javascript:;" id="hapus-true" class="btn btn-danger">Ya, Hapus</a>
                                    </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                              <br>
                              <br>
                              <!--Ubah Data-->
                              <a href="usaha_form_edit.php?id_usaha=<?php echo $data['id_usaha'];?>">
                                <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Ubah">
                                  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </button>
                              </a>
                      </td>
                    </tr>
                    <?php
                  }?>
            </table>
            <?php
        }else{
          ?>
          <div class="alert alert-warning" role="alert">Data Usaha tidak ditemukan !!</div>
          <?php
        }?>
        </div>
      </div>
    </div>
  </div>
</div>
          
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
