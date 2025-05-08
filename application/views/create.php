<!-- <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Create Loker</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: white;
    }

    .container {
      max-width: 800px;
      margin: 40px auto;
      padding: 0 20px;
    }

    form {
      display: grid;
      grid-template-columns: 200px 1fr;
      gap: 10px 20px;
      align-items: center;
    }

    label {
      text-align: left;
      font-weight: 500;
    }

    input[type="text"],
    input[type="date"] {
      width: 100%;
      padding: 6px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type="file"] {
      border: none;
      padding: 0;
    }

    .full-width {
      grid-column: 1 / -1;
      display: flex;
      justify-content: center;
      margin-top: 10px;
    }

    .btn {
      padding: 8px 16px;
      border: none;
      border-radius: 5px;
      font-size: 14px;
      color: white;
      cursor: pointer;
      min-width: 100px;
    }

    .btn-file {
      background-color: #0057ff;
    }

    .btn-update {
      background-color: red;
      margin-right: 10px;
    }

    .btn-create {
      background-color: #0057ff;
    }

    .button-row {
      grid-column: 1 / -1;
      display: flex;
      justify-content: center;
      margin-top: 20px;
      gap: 10px;
    }

    /* .button-row :hover {
      color: ;
    } */

    .date-range {
      display: flex;
      gap: 10px;
    }

  </style>
</head>
<body> -->


<div class="container">
  <?= validation_errors('<p style="color:red;">', '</p>'); ?>
  <?= $this->session->flashdata('error'); ?>

  <form action="<?= site_url('welcome/create'); ?>" method="post" enctype="multipart/form-data">
    <label for="judul">Judul Loker</label>
    <input type="text" name="judul" id="judul" required>

    <label for="deskripsi">Deskripsi Loker</label>
    <input type="text" name="deskripsi" id="deskripsi" required>

    <label for="perusahaan">Nama Perusahaan</label>
    <input type="text" name="perusahaan" id="perusahaan" required>

    <label for="tanggal_mulai">Tanggal Dibuka - Berakhir</label>
    <div class="date-range">
      <input type="date" name="tanggal_mulai" id="tanggal_mulai" required>
      <input type="date" name="tanggal_selesai" id="tanggal_selesai" required>
    </div>

    <label for="kota">Kota Perusahaan</label>
    <input type="text" name="kota" id="kota" required>

    <label for="gaji">Gaji</label>
    <input type="text" name="gaji" id="gaji" required>

    <div class="full-width">
      <label class="btn btn-file">
        Select File
        <input type="file" name="image1" style="display: none;" accept=".jpg,.jpeg,.png">
      </label>
    </div>

    <div class="button-row">
      <button type="submit" name="update" value="1" class="btn btn-update">Update</button>
      <button type="submit" name="create" value="1" class="btn btn-create">Create</button>
    </div>
  </form>
</div>
<!-- 
</body>
</html> -->
