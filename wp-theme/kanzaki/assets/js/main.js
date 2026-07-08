// JSが有効なときだけリビール演出を仕込む（無効でも全文表示される）
document.documentElement.classList.add("js");

const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

// ============================================================
// FVストロークワイプ
// 波形パスのstroke-dashoffsetを描画し、マスク越しに背景を見せる
// ============================================================
const heroElement = document.querySelector(".js-hero");
const heroWavePath = document.querySelector(".js-hero-wave");

if (heroElement && heroWavePath) {
  if (prefersReducedMotion) {
    heroElement.classList.add("is-photo");
    heroElement.classList.add("is-start");
  } else {
    const wavePathLength = heroWavePath.getTotalLength();
    const waveDuration = 2200;
    const waveStrokeWidth = 340; // viewBox(1920x1100)座標系での太さ

    heroWavePath.style.strokeWidth = `${waveStrokeWidth}px`;
    heroWavePath.style.strokeDasharray = `${wavePathLength} ${wavePathLength}`;
    heroWavePath.style.strokeDashoffset = `${wavePathLength}px`;

    const easeInOut = (t) => (t < 0.5 ? 2 * t * t : -1 + (4 - 2 * t) * t);
    let waveStartTime = null;

    const waveTick = (timestamp) => {
      if (!waveStartTime) waveStartTime = timestamp;
      const progress = Math.min((timestamp - waveStartTime) / waveDuration, 1);

      heroWavePath.style.strokeDashoffset = `${wavePathLength * (1 - easeInOut(progress))}px`;

      if (progress >= 0.15) heroElement.classList.add("is-photo");
      if (progress >= 0.6) heroElement.classList.add("is-start");
      if (progress < 1) requestAnimationFrame(waveTick);
    };

    requestAnimationFrame(waveTick);
  }
}

// ============================================================
// FVメインキャッチコピー：1文字ずつ出現
// 文字を span に分割し、--char-index で出現を時間差にする
// ============================================================
const heroTitle = document.querySelector(".p-top-hero__title");

if (heroTitle && !prefersReducedMotion) {
  // 全文をアクセシブルネームに退避し、分割した文字はスクリーンリーダーから隠す
  heroTitle.setAttribute("aria-label", heroTitle.textContent.replace(/\s+/g, " ").trim());

  let charIndex = 0;
  heroTitle.querySelectorAll(".p-top-hero__title-line").forEach((line) => {
    const chars = Array.from(line.textContent); // コードポイント単位で分割
    line.textContent = "";
    line.setAttribute("aria-hidden", "true");

    chars.forEach((char) => {
      const span = document.createElement("span");
      span.className = "p-top-hero__char";
      span.textContent = char;
      span.style.setProperty("--char-index", charIndex);
      line.appendChild(span);
      charIndex += 1;
    });
  });
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
    try {
      await navigator.clipboard.writeText(copyMailButton.dataset.mail);
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
