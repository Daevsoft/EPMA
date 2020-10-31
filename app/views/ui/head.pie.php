<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>_(( app_name() ))</title>
    _(( css_source('bootstrap.min') ))
    _(( css_source('bootstrap-select.min') ))
    _(( css_source('sidebar') ))
    _(( js_source('jquery.min') ))
    _(( css_source('style') ))

    <style>
        .home-home, .pelayanan-pelayanan, .pencarian-pencarian, .laporan-laporan{
                background-color:rgba(2,2,2,0.2);
        }
    </style>
</head>
<body>
    <div class="navigation">
        <div class="app-name">_(( app_name() ))</div>

        <div class="time" id="time">--:--</div>
        <div class="name-user">_(( $nama_petugas ))</div>

        <ul class="menu">
            <a href="_(( site('home') ))" class="home-_(( $menu ))"><li>DASHBOARD</li></a>
            <a href="_(( site('pelayanan') ))" class="pelayanan-_(( $menu ))"><li>PELAYANAN</li></a>
            <a href="_(( site('pencarian') ))" class="pencarian-_(( $menu ))"><li>PENCARIAN</li></a>
            <a href="_(( site('laporan') ))" class="laporan-_(( $menu ))"><li>LAPORAN</li></a>
            <a href="_(( site('monitor') ))" target="_blank"><li>MONITOR</li></a>
            <a href="_(( site('user/logout') ))"><li>LOGOUT</li></a>
        </ul>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 main-layout">
            <h3 class="title-bar"><b>_(( $title ))</b></h3>