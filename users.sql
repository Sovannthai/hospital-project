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

 Date: 22/12/2023 20:41:26
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

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
INSERT INTO `users` VALUES (9, 'Thai', 'Thai@gmail.com', NULL, '$2y$10$7V6VXr6KdZ3mHgrPMVRC3.LRQbAXV2lWtLaG7Eknizq9pXfPxi8VW', 'JmRrZnpPVpx5uPSDBAjnsBN4ee9qCllLJbHBzrMHv6R1pX3quLZnN61yItD5', '2023-12-08 07:43:18', '2023-12-14 13:15:25', '2023-12-08-6572cb095bde1.png', 'Dr', 1, 4000.00);
INSERT INTO `users` VALUES (12, 'Visal', 'visal@gmail.com', NULL, '$2y$10$SZFHKWoPZGvhcqI50hDacurtRWDleXaTNVPETKlDAYvdRGfs22k6O', NULL, '2023-12-14 12:18:41', '2023-12-14 12:18:41', '2023-12-14-657a90317071f.png', 'Dr', 1, 9000.00);
INSERT INTO `users` VALUES (14, 'Ta vann', 'tavan@gmail.com', NULL, '$2y$10$39lupE/kKhUunjdGbZe8BeSl7nstIccOleeGkQsd6LMxfUW9cYqvO', NULL, '2023-12-14 14:33:38', '2023-12-14 14:33:38', '2023-12-14-657aafd2a6985.jpg', 'Rs', 9, 400.00);
INSERT INTO `users` VALUES (15, 'Sovannra', 'sovannra@gmail.com', NULL, '$2y$10$ksvj116/2eO4S9wmAmrHNObQi23OPpRPSn9Z0HK8SjJ4JEWiyeBZi', NULL, '2023-12-16 09:29:45', '2023-12-16 09:29:45', '2023-12-16-657d0b997dcb7.png', 'Dr', 1, 6000.00);
INSERT INTO `users` VALUES (16, 'Thida', 'Thida@gmail.com', NULL, '$2y$10$hduvzo6SAYkNPPnKoQuCTucDtFMt8Yt7rNHalB15qQo29UgAH4LXS', NULL, '2023-12-16 09:30:34', '2023-12-16 09:30:34', '2023-12-16-657d0bca432d7.jpg', 'Nrs', 2, 5000.00);
INSERT INTO `users` VALUES (17, 'Noun Sreypech', 'pech@gmail.com', NULL, '$2y$10$3DrQ1jHBCLc1MVCXjDposOGomIsn5A9B5BBs9YWYtbiAxDi7wSHOy', NULL, '2023-12-16 16:32:47', '2023-12-16 16:32:47', '2023-12-16-657d6ebf1d860.jpg', 'Nrs', 2, 5000.00);

SET FOREIGN_KEY_CHECKS = 1;
