DROP TABLE IF EXISTS `gender`;
CREATE TABLE IF NOT EXISTS `gender` (
    id         BIGINT NOT NULL PRIMARY KEY,
    name       TEXT DEFAULT NULL,
    name_kana  TEXT DEFAULT NULL,
    is_deleted BOOL DEFAULT FALSE
);
INSERT INTO gender (id, name, name_kana, is_deleted) VALUES
    (1, 'なし', 'ナシ', FALSE),
    (2, '男性', 'ダンセイ', FALSE),
    (3, '女性', 'ジョセイ', FALSE),
    (4, '中性', 'チュウセイ', FALSE)
;
