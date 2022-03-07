-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Xerado en: 07 de Mar de 2022 ás 20:09
-- Versión do servidor: 8.0.28-0ubuntu0.20.04.3
-- Versión do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `playdisk`
--

-- --------------------------------------------------------

--
-- Estrutura da táboa `artistas`
--

CREATE TABLE `artistas` (
  `id` bigint UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A extraer os datos da táboa `artistas`
--

INSERT INTO `artistas` (`id`, `nome`, `descripcion`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Radiohead', 'Radiohead es una banda británica de rock alternativo originaria de Abingdon-on-Thames, Inglaterra, formada en 1985 inicialmente como una banda de versiones. Está integrada por Thom Yorke (voz, guitarra, piano), Jonny Greenwood (guitarra solista, teclados, otros instrumentos), Ed O\'Brien (guitarra, segunda voz), Colin Greenwood (bajo, teclados) y Phil Selway (batería, percusión).\r\n\r\nRadiohead lanzó su primer sencillo, «Creep», en 1992. Si bien la canción fue en un comienzo un fracaso comercial, se convirtió en un éxito mundial tras el lanzamiento de su álbum debut, Pablo Honey (1993) debido al \"boom\" comercial del rock alternativo. La popularidad de Radiohead en el Reino Unido aumentó con su segundo álbum, The Bends (1995). El tercero, OK Computer (1997), con un sonido expansivo y temáticas como la alienación y la globalización, les dio fama mundial y ha sido aclamado como un disco histórico de la década de 1990 y uno de los mejores álbumes de todos los tiempos.', 'radiohead.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da táboa `artista_produto`
--

CREATE TABLE `artista_produto` (
  `artista_id` bigint UNSIGNED NOT NULL,
  `produto_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A extraer os datos da táboa `artista_produto`
--

INSERT INTO `artista_produto` (`artista_id`, `produto_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da táboa `cancions`
--

CREATE TABLE `cancions` (
  `id` bigint UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artistas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duracion` time NOT NULL,
  `produto_id` bigint UNSIGNED NOT NULL,
  `numero_produto` int NOT NULL,
  `reproduccions` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A extraer os datos da táboa `cancions`
--

INSERT INTO `cancions` (`id`, `nome`, `artistas`, `duracion`, `produto_id`, `numero_produto`, `reproduccions`, `created_at`, `updated_at`) VALUES
(1, 'Packt Like Sardines in a Crushd Tin Box', 'Radiohead', '04:00:00', 1, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da táboa `cancion_lista`
--

CREATE TABLE `cancion_lista` (
  `cancion_id` bigint UNSIGNED NOT NULL,
  `lista_id` bigint UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `posicion` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A extraer os datos da táboa `cancion_lista`
--

INSERT INTO `cancion_lista` (`cancion_id`, `lista_id`, `data`, `posicion`, `created_at`, `updated_at`) VALUES
(1, 2, '2022-03-06', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da táboa `cestas`
--

CREATE TABLE `cestas` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da táboa `comentarios`
--

CREATE TABLE `comentarios` (
  `id` bigint UNSIGNED NOT NULL,
  `comentario` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perfil_id` bigint UNSIGNED NOT NULL,
  `produto_id` bigint UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da táboa `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da táboa `formatos`
--

CREATE TABLE `formatos` (
  `id` bigint UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `prezo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A extraer os datos da táboa `formatos`
--

INSERT INTO `formatos` (`id`, `nome`, `created_at`, `updated_at`, `prezo`) VALUES
(1, 'Vinilo', NULL, NULL, 24),
(2, 'CD', NULL, NULL, 16);

-- --------------------------------------------------------

--
-- Estrutura da táboa `formato_produto`
--

CREATE TABLE `formato_produto` (
  `formato_id` bigint UNSIGNED NOT NULL,
  `produto_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `prezo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A extraer os datos da táboa `formato_produto`
--

INSERT INTO `formato_produto` (`formato_id`, `produto_id`, `created_at`, `updated_at`, `prezo`) VALUES
(1, 1, NULL, NULL, 0),
(2, 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da táboa `listas`
--

CREATE TABLE `listas` (
  `id` bigint UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perfil_id` bigint UNSIGNED NOT NULL,
  `descripcion` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A extraer os datos da táboa `listas`
--

INSERT INTO `listas` (`id`, `titulo`, `perfil_id`, `descripcion`, `foto`, `created_at`, `updated_at`) VALUES
(2, 'Primeira lista', 1, 'Son a primeira lista desta aplicación', 'fotolista.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da táboa `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A extraer os datos da táboa `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_03_173548_create_produtos_table', 1),
(6, '2022_03_03_173902_create_formatos_table', 1),
(7, '2022_03_03_174207_create_formato_produto_table', 1),
(8, '2022_03_03_174222_create_cancions_table', 1),
(9, '2022_03_03_174300_create_artistas_table', 1),
(10, '2022_03_03_174312_create_artista_produto_table', 1),
(11, '2022_03_03_174325_create_xeneros_table', 1),
(12, '2022_03_03_174337_create_produto_xenero_table', 1),
(13, '2022_03_03_174412_create_perfils_table', 1),
(14, '2022_03_03_174435_create_comentarios_table', 1),
(15, '2022_03_03_174501_create_seguidores_table', 1),
(16, '2022_03_03_174512_create_seguidos_table', 1),
(17, '2022_03_03_174524_create_notificacions_table', 1),
(18, '2022_03_03_174535_create_notificacion_perfil_table', 1),
(19, '2022_03_03_174630_create_cestas_table', 1),
(20, '2022_03_03_174645_create_listas_table', 1),
(21, '2022_03_03_174712_create_cancion_lista_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da táboa `notificacions`
--

CREATE TABLE `notificacions` (
  `id` bigint UNSIGNED NOT NULL,
  `texto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da táboa `notificacion_perfil`
--

CREATE TABLE `notificacion_perfil` (
  `notificacion_id` bigint UNSIGNED NOT NULL,
  `perfil_id` bigint UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da táboa `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da táboa `perfils`
--

CREATE TABLE `perfils` (
  `id` bigint UNSIGNED NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `descripcion` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A extraer os datos da táboa `perfils`
--

INSERT INTO `perfils` (`id`, `login`, `rol`, `descripcion`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'primero', 'user', 'Son o primeiro usuario desta aplicación', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da táboa `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da táboa `produtos`
--

CREATE TABLE `produtos` (
  `id` bigint UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `caratula` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_lanzamento` date NOT NULL,
  `data` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A extraer os datos da táboa `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descripcion`, `caratula`, `data_lanzamento`, `data`, `created_at`, `updated_at`) VALUES
(1, 'Amnesiac', 'Amnesiac es el quinto álbum de la banda británica Radiohead, lanzado el 5 de junio del año 2001 en Estados Unidos y Canadá y debutando en #1 en el Billboard de Estados Unidos.\r\n\r\nAmnesiac es visto como lo más lejano del rock y las letras características de Radiohead y, sin embargo, tiene más guitarras audibles que su predecesor, Kid A. Otra diferencia es que Amnesiac sí tuvo sencillos con éxito. Como en Kid A, las influencias de Amnesiac vienen de lo electrónico, el IDM y el jazz. ', 'amnesiac.jpg', '2022-03-06', '2022-03-07', '2022-03-07 15:35:43', '2022-03-07 15:35:43');

-- --------------------------------------------------------

--
-- Estrutura da táboa `produto_xenero`
--

CREATE TABLE `produto_xenero` (
  `produto_id` bigint UNSIGNED NOT NULL,
  `xenero_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A extraer os datos da táboa `produto_xenero`
--

INSERT INTO `produto_xenero` (`produto_id`, `xenero_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da táboa `seguidores`
--

CREATE TABLE `seguidores` (
  `perfil_id` bigint UNSIGNED NOT NULL,
  `seguidor_id` bigint UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da táboa `seguidos`
--

CREATE TABLE `seguidos` (
  `perfil_id` bigint UNSIGNED NOT NULL,
  `seguido_id` bigint UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da táboa `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A extraer os datos da táboa `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Daniel', 'dani.rivas.arevalo@gmail.com', NULL, '$2y$10$7/2WvaYQ7N5VF5SJsVB9PuBcSejbJaoBsIe71eWRzT8rsQFohMlF2', NULL, '2022-03-07 17:50:28', '2022-03-07 17:50:28');

-- --------------------------------------------------------

--
-- Estrutura da táboa `xeneros`
--

CREATE TABLE `xeneros` (
  `id` bigint UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A extraer os datos da táboa `xeneros`
--

INSERT INTO `xeneros` (`id`, `nome`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'rock', 'El rock es un amplio género de música popular originado como rock and roll a principios de la década de 1950 en Estados Unidos y que derivaría en un gran rango de diferentes estilos durante mediados de los años 60 y posteriores, particularmente en ese país y Reino Unido.1​2​ Tiene sus raíces en el rock and roll de los años 50, estilo nacido directamente de géneros como el blues, el rhythm and blues —pertenecientes a la música afroamericana— y el country. También se nutrió fuertemente del blues eléctrico y el folk, además de incorporar influencias del jazz y la música clásica, entre otras fuentes.', '2022-03-07 15:37:49', '2022-03-07 15:37:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artistas`
--
ALTER TABLE `artistas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artista_produto`
--
ALTER TABLE `artista_produto`
  ADD PRIMARY KEY (`artista_id`,`produto_id`),
  ADD KEY `artista_produto_produto_id_foreign` (`produto_id`);

--
-- Indexes for table `cancions`
--
ALTER TABLE `cancions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cancions_produto_id_foreign` (`produto_id`);

--
-- Indexes for table `cancion_lista`
--
ALTER TABLE `cancion_lista`
  ADD PRIMARY KEY (`cancion_id`,`lista_id`),
  ADD KEY `cancion_lista_lista_id_foreign` (`lista_id`);

--
-- Indexes for table `cestas`
--
ALTER TABLE `cestas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comentarios_perfil_id_foreign` (`perfil_id`),
  ADD KEY `comentarios_produto_id_foreign` (`produto_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `formatos`
--
ALTER TABLE `formatos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formato_produto`
--
ALTER TABLE `formato_produto`
  ADD PRIMARY KEY (`formato_id`,`produto_id`),
  ADD KEY `formato_produto_produto_id_foreign` (`produto_id`);

--
-- Indexes for table `listas`
--
ALTER TABLE `listas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listas_perfil_id_foreign` (`perfil_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notificacions`
--
ALTER TABLE `notificacions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notificacion_perfil`
--
ALTER TABLE `notificacion_perfil`
  ADD PRIMARY KEY (`perfil_id`,`notificacion_id`),
  ADD KEY `notificacion_perfil_notificacion_id_foreign` (`notificacion_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `perfils`
--
ALTER TABLE `perfils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produto_xenero`
--
ALTER TABLE `produto_xenero`
  ADD PRIMARY KEY (`xenero_id`,`produto_id`),
  ADD KEY `produto_xenero_produto_id_foreign` (`produto_id`);

--
-- Indexes for table `seguidores`
--
ALTER TABLE `seguidores`
  ADD PRIMARY KEY (`perfil_id`,`seguidor_id`),
  ADD KEY `seguidores_seguidor_id_foreign` (`seguidor_id`);

--
-- Indexes for table `seguidos`
--
ALTER TABLE `seguidos`
  ADD PRIMARY KEY (`perfil_id`,`seguido_id`),
  ADD KEY `seguidos_seguido_id_foreign` (`seguido_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `xeneros`
--
ALTER TABLE `xeneros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artistas`
--
ALTER TABLE `artistas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cancions`
--
ALTER TABLE `cancions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cestas`
--
ALTER TABLE `cestas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `formatos`
--
ALTER TABLE `formatos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `listas`
--
ALTER TABLE `listas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `notificacions`
--
ALTER TABLE `notificacions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perfils`
--
ALTER TABLE `perfils`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `xeneros`
--
ALTER TABLE `xeneros`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricións para os envorcados das táboas
--

--
-- Restricións para a táboa `artista_produto`
--
ALTER TABLE `artista_produto`
  ADD CONSTRAINT `artista_produto_artista_id_foreign` FOREIGN KEY (`artista_id`) REFERENCES `artistas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `artista_produto_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restricións para a táboa `cancions`
--
ALTER TABLE `cancions`
  ADD CONSTRAINT `cancions_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restricións para a táboa `cancion_lista`
--
ALTER TABLE `cancion_lista`
  ADD CONSTRAINT `cancion_lista_cancion_id_foreign` FOREIGN KEY (`cancion_id`) REFERENCES `cancions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cancion_lista_lista_id_foreign` FOREIGN KEY (`lista_id`) REFERENCES `listas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restricións para a táboa `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_perfil_id_foreign` FOREIGN KEY (`perfil_id`) REFERENCES `perfils` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restricións para a táboa `formato_produto`
--
ALTER TABLE `formato_produto`
  ADD CONSTRAINT `formato_produto_formato_id_foreign` FOREIGN KEY (`formato_id`) REFERENCES `formatos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formato_produto_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restricións para a táboa `listas`
--
ALTER TABLE `listas`
  ADD CONSTRAINT `listas_perfil_id_foreign` FOREIGN KEY (`perfil_id`) REFERENCES `perfils` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restricións para a táboa `notificacion_perfil`
--
ALTER TABLE `notificacion_perfil`
  ADD CONSTRAINT `notificacion_perfil_notificacion_id_foreign` FOREIGN KEY (`notificacion_id`) REFERENCES `notificacions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notificacion_perfil_perfil_id_foreign` FOREIGN KEY (`perfil_id`) REFERENCES `perfils` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restricións para a táboa `produto_xenero`
--
ALTER TABLE `produto_xenero`
  ADD CONSTRAINT `produto_xenero_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produto_xenero_xenero_id_foreign` FOREIGN KEY (`xenero_id`) REFERENCES `xeneros` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restricións para a táboa `seguidores`
--
ALTER TABLE `seguidores`
  ADD CONSTRAINT `seguidores_perfil_id_foreign` FOREIGN KEY (`perfil_id`) REFERENCES `perfils` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seguidores_seguidor_id_foreign` FOREIGN KEY (`seguidor_id`) REFERENCES `perfils` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restricións para a táboa `seguidos`
--
ALTER TABLE `seguidos`
  ADD CONSTRAINT `seguidos_perfil_id_foreign` FOREIGN KEY (`perfil_id`) REFERENCES `perfils` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seguidos_seguido_id_foreign` FOREIGN KEY (`seguido_id`) REFERENCES `perfils` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
