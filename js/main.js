;
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
  if($progressBar && $progressBar.length)$progressBar.css({top:$slideshow.height()-5+"px"});
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
  $j(".newsletter").addClass("active");
});

updateScroll = function() {
  $j(".image-parallax");
}

if($j("#wpadminbar").length) {
  $j(".nav-wrapper").css("top","32px");
}

// Hero slider 
var $slideshow = $j(".hero-slide");
var $slideshowItems = $slideshow.find("li");
if($slideshowItems.length > 1) {
  $j(".hero").css("border-bottom","none");
  var currentSlide = 0;
  var timer;
  var duration = 7500;
  var $progressBar = $j(".progress");
  var $progressInner = $progressBar.find(".inner");
  $progressBar.css({top:$slideshow.height()-5+"px"});

  var makeActive = function(i) {
    
    $progressInner.stop().css(
      {width:"0px"}
    ).animate(
      {width:$slideshow.width()},duration,"linear"
    );
    $slideshowItems.removeClass("active next prev");
    $slideshowItems.eq(i%$slideshowItems.length).addClass("active");
    $slideshowItems.eq((i+1)%$slideshowItems.length).addClass("next");
    $slideshowItems.eq((i-1)%$slideshowItems.length).addClass("prev");
    clearTimeout(timer);
    timer = setTimeout(progressSlide,duration);
  }
  var progressSlide = function() {
    currentSlide += 1;
    makeActive(currentSlide);
    clearTimeout(timer);
    timer = setTimeout(progressSlide,duration);
  }

  $slideshow.find("a.prev").click(function() {
    currentSlide-=1;
    makeActive(currentSlide);
    clearTimeout(timer);
    timer = setTimeout(progressSlide,duration);
    return false;
  });
  $slideshow.find("a.next").click(function() {
    currentSlide+=1;
    makeActive(currentSlide);
    clearTimeout(timer);
    timer = setTimeout(progressSlide,duration);
    return false;
  });

  makeActive(currentSlide);
}


// Sidebar Tabs
var $sidebar = $j(".section-sidebar");
var $sidebarTabs = $sidebar.find(".sidebar-tabs li");
var $sidebarLists = $sidebar.find("ol.sidebar-list");
$sidebarTabs.find("a").click(function() {
  var $t = $j(this).parent("li");
  var i = $sidebarTabs.index($t);
  $sidebarTabs.removeClass("active");
  $sidebarLists.removeClass("active");
  $t.addClass("active");
  $sidebarLists.eq(i).addClass("active");
  return false;
});

//scroll down to event brite
$j(".eventbrite-button").click(function() {
    $j('html, body').animate({
        scrollTop: $j(".eventbrite").offset().top
    }, 500);
    return false;
});

});





