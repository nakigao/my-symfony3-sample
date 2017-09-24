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

## Controllerのひな形作るとき

```
php bin/console generate:controller --controller=AppBundle:Xxxxxx
```

## Entityのひな形作るとき

```
php bin/console generate:doctrine:entity --entity=AppBundle:XxxxXxxx

*出来上がったEntityClassにプロパティを定義する

php bin/console generate:doctrine:entities AppBundle/Entity/XxxxXxxx
```

必要であれば、DBの更新

```
php bin/console doctrine:schema:update --force
```

CRUDがほしかったら

```
php bin/console generate:doctrine:crud AppBundle/XxxxXxxx
```

## 自動生成されたコードから感じたこと

`@ParamConverter`が秀逸・・・

Actionにタイプヒントで渡すだけで勝手にIDパラム取得してくれるって便利ぃ～

## 既存DBからEntity生成した場合

これが意外と融通が利いてない

```
php bin/console doctrine:mapping:import --force AppBundle xml
php bin/console doctrine:mapping:convert annotation ./src
```

DBから引っこ抜いてきたデータでXMLがキレイにできるんだけど・・・

1. 生成されたファイルの@Entityアノテーションがカスタム用になってないので、`@ORM\Entity(repositoryClass="AppBundle\Repository\XxxxxxRepository")`みたいに全部書き直す
2. 更にAnnotationを使う場合は、(XMLが優先されるらしいので)生成されたXMLを削除しないといけない。`rm -rf src/AppBundle/Resources`

```
php bin/console doctrine:generate:entities AppBundle/Entity/XxxxxXxxxxx
php bin/console doctrine:schema:update --force
```

## Generate from existing table (For Single Table)

{CharacterBase}という既存テーブルに対して

php bin/console doctrine:mapping:convert xml AppBundle --from-database --force --filter=CharacterBase
php bin/console doctrine:mapping:import AppBundle annotation --filter=CharacterBase
php bin/console doctrine:generate:entities AppBundle/Entity/CharacterBase
php bin/console generate:doctrine:crud AppBundle:CharacterBase --route-prefix=admin/character_base --overwrite --with-write
