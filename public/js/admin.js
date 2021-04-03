
$(document).on('click', '.nenu_open', function(){
    $(this).find('.submenu_ul').removeClass('hidden')
    $(this).find('.nav_icon').removeClass('fa-plus').addClass('fa-minus animate-pulse ')
    $(this).addClass('menu_close').removeClass('nenu_open')
})

$(document).on('click', '.menu_close', function(){
   $(this).find('.submenu_ul').addClass('hidden')
   $(this).addClass('nenu_open').removeClass('menu_close')
   $(this).find('.nav_icon').addClass('fa-plus').removeClass('fa-minus animate-pulse')
})

$(document).on('click', '.item_has_submenu', function(){
   $('.item_has_submenu').not(this).each(function(){
      $(this).find('.submenu_ul').addClass('hidden');
      $(this).addClass('nenu_open').removeClass('menu_close')
      $(this).find('.nav_icon').addClass('fa-plus').removeClass('fa-minus animate-pulse')
   });
})

// this code is for hide user settings on click anywhere on the window
$(document).on('click', '.btn-user-options', function(){
   $('.user-options-div').removeClass('hidden')
})

$(document.body).click(function() {
   $('.user-options-div').addClass('hidden')
});

$(".user-options-div").click(function(e) {
   e.stopPropagation(); // This is the preferred method.
});

//Mobile menu 
$(document).on('click', '.mobile_menu_button_show', function(){
   $(this).addClass('mobile_menu_button_hide z-index').removeClass('mobile_menu_button_show')
   $('.sidebar_main_width').removeClass('sm_hidden').addClass('position_fixed');
})

$(document).on('click', '.mobile_menu_button_hide', function(){
   $(this).addClass('mobile_menu_button_show').removeClass('mobile_menu_button_hide')
   $('.sidebar_main_width').addClass('sm_hidden').removeClass('position_fixed');
})

// $(document.body).click(function() {
//    $('.sidebar_main_width').addClass('sm_hidden')
// });

// $(".sidebar_main").click(function(e) {
//    e.stopPropagation(); // This is the preferred method.
// });

// this function will run if the screen size meet the conditions
$(window).resize(() => {
   if($(window).width() > 640){
      $('.sidebar_main_width').addClass('sm_hidden').removeClass('position_fixed');
      $('.main-content').addClass('w-full').removeClass('w-4/5');
   }
})