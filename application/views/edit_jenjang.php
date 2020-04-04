<?php foreach($data as $j){ ?>
	<form action="<?php echo base_url(). 'index.php/welcome/updatejenjang'; ?>" method="post">
		<table style="margin:20px auto;">
			<tr>
				<td>Jenjang</td>
				<td>
                     <!-- <label for="Jenjang">Jenjang</label> -->

                    <select id="Jenjang" name="id_jenjang">
                    <?php foreach($jenjang as $a){ ?>
                    <option value="<?php echo $a->id_jenjang ?>" <?php if($a->id_jenjang == $j->id_jenjang){ echo "Selected";}?> ><?php echo $a->nama_jenjang ?></option>
                    <?php } ?>
                    </select>
				</td>
			</tr>
			<tr>
				<td>Nama Sekolah</td>
				<td>
                <input hidden type="text" name="id_pendidikan" value="<?php echo $j->id_pendidikan ?>">
                <input type="text" name="nama_sekolah" value="<?php echo $j->nama_sekolah ?>"></td>
			</tr>
            <tr>
				<td>Tahun Lulus</td>
				<td><input type="number" name="thn_lulus" value="<?php echo $j->thn_lulus ?>"></td>
			</tr>
			
				<td></td>
				<td><input type="button" onclick = "window.history.back()" value="kembali"></td>
				<td><input type="submit" value="Simpan"></td>

			</tr>
		</table>
	</form>	
    <?php } ?>