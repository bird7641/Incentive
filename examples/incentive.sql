/*
 Navicat Premium Data Transfer

 Source Server         : ME_mysql
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : incentive

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 05/07/2022 21:35:39
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbcommu
-- ----------------------------
DROP TABLE IF EXISTS `tbcommu`;
CREATE TABLE `tbcommu`  (
  `commuID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `staffID` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `commuActual` int(5) NULL DEFAULT NULL,
  `commuDate` date NULL DEFAULT NULL,
  `addDate` date NULL DEFAULT NULL,
  `addBy` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `editDate` date NULL DEFAULT NULL,
  `editBy` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`commuID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbcommu
-- ----------------------------
INSERT INTO `tbcommu` VALUES (12, '1', 4, '2022-04-28', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ');
INSERT INTO `tbcommu` VALUES (13, '2', 4, '2022-04-28', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ');
INSERT INTO `tbcommu` VALUES (14, '3', 2, '2022-06-28', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ');

-- ----------------------------
-- Table structure for tbcomplaint
-- ----------------------------
DROP TABLE IF EXISTS `tbcomplaint`;
CREATE TABLE `tbcomplaint`  (
  `complaintID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `staffID` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `complaintType` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ประเภทเรื่อง',
  `complaintDetail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'รายละเอียด',
  `complaintSource` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'แหล่งที่มา',
  `complaintDate` date NULL DEFAULT NULL,
  `addDate` date NULL DEFAULT NULL,
  `addBy` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `editDate` date NULL DEFAULT NULL,
  `editBy` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`complaintID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbcomplaint
-- ----------------------------
INSERT INTO `tbcomplaint` VALUES (1, '1', 'ความสุภาพในการให้บริการ_Services Mind', '\"คุณชญานิษฐ์ แจ้งร้องเรียน นิติฯคุณฝน (ไม่ทราบชื่อจริง) เรื่อง Service Mind ของเจ้าหน้าที่ จากกรณี 1.ลูกค้าแจ้งซ่อมตัวบ้านกับทางนิติฯ นิติฯแจ้งว่าจะแจ้งช่างโครงการให้ ไม่อยากแจ้งเข้าส่วนกลางเพราะช้า ซึ่งหลังจากที่แจ้งนิติฯไปเป็นสัปดาห์แล้วก็ยังไม่ได้รับกา', 'Website –  APthai.com', '2022-04-03', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);
INSERT INTO `tbcomplaint` VALUES (2, '1', 'ความสุภาพ-มารยาทในการให้บริการ', 'ร้องเรียนความสุภาพและมารยาทในการให้บริการของช่างประจำอาคาร ', 'SSM Call', '2022-04-10', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);

-- ----------------------------
-- Table structure for tbemp
-- ----------------------------
DROP TABLE IF EXISTS `tbemp`;
CREATE TABLE `tbemp`  (
  `empID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `staffID` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `CUMMU_Target` int(1) NULL DEFAULT NULL,
  `CUMMU_Actual` int(1) NULL DEFAULT NULL,
  `Late_Target` int(1) NULL DEFAULT NULL,
  `Late_Actual` int(1) NULL DEFAULT NULL,
  `Absence_Target` int(1) NULL DEFAULT NULL,
  `Absence_Actual` int(1) NULL DEFAULT NULL,
  `empDate` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `addDate` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `addBy` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `editDate` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `editBy` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`empID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 55 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbemp
-- ----------------------------
INSERT INTO `tbemp` VALUES (1, '1', 4, 4, 0, 4, 0, 7, '2022-04-10', '2022-07-05', 'test', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ');
INSERT INTO `tbemp` VALUES (2, '2', 4, 4, 0, 4, 0, 4, '2022-04-10', '2022-07-05', 'test', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ');
INSERT INTO `tbemp` VALUES (3, '3', 4, 2, 0, 4, 0, 4, '2022-06-28', '2022-07-05', 'test', NULL, NULL);
INSERT INTO `tbemp` VALUES (4, '4', NULL, NULL, 0, 4, 0, 4, '2022-04-28', '2022-07-05', 'test', NULL, NULL);
INSERT INTO `tbemp` VALUES (5, '5', NULL, NULL, 0, 4, 0, 4, '2022-04-28', '2022-07-05', 'test', NULL, NULL);
INSERT INTO `tbemp` VALUES (6, '6', NULL, NULL, 0, 4, 0, 4, '2022-04-28', '2022-07-05', 'test', NULL, NULL);
INSERT INTO `tbemp` VALUES (7, '7', NULL, NULL, 0, 4, 0, 4, '2022-04-28', '2022-07-05', 'test', NULL, NULL);
INSERT INTO `tbemp` VALUES (8, '8', NULL, NULL, 0, 4, 0, 4, '2022-04-28', '2022-07-05', 'test', NULL, NULL);
INSERT INTO `tbemp` VALUES (9, '9', NULL, NULL, 0, 1, 0, 1, '2022-04-28', '2022-07-05', 'test', NULL, NULL);
INSERT INTO `tbemp` VALUES (10, '10', NULL, NULL, 0, 2, 0, 2, '2022-04-28', '2022-07-05', 'test', NULL, NULL);
INSERT INTO `tbemp` VALUES (11, '11', NULL, NULL, 0, 3, 0, 3, '2022-04-28', '2022-07-05', 'test', NULL, NULL);
INSERT INTO `tbemp` VALUES (12, '12', NULL, NULL, 0, 4, 0, 4, '2022-04-28', '2022-07-05', 'test', NULL, NULL);
INSERT INTO `tbemp` VALUES (13, '13', NULL, NULL, 0, 5, 0, 5, '2022-04-28', '2022-07-05', 'test', NULL, NULL);
INSERT INTO `tbemp` VALUES (14, '14', NULL, NULL, 0, 6, 0, 6, '2022-04-28', '2022-07-05', 'test', NULL, NULL);
INSERT INTO `tbemp` VALUES (15, '15', NULL, NULL, 0, 7, 0, 7, '2022-04-28', '2022-07-05', 'test', NULL, NULL);
INSERT INTO `tbemp` VALUES (16, '16', NULL, NULL, 0, 8, 0, 8, '2022-04-28', '2022-07-05', 'test', NULL, NULL);

-- ----------------------------
-- Table structure for tblog
-- ----------------------------
DROP TABLE IF EXISTS `tblog`;
CREATE TABLE `tblog`  (
  `logDate` date NULL DEFAULT NULL,
  `logTime` time(0) NULL DEFAULT NULL,
  `logUser` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `logIP` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `logHead` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `logAction` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `logRemark` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tblog
-- ----------------------------
INSERT INTO `tblog` VALUES ('2022-05-30', '17:46:39', '-', '', 'Login', 'ระบุชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง', 'Username : jiranuwat.tun@hotmail.com');
INSERT INTO `tblog` VALUES ('2022-05-30', '17:46:48', '1', '127.0.0.1', 'Login', 'เข้าใช้งานระบบได้ตามปกติ', '-');
INSERT INTO `tblog` VALUES ('0000-00-00', '17:46:57', 'test2 test2', '127.0.0.1', 'Logout', 'ออกจากระบบด้วยตนเอง', '-');
INSERT INTO `tblog` VALUES ('0000-00-00', '17:47:06', '', '', 'Logout', 'ออกจากระบบด้วยตนเอง', '-');
INSERT INTO `tblog` VALUES ('2022-05-30', '17:47:12', '-', '', 'Login', 'ระบุชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง', 'Username : 1');
INSERT INTO `tblog` VALUES ('2022-05-30', '17:48:30', '1', '127.0.0.1', 'Login', 'เข้าใช้งานระบบได้ตามปกติ', '-');
INSERT INTO `tblog` VALUES ('0000-00-00', '17:48:53', 'test2 test2', '127.0.0.1', 'Logout', 'ออกจากระบบด้วยตนเอง', '-');
INSERT INTO `tblog` VALUES ('2022-05-30', '17:49:52', '-', '', 'Login', 'ระบุชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง', 'Username : 1');
INSERT INTO `tblog` VALUES ('2022-05-30', '17:50:41', '-', '', 'Login', 'ระบุชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง', 'Username : jiranuwat.tun@hotmail.com');
INSERT INTO `tblog` VALUES ('2022-05-30', '17:50:47', '-', '', 'Login', 'ระบุชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง', 'Username : jiranuwat.tun@hotmail.com');
INSERT INTO `tblog` VALUES ('2022-05-30', '17:50:57', '-', '', 'Login', 'ระบุชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง', 'Username : jiranuwat.tun@hotmail.com');
INSERT INTO `tblog` VALUES ('2022-05-30', '17:52:30', '-', '', 'Login', 'ระบุชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง', 'Username : jiranuwat.tun@hotmail.com');
INSERT INTO `tblog` VALUES ('2022-05-30', '17:52:42', '-', '', 'Login', 'ระบุชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง', 'Username : jiranuwat.tun@hotmail.com');
INSERT INTO `tblog` VALUES ('2022-05-30', '17:53:42', '-', '127.0.0.1', 'Login', 'ระบุชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง', 'Username : jiranuwat.tun@hotmail.com');
INSERT INTO `tblog` VALUES ('2022-05-30', '17:54:21', '-', '127.0.0.1', 'Login', 'ระบุชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง', 'Username : jiranuwat.tun@hotmail.com');
INSERT INTO `tblog` VALUES ('2022-05-30', '17:54:29', '1', '127.0.0.1', 'Login', 'เข้าใช้งานระบบได้ตามปกติ', '-');
INSERT INTO `tblog` VALUES ('0000-00-00', '18:02:05', 'test2 test2', '127.0.0.1', 'Logout', 'ออกจากระบบด้วยตนเอง', '-');
INSERT INTO `tblog` VALUES ('2022-05-30', '18:02:11', '1', '127.0.0.1', 'Login', 'เข้าใช้งานระบบได้ตามปกติ', '-');
INSERT INTO `tblog` VALUES ('0000-00-00', '18:03:33', 'จิรานุวัฒน์ ตุณทกิจ', '127.0.0.1', 'Logout', 'ออกจากระบบด้วยตนเอง', '-');
INSERT INTO `tblog` VALUES ('2022-05-30', '18:11:18', '1', '127.0.0.1', 'Login', 'เข้าใช้งานระบบได้ตามปกติ', '-');
INSERT INTO `tblog` VALUES ('0000-00-00', '18:17:19', 'จิรานุวัฒน์ ตุณทกิจ', '127.0.0.1', 'Logout', 'ออกจากระบบด้วยตนเอง', '-');
INSERT INTO `tblog` VALUES ('2022-05-30', '18:30:45', '1', '127.0.0.1', 'Login', 'เข้าใช้งานระบบได้ตามปกติ', '-');
INSERT INTO `tblog` VALUES ('2022-06-01', '21:10:02', '1', '127.0.0.1', 'Login', 'เข้าใช้งานระบบได้ตามปกติ', '-');
INSERT INTO `tblog` VALUES ('2022-06-04', '14:37:11', '-', '127.0.0.1', 'Login', 'ระบุชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง', 'Username : 1');
INSERT INTO `tblog` VALUES ('2022-06-04', '14:37:14', '1', '127.0.0.1', 'Login', 'เข้าใช้งานระบบได้ตามปกติ', '-');
INSERT INTO `tblog` VALUES ('2022-06-05', '22:05:08', '1', '127.0.0.1', 'Login', 'เข้าใช้งานระบบได้ตามปกติ', '-');
INSERT INTO `tblog` VALUES ('2022-06-07', '10:50:09', '1', '127.0.0.1', 'Login', 'เข้าใช้งานระบบได้ตามปกติ', '-');
INSERT INTO `tblog` VALUES ('0000-00-00', '11:39:57', 'จิรานุวัฒน์ ตุณทกิจ', '127.0.0.1', 'Logout', 'ออกจากระบบด้วยตนเอง', '-');
INSERT INTO `tblog` VALUES ('2022-06-07', '13:11:44', '-', '127.0.0.1', 'Login', 'ระบุชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง', 'Username : 10018166');
INSERT INTO `tblog` VALUES ('2022-06-07', '13:11:50', '1', '127.0.0.1', 'Login', 'เข้าใช้งานระบบได้ตามปกติ', '-');
INSERT INTO `tblog` VALUES ('0000-00-00', '13:59:57', 'จิรานุวัฒน์ ตุณทกิจ', '127.0.0.1', 'Logout', 'ออกจากระบบด้วยตนเอง', '-');
INSERT INTO `tblog` VALUES ('2022-06-07', '14:00:07', '-', '127.0.0.1', 'Login', 'ระบุชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง', 'Username : 1');
INSERT INTO `tblog` VALUES ('2022-06-07', '14:00:16', '1', '127.0.0.1', 'Login', 'เข้าใช้งานระบบได้ตามปกติ', '-');
INSERT INTO `tblog` VALUES ('2022-06-12', '23:18:52', '1', '127.0.0.1', 'Login', 'เข้าใช้งานระบบได้ตามปกติ', '-');
INSERT INTO `tblog` VALUES ('2022-06-13', '18:16:35', '1', '127.0.0.1', 'Login', 'เข้าใช้งานระบบได้ตามปกติ', '-');
INSERT INTO `tblog` VALUES ('0000-00-00', '18:54:58', 'จิรานุวัฒน์ ตุณทกิจ', '127.0.0.1', 'Logout', 'ออกจากระบบด้วยตนเอง', '-');
INSERT INTO `tblog` VALUES ('2022-06-13', '18:55:03', '1', '127.0.0.1', 'Login', 'เข้าใช้งานระบบได้ตามปกติ', '-');
INSERT INTO `tblog` VALUES ('0000-00-00', '18:55:24', 'จิรานุวัฒน์ ตุณทกิจ', '127.0.0.1', 'Logout', 'ออกจากระบบด้วยตนเอง', '-');
INSERT INTO `tblog` VALUES ('2022-06-13', '18:55:28', '1', '127.0.0.1', 'Login', 'เข้าใช้งานระบบได้ตามปกติ', '-');
INSERT INTO `tblog` VALUES ('0000-00-00', '18:58:49', 'จิรานุวัฒน์ ตุณทกิจ', '127.0.0.1', 'Logout', 'ออกจากระบบด้วยตนเอง', '-');
INSERT INTO `tblog` VALUES ('2022-06-13', '18:59:07', '1', '127.0.0.1', 'Login', 'เข้าใช้งานระบบได้ตามปกติ', '-');
INSERT INTO `tblog` VALUES ('0000-00-00', '19:04:43', 'จิรานุวัฒน์ ตุณทกิจ', '127.0.0.1', 'Logout', 'ออกจากระบบด้วยตนเอง', '-');
INSERT INTO `tblog` VALUES ('2022-06-13', '19:04:50', '1', '127.0.0.1', 'Login', 'เข้าใช้งานระบบได้ตามปกติ', '-');
INSERT INTO `tblog` VALUES ('0000-00-00', '19:05:22', 'จิรานุวัฒน์ ตุณทกิจ', '127.0.0.1', 'Logout', 'ออกจากระบบด้วยตนเอง', '-');
INSERT INTO `tblog` VALUES ('2022-06-13', '19:05:27', '1', '127.0.0.1', 'Login', 'เข้าใช้งานระบบได้ตามปกติ', '-');
INSERT INTO `tblog` VALUES ('2022-06-17', '21:31:36', '1', '127.0.0.1', 'Login', 'เข้าใช้งานระบบได้ตามปกติ', '-');
INSERT INTO `tblog` VALUES ('0000-00-00', '21:33:51', 'จิรานุวัฒน์ ตุณทกิจ', '127.0.0.1', 'Logout', 'ออกจากระบบด้วยตนเอง', '-');
INSERT INTO `tblog` VALUES ('2022-06-17', '21:33:53', '-', '127.0.0.1', 'Login', 'ระบุชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง', 'Username : 10018166');
INSERT INTO `tblog` VALUES ('2022-06-17', '21:34:33', '1', '127.0.0.1', 'Login', 'เข้าใช้งานระบบได้ตามปกติ', '-');
INSERT INTO `tblog` VALUES ('2022-06-17', '21:36:11', '1', '127.0.0.1', 'Login', 'เข้าใช้งานระบบได้ตามปกติ', '-');
INSERT INTO `tblog` VALUES ('2022-06-17', '23:09:20', '1', '127.0.0.1', 'Login', 'เข้าใช้งานระบบได้ตามปกติ', '-');
INSERT INTO `tblog` VALUES ('2022-07-02', '23:49:38', '-', '127.0.0.1', 'Login', 'ระบุชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง', 'Username : jtuntakij');
INSERT INTO `tblog` VALUES ('2022-07-02', '23:50:15', '-', '127.0.0.1', 'Login', 'ระบุชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง', 'Username : 1');
INSERT INTO `tblog` VALUES ('2022-07-02', '23:50:33', '1', '127.0.0.1', 'Login', 'เข้าใช้งานระบบได้ตามปกติ', '-');
INSERT INTO `tblog` VALUES ('2022-07-05', '12:26:43', '-', '127.0.0.1', 'Login', 'ระบุชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง', 'Username : 1');
INSERT INTO `tblog` VALUES ('2022-07-05', '12:26:50', '-', '127.0.0.1', 'Login', 'ระบุชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง', 'Username : 1');
INSERT INTO `tblog` VALUES ('2022-07-05', '12:26:55', '-', '127.0.0.1', 'Login', 'ระบุชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง', 'Username : 1');
INSERT INTO `tblog` VALUES ('2022-07-05', '12:27:01', '-', '127.0.0.1', 'Login', 'ระบุชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง', 'Username : 1');
INSERT INTO `tblog` VALUES ('2022-07-05', '12:27:12', '-', '127.0.0.1', 'Login', 'ระบุชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง', 'Username : 1');
INSERT INTO `tblog` VALUES ('2022-07-05', '12:27:23', '-', '127.0.0.1', 'Login', 'ระบุชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง', 'Username : 1');
INSERT INTO `tblog` VALUES ('2022-07-05', '12:27:40', '1', '127.0.0.1', 'Login', 'เข้าใช้งานระบบได้ตามปกติ', '-');
INSERT INTO `tblog` VALUES ('0000-00-00', '14:38:46', 'จิรานุวัฒน์ ตุณทกิจ', '127.0.0.1', 'Logout', 'ออกจากระบบด้วยตนเอง', '-');
INSERT INTO `tblog` VALUES ('2022-07-05', '14:38:58', '1', '127.0.0.1', 'Login', 'เข้าใช้งานระบบได้ตามปกติ', '-');
INSERT INTO `tblog` VALUES ('0000-00-00', '14:39:13', 'จิรานุวัฒน์ ตุณทกิจ', '127.0.0.1', 'Logout', 'ออกจากระบบด้วยตนเอง', '-');
INSERT INTO `tblog` VALUES ('2022-07-05', '14:39:17', '1', '127.0.0.1', 'Login', 'เข้าใช้งานระบบได้ตามปกติ', '-');
INSERT INTO `tblog` VALUES ('2022-07-05', '15:08:40', '1', '127.0.0.1', 'Login', 'เข้าใช้งานระบบได้ตามปกติ', '-');
INSERT INTO `tblog` VALUES ('0000-00-00', '16:56:25', 'จิรานุวัฒน์ ตุณทกิจ', '127.0.0.1', 'Logout', 'ออกจากระบบด้วยตนเอง', '-');
INSERT INTO `tblog` VALUES ('2022-07-05', '16:56:43', '1', '127.0.0.1', 'Login', 'เข้าใช้งานระบบได้ตามปกติ', '-');
INSERT INTO `tblog` VALUES ('0000-00-00', '20:55:27', 'จิรานุวัฒน์ ตุณทกิจ', '127.0.0.1', 'Logout', 'ออกจากระบบด้วยตนเอง', '-');
INSERT INTO `tblog` VALUES ('2022-07-05', '21:02:04', '1', '127.0.0.1', 'Login', 'เข้าใช้งานระบบได้ตามปกติ', '-');

-- ----------------------------
-- Table structure for tbsite
-- ----------------------------
DROP TABLE IF EXISTS `tbsite`;
CREATE TABLE `tbsite`  (
  `siteID` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'CostCenter',
  `siteName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `siteType` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `siteDeveloper` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `siteUnit` int(10) NULL DEFAULT NULL,
  `siteTransfer` int(10) NULL DEFAULT NULL,
  `siteStatus` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `siteStartWork` date NULL DEFAULT NULL,
  `siteEndWork` date NULL DEFAULT NULL,
  `siteEntityStatus` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `siteZoneNo` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `siteZoneManager` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `siteAreaManager` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `siteJSW` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'JoinSmartWorld',
  `addDate` date NULL DEFAULT NULL,
  `addBy` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `editDate` date NULL DEFAULT NULL,
  `editBy` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`siteID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbsite
-- ----------------------------
INSERT INTO `tbsite` VALUES ('1', 'โครงการวิภาวดี', 'tst', 'test', 100, 100, 'Active', '2022-06-05', '1970-01-01', 'N', 'test', 'qwergwergv', 'wrgw', 'Yes', '2022-06-07', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);
INSERT INTO `tbsite` VALUES ('10024', 'The Address สุขุมวิท 42 A', 'High Rise', 'AP', 114, 114, 'Active', '2007-11-12', '2022-06-05', 'Y', 'HR1', 'มานพ ศรีเขื่อนแก้ว', 'แนนนรินทร์ โรจนวิภาต', 'Yes', '2022-06-07', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);
INSERT INTO `tbsite` VALUES ('2', 'testt', 'test', 'test', 1222, 1222, 'Active', '1970-01-01', '1970-01-01', 'Y', '0', 'qwergwergv', 'wrgw', 'gvwerfgwg', '2022-06-07', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);
INSERT INTO `tbsite` VALUES ('3', 'testsdgwasd', 'test', 'test', 1222, 1231, 'Active', '2022-06-03', '2022-06-17', 'Y', '0', 'qwergwergv', 'wrgw', 'gvwerfgwg', '2022-06-07', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);

-- ----------------------------
-- Table structure for tbstaff
-- ----------------------------
DROP TABLE IF EXISTS `tbstaff`;
CREATE TABLE `tbstaff`  (
  `staffID` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `siteID` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `staffNameTH` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `staffPosition` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `staffSection` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `staffProfitCenter` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `staffGroup` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `staffStatus` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `staffStartWorkDate` date NULL DEFAULT NULL,
  `staffEndWorkDate` date NULL DEFAULT NULL,
  `staffPassword` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `staffPasswordStatus` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `staffLevel` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `addDate` date NULL DEFAULT NULL,
  `addBy` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `editDate` date NULL DEFAULT NULL,
  `editBy` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`staffID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbstaff
-- ----------------------------
INSERT INTO `tbstaff` VALUES ('1', '10024', 'จิรานุวัฒน์ ตุณทกิจ', 'test', 'tres', 'dghgd', 'kjhgkjh', 'Y', '2022-05-01', '2023-05-01', '202CB962AC59075B964B07152D234B70', 'Y', 'SuperAdmin', '2022-05-29', 'Test', '2022-06-13', 'จิรานุวัฒน์ ตุณทกิจ');
INSERT INTO `tbstaff` VALUES ('2', '1', 'Test Test', 'test', 'tres', 'dghgd', 'kjhgkjh', 'N', '2022-05-01', '2023-05-01', 'C81E728D9D4C2F636F067F89CC14862C', 'N', 'Admin', '2022-05-29', 'Test', NULL, NULL);
INSERT INTO `tbstaff` VALUES ('3', '1', 'Jiranuwat Tuntakij', 'Programmer', 'test', '123458', 'test', 'Y', '2022-05-30', '0000-00-00', 'D41D8CD98F00B204E9800998ECF8427E', 'N', 'User', '2022-05-30', 'Test', '2022-05-30', 'test');

-- ----------------------------
-- Table structure for tbtimestamp
-- ----------------------------
DROP TABLE IF EXISTS `tbtimestamp`;
CREATE TABLE `tbtimestamp`  (
  `timestampID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `staffID` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `timestampLate` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `timestampAbsence` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `timestampDate` date NULL DEFAULT NULL,
  `addDate` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `addBy` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `editDate` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `editBy` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`timestampID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbtimestamp
-- ----------------------------
INSERT INTO `tbtimestamp` VALUES (1, '1', '4', '7', '2022-04-28', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ');
INSERT INTO `tbtimestamp` VALUES (2, '2', '4', '4', '2022-04-28', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);
INSERT INTO `tbtimestamp` VALUES (3, '3', '4', '4', '2022-06-28', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);
INSERT INTO `tbtimestamp` VALUES (4, '4', '4', '4', '2022-04-28', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);
INSERT INTO `tbtimestamp` VALUES (5, '5', '4', '4', '2022-04-28', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);
INSERT INTO `tbtimestamp` VALUES (6, '6', '4', '4', '2022-04-28', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);
INSERT INTO `tbtimestamp` VALUES (7, '7', '4', '4', '2022-04-28', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);
INSERT INTO `tbtimestamp` VALUES (8, '8', '4', '4', '2022-04-28', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);
INSERT INTO `tbtimestamp` VALUES (9, '9', '1', '1', '2022-04-28', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);
INSERT INTO `tbtimestamp` VALUES (10, '10', '2', '2', '2022-04-28', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);
INSERT INTO `tbtimestamp` VALUES (11, '11', '3', '3', '2022-04-28', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);
INSERT INTO `tbtimestamp` VALUES (12, '12', '4', '4', '2022-04-28', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);
INSERT INTO `tbtimestamp` VALUES (13, '13', '5', '5', '2022-04-28', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);
INSERT INTO `tbtimestamp` VALUES (14, '14', '6', '6', '2022-04-28', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);
INSERT INTO `tbtimestamp` VALUES (15, '15', '7', '7', '2022-04-28', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);
INSERT INTO `tbtimestamp` VALUES (16, '16', '8', '8', '2022-04-28', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);

-- ----------------------------
-- Table structure for tbwarning
-- ----------------------------
DROP TABLE IF EXISTS `tbwarning`;
CREATE TABLE `tbwarning`  (
  `warnID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `staffID` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `warnDetail` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `warnDate` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `addDate` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `addBy` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `editDate` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `editBy` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`warnID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbwarning
-- ----------------------------
INSERT INTO `tbwarning` VALUES (14, '1', 'บุคคลภายนอกเข้าพื้นที่ test', '2022-04-10', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ');
INSERT INTO `tbwarning` VALUES (15, '2', 'ขาดงาน', '2022-04-10', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);
INSERT INTO `tbwarning` VALUES (16, 'CR003446', 'ไม่ดำเนินการเรื่องแชท 1-1', '2022-01-10', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);
INSERT INTO `tbwarning` VALUES (17, 'CR001465', 'ไม่แก้ไขงานทำให้น้ำเสียไม่ได้ตามมาตรฐาน', '2022-01-10', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);
INSERT INTO `tbwarning` VALUES (18, 'CR002925', 'ไม่แก้ไขงานทำให้น้ำเสียไม่ได้ตามมาตรฐาน', '2022-01-10', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);
INSERT INTO `tbwarning` VALUES (19, 'CR003665', 'ไม่แก้ไขงานทำให้น้ำเสียไม่ได้ตามมาตรฐาน', '2022-01-10', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);
INSERT INTO `tbwarning` VALUES (20, 'CR003692', 'ไม่บันทึกเวลาเข้า-ออกให้สมบูรณ์', '2022-01-10', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);
INSERT INTO `tbwarning` VALUES (21, 'CR003678', 'หลับในเวลาปฏิบัติงาน', '2022-01-10', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);
INSERT INTO `tbwarning` VALUES (22, 'CR003807', 'ตรวจ Daily IPMS เรื่องสระว่ายน้ำไม่ถูกต้อง', '2022-01-10', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);
INSERT INTO `tbwarning` VALUES (23, 'CR001869', 'ไม่ตรวจสอบงานของผู้ใต้บังคับบัญชา', '2022-01-10', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);
INSERT INTO `tbwarning` VALUES (24, 'CR002268', 'ไม่ปฏิบัติงานให้ได้ตามแผนงาน (สระว่ายน้ำ)', '2022-01-10', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);
INSERT INTO `tbwarning` VALUES (25, 'CR003380', 'ไม่ปฏิบัติงานให้ได้ตามแผนงาน (สระว่ายน้ำ)', '2022-01-10', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);
INSERT INTO `tbwarning` VALUES (26, 'CR003059', 'ละเลยการตอบกลับข้อความลูกบ้านทาง Smart world', '2022-01-10', '2022-07-05', 'จิรานุวัฒน์ ตุณทกิจ', NULL, NULL);

-- ----------------------------
-- View structure for v_emp
-- ----------------------------
DROP VIEW IF EXISTS `v_emp`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_emp` AS SELECT
	tbstaff.staffID,
	tbstaff.staffNameTH,
	tbstaff.staffPosition,
	tbsite.siteName,
	#Commu
	tbemp.CUMMU_Target,
	tbemp.CUMMU_Actual,
IF
	( tbemp.CUMMU_Actual >= tbemp.CUMMU_Target, 1, 0 ) AS ResultCommu,
	#Late
	tbemp.Late_Target,
	tbemp.Late_Actual,
IF
	( tbemp.Late_Actual >= tbemp.Late_Target, 1, 0 ) AS ResultLate ,
	#Absence
	tbemp.Absence_Target,
	tbemp.Absence_Actual,
IF
	( tbemp.Absence_Actual >= tbemp.Absence_Target, 1, 0 ) AS ResultAbsence,
	#Complaint
	( SELECT COUNT( staffID ) AS ComplantCount FROM tbcomplaint WHERE staffID = tbstaff.staffID AND MONTH(tbcomplaint.complaintDate) = MONTH(tbemp.empDate) AND YEAR(tbcomplaint.complaintDate) = YEAR(tbemp.empDate)) AS ComplantActual,
IF
	( ( SELECT COUNT( staffID ) AS ComplantCount FROM tbcomplaint WHERE staffID = tbstaff.staffID AND MONTH(tbcomplaint.complaintDate) = MONTH(tbemp.empDate) AND YEAR(tbcomplaint.complaintDate) = YEAR(tbemp.empDate)) > 0, 0, 1 ) AS ResultComplant,
	#Warn
	( SELECT COUNT( staffID ) AS WarnCount FROM tbwarning WHERE staffID = tbstaff.staffID AND MONTH(tbwarning.warnDate) = MONTH(tbemp.empDate) AND YEAR(tbwarning.warnDate) = YEAR(tbemp.empDate)) AS WarnActual,
IF
	( ( SELECT COUNT( staffID ) AS WarnCount FROM tbwarning WHERE staffID = tbstaff.staffID AND MONTH(tbwarning.warnDate) = MONTH(tbemp.empDate) AND YEAR(tbwarning.warnDate) = YEAR(tbemp.empDate)) > 0, 0, 1 ) AS ResultWarn,
	IF
	( ( SELECT COUNT( staffID ) AS WarnCount FROM tbwarning WHERE staffID = tbstaff.staffID AND MONTH(tbwarning.warnDate) = MONTH(tbemp.empDate) AND YEAR(tbwarning.warnDate) = YEAR(tbemp.empDate)) > 0, 0, 1 ) AS ResultStatus,
	MONTH(tbemp.empDate) AS Month,
	YEAR(tbemp.empDate) AS Year
FROM
	tbemp
	INNER JOIN tbstaff ON tbemp.staffID = tbstaff.staffID
	INNER JOIN tbsite ON tbsite.siteID = tbstaff.siteID ;

-- ----------------------------
-- View structure for v_emp_old
-- ----------------------------
DROP VIEW IF EXISTS `v_emp_old`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_emp_old` AS SELECT
	tbstaff.staffID,
	tbstaff.staffNameTH,
	tbsite.siteName,
	tbcommu.commuActual AS CommuActual,
IF
	( tbcommu.commuActual >= 4, 1, 0 ) AS ResultActual,
	tbtimestamp.timestampLate AS LateActual,
IF
	( tbtimestamp.timestampLate > 0, 0, 1 ) AS ResultLate,
	tbtimestamp.timestampAbsence AS AbsenceActual,
IF
	( tbtimestamp.timestampAbsence > 0, 0, 1 ) AS ResultAbsence,
	( SELECT COUNT( staffID ) AS ComplantCount FROM tbcomplaint WHERE staffID = tbstaff.staffID ) AS ComplantActual,
IF
	( ( SELECT COUNT( staffID ) AS ComplantCount FROM tbcomplaint WHERE staffID = tbstaff.staffID ) > 0, 0, 1 ) AS ResultComplant,
	( SELECT COUNT( staffID ) AS WarnCount FROM tbwarning WHERE staffID = tbstaff.staffID ) AS WarnActual,
IF
	( ( SELECT COUNT( staffID ) AS WarnCount FROM tbwarning WHERE staffID = tbstaff.staffID ) > 0, 0, 1 ) AS ResultWarn,
	MONTH ( tbtimestamp.timestampDate ) AS MONTH,
	YEAR ( tbtimestamp.timestampDate ) AS YEAR 
FROM
	tbtimestamp
	INNER JOIN tbstaff ON tbtimestamp.staffID = tbstaff.staffID
	INNER JOIN tbsite ON tbsite.siteID = tbstaff.siteID
	INNER JOIN tbcommu ON tbcommu.staffID = tbstaff.staffID ;

SET FOREIGN_KEY_CHECKS = 1;
