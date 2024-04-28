CREATE TABLE IF NOT EXISTS task
(
    id          INT AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(255) NOT NULL,
    description TEXT,
    status      ENUM ('todo', 'in_progress', 'done') DEFAULT 'todo',
    created_at  TIMESTAMP                            DEFAULT CURRENT_TIMESTAMP
);