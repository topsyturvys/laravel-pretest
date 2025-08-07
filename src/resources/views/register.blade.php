<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ヘッダー用CSS -->
    <link rel="stylesheet" href="{{('css/common.css')}}">
    <!-- 登録画面用CSS -->
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
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
                    登録画面
                </a>
                <!-- フォームエリア（検索画面移行用） -->
                <form action="/" method="post">
                    @csrf
                    <!-- 検索画面に戻るボタン -->
                    <button class="header__button">
                        検索画面へ
                    </button>
                </form>
            </div>
        </div>
    </header>

    <main>
        <div class="register__content">
            <form action="/pretests" class="register-form" method="post">
                @csrf
                <!-- キーワード登録エリア -->
                <div class="register-keyword">
                    <!-- 登録キーワード -->
                    <input type="text" class="register-keyword__input" placeholder="キーワード" name="keyword">
                </div>
                <!-- 説明文登録エリア -->
                <div class="register-description">
                    <!-- 説明文 -->
                    <textarea class="register-description__input" placeholder="説明" name="description"></textarea>
                </div>
                <div class="register-form__button">
                    <button class="register-form__button-submit">登録</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>