<div id="content">
<h2>Tambah Member</h2>
          <form method=POST action='' enctype='multipart/form-data'>
          <table border=1>
		  
          <tr><td>NIM</td><td><?php echo form_error('nim'); ?>:<input type=text name='nim' size=30 value="<?php echo set_value('nim'); ?>"></td></tr>
          <tr><td>NAMA</td><td><?php echo form_error('nama'); ?>:<input type=text name='nama' size=30 value="<?php echo set_value('nama'); ?>"></td></tr>
          <tr><td>Jenis Kelamin</td><td><?php echo form_error('jenis_kelamin'); ?>:<input type=text name='jenis_kelamin' size=30 value="<?php echo set_value('jenis_kelamin'); ?>"></td></tr>
          <tr><td>Tgl Lahir</td><td><?php echo form_error('tgl_lahir'); ?>:<input type=text name='tgl_lahir' size=30 value="<?php echo set_value('tgl_lahir'); ?>"></td></tr>
          <tr><td>Alamat</td><td><?php echo form_error('alamat'); ?>:<input type=text name='alamat' size=30 value="<?php echo set_value('alamat'); ?>"></td></tr>
          <tr><td>Nomor Telepon</td><td><?php echo form_error('no_telp'); ?>:<input type=text name='no_telp' size=30 value="<?php echo set_value('no_telp'); ?>"></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form><br /><br />
<h2>Tampil Data Member</h2>
<table border="1">
<tr><th>Id Member</th>
<th>NIM</th>
<th>NAMA</th>
<th>Jenis Kelamin</th>
<th>Tgl Lahir</th>
<th>Alamat</th>
<th>Nomor Telepon</th>
<th>Aksi</th></tr>
<?php
foreach($query as $row) {
?>
<tr><th><?php echo $row['id_member']?></th>
<th><?php echo $row['nim']?></th>
<th><?php echo $row['nama']?></th>
<th><?php echo $row['jenis_kelamin']?></th>
<th><?php echo $row['tgl_lahir']?></th>
<th><?php echo $row['alamat']?></th>
<th><?php echo $row['no_telp']?></th>
<th><a href="<?php echo base_url().'index.php/member/edit_member/'.$row['id_member'] ?>">edit</a> | <a href="<?php echo base_url().'index.php/member/hapus_member/'.$row['id_member'] ?>">hapus</a></th></tr>
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