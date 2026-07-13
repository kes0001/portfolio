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
wp post meta update $ID kanzaki_figma_url 'https://www.figma.com/design/wQvNRqgrGunQmUG66Ilt6K/%E3%81%BB%E3%81%90%E3%81%97%E3%81%AE%E6%A3%AE%E6%9C%80%E6%96%B0?node-id=224-15748'
wp post meta update $ID kanzaki_badge '実案件'
wp media import '/Users/kes/Desktop/職業訓練データ/portfolio/images/work-hogushi.jpg' --post_id=$ID --featured_image --title='ほぐしの森'
echo "imported: hogushi (ID=$ID)"

# ---- 02: 津堅島シークルーズ ----
EXISTING=$(wp post list --post_type=works --name=sea-crews --format=ids)
if [ -n "$EXISTING" ]; then wp post delete $EXISTING --force; fi
ID=$(wp post create "$MIG_DIR/content-sea-crews.html" --post_type=works --post_status=publish \
  --post_title='津堅島シークルーズ' --post_name=sea-crews --menu_order=2 \
  --post_date='2026-01-02 10:00:00' --post_excerpt='沖縄・津堅島のマリンアクティビティ「津堅島シークルーズ」のランディングページ。デザインとディレクション、原稿・写真素材の用意までを担当し、実装はコーダーへ受け渡す体制で制作しました。' --porcelain)
wp post meta update $ID kanzaki_subtitle 'マリンアクティビティLP'
wp post meta update $ID kanzaki_eyebrow 'Works — LP Design（実案件）'
wp post meta update $ID kanzaki_category 'DESIGN'
wp post meta update $ID kanzaki_role 'デザイン・ディレクション・原稿・写真素材'
wp post meta update $ID kanzaki_tools 'Figma / Photoshop / Illustrator'
wp post meta update $ID kanzaki_highlight '海中写真を主役にした非日常感の演出と、顧客の悩み3つを裏返したコピー・予約導線の設計'
wp post meta update $ID kanzaki_site_url 'https://sea-crews.com/lp2026/'
wp post meta update $ID kanzaki_figma_url 'https://www.figma.com/design/OuISLNKM6IzqywEWiy7vgQ/%E3%82%B7%E3%83%BC%E3%82%AF%E3%83%AB%E3%83%BC%E3%82%BALP--7-2%E4%BF%AE%E6%AD%A3-?node-id=1526-179'
wp post meta update $ID kanzaki_badge '実案件'
wp media import '/Users/kes/Desktop/職業訓練データ/portfolio/images/work-sea-crews.jpg' --post_id=$ID --featured_image --title='津堅島シークルーズ'
echo "imported: sea-crews (ID=$ID)"

# ---- 03: 株式会社ライトディレクション ----
EXISTING=$(wp post list --post_type=works --name=right-direction --format=ids)
if [ -n "$EXISTING" ]; then wp post delete $EXISTING --force; fi
ID=$(wp post create "$MIG_DIR/content-right-direction.html" --post_type=works --post_status=publish \
  --post_title='株式会社ライトディレクション' --post_name=right-direction --menu_order=3 \
  --post_date='2026-01-03 10:00:00' --post_excerpt='東京・江東区のWeb制作・システム開発会社「株式会社ライトディレクション」のコーポレートサイト。「AIをどこまで実務の制作に使えるか」を検証する依頼案件として、構成からデザイン・実装・公開までを一貫して担当しました。名刺デザインもあわせて制作しています。' --porcelain)
wp post meta update $ID kanzaki_subtitle 'コーポレートサイト'
wp post meta update $ID kanzaki_eyebrow 'Works — Corporate Site（実案件）'
wp post meta update $ID kanzaki_category 'DESIGN'
wp post meta update $ID kanzaki_role 'デザイン・コーディング・ディレクション・名刺デザイン'
wp post meta update $ID kanzaki_tools 'Claude Code / HTML / SCSS / JavaScript / Photoshop / Illustrator'
wp post meta update $ID kanzaki_highlight '「AIをどこまで実務に使えるか」の検証案件。デザイン・実装・原稿の各工程でAIと協働し、少人数・短期間での公開を実現'
wp post meta update $ID kanzaki_site_url 'https://r-d.jp/'
wp post meta update $ID kanzaki_badge '実案件'
wp media import '/Users/kes/Desktop/職業訓練データ/portfolio/images/work-right-direction.jpg' --post_id=$ID --featured_image --title='株式会社ライトディレクション'
echo "imported: right-direction (ID=$ID)"

