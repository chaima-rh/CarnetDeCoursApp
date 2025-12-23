-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2025 at 09:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet`
--

-- --------------------------------------------------------

--
-- Table structure for table `administration`
--

CREATE TABLE `administration` (
  `email` varchar(100) NOT NULL,
  `nom_admin` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administration`
--

INSERT INTO `administration` (`email`, `nom_admin`, `password`) VALUES
('admin@ofppt.ma', 'Administrateur principale', ' admin123');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id_document` int(11) NOT NULL,
  `id_matiere` int(11) NOT NULL,
  `chemin` varchar(255) NOT NULL,
  `descr` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id_document`, `id_matiere`, `chemin`, `descr`) VALUES
(26, 27, 'cours/TP 7 - POO avancé.pdf', 'cours php'),
(27, 2, 'cours/Traiter les données en PHP.pdf', 'cours'),
(28, 28, 'cours/TP 6.pdf', 'tp'),
(29, 20, 'cours/CahierDeCharge_projetTK.pdf', 'tp'),
(30, 20, 'cours/CahierDeCharge_projetTK.pdf', 'tp'),
(31, 28, 'cours/TP 6.pdf', 'tp'),
(32, 2, 'cours/TP 6.pdf', 'tp'),
(33, 20, 'cours/Traiter les données en PHP.pdf', 'cours poo php');

-- --------------------------------------------------------

--
-- Table structure for table `emplois_temps`
--

