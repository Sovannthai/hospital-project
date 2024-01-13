/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3333
 Source Server Type    : MySQL
 Source Server Version : 80030
 Source Host           : localhost:3333
 Source Schema         : hospital-layout

 Target Server Type    : MySQL
 Target Server Version : 80030
 File Encoding         : 65001

 Date: 13/01/2024 16:02:03
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for appointments
-- ----------------------------
DROP TABLE IF EXISTS `appointments`;
CREATE TABLE `appointments`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pataint_id` int(0) NOT NULL,
  `disease_id` int(0) NOT NULL,
  `doctor_id` int(0) NOT NULL,
  `appointment_date` timestamp(0) NOT NULL,
  `status` enum('canceled','pending','processing','completed') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `labo_id` int(0) NOT NULL,
  `created_by` int(0) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of appointments
-- ----------------------------
INSERT INTO `appointments` VALUES (2, 4, 1, 9, '2023-12-14 10:44:00', 'canceled', 1, 9, '2023-12-14 10:43:51', '2023-12-29 11:05:20', NULL);
INSERT INTO `appointments` VALUES (4, 5, 11, 12, '2023-12-16 09:51:00', 'completed', 4, 9, '2023-12-16 08:51:47', '2023-12-29 11:05:10', NULL);
INSERT INTO `appointments` VALUES (23, 3, 1, 9, '2023-12-28 15:07:00', 'processing', 2, 9, '2023-12-28 13:05:28', '2023-12-28 18:36:33', NULL);
INSERT INTO `appointments` VALUES (26, 4, 1, 9, '2024-01-06 11:15:00', 'processing', 2, 9, '2024-01-08 11:13:21', '2024-01-08 11:13:21', NULL);

-- ----------------------------
-- Table structure for diseas
-- ----------------------------
DROP TABLE IF EXISTS `diseas`;
CREATE TABLE `diseas`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `diseas_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of diseas
-- ----------------------------
INSERT INTO `diseas` VALUES (1, 'X-ray', '2023-11-07 09:30:58', '2023-12-19 16:36:44');
INSERT INTO `diseas` VALUES (11, 'X-You', '2023-12-07 11:20:47', '2023-12-07 11:20:47');
INSERT INTO `diseas` VALUES (18, 'Single', '2023-12-14 13:33:20', '2023-12-14 13:33:20');
INSERT INTO `diseas` VALUES (19, 'ទឹកនោមផ្អែម', '2023-12-14 13:33:28', '2023-12-14 13:33:28');
INSERT INTO `diseas` VALUES (21, 'សសៃប្រសាទ', '2023-12-19 16:36:00', '2023-12-19 16:36:00');
INSERT INTO `diseas` VALUES (23, 'ឆ្កួតជ្រូក', '2023-12-19 16:39:04', '2023-12-19 16:39:04');

-- ----------------------------
-- Table structure for employeegroups
-- ----------------------------
DROP TABLE IF EXISTS `employeegroups`;
CREATE TABLE `employeegroups`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of employeegroups
-- ----------------------------
INSERT INTO `employeegroups` VALUES (3, 'Driver', 1, '2023-12-19 11:34:16', '2024-01-08 11:15:09');
INSERT INTO `employeegroups` VALUES (5, 'Cleaner', 1, '2023-12-28 14:17:19', '2024-01-13 09:22:39');

