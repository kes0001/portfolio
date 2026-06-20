const drawerIcon = document.querySelector("#js-drawer-icon");
const drawerContent = document.querySelector("#js-drawer-content");

drawerIcon.addEventListener("click", function (e) {
  e.preventDefault();
  drawerIcon.classList.toggle("drawer-icon--checked");
  drawerContent.classList.toggle("drawer-content--checked");
});

document.addEventListener("DOMContentLoaded", () => {
  setUpFaqAccordion();
});

const setUpFaqAccordion = () => {
  const faqItems = document.querySelectorAll(".faq-item");
  const IS_OPEN = "is-open";

  faqItems.forEach((item) => {
    const head = item.querySelector(".faq-item__head");
    const body = item.querySelector(".faq-item__body");

    // 初期状態
    gsap.set(body, {
      height: 0,
      opacity: 0,
    });

    head.addEventListener("click", (event) => {
      if (item.classList.contains(IS_OPEN)) {
        // 閉じる処理
        item.classList.remove(IS_OPEN);
        closingAnim(body).restart();
      } else {
        // 開く処理
        item.classList.add(IS_OPEN);
        openingAnim(body).restart();
      }
    });
  });
};

const closingAnim = (body) =>
  gsap.to(body, {
    height: 0,
    opacity: 0,
    duration: 0.4,
    ease: "power3.out",
    overwrite: true,
  });

const openingAnim = (body) =>
  gsap.fromTo(
    body,
    {
      height: 0,
      opacity: 0,
    },
    {
      height: "auto",
      opacity: 1,
      duration: 0.4,
      ease: "power3.out",
      overwrite: true,
    }
  );

// スライダー
const swiper = new Swiper(".swiper", {
  spaceBetween: 62,
  // Optional parameters;
  loop: true,
  // If we need pagination
  pagination: {
    el: ".swiper-pagination",
  },

  // Navigation arrows
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  slidesPerView: 1, // ウィンドウ幅が600未満の時の表示枚数
  breakpoints: {
    600: {
      // ウィンドウ幅が600以上の時の表示枚数
      slidesPerView: 2,
    },

    960: {
      // ウィンドウ幅が600以上の時の表示枚数
      slidesPerView: 3,
    },
  },
});
