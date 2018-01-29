window.onbeforeunload = function () {
    var inputs = document.getElementsByTagName("INPUT");
    for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].type == "button" || inputs[i].type == "submit") {
            inputs[i].disabled = true;
            inputs[i].value = "Please wait...";
        }
    }
};

$(function() {
  $('a[href*="#"]:not([href="#"]).scroll_link').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

$(document).ready(function(){

/*$('#page_load').fadeOut(0);*/

  /*alert('working..');*/
  /*Form Input Effects by IAK*/
    $("form.join_form input[type='text'], form.join_form input[type='password'], form.join_form input[type='email']").focus(function(event){
      $(this).parent().find('.border').show();
      $(this).parent().find('span.floating-label').addClass('on_top');
    });
    $("form.join_form input[type='email'], form.join_form input[type='text'], form.join_form input[type='password']").blur(function(event){
      if($(this).val() != ""){
        $(this).parent().find('span.floating-label').addClass('on_top');
      }
      else{
        $(this).parent().find('span.floating-label').show();
        $(this).parent().find('span.floating-label').removeClass('on_top');
      }
      $(this).parent().find('.border').hide();
    });
    $('.floating-label').click(function(){
      $(this).parent().find('input').focus();
    });
    /*End->Form Input Effects by IAK*/
});

function UpScroll(){
  scr_pos = ($('html').scrollTop()-400);
  $('html').animate({scrollTop:scr_pos},750);
}
function DownScroll(){
  scr_pos = ($('html').scrollTop()+400);
  $('html').animate({scrollTop:scr_pos},750);
}

var lastScrollTop = 0;
$(window).scroll(function(event){
  var st = $(this).scrollTop();

  /*show and hide footer_strip, start from 1st service*/
  if(st >= 400){$('#bottom_strip').addClass('active')}else{$('#bottom_strip').removeClass('active')}
  
  /*Scroll to top button visibility*/
  if(st > 200){
    $('#scroll_to_top').fadeIn(500);
  }
  else{
    $('#scroll_to_top').fadeOut(500);
  }

  /*Header scroll fixing*/
  if (st > lastScrollTop){
     // downscroll code
     $('nav').removeClass('fxd', 1000);
     $('#Head_for_scroll').hide();
  } else {
    // upscroll code
    if($(window).scrollTop() > 100){
      $('nav').addClass('fxd', 1000);
      $('#Head_for_scroll').show();
    }
    else{
      $('nav').removeClass('fxd', 1000);
      $('#Head_for_scroll').hide();
    }
  }
   lastScrollTop = st;
});
