-- ファーストネーム
USE character_database;
DROP TABLE IF EXISTS `first_name`;
CREATE TABLE IF NOT EXISTS `first_name` (
    id              BIGINT PRIMARY KEY         AUTO_INCREMENT,
    name            VARCHAR(255) NOT NULL,
    name_kana       VARCHAR(255) NOT NULL,
    gender          INT,
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