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

 Date: 28/05/2022 17:48:17
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbcomplaint
-- ----------------------------
DROP TABLE IF EXISTS `tbcomplaint`;
CREATE TABLE `tbcomplaint`  (
  `complaintID` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `staffID` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `siteID` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `complaintGroup` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `complaintType` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `complaintDetail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `complaintSource` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `complaintDate` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `addDate` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `addBy` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `editDate` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `editBy` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`complaintID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbemp
-- ----------------------------
DROP TABLE IF EXISTS `tbemp`;
CREATE TABLE `tbemp`  (
  `empID` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `staffID` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `CUMMU_Target` int(1) NULL DEFAULT NULL,
  `CUMMU_Actual` int(1) NULL DEFAULT NULL,
  `Late_Target` int(1) NULL DEFAULT NULL,
  `Late_Actual` int(1) NULL DEFAULT NULL,
  `Absence_Target` int(1) NULL DEFAULT NULL,
  `Absence_Actual` int(1) NULL DEFAULT NULL,
  `Complaint_Target` int(1) NULL DEFAULT NULL,
  `Complaint_Actual` int(1) NULL DEFAULT NULL,
  `Warning` int(1) NULL DEFAULT NULL,
  `CUMMU_Result` int(1) NULL DEFAULT NULL,
  `Late_Result` int(1) NULL DEFAULT NULL,
  `Absence_Result` int(1) NULL DEFAULT NULL,
  `Complaint_Result` int(1) NULL DEFAULT NULL,
  `Warning_Result` int(1) NULL DEFAULT NULL,
  `empDate` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `addDate` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `addBy` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `editDate` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `editBy` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`empID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

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
  `siteStartWork` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `siteEndWork` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `siteEntityStatus` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `siteZoneNo` int(11) NULL DEFAULT NULL,
  `siteZoneManager` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `siteAreaManager` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `siteJSW` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'JoinSmartWorld',
  `siteProfitCenter` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `addDate` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `addBy` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `editDate` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `editBy` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`siteID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbstaff
-- ----------------------------
DROP TABLE IF EXISTS `tbstaff`;
CREATE TABLE `tbstaff`  (
  `staffID` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `siteID` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `staffNameTH` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `staffPosition` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `staffSection` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `staffProfitCenter` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `staffGroup` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `staffStatus` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `staffStartWorkDate` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `staffEndWorkDate` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `staffPassword` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `staffPasswordStatus` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `staffLevel` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `addDate` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `addBy` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `editDate` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `editBy` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`staffID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbtimestamp
-- ----------------------------
INSERT INTO `tbtimestamp` VALUES (1, '1', '2', '3', '2023-04-28', '2022-05-28', 'test', NULL, NULL);
INSERT INTO `tbtimestamp` VALUES (2, '2', '2', '3', '2023-04-28', '2022-05-28', 'test', NULL, NULL);
INSERT INTO `tbtimestamp` VALUES (3, '3', '2', '3', '2023-04-28', '2022-05-28', 'test', NULL, NULL);
INSERT INTO `tbtimestamp` VALUES (4, '4', '2', '3', '2023-04-28', '2022-05-28', 'test', NULL, NULL);
INSERT INTO `tbtimestamp` VALUES (5, '5', '2', '3', '2023-04-28', '2022-05-28', 'test', NULL, NULL);
INSERT INTO `tbtimestamp` VALUES (6, '6', '1', '1', '2023-04-28', '2022-05-28', 'test', NULL, NULL);
INSERT INTO `tbtimestamp` VALUES (7, '7', '1', '1', '2023-04-28', '2022-05-28', 'test', NULL, NULL);
INSERT INTO `tbtimestamp` VALUES (8, '8', '1', '1', '2023-04-28', '2022-05-28', 'test', NULL, NULL);

-- ----------------------------
-- Table structure for tbwarning
-- ----------------------------
DROP TABLE IF EXISTS `tbwarning`;
CREATE TABLE `tbwarning`  (
  `warnID` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `staffID` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `warnDetail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `warn1` int(1) NULL DEFAULT NULL COMMENT 'วาจา',
  `warn2` int(1) NULL DEFAULT NULL COMMENT 'อักษร1',
  `warn3` int(1) NULL DEFAULT NULL COMMENT 'อักษร2',
  `warn4` int(1) NULL DEFAULT NULL COMMENT 'อักษร3',
  `warnDate` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `addDate` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `addBy` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `editDate` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `editBy` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`warnID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
