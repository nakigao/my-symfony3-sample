-- ゲームの基本情報(元データはegs_game)
USE character_database;
DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
    id          BIGINT PRIMARY KEY AUTO_INCREMENT,
    egs_game_id BIGINT NOT NULL UNIQUE,
    -- 管理用。作業完了
    is_done     BOOLEAN            DEFAULT FALSE,
    -- 管理用。チェック不要
    is_deleted  BOOLEAN            DEFAULT FALSE
);
