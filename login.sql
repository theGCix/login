CREATE TABLE `usuarios` (
  `id` int AUTO_INCREMENT PRIMARY KEY,
  `nombres` text COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `correo` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci,
  `estado` int(11) DEFAULT(0),
  `token` int,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `usuarios` 
(`nombres`,`apellidos`,`usuario`,`password`,`correo`,`perfil`)
VALUES
('Giancarlo','Ruiz Prieto','gian','123','gian170399_ruiz@hotmail.com','Administrador');