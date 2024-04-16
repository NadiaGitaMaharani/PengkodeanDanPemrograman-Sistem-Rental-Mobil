<?php
/*
  | Source Code Aplikasi Rental Mobil PHP & MySQL
  | 
  | @package   : rental_mobil
  | @file	   : bayar.php 
  | @author    : fauzan1892 / Fauzan Falah
  | @copyright : Copyright (c) 2017-2021 Codekop.com (https://www.codekop.com)
  | @blog      : https://www.codekop.com/products/source-code-aplikasi-rental-mobil-php-mysql-7.html 
  | 
  | 
  | 
  | 
 */
    require '../../koneksi/koneksi.php';
    $title_web = 'Konfirmasi';
    include '../header.php';
    session_start();
    if(empty($_SESSION['USER']))
    {
        echo '<script>alert("login dulu");window.location="index.php"</script>';
    }
    $kode_booking = $_GET['id'];
    $hasil = $koneksi->query("SELECT * FROM booking WHERE kode_booking = '$kode_booking'")->fetch();

    $id_booking = $hasil['id_booking'];
    $hsl = $koneksi->query("SELECT * FROM pembayaran WHERE id_booking = '$id_booking'")->fetch();
    $c = $koneksi->query("SELECT * FROM pembayaran WHERE id_booking = '$id_booking'")->rowCount();


    $id = $hasil['id_mobil'];
    $isi = $koneksi->query("SELECT * FROM mobil WHERE id_mobil = '$id'")->fetch();
    
?>
<br>
<br>
<div class="container">
<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">
                <h5> Payment Detail</h5>
            </div>
            <div class="card-body">
                <?php if($c > 0){?>
                <table class="table">
                    <tr>
                        <td>Bank Account Number</td>
                        <td> :</td>
                        <td><?= $hsl['no_rekening'];?></td>
                    </tr>
                    <tr>
                        <td>On behalf of </td>
                        <td> :</td>
                        <td><?= $hsl['nama_rekening'];?></td>
                    </tr>
                    <tr>
                        <td>Nominal  </td>
                        <td> :</td>
                        <td>Rp. <?= number_format($hsl['nominal']);?></td>
                    </tr>
                    <tr>
                        <td>Transfer Date</td>
                        <td> :</td>
                        <td><?= $hsl['tanggal'];?></td>
                    </tr>
                </table>
                <?php }else{?>
                    <h4>Not paid</h4>
                <?php }?>
            </div>
        </div>
        <br/>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?php echo $isi['merk'];?></h5>
            </div>
            <ul class="list-group list-group-flush">

                <?php if($isi['status'] == 'Available'){?>

                    <li class="list-group-item bg-primary text-white">
                        <i class="fa fa-check"></i> Available
                    </li>

                <?php }else{?>

                    <li class="list-group-item bg-danger text-white">
                        <i class="fa fa-close"></i> Not Available
                    </li>

                <?php }?>
            
            
                <li class="list-group-item bg-info text-white"><i class="fa fa-check"></i> Free E-toll 50k</li>
                <li class="list-group-item bg-dark text-white">
                    <i class="fa fa-money"></i> Rp. <?php echo number_format($isi['harga']);?>/ day
                </li>
            </ul>
            <div class="card-footer">
                <a href="<?php echo $url;?>admin/peminjaman/peminjaman.php?id=<?php echo $hasil['kode_booking'];?>" 
                    class="btn btn-success btn-md">Change Rental Status</a>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
         <div class="card">
            <div class="card-header">
                <h5> Booking Detail </h5>
            </div>
           <div class="card-body">
               <form method="post" action="proses.php?id=konfirmasi">
                    <table class="table">
                        <tr>
                            <td>Booking Code  </td>
                            <td> :</td>
                            <td><?php echo $hasil['kode_booking'];?></td>
                        </tr>
                        <tr>
                            <td>ID  </td>
                            <td> :</td>
                            <td><?php echo $hasil['ktp'];?></td>
                        </tr>
                        <tr>
                            <td>Name  </td>
                            <td> :</td>
                            <td><?php echo $hasil['nama'];?></td>
                        </tr>
                        <tr>
                            <td>Telephone  </td>
                            <td> :</td>
                            <td><?php echo $hasil['no_tlp'];?></td>
                        </tr>
                        <tr>
                            <td>Rental Date </td>
                            <td> :</td>
                            <td><?php echo $hasil['tanggal'];?></td>
                        </tr>
                        <tr>
                            <td>Rental Period </td>
                            <td> :</td>
                            <td><?php echo $hasil['lama_sewa'];?> days</td>
                        </tr>
                        <tr>
                            <td>Total Price </td>
                            <td> :</td>
                            <td>Rp. <?php echo number_format($hasil['total_harga']);?></td>
                        </tr>
                        <tr>
                            <td>Status </td>
                            <td> :</td>
                            <td>
                                <select class="form-control" name="status">
                                    <option <?php if($hasil['konfirmasi_pembayaran'] == 'sedang di proses'){echo 'selected';}?>>
                                        On Process
                                    </option>
                                    <option <?php if($hasil['konfirmasi_pembayaran'] == 'Pembayaran di terima'){echo 'selected';}?>>
                                        Payment Accepted
                                    </option>
                                </select>    
                            </td>
                        </tr>
                    </table>
                    <input type="hidden" name="id_booking" value="<?php echo $hasil['id_booking'];?>">
                    <button type="submit" class="btn btn-primary float-right">
                        Change Status
                    </button>
            </form>
               
           </div>
         </div> 
    </div>
</div>
</div>
<br>
<br>
<br>

<?php include '../footer.php';?>