var port = 3032;
var ping_hizi = 1000;
var ping_gecikme = 10000;

var app = require('express')();
var uzak_http = require('http');
var http = require('http').Server(app);

var bagli_kisi_sayisi = 0;

var io = require('socket.io').listen(http, {"pingTimeout":ping_gecikme, "pingInterval":ping_hizi});
require('events').EventEmitter.prototype._maxListeners = 0;


var mysql = require('mysql');
var db_ayar = {
    host: "127.0.0.1",
    port:"8889",
    user: "root",
    password: "root",
    database: "proje"
};


var db = mysql.createConnection(db_ayar);



db.connect(function (err){
    if(err){
        console.log("MySQL bağlantisi saglanamadi! - Hata: ", err);
    }else{
        console.log("MySQL baglantisi basariyla saglandi!");
    }
});


var bagli_kisi_sayisi=0;

io.on("connection", function(socket){
    // Kullanıcının login olma fonksiyonu
    socket.on("katil", function(soket_veri){
        var k_id = soket_veri.k_id;
        var soket_id = socket.id;

        socket.kullanici_id = k_id;

        if(typeof(k_id) != "undefined" && k_id != 0){
            db.query("INSERT INTO sokets (kullanici_adi, soket_id) VALUES ('"+ k_id +"', '"+ soket_id +"')", function(err, data, fields){
                if(err){
                    console.log("Bir MySQL hatasi olustu! - Hata: ", err);
                }else{
                    bagli_kisi_sayisi++;
                    console.log("Bagli kisi sayisi: ", bagli_kisi_sayisi);

                    console.log(k_id + " id'li kullanici baglandi! - Soket ID: " + soket_id);
                }
            });
        }
    });

    // Mesaj alma fonksiyonu
    socket.on("mesaj_gonder", function(mesaj_veri){
        var gkisi = mesaj_veri.kime;

        var mesaj = mesaj_veri.mesaj;

        console.log(mesaj+"  kimden "+gkisi1);

        if(gkisi != socket.kullanici_id){
            db.query("SELECT socket_id FROM sokets WHERE kullanici_adi = '"+ gkisi +"' ORDER BY id DESC LIMIT 1", function (err, data, fields){
                if(!err){
                    if(data.length > 0){
                        var gonderilecek_soket = data[0].socket_id;

                        io.sockets.connected[gonderilecek_soket].emit("yeni_mesaj", {kimden:gkisi, mesaj: mesaj});


                        console.log(mesaj+"  kimden "+gkisi1);
                    }
                }
            });
        }
    });

    // Kullanıcı ayrıldığında
    socket.on("disconnect", function (){
        if(typeof(socket.kullanici_id) != "undefined"){
            if(bagli_kisi_sayisi > 0){
                bagli_kisi_sayisi--;
                console.log("Bagli kisi sayisi: ", bagli_kisi_sayisi);
            }

            db.query("DELETE FROM sokets WHERE kullanici_adi = '"+ socket.kullanici_id +"'", function (err, p1, p2){
                if(!err){
                    console.log(socket.kullanici_id + " id'li kullanici ayrildi!");
                }
            });
        }
    });
});


http.listen(port, function (){
    console.log(port + " portu acildi ve kullanima hazir!");
});