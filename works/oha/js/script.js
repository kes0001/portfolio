// // jQuery
// jQuery("#js-drawer-icon").on("click", function (e) {
//   e.preventDefault();
//   jQuery("#js-drawer-icon").toggleClass("drawer-icon--checked");
//   jQuery("#js-drawer-content").toggleClass("drawer-content--checked");
// });

// javascript
// 変数の宣言
const drawerIcon = document.querySelector("#js-drawer-icon");
const drawerContent = document.querySelector("#js-drawer-content");

// drawerIconが存在する場合 //
if (drawerIcon) {
  // クリックイベント //
  drawerIcon.addEventListener("click", (e) => {
    // デフォルトの動作をキャンセル //
    e.preventDefault();
    // クラスの切り替え //
    drawerIcon.classList.toggle("drawer-icon--checked");
    drawerContent.classList.toggle("drawer-content--checked");
  });
}

// ページ内リンクに遷移する時ドロワーを閉じる //
document.querySelectorAll("#js-drawer-content a[href^='#']").forEach((anchor) => {
  anchor.addEventListener("click", (e) => {
    drawerIcon.classList.remove("drawer-icon--checked");
    drawerContent.classList.remove("drawer-content--checked");
  });
});

// accordion
jQuery(".js-accordion").on("click", function (e) {
  e.preventDefault();

  if (jQuery(this).parent().hasClass("qa-box--open")) {
    jQuery(this).parent().removeClass("qa-box--open");
    jQuery(this).next().slideUp();
  } else {
    jQuery(this).parent().addClass("qa-box--open");
    jQuery(this).next().slideDown();
  }
});

const swiper = new Swiper("#js-gallery-swiper", {
  spaceBetween: 70,
  // Optional parameters
  loop: true,

  // If we need pagination
  pagination: {
    el: "#js-gallery-pagination",
  },

  // Navigation arrows
  navigation: {
    nextEl: "#js-gallery-next",
    prevEl: "#js-gallery-prev",
  },
});

// モーダル
// jQuery(".js-modal-open").on("click", function (e) {
//   e.preventDefault();

//   jQuery("#js-about-modal")[0].showModal();
// });

// jQuery(".js-modal-close").on("click", function (e) {
//   e.preventDefault();

//   jQuery("#js-about-modal")[0].close();
// });

// モーダル javascript
const modalOpenItems = document.querySelectorAll(".js-modal-open");
const modalCloseItems = document.querySelectorAll(".js-modal-close");
const aboutModal = document.querySelector("#js-about-modal");

modalOpenItems.forEach(function (modalOpenItem) {
  modalOpenItem.addEventListener("click", function (e) {
    e.preventDefault();

    if (aboutModal) {
      aboutModal.showModal();
    }
  });
});

modalCloseItems.forEach(function (modalCloseItem) {
  modalCloseItem.addEventListener("click", function (e) {
    e.preventDefault();

    if (aboutModal) {
      aboutModal.close();
    }
  });
});

// スムーススクロール
// jQuery('#js-drawer-content a[href^="#"]').on("click", function (e) {
//   jQuery("#js-drawer-icon").removeClass("drawer-icon--checked");
//   jQuery("#js-drawer-content").removeClass("drawer-content--checked");
// });

// jQuery('a[href^="#"]').on("click", function (e) {
//   const speed = 1000;
//   const id = jQuery(this).attr("href");
//   const target = jQuery("#" == id ? "html" : id);
//   const position = target.offset().top;

//   jQuery("html, body").animate(
//     {
//       scrollTop: position,
//     },
//     speed,
//     "swing" // swing or linear
//   );
// });

// スムーススクロール
// 1. #js-drawer-content内のリンクがクリックされたときの処理
document.querySelectorAll('#js-drawer-content a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault(); // デフォルトのリンク動作を無効化
    document.querySelector("#js-drawer-icon").classList.remove("drawer-icon--checked"); // アイコンのクラスを削除
    document.querySelector("#js-drawer-content").classList.remove("drawer-content--checked"); // コンテンツのクラスを削除
  });
});

// 2. ページ内リンクがクリックされたときのスムーススクロール処理
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault(); // デフォルトのリンク動作を無効化
    const id = this.getAttribute("href"); // クリックされたリンクのhref属性を取得
    const target = document.querySelector(id === "#" ? "html" : id); // スクロール先のターゲット要素を取得
    const position = target.getBoundingClientRect().top + window.pageYOffset; // ターゲット要素の位置を計算

    // スムーススクロールを実行
    window.scrollTo({
      top: position, // スクロール先の位置
      behavior: "smooth", // スムーススクロールを指定
    });
  });
});

// ページトップボタンの表示制御
jQuery(window).on("scroll", function () {
  if (100 < jQuery(window).scrollTop()) {
    jQuery("#js-pagetop").addClass("is-show");
  } else {
    jQuery("#js-pagetop").removeClass("is-show");
  }
});

const pageTop = document.querySelector("#js-pagetop");

window.addEventListener("scroll", function () {
  if (100 < window.scrollY) {
    pageTop.classList.add("is-show");
  } else {
    pageTop.classList.remove("is-show");
  }
});

// Intersection Observer APIを使用して要素がビューポートに入ったときの処理
const intersectionObserver = new IntersectionObserver(function (entries) {
  entries.forEach(function (entry) {
    if (entry.isIntersecting) {
      entry.target.classList.add("is-in-view");
    } else {
      entry.target.classList.remove("is-in-view");
    }
  });
});

const inViewItems = document.querySelectorAll(".js-in-view");
inViewItems.forEach(function (inViewItems) {
  intersectionObserver.observe(inViewItems);
});
