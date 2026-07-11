#!/bin/bash
# Local の「Open Site Shell」でリポジトリ直下から実行:
#   bash "<repo>/wp-theme/migration/import.sh"
# 再実行時は同スラッグの既存投稿を削除してから作成する。
set -euo pipefail
MIG_DIR="$(cd "$(dirname "$0")" && pwd)"

# ---- 01: ほぐしの森 ----
EXISTING=$(wp post list --post_type=works --name=hogushi --format=ids)
if [ -n "$EXISTING" ]; then wp post delete $EXISTING --force; fi
ID=$(wp post create "$MIG_DIR/content-hogushi.html" --post_type=works --post_status=publish \
  --post_title='ほぐしの森' --post_name=hogushi --menu_order=1 \
  --post_date='2026-01-01 10:00:00' --post_excerpt='リラクゼーションサロン「ほぐしの森」のランディングページデザインを担当した実案件。デザイン（Figma）を担当し、コーダーへの実装受け渡しまで行いました。' --porcelain)
wp post meta update $ID kanzaki_subtitle 'リラクゼーションサロンLP'
wp post meta update $ID kanzaki_eyebrow 'Works — LP Design（実案件）'
wp post meta update $ID kanzaki_category 'DESIGN'
wp post meta update $ID kanzaki_role 'デザイン（Figma）'
wp post meta update $ID kanzaki_tools 'Figma / Photoshop'
wp post meta update $ID kanzaki_highlight 'auto-layoutベースの、実装しやすいデザインデータ設計'
wp post meta update $ID kanzaki_site_url 'https://hogushi.salon/'
wp post meta update $ID kanzaki_badge '実案件'
wp media import '/Users/kes/Desktop/職業訓練データ/portfolio/images/work-hogushi.jpg' --post_id=$ID --featured_image --title='ほぐしの森'
echo "imported: hogushi (ID=$ID)"

# ---- 02: Spark Links ----
EXISTING=$(wp post list --post_type=works --name=spark-links --format=ids)
if [ -n "$EXISTING" ]; then wp post delete $EXISTING --force; fi
ID=$(wp post create "$MIG_DIR/content-spark-links.html" --post_type=works --post_status=publish \
  --post_title='Spark Links' --post_name=spark-links --menu_order=2 \
  --post_date='2026-01-02 10:00:00' --post_excerpt='架空の飲料メーカー「Spark Links」のブランドサイト。ペルソナ設計からデザイン・実装まで一貫して担当しました。' --porcelain)
wp post meta update $ID kanzaki_subtitle '架空の飲料メーカーサイト'
wp post meta update $ID kanzaki_eyebrow 'Works — Corporate Site'
wp post meta update $ID kanzaki_category 'WEB DESIGN'
wp post meta update $ID kanzaki_role 'デザイン・コーディング・ディレクション'
wp post meta update $ID kanzaki_tools 'Figma / Photoshop / Illustrator / HTML / SCSS / JavaScript'
wp post meta update $ID kanzaki_highlight '健康志向層などターゲットペルソナを設計し、訴求に落とし込んだ情報設計'
wp post meta update $ID kanzaki_site_url '/demo/site02/index.html'
wp post meta update $ID kanzaki_badge ''
wp media import '/Users/kes/Desktop/職業訓練データ/portfolio/images/work-sparklinks.webp' --post_id=$ID --featured_image --title='Spark Links'
echo "imported: spark-links (ID=$ID)"

# ---- 03: 笹塚スマイルクリニック ----
EXISTING=$(wp post list --post_type=works --name=sasazuka --format=ids)
if [ -n "$EXISTING" ]; then wp post delete $EXISTING --force; fi
ID=$(wp post create "$MIG_DIR/content-sasazuka.html" --post_type=works --post_status=publish \
  --post_title='笹塚スマイルクリニック' --post_name=sasazuka --menu_order=3 \
  --post_date='2026-01-03 10:00:00' --post_excerpt='架空の歯科医院のコーポレートサイト。安心感と、ユーザーが迷わず予約できる導線設計を重視して制作しました。' --porcelain)
wp post meta update $ID kanzaki_subtitle '架空の歯科医院サイト'
wp post meta update $ID kanzaki_eyebrow 'Works — Corporate Site'
wp post meta update $ID kanzaki_category 'WEB DESIGN'
wp post meta update $ID kanzaki_role 'デザイン・コーディング'
wp post meta update $ID kanzaki_tools 'HTML / SCSS / JavaScript'
wp post meta update $ID kanzaki_highlight '駅近・夜間診療の強みを直感的に伝える情報整理と、迷わせない予約導線の設計'
wp post meta update $ID kanzaki_site_url '/demo/site01/index.html'
wp post meta update $ID kanzaki_badge ''
wp media import '/Users/kes/Desktop/職業訓練データ/portfolio/images/work-sasazuka.jpg' --post_id=$ID --featured_image --title='笹塚スマイルクリニック'
echo "imported: sasazuka (ID=$ID)"