CREATE TABLE `emplois_temps` (
  `id_cours` int(11) NOT NULL,
  `id_filiere` int(11) NOT NULL,
  `id_matiere` int(11) NOT NULL,
  `jour` enum('Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi') NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  `salle` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emplois_temps`
--

INSERT INTO `emplois_temps` (`id_cours`, `id_filiere`, `id_matiere`, `jour`, `heure_debut`, `heure_fin`, `salle`) VALUES
(2, 1, 2, 'Mercredi', '10:00:00', '12:00:00', 'Salle 102'),
(5, 1, 2, 'Mercredi', '10:00:00', '12:00:00', 'Salle 102'),
(9, 1, 20, 'Lundi', '12:00:00', '18:00:00', 'a12'),
(10, 1, 27, 'Mardi', '15:00:00', '20:00:00', 'a12'),
(11, 2, 2, 'Vendredi', '15:04:00', '18:00:00', '6'),
(12, 3, 27, 'Vendredi', '17:05:00', '20:00:00', 'a12');

-- --------------------------------------------------------

--
-- Table structure for table `etudiants`
--

CREATE TABLE `etudiants` (
  `id_etudiant` int(11) NOT NULL,
  `num_etudiant` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `id_filiere` int(11) NOT NULL,
  `photo_profil` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `etudiants`
--

INSERT INTO `etudiants` (`id_etudiant`, `num_etudiant`, `email`, `nom`, `id_filiere`, `photo_profil`, `password`) VALUES
(10, 'ee58493', 'wahibaezzirari@gmail.com', 'wahiba ezzirari', 3, 'img_6854942c4c560.jpg', '67890'),
(11, 'ee5849356', 'imad123@gmail.com', 'imad el rhouat', 2, 'img_6854945c8e86b.jpg', '345'),
(16, 'ETU0077', 'hiba@gmail.com', 'hiba zakif', 1, 'img_685578aa323e1.jpg', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `filieres`
--

CREATE TABLE `filieres` (
  `id_filiere` int(11) NOT NULL,
  `nom_filiere` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `filieres`
--

INSERT INTO `filieres` (`id_filiere`, `nom_filiere`) VALUES
(2, 'Gestion des entreprises'),
(1, 'Informatique'),
(3, 'Réseaux et Télécoms');

-- --------------------------------------------------------

--
-- Table structure for table `filiere_matiere`
--

CREATE TABLE `filiere_matiere` (
  `id_filiere` int(11) NOT NULL,
  `id_matiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `filiere_matiere`
--

INSERT INTO `filiere_matiere` (`id_filiere`, `id_matiere`) VALUES
(1, 2),
(1, 20),
(1, 28),
(2, 27);

-- --------------------------------------------------------

--
-- Table structure for table `matieres`
--

CREATE TABLE `matieres` (
  `id_matiere` int(11) NOT NULL,
  `nom_matiere` varchar(100) NOT NULL,
  `coefficient` int(11) DEFAULT 1,
  `id_professeur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matieres`
--

INSERT INTO `matieres` (`id_matiere`, `nom_matiere`, `coefficient`, `id_professeur`) VALUES
(2, 'Base de Données', 5, 4),
(20, 'poo', 2, 3),
(27, 'php', 3, 1),
(28, 'js', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id_note` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `id_matiere` int(11) NOT NULL,
  `type_note` enum('CC','TP','EFM') NOT NULL,
  `valeur` float DEFAULT NULL CHECK (`valeur` >= 0 and `valeur` <= 20)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id_note`, `id_etudiant`, `id_matiere`, `type_note`, `valeur`) VALUES
(13, 10, 2, 'CC', 20),
(14, 11, 2, 'CC', 17);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id_post` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `id_matiere` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date_post` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professeurs`
--

CREATE TABLE `professeurs` (
  `id_professeur` int(11) NOT NULL,
  `nom_professeur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `professeurs`
--

INSERT INTO `professeurs` (`id_professeur`, `nom_professeur`) VALUES
(1, 'Nom Prof'),
(2, 'Mme sanae touma'),
(3, 'mme hasnna'),
(4, 'Mme mouna geulsaa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id_document`),
  ADD KEY `id_matiere` (`id_matiere`);

--
-- Indexes for table `emplois_temps`
--
ALTER TABLE `emplois_temps`
  ADD PRIMARY KEY (`id_cours`),
  ADD KEY `id_filiere` (`id_filiere`),
  ADD KEY `id_matiere` (`id_matiere`);

--
-- Indexes for table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD UNIQUE KEY `num_etudiant` (`num_etudiant`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_filiere` (`id_filiere`);

--
-- Indexes for table `filieres`
--
ALTER TABLE `filieres`
  ADD PRIMARY KEY (`id_filiere`),
  ADD UNIQUE KEY `nom_filiere` (`nom_filiere`);

--
-- Indexes for table `filiere_matiere`
--
ALTER TABLE `filiere_matiere`
  ADD PRIMARY KEY (`id_filiere`,`id_matiere`),
  ADD KEY `id_matiere` (`id_matiere`);

--
-- Indexes for table `matieres`
--
ALTER TABLE `matieres`
  ADD PRIMARY KEY (`id_matiere`),
  ADD UNIQUE KEY `nom_matiere` (`nom_matiere`,`id_professeur`),
  ADD KEY `id_professeur` (`id_professeur`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id_note`),
  ADD KEY `id_etudiant` (`id_etudiant`),
  ADD KEY `id_matiere` (`id_matiere`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_etudiant` (`id_etudiant`),
  ADD KEY `id_matiere` (`id_matiere`);

--
-- Indexes for table `professeurs`
--
ALTER TABLE `professeurs`
  ADD PRIMARY KEY (`id_professeur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id_document` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `emplois_temps`
--
ALTER TABLE `emplois_temps`
  MODIFY `id_cours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `id_etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `filieres`
--
ALTER TABLE `filieres`
  MODIFY `id_filiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `matieres`
--
ALTER TABLE `matieres`
  MODIFY `id_matiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id_note` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `professeurs`
--
ALTER TABLE `professeurs`
  MODIFY `id_professeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`id_matiere`) REFERENCES `matieres` (`id_matiere`) ON DELETE CASCADE;

--
-- Constraints for table `emplois_temps`
--
ALTER TABLE `emplois_temps`
  ADD CONSTRAINT `emplois_temps_ibfk_1` FOREIGN KEY (`id_filiere`) REFERENCES `filieres` (`id_filiere`) ON DELETE CASCADE,
  ADD CONSTRAINT `emplois_temps_ibfk_2` FOREIGN KEY (`id_matiere`) REFERENCES `matieres` (`id_matiere`) ON DELETE CASCADE;

--
-- Constraints for table `etudiants`
--
ALTER TABLE `etudiants`
  ADD CONSTRAINT `etudiants_ibfk_1` FOREIGN KEY (`id_filiere`) REFERENCES `filieres` (`id_filiere`);

--
-- Constraints for table `filiere_matiere`
--
ALTER TABLE `filiere_matiere`
  ADD CONSTRAINT `filiere_matiere_ibfk_1` FOREIGN KEY (`id_filiere`) REFERENCES `filieres` (`id_filiere`) ON DELETE CASCADE,
  ADD CONSTRAINT `filiere_matiere_ibfk_2` FOREIGN KEY (`id_matiere`) REFERENCES `matieres` (`id_matiere`) ON DELETE CASCADE;

--
-- Constraints for table `matieres`
--
ALTER TABLE `matieres`
  ADD CONSTRAINT `matieres_ibfk_1` FOREIGN KEY (`id_professeur`) REFERENCES `professeurs` (`id_professeur`);

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiants` (`id_etudiant`) ON DELETE CASCADE,
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`id_matiere`) REFERENCES `matieres` (`id_matiere`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiants` (`id_etudiant`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`id_matiere`) REFERENCES `matieres` (`id_matiere`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
