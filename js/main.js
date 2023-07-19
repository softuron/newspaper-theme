$(document).ready(function(){
    $(".mob_menu").click(function(){
      $(".nav_menu").show(500);
      $(".close-mob").show(500);
      $(".mob_menu").hide(500);
    });
    $(".close").click(function(){
      $(".nav_menu").hide(500);
      $(".close-mob").hide(500);
      $(".mob_menu").show(500);
    });
    
    $(".desk_search").click(function(){
      $(".search_input").show();
      $(".front_date").hide();
    });
    $(".backicon").click(function(){
      $(".search_input").hide();
      $(".front_date").show();
    });
    
});