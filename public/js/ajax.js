$(function(){
  
  $(window).scroll(function () {
   if ($(this).scrollTop() > 200) $(".lentop").fadeIn();
   else $(".lentop").fadeOut();
 });

  $(".lentop").click(function () {
   $("body,html").animate({scrollTop: 0}, "slow");
 });

  $('.menu-btn').click(function(){
    $(this).find('i').toggleClass('fa-bars').toggleClass('fa-times');     
  });

  $('.menu-btn').click(function(){
    if($('.list-menu-mobile').is(":hidden")){  
      $(this).addClass('active');      
      $('.list-menu-mobile').slideDown(600);

    }
    else {
      $('.list-menu-mobile').slideUp(600);
      $(this).removeClass('active');
    }
  });

  $('.menu-mobile-drop').click(function(){
    if($('.menu-mobile-dropdown').is(":hidden")){  
      $('.menu-mobile-dropdown').slideDown(600);
    }
    else {
      $('.menu-mobile-dropdown').slideUp(600);
    }
  });

  $('.menu-mobile-user').click(function(){
    if($('.menu-mobile-logout').is(":hidden")){  
      $('.menu-mobile-logout').slideDown(600);

    }
    else {
      $('.menu-mobile-logout').slideUp(600);
    }
  });


  const $itemMenu = $('.js-item-menu');
  const active = 'active';

  $('.list-category li').first().addClass(active);

  $itemMenu.on('click', function() {

    var $this = $(this);

    $this.addClass(active).siblings().removeClass(active);

    const getAttrElement = $this.attr('data-id');

    const $selectedElement = $(getAttrElement);

    scrollToElement($selectedElement);
  });

  function scrollToElement(el) {
    var scrollElement = el || $(window.location.hash);

    if (scrollElement && scrollElement.length) {
      setTimeout(function () {
        const container = $('html, body');

        const top = scrollElement.offset().top - 60;

        container.animate({
          scrollTop: top
        }, 'slow');
      }, 1);
    }
  }
});