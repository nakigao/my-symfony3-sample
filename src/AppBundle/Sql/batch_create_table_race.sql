-- daily-batch想定
-- 人種というかタイプというか、キャラクターの属性の1つ
-- セレクトボックスに利用
USE character_database;
DROP TABLE IF EXISTS `race`;
CREATE TABLE IF NOT EXISTS `race` (
    id        BIGINT PRIMARY KEY AUTO_INCREMENT,
    -- SelectBoxのValue
    value     INT  NOT NULL,
    -- SelectBoxのText
    html_text VARCHAR(16) NOT NULL
);

INSERT INTO race (value, html_text) VALUES
    (1, '不明'),
    (2, 'リアル(和風)'),
    (3, 'リアル(海外)'),
    (4, 'ファンタジー(和風)'),
    (5, 'ファンタジー(海外)'),
    (6, 'その他(クリーチャー)')
;