//$("#denglu").click(function(){
//    $("#zhe").show();
//});
//$("#zhe").click(function(){
//   $("#zhe").hide();
//});
var denglu = $("#denglu");
var zhe = $("#zhe");
var login = $("#login");

denglu.click(function () {
    zhe.show();
});


zhe.click(function () {
    zhe.hide();
});
login.click(function () {
    event.stopPropagation();
});
var enroll = $("#enroll");
enroll.click(function () {
    event.stopPropagation();
});

var pwd = $("#pwd").val();
$("#send").click(function () {
//alert($("#email").val());
    var email = $("#email").val();
    $.post("api/email.php", {email: email}, function (data) {
//        alert(data);
        if (data == 1) {
            alert('邮件发送成功');
        } else if (data == 2) {
            alert('邮箱格式有误');
        } else if (data == 3) {
            alert('邮箱已经被注册');

        } else {
            alert('发送失败');
        }
    })
});

$("#add").click(function () {
    var code = $("#code").val();
    var pwd = $("#pwd").val();
    var email = $("#email").val();
    $.post("api/enroll.php", {code: code, pwd: pwd, email: email}, function (data) {
        if (data == 4) {
            alert('注册成功');
            $("#zhe").hide();
            $("#denglu").html('欢迎您');


        } else if (data == 2) {
            alert('邮件验证码错误');
        }
    });
});


$("#but").click(function () {
    var neirong = $("#neirong").val();
    var arid = $("#arid").attr('arid');



    if (!neirong == '') {
        $.post("api/pinglun.php", {neirong: neirong, arid: arid}, function (data) {

            if (data == 1) {
                alert('评论成功');
            } else {
                alert('评论失败');
            }
        })
    } else {
        alert('请填写评论内容');
    }

});

var off = 1;
var pagesize = 3;
$("#pjiazai").click(function () {
    var arid = $("#arid").attr('arid');
    off++;
    $.post('api/page.php', {off: off, pagesize: pagesize, arid: arid}, function (data) {

        if (data == 101) {
            off = 1;
            alert('出错了-101');
        }
        if(data == 102){
            alert('出错了-102');
        }
        
        var a = 0;
        var html = '';

 var data=JSON.parse(data);
        $.each(data, function (index,val)
        {
//            alert(content);
            a++;
            html += "<li><div><p>" + val.neirong + "</p><span>作者：" + val.uid +"</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>时间：" + val.time +"</span></div></li>";
        });

        if (a < 3) {
            $("#pjiazai").hide();
            $("#dibu").show();
        }
//        alert(html);
        $("#yuanshi ul").append(html);
    });
}
);

$("#adds").click(function(){
    var name = $("#names").val();
    var pwd = $("#pwds").val();
    var code = $("#codes").val();
    if(name=='' && pwd.length<6 && code.length!=4){
        alert('输入的格式有误');
    }else{
        $.post('api/login.php',{email:name,pwd:pwd,code:code},function(data){
            if(data==1){
                $("#denglu").hide();
                $("#huanying").show();
                $("#zhe").hide();
                $("#pinglun").show();
            }
            if(data == 5){
                alert('密码或用户名错误');
            }
        });
    }
    
});



       


  