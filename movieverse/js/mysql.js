var mysql = require('mysql');  // mysql 모듈 로드
var connection = mysql.createConnection({  // mysql 접속 설정s
    host : 'localhost',//host 객체
    port : '3306',
    user : 'root', //db계정
    password : 'ww990312',//db계정 비밀번호
    database : 'moviverse'//사용할 db 명
});
connection.connect(function(err) {
    if (err) throw err;
    console.log("연결되었습니다.");

    var sql = "INSERT INTO movie (movie_num, movie_name) VALUES ('2', 'test2')";

    connection.query(sql, function(err, result){
        if (err) throw err;
        console.log("값이 입력되었습니다.");
    });
});
