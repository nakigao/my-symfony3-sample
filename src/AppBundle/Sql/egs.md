erogamescapeでごにょごにょ
===

[SQL実行フォーム \-エロゲーマーのためのSQL\-](https://erogamescape.dyndns.org/~ap2/ero/toukei_kaiseki/sql_for_erogamer_form.php)

```
-- EGS BRAND + CORPORATION LIST
SELECT
    concat('(', egs.id, ',') as id,
    concat('"', egs.name, '",') as name,
    concat('"', egs.name_kana, '",') as name_kana,
    concat('"', egs.url, '"),') as url
FROM (
         SELECT
             --    row_number() over(ORDER BY brandlist.id) AS idx,
             brandlist.id       AS id,
             replace(brandlist.brandname, '\"', '”') AS name,
             brandlist.brandfurigana  AS name_kana,
             brandlist.url  AS url
         FROM brandlist
         WHERE
             brandlist.kind = 'CORPORATION'
         ORDER BY brandlist.id
     ) AS egs
```

```
-- EGS R18 PC GAME + CORPORATION LIST
SELECT
    concat('(', egs.id, ',') as id,
    concat('', egs.brand_id, ',') as brand_id,
    concat('"', egs.name, '",') as name,
    concat('"', egs.name_kana, '",') as name_kana,
    concat('"', egs.release_ymd, '",') as release_ymd,
    concat('"', egs.url, '"),') as url
FROM (
         SELECT
             --    row_number() over(ORDER BY gamelist.sellday) AS idx,
             gamelist.id       AS id,
             brandlist.id      AS brand_id,
             replace(gamelist.gamename, '\"', '”') AS name,
             gamelist.furigana AS name_kana,
             gamelist.sellday  AS release_ymd,
             gamelist.shoukai  AS url
         FROM gamelist
             LEFT JOIN brandlist ON brandlist.id = gamelist.brandname
         WHERE
             gamelist.erogame = TRUE
             AND gamelist.model = 'PC'
             AND brandlist.kind = 'CORPORATION'
             AND (sellday >= '2000-01-01' AND sellday <= '2016-12-31')
         ORDER BY gamelist.id
     ) AS egs
```