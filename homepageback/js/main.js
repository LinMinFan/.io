$(document).ready(function () {
    $("#do_login").click(function () {
        closeLoginInfo();
        $(this).parent().find('span').css("display", "none");
        $(this).parent().find('span').removeClass("i-save");
        $(this).parent().find('span').removeClass("i-warning");
        $(this).parent().find('span').removeClass("i-close");

        var proceed = true;
        $("#login_form input").each(function () {

            if (!$.trim($(this).val())) {
                $(this).parent().find('span').addClass("i-warning");
                $(this).parent().find('span').css("display", "block");
                proceed = false;
            }
        });

        if (proceed) //everything looks good! proceed...
        {
            $(this).parent().find('span').addClass("i-save");
            $(this).parent().find('span').css("display", "block");
        }
    });

    //reset previously results and hide all message on .keyup()
    $("#login_form input").keyup(function () {
        $(this).parent().find('span').css("display", "none");
    });

    openLoginInfo();
    setTimeout(closeLoginInfo, 1000);
});

function openLoginInfo() {
    $(document).ready(function () {
        $('.b-form').css("opacity", "0.01");
        $('.box-form').css("left", "-37%");
        $('.box-info').css("right", "-37%");
    });
}

function closeLoginInfo() {
    $(document).ready(function () {
        $('.b-form').css("opacity", "1");
        $('.box-form').css("left", "0px");
        $('.box-info').css("right", "-5px");
    });
}

$(window).on('resize', function () {
    closeLoginInfo();
});


// login logout

function reset() {
    $('#acc').val("");
    $('#pw').val("");
  }

  function login() {
    let acc = $('#acc').val();
    let pw = $('#pw').val();
    $.post("./api/chk_acc.php", {
      acc,
      pw
    }, (chkacc) => {
      if (Number(chkacc) == 1) {
        location.href = "./back.php";
      } else {
        alert("查無帳號密碼");
      }
    })
  }

  function logout() {
	$.get("./api/logout.php");
	location.reload();
}


//forgot

function forgot(){
    $('#mmodal').fadeIn();
    $('#modalcontent').load("./modal/forgot.php");
  }

function cl(){
  $('#mmodal').fadeOut();
}

function findpw() {
        let findpw=$('#findpw').val();
    $.get("./api/find_pw.php",{findpw},(result)=>{
        alert(result)
    })
}

function frest(){
    $('#findpw').val("");
}


//res

function reg(){
    $('#mmodal').fadeIn();
    $('#modalcontent').load("./modal/reg.php");
  }

function adacc() {
    let newacc=$('#newacc').val();
    let newpw=$('#newpw').val();
    let newpw2=$('#newpw2').val();
    if (newpw!=newpw2) {
        alert("確認密碼錯誤")
    }else {
        $.post("./api/reg_acc.php",{newacc,newpw},(chkacc)=>{
            if (Number(chkacc)==1) {
                alert("帳號已存在");
            }else {
                alert("註冊成功");
            }
        })
    }
}

//back

function bk(x){
    $('#mmodal').fadeIn();
    $('#modalcontent').load(x);
  }

function logout() {
    if (confirm("確定登出嗎？")) {
        location.href="./api/logout.php";
    }
}  