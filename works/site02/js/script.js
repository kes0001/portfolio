// ドロワーメニュー
// 変数の宣言
const drawerIcon = document.querySelector("#js-drawer-icon");
const drawerContent = document.querySelector("#js-drawer-content");

// drawerIconが存在する場合 //
if (drawerIcon) {
    // クリックイベント //
    drawerIcon.addEventListener("click", function (e) {
        // デフォルトの動作をキャンセル //
        e.preventDefault();
        // クラスの切り替え //
        drawerIcon.classList.toggle("active");
        drawerContent.classList.toggle("active");
    });
}

// --- スワイパーの初期化 ---
// ページ内に複数のスライダーがあるため、それぞれ個別に設定します。
// fvスライダー
const fvSwiper = new Swiper(".fv__swiper", {
    loop: true,
    pagination: {
        el: ".fv__swiper .swiper-pagination", // 親要素を指定してセレクタを限定
        clickable: true,
    },
    navigation: {
        nextEl: ".fv__swiper .swiper-button-next", // 親要素を指定してセレクタを限定
        prevEl: ".fv__swiper .swiper-button-prev", // 親要素を指定してセレクタを限定
    },
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
});

// Info Banner スライダー
const infoBannerSwiper = new Swiper(".info-banner__swiper", {
    effect: "coverflow",
    loop: true,
    centeredSlides: true,
    slidesPerView: "auto",
    spaceBetween: 0,
    grabCursor: true,
    autoplay: {
        delay: 3500,
        disableOnInteraction: false,
    },
    coverflowEffect: {
        rotate: 0,
        stretch: 0, // ← ここも0に
        depth: 200,
        modifier: 1,
        slideShadows: false,
    },
    pagination: {
        el: ".info-banner__swiper .swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".info-banner__swiper .swiper-button-next",
        prevEl: ".info-banner__swiper .swiper-button-prev",
    },
    speed: 800,
});

// Enjoy スライダー
const enjoySwiper = new Swiper("#js-enjoy-swiper", {
    effect: "cards",
    loop: true,
    centeredSlides: true,
    slidesPerView: "auto",
    spaceBetween: 60,
    grabCursor: true,
    autoplay: {
        delay: 3500,
        disableOnInteraction: false,
    },
    cardsEffect: {
        slideShadows: true,
    },
    pagination: {
        el: "#js-enjoy-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: "#js-enjoy-next",
        prevEl: "#js-enjoy-prev",
    },
    speed: 800,
    // --- ↓ここから追加 ---
    // スライダーのコンテナやスライド要素が変更されたときに
    // Swiper自身を自動で更新させるオプション
    observer: true,
    observeParents: true,
    observeSlideChildren: true,
});

// Recipe スライダー
const recipeSwiper = new Swiper("#js-recipe-swiper", {
    effect: "coverflow",
    loop: true,
    centeredSlides: true,
    slidesPerView: "auto",
    spaceBetween: 60,
    grabCursor: true,
    autoplay: {
        delay: 3500,
        disableOnInteraction: false,
    },
    coverflowEffect: {
        rotate: 0,
        stretch: 200, // カード間の距離
        depth: 200, // 奥行き
        modifier: 1,
        slideShadows: true, // 影が不要ならfalse
    },
    pagination: {
        el: "#js-recipe-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: "#js-recipe-next",
        prevEl: "#js-recipe-prev",
    },
    speed: 800, // アニメーション速度（ms）
});

// --- ページトップへ戻るボタン ---
const toTopButton = document.querySelector("#js-to-top");

if (toTopButton) {
    // スクロールイベントを監視
    window.addEventListener("scroll", () => {
        // 画面の高さを取得
        const windowHeight = window.innerHeight;
        // 現在のスクロール量を取得
        const scrollY = window.scrollY;

        // 画面の高さより多くスクロールしたらボタンを表示
        if (scrollY > windowHeight) {
            toTopButton.classList.add("is-visible");
        } else {
            toTopButton.classList.remove("is-visible");
        }
    });

    // ボタンクリック時の動作
    toTopButton.addEventListener("click", (e) => {
        e.preventDefault(); // aタグのデフォルトの挙動（ページ先頭へ瞬時にジャンプ）を無効化
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    });
}

// --- 商品一覧のタブ切り替え ---
document.addEventListener("DOMContentLoaded", () => {
    const tabButtons = document.querySelectorAll(".products-tab__button");
    const tabContents = document.querySelectorAll(".products-tab__content");

    tabButtons.forEach((button) => {
        button.addEventListener("click", () => {
            const target = button.dataset.tab;

            // ボタンのis-active切替
            tabButtons.forEach((btn) => btn.classList.remove("is-active"));
            button.classList.add("is-active");

            // コンテンツのis-active切替
            tabContents.forEach((content) => {
                content.classList.toggle("is-active", content.classList.contains(target));
            });
        });
    });
});

//文字アニメーション
const intersectionObserver = new IntersectionObserver(function (entries, observer) {
    entries.forEach(function (entry) {
        if (entry.isIntersecting) {
            entry.target.classList.add("is-in-view");
            // 一度表示されたら、その要素の監視を停止する
            observer.unobserve(entry.target);
        }
    });
});

const inViewItems = document.querySelectorAll(".js-in-view");
inViewItems.forEach(function (inViewItem) {
    intersectionObserver.observe(inViewItem);
});
