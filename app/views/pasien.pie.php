<br><br>
<form class="form" method="post" action="_(( site('pasien/').$action ))">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="input-group">
                    <div class="col-md-4 text-right"><label class="small-bold">Nama Lengkap</label></div>
                    <div class="col-md-8"><input class="form-control" type="text"
                    value="_(( string_condition($pasien['nama_lengkap']) ))" name="nama_lengkap" placeholder="Nama Lengkap ..." /></div>
                </div>
                <div class="input-group">
                    <div class="col-md-4 text-right"><label class="small-bold">NIK</label></div>
                    <div class="col-md-8"><input class="form-control" type="text"
                    value="_(( string_condition($pasien['nik']) ))" name="nik" placeholder="NIK ..."/></div>
                </div>
                <div class="input-group">
                    <div class="col-md-4 text-right"><label class="small-bold">Jenis Kelamin</label></div>
                    <div class="col-md-8"><div class="control">

                        <label class="badge badge-info"><input type="radio" name="jenis_kelamin" value="0"
                        _(( (arr_value($pasien,'jenis_kelamin') == 0 ? 'checked': STRING_EMPTY) ))
                         />Laki-laki</label>
                        <label class="badge badge-warning"><input type="radio" name="jenis_kelamin" value="1"
                        _(( (arr_value($pasien,'jenis_kelamin') == 1 ? 'checked': STRING_EMPTY) )) />Perempuan</label>
                    </div></div>
                </div>
                <div class="input-group">
                    <div class="col-md-4 text-right"><label class="small-bold">Tempat, Tanggal Lahir</label></div>
                    <div class="col-md-3"><input class="form-control" type="text" name="tempat_lahir"
                    value="_(( arr_value($pasien, 'tempat_lahir') ))" placeholder="Tempat ..." /></div>
                    <div class="col-md-5"><input class="form-control" type="date" name="tanggal_lahir"
                    @if(isset($pasien))
                        value="_(( date('Y-m-d', strtotime(arr_value($pasien, 'tanggal_lahir'))) ))"
                    @endif
                    onchange="getAge(this.value)" /></div>
                </div>
                <div class="input-group">
                    <div class="col-md-4 text-right"><label class="small-bold">Alamat</label></div>
                    <div class="col-md-8">
                        <textarea class="form-control" type="text" name="alamat" rows="4" placeholder="Alamat ...">_(( string_condition($pasien['alamat']) ))</textarea></div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group">
                    <div class="col-md-4 text-right"><label class="small-bold">Umur</label></div>
                    <div class="col-md-4"><input class="form-control" id="umur" type="text" name="umur" placeholder="Umur"
                    value="_(( string_condition($pasien['umur']) ))"
                    onload="getAge(this.value)" readonly/></div>
                    <div class="col-md-4"></div>
                </div>
                <div class="input-group">
                    <div class="col-md-4 text-right"><label class="small-bold">No. BPJS</label></div>
                    <div class="col-md-8"><input id="no_bpjs" class="form-control" type="text" name="no_bpjs" placeholder="Nomor BPJS ..." readonly value="_(( string_condition($pasien['no_bpjs']) ))"/></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid footer">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <table class="content-head wid-100p">
                    <tbody>
                        <tr>
                            <td><span class="btn btn-danger wid-100p" onclick="hapus('_(( $pasien['no_bpjs'] ))')">HAPUS PASIEN</span></td>
                            <td><button name="submit" value="simpan_pasien" class="btn btn-success wid-100p">SIMPAN PASIEN</button></td>
                        </tr>
                        <tr>
                            <td><button name="submit" value="kembali" class="btn btn-gray wid-100p">BATAL</button></td>
                            <td><a href="_(( site('pelayanan/buat_baru/'.$pasien['no_bpjs']) ))" class="btn btn-info wid-100p">TAMBAH PELAYANAN</a></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>
<h3>Riwayat</h3>
<div class="content">
    <table class="table table-bordered table-light table-hover table-striped table-custome">
        <thead class="thead-dark">
            <tr>
                <th class="max-10">No.</th>
                <th class="wid-10">Tanggal</th>
                <th>Jam<br>Masuk</th>
                <th class="max-30">Poli/<br>Ruangan</th>
                <th class="max-100">Dokter</th>
                <th class="max-100">Perawat</th>
                <th>Keluhan</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            << $i = 0 >>
            @foreach($riwayat_list as $riwayat)
            << $i++ >>
                <tr onclick="preview('_(( $riwayat['id_pelayanan'] ))')">
                    <td class="text-center">_(( $i )).</td>
                    <td class="text-center">_(( date('d/m/Y', strtotime($riwayat['tanggal_masuk'])) ))</td>
                    <td class="text-center">_(( date('h:i a', strtotime($riwayat['tanggal_masuk'])) ))</td>
                    <td class="text-center">_(( $riwayat['poli'] ))</td>
                    <td>_(( $riwayat['nama_dokter'] ))</td>
                    <td>_(( $riwayat['nama_perawat'] ))</td>
                    <td>_(( $riwayat['keluhan'] ))</td>
                    <td>_(( $riwayat['tindakan'] ))</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
function getAge(mDate) {
    var diff_ms = Date.now() - Date.parse(mDate);
    var age_dt = new Date(diff_ms); 
  
    var result = Math.abs(age_dt.getUTCFullYear() - 1970);
    $('#umur').val(result);
}
function hapus(id) {
    document.location = "_(( site('pasien/hapus_pasien/') ))"+id; // <---- Ganti jadi +id
}
    function preview(id) {
        document.location = "_(( site('pelayanan/preview/') ))"+id;
    }
</script>