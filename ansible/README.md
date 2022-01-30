# ansible-local-dev

version: 1.0.0

# 事前準備
- makeコマンドが使える必要がある。
- Windowsの場合は(chocolatey)
```
choco install make
```

# 実行コマンド
詳細はMakefile参照
- コンテナの起動
```
make up
```

- 起動しているコンテナを確認
```
make ps
```

- サーバーへの疎通確認
```
make ping
```

- 構文チェック

```
make check
```

- dry run 実行

```
make dry-run
```

- 実行

```
make run
```