/*
 Navicat Premium Data Transfer

 Source Server         : wamp
 Source Server Type    : MySQL
 Source Server Version : 100410
 Source Host           : localhost:3306
 Source Schema         : cake_forum

 Target Server Type    : MySQL
 Target Server Version : 100410
 File Encoding         : 65001

 Date: 05/03/2021 18:00:10
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `parent` int NOT NULL,
  `level` int UNSIGNED NOT NULL DEFAULT 1,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `name_unique`(`name`) USING HASH
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 0, 1, 'Root', 'Root category');
INSERT INTO `categories` VALUES (2, 0, 1, 'Category 2', 'Category 2 description');
INSERT INTO `categories` VALUES (3, 1, 2, 'child 1', 'child 1');
INSERT INTO `categories` VALUES (4, 2, 2, 'child 2', 'child 2');
INSERT INTO `categories` VALUES (5, 1, 2, '21', '123');
INSERT INTO `categories` VALUES (6, 2, 2, '123', '12312');
INSERT INTO `categories` VALUES (7, 1, 2, '3343', 'child 1');
INSERT INTO `categories` VALUES (8, 2, 2, '23123', 'child 2');
INSERT INTO `categories` VALUES (9, 1, 2, '312', '123');
INSERT INTO `categories` VALUES (10, 2, 2, '345345', '12312');

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime(0) NOT NULL,
  `topic_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES (1, 'post one', 'post one text', '2021-03-05 11:07:00', 2, 1);
INSERT INTO `posts` VALUES (2, 'post one', 'post one text', '2021-03-05 11:07:00', 1, 1);
INSERT INTO `posts` VALUES (3, 'post one', 'post one text', '2021-03-05 11:07:00', 1, 1);
INSERT INTO `posts` VALUES (4, 'post one', 'post one text', '2021-03-05 11:07:00', 1, 1);
INSERT INTO `posts` VALUES (5, 'post one', 'post one text', '2021-03-05 11:07:00', 1, 1);
INSERT INTO `posts` VALUES (6, 'post one', 'post one text', '2021-03-05 11:07:00', 1, 1);
INSERT INTO `posts` VALUES (7, 'post one', 'post one text', '2021-03-05 11:07:00', 10, 1);
INSERT INTO `posts` VALUES (8, 'post one', 'post one text', '2021-03-05 11:07:00', 10, 1);
INSERT INTO `posts` VALUES (9, 'post one', 'post one text', '2021-03-05 11:07:00', 10, 1);
INSERT INTO `posts` VALUES (10, 'post one', 'post one text', '2021-03-05 11:07:00', 10, 1);
INSERT INTO `posts` VALUES (11, 'post one', 'post one text', '2021-03-05 11:07:00', 10, 1);
INSERT INTO `posts` VALUES (12, 'post one', 'post one text', '2021-03-05 11:07:00', 11, 1);
INSERT INTO `posts` VALUES (13, 'post one', 'post one text', '2021-03-05 11:07:00', 12, 1);
INSERT INTO `posts` VALUES (14, 'post one', 'post one text', '2021-03-05 11:07:00', 13, 1);
INSERT INTO `posts` VALUES (15, 'post one', 'post one text', '2021-03-05 11:07:00', 14, 1);
INSERT INTO `posts` VALUES (16, 'post one', 'post one text', '2021-03-05 11:07:00', 15, 1);
INSERT INTO `posts` VALUES (17, 'post one', 'post one text', '2021-03-05 11:07:00', 16, 1);
INSERT INTO `posts` VALUES (18, 'post one', 'post one text', '2021-03-05 11:07:00', 10, 1);

-- ----------------------------
-- Table structure for replies
-- ----------------------------
DROP TABLE IF EXISTS `replies`;
CREATE TABLE `replies`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `reply_date` datetime(0) NOT NULL,
  `post_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of replies
-- ----------------------------
INSERT INTO `replies` VALUES (1, 'sdfsdfsdf sdf sdgsdfg sdfg sdg sdfg', '2021-03-05 10:23:00', 1, 1);

-- ----------------------------
-- Table structure for topics
-- ----------------------------
DROP TABLE IF EXISTS `topics`;
CREATE TABLE `topics`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime(0) NOT NULL,
  `category_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of topics
-- ----------------------------
INSERT INTO `topics` VALUES (1, 'adasdasd', '2021-03-05 10:23:00', 1, 1);
INSERT INTO `topics` VALUES (2, 'Topic 1 category root ', '2021-03-05 10:58:00', 1, 1);
INSERT INTO `topics` VALUES (3, 'Topic 1 category root ', '2021-03-05 10:58:00', 2, 1);
INSERT INTO `topics` VALUES (4, 'Topic 1 category root ', '2021-03-05 10:58:00', 2, 1);
INSERT INTO `topics` VALUES (5, 'Topic 1 category root ', '2021-03-05 10:58:00', 8, 1);
INSERT INTO `topics` VALUES (6, 'Topic 1 category root ', '2021-03-05 10:58:00', 9, 1);
INSERT INTO `topics` VALUES (7, 'Topic 1 category root ', '2021-03-05 10:58:00', 10, 1);
INSERT INTO `topics` VALUES (8, 'Topic 1 category root ', '2021-03-05 10:58:00', 10, 1);
INSERT INTO `topics` VALUES (9, 'Topic 1 category root ', '2021-03-05 10:58:00', 10, 1);
INSERT INTO `topics` VALUES (10, 'Topic 1 category root ', '2021-03-05 10:58:00', 10, 1);
INSERT INTO `topics` VALUES (11, 'Topic 1 category root ', '2021-03-05 10:58:00', 8, 1);
INSERT INTO `topics` VALUES (12, 'Topic 1 category root ', '2021-03-05 10:58:00', 9, 1);
INSERT INTO `topics` VALUES (13, 'Topic 1 category root ', '2021-03-05 10:58:00', 10, 1);
INSERT INTO `topics` VALUES (14, 'Topic 1 category root ', '2021-03-05 10:58:00', 8, 1);
INSERT INTO `topics` VALUES (15, 'Topic 1 category root ', '2021-03-05 10:58:00', 9, 1);
INSERT INTO `topics` VALUES (16, 'Topic 1 category root ', '2021-03-05 10:58:00', 10, 1);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `role` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created` datetime(0) NULL DEFAULT NULL,
  `modified` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'vaska', '$2a$10$Lwfp8ImkpI.QWXZlbfGvnOSaaT.qks6VUd2NOHTOEFAFc4VdUM8vi', 'admin', '2021-03-05 09:10:30', '2021-03-05 09:10:30');

SET FOREIGN_KEY_CHECKS = 1;
