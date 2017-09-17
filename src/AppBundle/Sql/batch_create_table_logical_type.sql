-- daily-batch想定
-- YES or NO
-- セレクトボックスに利用
USE character_database;
DROP TABLE IF EXISTS `logical_type`;
CREATE TABLE IF NOT EXISTS `logical_type` (
    id        BIGINT PRIMARY KEY AUTO_INCREMENT,
    -- SelectBoxのValue
    value     INT  NOT NULL,
    -- SelectBoxのText
    html_text VARCHAR(16) NOT NULL
);

INSERT INTO logical_type (value, html_text) VALUES
    (1, 'NO'),
    (2, 'YES');