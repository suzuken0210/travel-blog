<p align="center"><a href="https://kentaapp.herokuapp.com" target="_blank"><img src="https://github.com/suzuken0210/travel-blog/assets/123449553/3bc27298-d968-4a37-a273-ae356043432b" width="400"></a></p>


## アプリケーション名

トラベルノート

## アプリケーション概要

旅行の日記を投稿し、相互に閲覧できるアプリケーションです。自分の旅行記録を残しておけるだけでなく、旅行計画の段階で他人の日記を参考にし、自分の旅行の充実度を上げることができます。

## テスト用アカウント

メールアドレス：test@gmail.com

パスワード：test1234

日記投稿機能、いいね機能、マイページが使えます。

### 開発環境

言語：PHP 8.0.27

フレームワーク：laravel 9.52.4

データベース：MySQL 15.1

その他：HTML, CSS, JavaScript, Bootstrap, AWS

## 作成経緯
私は頻繁に旅行に出かけることがあり、それぞれの旅の思い出を写真以外に残したいと思っていました。それと同時に、旅行に行く前に他人の旅行の行程を参考にできたらより自分の旅行が充実するとも思っていました。その２点を解決するために自分の日記を見返す側面と他人の日記を閲覧する側面を持つ旅行日記投稿サイトを作成しました。

旅行日記投稿サイトはいくつか存在しているため、他サイトにはない魅力が必要だと考えました。旅行の思い出を話す際、一番楽しかったことや印象に残ったことを一番に伝えるので、このアプリでも「お気に入りスポット」という項目を作り、旅行の思い出をより強く伝えられるようにしました。


## 機能一覧

- 場所名を参照する記事検索
- マイページでは自分の投稿のみを表示
- 記事詳細画面ではいいね機能を実装
- 記事詳細画面ではお気に入りスポットをGooglemapで表示


## 機能詳細

### 日記一覧画面、日記作成画面、マイページへの遷移

<img width="443" alt="navi" src="https://github.com/suzuken0210/travel-blog/assets/123449553/346f541e-fea0-46e2-953c-0f82458e582b">

### 検索機能

<img width="676" alt="serch" src="https://github.com/suzuken0210/travel-blog/assets/123449553/2af548f4-13b3-416d-8af4-000c4f32df71">

検索ウィンドウでは、お気に入り観光地、全ての観光地、旅行日での検索が可能です。お気に入り観光地、全ての観光地では入力した地名と一致する地名が投稿された日記が表示されます。旅行日での検索はfromに開始日、untilに終了日の日付を選択すると選択した期間で旅行した日記が表示されます。

### マイページ(ログイン時のみ使用可能)

マイページでは自分が投稿した日記のみを表示しています。自分の旅行を振り返り思い出に浸ることに使います。

### いいね機能(ログイン時のみ使用可能)

<img width="372" alt="likes" src="https://github.com/suzuken0210/travel-blog/assets/123449553/0aabff2a-f36e-482f-bb61-85a0ac13a3b3">

記事一覧画面にて気になるタイトルをクリックすると日記の詳細画面に遷移します。タイトル左下のハートマークを押すといいね数が増えていきます。他のユーザーからの自分の旅行の反応を感じることができます。取り消す場合はもう一度ハートマークを押してください。

### GoogleMapの表示

<img width="950" alt="googlemap" src="https://github.com/suzuken0210/travel-blog/assets/123449553/653e87ec-377a-4e3a-8a67-09e54f16dafe">

日記詳細画面下部ではお気に入り観光地の場所をGoogleMapで表示しています。他ユーザーの日記を読んで観光したくなったらすぐに場所の確認ができます。投稿時に入力された観光地を自動で緯度経度に変換する「Geocording API」により地点が登録され詳細ページにマップが表示されます。JavaScriptによりピンもつけ、視認性を向上させました。
