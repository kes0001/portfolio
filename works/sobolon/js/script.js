// ドロワーメニューのJavaScriptでの実装方法
// 変数の宣言
const drawerIcon = document.querySelector("#js-drawer-icon");
const drawerContent = document.querySelector("#js-drawer-content");

// drawerIcon と drawerContent が存在する場合 //
if (drawerIcon && drawerContent) {
  // クリックイベント //
  drawerIcon.addEventListener("click", (e) => {
    // デフォルトの動作をキャンセル //
    e.preventDefault();
    // クラスの切り替え //
    drawerIcon.classList.toggle("active");
    drawerContent.classList.toggle("active");
  });
}

// ページ内リンクに遷移する時ドロワーを閉じる //
if (drawerIcon && drawerContent) {
  document.querySelectorAll("#js-drawer-content a[href^='#']").forEach((anchor) => {
    anchor.addEventListener("click", () => {
      drawerIcon.classList.remove("active");
      drawerContent.classList.remove("active");
    });
  });
}