# ---- 04: Spark Links ----
EXISTING=$(wp post list --post_type=works --name=spark-links --format=ids)
if [ -n "$EXISTING" ]; then wp post delete $EXISTING --force; fi
ID=$(wp post create "$MIG_DIR/content-spark-links.html" --post_type=works --post_status=publish \
  --post_title='Spark Links' --post_name=spark-links --menu_order=4 \
  --post_date='2026-01-04 10:00:00' --post_excerpt='架空の飲料メーカー「Spark Links」のブランドサイト。ペルソナ設計からデザイン・実装まで一貫して担当しました。' --porcelain)
wp post meta update $ID kanzaki_subtitle '架空の飲料メーカーサイト'
wp post meta update $ID kanzaki_eyebrow 'Works — Corporate Site'
wp post meta update $ID kanzaki_category 'DESIGN'
wp post meta update $ID kanzaki_role 'デザイン・コーディング・ディレクション'
wp post meta update $ID kanzaki_tools 'Figma / Photoshop / Illustrator / HTML / SCSS / JavaScript'
wp post meta update $ID kanzaki_highlight '健康志向層などターゲットペルソナを設計し、訴求に落とし込んだ情報設計'
wp post meta update $ID kanzaki_site_url '/demo/site02/index.html'
wp post meta update $ID kanzaki_figma_url 'https://www.figma.com/design/uiIvSX4zkdf5aHMtXdhjFm/%E3%83%AF%E3%82%A4%E3%83%A4%E3%83%BC%E3%83%95%E3%83%AC%E3%83%BC%E3%83%A0?node-id=0-1'
wp post meta update $ID kanzaki_badge ''
wp media import '/Users/kes/Desktop/職業訓練データ/portfolio/images/work-sparklinks.webp' --post_id=$ID --featured_image --title='Spark Links'
echo "imported: spark-links (ID=$ID)"

# ---- 05: 笹塚スマイルクリニック ----
EXISTING=$(wp post list --post_type=works --name=sasazuka --format=ids)
if [ -n "$EXISTING" ]; then wp post delete $EXISTING --force; fi
ID=$(wp post create "$MIG_DIR/content-sasazuka.html" --post_type=works --post_status=publish \
  --post_title='笹塚スマイルクリニック' --post_name=sasazuka --menu_order=5 \
  --post_date='2026-01-05 10:00:00' --post_excerpt='架空の歯科医院のコーポレートサイト。安心感と、ユーザーが迷わず予約できる導線設計を重視して制作しました。' --porcelain)
wp post meta update $ID kanzaki_subtitle '架空の歯科医院サイト'
wp post meta update $ID kanzaki_eyebrow 'Works — Corporate Site'
wp post meta update $ID kanzaki_category 'DESIGN'
wp post meta update $ID kanzaki_role 'デザイン・コーディング'
wp post meta update $ID kanzaki_tools 'HTML / SCSS / JavaScript'
wp post meta update $ID kanzaki_highlight '駅近・夜間診療の強みを直感的に伝える情報整理と、迷わせない予約導線の設計'
wp post meta update $ID kanzaki_site_url '/demo/site01/index.html'
wp post meta update $ID kanzaki_figma_url 'https://www.figma.com/design/tN4VaudCyjFHblHwcT2fyy/0513%E6%AD%AF%E7%A7%91%E5%8C%BB%E9%99%A2%E3%83%AF%E3%82%A4%E3%83%A4%E3%83%BC%E3%83%95%E3%83%AC%E3%83%BC%E3%83%A0?node-id=27-498'
wp post meta update $ID kanzaki_badge ''
wp media import '/Users/kes/Desktop/職業訓練データ/portfolio/images/work-sasazuka.jpg' --post_id=$ID --featured_image --title='笹塚スマイルクリニック'
echo "imported: sasazuka (ID=$ID)"

