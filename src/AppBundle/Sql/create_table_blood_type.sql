DROP TABLE IF EXISTS `blood_type`;
CREATE TABLE IF NOT EXISTS `blood_type` (
    id         BIGINT NOT NULL PRIMARY KEY,
    name       TEXT DEFAULT NULL,
    name_kana  TEXT DEFAULT NULL,
    is_deleted BOOL DEFAULT FALSE
);
INSERT INTO blood_type (id, name, name_kana, is_deleted) VALUES
    (1, 'なし', 'ナシ', FALSE),
    (2, 'A', 'エー', FALSE),
    (3, 'B', 'ビー', FALSE),
    (4, 'O', 'オー', FALSE),
    (4, 'AB', 'エービー', FALSE),
    (4, 'その他', 'ソノタ', FALSE)
;
