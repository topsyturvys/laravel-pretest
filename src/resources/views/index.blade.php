<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ヘッダー用CSS -->
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <!-- 検索画面用CSS -->
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <!-- リセット用CSS -->
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <title>Document</title>
</head>

<body>
    <!-- ヘッダーエリア -->
    <header class="header">
        <!-- ヘッダー画面エリア -->
        <div class="header__inner">
            <!-- ヘッダー項目エリア -->
            <div class="header-utilities">
                <!-- ヘッダータイトル -->
                <a href="#" class="header__logo">
                    検索画面
                </a>
                <!-- フォームエリア（登録画面移行用） -->
                <form class="header__form" action="/register" method="post">
                    @csrf
                    <!-- 登録画面ボタン -->
                    <button class="header__button">
                        登録画面へ
                    </button>
                </form>
            </div>
        </div>
    </header>

    <main>
        <!-- メイン画面エリア -->
        <div class="search__content">
            <!-- 送信用フォーム（トークン付き）エリア -->
            <form action="/pretests/search" class="search-form" method="GET">
                @csrf
                <!-- 検索画面エリア -->
                <div class="search-form__item">
                    <!-- 検索テキスト欄（初期コメント：検索キーワード／前回の内容を保持 -->
                    <input class="search-from__item-input" type="text" name="keyword"
                        placeholder="検索キーワード" value="{{ old('keyword') }}">
                </div>
                <!-- 検索ボタンエリア -->
                <div class="search-form__button">
                    <!-- 検索ボタン -->
                    <button class="search-form__button-submit" type="submit">
                        検索
                    </button>
                </div>
            </form>

            <!-- データテーブルエリア -->
            <div class="search-table">
                <!-- データテーブル -->
                <table class="search-table__inner">
                    <!-- １行目 -->
                    <tr class="search-table__row">
                        <!-- 見出しエリア -->
                        <th class="search-table__header">
                            <!-- 見出し項目 -->
                            <span class="search-table__header-span">登録日</span>
                            <span class="search-table__header-span">キーワード</span>
                            <span class="search-table__header-span">説明</span>
                        </th>
                    </tr>
                    <!-- ２行目以降（データベースを参照） -->
                    @foreach($pretests as $pretest)
                    <tr class="search-table__row">
                        <!-- 登録日／キーワード／説明／修正ボタンエリア -->
                        <td class="search-table__item">
                            <!-- 更新用フォームエリア -->
                            <form action="/pretests/update" class="update-form" method="POST">
                                <!-- 更新メソッド（トークン付き） -->
                                @method('PATCH')
                                @csrf
                                <!-- 登録日（更新日）欄 -->
                                <div class="update-form__item">
                                    <!-- 登録日（更新日） -->
                                    <div class="update-form__item-input">
                                        <!-- 最終更新日時（文字列に変換） -->
                                        {{ $pretest->updated_at->format('Y/n/j') }}
                                    </div>
                                </div>
                                <!-- キーワード欄 -->
                                <div class="update-form__item">
                                    <!-- キーワード（値はテーブルの内容） -->
                                    <input type="text" class="update-form__item-input"
                                        name="keyword" value="{{ $pretest['keyword'] }}">
                                    <!-- idを隠しフィールドとして送る（レコード特定） -->
                                    <input type="hidden" name="id" value="{{ $pretest['id'] }}">
                                </div>
                                <!-- 説明欄 -->
                                <div class="update-form__item">
                                    <!-- 説明文（値はテーブルの内容） -->
                                    <input type="text" class="update-form__item-input"
                                        name="description" value="{{ $pretest['description'] }}">
                                    <!-- idを隠しフィールドとして送る（レコード特定） -->
                                    <input type="hidden" name="id" value="{{ $pretest['id'] }}">
                                </div>
                                <!-- ボタンエリア -->
                                <div class="update-form__button">
                                    <!-- 修正用ボタン -->
                                    <button class="update-form__button-submit">
                                        修正
                                    </button>
                                </div>
                            </form>
                        </td>
                        <!-- 削除ボタンエリア -->
                        <td class="search-table__item">
                            <!-- 削除用フォーム -->
                            <form action="/pretests/delete" class="delete-form" method="POST">
                                <!-- 削除メソッド（トークン付き） -->
                                @method('DELETE')
                                @csrf
                                <!-- 削除ボタンエリア -->
                                <div class="delete-form__button">
                                    <!-- idを隠しフィールドとして送る（レコード特定） -->
                                    <input type="hidden" name="id" value="{{ $pretest['id'] }}">
                                    <!-- 削除用ボタン -->
                                    <button class="delete-form__button-submit">
                                        削除
                                    </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>


        </div>
    </main>
</body>

</html>