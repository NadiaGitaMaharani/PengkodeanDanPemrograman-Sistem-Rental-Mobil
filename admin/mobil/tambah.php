<?php
/*
  | Source Code Aplikasi Rental Mobil PHP & MySQL
  | 
  | @package   : rental_mobil
  | @file	   : tambah.php 
  | @author    : fauzan1892 / Fauzan Falah
  | @copyright : Copyright (c) 2017-2021 Codekop.com (https://www.codekop.com)
  | @blog      : https://www.codekop.com/products/source-code-aplikasi-rental-mobil-php-mysql-7.html 
  | 
  | 
  | 
  | 
 */
    require '../../koneksi/koneksi.php';
    $title_web = 'Tambah Mobil';
    include '../header.php';
    if(empty($_SESSION['USER']))
    {
        session_start();
    }
?>


<br>
<div class="container">
    <div class="card">
        <div class="card-header text-white bg-primary">
            <h4 class="card-title">
                Add Car
                <div class="float-right">
                    <a class="btn btn-warning" href="mobil.php" role="button">Back</a>
                </div>
            </h4>
        </div>
        <div class="card-body">
            <div class="container">
                <form method="post" action="proses.php?aksi=tambah" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-sm-6">

                            <div class="form-group row">
                                <label class="col-sm-3">Plate No.</label>
                                <input type="text" class="form-control col-sm-9" name="no_plat" placeholder="Fill Plate No.">
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3">Car Brand</label>
                                <input type="text" class="form-control col-sm-9" name="merk" placeholder="Fill Brand">
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3">Price</label>
                                <input type="text" class="form-control col-sm-9" name="harga" placeholder="Fill Price">
                            </div>

                        </div>

                        <div class="col-sm-6">

                            <div class="form-group row">
                                <label class="col-sm-3">Description</label>
                                <input type="text" class="form-control col-sm-9" name="deskripsi" placeholder="Fill Description">
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3">Status</label>
                                <select class="form-control col-sm-9" name="status">
                                    <option value="" disabled selected>Choose Status</option>
                                    <option>Available</option>
                                    <option>Not Available</option>
                                </select>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3">Picture</label>
                                <input type="file" accept="image/*" class="form-control col-sm-9" name="gambar" placeholder="Isi Gambar">
                                
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="float-right">
                        <button class="btn btn-primary" role="button" type="submit">
                            Save
                        </button>
                    </div>
                </form>       
            </div>
        </div>
    </div>
</div>
<?php  include '../footer.php';?>