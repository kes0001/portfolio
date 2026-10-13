// JSが有効なときだけリビール演出を仕込む（無効でも全文表示される）
document.documentElement.classList.add("js");

const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

// ============================================================
// FV入場演出のトリガー
// 「＋」モチーフの組み上がりと本文リビールはCSSアニメ/トランジションが担当。
// JSはクラスを付けるだけ（タイトルはLCPを遅らせないため即時リビール）。
// ============================================================
const heroElement = document.querySelector(".js-hero");

if (heroElement) {
  if (prefersReducedMotion) {
    heroElement.classList.add("is-photo");
    heroElement.classList.add("is-start");
  } else {
    requestAnimationFrame(() => {
      heroElement.classList.add("is-photo");
      window.setTimeout(() => heroElement.classList.add("is-start"), 150);
    });
  }
}

// ============================================================
// スクロールリビール
// ============================================================
const revealTargets = document.querySelectorAll(".js-reveal");

if (prefersReducedMotion) {
  revealTargets.forEach((target) => target.classList.add("is-visible"));
} else {
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("is-visible");
          observer.unobserve(entry.target);
        }
      });
    },
    // 下端の外側10%から先読みで発火し、速いスクロールでも空白画面を見せない
    { rootMargin: "0px 0px 10% 0px" }
  );

  revealTargets.forEach((target) => observer.observe(target));
}

// ============================================================
// ハンバーガーメニュー
// ============================================================
const burgerBtn = document.querySelector(".l-header__burger");
const headerNav = document.querySelector(".l-header__nav");

if (burgerBtn && headerNav) {
  const openMenu = () => {
    burgerBtn.setAttribute("aria-expanded", "true");
    burgerBtn.setAttribute("aria-label", "メニューを閉じる");
    headerNav.classList.add("is-open");
  };

  const closeMenu = () => {
    burgerBtn.setAttribute("aria-expanded", "false");
    burgerBtn.setAttribute("aria-label", "メニューを開く");
    headerNav.classList.remove("is-open");
  };

  burgerBtn.addEventListener("click", () => {
    const isOpen = burgerBtn.getAttribute("aria-expanded") === "true";
    if (isOpen) {
      closeMenu();
    } else {
      openMenu();
    }
  });

  // ナビリンクをタップしたら閉じる
  headerNav.querySelectorAll(".l-header__nav-link").forEach((link) => {
    link.addEventListener("click", closeMenu);
  });

  // ESCキーで閉じる
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && burgerBtn.getAttribute("aria-expanded") === "true") {
      closeMenu();
      burgerBtn.focus();
    }
  });
}

// ============================================================
// テーマ切り替え（OS設定に追従しつつ、手動トグルで上書き）
// 選択は localStorage に保存し、head内の初期化スクリプトが
// 描画前に data-theme を復元する（FOUC防止）
// ============================================================
const themeToggle = document.querySelector(".js-theme-toggle");

if (themeToggle) {
  const getCurrentTheme = () => {
    const manualTheme = document.documentElement.dataset.theme;
    if (manualTheme === "light" || manualTheme === "dark") return manualTheme;
    return window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
  };

  const updatePressedState = () => {
    themeToggle.setAttribute("aria-pressed", getCurrentTheme() === "dark" ? "true" : "false");
  };

  updatePressedState();

  themeToggle.addEventListener("click", () => {
    const nextTheme = getCurrentTheme() === "dark" ? "light" : "dark";
    document.documentElement.dataset.theme = nextTheme;
    localStorage.setItem("theme", nextTheme);
    updatePressedState();
  });
}

// ============================================================
// メールアドレスのコピー（メーラー未設定の閲覧環境向け）
// 結果は aria-live="polite" の status 領域で通知する
// ============================================================
const copyMailButton = document.querySelector(".js-copy-mail");
const copyMailStatus = document.querySelector(".js-copy-status");

if (copyMailButton && copyMailStatus) {
  let copyStatusTimerId = null;

  copyMailButton.addEventListener("click", async () => {
    // data-mail が正。なければ同じ枠内の mailto リンクから取得
    // （WP版はアドレスの編集箇所を mailto リンク1箇所に集約しているため）
    const mailToCopy =
      copyMailButton.dataset.mail ||
      copyMailButton
        .closest(".p-top-contact__mail")
        ?.querySelector('a[href^="mailto:"]')
        ?.getAttribute("href")
        .replace(/^mailto:/, "") ||
      "";

    try {
      await navigator.clipboard.writeText(mailToCopy);
      copyMailStatus.textContent = "メールアドレスをコピーしました";
    } catch {
      copyMailStatus.textContent = "コピーできませんでした";
    }

    clearTimeout(copyStatusTimerId);
    copyStatusTimerId = setTimeout(() => {
      copyMailStatus.textContent = "";
    }, 3000);
  });
}

// ============================================================
// フッターの年表示
// ============================================================
const yearElement = document.querySelector(".js-year");
if (yearElement) {
  yearElement.textContent = new Date().getFullYear();
}

// ============================================================
// ポインタ演出（マウス環境・動きを許可した環境のみ）
// 作品カードの傾き＋光の位置。
// 値を渡すだけで、見た目は CSS（pages/_motion.scss）が担当する
// ============================================================
const canUsePointerMotion =
  !prefersReducedMotion && window.matchMedia("(hover: hover) and (pointer: fine)").matches;

if (canUsePointerMotion) {
  // 作品カード：中心からのずれで最大4度傾け、光をポインタ位置に置く
  const maxTilt = 4;

  document.querySelectorAll(".c-card").forEach((card) => {
    card.addEventListener("pointermove", (event) => {
      const rect = card.getBoundingClientRect();
      const x = (event.clientX - rect.left) / rect.width;
      const y = (event.clientY - rect.top) / rect.height;

      card.style.setProperty("--card-rx", `${((0.5 - y) * maxTilt * 2).toFixed(2)}deg`);
      card.style.setProperty("--card-ry", `${((x - 0.5) * maxTilt * 2).toFixed(2)}deg`);
      card.style.setProperty("--card-mx", `${(x * 100).toFixed(1)}%`);
      card.style.setProperty("--card-my", `${(y * 100).toFixed(1)}%`);
    });

    card.addEventListener("pointerleave", () => {
      ["--card-rx", "--card-ry", "--card-mx", "--card-my"].forEach((name) => card.style.removeProperty(name));
    });
  });
}
