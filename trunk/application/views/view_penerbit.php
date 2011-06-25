<div id="content">
<h1>Aplikasi Perpustakaan Klop Solution</h1><br />
<h2>Tambah Penerbit</h2>
          <form method=POST action='' enctype='multipart/form-data'>
          <table border=1>
		  
          <tr><td>Nama Penerbit</td><td><?php echo form_error('nama_penerbit'); ?>:<input type=text name='nama_penerbit' size=30 value="<?php echo set_value('nama_penerbit'); ?>"></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table>
		  </form><br /><br />
<h2>Tampil Data penerbit</h2>
<table border="1">
<tr><th>Id</th><th>Nama Penerbit</th><th>aksi</th></tr>
<?php
foreach($query as $row) {
?>
<tr><th><?php echo $row['id_penerbit']?></th>
<th><?php echo $row['nama_penerbit']?></th>
<th><a href="<?php echo base_url().'index.php/penerbit/edit_penerbit/'.$row['id_penerbit'] ?>">edit</a> | <a href="<?php echo base_url().'index.php/penerbit/hapus_penerbit/'.$row['id_penerbit'] ?>">hapus</a></th></tr>
<?php
}
?>
</table>
<?php
echo $this->pagination->create_links();
?>

</div>
<div class="clearer"></div>