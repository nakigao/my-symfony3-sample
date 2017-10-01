-- キャラクターのベース情報
USE character_database;
DROP TABLE IF EXISTS `character_base`;
CREATE TABLE IF NOT EXISTS `character_base` (
    id                    BIGINT PRIMARY KEY         AUTO_INCREMENT,
    game_id               BIGINT       NOT NULL,
    name                  VARCHAR(255) NOT NULL      DEFAULT '',
    middle_name           VARCHAR(255)               DEFAULT '',
    family_name           VARCHAR(255)               DEFAULT '',
    name_kana             VARCHAR(255) NOT NULL      DEFAULT '',
    middle_name_kana      VARCHAR(255)               DEFAULT '',
    family_name_kana      VARCHAR(255)               DEFAULT '',
    gender                INT                        DEFAULT 1,
    true_gender           INT                        DEFAULT 1,
    blood_type            INT                        DEFAULT 1,
    height                INT,
    weight                INT,
    cup                   VARCHAR(1),
    bust                  INT,
    waist                 INT,
    hip                   INT,
    birth_month           INT,
    birth_day             INT,
    race                  INT                        DEFAULT 1,
    -- 管理用。WEBサイトとかで並んでいる順番(主人公が1で、他のキャラは2以降)
    introduction_priority INT
);
