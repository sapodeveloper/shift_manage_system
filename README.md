shift_manage_system
===================
クローンの仕方
```
	git clone --recursive git@github.com:sapodeveloper/shift_manage_system.git
```

DB環境構築
```
	oil refine migrate:current
```
テーブルの追加や変更があった場合は正確に最新のDBにするために一度DBをドロップしてから実行すること

初期ユーザ
```
	user: admin
	password: admin
```

作業開始前
```
  git checkout master
  git fetch
  git pull
  ブランチを切って作業
```

ブランチの切り方
```
  git branch issue番号-ユーザ名
  git checkout issue番号-ユーザ名
```

リポジトリにpushする
```
  git push origin issue番号-ユーザ名
```

その後にプルリクをしましょう

---
###ライセンス
jQuery : MITライセンス  
UIKit  : MITライセンス
