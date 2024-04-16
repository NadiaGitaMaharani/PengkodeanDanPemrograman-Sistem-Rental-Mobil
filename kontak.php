<?php
/*
  | Source Code Aplikasi Rental Mobil PHP & MySQL
  | 
  | @package   : rental_mobil
  | @file	   : kontak.php 
  | @author    : fauzan1892 / Fauzan Falah
  | @copyright : Copyright (c) 2017-2021 Codekop.com (https://www.codekop.com)
  | @blog      : https://www.codekop.com/products/source-code-aplikasi-rental-mobil-php-mysql-7.html 
  | 
  | 
  | 
  | 
 */
    session_start();
    require 'koneksi/koneksi.php';
    include 'header.php';
?>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-sm-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    Contact Us
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">Rental Name</div>
                        <div class="col-sm-8"><?= $info_web->nama_rental;?></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-4">Telephone</div>
                        <div class="col-sm-8"><?= $info_web->telp;?></div>
                    </div>
                
                    <div class="row mt-3">
                        <div class="col-sm-4">Address</div>
                        <div class="col-sm-8"><?= $info_web->alamat;?></div>
                    </div>
                
                    <div class="row mt-3">
                        <div class="col-sm-4">Email</div>
                        <div class="col-sm-8"><?= $info_web->email;?></div>
                    </div>
                
                    <div class="row mt-3">
                        <div class="col-sm-4">Bank Account Number</div>
                        <div class="col-sm-8"><?= $info_web->no_rek;?></div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>
<br>
<br>
<br>
<?php include 'footer.php';?>