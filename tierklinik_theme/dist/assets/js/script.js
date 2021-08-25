$(document).ready(function () {
  let eventBanner = $('.wpem-event-single-image-wrapper'),
      eventTitle = $('.event-title')
  //mobile menu
  $(document).on("click", ".showMenu", function () {
    $(this).toggleClass("opened");
    $(".toggleMenu").toggleClass("menu-open");
    $("body").toggleClass("active-menu");
    $("html").toggleClass("overflow");
    $(".navbar-wrapper").toggleClass("navbar-open-menu");
  });
  $(document).on("click", ".overlayJs", function () {
    $(".showMenu").removeClass("opened");
    $(".toggleMenu").removeClass("menu-open");
    $("body").removeClass("active-menu");
    $("html").removeClass("overflow");
    $(".navbar-wrapper").removeClass("navbar-open-menu");
  });

  // sticky menu
  var objToStick = $(".navbar-wrapper");
  var topOfObjToStick = $(objToStick).offset().top;
  $(window).scroll(function () {
    var windowScroll = $(window).scrollTop();
    if (windowScroll > topOfObjToStick) {
      $(objToStick).addClass("navbar-sticky");
      $(objToStick).addClass("translateDown");
    } else {
      $(objToStick).removeClass("navbar-sticky");
      $(objToStick).removeClass("translateDown");
    }
  });

  //search button
  $(document).on("click", ".searchBox", function () {
    $(this).toggleClass("opened");
  });

  // emergency button
  $(document).on("click", ".emergencyOpen", function () {
    $(".emergency-btn").addClass("opened");
  });

  $(document).on("click", ".emergencyClose", function () {
    $(".emergency-btn").removeClass("opened");
    console.log("close");
  });

  //submenu mobile collapse
  $(document).on("click", ".menu-item-has-children", function (e) {
    $(".toggleMenu .submenu").not($(this).find(".submenu")).slideUp(300);
    $(this).find(".submenu").slideToggle(300);
  });

  // back top button
  var backtotop = $(".backtop-btn");
  backtotop.on("click", function (e) {
    e.preventDefault();
    $("html, body").animate({ scrollTop: 0 }, "300");
  });

  // slick
  $slickResizeSlider = false;
  function slickVeterinarianSlider() {
    if (window.matchMedia("(min-width: 681px)").matches) {
      if (!$slickResizeSlider) {
        $(".veterinarians.carousel").slick({
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
          arrows: true,
          prevArrow:
            "<button type='button' class='slick-prev pull-left'></button>",
          nextArrow:
            "<button type='button' class='slick-next pull-right'></button>",
          responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 2,
              },
            },
          ],
        });
        $slickResizeSlider = true;
      }
    } else {
      if ($slickResizeSlider) {
        $(".veterinarians.carousel").slick("unslick");
        $slickResizeSlider = false;
      }
    }
  }

  $(document).ready(function () {
    slickVeterinarianSlider();
  });
  $(window).on("resize", function () {
    slickVeterinarianSlider();
  });

  // Cookie section start
  function setCookie(name, value, expires, path, domain, secure) {
    document.cookie =
      name +
      "=" +
      escape(value) +
      (expires ? "; expires=" + expires : "") +
      (path ? "; path=" + path : "") +
      (domain ? "; domain=" + domain : "") +
      (secure ? "; secure" : "");
  }
  function getCookie(name) {
    var cookie = " " + document.cookie;
    var search = " " + name + "=";
    var setStr = null;
    var offset = 0;
    var end = 0;
    if (cookie.length > 0) {
      offset = cookie.indexOf(search);
      if (offset != -1) {
        offset += search.length;
        end = cookie.indexOf(";", offset);
        if (end == -1) {
          end = cookie.length;
        }
        setStr = unescape(cookie.substring(offset, end));
      }
    }
    if (setStr == "false") {
      setStr = false;
    }
    if (setStr == "true") {
      setStr = true;
    }
    if (setStr == "null") {
      setStr = null;
    }
    return setStr;
  }
  function hidePopup() {
    setCookie("popup_state", false);
    $(".cookieSectionJs").removeClass("show");
  }
  function checkPopup() {
    if (getCookie("popup_state") == null) {
      $(".cookieSectionJs").addClass("show");
    }
  }
  checkPopup();
  $(document).on("click", ".closeCookieJs", function () {
    hidePopup();
  });
  // Cookie section end

  // smooth link
  $(".alphabet").on("click", "a", function (event) {
    event.preventDefault();
    var id = $(this).attr("href"),
      top = $(id).offset().top;
    $("body,html").animate({ scrollTop: top }, 1500);
  });

  // open form
  $(".open-modal-form").on("click", function () {
    $(".section-application").slideDown("slow", function () {});
    $(".tax-dynamic-desc").slideUp("slow", function () {});

    $(".page-template-default .form-wrap").slideDown("slow", function () {});
    $(".paragraph_content").slideUp("slow", function () {});

    $(".btn.full-btn.bg-green").addClass("prev-btn");
    $(".btn.full-btn.bg-green").html(
      '<span class="arrow arrow-left mr-2"></span>Zurück'
    );
  });

  $(document).on("click", ".prev-btn", function (e) {
    e.preventDefault();

    $(".page-template-default .form-wrap").slideUp("slow", function () {});
    $(".paragraph_content").slideDown("slow", function () {});

    $(".btn.full-btn.bg-green").removeClass("prev-btn");
    $(".btn.full-btn.bg-green").html(
      '<span class="arrow arrow-left mr-2"></span>Home'
    );

    $(this).removeClass(".prev-btn");
  });

  $('.fltr').on('change', function(){
      console.log($(this).val())
  })

});
