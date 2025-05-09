<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="container-form">
    <form action="<?= site_url('controller/create'); ?>" method="post" enctype="multipart/form-data">
        <?= validation_errors('<p style="color:red;">', '</p>'); ?>
        <?= $this->session->flashdata('error'); ?>
        <h1>Tambah Loker</h1>

        <label for="judul">Judul Loker</label>
        <input type="text" name="judul" id="judul" required placeholder="Masukkan Judul Loker">

        <label for="deskripsi">Deskripsi Loker</label>
        <input type="text" name="deskripsi" id="deskripsi" required placeholder="Masukkan Deskripsi">

        <label for="perusahaan">Nama Perusahaan</label>
        <input type="text" name="perusahaan" id="perusahaan" required placeholder="Masukkan Nama Perusahaan">

        <label for="tanggal_mulai">Tanggal Dibuka</label>
        <input type="date" name="tanggal_mulai" id="tanggal_mulai" required>

        <label for="tanggal_selesai">Tanggal Berakhir</label>
        <input type="date" name="tanggal_selesai" id="tanggal_selesai" required>

        <label for="kota">Kota Perusahaan</label>
        <input type="text" name="kota" id="kota" required placeholder="Masukkan Kota">

        <label for="gaji">Gaji</label>
        <input type="text" name="gaji" id="gaji" required placeholder="Masukkan Gaji">

        <div class="file-upload">
            <label class="file-label">
                <input type="file" name="image1" id="fileInput" accept=".jpg,.jpeg,.png" hidden>
                <span id="fileLabelText">Pilih File</span>
            </label>
            <small id="fileNameDisplay" style="display:block; margin-bottom:10px; color:#555;"></small>
        </div>

        <div class="button-group" style="margin-top:0;">
            <button type="submit" name="create" class="btn btn-create">Create</button>
        </div>
    </form>
</div>

<script>
    const fileInput = document.getElementById('fileInput');
    const fileLabelText = document.getElementById('fileLabelText');
    const fileNameDisplay = document.getElementById('fileNameDisplay');

    fileInput.addEventListener('change', function() {
        if (fileInput.files.length > 0) {
            const fileName = fileInput.files[0].name;
            fileNameDisplay.textContent = `${fileName}`;
            fileLabelText.textContent = 'Ganti File';
        } else {
            fileNameDisplay.textContent = '';
            fileLabelText.textContent = 'Pilih File';
        }
    });
</script>
