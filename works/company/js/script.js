const swiper = new Swiper(".swiper", {
  // Optional parameters
  loop: true,

  // If we need pagination
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },

  // Navigation arrows
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

new WOW().init();

jQuery(".drawer-icon").on("click", function (e) {
  e.preventDefault();

  jQuery(".drawer-icon").toggleClass("is-active");
  jQuery(".drawer-content").toggleClass("is-active");
  jQuery(".drawer-background").toggleClass("is-active");

  return false;
});

jQuery('a[href^="#"]').on("click", function () {
  let header = jQuery("header").innerHeight();
  let id = jQuery(this).attr("href");
  let target = jQuery("#" == id ? "html" : id);
  let position = jQuery(target).offset().top - header;

  jQuery("html,body").animate(
    {
      scrollTop: position,
    },
    300
  );
});

// スクロール検知
jQuery(window).on("scroll", function () {
  // トップから100px以上スクロールしたら
  if (100 < jQuery(this).scrollTop()) {
    // is-showクラスをつける
    jQuery(".to-top").addClass("is-show");
  } else {
    // 100pxを下回ったらis-showクラスを削除
    jQuery(".to-top").removeClass("is-show");
  }
});

jQuery(".header-nav ul li a").click(function () {
  jQuery(".header-nav ul li a").removeClass("is-active");
  jQuery(this).addClass("is-active");
  return false;
});

jQuery(".qa-box-q").on("click", function () {
  jQuery(this).next().slideToggle();
  jQuery(this).children(".qa-box-icon").toggleClass("is-open");
});

jQuery(".js-close-button").on("click", function (e) {
  e.preventDefault();
  let target = jQuery(this).data("target");
  jQuery(target).hide();
});

jQuery(".js-open-button").on("click", function (e) {
  e.preventDefault();
  let target = jQuery(this).data("target");
  jQuery(target).show();
});
