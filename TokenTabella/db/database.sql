USE 5ainf1920;

CREATE TABLE computer(
	id INTEGER NOT NULL PRIMARY KEY,
    marcaTastiera VARCHAR(50),
    marcaVideo VARCHAR(50),
	marcaCase VARCHAR(50)
)


	
INSERT INTO computer(id, marcaTastiera, marcaVideo, marcaCase)
VALUES (1, 'Asus', 'Philips', 'hp'),
		(2, 'Sony', 'Samsung', 'logitech'),
		(3, 'Cm', 'Lg', 'MSI'),
	   (4, 'ProGamer', 'HD', 'Basic');
    
CREATE USER 'admin5ainf'@'localhost' IDENTIFIED BY 'admin5ainf',
GRANT ALL PRIVILEGES ON 5ainf1920.persona TO 'admin5ainf'@'localhost';