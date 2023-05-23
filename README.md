<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

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

#日記一覧画面、日記作成画面、マイページへの遷移

<img src='{{ asset('image/navi.png') }}'>

#検索機能

<img src='{{ asset('image/serch.png') }}'>

検索ウィンドウでは、お気に入り観光地、全ての観光地、旅行日での検索が可能です。お気に入り観光地、全ての観光地では入力した地名と一致する地名が投稿された日記が表示されます。旅行日での検索はfromに開始日、untilに終了日の日付を選択すると選択した期間で旅行した日記が表示されます。

#マイページ(ログイン時のみ使用可能)

マイページでは自分が投稿した日記のみを表示しています。自分の旅行を振り返り思い出に浸ることに使います。

#いいね機能(ログイン時のみ使用可能)

<img src='{{ asset('image/likes.png') }}'>

記事一覧画面にて気になるタイトルをクリックすると日記の詳細画面に遷移します。タイトル左下のハートマークを押すといいね数が増えていきます。他のユーザーからの自分の旅行の反応を感じることができます。取り消す場合はもう一度ハートマークを押してください。

#GoogleMapの表示

<img src='{{ asset('image/googlemap.png') }}'>

日記詳細画面下部ではお気に入り観光地の場所をGoogleMapで表示しています。他ユーザーの日記を読んで観光したくなったらすぐに場所の確認ができます。投稿時に入力された観光地を自動で緯度経度に変換する「Geocording API」により地点が登録され詳細ページにマップが表示されます。JavaScriptによりピンもつけ、視認性を向上させました。


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
