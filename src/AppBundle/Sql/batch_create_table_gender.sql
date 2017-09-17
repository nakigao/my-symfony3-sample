-- daily-batch想定
-- 性別リスト
-- セレクトボックスに利用
USE character_database;
DROP TABLE IF EXISTS `gender`;
CREATE TABLE IF NOT EXISTS `gender` (
    id        BIGINT PRIMARY KEY AUTO_INCREMENT,
    -- SelectBoxのValue
    value     INT         NOT NULL,
    -- SelectBoxのText
    html_text VARCHAR(16) NOT NULL
);

INSERT INTO gender (value, html_text) VALUES
    (1, '不明'),
    (2, '男性'),
    (3, '女性'),
    (4, '中性'),
    (5, 'その他');