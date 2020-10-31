<br><br>
<div class="form">
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
                    <div class="col-md-9"><label class="value-text">_(( $pelayanan['nama_dokter'] ))</label></div>
                </div>
                <div class="input-group">
                    <div class="col-md-3 text-right"><label class="small-bold">Perawat</label></div>
                    <div class="col-md-9"><label class="value-text">_(( $pelayanan['nama_perawat'] ))</label></div>
                </div>
                <div class="input-group">
                    <div class="col-md-3 text-right"><label class="small-bold">Keluhan</label></div>
                    <div class="col-md-9"><label class="value-text">_(( $pelayanan['keluhan'] ))</label></div>
                </div>
                <div class="input-group">
                    <div class="col-md-3 text-right"><label class="small-bold">Jenis Tindakan</label></div>
                    <div class="col-md-9"><label class="value-text">_(( $pelayanan['jenis_tindakan'] ))</label></div>
                </div>
                <div class="input-group">
                    <div class="col-md-3 text-right"><label class="small-bold">Tindakan</label></div>
                    <div class="col-md-9"><label class="value-text">_(( $pelayanan['tindakan'] ))</label></div>
                </div>
                <div class="input-group">
                    <div class="col-md-3 text-right"><label class="small-bold">Resep Obat</label></div>
                    <div class="col-md-9"><label class="value-text">_(( $pelayanan['resep_obat'] ))</label></div>
                </div>
                <div class="input-group">
                    <div class="col-md-3 text-right"><label class="small-bold">Jenis Triase ?</label></div>
                    <div class="col-md-9">
                        <div class="control">
                            @if($pelayanan['triase'] == 'merah')
                                <label class="box text-white bg-danger"> Merah</label>
                            @else
                                <label class="box text-white bg-warning"> Kuning</label>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="input-group">
                    <div class="col-md-3 text-right"><label class="small-bold">Status</label></div>
                    <div class="col-md-9">
                        <div class="control">
                            @if($pelayanan['status'])
                            <label class="badge badge-success">selesai</label>
                            @else
                            <label class="badge badge-default">belum selesai</label>
                            @endif
                        </div>
                    </div>
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
                            <td><a href="_(( site('pasien/edit/').$pelayanan['no_bpjs'] ))" class="btn btn-info wid-100p">EDIT PASIEN</a></td>
                            <td><a href="_(( site('pelayanan/edit_pelayanan_form/').$pelayanan['id_pelayanan'] ))" class="btn btn-warning wid-100p">EDIT PELAYANAN</a></td>
                            <td><a href="_(( site('tindakan/edit/').$pelayanan['id_pelayanan'] ))" class="btn btn-success wid-100p">_(( (string_empty($pelayanan['tindakan']) ? 'AMBIL' : 'EDIT') )) TINDAKAN</a></td>
                        </tr>
                        <tr>
                            <td><a href="_(( site('home') ))" class="btn btn-gray wid-100p">KEMBALI</a></td>
                            <td><a href="_(( site('pelayanan/hapus_pelayanan/').$pelayanan['id_pelayanan'] ))" class="btn btn-danger wid-100p">HAPUS DATA</a></td>
                            @if($pelayanan['status'] == 0)
                            <td><a href="_(( site('pelayanan/selesai_pelayanan/').$pelayanan['id_pelayanan'] ))" class="btn btn-primary wid-100p">SELESAI ?</a></td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>