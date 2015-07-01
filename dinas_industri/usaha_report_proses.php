<?php
ob_start();
  include("lib_func.php");
  require_once("../phpexcel/Classes/PHPExcel.php");
  require_once("../phpexcel/Classes/PHPExcel/IOFactory.php");
  $link = koneksi_db();
  $kategori = $_GET['kategori'];
  $keyword = $_GET['keyword'];
  
  if($kategori == '') //semua data
    $sql = "SELECT data_usaha.id_usaha AS id_usaha, data_usaha.nama_usaha AS nama_usaha, data_usaha.alamat_usaha AS alamat_usaha, data_usaha.produk_utama AS produk_utama, pemilik_usaha.nama AS nama, kecamatan.nama_kec AS nama_kec, desa.nama_desa AS nama_desa, data_usaha.skala AS skala, sektor_usaha.nama_sektor AS nama_sektor
                FROM data_usaha JOIN pemilik_usaha ON pemilik_usaha.no_ktp = data_usaha.no_ktp JOIN desa USING(id_desa) JOIN kecamatan ON kecamatan.id_kec = data_usaha.id_kec JOIN sektor_usaha USING(id_sektor) 
                ORDER BY id_usaha";
  else //kalau user filter data berdasarkan kecamatan/kelurahan dll
    $sql = "SELECT data_usaha.id_usaha AS id_usaha, data_usaha.nama_usaha AS nama_usaha, data_usaha.alamat_usaha AS alamat_usaha, produk_utama, deskripsi_usaha, data_usaha.lat AS lat, data_usaha.lng AS lng, data_usaha.aktivasi, pemilik_usaha.nama AS nama, data_usaha.no_ktp AS no_ktp, kecamatan.nama_kec AS nama_kec, desa.nama_desa AS nama_desa, data_usaha.skala AS skala, sektor_usaha.nama_sektor AS nama_sektor
                FROM data_usaha JOIN pemilik_usaha ON pemilik_usaha.no_ktp = data_usaha.no_ktp JOIN desa USING(id_desa) JOIN kecamatan ON kecamatan.id_kec = data_usaha.id_kec JOIN sektor_usaha USING(id_sektor) 
                WHERE data_usaha.id_$kategori = '$keyword' ORDER BY id_usaha";
  echo $sql;
  $query = mysql_query($sql, $link);

    if(!$query)
      echo mysql_error();

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setTitle("Laporan Data Usaha Kab. Bandung Barat");
        $objPHPExcel->getProperties()->setDescription("Berisi data usaha (ID Usaha, Nama Usaha, Produk Utama, Alamat, Pemilik Usaha, Kecamatan, Kelurahan, Skala Usaha, Sektor Usaha)");
        $objPHPExcel->setActiveSheetIndex(0);

        // Header laporan
        $objPHPExcel->getActiveSheet()->setCellValue('A1','Laporan Data Usaha Kab. Bandung Barat');
        $objPHPExcel->getActiveSheet()->mergeCells('A1:I1');
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(30);
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        // Tanggal laporan
        $today = date("d-m-Y");
        $objPHPExcel->getActiveSheet()->setCellValue('I3','Tanggal: '.$today);
        $objPHPExcel->getActiveSheet()->getStyle('I3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $objPHPExcel->getActiveSheet()->getStyle('I3')->getFont()->setBold(true);

        // Header tabel produk
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(65);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25);

        $objPHPExcel->getActiveSheet()->getRowDimension('5')->setRowHeight(15);

        $objPHPExcel->getActiveSheet()->setCellValue('A5','ID Usaha');
        $objPHPExcel->getActiveSheet()->setCellValue('B5','Nama Usaha');
        $objPHPExcel->getActiveSheet()->setCellValue('C5','Alamat');
        $objPHPExcel->getActiveSheet()->setCellValue('D5','Pemilik Usaha');
        $objPHPExcel->getActiveSheet()->setCellValue('E5','Produk Utama');
        $objPHPExcel->getActiveSheet()->setCellValue('F5','Kecamatan');
        $objPHPExcel->getActiveSheet()->setCellValue('G5','Kelurahan');
        $objPHPExcel->getActiveSheet()->setCellValue('H5','Skala Usaha');
        $objPHPExcel->getActiveSheet()->setCellValue('I5','Sektor Usaha');

        $objPHPExcel->getActiveSheet()->getStyle('A5:I5')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('A5:I5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        // Border header tabel
        $styleArray = array(
                'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb'=>'E1E0F7'),
                    ),
                'borders' => array(
                    'outline' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN,
                    ),
                ),
                );
                $objPHPExcel->getActiveSheet()->getStyle('A5')->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('B5')->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('C5')->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('D5')->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('E5')->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('F5')->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('G5')->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('H5')->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('I5')->applyFromArray($styleArray);

        //isi tabel
        $row = 6;
    
        while($data = mysql_fetch_array($query))
        {
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $data['id_usaha']);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $data['nama_usaha']);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $data['alamat_usaha']);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $data['nama']);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $data['produk_utama']);
            $objPHPExcel->getActiveSheet()->setCellValue('F'.$row, $data['nama_kec']);
            $objPHPExcel->getActiveSheet()->setCellValue('G'.$row, $data['nama_desa']);
            $objPHPExcel->getActiveSheet()->setCellValue('H'.$row, $data['skala']);
            $objPHPExcel->getActiveSheet()->setCellValue('I'.$row, $data['nama_sektor']);
            $objPHPExcel->getActiveSheet()->getStyle("A".($row).":I".($row))->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);              
            $row++;
        }


        //Menuliskan skrip pada file yang telah dibuat.
        $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel2007');
        ob_end_clean();

        // Mendefinisikan header dan melakukan unggah secara otomatis.
        $filename='LaporanDataUsaha_'.$today.'.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
        
        $objWriter->save('php://output');

  //query nya ganti sama yang ada di report_example.php

?>