# ---- 04: デザインカンプからサイト制作 ----
EXISTING=$(wp post list --post_type=works --name=onomichi --format=ids)
if [ -n "$EXISTING" ]; then wp post delete $EXISTING --force; fi
ID=$(wp post create "$MIG_DIR/content-onomichi.html" --post_type=works --post_status=publish \
  --post_title='デザインカンプからサイト制作' --post_name=onomichi --menu_order=4 \
  --post_date='2026-01-04 10:00:00' --post_excerpt='プロのデザイナーが作成したFigmaカンプを、ピクセルパーフェクトを目標に再現しました。' --porcelain)
wp post meta update $ID kanzaki_subtitle 'ピクセルパーフェクト再現'
wp post meta update $ID kanzaki_eyebrow 'Works — Coding'
wp post meta update $ID kanzaki_category 'CODING'
wp post meta update $ID kanzaki_role 'コーディング'
wp post meta update $ID kanzaki_tools 'Figma / HTML / SCSS / JavaScript / Swiper'
wp post meta update $ID kanzaki_highlight 'SCSSのコンポーネント分割とBEM設計。Swiperの無限ループやフォームバリデーションにも挑戦'
wp post meta update $ID kanzaki_site_url '/demo/onomichi/index.html'
wp post meta update $ID kanzaki_badge ''
wp media import '/Users/kes/Desktop/職業訓練データ/portfolio/images/work-onomichi.webp' --post_id=$ID --featured_image --title='デザインカンプからサイト制作'
echo "imported: onomichi (ID=$ID)"

# ---- 05: バナー制作 ----
EXISTING=$(wp post list --post_type=works --name=banner-fruit --format=ids)
if [ -n "$EXISTING" ]; then wp post delete $EXISTING --force; fi
ID=$(wp post create "$MIG_DIR/content-banner-fruit.html" --post_type=works --post_status=publish \
  --post_title='バナー制作' --post_name=banner-fruit --menu_order=5 \
  --post_date='2026-01-05 10:00:00' --post_excerpt='電話占いサービス「Sela（セラ）」の実案件広告バナーを担当。あわせて、自主制作（架空案件）のフルーツサブスク「フルハビ」の提案バナーも掲載しています。' --porcelain)
wp post meta update $ID kanzaki_subtitle ''
wp post meta update $ID kanzaki_eyebrow 'Works — Banner（実案件あり）'
wp post meta update $ID kanzaki_category 'DESIGN'
wp post meta update $ID kanzaki_role 'デザイン'
wp post meta update $ID kanzaki_tools 'Photoshop / Illustrator'
wp post meta update $ID kanzaki_highlight '電話占いサービスの実案件バナー（A/Bテスト設計）ほか、ターゲット別に訴求を変えた複数案'
wp post meta update $ID kanzaki_site_url ''
wp post meta update $ID kanzaki_badge '実案件あり'
wp media import '/Users/kes/Desktop/職業訓練データ/portfolio/images/work-banner-sela-thumb.jpg' --post_id=$ID --featured_image --title='バナー制作'
echo "imported: banner-fruit (ID=$ID)"

# ---- 06: 架空の建設会社 ロゴ制作 ----
EXISTING=$(wp post list --post_type=works --name=logo-kenchiku --format=ids)
if [ -n "$EXISTING" ]; then wp post delete $EXISTING --force; fi
ID=$(wp post create "$MIG_DIR/content-logo-kenchiku.html" --post_type=works --post_status=publish \
  --post_title='架空の建設会社 ロゴ制作' --post_name=logo-kenchiku --menu_order=6 \
  --post_date='2026-01-06 10:00:00' --post_excerpt='株式会社神崎建設のCIデザインを、コンセプトの異なる3案で提案。ブランドの方向性を提示しました。' --porcelain)
wp post meta update $ID kanzaki_subtitle ''
wp post meta update $ID kanzaki_eyebrow 'Works — Logo'
wp post meta update $ID kanzaki_category 'DESIGN'
wp post meta update $ID kanzaki_role 'デザイン'
wp post meta update $ID kanzaki_tools 'Illustrator'
wp post meta update $ID kanzaki_highlight 'コンセプトの異なる3案でブランドの方向性を提案'
wp post meta update $ID kanzaki_site_url ''
wp post meta update $ID kanzaki_badge ''
wp media import '/Users/kes/Desktop/職業訓練データ/portfolio/images/work-logo.webp' --post_id=$ID --featured_image --title='架空の建設会社 ロゴ制作'
echo "imported: logo-kenchiku (ID=$ID)"

# ---- 07: デザインカンプからサイト制作 ----
EXISTING=$(wp post list --post_type=works --name=oha --format=ids)
if [ -n "$EXISTING" ]; then wp post delete $EXISTING --force; fi
ID=$(wp post create "$MIG_DIR/content-oha.html" --post_type=works --post_status=publish \
  --post_title='デザインカンプからサイト制作' --post_name=oha --menu_order=7 \
  --post_date='2026-01-07 10:00:00' --post_excerpt='オンラインスクールの課題。デザインカンプからのコーディング練習として制作しました。' --porcelain)
