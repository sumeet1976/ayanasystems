$(document).ready(function(){
  $(window).scroll(function(event){
    var st = $(this).scrollTop();
    highlight_service(st);
  });
});


function highlight_service(scroll_top){
  scroll_top+=200;

  if((scroll_top > $('#service_1').offset().top) && (scroll_top < $('#service_2').offset().top)){
    $('#service_1').addClass('service_active');
    $('#service_2').removeClass('service_active');
    $('#service_3').removeClass('service_active');
    $('#service_4').removeClass('service_active');
    $('#service_5').removeClass('service_active');
    $('#service_6').removeClass('service_active');
    $('#service_7').removeClass('service_active');
  }
  else if((scroll_top > $('#service_2').offset().top) && (scroll_top < $('#service_3').offset().top)){
    $('#service_1').removeClass('service_active');
    $('#service_7').removeClass('service_active');
    $('#service_3').removeClass('service_active');
    $('#service_4').removeClass('service_active');
    $('#service_5').removeClass('service_active');
    $('#service_6').removeClass('service_active');
    $('#service_2').addClass('service_active');
  }
  else if((scroll_top > $('#service_3').offset().top) && (scroll_top < $('#service_4').offset().top)){
    $('#service_2').removeClass('service_active');
    $('#service_1').removeClass('service_active');
    $('#service_4').removeClass('service_active');
    $('#service_5').removeClass('service_active');
    $('#service_6').removeClass('service_active');
    $('#service_7').removeClass('service_active');
    $('#service_3').addClass('service_active');
  }
  else if((scroll_top > $('#service_4').offset().top) && (scroll_top < $('#service_5').offset().top)){
    $('#service_2').removeClass('service_active');
    $('#service_3').removeClass('service_active');
    $('#service_1').removeClass('service_active');
    $('#service_5').removeClass('service_active');
    $('#service_6').removeClass('service_active');
    $('#service_7').removeClass('service_active');
    $('#service_4').addClass('service_active');
  }
  else if((scroll_top > $('#service_5').offset().top) && (scroll_top < $('#service_6').offset().top)){
    $('#service_2').removeClass('service_active');
    $('#service_3').removeClass('service_active');
    $('#service_4').removeClass('service_active');
    $('#service_1').removeClass('service_active');
    $('#service_6').removeClass('service_active');
    $('#service_7').removeClass('service_active');
    $('#service_5').addClass('service_active');
  }
  else if((scroll_top > $('#service_6').offset().top) && (scroll_top < $('#service_7').offset().top)){
    $('#service_2').removeClass('service_active');
    $('#service_3').removeClass('service_active');
    $('#service_4').removeClass('service_active');
    $('#service_5').removeClass('service_active');
    $('#service_1').removeClass('service_active');
    $('#service_7').removeClass('service_active');
    $('#service_6').addClass('service_active');
  }
  else if(scroll_top > $('#service_7').offset().top){
    $('#service_2').removeClass('service_active');
    $('#service_3').removeClass('service_active');
    $('#service_4').removeClass('service_active');
    $('#service_5').removeClass('service_active');
    $('#service_6').removeClass('service_active');
    $('#service_1').removeClass('service_active');
    $('#service_7').addClass('service_active');
  }
}