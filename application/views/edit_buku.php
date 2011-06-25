<div id="content">
<h2>Edit Data Buku</h2>
          <form method=POST action='' enctype='multipart/form-data'>
          <table border=1>
		  
          <tr><td>Kode Buku</td><td><?php echo form_error('kode_buku'); ?>:<input type=text name='kode_buku' size=30 value="<?php echo $row->kode_buku ?>"></td></tr>
          <tr><td>Judul</td><td><?php echo form_error('judul'); ?>:<input type=text name='judul' size=30 value="<?php echo $row->judul ?>"></td></tr>
          <tr><td>Pengarang</td><td><?php echo form_error('pengarang'); ?>:<input type=text name='pengarang' size=30 value="<?php echo $row->pengarang ?>"></td></tr>
          <tr><td>Nomor Buku</td><td><?php echo form_error('no_buku'); ?>:<input type=text name='no_buku' size=30 value="<?php echo $row->no_buku ?>"></td></tr>
          <tr><td>Kategori</td>  <td> : 
          <select name='kategori'><option value="<?php echo $row->id_kategori ?>" selected><?php echo $row->id_kategori ?></option><option value=1>Komputer</option><option value=2>Novel</option></select></td></tr>
          <tr><td>Penerbit</td>  <td> : 
          <select name='penerbit'><option value=<?php echo $row->id_penerbit ?> selected><?php echo $row->id_penerbit ?></option><option value=1>Gramedia</option><option value=2>Andi Offset</option></select></td></tr>
          <tr><td>Kode Rak</td><td><?php echo form_error('kode_rak'); ?>:<input type=text name='kode_rak' size=30 value="<?php echo $row->kode_rak ?>"></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form><br />
	<?php
		echo $this->pagination->create_links();
	?>
<br />
</div><div class="clearer"></div>