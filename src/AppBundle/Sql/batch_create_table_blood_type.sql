-- daily-batch想定
-- 血液型リスト
-- セレクトボックスに利用
USE character_database;
DROP TABLE IF EXISTS `blood_type`;
CREATE TABLE IF NOT EXISTS `blood_type` (
    id        BIGINT PRIMARY KEY AUTO_INCREMENT,
    -- SelectBoxのValue
    value     INT  NOT NULL,
    -- SelectBoxのText
    html_text VARCHAR(16) NOT NULL
);

INSERT INTO blood_type (value, html_text) VALUES
    (1, '不明'),
    (2, 'A'),
    (3, 'B'),
    (4, 'O'),
    (5, 'AB'),
    (6, 'その他');