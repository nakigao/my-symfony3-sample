DROP TABLE IF EXISTS `characteristic`;
CREATE TABLE IF NOT EXISTS `characteristic` (
    id            BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    character_id  BIGINT NOT NULL,
    display_order INT    NOT NULL,
    body          TEXT            DEFAULT NULL,
    is_deleted    BOOL            DEFAULT FALSE
);
-- INSERT INTO characteristic (character_id, display_order, body, is_deleted) VALUES
--     (1, 1, 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', FALSE)
--
-- ;
