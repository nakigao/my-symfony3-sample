DROP TABLE IF EXISTS `egs_gamelist`;
CREATE TABLE IF NOT EXISTS `egs_gamelist` (
    id           BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    egs_game_id  BIGINT NOT NULL,
    egs_brand_id BIGINT NOT NULL,
    name         TEXT            DEFAULT NULL,
    release_ymd  DATE            DEFAULT NULL,
    url          TEXT            DEFAULT NULL,
    is_done      BOOL            DEFAULT FALSE, -- 管理用。作業完了かどうか
    is_deleted   BOOL            DEFAULT FALSE
);


