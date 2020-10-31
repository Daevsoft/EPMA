<form action="_(( site('pencarian/index/true') ))" method="POST">
<table class="content-head">
    <tr>
        <td><input class="form-control" id="txt-search" name="keyword" placeholder="cari pasien ..." /></td>
        <td><button class="btn btn-info" type="submit"><span class="fa fa-search"></span>CARI</button></td>
    </tr>
</table>
</form>
<div class="content">
    <table class="table table-bordered table-light table-hover table-striped table-custome">
        <thead class="thead-dark">
            <tr>
                <th class="max-10">No.</th>
                <th class="max-10"></th>
                <th>Nama Pasien</th>
                <th class="wid-10">BPJS</th>
                <th class="max-30">NIK</th>
                <th class="wid-20">Usia</th>
                <th class="max-30">Tempat Lahir</th>
                <th class="max-30">Tgl Lahir</th>
                <th class="max-100">Alamat</th>
                <th class="max-100">Total<br>Riwayat</th>
            </tr>
        </thead>
        <tbody>
            << $i = 1 >>
            @foreach($pasien_list as $pasien)
                <tr>
                    <td class="text-center">_(( $i ))</td>
                    <td><a href="_(( site('pelayanan/buat_baru/'.$pasien['no_bpjs']) ))" target="_blank" class="button-success">BUAT BARU</a></td>
                    <td onclick="preview('_(( $pasien['no_bpjs'] ))')">_(( $pasien['nama_lengkap'] ))</td>
                    <td onclick="preview('_(( $pasien['no_bpjs'] ))')">_(( $pasien['no_bpjs'] ))</td>
                    <td>_(( $pasien['nik'] ))</td>
                    <td>_(( $pasien['umur'] )) Thn</td>
                    <td>_(( $pasien['tempat_lahir'] ))</td>
                    <td>_(( date('d/m/Y', strtotime($pasien['tanggal_lahir'])) ))</td>
                    <td>_(( $pasien['alamat'] ))</td>
                    <td class="text-center">_(( $pasien['total_riwayat'] ))x</td>
                </tr>
                << $i++ >>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    function preview(bpjs){
        document.location = "_(( site('pasien/edit/') ))"+bpjs;
    }
</script>