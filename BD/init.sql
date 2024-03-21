SET time_zone = 'Europe/Paris';

CREATE TABLE chatJS
(
    idMessage INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    contenu VARCHAR(255) NOT NULL,
    userPseudo VARCHAR(255) NOT NULL,
    horaire TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO chatJS (contenu, userPseudo)
VALUES
('Hello', 'John'),
('Hi', 'Jane'),
('How are you?', 'John'),
('I am fine, thank you', 'Jane'),
('Goodbye', 'John'),
('Goodbye', 'Jane');