-- ----------------------------
-- Table structure for employees
-- ----------------------------
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('Male','Female','Optional') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Male',
  `mt_status` enum('Single','Married','Widow','Optional') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Single',
  `dob` date NOT NULL,
  `phone` bigint(0) NULL DEFAULT NULL,
  `salary` decimal(10, 2) NOT NULL,
  `join_date` date NOT NULL,
  `address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `emp_group_id` int(0) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of employees
-- ----------------------------
INSERT INTO `employees` VALUES (4, 'HE Sovannthai', 'Male', 'Single', '2023-12-15', 17670442, 10000.00, '2023-12-09', 'Siem Reap Cambodia Angkor Chum Khchar', 1, 3, '2023-12-21 10:23:51', '2024-01-13 10:37:59');
INSERT INTO `employees` VALUES (5, 'Noun Sreypech', 'Female', 'Married', '2001-10-19', 9876543, 6000.00, '2021-07-08', 'Siem Reap Cambodia', 1, 3, '2023-12-21 10:34:06', '2024-01-13 09:35:39');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for laboratories
-- ----------------------------
DROP TABLE IF EXISTS `laboratories`;
CREATE TABLE `laboratories`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of laboratories
-- ----------------------------
INSERT INTO `laboratories` VALUES (1, 'A101', '2023-12-28 12:54:11', '2023-12-28 12:54:11');
INSERT INTO `laboratories` VALUES (2, 'A102', '2023-12-28 12:54:32', '2023-12-28 12:54:32');
INSERT INTO `laboratories` VALUES (3, 'A103', '2023-12-28 12:54:40', '2023-12-28 12:54:40');
INSERT INTO `laboratories` VALUES (4, 'A104', '2023-12-28 12:54:49', '2023-12-28 12:54:49');
INSERT INTO `laboratories` VALUES (6, 'A105', '2024-01-10 10:36:17', '2024-01-10 10:36:17');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 47 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (6, '2023_10_22_021650_create_categories_labo_table', 2);
INSERT INTO `migrations` VALUES (7, '2023_11_03_042049_create_users_type_table', 3);
INSERT INTO `migrations` VALUES (8, '2023_11_03_044413_rename_usertypes', 4);
INSERT INTO `migrations` VALUES (9, '2023_11_03_081104_create_usermanagement_table', 5);
INSERT INTO `migrations` VALUES (10, '2023_11_07_092309_create_diseas_table', 6);
INSERT INTO `migrations` VALUES (11, '2023_11_07_092818_create_diseas_table', 7);
INSERT INTO `migrations` VALUES (12, '2023_12_08_081216_create_receptionist_table', 8);
INSERT INTO `migrations` VALUES (13, '2023_12_08_113418_create_receptionist_table', 9);
INSERT INTO `migrations` VALUES (14, '2023_12_09_063050_create_receptionists_table', 10);
INSERT INTO `migrations` VALUES (15, '2023_12_10_023516_create_nurese_table', 11);
INSERT INTO `migrations` VALUES (16, '2023_12_10_040545_create_doctor_table', 12);
INSERT INTO `migrations` VALUES (17, '2023_12_10_050702_create_recetionists_table', 13);
INSERT INTO `migrations` VALUES (18, '2023_12_10_055115_create_recetionists_table', 14);
INSERT INTO `migrations` VALUES (19, '2023_12_10_055115_create_receptionists_table', 15);
INSERT INTO `migrations` VALUES (20, '2023_12_10_103639_create_nurses_table', 16);
INSERT INTO `migrations` VALUES (21, '2023_12_10_103739_create_doctors_table', 16);
INSERT INTO `migrations` VALUES (22, '2023_12_10_123411_create_nurses_table', 17);
INSERT INTO `migrations` VALUES (23, '2023_12_12_030641_create_appointments_table', 18);
INSERT INTO `migrations` VALUES (24, '2023_12_12_101413_create_receptionists_table', 18);
INSERT INTO `migrations` VALUES (25, '2023_12_12_163721_create_pataints_table', 19);
INSERT INTO `migrations` VALUES (26, '2023_12_12_163910_create_appointments_table', 20);
INSERT INTO `migrations` VALUES (27, '2023_12_14_091226_create_appointments_table', 21);
INSERT INTO `migrations` VALUES (28, '2023_12_14_151017_create_permission_tables', 22);
INSERT INTO `migrations` VALUES (29, '2023_12_14_151340_create_roles_table', 23);
INSERT INTO `migrations` VALUES (30, '2023_12_14_151407_create_permissions_table', 23);
INSERT INTO `migrations` VALUES (31, '2023_12_16_231647_create_employees_group_table', 23);
INSERT INTO `migrations` VALUES (32, '2023_12_16_235633_create_employeegroups_table', 24);
INSERT INTO `migrations` VALUES (33, '2023_12_17_001207_create_employeegroups_table', 25);
INSERT INTO `migrations` VALUES (34, '2023_12_17_001411_create_employeegroups_table', 26);
INSERT INTO `migrations` VALUES (36, '2023_12_18_115003_create_employeegroups_table', 27);
INSERT INTO `migrations` VALUES (37, '2023_12_18_155148_create_employees_table', 28);
INSERT INTO `migrations` VALUES (38, '2023_12_18_160624_create_employees_table', 29);
INSERT INTO `migrations` VALUES (39, '2023_12_18_164335_create_employees_table', 30);
INSERT INTO `migrations` VALUES (40, '2023_12_21_120840_create_units_table', 31);
INSERT INTO `migrations` VALUES (41, '2023_12_21_133848_create_product_categories_table', 32);
INSERT INTO `migrations` VALUES (42, '2023_12_21_165344_create_products_table', 33);
INSERT INTO `migrations` VALUES (43, '2023_12_27_131925_create_tbstaff_table', 34);
INSERT INTO `migrations` VALUES (44, '2023_12_27_141117_create_staff_table', 35);
INSERT INTO `migrations` VALUES (45, '2023_12_28_115552_create_laboratory_table', 36);
INSERT INTO `migrations` VALUES (46, '2023_12_29_112836_create_permission_tables', 37);
INSERT INTO `migrations` VALUES (47, '2024_01_02_144638_create_permission_table', 38);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` bigint(0) UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(0) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` bigint(0) UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(0) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE,
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES (11, 'App\\Models\\User', 9);
INSERT INTO `model_has_roles` VALUES (13, 'App\\Models\\User', 12);
INSERT INTO `model_has_roles` VALUES (13, 'App\\Models\\User', 14);
INSERT INTO `model_has_roles` VALUES (13, 'App\\Models\\User', 15);
INSERT INTO `model_has_roles` VALUES (13, 'App\\Models\\User', 16);
INSERT INTO `model_has_roles` VALUES (13, 'App\\Models\\User', 17);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------
INSERT INTO `password_reset_tokens` VALUES ('srosthai00@gmail.com', '$2y$10$QbJneOY16OVfxl6bvKCNJOT3rUkuF8pNPDg2gihKeehTeeHbkqOBu', '2023-10-24 02:07:05');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pataints
-- ----------------------------
DROP TABLE IF EXISTS `pataints`;
CREATE TABLE `pataints`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Man',
  `dob` date NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(0) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pataints
-- ----------------------------
INSERT INTO `pataints` VALUES (3, 'HE Sovannthai', 'Male', '2003-07-24', '017670442', 'siem reap cambodia', 9, '2023-12-12 19:56:40', '2023-12-16 09:24:20');
INSERT INTO `pataints` VALUES (4, 'Noun Sreypech', 'Female', '2005-07-22', '017670442', 'siem reap', 12, '2023-12-12 22:32:47', '2023-12-12 22:32:47');
INSERT INTO `pataints` VALUES (5, 'Meng Hour', 'Male', '2008-02-16', '017670442', 'siem reap cambodia', 9, '2023-12-14 15:42:17', '2023-12-14 15:42:17');
INSERT INTO `pataints` VALUES (6, 'Pheak Tra', 'Male', '1999-08-21', '017670442', 'siem reap', 12, '2023-12-16 09:23:09', '2023-12-16 09:23:09');

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_guard_name_unique`(`name`, `guard_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 83 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (2, 'edit.user', 'web', '2024-01-12 12:54:08', '2024-01-12 12:54:08');
INSERT INTO `permissions` VALUES (3, 'view.user', 'web', '2024-01-12 13:00:42', '2024-01-12 13:00:42');
INSERT INTO `permissions` VALUES (4, 'update.user', 'web', '2024-01-12 13:00:42', '2024-01-12 13:00:42');
INSERT INTO `permissions` VALUES (5, 'delete.user', 'web', '2024-01-12 13:00:42', '2024-01-12 13:00:42');
INSERT INTO `permissions` VALUES (6, 'create.emp', 'web', '2024-01-12 13:31:50', '2024-01-12 13:31:50');
INSERT INTO `permissions` VALUES (7, 'edit.emp', 'web', '2024-01-12 13:31:50', '2024-01-12 13:31:50');
INSERT INTO `permissions` VALUES (8, 'update.emp', 'web', '2024-01-12 13:31:50', '2024-01-12 13:31:50');
INSERT INTO `permissions` VALUES (9, 'delete.emp', 'web', '2024-01-12 13:31:50', '2024-01-12 13:31:50');
INSERT INTO `permissions` VALUES (10, 'create.unit', 'web', '2024-01-12 13:31:50', '2024-01-12 13:31:50');
INSERT INTO `permissions` VALUES (11, 'edit.unit', 'web', '2024-01-12 13:31:50', '2024-01-12 13:31:50');
INSERT INTO `permissions` VALUES (12, 'update.unit', 'web', '2024-01-12 13:31:50', '2024-01-12 13:31:50');
INSERT INTO `permissions` VALUES (13, 'delete.unit', 'web', '2024-01-12 13:31:50', '2024-01-12 13:31:50');
INSERT INTO `permissions` VALUES (14, 'create.labo', 'web', '2024-01-12 13:31:50', '2024-01-12 13:31:50');
INSERT INTO `permissions` VALUES (15, 'edit.labo', 'web', '2024-01-12 13:31:50', '2024-01-12 13:31:50');
INSERT INTO `permissions` VALUES (16, 'update.labo', 'web', '2024-01-12 13:31:50', '2024-01-12 13:31:50');
INSERT INTO `permissions` VALUES (17, 'delete.labo', 'web', '2024-01-12 13:31:50', '2024-01-12 13:31:50');
INSERT INTO `permissions` VALUES (18, 'view.user_type  checked', 'web', '2024-01-12 14:50:19', '2024-01-12 14:50:19');
INSERT INTO `permissions` VALUES (19, 'edit.user_type  checked', 'web', '2024-01-12 14:50:19', '2024-01-12 14:50:19');
INSERT INTO `permissions` VALUES (20, 'update.user_type  checked', 'web', '2024-01-12 14:50:19', '2024-01-12 14:50:19');
INSERT INTO `permissions` VALUES (21, 'delete.user_type  checked', 'web', '2024-01-12 14:50:20', '2024-01-12 14:50:20');
INSERT INTO `permissions` VALUES (22, 'create.emp_group  checked', 'web', '2024-01-12 14:50:20', '2024-01-12 14:50:20');
INSERT INTO `permissions` VALUES (23, 'edit.emp_group  checked', 'web', '2024-01-12 14:50:20', '2024-01-12 14:50:20');
INSERT INTO `permissions` VALUES (24, 'update.emp_group  checked', 'web', '2024-01-12 14:50:20', '2024-01-12 14:50:20');
INSERT INTO `permissions` VALUES (25, 'delete.emp_group  checked', 'web', '2024-01-12 14:50:20', '2024-01-12 14:50:20');
INSERT INTO `permissions` VALUES (26, 'create.disease  checked', 'web', '2024-01-12 14:50:20', '2024-01-12 14:50:20');
INSERT INTO `permissions` VALUES (27, 'edit.disease  checked', 'web', '2024-01-12 14:50:20', '2024-01-12 14:50:20');
INSERT INTO `permissions` VALUES (28, 'update.disease  checked', 'web', '2024-01-12 14:50:20', '2024-01-12 14:50:20');
INSERT INTO `permissions` VALUES (29, 'delete.disease  checked', 'web', '2024-01-12 14:50:20', '2024-01-12 14:50:20');
INSERT INTO `permissions` VALUES (30, 'create.pataint  checked', 'web', '2024-01-12 14:50:20', '2024-01-12 14:50:20');
INSERT INTO `permissions` VALUES (31, 'edit.pataint  checked', 'web', '2024-01-12 14:50:20', '2024-01-12 14:50:20');
INSERT INTO `permissions` VALUES (32, 'update.pataint  checked', 'web', '2024-01-12 14:50:20', '2024-01-12 14:50:20');
INSERT INTO `permissions` VALUES (33, 'delete.pataint  checked', 'web', '2024-01-12 14:50:20', '2024-01-12 14:50:20');
INSERT INTO `permissions` VALUES (34, 'create.appointment  checked', 'web', '2024-01-12 14:50:20', '2024-01-12 14:50:20');
INSERT INTO `permissions` VALUES (35, 'edit.appointment  checked', 'web', '2024-01-12 14:50:20', '2024-01-12 14:50:20');
INSERT INTO `permissions` VALUES (36, 'update.appointment  checked', 'web', '2024-01-12 14:50:20', '2024-01-12 14:50:20');
INSERT INTO `permissions` VALUES (37, 'delete.appointment  checked', 'web', '2024-01-12 14:50:20', '2024-01-12 14:50:20');
INSERT INTO `permissions` VALUES (38, 'create.product  checked', 'web', '2024-01-12 14:50:20', '2024-01-12 14:50:20');
INSERT INTO `permissions` VALUES (39, 'edit.product  checked', 'web', '2024-01-12 14:50:20', '2024-01-12 14:50:20');
INSERT INTO `permissions` VALUES (40, 'update.product  checked', 'web', '2024-01-12 14:50:20', '2024-01-12 14:50:20');
INSERT INTO `permissions` VALUES (41, 'delete.product  checked', 'web', '2024-01-12 14:50:20', '2024-01-12 14:50:20');
INSERT INTO `permissions` VALUES (42, 'create.category  checked', 'web', '2024-01-12 14:50:20', '2024-01-12 14:50:20');
INSERT INTO `permissions` VALUES (43, 'edit.category  checked', 'web', '2024-01-12 14:50:20', '2024-01-12 14:50:20');
INSERT INTO `permissions` VALUES (44, 'update.category  checked', 'web', '2024-01-12 14:50:20', '2024-01-12 14:50:20');
INSERT INTO `permissions` VALUES (45, 'delete.category  checked', 'web', '2024-01-12 14:50:20', '2024-01-12 14:50:20');
INSERT INTO `permissions` VALUES (46, 'create.user', 'web', '2024-01-12 15:49:49', '2024-01-12 15:49:49');
INSERT INTO `permissions` VALUES (47, 'view.user_type', 'web', '2024-01-12 15:49:49', '2024-01-12 15:49:49');
INSERT INTO `permissions` VALUES (48, 'create.user_type', 'web', '2024-01-12 15:49:49', '2024-01-12 15:49:49');
INSERT INTO `permissions` VALUES (49, 'edit.user_type', 'web', '2024-01-12 15:49:49', '2024-01-12 15:49:49');
INSERT INTO `permissions` VALUES (50, 'delete.user_type', 'web', '2024-01-12 15:49:49', '2024-01-12 15:49:49');
INSERT INTO `permissions` VALUES (51, 'view.emp', 'web', '2024-01-12 15:49:49', '2024-01-12 15:49:49');
INSERT INTO `permissions` VALUES (52, 'view.emp_group', 'web', '2024-01-12 15:49:49', '2024-01-12 15:49:49');
INSERT INTO `permissions` VALUES (53, 'create.emp_group', 'web', '2024-01-12 15:49:49', '2024-01-12 15:49:49');
INSERT INTO `permissions` VALUES (54, 'edit.emp_group', 'web', '2024-01-12 15:49:49', '2024-01-12 15:49:49');
INSERT INTO `permissions` VALUES (55, 'delete.emp_group', 'web', '2024-01-12 15:49:49', '2024-01-12 15:49:49');
INSERT INTO `permissions` VALUES (56, 'view.disease', 'web', '2024-01-12 15:49:49', '2024-01-12 15:49:49');
INSERT INTO `permissions` VALUES (57, 'create.disease', 'web', '2024-01-12 15:49:49', '2024-01-12 15:49:49');
INSERT INTO `permissions` VALUES (58, 'edit.disease', 'web', '2024-01-12 15:49:49', '2024-01-12 15:49:49');
INSERT INTO `permissions` VALUES (59, 'delete.disease', 'web', '2024-01-12 15:49:49', '2024-01-12 15:49:49');
INSERT INTO `permissions` VALUES (60, 'view.pataint', 'web', '2024-01-12 15:49:49', '2024-01-12 15:49:49');
INSERT INTO `permissions` VALUES (61, 'create.pataint', 'web', '2024-01-12 15:49:49', '2024-01-12 15:49:49');
INSERT INTO `permissions` VALUES (62, 'edit.pataint', 'web', '2024-01-12 15:49:49', '2024-01-12 15:49:49');
INSERT INTO `permissions` VALUES (63, 'delete.pataint', 'web', '2024-01-12 15:49:49', '2024-01-12 15:49:49');
INSERT INTO `permissions` VALUES (64, 'view.appointment', 'web', '2024-01-12 15:49:49', '2024-01-12 15:49:49');
INSERT INTO `permissions` VALUES (65, 'create.appointment', 'web', '2024-01-12 15:49:49', '2024-01-12 15:49:49');
INSERT INTO `permissions` VALUES (66, 'edit.appointment', 'web', '2024-01-12 15:49:49', '2024-01-12 15:49:49');
INSERT INTO `permissions` VALUES (67, 'delete.appointment', 'web', '2024-01-12 15:49:49', '2024-01-12 15:49:49');
INSERT INTO `permissions` VALUES (68, 'view.product', 'web', '2024-01-12 15:49:50', '2024-01-12 15:49:50');
INSERT INTO `permissions` VALUES (69, 'create.product', 'web', '2024-01-12 15:49:50', '2024-01-12 15:49:50');
INSERT INTO `permissions` VALUES (70, 'edit.product', 'web', '2024-01-12 15:49:50', '2024-01-12 15:49:50');
INSERT INTO `permissions` VALUES (71, 'delete.product', 'web', '2024-01-12 15:49:50', '2024-01-12 15:49:50');
INSERT INTO `permissions` VALUES (72, 'view.category', 'web', '2024-01-12 15:49:50', '2024-01-12 15:49:50');
INSERT INTO `permissions` VALUES (73, 'create.category', 'web', '2024-01-12 15:49:50', '2024-01-12 15:49:50');
INSERT INTO `permissions` VALUES (74, 'edit.category', 'web', '2024-01-12 15:49:50', '2024-01-12 15:49:50');
INSERT INTO `permissions` VALUES (75, 'delete.category', 'web', '2024-01-12 15:49:50', '2024-01-12 15:49:50');
INSERT INTO `permissions` VALUES (76, 'view.unit', 'web', '2024-01-12 15:49:50', '2024-01-12 15:49:50');
INSERT INTO `permissions` VALUES (77, 'view.labo', 'web', '2024-01-12 15:49:50', '2024-01-12 15:49:50');
INSERT INTO `permissions` VALUES (78, 'view.dash', 'web', '2024-01-13 09:47:24', '2024-01-13 09:47:24');
INSERT INTO `permissions` VALUES (79, 'view.role', 'web', '2024-01-13 09:51:21', '2024-01-13 09:51:21');
INSERT INTO `permissions` VALUES (80, 'create.role', 'web', '2024-01-13 09:51:21', '2024-01-13 09:51:21');
INSERT INTO `permissions` VALUES (81, 'edit.role', 'web', '2024-01-13 09:51:21', '2024-01-13 09:51:21');
INSERT INTO `permissions` VALUES (82, 'delete.role', 'web', '2024-01-13 09:51:21', '2024-01-13 09:51:21');

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(0) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp(0) NULL DEFAULT NULL,
  `expires_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for product_categories
-- ----------------------------
DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_categories
-- ----------------------------
INSERT INTO `product_categories` VALUES (5, 'Medicine', '2023-12-21 15:30:13', '2023-12-22 11:32:37');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int(0) NOT NULL,
  `unit_id` int(0) NOT NULL,
  `category_id` int(0) NOT NULL,
  `price` decimal(10, 2) NOT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (15, 'Panadol', 916546, 5, 5, 5.00, '2024-01-02-65939285d8c11.jpg', 'Panadol', 1, '2024-01-02 11:35:17', '2024-01-12 13:46:58');
INSERT INTO `products` VALUES (16, 'Doliprane', 1111, 5, 5, 10.00, '2024-01-11-659f4885867d2.jpg', 'Doliprane', 1, '2024-01-11 08:45:32', '2024-01-12 13:46:59');
INSERT INTO `products` VALUES (17, 'Benda 500', 12345, 5, 5, 5.00, '2024-01-11-659f4bcf43ab7.jpg', 'Benda 500', 1, '2024-01-11 09:00:47', '2024-01-12 13:47:02');
INSERT INTO `products` VALUES (18, 'Decolgen', 12346, 5, 5, 14.00, '2024-01-11-659fb4f0e2e3b.jpg', 'Decolgen', 1, '2024-01-11 16:28:48', '2024-01-12 13:47:00');
INSERT INTO `products` VALUES (19, 'Tiffy', 99, 5, 5, 10.00, '2024-01-11-659fb5846747e.jpg', 'Tiffy', 1, '2024-01-11 16:31:48', '2024-01-12 13:47:03');

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` bigint(0) UNSIGNED NOT NULL,
  `role_id` bigint(0) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES (2, 11);
INSERT INTO `role_has_permissions` VALUES (3, 11);
INSERT INTO `role_has_permissions` VALUES (5, 11);
INSERT INTO `role_has_permissions` VALUES (6, 11);
INSERT INTO `role_has_permissions` VALUES (7, 11);
INSERT INTO `role_has_permissions` VALUES (9, 11);
INSERT INTO `role_has_permissions` VALUES (14, 11);
INSERT INTO `role_has_permissions` VALUES (15, 11);
INSERT INTO `role_has_permissions` VALUES (17, 11);
INSERT INTO `role_has_permissions` VALUES (46, 11);
INSERT INTO `role_has_permissions` VALUES (51, 11);
INSERT INTO `role_has_permissions` VALUES (56, 11);
INSERT INTO `role_has_permissions` VALUES (57, 11);
INSERT INTO `role_has_permissions` VALUES (58, 11);
INSERT INTO `role_has_permissions` VALUES (59, 11);
INSERT INTO `role_has_permissions` VALUES (60, 11);
INSERT INTO `role_has_permissions` VALUES (61, 11);
INSERT INTO `role_has_permissions` VALUES (62, 11);
INSERT INTO `role_has_permissions` VALUES (63, 11);
INSERT INTO `role_has_permissions` VALUES (64, 11);
INSERT INTO `role_has_permissions` VALUES (65, 11);
INSERT INTO `role_has_permissions` VALUES (66, 11);
INSERT INTO `role_has_permissions` VALUES (67, 11);
INSERT INTO `role_has_permissions` VALUES (68, 11);
INSERT INTO `role_has_permissions` VALUES (69, 11);
INSERT INTO `role_has_permissions` VALUES (70, 11);
INSERT INTO `role_has_permissions` VALUES (71, 11);
INSERT INTO `role_has_permissions` VALUES (77, 11);
INSERT INTO `role_has_permissions` VALUES (78, 11);
INSERT INTO `role_has_permissions` VALUES (79, 11);
INSERT INTO `role_has_permissions` VALUES (80, 11);
INSERT INTO `role_has_permissions` VALUES (81, 11);
INSERT INTO `role_has_permissions` VALUES (82, 11);
INSERT INTO `role_has_permissions` VALUES (3, 13);
INSERT INTO `role_has_permissions` VALUES (6, 13);
INSERT INTO `role_has_permissions` VALUES (7, 13);
INSERT INTO `role_has_permissions` VALUES (9, 13);
INSERT INTO `role_has_permissions` VALUES (51, 13);
INSERT INTO `role_has_permissions` VALUES (56, 13);
INSERT INTO `role_has_permissions` VALUES (60, 13);
INSERT INTO `role_has_permissions` VALUES (64, 13);
INSERT INTO `role_has_permissions` VALUES (79, 13);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_guard_name_unique`(`name`, `guard_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (11, 'Super Admin', 'web', '2024-01-12 13:00:42', '2024-01-12 13:31:50');
INSERT INTO `roles` VALUES (13, 'Doctor', 'web', '2024-01-13 09:10:49', '2024-01-13 10:52:58');

-- ----------------------------
-- Table structure for staff
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Man',
  `dob` date NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` decimal(10, 2) NOT NULL,
  `hired_date` date NOT NULL,
  `stop_date` date NULL DEFAULT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of staff
-- ----------------------------
INSERT INTO `staff` VALUES (2, 'Thai Sros', 'Male', '2023-12-01', '017670442', 'siem reap', 'Driver', 1000.00, '2023-12-28', NULL, '2023-12-27-658bda35c4f9f.png', '2023-12-27 15:03:01', '2023-12-28 14:25:36');
INSERT INTO `staff` VALUES (3, 'Srey Pech', 'Female', '2023-12-02', '09876544', 'siem reap', 'Cleaner', 5000.00, '2023-12-01', NULL, '2023-12-27-658bda6a4a9e8.jpg', '2023-12-27 15:03:54', '2023-12-27 15:17:08');

-- ----------------------------
-- Table structure for units
-- ----------------------------
DROP TABLE IF EXISTS `units`;
CREATE TABLE `units`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of units
-- ----------------------------
INSERT INTO `units` VALUES (5, 'Box', '2023-12-29 11:08:28', '2023-12-29 11:08:28');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `prefix` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_type_id` int(0) NULL DEFAULT NULL,
  `salary` decimal(10, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (9, 'Thai', 'Thai@gmail.com', NULL, '$2y$10$C22T4sTLmi3qYnpt7yfB6.7FCYNwA4o8yUm/3rVHfAtNTFlNDcZ9y', 'JR75UOiqmA7DJZGWDh1wXirvaHcp68xFtXAYw5iuLt2FqHn2A4eqbbQuM00W', '2023-12-08 07:43:18', '2024-01-13 09:07:01', '2023-12-08-6572cb095bde1.png', 'Dr', 1, 4000.00);
INSERT INTO `users` VALUES (12, 'Visal', 'visal@gmail.com', NULL, '$2y$10$hpnOraZvnuXd/zNlgce/P.dREW1Wt.Lmd1Zw3JSB2TzgV6VfGdJ0O', NULL, '2023-12-14 12:18:41', '2024-01-13 09:12:30', '2023-12-14-657a90317071f.png', 'Dr', 1, 9000.00);
INSERT INTO `users` VALUES (14, 'Ta vann', 'tavan@gmail.com', NULL, NULL, NULL, '2023-12-14 14:33:38', '2024-01-10 19:32:13', '2024-01-10-659e8e4d9457c.png', 'Dr', 1, 400.00);
INSERT INTO `users` VALUES (15, 'Sovannra', 'sovannra@gmail.com', NULL, NULL, NULL, '2023-12-16 09:29:45', '2024-01-13 13:47:30', '2023-12-16-657d0b997dcb7.png', 'Dr', 1, 6000.00);
INSERT INTO `users` VALUES (16, 'Thida', 'Thida@gmail.com', NULL, NULL, NULL, '2023-12-16 09:30:34', '2024-01-10 20:15:59', '2023-12-16-657d0bca432d7.jpg', 'Dr', 1, 5000.00);
INSERT INTO `users` VALUES (17, 'Noun Sreypech', 'pech@gmail.com', NULL, NULL, NULL, '2023-12-16 16:32:47', '2024-01-10 20:16:35', '2023-12-16-657d6ebf1d860.jpg', 'Dr', 1, 5000.00);

-- ----------------------------
-- Table structure for usertypes
-- ----------------------------
DROP TABLE IF EXISTS `usertypes`;
CREATE TABLE `usertypes`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usertypes
-- ----------------------------
INSERT INTO `usertypes` VALUES (1, 'Doctor', '2023-11-03 04:46:28', '2023-11-03 04:46:28');
INSERT INTO `usertypes` VALUES (2, 'Nurse', '2023-11-03 05:00:29', '2023-11-03 05:00:29');
INSERT INTO `usertypes` VALUES (9, 'Receptionist', '2023-12-14 13:28:14', '2023-12-14 13:28:14');
INSERT INTO `usertypes` VALUES (13, 'Normal User', '2024-01-12 11:09:21', '2024-01-12 11:09:21');

SET FOREIGN_KEY_CHECKS = 1;
