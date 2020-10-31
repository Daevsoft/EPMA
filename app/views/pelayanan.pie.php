<br><br>
<form class="form" method="post" action="_(( site('pelayanan/').$action ))" onsubmit="return validate()">
@if($action == 'edit_pelayanan')
<input type="hidden" name="id_pelayanan" value="_(( $pelayanan['id_pelayanan'] ))" />
@endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="input-group">
                    <div class="col-md-4 text-right"><label class="small-bold">Poli / Ruangan <b class="text-danger">*</b></label></div>
                    <div class="col-md-5"><input class="form-control" type="text" id="poli" name="poli" placeholder="Poli ..." 
                    value="_(( string_condition($pelayanan['poli']) ))" />
                    <datalist>
                        @foreach($poli_list as $poli)
                            <option>_(( $poli['poli'] ))</option>
                        @endforeach
                    </datalist>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <div class="input-group">
                    <div class="col-md-4 text-right"><label class="small-bold">Waktu Masuk</label></div>
                    <div class="col-md-5"><input class="form-control" type="text"
                    value="<< echo string_condition($pelayanan['tanggal_masuk'], date('d-m-Y h:i:s')) >>" name="tanggal_masuk" readonly /></div>
                    <div class="col-md-3"></div>
                </div>
                <div class="input-group">
                    <div class="col-md-4 text-right"><label class="small-bold">Nama Lengkap</label></div>
                    <div class="col-md-8"><input class="form-control" type="text"
                    value="_(( string_condition($pelayanan['nama_lengkap']) ))" name="nama_lengkap" placeholder="Nama Lengkap ..." /></div>
                </div>
                <div class="input-group">
                    <div class="col-md-4 text-right"><label class="small-bold">NIK</label></div>
                    <div class="col-md-8"><input class="form-control" type="text"
                    value="_(( string_condition($pelayanan['nik']) ))" name="nik" placeholder="NIK ..."/></div>
                </div>
                <div class="input-group">
                    <div class="col-md-4 text-right"><label class="small-bold">Jenis Kelamin</label></div>
                    <div class="col-md-8"><div class="control">

                        <label class="badge badge-info"><input type="radio" name="jenis_kelamin" value="0"
                        _(( (arr_value($pelayanan,'jenis_kelamin') == 0 ? 'checked': STRING_EMPTY) ))
                         />Laki-laki</label>
                        <label class="badge badge-warning"><input type="radio" name="jenis_kelamin" value="1"
                        _(( (arr_value($pelayanan,'jenis_kelamin') == 1 ? 'checked': STRING_EMPTY) )) />Perempuan</label>
                    </div></div>
                </div>
                <div class="input-group">
                    <div class="col-md-4 text-right"><label class="small-bold">Tempat, Tanggal Lahir</label></div>
                    <div class="col-md-3"><input class="form-control" type="text" name="tempat_lahir"
                    value="_(( arr_value($pelayanan, 'tempat_lahir') ))" placeholder="Tempat ..." /></div>
                    <div class="col-md-5"><input class="form-control" type="date" name="tanggal_lahir"
                    @if(isset($pelayanan))
                        value="_(( date('Y-m-d', strtotime(arr_value($pelayanan, 'tanggal_lahir'))) ))"
                    @endif
                    onchange="getAge(this.value)" /></div>
                </div>
                <div class="input-group">
                    <div class="col-md-4 text-right"><label class="small-bold">Alamat</label></div>
                    <div class="col-md-8">
                        <textarea class="form-control" type="text" name="alamat" rows="4" placeholder="Alamat ...">_(( string_condition($pelayanan['alamat']) ))</textarea></div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group">
                    <div class="col-md-4 text-right"><label class="small-bold">Umur</label></div>
                    <div class="col-md-4"><input class="form-control" id="umur" type="text" name="umur" placeholder="Umur"
                    value="_(( string_condition($pelayanan['umur']) ))"
                    onload="getAge(this.value)" readonly/></div>
                    <div class="col-md-4"></div>
                </div>
                <div class="input-group">
                    <div class="col-md-4 text-right"><label class="small-bold">No. BPJS <b class="text-danger">*</b></label></div>
                    <div class="col-md-8"><input id="no_bpjs" class="form-control" type="text" name="no_bpjs" placeholder="Nomor BPJS ..." value="_(( string_condition($pelayanan['no_bpjs']) ))"
                    _(( ($action == 'edit_pasien' || $action == 'edit_pelayanan' ? 'readonly': STRING_EMPTY) ))/></div>
                </div>
                <div class="input-group">
                    <div class="col-md-4 text-right"><label class="small-bold">Keluhan</label></div>
                    <div class="col-md-8"><textarea class="form-control" name="keluhan" rows="4" placeholder="Keluhan ..."
                    _(( ($action == 'edit_pasien' ? 'readonly': STRING_EMPTY) ))
                    >_(( string_condition($pelayanan['keluhan']) ))</textarea></div>
                </div>
                <div class="input-group">
                    <div class="col-md-4 text-right"><label class="small-bold">Jenis Triase ?</label></div>
                    <div class="col-md-8"><div class="control">
                        <label class="box text-white bg-danger"><input type="radio" id="tred" name="triase" value="merah"
                        _(( (string_condition($pelayanan['triase']) == 'merah' ? 'checked':STRING_EMPTY) ))
                        _(( ($action == 'edit_pasien' ? 'disabled': STRING_EMPTY) ))
                        /> Merah</label>
                        <label class="box text-white bg-warning"><input type="radio" id="tyellow" name="triase" value="kuning"
                        _(( (string_condition($pelayanan['triase']) == 'kuning' ? 'checked':'STRING_EMPTY') ))

                        @if($pelayanan['triase'] != 'kuning' && $pelayanan['triase'] != 'merah')
                            checked
                        @endif
                        _(( ($action == 'edit_pasien' ? 'disabled': STRING_EMPTY) ))
                        /> Kuning</label>
                    </div></div>
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
                            @if($action == 'edit_pelayanan')
                                <td><button name="submit" value="edit_tindakan" class="btn btn-warning wid-100p">UBAH TINDAKAN</button></td>
                                <td><button name="submit" value="edit_pelayanan" class="btn btn-success wid-100p">SIMPAN PERUBAHAN</button></td>
                            @else
                                <td><button name="submit" value="simpan" class="btn btn-primary wid-100p">SIMPAN</button></td>
                                <td><button name="submit" value="simpan_tindak" class="btn btn-success wid-100p">SIMPAN & TINDAKAN</button></td>
                            @endif
                        </tr>
                        <tr>
                            <td><a href="_(( site('home') ))" class="btn btn-gray wid-100p">BATAL</button></td>
                            <td><a href="_(( site('pelayanan') ))" class="btn btn-info wid-100p">BUAT BARU</a></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>
<script>
function getAge(mDate) {
    var diff_ms = Date.now() - Date.parse(mDate);
    var age_dt = new Date(diff_ms); 
  
    var result = Math.abs(age_dt.getUTCFullYear() - 1970);
    $('#umur').val(result);
}
function hapus(id) {
    document.location = "_(( site('pelayanan/hapus_pasien/') ))".id;
}
function validate() {
    let result = true;
    $msg = 'PERHATIAN : \n';
    if($('#poli').val() == ''){
        $msg += ' - Poli tidak boleh kosong!\n';
        result = false;
    }
    if($('#no_bpjs').val() == ''){
        $msg += ' - BPJS tidak boleh kosong!\n';
        result = false;
    }
    if(!result) alert($msg);
    return result;
}
</script>