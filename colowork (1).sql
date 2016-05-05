-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2016 a las 09:07:50
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `colowork`
--

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `alumnos_competencias`
--
CREATE TABLE IF NOT EXISTS `alumnos_competencias` (
`idalumno` int(11)
,`nombre` varchar(50)
,`idcompetencia` int(11)
,`nomCom` varchar(300)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `col_actividades`
--

CREATE TABLE IF NOT EXISTS `col_actividades` (
  `idactividad` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `col_actividades`
--

INSERT INTO `col_actividades` (`idactividad`, `nombre`) VALUES
(1, 'Agroalimentario'),
(2, 'Automocion y Componentes'),
(3, 'Aministracion Publica'),
(4, 'Comunicacion'),
(5, 'Comercio-Distribuicion'),
(6, 'Construccion-Contratas'),
(7, 'Consultoria y RRHH'),
(8, 'Consultoria Tecnologica'),
(9, 'Energetico'),
(10, 'Enseñanza-Formacion'),
(11, 'Farmaceutico'),
(12, 'Financieras'),
(13, 'Hardware Sistemas de Telecomunicaciones'),
(14, 'Hardware Sistemas de Informatica'),
(15, 'Hosteleria'),
(16, 'Madera-Mueble'),
(17, 'Metalurgia'),
(18, 'Sanitario'),
(19, 'Software'),
(20, 'Servicios'),
(21, 'Servicios de Telecomunicacion'),
(22, 'Servicios de Informatica'),
(23, 'Servicios del Valor Añadido'),
(24, 'Servicios Audiovisuales y Multimedia'),
(25, 'Servicios de Mantenimiento'),
(26, 'Transporte'),
(27, 'Textil'),
(28, 'Otras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `col_alumnos`
--

CREATE TABLE IF NOT EXISTS `col_alumnos` (
  `idalumno` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nacionalidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `transporte` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `experiencia` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `titulos` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `idiomas` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `otros` varchar(500) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `col_alumnos`
--

INSERT INTO `col_alumnos` (`idalumno`, `nombre`, `apellidos`, `sexo`, `direccion`, `correo`, `nacionalidad`, `fecha`, `estado`, `transporte`, `experiencia`, `titulos`, `idiomas`, `otros`) VALUES
(1, 'antonio', 'delgado moreira', 'Hombre', 'asd', 'asda@asda.com', 'español', '12/12/1999', 'Estudiando', 'Si', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adip', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adip', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adip', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adip'),
(2, 'oscar', 'delgado moreira', 'Hombre', 'asd', 'asda@asda.com', 'español', '12/12/1999', 'Parado', 'No', 'dasdasdasdas', 'DAW.SMX.FPB.', 'dasdasdasdasdasdasdas', 'dasdasdas'),
(7, 'sergiodasd', 'delgado moreira', 'Hombre', 'asd', 'dsasd@sd.com', 'español', '12/12/1999', 'Estudiando', 'Si', 'adsasd', 'DAW.SMX.FPB.', 'dasdas', 'asdas'),
(8, 'pepito', 'delgado moreira', 'Hombre', 'asd', 'coloworkdaw@gmail.com', 'español', '12/12/1999', 'Parado', 'No', 'qweqew', 'DAW', 'qweqwe', 'qweqweq'),
(9, 'pepitos', 'delgado moreira', 'Hombre', 'asd', 'sergio95valde@gmail.com', 'español', '12/12/1999', 'Parado', 'No', '', 'DAW.SMX', '', ''),
(10, 'pepitt', 'delgado moreira', 'Hombre', 'asd', 'travian-arnoll@hotmail.com', 'español', '12/12/1999', 'Parado', 'No', '', 'SMX', '', ''),
(11, 'admin', 'dasdasddas', 'Hombre', 'dasdasda', 'example@loquesea.algo', 'españa', '12/12/1999', 'Parado', 'No', 'asdassd', 'DAW', 'asdasd', 'asdasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `col_alum_ciclo`
--

CREATE TABLE IF NOT EXISTS `col_alum_ciclo` (
  `idalumno` int(11) NOT NULL,
  `idciclo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `col_alum_ciclo`
--

INSERT INTO `col_alum_ciclo` (`idalumno`, `idciclo`) VALUES
(1, 7),
(7, 7),
(8, 7),
(9, 7),
(11, 7),
(7, 8),
(9, 8),
(10, 8),
(7, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `col_ciclos`
--

CREATE TABLE IF NOT EXISTS `col_ciclos` (
  `idciclo` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `abreviatura` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `col_ciclos`
--

INSERT INTO `col_ciclos` (`idciclo`, `nombre`, `abreviatura`, `descripcion`) VALUES
(7, 'Diseño de Aplicaciones WEB', 'DAW', 'Desarrollar, implantar, y mantener aplicaciones web, con independencia del modelo empleado y utilizando tecnologías específicas, garantizando el acceso a los datos de forma segura y cumpliendo los criterios de accesibilidad, usabilidad y calidad exigidas en los estándares establecidos.'),
(8, 'Sistemas Microinformáticos y Redes', 'SMX', 'La competencia general de este título consiste en instalar, configurar y mantener sistemas microinformáticos, aislados o en red, así como redes locales en pequeños entornos, asegurando su funcionalidad y aplicando los protocolos de calidad, seguridad y respeto al medio ambiente establecidos .'),
(14, 'Montaje y mantenimiento de sistemas y componentes informáticos', 'FPB', 'La competencia general de este título consiste en instalar, configurar y mantener sistemas microinformáticos, aislados o en red, así como redes locales en pequeños entornos, asegurando su funcionalidad y aplicando los protocolos de calidad, seguridad y respeto al medio ambiente establecidos .');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `col_codigos`
--

CREATE TABLE IF NOT EXISTS `col_codigos` (
  `idcodigo` int(11) NOT NULL,
  `nombre_centro` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigo` varchar(7) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `col_codigos`
--

INSERT INTO `col_codigos` (`idcodigo`, `nombre_centro`, `codigo`) VALUES
(1, 'IES Sacolomina', 'Q2W3E4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `col_competencias`
--

CREATE TABLE IF NOT EXISTS `col_competencias` (
  `idcompetencia` int(11) NOT NULL,
  `nombre` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `idciclo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `col_competencias`
--

INSERT INTO `col_competencias` (`idcompetencia`, `nombre`, `idciclo`) VALUES
(1, 'Realizar operaciones auxiliares de montaje de equipos microinformáticos', 14),
(2, 'Realizar operaciones auxiliares de mantenimiento de sistemas microinformáticos', 14),
(3, 'Realizar operaciones auxiliares con tecnologías de la información y comunicación', 14),
(4, 'Realizar operaciones de ensamblado en el montaje de equipos eléctricos y electrónicos', 14),
(5, 'Realizar operaciones de conexionado en el montaje de equipos eléctricos y electrónicos', 14),
(6, 'Realizar operaciones auxiliares en el mantenimiento de equipos eléctricos y electrónicos', 14),
(8, 'Configurar y explotar sistemas informáticos, adaptando la configuración lógica del sistema según las necesidades de uso y los criterios establecidos', 7),
(9, 'Aplicar técnicas y procedimientos relacionados con la seguridad en sistemas, servicios y aplicaciones, cumpliendo el plan de seguridad', 7),
(10, 'Gestionar servidores de aplicaciones adaptando su configuración en cada caso para permitir el despliegue de aplicaciones web', 7),
(11, 'Gestionar bases de datos, interpretando su diseño lógico y verificando integridad, consistencia, seguridad y accesibilidad de los datos', 7),
(12, 'Desarrollar aplicaciones web con acceso a bases de datos utilizando lenguajes, objetos de acceso y herramientas de mapeo adecuados a las especificaciones', 7),
(13, 'Integrar contenidos en la lógica de una aplicación web, desarrollando componentes de acceso a datos adecuados a las especificaciones', 7),
(14, 'Desarrollar interfaces en aplicaciones web de acuerdo con un manual de estilo, utilizando lenguajes de marcas y estándares web', 7),
(15, 'Desarrollar componentes multimedia para su integración en aplicaciones web, empleando herramientas específicas y siguiendo las especificaciones establecidas', 7),
(16, 'Integrar componentes multimedia en el interface de una aplicación web, realizando el análisis de interactividad, accesibilidad y usabilidad de la aplicación', 7),
(17, 'Desarrollar e integrar componentes software en el entorno del servidor web, empleando herramientas y lenguajes específicos, para cumplir las especificaciones de la aplicación', 7),
(18, 'Desarrollar servicios para integrar sus funciones en otras aplicaciones web, asegurando su funcionalidad', 7),
(19, 'Integrar servicios y contenidos distribuidos en aplicaciones web, asegurando su funcionalidad', 7),
(21, 'Montar equipos microinformáticos', 8),
(22, 'Reparar y ampliar el equipamiento informático', 8),
(23, 'Instalar y configurar el software base en sistemas microinformáticos', 8),
(24, 'Ejecutar procedimientos de administración y mantenimiento en el software base y de aplicación de clientes', 8),
(25, 'Instalar , configurar y mantener paquetes informáticos de propósito general y aplicaciones específicas, facilitando al usuario su utilización', 8),
(26, 'Realizar los procesos de conexión entre redes privadas y redes públicas', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `col_contratos`
--

CREATE TABLE IF NOT EXISTS `col_contratos` (
  `idcontrato` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `col_contratos`
--

INSERT INTO `col_contratos` (`idcontrato`, `nombre`) VALUES
(1, 'Indefinido'),
(2, 'Temporal'),
(3, 'Formacion'),
(4, 'Practicas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `col_empresas`
--

CREATE TABLE IF NOT EXISTS `col_empresas` (
  `idempresa` int(3) NOT NULL,
  `user` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `actividad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `idfiscal` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `razon` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `poblacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pais` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `provincia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codpostal` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(10) NOT NULL,
  `fax` int(20) NOT NULL,
  `ofertas` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cod_act` varchar(22) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `col_empresas`
--

INSERT INTO `col_empresas` (`idempresa`, `user`, `nombre`, `actividad`, `idfiscal`, `razon`, `direccion`, `poblacion`, `pais`, `provincia`, `codpostal`, `telefono`, `fax`, `ofertas`, `correo`, `cod_act`) VALUES
(15, 'miguel', 'Empresa Prueba', 'Hardware Sistemas de Informatica', '000000', 'Practicas', 'Sant jaime', 'Santa Eualia des Riu', 'España', 'Islas Baleares', '7840', 648737309, 648737309, 'si', '', ''),
(16, 'sergio', 'qweqweqw', 'Hardware Sistemas de Informatica', '111111', 'qqqqqq', 'qqqqq', 'qqqq', 'qqqqq', 'qqqqqq', '07840', 987456321, 111111111, 'si', 'example@loquesea.algo', ''),
(22, 'tikka', 'tikka', 'Agroalimentario', '135792', 'qwe', 'Sant jaime', 'asd', 'España', 'Islas Baleares', '28341', 987456321, 2147483647, 'si', '', ''),
(25, 'empruebas', 'emppruebas', 'Agroalimentario', '143456', 'Practicas', 'asd', 'asd', 'asd', 'asd', '28341', 987456321, 2147483647, 'no', 'example@loquesea.algo', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `col_jornadas`
--

CREATE TABLE IF NOT EXISTS `col_jornadas` (
  `idjornada` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `col_jornadas`
--

INSERT INTO `col_jornadas` (`idjornada`, `nombre`) VALUES
(1, 'Tiempo Completo'),
(2, 'Tiempo Parcial'),
(3, 'Parcial por Horas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `col_ofertas`
--

CREATE TABLE IF NOT EXISTS `col_ofertas` (
  `idoferta` int(3) NOT NULL,
  `idempresa` int(3) NOT NULL,
  `titulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `contrato` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `jornada` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `salario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `competencias` varchar(8000) COLLATE utf8_spanish_ci NOT NULL,
  `activa` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `cod_act` varchar(22) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `col_ofertas`
--

INSERT INTO `col_ofertas` (`idoferta`, `idempresa`, `titulo`, `descripcion`, `ubicacion`, `contrato`, `jornada`, `salario`, `competencias`, `activa`, `cod_act`) VALUES
(7, 16, 'pruebaSMX', 'sdasdas', 'dasda', 'Indefinido', 'Tiempo Completo', 'No especificado', 'Instalar y configurar el software base en sistemas microinformáticos.Instalar , configurar y mantener paquetes informáticos de propósito general y aplicaciones específicas, facilitando al usuario su utilización', 'si', ''),
(16, 16, 'Informaticosda', 'adsdasdas', 'asdasg', 'Indefinido', 'Tiempo Completo', 'No especificado', 'Realizar operaciones auxiliares de montaje de equipos microinformáticos.Realizar operaciones auxiliares de mantenimiento de sistemas microinformáticos.Realizar operaciones auxiliares con tecnologías de la información y comunicación', 'no', 'c6a024f688cd57cf6fd4'),
(17, 16, 'Otra massda', 'adsdasdas', 'dasdasd', 'Indefinido', 'Tiempo Completo', 'No especificado', 'Realizar operaciones auxiliares de montaje de equipos microinformáticos', 'no', '17326d10d511828f6b34'),
(18, 16, 'Pruebaqwss', 'asdasd', 'asdas', 'Indefinido', 'Tiempo Completo', 'No especificado', 'Desarrollar aplicaciones web con acceso a bases de datos utilizando lenguajes, objetos de acceso y herramientas de mapeo adecuados a las especificaciones', 'no', '5847c1b5bad36912f130');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `col_oferta_competencia`
--

CREATE TABLE IF NOT EXISTS `col_oferta_competencia` (
  `idoferta` int(11) NOT NULL,
  `idcompetencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `col_oferta_competencia`
--

INSERT INTO `col_oferta_competencia` (`idoferta`, `idcompetencia`) VALUES
(7, 23),
(7, 25),
(16, 1),
(16, 2),
(16, 3),
(17, 1),
(18, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `col_profesores`
--

CREATE TABLE IF NOT EXISTS `col_profesores` (
  `idprofesor` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ocupacion` varchar(500) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `col_profesores`
--

INSERT INTO `col_profesores` (`idprofesor`, `nombre`, `apellidos`, `correo`, `ocupacion`) VALUES
(8, 'profesor', 'asdahjj', 'asda@asda.com', 'asdasaeqweqweq');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `col_roles`
--

CREATE TABLE IF NOT EXISTS `col_roles` (
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `col_roles`
--

INSERT INTO `col_roles` (`nombre`) VALUES
('centro'),
('alumno'),
('empresa'),
('admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `col_salarios`
--

CREATE TABLE IF NOT EXISTS `col_salarios` (
  `idsalario` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `col_salarios`
--

INSERT INTO `col_salarios` (`idsalario`, `nombre`) VALUES
(1, 'No especificado'),
(2, 'Menos de 9.000'),
(3, 'Entre 9.000 y 15.000'),
(4, 'Entre 15.000 y 20.000'),
(5, 'Mas de 20.000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `col_usuarios`
--

CREATE TABLE IF NOT EXISTS `col_usuarios` (
  `iduser` int(3) NOT NULL,
  `user` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `rol` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `col_usuarios`
--

INSERT INTO `col_usuarios` (`iduser`, `user`, `pass`, `rol`) VALUES
(6, 'sergio', '12345678', 'empresa'),
(7, 'admin', '12345678', 'admin'),
(25, 'antonio', '12345678', 'alumno'),
(37, 'tikka', '12345678a', 'empresa'),
(42, 'sergioasd', '12346578', 'alumno'),
(45, 'empruebas', '123456789', 'empresa'),
(46, 'pepito', '12345678', 'alumno'),
(47, 'pepitos', '12345678', 'alumno'),
(48, 'pepitt', '12345678', 'alumno'),
(58, 'papa', '123456789q', 'empresa'),
(61, 'profesor', '12345678', 'centro');

-- --------------------------------------------------------

--
-- Estructura para la vista `alumnos_competencias`
--
DROP TABLE IF EXISTS `alumnos_competencias`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `alumnos_competencias` AS select `col_alumnos`.`idalumno` AS `idalumno`,`col_alumnos`.`nombre` AS `nombre`,`col_competencias`.`idcompetencia` AS `idcompetencia`,`col_competencias`.`nombre` AS `nomCom` from ((`col_alumnos` join `col_alum_ciclo` on((`col_alumnos`.`idalumno` = `col_alum_ciclo`.`idalumno`))) join `col_competencias` on((`col_alum_ciclo`.`idciclo` = `col_competencias`.`idciclo`)));

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `col_actividades`
--
ALTER TABLE `col_actividades`
  ADD PRIMARY KEY (`idactividad`);

--
-- Indices de la tabla `col_alumnos`
--
ALTER TABLE `col_alumnos`
  ADD PRIMARY KEY (`idalumno`);

--
-- Indices de la tabla `col_alum_ciclo`
--
ALTER TABLE `col_alum_ciclo`
  ADD PRIMARY KEY (`idalumno`,`idciclo`),
  ADD KEY `idciclo` (`idciclo`);

--
-- Indices de la tabla `col_ciclos`
--
ALTER TABLE `col_ciclos`
  ADD PRIMARY KEY (`idciclo`);

--
-- Indices de la tabla `col_codigos`
--
ALTER TABLE `col_codigos`
  ADD PRIMARY KEY (`idcodigo`);

--
-- Indices de la tabla `col_competencias`
--
ALTER TABLE `col_competencias`
  ADD PRIMARY KEY (`idcompetencia`);

--
-- Indices de la tabla `col_contratos`
--
ALTER TABLE `col_contratos`
  ADD PRIMARY KEY (`idcontrato`);

--
-- Indices de la tabla `col_empresas`
--
ALTER TABLE `col_empresas`
  ADD PRIMARY KEY (`idempresa`);

--
-- Indices de la tabla `col_jornadas`
--
ALTER TABLE `col_jornadas`
  ADD PRIMARY KEY (`idjornada`);

--
-- Indices de la tabla `col_ofertas`
--
ALTER TABLE `col_ofertas`
  ADD PRIMARY KEY (`idoferta`);

--
-- Indices de la tabla `col_oferta_competencia`
--
ALTER TABLE `col_oferta_competencia`
  ADD PRIMARY KEY (`idoferta`,`idcompetencia`);

--
-- Indices de la tabla `col_profesores`
--
ALTER TABLE `col_profesores`
  ADD PRIMARY KEY (`idprofesor`);

--
-- Indices de la tabla `col_salarios`
--
ALTER TABLE `col_salarios`
  ADD PRIMARY KEY (`idsalario`);

--
-- Indices de la tabla `col_usuarios`
--
ALTER TABLE `col_usuarios`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `col_actividades`
--
ALTER TABLE `col_actividades`
  MODIFY `idactividad` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `col_alumnos`
--
ALTER TABLE `col_alumnos`
  MODIFY `idalumno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `col_ciclos`
--
ALTER TABLE `col_ciclos`
  MODIFY `idciclo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `col_codigos`
--
ALTER TABLE `col_codigos`
  MODIFY `idcodigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `col_competencias`
--
ALTER TABLE `col_competencias`
  MODIFY `idcompetencia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `col_contratos`
--
ALTER TABLE `col_contratos`
  MODIFY `idcontrato` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `col_empresas`
--
ALTER TABLE `col_empresas`
  MODIFY `idempresa` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `col_jornadas`
--
ALTER TABLE `col_jornadas`
  MODIFY `idjornada` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `col_ofertas`
--
ALTER TABLE `col_ofertas`
  MODIFY `idoferta` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `col_profesores`
--
ALTER TABLE `col_profesores`
  MODIFY `idprofesor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `col_salarios`
--
ALTER TABLE `col_salarios`
  MODIFY `idsalario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `col_usuarios`
--
ALTER TABLE `col_usuarios`
  MODIFY `iduser` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `col_alum_ciclo`
--
ALTER TABLE `col_alum_ciclo`
  ADD CONSTRAINT `col_alum_ciclo_ibfk_1` FOREIGN KEY (`idalumno`) REFERENCES `col_alumnos` (`idalumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `col_alum_ciclo_ibfk_2` FOREIGN KEY (`idciclo`) REFERENCES `col_ciclos` (`idciclo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `col_oferta_competencia`
--
ALTER TABLE `col_oferta_competencia`
  ADD CONSTRAINT `col_oferta_competencia_ibfk_1` FOREIGN KEY (`idoferta`) REFERENCES `col_ofertas` (`idoferta`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
