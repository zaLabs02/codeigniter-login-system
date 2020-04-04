<?php foreach($data as $u){ ?>
	<form action="<?php echo base_url(). 'index.php/welcome/updatebio'; ?>" method="post">
		<table style="margin:20px auto;">
			<tr>
				<td>Nama</td>
				<td>
					<input type="hidden" name="npm" value="<?php echo $u->npm ?>">
					<input type="text" name="nama" value="<?php echo $u->nama ?>">
				</td>
			</tr>
			<tr>
				<td>Tanggal lahir</td>
				<td><input type="date" name="tgl_lahir" value="<?php echo $u->tgl_lahir ?>"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email" value="<?php echo $u->email ?>"></td>
			</tr>
            <tr>
				<td>Alamat</td>
				<td><input type="text" name="alamat" value="<?php echo $u->alamat ?>"></td>
			</tr>
            <tr>
				<td>Deskripsi</td>
				<td><textarea name='deskripsi'><?php echo $u->deskripsi ?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan"></td>
			</tr>
		</table>
	</form>	
	<?php } ?>