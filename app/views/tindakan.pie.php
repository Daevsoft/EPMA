<br><br>
<form class="form" method="post" action="_(( site('tindakan/form') ))">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="input-group">
                    <div class="col-md-4 text-right"><label class="small-bold">Poli / Ruangan</label></div>
                    <div class="col-md-5"><label class="value-text">_(( $pelayanan['poli'] ))</label></div>
                    <div class="col-md-3"></div>
                </div>
                <div class="input-group"> 
                    <div class="col-md-4 text-right"><label class="small-bold">Waktu Masuk</label></div>
                    <div class="col-md-5"><label class="value-text">_(( $pelayanan['tanggal_masuk'] ))</label></div>
                    <div class="col-md-3"></div>
                </div>
                <div class="input-group">
                    <div class="col-md-4 text-right"><label class="small-bold">Nama Lengkap</label></div>
                    <div class="col-md-8"><label class="value-text">_(( $pelayanan['nama_lengkap'] ))</label></div>
                </div>
                <div class="input-group">
                    <div class="col-md-4 text-right"><label class="small-bold">NIK</label></div>
                    <div class="col-md-8"><label class="value-text">_(( $pelayanan['nik'] ))</label></div>
                </div>
                <div class="input-group">
                    <div class="col-md-4 text-right"><label class="small-bold">Jenis Kelamin</label></div>
                    <div class="col-md-8"><div class="control">
                        @if($pelayanan['jenis_kelamin'] == 0)
                            <label class="badge badge-info">Laki-laki</label>
                        @else
                            <label class="badge badge-warning">Perempuan</label>
                        @endif
                    </div></div>
                </div>
                <div class="input-group">
                    <div class="col-md-4 text-right"><label class="small-bold">Tempat, Tanggal Lahir</label></div>
                    <div class="col-md-8"><label class="value-text">_(( $pelayanan['tempat_lahir'] ))</label>, _(( date("d M Y", strtotime($pelayanan['tanggal_lahir'])) ))</div>
                </div>
                <div class="input-group">
                    <div class="col-md-4 text-right"><label class="small-bold">Alamat</label></div>
                    <div class="col-md-8"><label class="value-text">_(( $pelayanan['alamat'] ))</label></div>
                </div>

                <div class="input-group">
                    <div class="col-md-4 text-right"><label class="small-bold">Umur</label></div>
                    <div class="col-md-4"><label class="value-text">_(( $pelayanan['umur'] )) Tahun</label></div>
                    <div class="col-md-4"></div>
                </div>
                <div class="input-group">
                    <div class="col-md-4 text-right"><label class="small-bold">No. BPJS</label></div>
                    <div class="col-md-8"><label class="value-text">_(( $pelayanan['no_bpjs'] ))</label>
                    <input type="hidden" value="_(( $pelayanan['id_pelayanan'] ))" name="id_pelayanan" />
                </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group">
                    <div class="col-md-3 text-right"><label class="small-bold">Dokter</label></div>
                    <div class="col-md-9">
                        <select class="form-control selectpicker" data-live-search="true" name="id_dokter" placeholder="Dokter">
                            <option data-tokens="" value="">--</option>
                            @foreach($dokter_list as $dokter)
                                <option data-tokens="_(( $dokter['nama_pegawai'] ))" value="_(( $dokter['id_pegawai'] ))" 
                                    _(( ($pelayanan['id_dokter'] == $dokter['id_pegawai'] ? 'selected' : STRING_EMPTY) ))
                                >_(( $dokter['nama_pegawai'] ))</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="input-group">
                    <div class="col-md-3 text-right"><label class="small-bold">Perawat</label></div>
                    <div class="col-md-9">
                        <select class="form-control selectpicker" data-live-search="true" name="id_perawat" placeholder="Perawat">
                            <option data-tokens="" value="">--</option>
                            @foreach($perawat_list as $perawat)
                                <option data-tokens="_(( $perawat['nama_pegawai'] ))" value="_(( $perawat['id_pegawai'] ))"
                                    _(( ($pelayanan['id_perawat'] == $perawat['id_pegawai'] ? 'selected' : STRING_EMPTY) ))
                                >_(( $perawat['nama_pegawai'] ))</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="input-group">
                    <div class="col-md-3 text-right"><label class="small-bold">Keluhan</label></div>
                    <div class="col-md-9"><label class="value-text">_(( $pelayanan['keluhan'] ))</label></div>
                </div>
                <div class="input-group">
                    <div class="col-md-3 text-right"><label class="small-bold">Jenis Tindakan</label></div>
                    <div class="col-md-9">
                        <select name="jenis_tindakan" class="form-control selectpicker" data-live-search="true">
                            @foreach($jenis_tindakan as $row)
                                <option data-tokens="_(( $row['id'] ))" value="_(( $row['id'] ))" _(( $row['id'] == $pelayanan['id_jenis_tindakan'] ? 'selected' : '' ))>_(( $row['jenis'] ))</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="input-group">
                    <div class="col-md-3 text-right"><label class="small-bold">Tindakan</label></div>
                    <div class="col-md-9"><textarea class="form-control" name="tindakan" rows="3" placeholder="Tindakan ...">_(( $pelayanan['tindakan'] ))</textarea></div>
                </div>
                <div class="input-group">
                    <div class="col-md-3 text-right"><label class="small-bold">Resep Obat</label></div>
                    <div class="col-md-9"><textarea class="form-control" name="resep_obat" rows="3" placeholder="Resep Obat ...">_(( $pelayanan['resep_obat'] ))</textarea></div>
                </div>
                <div class="input-group">
                    <div class="col-md-3 text-right"><label class="small-bold">Jenis Triase ?</label></div>
                    <div class="col-md-9"><div class="control">
                            <label class="box text-white bg-danger"><input type="radio" name="triase" value="merah" 
                                _(( (($pelayanan['triase'] == 'merah') ? 'checked' : '') )) /> Merah</label>
                            <label class="box text-white bg-warning"><input type="radio" name="triase" value="kuning"
                                _(( (($pelayanan['triase'] == 'kuning') ? 'checked' : '') ))  /> Kuning</label>
                    </div></div>
                </div>
                <div class="input-group">
                    <div class="col-md-3 text-right"><label class="small-bold">Estimasi Waktu</label></div>
                    <div class="col-md-9"><input class="form-control" type="text" name="estimasi_waktu" placeholder="Contoh : 2 Jam 30 Menit ..."
                    value="_(( $pelayanan['estimasi_waktu'] ))"/></div>
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
                            <td><a href="_(( site('pelayanan/preview/'.$pelayanan['id_pelayanan']) ))" name="submit" value="hapus" class="btn btn-gray wid-100p"><< PASIEN</a></td>
                            <td><button name="submit" value="simpan" class="btn btn-success wid-100p">SIMPAN TINDAKAN</button></td>
                        </tr>
                        <tr>
                            <td><a href="_(( site('home') ))" class="btn btn-warning wid-100p">TUTUP</button></td>
                            <td><a href="_(( site('pelayanan') ))" class="btn btn-info wid-100p">BUAT BARU</a></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>