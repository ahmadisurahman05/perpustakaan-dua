<div id="content">
<h2>Edit Data Penerbit</h2>
          <form method=POST action='' enctype='multipart/form-data'>
          <table border=1>
		  
          <tr><td>ID Penerbit</td><td><?php echo form_error('id_penerbit'); ?>:<input type=text name='id_penerbit' size=30 value="<?php echo $row->id_penerbit ?>"></td></tr>
          <tr><td>Nama Penerbit</td><td><?php echo form_error('nama_penerbit'); ?>:<input type=text name='nama_penerbit' size=30 value="<?php echo $row->nama_penerbit ?>"></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form><br /><br />
</div><div class="clearer"></div>