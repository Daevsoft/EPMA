<form action="_(( site('laporan/index/true') ))" method="POST">
<table class="content-head">
    <tr>
        <td><label>Dari</label></td>
        <td><input class="form-control" type="date" name="dari" /></td>
        <td><label>Sampai</label></td>
        <td><input class="form-control" type="date" name="sampai" /></td>
        <td><select class="form-control" name="berdasar">
            <option value="tanggal">HARIAN</option>
            <option value="bulan">BULANAN</option>
            <option value="tahun">TAHUNAN</option>
        </select></td>
        <td><button class="btn btn-info" type="submit"><span class="fa fa-search"></span>LIHAT</button></td>
        <td><span class="btn btn-success" id="btnExport" onclick="exportToExcel()">Ekspor ke Excel</span></td>
    </tr>
</table>
</form>
<div class="content">
    <table id="target_xls" style="border:1px solid black" class="table table-bordered table-light table-hover table-striped table-custome">
        <thead class="thead-dark">
            <tr>
                <th style="background-color: darkblue; color:white;" class="max-10">No.</th>
                <th style="background-color: darkblue; color:white;">_(( ucfirst($fillby) ))</th>
                <th style="background-color: darkblue; color:white;">Jenis Tindakan</th>
                <th style="background-color: darkblue; color:white;">Triase Merah</th>
                <th style="background-color: darkblue; color:white;">Triase Kuning</th>
                <th style="background-color: darkblue; color:white;">Pasien Laki-laki</th>
                <th style="background-color: darkblue; color:white;">Pasien Perempuan</th>
            </tr>
        </thead>
        <tbody>
            << $i = 0 >>
            @foreach($laporan_list as $row)
            << $i++ >>
            <tr>
                <td class="text-center">_(( $i )).</td>
                <td class="text-center">_(( $row['tanggal'] ))</td>
                <td class="text-center">_(( $row['jenis'] ))</td>
                <td class="table-danger text-center">_(( $row['triase_merah'] )) Pasien</td>
                <td class="table-warning text-center">_(( $row['triase_kuning'] )) Pasien</td>
                <td class="text-center">_(( $row['tlaki'] )) Laki-laki</td>
                <td class="text-center">_(( $row['tperempuan'] )) Perempuan</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
function exportToExcel(){
    var downloadurl;
    var dataFileType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById('target_xls');
    var tableHTMLData = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = 'EPMA-'+Date.now()+'.xls';
    
    // Create download link element
    downloadurl = document.createElement("a");
    
    document.body.appendChild(downloadurl);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTMLData], {
            type: dataFileType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadurl.href = 'data:' + dataFileType + ', ' + tableHTMLData;
    
        // Setting the file name
        downloadurl.download = filename;
        
        //triggering the function
        downloadurl.click();
    }
}
 
</script>