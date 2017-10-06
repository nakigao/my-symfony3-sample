-- ファミリーネーム
USE character_database;
DROP TABLE IF EXISTS `family_name`;
CREATE TABLE IF NOT EXISTS `family_name` (
    id              BIGINT PRIMARY KEY         AUTO_INCREMENT,
    name            VARCHAR(255) NOT NULL,
    name_kana       VARCHAR(255) NOT NULL,
    duplicate_count INT
);
# INSERT INTO family_name (name, name_kana, duplicate_count)
#     SELECT
#         family_name      AS name,
#         family_name_kana AS name_kana,
#         COUNT(*)         AS duplicate_count
#     FROM character_base
#     WHERE family_name IS NOT NULL
#     GROUP BY family_name, family_name_kana
#     ORDER BY family_name_kana ASC;
