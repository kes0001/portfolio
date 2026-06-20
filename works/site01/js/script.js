// ドロワーメニューのJavaScriptでの実装方法
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

// // 診療時間の設定
// const CLINIC_HOURS = {
//     morning: {
//         start: "09:30",
//         end: "13:30",
//     },
//     afternoon: {
//         start: "15:00",
//         end: "21:00",
//     },
// };

// // 休診日の設定（0: 日曜, 4: 木曜）
// const CLOSED_DAYS = [0, 4];

// // 日付入力フィールドの制限
// function setupDateInputs() {
//     const dateInputs = document.querySelectorAll('input[type="date"]');

//     dateInputs.forEach((input) => {
//         // 最小日を今日に設定
//         const today = new Date();
//         const minDate = today.toISOString().split("T")[0];
//         input.min = minDate;

//         // 休診日のチェック
//         input.addEventListener("change", function () {
//             const selectedDate = new Date(this.value);
//             const dayOfWeek = selectedDate.getDay();

//             // 通常の休診日（木曜・日曜）のチェック
//             if (CLOSED_DAYS.includes(dayOfWeek)) {
//                 console.log("休診日が選択されました:", this.value);
//                 alert("選択された日は休診日です。別の日を選択してください。");
//                 this.value = "";
//             }
//         });
//     });
// }

// // 時間入力フィールドの制限
// function setupTimeInputs() {
//     const timeInputs = document.querySelectorAll('input[type="time"]');

//     timeInputs.forEach((input) => {
//         input.addEventListener("change", function () {
//             const selectedTime = this.value;

//             // 午前の診療時間外チェック
//             if (selectedTime < CLINIC_HOURS.morning.start || (selectedTime > CLINIC_HOURS.morning.end && selectedTime < CLINIC_HOURS.afternoon.start) || selectedTime > CLINIC_HOURS.afternoon.end) {
//                 alert("選択された時間は診療時間外です。診療時間内の時間を選択してください。\n午前：9:30〜13:30\n午後：15:00〜21:00");
//                 this.value = "";
//             }
//         });
//     });
// }

// // ページ読み込み時に実行
// document.addEventListener("DOMContentLoaded", function () {
//     setupDateInputs();
//     setupTimeInputs();
// });
