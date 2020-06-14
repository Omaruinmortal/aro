/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.10-MariaDB : Database - aro
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`aro` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;

USE `aro`;

/*Table structure for table `tbl_antenas_ap` */

DROP TABLE IF EXISTS `tbl_antenas_ap`;

CREATE TABLE `tbl_antenas_ap` (
  `id_antena_ap` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_antena_ap` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `modelo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `mac_antena_ap` varchar(17) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_comunidad` int(11) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `ultima_actualizacion` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `visible` int(1) DEFAULT 1,
  PRIMARY KEY (`id_antena_ap`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbl_antenas_ap` */

insert  into `tbl_antenas_ap`(`id_antena_ap`,`nombre_antena_ap`,`modelo`,`mac_antena_ap`,`id_comunidad`,`fecha_registro`,`ultima_actualizacion`,`visible`) values 
(1,'SECTORIAL CAJONES 1','ROCKET LITE 5AC 5GHZ','BF:FB:E4:53:43:77',1,'2020-06-12 22:45:25','2020-06-12 22:45:28',1),
(2,'SECTORIAL CAJONES 2','ROCKET 5AC PTP 5GHZ','44:D9:E7:26:BF:DE',1,'2020-06-12 22:45:25','2020-06-12 22:45:29',1),
(3,'SANTA ANA MINERAL','ROCKET LITE 5AC 5GHZ','B4:FB:E4:5A:D8:0F',16,'2020-06-12 22:45:25','2020-06-12 22:45:29',1),
(4,'LLANOS SECTORIAL','LITEBEAM AP AC 5GHZ','18:E8:29:74:4B:F0',15,'2020-06-12 22:45:25','2020-06-12 22:45:30',1),
(5,'SECTORIAL BALCONES OMNI','ROCKET LITE 5AC 5GHZ','F0:9F:C2:50:31:26',13,'2020-06-12 22:45:25','2020-06-12 22:45:30',1),
(6,'AP CAÑADA/CAPULIN','LITEBEAM AC 5GHZ GEN2','78:8A:20:CC:BA:53',2,'2020-06-12 22:45:25','2020-06-12 22:45:30',1),
(7,'AP CARCAMO/CARCAMO','LITEBEAM AC 5GHZ GEN2','78:8A:20:30:D1:F9',2,'2020-06-12 22:45:25','2020-06-12 22:45:31',1),
(8,'SECTORIAL CHARQUITO','LITEBEAM AP AC 5GHZ','78:8A:20:6C:9A:02',8,'2020-06-12 22:45:25','2020-06-12 22:45:31',1),
(9,'SECTORIAL PUERTO','ROCKET LITE 5AC 5GHZ','FC:EC:DA:6C:BD:43',2,'2020-06-12 22:45:25','2020-06-12 22:45:31',1),
(10,'AP SCVIAL','POWERBEAM AC 5GHZ','80:2A:A8:E8:34:9D',12,'2020-06-12 22:45:25','2020-06-12 22:45:32',1),
(11,'AP TELESECUNDARIA PERULES','LITEBEAM AC AC 5GHZ','80:2A:A8:FE:87:7D',12,'2020-06-12 22:45:25','2020-06-12 22:45:32',1),
(12,'SECTORIAL CAÑADA 2GHZ','ROCKET 2AC PRISM','F0:9F:C2:EC:AE:B9',2,'2020-06-12 22:45:25','2020-06-12 22:45:32',1),
(13,'SECTORIAL CAÑADA 5GHZ','ROCKET 5AC LITE','80:2A:A8:FE:5A:EA',2,'2020-06-12 22:45:25','2020-06-12 22:45:33',1),
(14,'SECTORIAL CAÑANA OMNI','ROCKET 5AC LITE','FC:EC:DA:6C:BC:4F',2,'2020-06-12 22:45:25','2020-06-12 22:45:33',1),
(15,'AP CAÑADA/OMAR','LITEBEAM AC 5GHZ GEN2','80:2A:A8:FE:5A:EA',2,'2020-06-12 22:45:25','2020-06-12 22:45:33',1),
(16,'AP CYBER ALE','LITEBEAM AC AC 5GHZ','?',2,'2020-06-12 22:45:25','2020-06-12 22:45:34',1),
(17,'AP CYBER CARLITOS','LITEBEAM AC AC 5GHZ','FC:EC:DA:5E:29:98',2,'2020-06-12 22:45:25','2020-06-12 22:45:34',1);

/*Table structure for table `tbl_clientes` */

DROP TABLE IF EXISTS `tbl_clientes`;

CREATE TABLE `tbl_clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `primer_apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `segundo_apellido` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `celular` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `domicilio` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `visible` int(1) DEFAULT 1 COMMENT '1 = activo, 0 = desactivado',
  `fecha_registro` datetime DEFAULT NULL,
  `ultima_actualizacin` timestamp NULL DEFAULT current_timestamp(),
  `id_paquete` int(11) NOT NULL,
  `id_comunidad` int(11) NOT NULL,
  `fecha_instalacion` datetime DEFAULT NULL,
  `id_antena_ap` int(11) DEFAULT 0,
  `mac_antena_cliente` varchar(17) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbl_clientes` */

insert  into `tbl_clientes`(`id_cliente`,`nombre`,`primer_apellido`,`segundo_apellido`,`celular`,`domicilio`,`visible`,`fecha_registro`,`ultima_actualizacin`,`id_paquete`,`id_comunidad`,`fecha_instalacion`,`id_antena_ap`,`mac_antena_cliente`) values 
(1,'MARIA','RAMIREZ','ELENA','4731415860','CAJONES',1,'2020-06-05 02:08:36',NULL,1,1,NULL,0,NULL),
(2,'JUAN GABRIEL ','TOVAR ','GONZALEZ','4731371215','ATRAS DE CAPILLA',1,'2020-06-05 02:13:51',NULL,1,1,NULL,0,NULL),
(3,'ULISES','AGUIRRE','LONA','4731217221','TIENDA POR CAPILLA',1,'2020-06-05 02:15:05',NULL,1,1,NULL,0,NULL),
(4,'EDITH','MONTSERRAT','ZAVALA','4731103258','ENFRENTE DE TIENDA CAPILLA',1,'2020-06-05 02:15:40',NULL,1,1,NULL,0,NULL),
(5,'SUSANA','CANO','','4731019438','CUÑADA DE JOSE LUIS',1,'2020-06-05 02:16:05',NULL,1,1,NULL,0,NULL),
(6,'MARISOL','GAYTAN','GUEVARA','4731126905','ATRAS DE CAPILLA',1,'2020-06-05 02:16:39',NULL,1,1,NULL,0,NULL),
(7,'SOCORRO','PALAFOX','','4737370930','ATRAS DE CASA DE SUSANA',1,'2020-06-05 02:17:32',NULL,1,1,NULL,0,NULL),
(9,'JOSE','GUADALUPE','MARTINEZ','4737375596','LLANOS DE SANTA ANA ABAJO DE TOSTADAS',1,'2020-06-06 01:22:11','2020-06-06 01:22:11',1,15,NULL,0,NULL),
(10,'LILIANA','OLMOS','MORENO','4731240496','CASA BLANCA CURVA MAESTRA',1,'2020-06-06 01:23:18','2020-06-06 01:23:18',1,15,NULL,0,NULL),
(11,'VICTOR DE JESUS','RIOS','RODRIGUEZ','4731011525','PUENTE DE LLANOS PRIMER CASA A LA IZQUIERDA',1,'2020-06-06 01:26:55','2020-06-06 01:26:55',1,15,NULL,0,NULL),
(12,'GABRIELA ','IBARRA','JASSO','4731810867','LLANOS CASA DESPUES DE TOSTADAS PIPA',1,'2020-06-06 01:38:48','2020-06-06 01:38:48',1,15,NULL,0,NULL);

/*Table structure for table `tbl_comunidades` */

DROP TABLE IF EXISTS `tbl_comunidades`;

CREATE TABLE `tbl_comunidades` (
  `id_comunidad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_comunidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `visible` int(1) DEFAULT 1,
  `fecha_registro` datetime DEFAULT NULL,
  `ultima_actualizacin` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_comunidad`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbl_comunidades` */

insert  into `tbl_comunidades`(`id_comunidad`,`nombre_comunidad`,`visible`,`fecha_registro`,`ultima_actualizacin`) values 
(1,'CAJONES',1,'2020-06-05 02:30:51','2020-06-05 02:30:56'),
(2,'CAÑADA DE BUSTOS',1,'2020-06-05 02:30:51','2020-06-05 02:30:57'),
(3,'CAPULIN DE BUSTOS',1,'2020-06-05 02:30:51','2020-06-05 02:30:58'),
(4,'CARCAMO',1,'2020-06-05 02:30:51','2020-06-05 02:30:58'),
(5,'CARBONERA',1,'2020-06-05 02:30:51','2020-06-05 02:30:59'),
(6,'CIENEGA DEL PEDREGAL',1,'2020-06-05 02:30:51','2020-06-05 02:31:00'),
(7,'SANTA CATARINA DE CUEVAS',1,'2020-06-05 02:30:51','2020-06-05 02:31:00'),
(8,'CHARQUITO',1,'2020-06-05 02:30:51','2020-06-05 02:31:01'),
(9,'LA PRESITA',1,'2020-06-05 02:30:51','2020-06-05 02:31:02'),
(10,'YERBABUENA',1,'2020-06-05 02:30:51','2020-06-05 02:31:02'),
(11,'PASO DE PIRULES',1,'2020-06-05 02:30:51','2020-06-05 02:31:03'),
(12,'VILLAS DE GUANAJUATO',1,'2020-06-05 02:30:51','2020-06-05 02:31:04'),
(13,'BALCONES DE SANTA FE',1,'2020-06-05 02:30:51','2020-06-05 02:31:05'),
(14,'SANTA TERESA',1,'2020-06-05 02:30:51','2020-06-05 02:31:06'),
(15,'LLANOS DE SANTA ANA',1,'2020-06-05 02:30:51','2020-06-05 02:31:06'),
(16,'MINERAL DE SANTA ANA',1,'2020-06-05 02:30:51','2020-06-05 02:31:07'),
(17,'PUENTECILLAS',1,'2020-06-12 22:13:45','2020-06-12 22:13:47'),
(18,'TACUBAYA',1,'2020-06-12 22:13:43','2020-06-12 22:13:45');

/*Table structure for table `tbl_estado_pago` */

DROP TABLE IF EXISTS `tbl_estado_pago`;

CREATE TABLE `tbl_estado_pago` (
  `id_estado_pago` int(11) NOT NULL AUTO_INCREMENT,
  `estado_pago` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_estado_pago`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbl_estado_pago` */

insert  into `tbl_estado_pago`(`id_estado_pago`,`estado_pago`) values 
(1,'PENDIENTE'),
(2,'PAGADO'),
(3,'NO PAGADO');

/*Table structure for table `tbl_pagos` */

DROP TABLE IF EXISTS `tbl_pagos`;

CREATE TABLE `tbl_pagos` (
  `id_pago` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_estado_pago` int(11) DEFAULT 1 COMMENT '2 = pagado, 3 no pago, 1 pendiente',
  `observacion` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `comprobante_pago` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_usuario_registro` int(11) DEFAULT NULL,
  `fecha_actualizacion` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_pago`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbl_pagos` */

insert  into `tbl_pagos`(`id_pago`,`id_cliente`,`fecha_registro`,`id_estado_pago`,`observacion`,`comprobante_pago`,`id_usuario_registro`,`fecha_actualizacion`) values 
(1,1,'2020-06-01 00:02:00',1,'','',NULL,'2020-06-09 22:56:02'),
(2,2,'2020-06-01 00:02:00',1,'','',NULL,'2020-06-08 21:37:09'),
(3,3,'2020-06-01 00:02:00',1,'','',NULL,'2020-06-08 21:37:08'),
(4,4,'2020-06-01 00:02:00',1,'','',NULL,'2020-06-08 21:37:08'),
(5,5,'2020-06-01 00:02:00',1,'','',NULL,'2020-06-08 21:13:58'),
(6,6,'2020-06-01 00:02:00',1,'','',NULL,'2020-06-09 22:55:55'),
(7,7,'2020-06-01 00:02:00',1,'','',NULL,'2020-06-08 21:13:58'),
(8,9,'2020-06-01 00:02:00',2,'PAGO 126','e6c55ac0df4f597e07629c9369eb067a.jpg',1,'2020-06-09 22:56:58'),
(9,10,'2020-06-01 00:02:00',1,'','',NULL,'2020-06-08 21:37:07'),
(10,11,'2020-06-01 00:02:00',1,'','',NULL,'2020-06-08 21:37:06'),
(11,12,'2020-06-01 00:02:00',1,'','',NULL,'2020-06-09 22:56:00');

/*Table structure for table `tbl_paquetes` */

DROP TABLE IF EXISTS `tbl_paquetes`;

CREATE TABLE `tbl_paquetes` (
  `id_paquete` int(11) NOT NULL AUTO_INCREMENT,
  `paquete` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `precio` decimal(6,2) DEFAULT NULL,
  `velocidad` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `ultima_actualizacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `visible` int(1) DEFAULT 1,
  PRIMARY KEY (`id_paquete`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbl_paquetes` */

insert  into `tbl_paquetes`(`id_paquete`,`paquete`,`precio`,`velocidad`,`fecha_registro`,`ultima_actualizacion`,`visible`) values 
(1,'BASICO 5MB',399.00,'5 MB',NULL,'2020-06-05 03:04:42',1),
(2,'CYBER 10MB',600.00,'10 MB',NULL,'2020-06-05 02:36:54',1),
(3,'CYBER 20MB',800.00,'20 MB',NULL,'2020-06-05 02:37:06',1),
(4,'EMPRESARIAL',1800.00,'100 MB',NULL,'2020-06-05 02:37:21',1);

/*Table structure for table `tbl_usuarios` */

DROP TABLE IF EXISTS `tbl_usuarios`;

CREATE TABLE `tbl_usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `primer_apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `segundo_apellido` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuario` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `contrasenia` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `ultima_actualizacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `visible` int(1) NOT NULL DEFAULT 1 COMMENT '1 activo, 2 desactivo',
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbl_usuarios` */

insert  into `tbl_usuarios`(`id_usuario`,`nombre`,`primer_apellido`,`segundo_apellido`,`usuario`,`contrasenia`,`fecha_registro`,`ultima_actualizacion`,`visible`) values 
(1,'OMAR','MARTINEZ','TORRES','omaru','1b256e48d032f94db07fdec6a4c5902f','2020-06-03 00:43:36','2020-06-03 01:51:54',1),
(2,'RICARDO','MEZA',NULL,'ricardo','6a7224e84bab0f347cf77ed2f1cb105d','2020-06-12 22:52:43','2020-06-12 22:53:04',1);

/*!50106 set global event_scheduler = 1*/;

/* Event structure for event `pago_mensual` */

/*!50106 DROP EVENT IF EXISTS `pago_mensual`*/;

DELIMITER $$

/*!50106 CREATE DEFINER=`root`@`localhost` EVENT `pago_mensual` ON SCHEDULE EVERY 1 MONTH STARTS '2020-07-01 00:02:00' ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO tbl_pagos (id_cliente) SELECT id_cliente  FROM tbl_clientes where visible=1 */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
