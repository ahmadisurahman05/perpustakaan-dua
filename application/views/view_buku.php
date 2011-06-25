<div id="content">
<h1>Aplikasi Perpustakaan Klop Solution</h1><br />
<h2>Tambah Buku</h2>
          <form method=POST action='' enctype='multipart/form-data'>
          <table border=1>
		  
          <tr><td>Kode Buku</td><td><?php echo form_error('kode_buku'); ?>:<input type=text name='kode_buku' size=30 value="<?php echo set_value('kode_buku'); ?>"></td></tr>
          <tr><td>Judul</td><td><?php echo form_error('judul'); ?>:<input type=text name='judul' size=30 value="<?php echo set_value('judul'); ?>"></td></tr>
          <tr><td>Pengarang</td><td><?php echo form_error('pengarang'); ?>:<input type=text name='pengarang' size=30 value="<?php echo set_value('pengarang'); ?>"></td></tr>
          <tr><td>Nomor Buku</td><td><?php echo form_error('no_buku'); ?>:<input type=text name='no_buku' size=30 value="<?php echo set_value('no_buku'); ?>"></td></tr>
          <tr><td>Kategori</td>  <td> : 
          <select name='kategori'><option value=1 selected>Komputer</option><option value=1>Komputer</option><option value=2>Novel</option></select></td></tr>
          <tr><td>Penerbit</td>  <td> : 
          <select name='penerbit'><option value=1 selected>Gramedia</option><option value=1>Gramedia</option><option value=2>Andi Offset</option></select></td></tr>
          <tr><td>Kode Rak</td><td><?php echo form_error('kode_rak'); ?>:<input type=text name='kode_rak' size=30 value="<?php echo set_value('kode_rak'); ?>"></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form><br /><br />
<h2>Tampil Data Buku</h2>
<table border="1">
<tr><th>Id</th><th>Kode Buku</th><th>Judul</th><th>Pengarang</th><th>Nomor Buku</th><th>Kategori</th><th>Penerbit</th><th>Kode Rak</th><th>Aksi</th></tr>
<?php
foreach($query as $row) {
?>
<tr><th><?php echo $row['id_buku']?></th><th><?php echo $row['kode_buku']?></th><th><?php echo $row['judul']?></th><th><?php echo $row['pengarang']?></th>
<th><?php echo $row['no_buku']?></th><th><?php echo $row['id_kategori']?></th><th><?php echo $row['id_penerbit']?></th><th><?php echo $row['kode_rak']?></th><th><a href="<?php echo base_url().'index.php/buku/edit_buku/'.$row['id_buku'] ?>">edit</a> | <a href="<?php echo base_url().'index.php/buku/delete_buku/'.$row['id_buku'] ?>">hapus</a></th></tr>
<?php
}
?>
</table>
<?php
echo $this->pagination->create_links();
?>
<BR /><a href="<?php echo base_url()."index.php/logout"?>">logout</a>

</div>
<div class="clearer"></div>