-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2023 pada 15.40
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website-ekskul`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekskul`
--

CREATE TABLE `ekskul` (
  `ekskul_id` int(11) NOT NULL,
  `nama_ekskul` varchar(128) NOT NULL,
  `kategori_ekskul_id` int(11) DEFAULT NULL,
  `logo_ekskul` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ekskul`
--

INSERT INTO `ekskul` (`ekskul_id`, `nama_ekskul`, `kategori_ekskul_id`, `logo_ekskul`) VALUES
(1, 'Basket', 2, 'team-2.jpg'),
(2, 'Karate', 2, 'team-1.jpg'),
(3, 'Taekwondo', 2, 'team-3.jpg'),
(4, 'Volly', 2, 'UMMI .png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_ekskul`
--

CREATE TABLE `kategori_ekskul` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_ekskul`
--

INSERT INTO `kategori_ekskul` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Wajib'),
(2, 'Olahraga'),
(3, 'Keagamaan'),
(4, 'Seni'),
(5, 'Bahasa'),
(6, 'Teknologi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ketua`
--

CREATE TABLE `ketua` (
  `id_ketua` int(11) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `ekskul_nama` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ketua`
--

INSERT INTO `ketua` (`id_ketua`, `id_role`, `ekskul_nama`) VALUES
(1, 13, 3),
(2, 11, 1),
(3, 12, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(9, 'razifrosadi', 'razifilham.12@gmail.com', 'default.jpg', '$2y$10$CLCp94t6lw9Ss6joVzSBUeA8zWF0TQkT2Ley2mYTaJWzzs/mZYXR2', 2, 1, 1687155816),
(10, 'admin', 'admin@gmail.com', 'default.jpg', '$2y$10$aC5Dz3rIxXpyAwaJHtnI7ewkX6G1mp0ni4VlT/jcgX.BmtrNuAIRu', 1, 1, 1687196419),
(11, 'basket', 'basket@gmail.com', 'default.jpg', '$2y$10$7y.sRost4omQ18toOQU/5u1heupKqGVjP4kU0r6yXAe1aPP2xpypW', 3, 1, 1687220107),
(12, 'hilman', 'hilman@gmail.com', 'default.jpg', '$2y$10$Qd1HL2xEUxcGlZk1rdZZju4rNyTVSSYjpJksCgvrLsdB6O5smHIa2', 3, 1, 1687502215),
(13, 'wildan', 'wildan@gmail.com', 'default.jpg', '$2y$10$JDFdyYhnH4djoBT/3tlyp.hAmD9ccA3Blff5YRLvFd6rsDq8qyyeq', 3, 1, 1687507678),
(14, 'fauzy', 'fauzy@gmail.com', 'default.jpg', '$2y$10$FMwCHcdQbCVLZjnc8ZQj7.k5JkF8D.NS70pBz0djL2hLneLAAq2yW', 3, 1, 1687508026),
(15, 'dwi fahriza', 'dwifahriza@gmail.com', 'default.jpg', '$2y$10$NcnhTHFKjdOHLVQyV9RC.uXzM2l8Ll4MAnaHCLKW17tLPJ/nnmKOe', 2, 1, 1687508240);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(5, 3, 2),
(6, 1, 4),
(7, 3, 3),
(8, 2, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Ketua'),
(4, 'Menu'),
(5, 'Siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Siswa'),
(3, 'Ketua');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` text NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', '<svg class=\"text-dark\" width=\"16px\" height=\"16px\" viewBox=\"0 0 42 42\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"> <title>office</title> <g id=\"Basic-Elements\" stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\"> <g id=\"Rounded-Icons\" transform=\"translate(-1869.000000, -293.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\"> <g id=\"Icons-with-opacity\" transform=\"translate(1716.000000, 291.000000)\"> <g id=\"office\" transform=\"translate(153.000000, 2.000000)\"> <path class=\"color-background\" d=\"M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z\" id=\"Path\" opacity=\"0.6\"></path> <path class=\"color-background\" d=\"M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z\"></path> </g> </g> </g> </g> </svg>', 1),
(2, 2, 'My Profile', 'user', '<svg class=\"text-dark\" width=\"16px\" height=\"16px\" viewBox=\"0 0 46 42\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"> <title>customer-support</title> <g id=\"Basic-Elements\" stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\"> <g id=\"Rounded-Icons\" transform=\"translate(-1717.000000, -291.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\"> <g id=\"Icons-with-opacity\" transform=\"translate(1716.000000, 291.000000)\"> <g id=\"customer-support\" transform=\"translate(1.000000, 0.000000)\"> <path class=\"color-background\" d=\"M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z\" id=\"Path\" opacity=\"0.59858631\"></path> <path class=\"color-foreground\" d=\"M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z\" id=\"Path\"></path> <path class=\"color-foreground\" d=\"M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z\" id=\"Path\"></path> </g> </g> </g> </g> </svg>', 1),
(3, 2, 'Edit Profile', 'user/edit', '<svg class=\"text-dark\" width=\"16px\" height=\"16px\" viewBox=\"0 0 40 44\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"> <title>document</title> <g id=\"Basic-Elements\" stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\"> <g id=\"Rounded-Icons\" transform=\"translate(-1870.000000, -591.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\"> <g id=\"Icons-with-opacity\" transform=\"translate(1716.000000, 291.000000)\"> <g id=\"document\" transform=\"translate(154.000000, 300.000000)\"> <path class=\"color-background\" d=\"M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z\" id=\"Path\" opacity=\"0.603585379\"></path> <path class=\"color-background\" d=\"M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z\" id=\"Shape\"></path> </g> </g> </g> </g> </svg>', 1),
(4, 4, 'Menu Management', 'menu', '<svg class=\"text-dark\" width=\"16px\" height=\"16px\" viewBox=\"0 0 40 40\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"> <title>settings</title> <g id=\"Basic-Elements\" stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\"> <g id=\"Rounded-Icons\" transform=\"translate(-2020.000000, -442.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\"> <g id=\"Icons-with-opacity\" transform=\"translate(1716.000000, 291.000000)\"> <g id=\"settings\" transform=\"translate(304.000000, 151.000000)\"> <polygon class=\"color-background\" id=\"Path\" opacity=\"0.596981957\" points=\"18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667\"></polygon> <path class=\"color-background\" d=\"M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z\" id=\"Path\" opacity=\"0.596981957\"></path> <path class=\"color-background\" d=\"M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z\" id=\"Path\"></path> </g> </g> </g> </g> </svg>', 1),
(5, 4, 'Submenu Management', 'menu/submenu', '<svg class=\"text-dark\" width=\"16px\" height=\"16px\" viewBox=\"0 0 40 40\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"> <title>settings</title> <g id=\"Basic-Elements\" stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\"> <g id=\"Rounded-Icons\" transform=\"translate(-2020.000000, -442.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\"> <g id=\"Icons-with-opacity\" transform=\"translate(1716.000000, 291.000000)\"> <g id=\"settings\" transform=\"translate(304.000000, 151.000000)\"> <polygon class=\"color-background\" id=\"Path\" opacity=\"0.596981957\" points=\"18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667\"></polygon> <path class=\"color-background\" d=\"M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z\" id=\"Path\" opacity=\"0.596981957\"></path> <path class=\"color-background\" d=\"M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z\" id=\"Path\"></path> </g> </g> </g> </g> </svg>', 1),
(11, 3, 'Data Anggota Ekstrakurikuler', 'ketua', '<svg class=\"text-dark\" width=\"16px\" height=\"16px\" viewBox=\"0 0 43 36\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"> <title>credit-card</title> <g id=\"Basic-Elements\" stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\"> <g id=\"Rounded-Icons\" transform=\"translate(-2169.000000, -745.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\"> <g id=\"Icons-with-opacity\" transform=\"translate(1716.000000, 291.000000)\"> <g id=\"credit-card\" transform=\"translate(453.000000, 454.000000)\"> <path class=\"color-background\" d=\"M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z\" id=\"Path\" opacity=\"0.593633743\"></path> <path class=\"color-background\" d=\"M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z\"></path> </g> </g> </g> </g> </svg>\r\n      ', 1),
(12, 5, 'Pendaftaran Ekstrakurikuler', 'siswa', '<svg class=\"text-dark\" width=\"16px\" height=\"16px\" viewBox=\"0 0 40 44\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"> <title>document</title> <g id=\"Basic-Elements\" stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\"> <g id=\"Rounded-Icons\" transform=\"translate(-1870.000000, -591.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\"> <g id=\"Icons-with-opacity\" transform=\"translate(1716.000000, 291.000000)\"> <g id=\"document\" transform=\"translate(154.000000, 300.000000)\"> <path class=\"color-background\" d=\"M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z\" id=\"Path\" opacity=\"0.603585379\"></path> <path class=\"color-background\" d=\"M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z\" id=\"Shape\"></path> </g> </g> </g> </g> </svg>', 1),
(13, 1, 'Add New Ekskul', 'admin/add_new_ekskul', '<svg class=\"text-dark\" width=\"16px\" height=\"16px\" viewBox=\"0 0 42 42\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"> <g id=\"Basic-Elements\" stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\"> <g id=\"Rounded-Icons\" transform=\"translate(-2319.000000, -291.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\"> <g id=\"Icons-with-opacity\" transform=\"translate(1716.000000, 291.000000)\"> <g id=\"box-3d-50\" transform=\"translate(603.000000, 0.000000)\"> <path class=\"color-background\" d=\"M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z\" id=\"Path\"></path> <path class=\"color-background\" d=\"M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z\" id=\"Path\" opacity=\"0.7\"></path> <path class=\"color-background\" d=\"M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z\" id=\"Path\" opacity=\"0.7\"></path> </g> </g> </g> </g> </svg>\r\n      ', 1),
(14, 1, 'Registrasi Akun Ketua', 'admin/registrasi_ketua', '<svg class=\"text-dark\" width=\"16px\" height=\"16px\" viewBox=\"0 0 40 40\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"> <title>settings</title> <g id=\"Basic-Elements\" stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\"> <g id=\"Rounded-Icons\" transform=\"translate(-2020.000000, -442.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\"> <g id=\"Icons-with-opacity\" transform=\"translate(1716.000000, 291.000000)\"> <g id=\"settings\" transform=\"translate(304.000000, 151.000000)\"> <polygon class=\"color-background\" id=\"Path\" opacity=\"0.596981957\" points=\"18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667\"></polygon> <path class=\"color-background\" d=\"M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z\" id=\"Path\" opacity=\"0.596981957\"></path> <path class=\"color-background\" d=\"M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z\" id=\"Path\"></path> </g> </g> </g> </g> </svg>\r\n      ', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ekskul`
--
ALTER TABLE `ekskul`
  ADD PRIMARY KEY (`ekskul_id`),
  ADD KEY `kategori_ekskul_id` (`kategori_ekskul_id`);

--
-- Indeks untuk tabel `kategori_ekskul`
--
ALTER TABLE `kategori_ekskul`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `ketua`
--
ALTER TABLE `ketua`
  ADD PRIMARY KEY (`id_ketua`),
  ADD KEY `ekskul_nama` (`ekskul_nama`),
  ADD KEY `id_role` (`id_role`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ekskul`
--
ALTER TABLE `ekskul`
  MODIFY `ekskul_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kategori_ekskul`
--
ALTER TABLE `kategori_ekskul`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ketua`
--
ALTER TABLE `ketua`
  MODIFY `id_ketua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ekskul`
--
ALTER TABLE `ekskul`
  ADD CONSTRAINT `ekskul_ibfk_2` FOREIGN KEY (`kategori_ekskul_id`) REFERENCES `kategori_ekskul` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `ketua`
--
ALTER TABLE `ketua`
  ADD CONSTRAINT `ketua_ibfk_2` FOREIGN KEY (`ekskul_nama`) REFERENCES `ekskul` (`ekskul_id`),
  ADD CONSTRAINT `ketua_ibfk_3` FOREIGN KEY (`id_role`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
