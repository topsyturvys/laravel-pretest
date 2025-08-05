<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
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
            <!-- 送信用フォーム -->
            <form action="/pretests/search" class="search-form" method="GET">
                @csrf
                <!-- 検索画面エリア -->
                <div class="search-form__item">
                    <!-- 検索テキスト欄 -->
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
                    <!-- １行目（見出し） -->
                    <tr class="search-table__row">
                        <th class="search-table__header">
                            <span class="search-table__header-span">登録日</span>
                            <span class="search-table__header-span">キーワード</span>
                            <span class="search-table__header-span">説明</span>
                        </th>
                    </tr>
                    <!-- ２行目以降（データベースを参照） -->
                    @foreach($pretests as $pretest)
                    <tr class="search-table__row">
                        <!-- 登録日／キーワード／説明／修正ボタン -->
                        <td class="search-table__item">
                            <form action="/pretests/update" class="update-form" method="POST">
                                @method('PATCH')
                                @csrf
                                <div class="update-form__item">
                                    <div class="update-form__item-input">
                                        {{ $pretest->updated_at->format('Y/n/j') }}
                                    </div>
                                </div>
                                <div class="update-form__item">
                                    <input type="text" class="update-form__item-input"
                                        name="keyword" value="{{ $pretest['keyword'] }}">
                                    <input type="hidden" name="id" value="{{ $pretest['id'] }}">
                                </div>
                                <div class="update-form__item">
                                    <input type="text" class="update-form__item-input"
                                        name="description" value="{{ $pretest['description'] }}">
                                    <input type="hidden" name="id" value="{{ $pretest['id'] }}">
                                </div>
                                <div class="update-form__button">
                                    <button class="update-form__button-submit">
                                        修正
                                    </button>
                                </div>
                            </form>
                        </td>
                        <td class="search-table__item">
                            <form action="/pretests/delete" class="delete-form" method="POST">
                                @method('DELETE')
                                @csrf
                                <div class="delete-form__button">
                                    <input type="hidden" name="id" value="{{ $pretest['id'] }}">
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