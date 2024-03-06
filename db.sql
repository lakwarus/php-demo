CREATE TABLE IF NOT EXISTS content (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    body TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO content (title, body) VALUES 
('First Post', 'This is the body of the first post.'),
('Second Post', 'Here is some more content in another post.'),
('Third Post', 'And this is yet another post.');

