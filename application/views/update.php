<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<h6><?php echo validation_errors(); ?></h6>
<h6><?php echo $this->session->flashdata('error'); ?></h6>

<div class="row">
    <form action="<?php echo site_url('controller/update/'.$post->id); ?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="input-field col s12">
                <input name="judul" id="judul" type="text" class="validate" value="<?php echo $post->judul; ?>" required>
                <label for="judul">Judul Loker</label>
            </div>
            <div class="input-field col s12">
                <input name="deskripsi" id="deskripsi" type="text" class="validate" value="<?php echo $post->deskripsi; ?>" required>
                <label for="deskripsi">Deskripsi Loker</label>
            </div>
            <div class="input-field col s12">
                <input name="perusahaan" id="perusahaan" type="text" class="validate" value="<?php echo $post->perusahaan; ?>" required>
                <label for="perusahaan">Nama Perusahaan</label>
            </div>
            <div class="input-field col s12">
                <input name="tanggal_mulai" id="tanggal_mulai" type="date" class="validate" value="<?php echo $post->tanggal_mulai; ?>" required>
                <label for="tanggal_mulai">Tanggal Dibuka</label>
            </div>
            <div class="input-field col s12">
                <input name="tanggal_selesai" id="tanggal_selesai" type="date" class="validate" value="<?php echo $post->tanggal_selesai; ?>" required>
                <label for="tanggal_selesai">Tanggal Berakhir</label>
            </div>
            <div class="input-field col s12">
                <input name="kota" id="kota" type="text" class="validate" value="<?php echo $post->kota; ?>" required>
                <label for="kota">Kota Perusahaan</label>
            </div>
            <div class="input-field col s12">
                <input name="gaji" id="gaji" type="text" class="validate" value="<?php echo $post->gaji; ?>" required>
                <label for="gaji">Gaji</label>
            </div>
            <div class="center col s12">
                <img class="responsive-img" id="image" style="max-height:30vh;" src="<?php echo site_url('upload/post/'.$post->filename); ?>">
            </div>
            <div class="file-field input-field col s12">
                <div class="btn light-blue darken-4">
                    <span>Image</span>
                    <input name="image1" type="file" id="file" onchange="thumbnail();">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
        </div>
        <div class="col s12 center">
            <button class="btn light-blue darken-4" type="submit">Submit</button>
        </div>
    </form>
</div>

<script type="text/javascript">
    var elem = document.querySelector('#deskripsi');
    M.textareaAutoResize(elem);

    function thumbnail() {
        var preview = document.querySelector('#image');
        var file = document.querySelector('input[type=file]').files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }
</script>
