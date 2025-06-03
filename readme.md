# ① git clone

github よりソースを取得する

```
git clone https://github.com/teppei-github/laravel-template.git
```

階層を変更する

```
cd laravel-template
```

laravel のプロジェクト名に、フォルダ名を変換する
（例 laravel-template → laravel-basic 等）

# ② docker compose

`先ほど変更したフォルダ名がVSCodeのトップになっていることを必ず確認すること`  
[![Image from Gyazo](https://i.gyazo.com/6de13ed9f6ab4f0fdc4d5a0b83c4f514.png)](https://gyazo.com/6de13ed9f6ab4f0fdc4d5a0b83c4f514)

docker をインストールしていない場合は、使用中の PC に合わせてインストール  
https://www.docker.com/get-started/

`docker compose up -d --build`

`docker compose exec php bash`

#### laravel バージョン 9 の場合

`composer create-project "laravel/laravel=9.*" .`

#### laravel バージョン 10 の場合

`composer create-project "laravel/laravel=10.*" .`
