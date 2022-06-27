-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2022 a las 19:10:06
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_daw`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `appointment`
--

CREATE TABLE `appointment` (
  `appointmentId` int(9) NOT NULL,
  `appointmentDateTime` datetime(6) NOT NULL,
  `appointmentType` varchar(30) NOT NULL,
  `appointmentState` int(1) NOT NULL,
  `serviceId_fk` int(9) NOT NULL,
  `userDni_fk` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `appointment`
--

INSERT INTO `appointment` (`appointmentId`, `appointmentDateTime`, `appointmentType`, `appointmentState`, `serviceId_fk`, `userDni_fk`) VALUES
(87, '2022-05-25 16:30:00.000000', 'TELEMÁTICA', 1, 4, '46857518A'),
(88, '2022-07-06 16:30:00.000000', 'TELEMÁTICA', 1, 1, '46857518A'),
(89, '2022-05-16 11:20:00.000000', 'PRESENCIAL', 1, 1, '46857518A'),
(94, '2022-06-13 18:30:00.000000', 'TELEMÁTICA', 1, 5, '46857518A'),
(96, '2022-06-19 18:30:00.000000', 'TELEMÁTICA', 1, 5, '46857518A'),
(97, '2022-06-05 18:30:00.000000', 'TELEMÁTICA', 1, 5, '46857518A'),
(102, '2022-05-23 08:30:00.000000', 'PRESENCIAL    ', 1, 4, '46857518A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employee`
--

CREATE TABLE `employee` (
  `employeeDni` varchar(9) NOT NULL,
  `employeeName` varchar(30) NOT NULL,
  `employeeSurname` varchar(50) NOT NULL,
  `employeeAddress` varchar(120) NOT NULL,
  `employeeEmail` varchar(100) NOT NULL,
  `employeePassword` varchar(30) NOT NULL,
  `employeeProfile` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `employee`
--

INSERT INTO `employee` (`employeeDni`, `employeeName`, `employeeSurname`, `employeeAddress`, `employeeEmail`, `employeePassword`, `employeeProfile`) VALUES
('43521587T', 'Tomas', 'Lozano Mas                       ', 'CL Tenerife 22 2º2ª Barcelona', 'tomas@gmail.com                ', 'tomas1234      ', 2),
('48751485D', 'Diego', 'Mas Rodríguez    ', 'CL Berlín 20 2º2ª Barcelona', 'diego@gmail.com    ', 'diego1234 ', 1),
('48751485E', 'Eva', 'Álvarez García    ', 'CL Berlín 22 2º3ª Barcelona', 'eva@gmail.com    ', 'eva1234 ', 1),
('48751488H', 'Luis', 'Mas Vázquez', 'CL Navarra 14 9º3ª León', 'luis@gmail.com', 'luis1234', 0),
('48751875D', 'Daniel', 'Jiménez Mas', 'CL Jaén 11 2º3ª Madrid', 'daniel@gmail.com', 'daniel1234', 0),
('48758475S', 'Salvador', 'Vázquez Jimón', 'CL Andalucía 12 1º1ª Madrid', 'salvador@gmail.com', 'salvador1234', 0),
('48758475V', 'Victor', 'Fernández Díaz .                           ', 'CL Venecia 5 Bajo 1 Barcelona', 'victor@gmail.com                                ', 'victor1234', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service`
--

CREATE TABLE `service` (
  `serviceId` int(9) NOT NULL,
  `serviceName` varchar(45) NOT NULL,
  `serviceDescription` varchar(120) NOT NULL,
  `servicePrice` double NOT NULL,
  `employeeDni_fk` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `service`
--

INSERT INTO `service` (`serviceId`, `serviceName`, `serviceDescription`, `servicePrice`, `employeeDni_fk`) VALUES
(1, 'CV', 'Inscripción registral de escrituras de compraventas', 180, '43521587T'),
(2, 'CE', 'Cancelación de Embargo y condiciones resolutorias', 80, '48758475V'),
(3, 'CH', 'Cancelación económica y/o registral de Hipoteca', 120, '48758475V'),
(4, 'PH', 'Inscripción registral de escrituras de hipoteca', 220, '43521587T'),
(5, 'MOD600', 'Presentación y liquidación de todo tipo de impuestos', 30, '43521587T');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `userDni` varchar(9) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userSurname` varchar(50) NOT NULL,
  `userAddress` varchar(120) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`userDni`, `userName`, `userSurname`, `userAddress`, `userEmail`, `userPassword`) VALUES
('43568514O', 'Oscar', 'Lafuente Zafón', 'CL Renglón 02 3º4ª Madrid', 'oscar@gmail.com', 'oscar1234'),
('43857418B', 'Benito', 'López Pons    ', 'CL Berlín 14 1º2ª Madrid', 'benito@gmail.com', 'benito1234'),
('45545555E', 'Esther', 'García Mas', 'CL del Mar 14 4º2ª Barcelona', 'esther@gmail.com', 'esther1234'),
('46854728M', 'Maribel', 'Mas Pons     ', 'CL Madrid 42 3º2ª León', 'maribel@gmail.com', 'maribel1234'),
('46857518A', 'Ana', 'López Mas', 'CL Andén 14 casa León', 'ana@gmail.com', 'ana1234'),
('48751587S', 'Sonia', 'Navarro Ruiz', 'CL Andalucía 20 1º1ª Madrid', 'sonia@gmail.com', 'sonia1234'),
('48752185L', 'Luisa', 'Ruiz Mas', 'CL Logroño 14 1ºA Barcelona', 'luisa@gmail.com', 'luisa1234'),
('48758452L', 'Lola', 'Blau García', 'CL del Mar 07 2º3ª Barcelona', 'lola@gmail.com', 'lola1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointmentId`),
  ADD KEY `serviceId_fk` (`serviceId_fk`),
  ADD KEY `userDni_fk` (`userDni_fk`);

--
-- Indices de la tabla `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeDni`);

--
-- Indices de la tabla `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceId`),
  ADD KEY `employee_Dni_fk` (`employeeDni_fk`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userDni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointmentId` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `service`
--
ALTER TABLE `service`
  MODIFY `serviceId` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`userDni_fk`) REFERENCES `user` (`userDni`) ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`serviceId_fk`) REFERENCES `service` (`serviceId`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`employeeDni_fk`) REFERENCES `employee` (`employeeDni`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
