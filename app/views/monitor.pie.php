<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>_(( app_name() )) - _(( $title ))</title>
    _(( js_source('jquery.min') ))

    _(( css_source('bootstrap.min') ))
    _(( js_source('bootstrap.min') ))
    
    _(( css_source('sidebar') ))
    _(( css_source('monitor') ))
</head>
<body>
    <div class="container-fluid bg-monitor">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-hover table-custome">
                    <thead>
                        <tr>
                            <th class="max-10">No.</th>
                            <th class="max-10">Jam<br>Masuk</th>
                            <th>Nama Pasien</th>
                            <th class="wid-10">JK</th>
                            <th class="wid-10">Usia</th>
                            <th class="max-30">Poli/<br>Ruangan</th>
                            <th class="max-100">Dokter</th>
                            <th class="max-100">Perawat</th>
                            <th>Tindakan</th>
                            <th class="max-30">Estimasi<br>Waktu Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                    << $i = 1 >>
                    @foreach($pelayanan_list as $pasien)
                        <tr class="table-_(( ($pasien['triase'] == 'merah'? 'danger' : 'warning') ))">
                            <td class="text-center">_(( $i ))</td>
                            <td>_(( date('h:i a', strtotime($pasien['tanggal_masuk'])) ))</td>
                            <td>_(( $pasien['nama_lengkap'] ))</td>
                            <td>_(( ($pasien['jenis_kelamin'] == 0 ? 'L' : 'P') ))</td>
                            <td>_(( $pasien['umur'] )) Thn</td>
                            <td>_(( $pasien['poli'] ))</td>
                            <td>_(( $pasien['nama_dokter'] ))</td>
                            <td>_(( $pasien['nama_perawat'] ))</td>
                            <td>_(( $pasien['tindakan'] ))</td>
                            <td>_(( $pasien['estimasi_waktu'] ))</td>
                        </tr>
                        << $i++ >>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>