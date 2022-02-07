--
-- Base de données : `UsersNestixDB`
--

CREATE DATABASE IF NOT EXISTS UsersNestixDB
-- --------------------------------------------------------

--
-- Structure de la table `UsersNestix`
--

CREATE TABLE `UsersNestix` (
    `ID` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `Firstname` varchar(255) DEFAULT NULL,
    `Lastname` varchar(255) DEFAULT NULL,
    `Username` varchar(255) DEFAULT NULL,
    `Email` varchar(255) DEFAULT NULL
);

--
-- Déchargement des données de la table `UsersNestix`
--

INSERT INTO `UsersNestix` (`Firstname`,`Lastname`, `Username`,`Email`) VALUES
('Sam', 'HO', 'Sam_Cute','Sam@gmail.com'),
('Sabine', 'HO', 'Sabine_Jolie', 'Sabine@yahoo.com'),
('Nhi', 'NGO', 'Nhi_Pro', 'Nhi@hotmail.com');