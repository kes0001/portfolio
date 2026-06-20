// ドロワーメニューのJavaScriptでの実装方法
// 変数の宣言
const drawerButton = document.querySelector("#js-drawer-button"); // HTMLのIDに合わせる
const drawerContent = document.querySelector("#js-drawer-content");

// drawerButtonが存在する場合 //
if (drawerButton) {
    // クリックイベント //
    drawerButton.addEventListener("click", function (e) {
        // デフォルトの動作をキャンセル //
        e.preventDefault();
        // クラスの切り替え //
        drawerButton.classList.toggle("is-open");
        drawerContent.classList.toggle("is-open");
    });
}

// ページ内リンクをクリックした時にドロワーメニューを閉じる
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        // ドロワーメニューが開いている場合は閉じる
        if (drawerContent.classList.contains("is-open")) {
            drawerButton.classList.remove("is-open");
            drawerContent.classList.remove("is-open");
        }
    });
});

// // =============================
// // キャンペーンについてスライダー（帯スクロール）
// // =============================

// // swiper-wrapper を取得
// const aboutSwiperWrap = document.querySelector(".about__slider-wrapper");
// const aboutSwiperSlides = aboutSwiperWrap.querySelectorAll(".swiper-slide");

// // 無限ループのためスライドを複製（元の枚数を全部コピー）
// for (let slide of aboutSwiperSlides) {
//     aboutSwiperWrap.appendChild(slide.cloneNode(true));
// }

// // Swiper初期化
// const aboutSwiper = new Swiper(".about__slider", {
//     // ======================
//     // 基本の設定
//     // ======================

//     loop: true, // スライドを無限ループさせる（端まで行ったら先頭に戻す）
//     slidesPerView: "auto", // スライドの横幅をCSSで決める（自動で可変）
//     spaceBetween: 10, // 各スライド間の余白(px)
//     speed: 3000, // スライドが移動するアニメーションの所要時間（ms）
//     allowTouchMove: false, // 指やマウスでスワイプできないようにする（ユーザー操作で止まらない）
//     preventClicks: true, // クリック自体をキャンセル
//     preventClicksPropagation: true, // クリックのバブリングも止める

//     // ======================
//     // 自動再生（オートプレイ）
//     // ======================
//     autoplay: {
//         delay: 0, // スライド切り替えの待機時間。0にすると常時動き続ける
//         disableOnInteraction: false, // ユーザー操作後もオートプレイを止めない
//         pauseOnMouseEnter: false, // マウスホバーしても止めない
//     },

//     // ======================
//     // 自由モード（帯スクロール向け）
//     // ======================
//     freeMode: {
//         enabled: true, // スライド単位で止まらず、自由に流れるモードにする
//         momentum: false, // スワイプ後に惰性で流れる動きをオフにする（ベルトコンベア的に一定）
//     },

//     // ======================
//     // レスポンシブ対応
//     // ======================
//     breakpoints: {
//         900: {
//             spaceBetween: 20, // 画面幅900px以上ではスライド間余白を20pxに
//         },
//     },
// });

// =============================
// キャンペーンについてスライダー（帯スクロール）
// =============================

// 1) ラッパー(.swiper-wrapper)と中のスライドを取得
const aboutSwiperWrap = document.querySelector(".about__slider-wrapper");
const aboutSwiperSlides = aboutSwiperWrap.querySelectorAll(".about__slider-slide");

// 2) 一定速度で流れるように（端で減速しない）
aboutSwiperWrap.style.transitionTimingFunction = "linear";

// 3) 無限帯っぽく見せるために、元スライドを丸ごと複製して後ろに連結
//    例: 10枚 → (複製して) 20枚。帯が長くなり継ぎ目が目立たなくなる。
for (const slide of aboutSwiperSlides) {
    const cloned = slide.cloneNode(true); // 子要素(画像)まで含めてコピー
    aboutSwiperWrap.appendChild(cloned); // ラッパーの最後に追加
}

