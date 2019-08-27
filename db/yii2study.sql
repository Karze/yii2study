# Host: localhost  (Version 5.7.20-log)
# Date: 2018-05-05 14:56:12
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "article"
#

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '论文名',
  `s_name` varchar(255) NOT NULL DEFAULT '' COMMENT '学生姓名',
  `major_id` varchar(255) NOT NULL DEFAULT '' COMMENT '专业id',
  `grade` tinyint(3) NOT NULL DEFAULT '0' COMMENT '年级',
  `year` int(11) NOT NULL DEFAULT '0' COMMENT '毕业年份',
  `excellent_college` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '学院优秀毕业论文，0否，1是',
  `excellent_school` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '校优秀毕业论文，0否，1是',
  `teacher_id` int(11) NOT NULL DEFAULT '0' COMMENT '指导老师id',
  `filename` varchar(255) DEFAULT NULL COMMENT '上传的文件名',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='论文表';

#
# Data for table "article"
#


#
# Structure for table "dict_department"
#

DROP TABLE IF EXISTS `dict_department`;
CREATE TABLE `dict_department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='院系';

#
# Data for table "dict_department"
#

INSERT INTO `dict_department` VALUES (1,'工程中心'),(2,'昆虫系'),(3,'检疫系'),(4,'病理系'),(5,'农药系'),(6,'院外'),(7,'离退休');

#
# Structure for table "dict_major"
#

DROP TABLE IF EXISTS `dict_major`;
CREATE TABLE `dict_major` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='专业';

#
# Data for table "dict_major"
#

INSERT INTO `dict_major` VALUES (1,'计算机技术');

#
# Structure for table "dict_title"
#

DROP TABLE IF EXISTS `dict_title`;
CREATE TABLE `dict_title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='职称';

#
# Data for table "dict_title"
#

INSERT INTO `dict_title` VALUES (1,'教授'),(2,'副教授'),(3,'讲师'),(4,'研究员'),(5,'副研究员'),(6,'助理研究员'),(7,'高级实验师'),(8,'实验师'),(9,'农艺师'),(10,'其他系列副高级'),(11,'其他系列中级');

#
# Structure for table "student"
#

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '姓名',
  `code` int(11) NOT NULL DEFAULT '0' COMMENT '学号',
  `major_id` int(11) NOT NULL DEFAULT '0' COMMENT '专业id',
  `grade` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '年级',
  `year` int(5) unsigned DEFAULT '0' COMMENT '毕业年份',
  `teacher_id` int(11) NOT NULL DEFAULT '0' COMMENT '指导老师id',
  `college_level` tinyint(3) NOT NULL DEFAULT '0' COMMENT '学院优秀毕业论文，0=否，1=是',
  `school_level` tinyint(3) NOT NULL DEFAULT '0' COMMENT '校优秀论文，0=否，1=是',
  `document` varchar(255) DEFAULT NULL COMMENT '文件夹名',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='学生信息表';

#
# Data for table "student"
#

INSERT INTO `student` VALUES (1,'杜春泽',120120201,1,4,2019,1,0,0,'72ad866bba89449a570063f6e178d6a4','2018-05-02 18:24:51','2018-05-05 14:15:36',NULL),(2,'测试',123456,1,1,2019,1,0,1,'cf6e3feb0f77e2d16e791db657742133','2018-05-05 12:30:35','2018-05-05 13:34:04',NULL);

#
# Structure for table "teacher"
#

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '姓名',
  `title_id` int(11) NOT NULL DEFAULT '0' COMMENT '职称id',
  `department_id` int(11) NOT NULL DEFAULT '0' COMMENT '院系id',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='教师表';

#
# Data for table "teacher"
#

INSERT INTO `teacher` VALUES (1,'张三',3,3,'2018-03-17 12:59:37','2018-03-17 12:59:37',NULL);

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `auth_key` varchar(255) DEFAULT NULL,
  `role` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '账户角色，0表示管理员，1表示普通用户',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='用户表';

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'admin','$2y$13$H7c7Lein.RRIAKv12wE6q.7mV5IxHHMneD.L6efZQuzT57xS.HKCO','ZBxvxpGzFsUxRD1iQdcVSWThtKUFMtDJ',0,'2018-03-10 15:57:48','2018-03-10 15:57:48',NULL),(3,'crr','$2y$13$4lfmEc4KN7nMvXb52mRWZO2V3D0IGJ7g0nsYQF7BuIDTo2buRJIN6','eOFtqt0jocuVWU2SUXNmBHmFixAmXVHK',0,'2018-05-01 15:57:34','2018-05-01 15:57:34',NULL);
