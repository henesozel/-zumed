<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

</head>


<body>


<h3 align="center">Etkinlik</h3>
<br><br>


<table class="tablo1" border="0" width="500">




    <tr>

        <td><label><strong>Baslik</strong></label></td>
        <td>:</td>
        <td><label><strong>{{ $sorgu->baslik  }}</strong></label>
        <td></td>

    </tr>

    <tr>

        <td><label><strong>Etkinlik Tanimi</strong></label></td>
        <td>:</td>
        <td><label><strong>{{ $sorgu->etkinlikTanimi  }}</strong></label>
        <td></td>

    </tr>

    <tr>

        <td><label><strong>Ucret</strong></label></td>
        <td>:</td>
        <td><label><strong>{{ $sorgu->ucret  }} TL</strong></label>
        <td></td>

    </tr>

    <tr>

        <td><label><strong>Kisi Sayisi</strong></label></td>
        <td>:</td>
        <td><label><strong>{{ $sorgu->kisiSayisi  }}</strong></label>
        <td></td>

    </tr>



</table>






</body>
</html>