// 4) Swiperを初期化（帯向けの設定）
const aboutSwiper = new Swiper(".about__slider", {
    // ─ 基本挙動 ─
    loop: true, // 端まで行ったら先頭へ戻す（帯の途切れ防止）
    slidesPerView: "auto", // 横幅はCSS側で制御（可変に強い）
    spaceBetween: 10, // スライド間の余白
    speed: 3000, // アニメーション速度（数値↑＝ゆっくり常時スクロール）
    simulateTouch: false, // ★クリックで止まらない
    allowTouchMove: false, // ドラッグも禁止

    // ─ クリック由来の停止を避ける（帯はクリック不要の場合が多い）─
    preventClicks: true, // クリックをキャンセル
    preventClicksPropagation: true, // クリックの伝播も止める
    // ※ もしスライド内リンクを有効にしたい場合は、上2つをfalseにして
    //    CSSの pointer-events を外すか、必要要素だけ許可する実装に切替

    // ─ 自動再生（帯は常に流す）─
    autoplay: {
        delay: 0, // 待ち時間0＝常時流れる
        disableOnInteraction: false, // 操作後も止めない
        pauseOnMouseEnter: false, // ホバーで止めない
    },

    // ─ 帯スクロール向け：スライド単位で止めず“自由に”流す ─
    freeMode: {
        enabled: true, // スライドのスナップを無効化（連続的に流れる）
        momentum: false, // 慣性を切ってベルトコンベアのように一定速度
    },

    // ─ レスポンシブ（PCで余白を広げる）─
    breakpoints: {
        900: {
            spaceBetween: 20,
        },
    },
});

// // =============================
// // スポットのスライダー
// // =============================
// const spotsSwiper = new Swiper("#js-spots-swiper", {
//     loop: true, // ループ
//     spaceBetween: 16, // スライド間余白
//     slidesPerView: 1.5273, // 表示スライド枚数
//     centeredSlides: true, // アクティブなスライドを中央
//     centerInsufficientSlides: true,
//     autoHeight: false,
//     spaceBetween: 16,
//     pagination: { el: ".spots__pagination", clickable: true },
//     navigation: { nextEl: ".spots__button--next", prevEl: ".spots__button--prev" },

//     // ─ レスポンシブ（PCで余白を広げる）─
//     breakpoints: {
//         // 600px以上のオプション
//         600: {
//             slidesPerView: 2, // 表示スライド枚数
//             centeredSlides: true, // アクティブなスライドを中央
//         },
//         // 900px以上のオプション
//         900: {
//             slidesPerView: 3.2, // 表示スライド枚数
//             centeredSlides: false, // アクティブなスライドを中央
//         },
//         // 1200px以上のオプション
//         1200: {
//             spaceBetween: 32, // スライド間余白
//             slidesPerView: 3.3,
//             centeredSlides: false, // アクティブなスライドを中央
//         },
//     },
// });

// =============================
// スポットのスライダー
// =============================
const spotsSwiper = new Swiper("#js-spots-swiper", {
    loop: true, // ループ
    spaceBetween: 16, // スライド間余白
    slidesPerView: "auto", // ← ここを固定
    centeredSlides: true, // アクティブなスライドを中央
    centerInsufficientSlides: true,
    autoHeight: false,
    spaceBetween: 16,
    navigation: {
        nextEl: "#spots__button--next",
        prevEl: "#spots__button--prev",
    },

    // ─ レスポンシブ（PCで余白を広げる）─
    breakpoints: {
        // 600px以上のオプション
        600: {
            centeredSlides: true, // アクティブなスライドを中央
        },
        // 900px以上のオプション
        900: {
            centeredSlides: false, // アクティブなスライドを中央
        },
        // 1200px以上のオプション
        1200: {
            spaceBetween: 32, // スライド間余白
            centeredSlides: false, // アクティブなスライドを中央
        },
    },
});

// トップページ戻るボタン
const pageTop = document.querySelector("#js-page-top__button");

window.addEventListener("scroll", function () {
    if (200 < window.scrollY) {
        pageTop.classList.add("is-active");
    } else {
        pageTop.classList.remove("is-active");
    }
});

// ボタンがクリックされたら、ページトップにスムーズにスクロールする
pageTop.addEventListener("click", (e) => {
    e.preventDefault();
    window.scrollTo({
        top: 0,
        behavior: "smooth",
    });
});

