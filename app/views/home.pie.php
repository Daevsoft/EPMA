<form action="_(( site('home/index/true') ))" method="POST">
<table class="content-head">
    <tr>
        <td><a href="_(( site('pelayanan') ))" class="btn btn-success"><span class="fa fa-plus"></span> TAMBAH PASIEN</a></td>
        <td><input class="form-control" id="txt-search" name="search" placeholder="cari pasien ..." /></td>
        <td><button class="btn btn-info" type="submit"><span class="fa fa-search"></span>CARI</button></td>
    </tr>
</table>
</form>
<div class="content">
    <table class="table table-bordered table-light table-hover table-striped table-custome">
        <thead class="thead-dark">
            <tr>
                <th class="max-10">No.</th>
                <th class="wid-10"></th>
                <th>Nama Pasien</th>
                <th class="max-100">BPJS</th>
                <th class="max-10">Usia</th>
                <th class="max-10">Jam<br>Masuk</th>
                <th class="max-30">Estimasi<br>Waktu Selesai</th>
                <th class="max-30">Poli/<br>Ruangan</th>
                <th>Tindakan</th>
                <th class="max-100">Dokter</th>
                <th class="max-100">Perawat</th>
            </tr>
        </thead>
        <tbody>
            << $i = 1 >>
            @foreach($pelayanan_list as $pelayanan)
                <tr class="table-_(( ($pelayanan['triase'] == 'merah'? 'danger' : 'warning') ))" onclick="preview(_(( $pelayanan['id_pelayanan'] )) )">
                    <td class="text-center">_(( $i ))</td>
                    <td>
                        @if($pelayanan['status'] == 0)
                            <a href="_(( site('tindakan/edit/'.$pelayanan['id_pelayanan']) ))" class="button-success">TINDAK</a>
                        @endif
                    </td>
                    <td>_(( $pelayanan['nama_lengkap'] ))</td>
                    <td>_(( $pelayanan['no_bpjs'] ))</td>
                    <td>_(( $pelayanan['umur'] )) Thn</td>
                    <td>_(( date('h:i a', strtotime($pelayanan['tanggal_masuk'])) ))</td>
                    <td>_(( $pelayanan['estimasi_waktu'] ))</td>
                    <td>_(( $pelayanan['poli'] ))</td>
                    <td>_(( $pelayanan['tindakan'] ))</td>
                    <td>_(( $pelayanan['nama_dokter'] ))</td>
                    <td>_(( $pelayanan['nama_perawat'] ))</td>
                </tr>
                << $i++ >>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    function preview(id) {
        document.location = "_(( site('pelayanan/preview/') ))"+id;
    }
</script>