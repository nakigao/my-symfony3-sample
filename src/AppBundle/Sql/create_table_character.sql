DROP TABLE IF EXISTS `character`;
CREATE TABLE IF NOT EXISTS `character` (
    id               BIGINT NOT NULL PRIMARY KEY,
    egs_game_id      BIGINT DEFAULT NULL,
    name             TEXT   DEFAULT NULL,
    name_kana        TEXT   DEFAULT NULL,
    middle_name      TEXT   DEFAULT NULL,
    middle_name_kana TEXT   DEFAULT NULL,
    family_name      TEXT   DEFAULT NULL,
    family_name_kana TEXT   DEFAULT NULL,
    gender           INT    DEFAULT NULL,
    gender_true      INT    DEFAULT NULL,
    blood_type       INT    DEFAULT NULL,
    birth_month      INT    DEFAULT NULL,
    birth_day        INT    DEFAULT NULL,
    is_deleted       BOOL   DEFAULT FALSE
);