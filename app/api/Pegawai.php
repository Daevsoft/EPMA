<?php 
Api::register('pegawai'); 

Api::request('/', function($_req, $sql){
    return ['response' => 'Created'];
});

Api::request('cari', function($_req, dsModel $sql)
{
    Load::model('Pegawai', 'pegawai');
    $query = isset($_req['query']) ? $_req['query'] : STRING_EMPTY;
    $response = _get('pegawai')->search($query);
    return [
        'message' => $response ? 'success' : 'failed',
        'response' => $response
    ];
});