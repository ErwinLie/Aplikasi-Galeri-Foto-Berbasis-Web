/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 100422 (10.4.22-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : galeri

 Target Server Type    : MySQL
 Target Server Version : 100422 (10.4.22-MariaDB)
 File Encoding         : 65001

 Date: 15/11/2024 15:18:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_activity
-- ----------------------------
DROP TABLE IF EXISTS `tb_activity`;
CREATE TABLE `tb_activity`  (
  `id_activity` int NOT NULL AUTO_INCREMENT,
  `id_user` int NULL DEFAULT NULL,
  `activity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `timestamp` datetime NULL DEFAULT NULL,
  `delete_at` datetime NULL DEFAULT NULL,
  `delete_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_activity`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 56 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_activity
-- ----------------------------
INSERT INTO `tb_activity` VALUES (1, 1, 'User membuka Log Activity', '2024-11-15 00:39:30', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (2, 1, 'User membuka Log Activity', '2024-11-15 00:40:53', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (3, 1, 'User Membuka Menu Foto', '2024-11-15 00:40:58', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (4, 1, 'User melakukan Edit foto', '2024-11-15 00:41:20', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (5, 1, 'User Membuka Menu Foto', '2024-11-15 00:41:20', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (6, 1, 'User Membuka Menu Foto', '2024-11-15 00:42:29', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (7, 1, 'User Melakukan Log Out', '2024-11-15 00:42:43', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (8, NULL, 'User ke Halaman Login', '2024-11-15 00:42:44', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (9, NULL, 'User ke Halaman Login', '2024-11-15 00:47:55', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (10, NULL, 'User Membuka Sign Up', '2024-11-15 00:48:41', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (11, NULL, 'User melakukan Sign Up', '2024-11-15 00:49:07', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (12, NULL, 'User ke Halaman Login', '2024-11-15 00:49:08', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (13, NULL, 'User melakukan Login', '2024-11-15 00:49:17', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (14, 6, 'User Membuka Dashboard', '2024-11-15 00:49:18', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (15, 6, 'User Membuka Menu Album', '2024-11-15 00:49:40', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (16, 6, 'User melakukan Tambah Album', '2024-11-15 00:50:16', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (17, 6, 'User Membuka Menu Album', '2024-11-15 00:50:16', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (18, 6, 'User Melakukan Edit Album', '2024-11-15 00:50:29', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (19, 6, 'User Membuka Menu Album', '2024-11-15 00:50:30', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (20, 6, 'User Membuka Dashboard', '2024-11-15 00:50:36', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (21, 6, 'User Membuka Album', '2024-11-15 00:50:52', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (22, 6, 'User Membuka Album', '2024-11-15 00:50:52', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (23, 6, 'User Membuka Album', '2024-11-15 00:50:53', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (24, 6, 'User Membuka Album', '2024-11-15 00:50:53', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (25, 6, 'User Membuka Dashboard', '2024-11-15 00:51:02', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (26, 6, 'User Membuka Menu Foto', '2024-11-15 00:51:07', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (27, 6, 'User melakukan Tambah foto', '2024-11-15 00:51:53', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (28, 6, 'User Membuka Menu Foto', '2024-11-15 00:51:54', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (29, 6, 'User Membuka Dashboard', '2024-11-15 00:52:00', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (30, 6, 'User Membuka Album', '2024-11-15 00:52:04', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (31, 6, 'User Membuka Album', '2024-11-15 00:52:05', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (32, 6, 'User Membuka Album', '2024-11-15 00:52:06', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (33, 6, 'User Membuka Album', '2024-11-15 00:52:06', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (34, 6, 'User Melakukan Like', '2024-11-15 00:52:17', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (35, 6, 'User Membuka Komentar', '2024-11-15 00:52:28', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (36, 6, 'User Melakukan Komentar', '2024-11-15 00:52:40', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (37, 6, 'User Membuka Komentar', '2024-11-15 00:52:48', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (38, 6, 'User Membuka Menu Album', '2024-11-15 00:53:08', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (39, 6, 'User Membuka Menu Restore Edit Album', '2024-11-15 00:53:22', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (40, 6, 'User Restore Data Album', '2024-11-15 00:53:34', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (41, 6, 'User Membuka Menu Album', '2024-11-15 00:53:34', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (42, 6, 'User melakukan Hapus Album', '2024-11-15 00:53:46', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (43, 6, 'User Membuka Menu Album', '2024-11-15 00:53:46', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (44, 6, 'User Membuka Menu Restore Hapus Album', '2024-11-15 00:53:56', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (45, 6, 'User melakukan Restore Album', '2024-11-15 00:54:06', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (46, 6, 'User Membuka Menu Album', '2024-11-15 00:54:07', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (47, 6, 'User melakukan Hapus Album', '2024-11-15 00:54:15', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (48, 6, 'User Membuka Menu Album', '2024-11-15 00:54:16', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (49, 6, 'User Membuka Menu Restore Hapus Album', '2024-11-15 00:54:23', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (50, 6, 'User melakukan Penghapusan Data Album Permanen', '2024-11-15 00:54:31', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (51, 6, 'User Membuka Menu Album', '2024-11-15 00:54:32', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (52, 6, 'User Membuka Menu Restore Hapus Album', '2024-11-15 00:54:41', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (53, 6, 'User membuka Log Activity', '2024-11-15 00:54:50', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (54, 6, 'User Melakukan Log Out', '2024-11-15 00:55:38', '0000-00-00 00:00:00', NULL);
INSERT INTO `tb_activity` VALUES (55, NULL, 'User ke Halaman Login', '2024-11-15 00:55:39', '0000-00-00 00:00:00', NULL);

-- ----------------------------
-- Table structure for tb_album
-- ----------------------------
DROP TABLE IF EXISTS `tb_album`;
CREATE TABLE `tb_album`  (
  `id_album` int NOT NULL AUTO_INCREMENT,
  `nama_album` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `tanggal_dibuat` date NULL DEFAULT NULL,
  `id_user` int NULL DEFAULT NULL,
  `delete_at` datetime NULL DEFAULT NULL,
  `delete_by` int NULL DEFAULT NULL,
  `update_at` datetime NULL DEFAULT NULL,
  `update_by` int NULL DEFAULT NULL,
  `create_at` datetime NULL DEFAULT NULL,
  `create_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_album`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_album
-- ----------------------------
INSERT INTO `tb_album` VALUES (2, 'Mobil', 'JDM', '2024-11-13', 1, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tb_album` VALUES (3, 'Motor', '2 TAK', '2024-11-13', 1, NULL, NULL, NULL, NULL, '2024-11-13 10:41:50', 1);
INSERT INTO `tb_album` VALUES (4, 'Hanya Mencoba', 'TESTES', '2024-11-15', 1, NULL, NULL, '2024-11-15 00:30:46', 1, '2024-11-15 00:23:39', 1);

-- ----------------------------
-- Table structure for tb_album_backup
-- ----------------------------
DROP TABLE IF EXISTS `tb_album_backup`;
CREATE TABLE `tb_album_backup`  (
  `id_album` int NOT NULL AUTO_INCREMENT,
  `nama_album` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `tanggal_dibuat` date NULL DEFAULT NULL,
  `id_user` int NULL DEFAULT NULL,
  `delete_at` datetime NULL DEFAULT NULL,
  `delete_by` int NULL DEFAULT NULL,
  `update_at` datetime NULL DEFAULT NULL,
  `update_by` int NULL DEFAULT NULL,
  `backup_at` datetime NULL DEFAULT NULL,
  `backup_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_album`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_album_backup
-- ----------------------------

-- ----------------------------
-- Table structure for tb_foto
-- ----------------------------
DROP TABLE IF EXISTS `tb_foto`;
CREATE TABLE `tb_foto`  (
  `id_foto` int NOT NULL AUTO_INCREMENT,
  `judul_foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deskripsi_foto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `tanggal_unggah` date NULL DEFAULT NULL,
  `lokasi_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_album` int NULL DEFAULT NULL,
  `id_user` int NULL DEFAULT NULL,
  `create_at` datetime NULL DEFAULT NULL,
  `create_by` int NULL DEFAULT NULL,
  `update_at` datetime NULL DEFAULT NULL,
  `update_by` int NULL DEFAULT NULL,
  `delete_at` datetime NULL DEFAULT NULL,
  `delete_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_foto`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_foto
-- ----------------------------
INSERT INTO `tb_foto` VALUES (6, 'Nissan R35', 'jhbgj.b', '2024-11-13', '1731549290_0b13609e14cddd69fc75.jpg', 2, 1, '2024-11-13 19:54:50', 1, NULL, NULL, NULL, NULL);
INSERT INTO `tb_foto` VALUES (7, 'SPH', 'gffvv', '2024-11-13', '1731555766_453d1d42732f2f301474.png', 2, 1, '2024-11-13 21:42:46', 1, NULL, NULL, NULL, NULL);
INSERT INTO `tb_foto` VALUES (8, 'SPH', 'Sekolah Permata Harapan No 1', '2024-11-15', '1731651895_1f326d205d7d970bcf7f.png', 4, 1, '2024-11-15 00:24:55', 1, NULL, NULL, NULL, NULL);
INSERT INTO `tb_foto` VALUES (9, 'Logo Sekolah Permata Harapan', 'Di buat oleh Sekolah Permata Harapan', '2024-11-15', '1731653513_fcb4d3f96c7112c0eb66.png', 5, 6, '2024-11-15 00:51:53', 6, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for tb_komentar_foto
-- ----------------------------
DROP TABLE IF EXISTS `tb_komentar_foto`;
CREATE TABLE `tb_komentar_foto`  (
  `id_komentar` int NOT NULL AUTO_INCREMENT,
  `id_foto` int NULL DEFAULT NULL,
  `id_user` int NULL DEFAULT NULL,
  `isi_komentar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `tanggal_komentar` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_komentar`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_komentar_foto
-- ----------------------------
INSERT INTO `tb_komentar_foto` VALUES (1, 6, 1, 'tes saja', '2024-11-15');
INSERT INTO `tb_komentar_foto` VALUES (2, 6, 1, 'tes ke 2', '2024-11-14');
INSERT INTO `tb_komentar_foto` VALUES (3, 6, 1, 'rggtr', '2024-11-14');
INSERT INTO `tb_komentar_foto` VALUES (4, 6, 1, 'keke', '2024-11-14');
INSERT INTO `tb_komentar_foto` VALUES (5, 8, 1, 'Saya Suka Sekolah Permata Harapan', '2024-11-15');
INSERT INTO `tb_komentar_foto` VALUES (6, 9, 6, 'Logo ini sangat bagus', '2024-11-15');

-- ----------------------------
-- Table structure for tb_like_foto
-- ----------------------------
DROP TABLE IF EXISTS `tb_like_foto`;
CREATE TABLE `tb_like_foto`  (
  `id_like` int NOT NULL AUTO_INCREMENT,
  `id_foto` int NULL DEFAULT NULL,
  `id_user` int NULL DEFAULT NULL,
  `tanggal_like` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_like`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_like_foto
-- ----------------------------
INSERT INTO `tb_like_foto` VALUES (9, 7, 1, '2024-11-14');
INSERT INTO `tb_like_foto` VALUES (17, 8, 1, '2024-11-15');
INSERT INTO `tb_like_foto` VALUES (18, 9, 6, '2024-11-15');

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_lengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `id_level` enum('1','2','3','4','5') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES (1, 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 'admin@gmail.com', 'Admin', 'Paradise Centre', '1');
INSERT INTO `tb_user` VALUES (2, 'baru', 'c4ca4238a0b923820dcc509a6f75849b', 'baru@gmail.com', 'BARUSEKALI', 'KOMPLEK AMAN', '1');
INSERT INTO `tb_user` VALUES (3, 'baru', 'c4ca4238a0b923820dcc509a6f75849b', 'baru@gmail.com', 'BARUSEKALI', 'KOMPLEK AMAN', '1');
INSERT INTO `tb_user` VALUES (4, 'tes', 'c4ca4238a0b923820dcc509a6f75849b', 'tessaja@gmail.com', 'tessaja', 'KOMPLEK AMAN JAYA', '1');
INSERT INTO `tb_user` VALUES (5, 'anto', 'c4ca4238a0b923820dcc509a6f75849b', 'tes1@gmail.com', 'ANTOJAYA', 'KOMPLEK AMAN JAYA', '1');
INSERT INTO `tb_user` VALUES (6, 'erwin', 'c4ca4238a0b923820dcc509a6f75849b', 'erwin@gmail.com', 'erwin lie', 'KOMPLEK AMAN JAYA', '1');

SET FOREIGN_KEY_CHECKS = 1;
