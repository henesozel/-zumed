@php



    $nik = $sorgu->mezun_kart_id;
    $name =$sorgu->ad;
    $blog =$sorgu->soyad;
    $sns = $sorgu->cinsiyet;
    $upl = $sorgu->bolum;
    $jk = "";

    if($sorgu->resim!="")
    $foto = "uploads/img/".$sorgu->resim;

    else{
      $foto = "/resimler/user.png";
    }


    /*
    fungsi ini terbikin oleh lantip
    alias http://twitter.com/lantip.
    */
    $background = imagecreatefromjpeg("img/mezun_kart.jpg");
    $insert = imagecreatefromgif("img/ttd.gif");
    $image_info = getImageSize($foto) ; // see EXIF for faster way
     switch ($image_info['mime']) {
         case 'image/gif':
             if (imagetypes() & IMG_GIF)  { // not the same as IMAGETYPE
                 $insert2 = imageCreateFromGIF($foto) ;
             } else {
                 $ermsg = 'GIF images are not supported<br />';
             }
             break;
         case 'image/jpeg':
             if (imagetypes() & IMG_JPG)  {
                 $insert2 = imageCreateFromJPEG($foto) ;
             } else {
                 $ermsg = 'JPEG images are not supported<br />';
             }
             break;
         case 'image/png':
             if (imagetypes() & IMG_PNG)  {
                 $insert2 = imageCreateFromPNG($foto) ;
             } else {
                 $ermsg = 'PNG images are not supported<br />';
             }
             break;
         case 'image/wbmp':
             if (imagetypes() & IMG_WBMP)  {
                 $insert2 = imageCreateFromWBMP($foto) ;
             } else {
                 $ermsg = 'WBMP images are not supported<br />';
             }
             break;
         default:
             $ermsg = $image_info['mime'].' images are not supported<br />';
             break;
     }
    imagealphablending( $insert, false );
    imagesavealpha( $insert, true );
    imagecolortransparent($insert,imagecolorat($insert,0,0));
    imagecolortransparent($insert2,imagecolorat($insert2,0,0));
    $insert_x = imagesx($insert);
    $insert_y = imagesy($insert);
    $is = imagesx($insert2);
    $iy = imagesy($insert2);
    //$insert_x2 = imagesx($insert2);
    $iw = 100;
    $ih = imagesy($insert2) * 100 / imagesx($insert2);
    //$lokasi = "coba";
    $img_dst = imagecreatetruecolor( $iw, $ih );
    //imagecolortransparent($img_dst, imagecolorallocatealpha($img_dst, 0, 0, 0, 0));
    imagealphablending( $img_dst, false );
    imagesavealpha( $img_dst, true );
    imagecopyresized( $img_dst, $insert2, 0, 0, 0, 0, $iw, $ih, $is, $iy );
    imagecopymerge($background,$img_dst,330,130,0,0,$iw,$ih,100);
    //imagecopymerge($background,$insert,300,270,0,0,$insert_x,$insert_y,100);
    imagefttext($background,11,0,162,145,1,"OpenSans-Regular.ttf",$nik);
    imagefttext($background,11,0,162,183,1,"OpenSans-Regular.ttf",$name);
    imagefttext($background,11,0,162,230,1,"OpenSans-Regular.ttf",$blog);
    imagefttext($background,11,0,162,282,1,"OpenSans-Regular.ttf",$sns);
    imagefttext($background,11,0,162,330,1,"OpenSans-Regular.ttf",$upl);
    imagefttext($background,11,0,321,121,1,"OpenSans-Regular.ttf",$jk);

    header ("Content-type: image/png");
    imagepng($background);






@endphp