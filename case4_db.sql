SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `poi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `latitude` varchar(30) NOT NULL,
  `longitude` varchar(30) NOT NULL,
  `pulau` varchar(50) NOT NULL,
  `no_rmh` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `poi` (`id`, `nama`, `deskripsi`, `latitude`, `longitude`, `pulau`, `no_rmh`, `alamat`) VALUES
(27, 'Ann', 'Kos', '-7.9618092659037645', '112.62917619034673', 'Jawa', 15, 'Jl Soekarno Hatta'),
(28, 'Ann', 'Kos', '-7.960960503486977', '112.62653485427032', '123', 3, 'Jl Soekarno Hatta');


ALTER TABLE `poi`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `poi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;
