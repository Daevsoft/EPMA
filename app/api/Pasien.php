<?php 
Api::register('pasien'); 

Api::request('/', function($_req, $sql){
    return ['response' => 'Created'];
});

Api::request('data', function($_req, dsModel $sql)
{
    Load::model('Pasien', 'pasien');
    $query = isset($_req['query']) ? $_req['query'] : STRING_EMPTY;
    $response = _get('pasien')->search($query);
    return [
        'message' => $response ? 'success' : 'failed',
        'response' => $response
    ];
});