# ---- 06: カンプからサイト制作 ----
EXISTING=$(wp post list --post_type=works --name=onomichi --format=ids)
if [ -n "$EXISTING" ]; then wp post delete $EXISTING --force; fi
ID=$(wp post create "$MIG_DIR/content-onomichi.html" --post_type=works --post_status=publish \
  --post_title='カンプからサイト制作' --post_name=onomichi --menu_order=6 \
  --post_date='2026-01-06 10:00:00' --post_excerpt='プロのデザイナーが作成したFigmaカンプを、ピクセルパーフェクトを目標に再現しました。' --porcelain)
wp post meta update $ID kanzaki_subtitle 'ピクセルパーフェクト再現'
wp post meta update $ID kanzaki_eyebrow 'Works — Coding'
wp post meta update $ID kanzaki_category 'CODING'
wp post meta update $ID kanzaki_role 'コーディング'
wp post meta update $ID kanzaki_tools 'Figma / HTML / SCSS / JavaScript / Swiper'
wp post meta update $ID kanzaki_highlight 'SCSSのコンポーネント分割とBEM設計。Swiperの無限ループやフォームバリデーションにも挑戦'
wp post meta update $ID kanzaki_site_url '/demo/onomichi/index.html'
wp post meta update $ID kanzaki_badge ''
wp media import '/Users/kes/Desktop/職業訓練データ/portfolio/images/work-onomichi.webp' --post_id=$ID --featured_image --title='カンプからサイト制作'
echo "imported: onomichi (ID=$ID)"

# ---- 07: バナー制作 ----
EXISTING=$(wp post list --post_type=works --name=banner-fruit --format=ids)
if [ -n "$EXISTING" ]; then wp post delete $EXISTING --force; fi
ID=$(wp post create "$MIG_DIR/content-banner-fruit.html" --post_type=works --post_status=publish \
  --post_title='バナー制作' --post_name=banner-fruit --menu_order=7 \
  --post_date='2026-01-07 10:00:00' --post_excerpt='電話占いサービス「Sela（セラ）」の実案件広告バナーを担当。あわせて、自主制作（架空案件）のフルーツサブスク「フルハビ」の提案バナーも掲載しています。' --porcelain)
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

# ---- 08: 架空の建設会社 ロゴ制作 ----
EXISTING=$(wp post list --post_type=works --name=logo-kenchiku --format=ids)
if [ -n "$EXISTING" ]; then wp post delete $EXISTING --force; fi
ID=$(wp post create "$MIG_DIR/content-logo-kenchiku.html" --post_type=works --post_status=publish \
  --post_title='架空の建設会社 ロゴ制作' --post_name=logo-kenchiku --menu_order=8 \
  --post_date='2026-01-08 10:00:00' --post_excerpt='株式会社神崎建設のCIデザインを、コンセプトの異なる3案で提案。ブランドの方向性を提示しました。' --porcelain)
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

# ---- 09: カンプからサイト制作 ----
EXISTING=$(wp post list --post_type=works --name=oha --format=ids)
if [ -n "$EXISTING" ]; then wp post delete $EXISTING --force; fi
ID=$(wp post create "$MIG_DIR/content-oha.html" --post_type=works --post_status=publish \
  --post_title='カンプからサイト制作' --post_name=oha --menu_order=9 \
  --post_date='2026-01-09 10:00:00' --post_excerpt='オンラインスクールの課題。デザインカンプからのコーディング練習として制作しました。' --porcelain)
