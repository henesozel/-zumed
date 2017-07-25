var port = 3333;
var ping_hizi = 1000;
var ping_gecikme = 10000;

var app = require('express')();
var uzak_http = require('http');
var http = require('http').Server(app);



var io = require('socket.io').listen(http, {"pingTimeout":ping_gecikme, "pingInterval":ping_hizi});
require('events').EventEmitter.prototype._maxListeners = 0;


var mysql=require('mysql');
var db_ayar = {
    host: "127.0.0.1",
    port:"3306",
    user: "root",
    password: "",
    database: "bitirme"
};

var db = mysql.createConnection(db_ayar);


db.connect(function (err){
    if(err){
        console.log("MySQL bağlantisi saglanamadi! - Hata: ", err);
    }else{
        console.log("MySQL baglantisi basariyla saglandi!");
    }
});



io.on('connection', function(socket){



    socket.on('chat message', function(msg){

        //console.log("mesaj"+msg[0]+"  kimden:"+msg[1] +"kime " +msg[2]);


        db.query("INSERT INTO mesajs (mesaj_atan,mesaj_atilan,mesaj_icerigi,created_at) VALUES ('"+ msg[1] +"', '"+ msg[2] +"','"+ msg[0] +"','"+ msg[3] +"')", function(err, data, fields){

                        if(err){
                            console.log("Bir MySQL hatasi olustu! - Hata: ", err);
                        }else{
                            console.log('Kayit Basarili');
                        }

                    });



        io.emit('chat message1', msg);



    });


});



http.listen(port, function (){
    console.log(port + " portu acildi ve kullanima hazir!");
});