// --- モーダル開閉 (標準JavaScript) ---
document.addEventListener("DOMContentLoaded", () => {
    // 開くトリガーとなる要素（すべての特典カード）
    const modalOpenTriggers = document.querySelectorAll(".prizes-card");
    // 閉じるボタン（すべてのモーダル内の閉じるボタン）
    const modalCloseButtons = document.querySelectorAll(".js-modal-close");
    // すべてのモーダル要素
    const modals = document.querySelectorAll(".p-prizes-modal");

    // 各特典カードにクリックイベントを設定
    modalOpenTriggers.forEach((trigger) => {
        trigger.addEventListener("click", (e) => {
            e.preventDefault();
            // data-modal-target属性からターゲットのセレクタを取得 (例: ".js-prizes-modal1")
            const targetSelector = trigger.dataset.modalTarget;
            const targetModal = document.querySelector(targetSelector);

            if (targetModal) {
                // 【変更点1】 showModal()を削除し、open属性を直接付与して表示する
                targetModal.setAttribute('open', ''); 
                
                // 背景のスクロールを禁止
                document.body.style.overflow = "hidden";
            }
        });
    });

    // 各閉じるボタンにクリックイベントを設定
    modalCloseButtons.forEach((button) => {
        button.addEventListener("click", () => {
            // クリックされたボタンが所属する一番近いモーダルを探して閉じる
            const modal = button.closest(".p-prizes-modal");
            if (modal) {
                // 【変更点2】 close()を削除し、open属性を削除してモーダルを閉じる
                modal.removeAttribute('open'); 
                
                // 背景のスクロール禁止を解除
                document.body.style.overflow = "";
            }
        });
    });

    // 各モーダルにクリックイベントを設定（背景クリックで閉じるため）
    modals.forEach((modal) => {
        modal.addEventListener("click", (e) => {
            // e.target はクリックされた要素
            // クリックされた要素がモーダル自身（背景）の場合のみ閉じる
            if (e.target === modal) {
                // 【変更点3】 close()を削除し、open属性を削除してモーダルを閉じる
                modal.removeAttribute('open'); 
                
                // 背景のスクロール禁止を解除
                document.body.style.overflow = "";
            }
        });
    });
});



// document.addEventListener("DOMContentLoaded", () => {
//     // 開くトリガーとなる要素（すべての特典カード）
//     const modalOpenTriggers = document.querySelectorAll(".prizes-card");
//     // 閉じるボタン（すべてのモーダル内の閉じるボタン）
//     const modalCloseButtons = document.querySelectorAll(".js-modal-close");
//     // すべてのモーダル要素
//     const modals = document.querySelectorAll(".p-prizes-modal");

//     // 各特典カードにクリックイベントを設定
//     modalOpenTriggers.forEach((trigger) => {
//         trigger.addEventListener("click", (e) => {
//             e.preventDefault();
//             // data-modal-target属性からターゲットのセレクタを取得 (例: ".js-prizes-modal1")
//             const targetSelector = trigger.dataset.modalTarget;
//             const targetModal = document.querySelector(targetSelector);

//             if (targetModal) {
//                 targetModal.showModal(); // dialog要素のshowModal()メソッドで表示
//                 // 背景のスクロールを禁止
//                 document.body.style.overflow = "hidden";
//             }
//         });
//     });

//     // 各閉じるボタンにクリックイベントを設定
//     modalCloseButtons.forEach((button) => {
//         button.addEventListener("click", () => {
//             // クリックされたボタンが所属する一番近いモーダルを探して閉じる
//             const modal = button.closest(".p-prizes-modal");
//             if (modal) {
//                 modal.close(); // dialog要素のclose()メソッドで閉じる
//                 // 背景のスクロール禁止を解除
//                 document.body.style.overflow = "";
//             }
//         });
//     });

//     // 各モーダルにクリックイベントを設定（背景クリックで閉じるため）
//     modals.forEach((modal) => {
//         modal.addEventListener("click", (e) => {
//             // e.target はクリックされた要素
//             // クリックされた要素がモーダル自身（背景）の場合のみ閉じる
//             if (e.target === modal) {
//                 modal.close();
//                 // 背景のスクロール禁止を解除
//                 document.body.style.overflow = "";
//             }
//         });
//     });
// });

// フォームのバリデーションチェック
document.addEventListener("DOMContentLoaded", () => {
    // --- お問い合わせフォームの送信処理 ---
    const contactForm = document.querySelector(".contact__form");

    if (contactForm) {
        contactForm.addEventListener("submit", function (event) {
            // デフォルトのフォーム送信をキャンセル
            // event.preventDefault();

            // フォームのバリデーションをチェック
            if (contactForm.checkValidity()) {
                // バリデーションがOKの場合
                alert("お問い合わせが送信されました。ありがとうございます！");
                // ここでフォームをリセット
                contactForm.reset();
            } else {
                // バリデーションがNGの場合
                // :user-invalid のスタイルを適用させるために、一度すべての要素を操作したことにする
                contactForm.reportValidity();
                alert("入力内容に誤りがあります。必須項目をご確認ください。");
            }
        });
    }
});