wp post meta update $ID kanzaki_subtitle 'スクール課題'
wp post meta update $ID kanzaki_eyebrow 'Works — Coding'
wp post meta update $ID kanzaki_category 'CODING'
wp post meta update $ID kanzaki_role 'コーディング'
wp post meta update $ID kanzaki_tools 'HTML / SCSS / JavaScript / Swiper'
wp post meta update $ID kanzaki_highlight 'SCSS＋BEM設計。ドロワー・アコーディオン・モーダル・Swiper等の実装'
wp post meta update $ID kanzaki_site_url '/demo/oha/index.html'
wp post meta update $ID kanzaki_badge ''
wp media import '/Users/kes/Desktop/職業訓練データ/portfolio/images/work-oha.jpg' --post_id=$ID --featured_image --title='カンプからサイト制作'
echo "imported: oha (ID=$ID)"

# ---- 10: カンプからサイト制作 ----
EXISTING=$(wp post list --post_type=works --name=sobolon --format=ids)
if [ -n "$EXISTING" ]; then wp post delete $EXISTING --force; fi
ID=$(wp post create "$MIG_DIR/content-sobolon.html" --post_type=works --post_status=publish \
  --post_title='カンプからサイト制作' --post_name=sobolon --menu_order=10 \
  --post_date='2026-01-10 10:00:00' --post_excerpt='オンラインスクールの課題。ライブコーディング形式で、Webサイト制作の実務プロセスを学習しました。' --porcelain)
wp post meta update $ID kanzaki_subtitle 'ライブコーディング'
wp post meta update $ID kanzaki_eyebrow 'Works — Coding'
wp post meta update $ID kanzaki_category 'CODING'
wp post meta update $ID kanzaki_role 'コーディング'
wp post meta update $ID kanzaki_tools 'HTML / SCSS / JavaScript'
wp post meta update $ID kanzaki_highlight 'Sassのモジュール設計とコンポーネント単位の開発で保守性を重視'
wp post meta update $ID kanzaki_site_url '/demo/sobolon/index.html'
wp post meta update $ID kanzaki_badge ''
wp media import '/Users/kes/Desktop/職業訓練データ/portfolio/images/work-sobolon.webp' --post_id=$ID --featured_image --title='カンプからサイト制作'
echo "imported: sobolon (ID=$ID)"

# ---- 11: 自主制作課題 カンプからサイト制作 ----
EXISTING=$(wp post list --post_type=works --name=e-tiga --format=ids)
if [ -n "$EXISTING" ]; then wp post delete $EXISTING --force; fi
ID=$(wp post create "$MIG_DIR/content-e-tiga.html" --post_type=works --post_status=publish \
  --post_title='自主制作課題 カンプからサイト制作' --post_name=e-tiga --menu_order=11 \
  --post_date='2026-01-11 10:00:00' --post_excerpt='自主制作課題。デザインカンプからのコーディング練習として、自力で制作しました。' --porcelain)
wp post meta update $ID kanzaki_subtitle ''
wp post meta update $ID kanzaki_eyebrow 'Works — Coding'
wp post meta update $ID kanzaki_category 'CODING'
wp post meta update $ID kanzaki_role 'コーディング'
wp post meta update $ID kanzaki_tools 'HTML / SCSS / JavaScript / Swiper'
wp post meta update $ID kanzaki_highlight 'ピクセルパーフェクトの再現とJSアニメーションの実装'
wp post meta update $ID kanzaki_site_url '/demo/e-tiga/index.html'
wp post meta update $ID kanzaki_badge ''
wp media import '/Users/kes/Desktop/職業訓練データ/portfolio/images/work-etiga.webp' --post_id=$ID --featured_image --title='自主制作課題 カンプからサイト制作'
echo "imported: e-tiga (ID=$ID)"

# ---- 12: Bootstrapを使用したサイト制作 ----
EXISTING=$(wp post list --post_type=works --name=bootstrap --format=ids)
if [ -n "$EXISTING" ]; then wp post delete $EXISTING --force; fi
ID=$(wp post create "$MIG_DIR/content-bootstrap.html" --post_type=works --post_status=publish \
  --post_title='Bootstrapを使用したサイト制作' --post_name=bootstrap --menu_order=12 \
  --post_date='2026-01-12 10:00:00' --post_excerpt='Bootstrapの習熟を目的に、標準機能のみでレスポンシブサイトを構築しました。' --porcelain)
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

