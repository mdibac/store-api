--
-- Base de données : `store_api`
--

-- --------------------------------------------------------

--
-- Structure de la table `stores`
--

CREATE TABLE `stores` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `stores`
--

INSERT INTO `stores` (`id`, `name`, `location`, `category`) VALUES
(1, 'Store 1', 'Paris', 'Electronics'),
(2, 'Store 2', 'Lyon', 'Fashion'),
(3, 'Store 3', 'Marseille', 'Groceries'),
(4, 'Store 4', 'Bordeaux', 'Home Goods'),
(5, 'Store 5', 'Nantes', 'Sports'),
(6, 'Store 6', 'Lille', 'Toys'),
(7, 'Store 7', 'Strasbourg', 'Books'),
(8, 'Store 8', 'Nice', 'Beauty'),
(9, 'Store 9', 'Toulouse', 'Furniture'),
(10, 'Store 10', 'Montpellier', 'Jewelry'),
(11, 'Store 11', 'Paris', 'Fashion'),
(12, 'Store 12', 'Lyon', 'Groceries'),
(13, 'Store 13', 'Marseille', 'Electronics'),
(14, 'Store 14', 'Bordeaux', 'Books'),
(15, 'Store 15', 'Nantes', 'Beauty'),
(16, 'Store 16', 'Lille', 'Furniture'),
(17, 'Store 17', 'Strasbourg', 'Sports'),
(18, 'Store 18', 'Nice', 'Toys'),
(19, 'Store 19', 'Toulouse', 'Jewelry'),
(20, 'Store 20', 'Montpellier', 'Home Goods');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;