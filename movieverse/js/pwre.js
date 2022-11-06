 

var new_pw,ps_ok;

$(document).ready(function(e) { 

	$(".pw_box").on("keyup", function(){ //check라는 클래스에 입력을 감지

		var self = $(this); 

		var userpw;

		if(self.attr("id") === "userpw"){ 

			userpw = self.val(); 

		} 

		

		$.post( //post방식으로 id_check.php에 입력한 userid값을 넘깁니다

			"pw_check_ajax.php",

			{ userpw : userpw }, 

			function(data){ 

				if(data){ //만약 data값이 전송되면

					self.parent().parent().find("#id_check").html(data); //div태그를 찾아 html방식으로 data를 뿌려줍니다.

					self.parent().parent().find("#id_check").css("color", "#F00"); //div 태그를 찾아 css효과로 빨간색을 설정합니다

				}

			}

		);

		

		

			

	});

$(".pw_boxs").on("keyup", function(){ //check라는 클래스에 입력을 감지

		var self = $(this); 

		

		if(self.attr("id") === "new_pw"){ 

			new_pw = self.val(); 

		} 

		

		if(self.attr("id") === "ps_ok"){ 

			ps_ok = self.val(); 

 

		if(new_pw==ps_ok){

			ps_ok='ok';

		}else{

			ps_ok='no';

		}

 

		

			$.post( //post방식으로 id_check.php에 입력한 userid값을 넘깁니다

			"pw_check_ajax.php",

			{ ps_ok : ps_ok }, 

			function(data){ 

				if(data){ //만약 data값이 전송되면

					self.parent().parent().find("#pw_check").html(data); //div태그를 찾아 html방식으로 data를 뿌려줍니다.

					self.parent().parent().find("#pw_check").css("color", "#F00"); //div 태그를 찾아 css효과로 빨간색을 설정합니다

				}

			}

		);

}

	});

 

 

});