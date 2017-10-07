-- ファーストネーム
-- アプリケーションでランダム値を生成する都合上、欠番のないリストが必要
-- 条件別にあらかじめテーブルを作る必要がある
USE character_database;
DROP TABLE IF EXISTS `first_name_male`;
CREATE TABLE IF NOT EXISTS `first_name_male` (
    id              BIGINT PRIMARY KEY         AUTO_INCREMENT,
    name            VARCHAR(255) NOT NULL,
    name_kana       VARCHAR(255) NOT NULL,
    duplicate_count INT
);
DROP TABLE IF EXISTS `first_name_female`;
CREATE TABLE IF NOT EXISTS `first_name_female` (
    id              BIGINT PRIMARY KEY         AUTO_INCREMENT,
    name            VARCHAR(255) NOT NULL,
    name_kana       VARCHAR(255) NOT NULL,
    duplicate_count INT
);
DROP TABLE IF EXISTS `first_name_other`;
CREATE TABLE IF NOT EXISTS `first_name_other` (
    id              BIGINT PRIMARY KEY         AUTO_INCREMENT,
    name            VARCHAR(255) NOT NULL,
    name_kana       VARCHAR(255) NOT NULL,
    duplicate_count INT
);
# INSERT INTO first_name (name, name_kana, gender, duplicate_count)
#     SELECT
#         name      AS name,
#         name_kana AS name_kana,
#         gender    AS gender,
#         COUNT(*)  AS duplicate_count
#     FROM character_base
#     WHERE name IS NOT NULL
#     GROUP BY name, name_kana, gender
#     ORDER BY name_kana ASC;