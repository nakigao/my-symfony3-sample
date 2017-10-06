-- ミドルネーム
USE character_database;
DROP TABLE IF EXISTS `middle_name`;
CREATE TABLE IF NOT EXISTS `middle_name` (
    id              BIGINT PRIMARY KEY         AUTO_INCREMENT,
    name            VARCHAR(255) NOT NULL,
    name_kana       VARCHAR(255) NOT NULL,
    duplicate_count INT
);
# INSERT INTO middle_name (name, name_kana, duplicate_count)
#     SELECT
#         middle_name      AS name,
#         middle_name_kana AS name_kana,
#         COUNT(*)         AS duplicate_count
#     FROM character_base
#     WHERE middle_name IS NOT NULL
#     GROUP BY middle_name, middle_name_kana
#     ORDER BY middle_name_kana ASC;