<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


</head>

<body>


                            <h3 align="center">CV</h3>
                                   <br><br>


                                <table class="tablo1" border="0" width="500">


                                    <tr>

                                        <td colspan="3"><img  src="uploads/img/{{$sorgu->resim}}" width="100" height="100"/></td>
                                        <br><br>
                                    </tr>



                                    <tr>

                                        <td><label><strong>Ad</strong></label></td>
                                        <td>:</td>
                                        <td><label><strong>{{ $mezunSorgu->ad  }}</strong></label>
                                        <td></td>

                                    </tr>

                                    <tr>

                                        <td><label><strong>Soyad</strong></label></td>
                                        <td>:</td>
                                        <td><label><strong>{{ $mezunSorgu->soyad  }}</strong></label>
                                        <td></td>

                                    </tr>


                                    <tr>

                                        <td><label><strong>Email</strong></label></td>
                                        <td>:</td>
                                        <td><label><strong>{{ $mezunSorgu->email }}</strong></label>
                                        <td></td>

                                    </tr>


                                    <tr>

                                        <td><label><strong>Telefon</strong></label></td>
                                        <td>:</td>
                                        <td><label><strong>{{ $mezunSorgu->telefon }}</strong></label>
                                        <td></td>

                                    </tr>


                                    <tr>

                                        <td><label><strong>Egitim Bilgileri</strong></label></td>
                                        <td>:</td>
                                        <td><label><strong>{{ $sorgu->egitim_bilgileri }}</strong></label>
                                        <td></td>

                                    </tr>

                                    <tr>

                                        <td><label><strong>Yabanci Dil</strong></label></td>
                                        <td>:</td>
                                        <td><label><strong>{{ $sorgu->yabanci_dil  }}</strong></label>
                                        <td></td>

                                    </tr>


                                    <tr>

                                        <td><label><strong>Kisisel Bilgiler</strong></label></td>
                                        <td>:</td>
                                        <td><label><strong>{{ $sorgu->kisisel_bilgiler  }}</strong></label>
                                        <td></td>

                                    </tr>

                                    <tr>

                                        <td><label><strong>Bilgisayar Bilgisi</strong></label></td>
                                        <td>:</td>
                                        <td><label><strong>{{ $sorgu->bilgisayar_bilgisi  }}</strong></label>
                                        <td></td>

                                    </tr>

                                    <tr>

                                        <td><label><strong>Sertifikalar</strong></label></td>
                                        <td>:</td>
                                        <td><label><strong>{{ $sorgu->sertifikalar }}</strong></label>
                                        <td></td>

                                    </tr>
                                    <tr>

                                        <td><label><strong>Referanslar</strong></label></td>
                                        <td>:</td>
                                        <td><label><strong>{{ $sorgu->referanslar }}</strong></label>
                                        <td></td>

                                    </tr>

                                    <tr>

                                        <td><label><strong>Calisilmak Istenilen Alanlar</strong></label></td>
                                        <td>:</td>
                                        <td><label><strong>{{ $sorgu->alanlar }}</strong></label>
                                        <td></td>

                                    </tr>


                                    <tr>

                                        <td><label><strong>Kariyer Hedefi</strong></label></td>
                                        <td>:</td>
                                        <td><label><strong>{{ $sorgu->kariyer_hedefi }}</strong></label>
                                        <td></td>

                                    </tr>




                                </table>






</body>
</html>