wp post meta update $ID kanzaki_subtitle 'スクール課題'
wp post meta update $ID kanzaki_eyebrow 'Works — Coding'
wp post meta update $ID kanzaki_category 'CODING'
wp post meta update $ID kanzaki_role 'コーディング'
wp post meta update $ID kanzaki_tools 'HTML / SCSS / JavaScript / Swiper'
wp post meta update $ID kanzaki_highlight 'SCSS＋BEM設計。ドロワー・アコーディオン・モーダル・Swiper等の実装'
wp post meta update $ID kanzaki_site_url '/demo/oha/index.html'
wp post meta update $ID kanzaki_badge ''
wp media import '/Users/kes/Desktop/職業訓練データ/portfolio/images/work-oha.jpg' --post_id=$ID --featured_image --title='デザインカンプからサイト制作'
echo "imported: oha (ID=$ID)"

# ---- 08: デザインカンプからサイト制作 ----
EXISTING=$(wp post list --post_type=works --name=sobolon --format=ids)
if [ -n "$EXISTING" ]; then wp post delete $EXISTING --force; fi
ID=$(wp post create "$MIG_DIR/content-sobolon.html" --post_type=works --post_status=publish \
  --post_title='デザインカンプからサイト制作' --post_name=sobolon --menu_order=8 \
  --post_date='2026-01-08 10:00:00' --post_excerpt='オンラインスクールの課題。ライブコーディング形式で、Webサイト制作の実務プロセスを学習しました。' --porcelain)
wp post meta update $ID kanzaki_subtitle 'ライブコーディング'
wp post meta update $ID kanzaki_eyebrow 'Works — Coding'
wp post meta update $ID kanzaki_category 'CODING'
wp post meta update $ID kanzaki_role 'コーディング'
wp post meta update $ID kanzaki_tools 'HTML / SCSS / JavaScript'
wp post meta update $ID kanzaki_highlight 'Sassのモジュール設計とコンポーネント単位の開発で保守性を重視'
wp post meta update $ID kanzaki_site_url '/demo/sobolon/index.html'
wp post meta update $ID kanzaki_badge ''
wp media import '/Users/kes/Desktop/職業訓練データ/portfolio/images/work-sobolon.webp' --post_id=$ID --featured_image --title='デザインカンプからサイト制作'
echo "imported: sobolon (ID=$ID)"

# ---- 09: 自主制作課題 デザインカンプからサイト制作 ----
EXISTING=$(wp post list --post_type=works --name=e-tiga --format=ids)
if [ -n "$EXISTING" ]; then wp post delete $EXISTING --force; fi
ID=$(wp post create "$MIG_DIR/content-e-tiga.html" --post_type=works --post_status=publish \
  --post_title='自主制作課題 デザインカンプからサイト制作' --post_name=e-tiga --menu_order=9 \
  --post_date='2026-01-09 10:00:00' --post_excerpt='自主制作課題。デザインカンプからのコーディング練習として、自力で制作しました。' --porcelain)
wp post meta update $ID kanzaki_subtitle ''
wp post meta update $ID kanzaki_eyebrow 'Works — Coding'
wp post meta update $ID kanzaki_category 'CODING'
wp post meta update $ID kanzaki_role 'コーディング'
wp post meta update $ID kanzaki_tools 'HTML / SCSS / JavaScript / Swiper'
wp post meta update $ID kanzaki_highlight 'ピクセルパーフェクトの再現とJSアニメーションの実装'
wp post meta update $ID kanzaki_site_url '/demo/e-tiga/index.html'
wp post meta update $ID kanzaki_badge ''
wp media import '/Users/kes/Desktop/職業訓練データ/portfolio/images/work-etiga.webp' --post_id=$ID --featured_image --title='自主制作課題 デザインカンプからサイト制作'
echo "imported: e-tiga (ID=$ID)"

# ---- 10: Bootstrapを使用したサイト制作 ----
EXISTING=$(wp post list --post_type=works --name=bootstrap --format=ids)
if [ -n "$EXISTING" ]; then wp post delete $EXISTING --force; fi
ID=$(wp post create "$MIG_DIR/content-bootstrap.html" --post_type=works --post_status=publish \
  --post_title='Bootstrapを使用したサイト制作' --post_name=bootstrap --menu_order=10 \
  --post_date='2026-01-10 10:00:00' --post_excerpt='Bootstrapの習熟を目的に、標準機能のみでレスポンシブサイトを構築しました。' --porcelain)
wp post meta update $ID kanzaki_subtitle ''
wp post meta update $ID kanzaki_eyebrow 'Works — Coding'
wp post meta update $ID kanzaki_category 'CODING'
wp post meta update $ID kanzaki_role 'コーディング'
wp post meta update $ID kanzaki_tools 'HTML / Bootstrap'
wp post meta update $ID kanzaki_highlight 'カスタムCSS・JSを使わず、グリッドとユーティリティクラスのみで構築'
wp post meta update $ID kanzaki_site_url '/demo/bstrap/index.html'
wp post meta update $ID kanzaki_badge ''
wp media import '/Users/kes/Desktop/職業訓練データ/portfolio/images/work-bootstrap.webp' --post_id=$ID --featured_image --title='Bootstrapを使用したサイト制作'
echo "imported: bootstrap (ID=$ID)"

