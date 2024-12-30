SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- Create table for Zodiac Signs
CREATE TABLE `zodiac` (
    `sign_name` VARCHAR(100) DEFAULT NULL,
    `description` VARCHAR(255) DEFAULT NULL,
    `image_url` VARCHAR(255) DEFAULT NULL,
    `start_date` DATE NOT NULL,
    `end_date` DATE NOT NULL
);

-- Create table for Users
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `is_admin` int(1) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(150) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(150) NOT NULL,
  `birthday` date NOT NULL,
  `password` varchar(150) NOT NULL,
  `zodiac_sign` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Example entries for Zodiac Signs
INSERT INTO `zodiac` (`sign_name`, `description`, `image_url`, `start_date`, `end_date`) VALUES
('Aries', 'Aries are bold and ambitious, diving headfirst into even the most challenging situations.', 'https://i.pinimg.com/736x/a9/5c/73/a95c734313804ed2ede38483868a08d1.jpg', '2023-03-21', '2023-04-19'),
('Taurus', 'Taurus is an earth sign represented by the bull. They enjoy relaxing environments filled with soft sounds.', 'https://i.pinimg.com/736x/2a/87/02/2a8702f61089e2eb5af7cf3e3b137485.jpg', '2023-04-20', '2023-05-20'),
('Gemini', 'Gemini is playful and curious, constantly juggling a variety of passions, hobbies, and friends.', 'https://i.pinimg.com/736x/3a/b7/48/3ab74816be5bda0b2c5a6ac1c3c0bafd.jpg', '2023-05-21', '2023-06-20'),
('Cancer', 'Cancer is a deeply intuitive and emotional sign, often caring deeply for their loved ones.', 'https://i.pinimg.com/736x/93/59/82/9359825b07e306e4d044c8e506ede579.jpg', '2023-06-21', '2023-07-22'),
('Leo', 'Leo is represented by the lion and is known for their charisma, creativity, and confidence.', 'https://i.pinimg.com/736x/dd/3c/21/dd3c21640b77e6ed63e93fe29b1d6bb9.jpg', '2023-07-23', '2023-08-22'),
('Virgo', 'Virgo is logical, practical, and systematic in their approach to life.', 'https://i.pinimg.com/736x/c1/84/7e/c1847e2c5ece6d73827f2fa64b33a02b.jpg', '2023-08-23', '2023-09-22'),
('Libra', 'Libra is an air sign represented by the scales and is known for their love of balance and harmony.', 'https://i.pinimg.com/736x/8c/33/f4/8c33f4c1f2fb134a566e343b71954640.jpg', '2023-09-23', '2023-10-22'),
('Scorpio', 'Scorpio is passionate, assertive, and resourceful, often known for their intensity.', 'https://i.pinimg.com/736x/95/38/3f/95383fa03a3e45189b4deadd1e5bae56.jpg', '2023-10-23', '2023-11-21'),
('Sagittarius', 'Sagittarius is a fire sign, known for their adventurous spirit and love of travel.', 'https://i.pinimg.com/736x/79/46/9c/79469cc60fce052cad3295a6bb7c2d49.jpg', '2023-11-22', '2023-12-21'),
('Capricorn', 'Capricorn is disciplined and responsible, often taking a practical approach to achieving their goals.', 'https://i.pinimg.com/736x/3e/2d/37/3e2d379772bccbe761c50e82c6bd8f2b.jpg', '2023-12-22', '2024-01-19'),
('Aquarius', 'Aquarius is an air sign known for their progressive ideas, creativity, and humanitarian outlook.', 'https://i.pinimg.com/736x/a7/66/56/a7665620fea5f1ebea01a88d446ef22b.jpg', '2024-01-20', '2024-02-18'),
('Pisces', 'Pisces is empathetic, artistic, and often deeply connected to their emotions.', 'https://i.pinimg.com/736x/18/1b/aa/181baaa58a98adffd78fef95f4f122a6.jpg', '2024-02-19', '2024-03-20');

-- Example entries for Users
INSERT INTO `users` (`id`, `is_admin`, `first_name`, `last_name`, `gender`, `email`, `username`, `birthday`, `password`, `zodiac_sign`) VALUES
(31, 0, '123', '123', 'Male', '123@mailo.com', '123', '2024-06-20', '123', 'Aquarius'),
(35, 1, '111', '111', 'Female', '111@mail.com', 'capulenico@gmail.com', '2015-06-10', '111', 'Aquarius'),
(36, 0, 'Nicollo Andrew', 'Capule', 'Male', 'capulenico@gmail.com', 'Zilosaurus', '2017-06-14', '111', 'Gemini'),
(37, 0, 'Nicollo Andrew', 'Capule', 'Male', 'capulenico@gmail.com', 'Zilosaurus', '2024-12-16', '111', 'Sagittarius'),
(38, 1, 'Nicollo Andrew', 'Capule', 'Male', 'capulenico@gmail.com', 'Zilosaurus', '2025-01-01', '1122333', 'Capricorn');


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;
