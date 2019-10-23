/*
 Navicat Premium Data Transfer

 Source Server         : nga
 Source Server Type    : MySQL
 Source Server Version : 50721
 Source Host           : localhost:3306
 Source Schema         : demo_project

 Target Server Type    : MySQL
 Target Server Version : 50721
 File Encoding         : 65001

 Date: 23/10/2019 16:54:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students`  (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name_student` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `student_id` int(8) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `birth_day` date NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `phone` int(11) NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of students
-- ----------------------------

-- ----------------------------
-- student_id: 1234
-- password: 123456
-- ----------------------------
INSERT INTO `students` VALUES (4, 'ngaaaa', 1234, '$2y$10$xe7h6wMi9PDe.y/0yOoDP.1PKtNujHTnOcid8miGKOMzlmrDRMNOm', '1998-12-19', 'phong672006@gmail.com', 1234567, 'Vn');
INSERT INTO `students` VALUES (2, NULL, 1234567, '$2y$10$BmmRmwwro0D.zSyB440mmOTIUYm0XTSSviqPLUCCYmaqCaOfXtnbm', NULL, NULL, NULL, NULL);
INSERT INTO `students` VALUES (3, 'Nga', 123, '$2y$10$9u74Jc4JjdX9.CgUfBqsYOJsltHstVAZ50qVJJbV7pM9qcNSLNGUW', '1998-12-19', NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
