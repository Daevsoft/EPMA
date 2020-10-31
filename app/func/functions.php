<?php 
/*
	Write global functions here...
*/
// Example :
function page($_page, $data = [])
{
    FrontEnd::page($_page, $data);
}
function layout($title, $_page, $data){
	$head['title'] = $title;
	$head['menu'] = $data['menu'];
	$head['nama_petugas'] = _get('session')->get('user')['nama_pegawai'];
	page('ui/head.pie', $head);
	page($_page, $data);
	page('ui/footer.pie');
}
// Get page as string
function get_page($_page, $data = [])
{
	return get_view($_page, $data);
}
function app_name()
{
	return config('app_name');
}
function test($var)
{
	echo('<pre>');
	var_dump((is_string($var) ? htmlspecialchars($var) : $var));
	echo('</pre><br />');
}
function debug($var, $name='Test')
{
	echo $name;
	test($var);
	die();
}
function auth()
{
	if(!_get('session')->exist('user')) redirect('login');
}