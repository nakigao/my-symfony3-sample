Note for development
===

## 開発モード切替

```
web/app.php

$kernel = new AppKernel('dev', true);
//$kernel = new AppKernel('prod', false);
```

## consoleがすごい

`php bin/console debug:route` とかいろいろ便利なものが揃ってそう

## Bundleとは

Serviceの集まり

TODO: 再利用再配布可能な状態で作成するには？

## Template best practice 

公式ドキュメントによると「3階層」がベストらしい

base(bundle) > layout(controller) > page(action)

## Symfony3 は bower と相性がいいらしい

公式ドキュメントにあるので、npm よりも bower がいいかも






