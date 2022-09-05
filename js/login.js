var counter = 1;
//registration
function See_pass()
{
   var txtpass = document.getElementById('pwd');
   if(counter == 1)
   {
        txtpass.setAttribute("type","text");
        counter--;
   }
   else
   {
    txtpass.setAttribute("type","password");
    counter++;
   }
}
function Show_Pass()
{
    var btnshow = document.getElementById('show_pass');
    var txtpass = document.getElementById('pwd').value;
    if(txtpass == ""){
        $(document).ready(function(){
            $('#show_pass').hide(100);
        });
    }else{
        btnshow.className = "trans_1";
        btnshow.style.display = "block";
    }
}

function checkpass(){
    var txtpass = document.getElementById('pwd').value;
    var txtcpass = document.getElementById('cpwd').value;
    var lbl = document.getElementById('pmatch');
    if(txtpass == txtcpass)
    {
        lbl.style.display = "block";
    }
    else
    {
        lbl.display = "none";
    }

}

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $('#fn').focusin(function(){
        $('.lbl-frm1').css("color","black");
    });
    $('#fn').focusout(function(){
        $('.lbl-frm1').css("color","rgb(90,90,90)");
    });
    $('#mn').focusin(function(){
        $('.lbl-frm2').css("color","black");
    });
    $('#mn').focusout(function(){
        $('.lbl-frm2').css("color","rgb(90,90,90)");
    });
    $('#ln').focusin(function(){
        $('.lbl-frm3').css("color","black");
    });
    $('#ln').focusout(function(){
        $('.lbl-frm3').css("color","rgb(90,90,90)");
    });
    $('#no_').focusin(function(){
        $('.lbl-frm5').css("color","black");
    });
    $('#no_').focusout(function(){
        $('.lbl-frm5').css("color","rgb(90,90,90)");
    });
    $('#email_').focusin(function(){
        $('.lbl-frm6').css("color","black");
    });
    $('#email_').focusout(function(){
        $('.lbl-frm6').css("color","rgb(90,90,90)");
    });

    $('#user').focusin(function(){
        $('.lbl-frm7').css("color","black");
    });
    $('#user').focusout(function(){
        $('.lbl-frm7').css("color","rgb(90,90,90)");
    });
    $('#pass').focusin(function(){
        $('.lbl-frm8').css("color","black");
    });
    $('#pass').focusout(function(){
        $('.lbl-frm8').css("color","rgb(90,90,90)");
    });
    $('#cpass').focusin(function(){
        $('.lbl-frm9').css("color","black");
    });
    $('#cpass').focusout(function(){
        $('.lbl-frm9').css("color","rgb(90,90,90)");
    });
    $('#cbq').focusin(function(){
        $('.lbl-frm10').css("color","black");
    });
    $('#cbq').focusout(function(){
        $('.lbl-frm10').css("color","rgb(90,90,90)");
    });
    $('#ans').focusin(function(){
        $('.lbl-frm11').css("color","black");
    });
    $('#ans').focusout(function(){
        $('.lbl-frm11').css("color","rgb(90,90,90)");
    });

    $('#mdl').click(function(){
        //var mdl = document.getElementById('mdl');
        //mdl.className = "mdl-container-out";
        $('#mdl').toggleClass("mdl-container-out");
        $('#my_div_error').slideUp(3000);
    });
});

