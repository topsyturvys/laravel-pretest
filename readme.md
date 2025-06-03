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

# ② docker compose

docker をインストールしていない場合は、使用中の PC に合わせてインストール
https://www.docker.com/get-started/

`docker compose up -d --build`

`docker compose exec php bash`

#### laravel バージョン 9 の場合

`composer create-project "laravel/laravel=9.*" .`

#### laravel バージョン 10 の場合

`composer create-project "laravel/laravel=10.*" .`
