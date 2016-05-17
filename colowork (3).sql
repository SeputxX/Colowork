-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2016 a las 09:13:02
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
  `iduser` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nacionalidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `transporte` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `otros` varchar(500) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `col_alumnos`
--

INSERT INTO `col_alumnos` (`iduser`, `nombre`, `apellidos`, `sexo`, `direccion`, `correo`, `nacionalidad`, `fecha`, `estado`, `transporte`, `otros`) VALUES
(28, 'miguel', 'Roig Moral', 'Hombre', 'asd', 'asda@asda.com', 'español', '12/12/1999', 'Parado', 'No', 'eqweq'),
(39, 'sergio', 'delgado moreira', 'Hombre', 'asd', 'asda@asda.com', 'español', '12/12/1999', 'Parado', 'No', 'sdasdas'),
(40, 'sergio', 'delgado moreira', 'Hombre', 'asd', 'asda@asda.com', 'español', '12/12/1999', 'Parado', 'No', 'sdasdas'),
(41, 'sergio', 'delgado moreira', 'Mujer', 'asd', 'asda@asda.com', 'español', '12/12/1999', 'Parado', 'No', 'sdasdas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `col_alum_ciclo`
--

CREATE TABLE IF NOT EXISTS `col_alum_ciclo` (
  `iduser` int(11) NOT NULL,
  `idciclo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `col_alum_ciclo`
--

INSERT INTO `col_alum_ciclo` (`iduser`, `idciclo`) VALUES
(28, 7),
(39, 7),
(40, 7),
(41, 7),
(28, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `col_alum_experiencia`
--

CREATE TABLE IF NOT EXISTS `col_alum_experiencia` (
  `iduser` int(11) NOT NULL,
  `finicio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ffinal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `col_alum_experiencia`
--

INSERT INTO `col_alum_experiencia` (`iduser`, `finicio`, `ffinal`, `descripcion`) VALUES
(39, '11/11/1998', '11/11/1998', 'asdasd'),
(40, '11/11/1998', '11/11/1998', 'asdasd'),
(41, '11/11/1998', '11/11/1998', 'asdasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `col_alum_idiomas`
--

CREATE TABLE IF NOT EXISTS `col_alum_idiomas` (
  `iduser` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nivel_hablado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nivel_escrito` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `col_alum_idiomas`
--

INSERT INTO `col_alum_idiomas` (`iduser`, `nombre`, `fecha`, `nivel_hablado`, `nivel_escrito`) VALUES
(28, 'Frances', '11/11/1996', 'Alto', 'Alto'),
(28, 'Catalan', '11/11/1995', 'Medio', 'Medio'),
(28, 'Ruso', '11/11/1995', 'Bajo', 'Bajo'),
(39, 'Aleman', '11/11/1998', 'Alto', 'Alto'),
(40, 'Aleman', '11/11/1998', 'Alto', 'Alto'),
(41, 'Aleman', '11/11/1998', 'Alto', 'Alto');

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
-- Estructura de tabla para la tabla `col_codigo_centro`
--

CREATE TABLE IF NOT EXISTS `col_codigo_centro` (
  `idcodigo` int(11) NOT NULL,
  `centro` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `codigo` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `col_codigo_centro`
--

INSERT INTO `col_codigo_centro` (`idcodigo`, `centro`, `codigo`) VALUES
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
-- Estructura de tabla para la tabla `col_empresas`
--

CREATE TABLE IF NOT EXISTS `col_empresas` (
  `iduser` int(3) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `col_empresas`
--

INSERT INTO `col_empresas` (`iduser`, `nombre`, `actividad`, `idfiscal`, `razon`, `direccion`, `poblacion`, `pais`, `provincia`, `codpostal`, `telefono`, `fax`, `ofertas`, `correo`, `cod_act`) VALUES
(4, 'tikkaqq', 'Agroalimentario', '123456', 'WWWW', 'wwwWW', 'WWWWW', 'ww', 'ww', '12345', 912222222, 88222222, 'si', 'tikka2@hotmail.com', '7a2ce833bb1b76f8b67e'),
(42, 'sergio', 'Agroalimentario', '123456', 'qwe', 'asd', 'asd', 'asd', 'asd', '28341', 987456321, 34873709, 'si', 'example@loquesea.algo', '52c64c72294407663e6f'),
(43, 'asda', 'Agroalimentario', '123456', 'qwe', 'asd', 'asd', 'asd', 'asd', '28341', 987456321, 34873709, 'si', 'example@loquesea.algo', '4f6312fa44a894eab0d0'),
(44, 'asdadas', 'Agroalimentario', '123456', 'qwe', 'asd', 'asd', 'asd', 'asd', '28341', 987456321, 34873709, 'si', 'example@loquesea.algo', 'e353194f3b7cd1b75d69'),
(45, 'asdadasds', 'Agroalimentario', '123456', 'qwe', 'asd', 'asd', 'asd', 'asd', '28341', 987456321, 34873709, 'si', 'example@loquesea.algo', '307c9b78e38a1992064c');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `col_ofertas`
--

CREATE TABLE IF NOT EXISTS `col_ofertas` (
  `idoferta` int(3) NOT NULL,
  `iduser` int(3) NOT NULL,
  `titulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `contrato` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `jornada` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `salario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `competencias` varchar(8000) COLLATE utf8_spanish_ci NOT NULL,
  `zona` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `activa` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `cod_act` varchar(22) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `col_ofertas`
--

INSERT INTO `col_ofertas` (`idoferta`, `iduser`, `titulo`, `descripcion`, `contrato`, `jornada`, `salario`, `competencias`, `zona`, `activa`, `cod_act`) VALUES
(6, 4, 'Informatico', 'Se busca programador', 'Formación', 'Tiempo Parcial', 'Más de 20.000', 'Realizar operaciones auxiliares de montaje de equipos microinformáticos.Realizar operaciones de ensamblado en el montaje de equipos eléctricos y electrónicos', '', 'si', '8af95fe2ab1a54b488ef'),
(7, 4, 'Informatico', ' Se busca programador', 'Temporal', 'Tiempo Completo', 'Entre 9.000 y 15.000', 'Desarrollar aplicaciones web con acceso a bases de datos utilizando lenguajes, objetos de acceso y herramientas de mapeo adecuados a las especificaciones', '', 'si', '15709800bdacf685676c'),
(8, 4, 'Informatico', ' Se busca programador', 'Temporal', 'Tiempo Completo', 'Entre 9.000 y 15.000', 'Desarrollar aplicaciones web con acceso a bases de datos utilizando lenguajes, objetos de acceso y herramientas de mapeo adecuados a las especificaciones', '', 'si', '2389ceb16e2cc3941618'),
(13, 4, 'pruebaz', 'zzzz', 'Indefinido', 'Tiempo Completo', 'No Especificado', 'Desarrollar componentes multimedia para su integración en aplicaciones web, empleando herramientas específicas y siguiendo las especificaciones establecidas.Desarrollar e integrar componentes software en el entorno del servidor web, empleando herramientas y lenguajes específicos, para cumplir las especificaciones de la aplicación.Desarrollar servicios para integrar sus funciones en otras aplicaciones web, asegurando su funcionalidad.Montar equipos microinformáticos', 'San Juan Bautista', 'si', '57750683947a2891662f'),
(14, 4, 'pruebaz', 'zzzz', 'Indefinido', 'Tiempo Completo', 'No Especificado', 'Desarrollar componentes multimedia para su integración en aplicaciones web, empleando herramientas específicas y siguiendo las especificaciones establecidas.Desarrollar e integrar componentes software en el entorno del servidor web, empleando herramientas y lenguajes específicos, para cumplir las especificaciones de la aplicación.Desarrollar servicios para integrar sus funciones en otras aplicaciones web, asegurando su funcionalidad.Montar equipos microinformáticos', 'San Juan Bautista', 'si', '005f91955ff9fc532184'),
(15, 4, 'mello', 'asdasda', 'Indefinido', 'Tiempo Completo', 'No Especificado', 'Realizar operaciones auxiliares de montaje de equipos microinformáticos.Realizar operaciones de conexionado en el montaje de equipos eléctricos y electrónicos.Aplicar técnicas y procedimientos relacionados con la seguridad en sistemas, servicios y aplicaciones, cumpliendo el plan de seguridad.Desarrollar componentes multimedia para su integración en aplicaciones web, empleando herramientas específicas y siguiendo las especificaciones establecidas.Desarrollar servicios para integrar sus funciones en otras aplicaciones web, asegurando su funcionalidad', 'Ibiza', 'si', 'd5215023c7e116864efd'),
(16, 4, 'mello', 'asdasda', 'Indefinido', 'Tiempo Completo', 'No Especificado', 'Realizar operaciones auxiliares de montaje de equipos microinformáticos.Realizar operaciones de conexionado en el montaje de equipos eléctricos y electrónicos.Aplicar técnicas y procedimientos relacionados con la seguridad en sistemas, servicios y aplicaciones, cumpliendo el plan de seguridad.Desarrollar componentes multimedia para su integración en aplicaciones web, empleando herramientas específicas y siguiendo las especificaciones establecidas.Desarrollar servicios para integrar sus funciones en otras aplicaciones web, asegurando su funcionalidad', 'Ibiza', 'si', '65a3a3e323d4882bc0d0'),
(17, 4, 'asdas', 'dasda', 'Indefinido', 'Tiempo Completo', 'No Especificado', 'Desarrollar servicios para integrar sus funciones en otras aplicaciones web, asegurando su funcionalidad', 'Ibiza', 'si', 'd87d3902e1c4efdc9d79'),
(18, 4, 'asdas', 'asdasdasd', 'Indefinido', 'Tiempo Completo', 'No Especificado', 'Realizar operaciones auxiliares de montaje de equipos microinformáticos.Realizar operaciones auxiliares de mantenimiento de sistemas microinformáticos', 'San Antonio Abad', 'si', '741a0099c9ac04c7bfc8'),
(19, 4, 'asdas', 'asdasdasd', 'Indefinido', 'Tiempo Completo', 'No Especificado', 'Realizar operaciones auxiliares de montaje de equipos microinformáticos.Realizar operaciones auxiliares de mantenimiento de sistemas microinformáticos', 'San Antonio Abad', 'si', '0c6fc0ac5afb01a75fe1'),
(20, 42, 'mello', 'asdasda', 'Indefinido', 'Tiempo Completo', 'No Especificado', 'Realizar operaciones auxiliares de montaje de equipos microinformáticos.Realizar operaciones de conexionado en el montaje de equipos eléctricos y electrónicos.Aplicar técnicas y procedimientos relacionados con la seguridad en sistemas, servicios y aplicaciones, cumpliendo el plan de seguridad.Desarrollar componentes multimedia para su integración en aplicaciones web, empleando herramientas específicas y siguiendo las especificaciones establecidas.Desarrollar servicios para integrar sus funciones en otras aplicaciones web, asegurando su funcionalidad', 'Ibiza', 'si', '65a3a3e323d4882bc0d0'),
(21, 44, 'mello', 'asdasda', 'Indefinido', 'Tiempo Completo', 'No Especificado', 'Realizar operaciones auxiliares de montaje de equipos microinformáticos.Realizar operaciones de conexionado en el montaje de equipos eléctricos y electrónicos.Aplicar técnicas y procedimientos relacionados con la seguridad en sistemas, servicios y aplicaciones, cumpliendo el plan de seguridad.Desarrollar componentes multimedia para su integración en aplicaciones web, empleando herramientas específicas y siguiendo las especificaciones establecidas.Desarrollar servicios para integrar sus funciones en otras aplicaciones web, asegurando su funcionalidad', 'Ibiza', 'si', 'd5215023c7e116864efd'),
(22, 44, 'Informatico', ' Se busca programador', 'Temporal', 'Tiempo Completo', 'Entre 9.000 y 15.000', 'Desarrollar aplicaciones web con acceso a bases de datos utilizando lenguajes, objetos de acceso y herramientas de mapeo adecuados a las especificaciones', '', 'si', '15709800bdacf685676c');

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
(6, 1),
(15, 1),
(16, 1),
(18, 1),
(19, 1),
(18, 2),
(19, 2),
(6, 4),
(15, 5),
(16, 5),
(15, 9),
(16, 9),
(7, 12),
(8, 12),
(13, 15),
(14, 15),
(15, 15),
(16, 15),
(13, 17),
(14, 17),
(13, 18),
(14, 18),
(15, 18),
(16, 18),
(17, 18),
(13, 21),
(14, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `col_profesores`
--

CREATE TABLE IF NOT EXISTS `col_profesores` (
  `iduser` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ocupacion` varchar(500) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `col_profesores`
--

INSERT INTO `col_profesores` (`iduser`, `nombre`, `apellidos`, `correo`, `ocupacion`) VALUES
(11, 'jose', 'guash', 'example@loquesea.algo', 'Profesor'),
(19, 'tere', 'guash', 'asda@asda.com', 'Profesora');

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
-- Estructura de tabla para la tabla `col_usuarios`
--

CREATE TABLE IF NOT EXISTS `col_usuarios` (
  `iduser` int(3) NOT NULL,
  `user` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `rol` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `col_usuarios`
--

INSERT INTO `col_usuarios` (`iduser`, `user`, `pass`, `url`, `rol`) VALUES
(1, 'admin', '12345678', '', 'admin'),
(4, 'tikkaqq', '12345678', '', 'empresa'),
(11, 'jose', '12345678', '', 'centro'),
(19, 'tereresu', '12345678', '', 'centro'),
(28, 'elmello69', '12345678', '/colowork/web/img/users/default_male.jpg', 'alumno'),
(39, 'antonio23', '12345678', '/colowork/web/img/users/user_antonio23.jpg', 'alumno'),
(40, 'antonio25', '12345678', '/colowork/web/img/users/default_male.jpg', 'alumno'),
(41, 'antonio26', '12345678', '/colowork/web/img/users/rsz_default_female.jpg', 'alumno'),
(42, 'empresa1', '12345678', '', 'empresa'),
(43, 'empresa2', '12345678', '', 'empresa'),
(44, 'empresa3', '12345678', '', 'empresa'),
(45, 'empresa4', '12345678', '', 'empresa');

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
  ADD PRIMARY KEY (`iduser`);

--
-- Indices de la tabla `col_alum_ciclo`
--
ALTER TABLE `col_alum_ciclo`
  ADD PRIMARY KEY (`iduser`,`idciclo`),
  ADD KEY `idciclo` (`idciclo`);

--
-- Indices de la tabla `col_alum_experiencia`
--
ALTER TABLE `col_alum_experiencia`
  ADD KEY `iduser` (`iduser`);

--
-- Indices de la tabla `col_alum_idiomas`
--
ALTER TABLE `col_alum_idiomas`
  ADD KEY `iduser` (`iduser`);

--
-- Indices de la tabla `col_ciclos`
--
ALTER TABLE `col_ciclos`
  ADD PRIMARY KEY (`idciclo`);

--
-- Indices de la tabla `col_codigo_centro`
--
ALTER TABLE `col_codigo_centro`
  ADD PRIMARY KEY (`idcodigo`),
  ADD UNIQUE KEY `centro` (`centro`);

--
-- Indices de la tabla `col_competencias`
--
ALTER TABLE `col_competencias`
  ADD PRIMARY KEY (`idcompetencia`,`idciclo`),
  ADD KEY `idciclo` (`idciclo`);

--
-- Indices de la tabla `col_empresas`
--
ALTER TABLE `col_empresas`
  ADD PRIMARY KEY (`iduser`);

--
-- Indices de la tabla `col_ofertas`
--
ALTER TABLE `col_ofertas`
  ADD PRIMARY KEY (`idoferta`,`iduser`),
  ADD KEY `col_ofertas_ibfk_1` (`iduser`);

--
-- Indices de la tabla `col_oferta_competencia`
--
ALTER TABLE `col_oferta_competencia`
  ADD PRIMARY KEY (`idoferta`,`idcompetencia`),
  ADD KEY `idcompetencia` (`idcompetencia`);

--
-- Indices de la tabla `col_profesores`
--
ALTER TABLE `col_profesores`
  ADD PRIMARY KEY (`iduser`);

--
-- Indices de la tabla `col_usuarios`
--
ALTER TABLE `col_usuarios`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `col_actividades`
--
ALTER TABLE `col_actividades`
  MODIFY `idactividad` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `col_ciclos`
--
ALTER TABLE `col_ciclos`
  MODIFY `idciclo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `col_codigo_centro`
--
ALTER TABLE `col_codigo_centro`
  MODIFY `idcodigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `col_competencias`
--
ALTER TABLE `col_competencias`
  MODIFY `idcompetencia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `col_empresas`
--
ALTER TABLE `col_empresas`
  MODIFY `iduser` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT de la tabla `col_ofertas`
--
ALTER TABLE `col_ofertas`
  MODIFY `idoferta` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `col_usuarios`
--
ALTER TABLE `col_usuarios`
  MODIFY `iduser` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `col_alumnos`
--
ALTER TABLE `col_alumnos`
  ADD CONSTRAINT `col_alumnos_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `col_usuarios` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `col_alum_ciclo`
--
ALTER TABLE `col_alum_ciclo`
  ADD CONSTRAINT `col_alum_ciclo_ibfk_2` FOREIGN KEY (`idciclo`) REFERENCES `col_ciclos` (`idciclo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `col_alum_ciclo_ibfk_3` FOREIGN KEY (`iduser`) REFERENCES `col_alumnos` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `col_alum_experiencia`
--
ALTER TABLE `col_alum_experiencia`
  ADD CONSTRAINT `col_alum_experiencia_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `col_usuarios` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `col_alum_idiomas`
--
ALTER TABLE `col_alum_idiomas`
  ADD CONSTRAINT `col_alum_idiomas_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `col_usuarios` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `col_competencias`
--
ALTER TABLE `col_competencias`
  ADD CONSTRAINT `col_competencias_ibfk_1` FOREIGN KEY (`idciclo`) REFERENCES `col_ciclos` (`idciclo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `col_empresas`
--
ALTER TABLE `col_empresas`
  ADD CONSTRAINT `col_empresas_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `col_usuarios` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `col_ofertas`
--
ALTER TABLE `col_ofertas`
  ADD CONSTRAINT `col_ofertas_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `col_empresas` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `col_oferta_competencia`
--
ALTER TABLE `col_oferta_competencia`
  ADD CONSTRAINT `col_oferta_competencia_ibfk_1` FOREIGN KEY (`idoferta`) REFERENCES `col_ofertas` (`idoferta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `col_oferta_competencia_ibfk_2` FOREIGN KEY (`idcompetencia`) REFERENCES `col_competencias` (`idcompetencia`);

--
-- Filtros para la tabla `col_profesores`
--
ALTER TABLE `col_profesores`
  ADD CONSTRAINT `col_profesores_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `col_usuarios` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
