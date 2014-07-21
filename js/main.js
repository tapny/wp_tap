$j = jQuery.noConflict();

winTop = 0;
winHeight = 0;
mHeight = 0;


(function($j){
   $j.fn.moveBg = function() {
    $j(this).each(function(index) {
      var height = $j(this).height();
      var top = winTop - $j(this).offset().top;
      var num1 = winHeight - top;
      var num2 = top + height;
      var ratio = 1-Math.max(Math.min(num1 / (num1 + num2),1),0);
      $j(this).css({"background-position-y":(ratio*100)+"%"});
    });
   };
}(jQuery));


scrollFun = function() {
    winTop = $j(window).scrollTop();
    winHeight = $j(window).height();
    mHeight = 0; 
    $j(".image-parallax > div").moveBg();

    if (winTop <=0) {
      $j("#hamburger").addClass("top");
    } else {
      $j("#hamburger").removeClass("top");
    }
} 

$j(document).ready(function() {
  scrollFun();
  $j(window).bind("scroll resize",function() {
    scrollFun();
  });



var navHover;
$j(".nav-wrapper").hover(
  function() {
    navHover = setTimeout(function() {
      $j(".nav-wrapper").addClass("active");
    },500)
  },
  function() {
    clearTimeout(navHover);
    $j(this).removeClass("active");
  }
);

$j("#hamburger a:first").click(function() {
  $j(".nav-wrapper").toggleClass("active");
  return false;
});

$j("a.close").click(function() {
  clearTimeout(navHover);
  $j(this).closest(".active").removeClass("active");
  return false;
});

$j(".section-controls a.next").click(function() {
  var $jt = $j(this);
  $jt.parent().siblings(".section-list").css("transform","translate3d(-650px,0,0)");
  return false;
});
$j(".section-controls a.prev").click(function() {
  var $jt = $j(this);
  $jt.parent().siblings(".section-list").css("transform","translate3d(0,0,0)");
  return false;
});

$j(".box").click(function() {
  $j(this).toggleClass("active");
});


$j(".newsletter-form").find("input").focus(function() {
  console.log("test");
  $j(this).parent().parent().addClass("active");
});

updateScroll = function() {
  $j(".image-parallax");
}

if($j("#wpadminbar").length) {
  $j(".nav-wrapper").css("top","32px");
}

});
