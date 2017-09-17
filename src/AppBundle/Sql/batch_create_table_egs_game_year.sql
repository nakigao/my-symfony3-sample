-- daily-batch想定
-- egs_gamelistテーブルを走査して、年別に何件存在するか格納しておく
-- セレクトボックスに利用
USE character_database;
DROP TABLE IF EXISTS `egs_game_year`;
CREATE TABLE IF NOT EXISTS `egs_game_year` (
    id        BIGINT PRIMARY KEY AUTO_INCREMENT,
    -- 年
    year      INT  NOT NULL,
    -- 件数
    total     INT NOT NULL DEFAULT 0,
    -- SelectBoxのValue
    value     INT NOT NULL,
    -- SelectBoxのText
    html_text TEXT NOT NULL
);

INSERT INTO egs_game_year (year, total, value, html_text)
    SELECT
        DATE_FORMAT(release_ymd, '%Y') AS year,
        COUNT(*)                       AS total,
        DATE_FORMAT(release_ymd, '%Y') AS value,
        CONCAT(DATE_FORMAT(release_ymd, '%Y'), '(', COUNT(*), ')') AS html_text
    FROM
        egs_game
    GROUP BY
        DATE_FORMAT(release_ymd, '%Y');
