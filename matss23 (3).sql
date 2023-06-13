-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2022 at 06:27 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matss23`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(15) NOT NULL,
  `ad_name` varchar(100) NOT NULL,
  `ad_username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `ad_name`, `ad_username`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(15) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`) VALUES
(3, 'Business Studies'),
(1, 'Computer Science'),
(2, 'Electrical & Electronics'),
(4, 'Social Studies');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(15) NOT NULL,
  `c_id` int(15) NOT NULL,
  `st_id` int(15) NOT NULL,
  `ins_id` int(15) NOT NULL,
  `v_id` varchar(20) NOT NULL,
  `cer_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `c_id`, `st_id`, `ins_id`, `v_id`, `cer_date`) VALUES
(11, 1, 27, 5, 'fwqub', '2022-03-20 05:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(15) NOT NULL,
  `c_title` varchar(50) NOT NULL,
  `c_description` varchar(500) NOT NULL,
  `c_price` varchar(20) NOT NULL,
  `c_adminfeedback` varchar(250) DEFAULT NULL,
  `c_thumbnail` varchar(200) DEFAULT NULL,
  `c_status` varchar(20) NOT NULL DEFAULT 'Inactive',
  `c_instructor_fk` int(15) NOT NULL,
  `c_category_fk` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `c_title`, `c_description`, `c_price`, `c_adminfeedback`, `c_thumbnail`, `c_status`, `c_instructor_fk`, `c_category_fk`) VALUES
(1, 'OOP1', 'The key feature of Object Oriented Programming (OOP) is, as the name suggests, the object. An object can be thought of as some real world entity which a programmer wishes to \"model\". Classes describe ', '3000', NULL, 'OOP11646992261.jpg', 'Active', 5, 1),
(2, 'OOP2', 'Most OOP languages provide a set of preprogrammed (\"built-in\") classes and objects to support common operations such as Input and Output (I/O). For this purpose C++ provides the built in classes ostre', '1200', NULL, 'dfgadg1646992139.jpg', 'Active', 5, 1),
(3, 'DLC', 'Digital logic circuits are often known as switching circuits, because in digital circuits the voltage levels are assumed to be switched from one value to another value instantaneously. These circuits are termed as logic circuits, as their operation obeys a definite set of logic rules.', '1400', NULL, 'web tech1646656656.png', 'Active', 8, 2),
(4, 'Accounting', 'Accounting is the process of recording financial transactions pertaining to a business. The accounting process includes summarizing, analyzing, and reporting these transactions to oversight agencies, regulators, and tax collection entities.', '2300', NULL, 'web tech1646656656.png', 'Active', 7, 3),
(5, 'Anthropology', 'Anthropology is the study of what makes us human. Anthropologists take a broad approach to understanding the many different aspects of the human experience, which we call holism. They consider the past, through archaeology, to see how human groups lived hundreds or thousands of years ago and what was important to them.', '1200', NULL, 'web tech1646656656.png', 'Inactive', 6, 4),
(11, 'Web Technology', 'Web Technology refers to the various tools and techniques that are utilized in the process of communication between different types of devices over the internet. A web browser is used to access web pages. Web browsers can be defined as programs that display text, data, pictures, animation, and video on the Internet.', '2000', NULL, 'web tech1646689043.png', 'Inactive', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `forumcomments`
--

CREATE TABLE `forumcomments` (
  `id` int(15) NOT NULL,
  `fc_uid` int(50) NOT NULL,
  `fc_comment` varchar(500) NOT NULL,
  `fc_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fc_forum_fk` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forumcomments`
--

INSERT INTO `forumcomments` (`id`, `fc_uid`, `fc_comment`, `fc_datetime`, `fc_forum_fk`) VALUES
(15, 27, 'gfyji', '2022-03-20 05:26:31', 7),
(16, 2, 'aasds', '2022-03-20 05:44:36', 7);

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` int(15) NOT NULL,
  `c_id` int(15) NOT NULL,
  `st_id` int(15) NOT NULL,
  `f_question` varchar(500) NOT NULL,
  `f_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`id`, `c_id`, `st_id`, `f_question`, `f_datetime`) VALUES
(7, 1, 27, 'i am faciung prob', '2022-03-20 05:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` int(15) NOT NULL,
  `ins_name` varchar(100) NOT NULL,
  `ins_username` varchar(50) NOT NULL,
  `ins_degree` varchar(100) NOT NULL,
  `ins_bio` varchar(150) NOT NULL,
  `ins_cat_fk` int(15) DEFAULT NULL,
  `ins_phone` varchar(15) NOT NULL,
  `ins_email` varchar(100) NOT NULL,
  `ins_exp` varchar(100) NOT NULL,
  `ins_joindate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ins_dp` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `ins_name`, `ins_username`, `ins_degree`, `ins_bio`, `ins_cat_fk`, `ins_phone`, `ins_email`, `ins_exp`, `ins_joindate`, `ins_dp`) VALUES
(5, 'Tanvir Ahmed', 'insone', 'PHD in Computer Science', 'IntOneBiorr', 1, '1111113434', 'InsOneMail@mail.com', 'InsOneExp', '2022-03-19 07:31:38', 'ins1.jpg'),
(6, 'Mahmudul Hasan', 'instwo', 'Msc in Anthropology', 'IntTwoBio', 4, '43343443', 'IntTwoEmail@mail.com', '23', '2022-03-19 07:31:54', 'nodpimage.png'),
(7, 'Tabin Hasan', 'insthree', 'IntThreeDegree in Business', 'IntThreeBio', 3, '23233', 'IntThreeMail@mail.com', 'IntThreeExp', '2022-03-19 07:32:04', 'ins3.jpg'),
(8, 'Dip Nandi', 'insfour', 'IntFourDegree in eee', 'IntFourBio', 2, '2323333', 'IntFourMail@mail.com', 'IntFourExp', '2022-03-19 07:32:12', 'ins4.jpg'),
(11, 'Razib Hayat Khan', 'sdsd', 'dcdcdsc', 'sddssdhjsdhjdshdd', NULL, '0182882828', 'tahmidmahbub168@gmail.com', 'sdsddsddsd', '2022-03-19 07:32:22', NULL),
(12, 'Fahmida Alam', 'dssc', '1232323', 'dssdsd', NULL, '0182882828', 'sddsds', 'sdssddsds', '2022-03-19 07:32:36', NULL),
(13, 'asdadsads', 'fsdkng', 'PHD', 'RDFTGYUHI', NULL, '01234567890', 'hsdbfh@mail.com', '1year', '2022-03-20 05:37:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(15) NOT NULL,
  `sender_un` varchar(50) NOT NULL,
  `receiver_un` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_un`, `receiver_un`, `message`, `datetime`) VALUES
(18, '27', '1', 'hello admin', '2022-03-19 14:30:20'),
(19, '27', '2', 'hi instructor', '2022-03-19 14:30:49'),
(20, '27', '28', 'hello tahmid', '2022-03-19 14:31:15'),
(21, '5', '27', 'hello, rafid', '2022-03-20 03:07:58'),
(22, '27', '1', 'my transaction', '2022-03-20 05:27:20');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(15) NOT NULL,
  `c_id` int(15) NOT NULL,
  `st_id` int(15) NOT NULL,
  `p_amount` int(20) NOT NULL,
  `p_mfs` varchar(30) NOT NULL,
  `p_phone` varchar(15) NOT NULL,
  `p_trxid` varchar(30) NOT NULL,
  `p_status` varchar(30) NOT NULL DEFAULT 'Requested'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `c_id`, `st_id`, `p_amount`, `p_mfs`, `p_phone`, `p_trxid`, `p_status`) VALUES
(24, 2, 27, 1200, 'nagad', '01633394589', 'trx123', 'Requested'),
(25, 1, 27, 3000, 'bkash', '01633394589', 'trx456', 'Accepted'),
(26, 3, 27, 1400, 'upay', '01633394589', 'trx743', 'Requested'),
(27, 4, 27, 2300, 'bkash', '01234567890', 'trx123', 'Requested');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(15) NOT NULL,
  `q_quesnumber` int(15) NOT NULL,
  `q_ques` varchar(500) NOT NULL,
  `q_option1` varchar(500) NOT NULL,
  `q_option2` varchar(500) NOT NULL,
  `q_option3` varchar(500) NOT NULL,
  `q_option4` varchar(500) NOT NULL,
  `q_ans` varchar(500) NOT NULL,
  `q_topic_fk` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `q_quesnumber`, `q_ques`, `q_option1`, `q_option2`, `q_option3`, `q_option4`, `q_ans`, `q_topic_fk`) VALUES
(1, 1, 'WHat is O in OOP?', 'Object', 'Oracle', 'OperaMini', 'OOO', 'Object', 3),
(2, 2, 'WHat is O(middle O) in OOP?', 'Online', 'Oriented', 'Optimum Pride', 'sdsd', 'Oriented', 3),
(3, 3, 'WHat is P in OOP?', 'Power Rangers', 'Php', 'People\'s Republic of China', 'Programming', 'Programming', 3),
(4, 1, 'What is array', 'A ray.', 'আরে!!', 'collection of elements', 'option 4', 'collection of elements', 4),
(5, 1, 'What is the answer?', 'Option 4 is answer', 'Option 4', '4 no. option ', 'None of above', 'None of above', 5),
(6, 1, 'What is money?', 'Medium of trade', 'money', 'MoNeyga', 'মনে', 'Medium of trade', 7),
(7, 1, 'asdqwd', 'aaaa', 'bbbbb', 'cccc', 'dddd', 'cccc', 12),
(8, 2, 'qwerty', 'qqq', 'www', 'eee', 'rrrr', 'www', 12),
(9, 1, 'fdfvfdvdfv', 'dfvdfvdfv', 'fdvdfv', 'fdvdfv', 'dfvdfv', 'fdvdfv', 14),
(10, 2, 'tyjujyukrkryuk', 'yetttttttttttt', 'ttttttttttt', 'rrrrrrrrrrr', 'reeeeeeeeeee', 'ttttttttttt', 14),
(11, 3, 'asdfasfaf', 'gergerg', 'reffvfdv', 'erferf', 'efef', 'gergerg', 14),
(12, 1, 'fdgfdg', 'fdgdfg', 'dfgfdg', 'dgdrg', 'rggrg', 'dfgfdg', 2),
(13, 2, 'gfffffffff', 'ggfgf', 'trhrth', 'fggf', 'thtrh', 'thtrh', 2),
(14, 1, 'fgfgthfghgh', 'gfgf', 'fggf', 'fgfg', 'fggf', 'gfgf', 1),
(15, 4, 'dfdffd', '4444', 'fddfdf', 're34', 'erferf', 'erferf', 3),
(16, 1, 'what is an example of php framework?', 'angular', 'laravel', 'express', 'asp.net', 'laravel', 13),
(17, 2, 'what is php?', 'english language', 'tribal culture', 'Hypertext Preprocessor', 'jani na', 'Hypertext Preprocessor', 13),
(18, 3, 'aaaaaaaaaaaaa', 'dsdds', 'dsdsds', 'sddsds', 'ddsdd', 'dsdds', 12);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(15) NOT NULL,
  `st_id` int(15) NOT NULL,
  `c_id` int(15) NOT NULL,
  `r_rating` int(10) NOT NULL,
  `r_review` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `st_id`, `c_id`, `r_rating`, `r_review`) VALUES
(1, 4, 2, 4, 'Helicopter Helicopter'),
(2, 5, 4, 1, NULL),
(3, 2, 1, 4, 'thstrhthsrthrth'),
(4, 1, 2, 2, 'ddddddddddddddddddddd');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(15) NOT NULL,
  `st_name` varchar(100) NOT NULL,
  `st_username` varchar(50) NOT NULL,
  `st_phone` varchar(20) NOT NULL,
  `st_email` varchar(100) NOT NULL,
  `st_address` varchar(200) DEFAULT NULL,
  `u_id` int(50) DEFAULT NULL,
  `st_pro_pic` text DEFAULT 'dp.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `st_name`, `st_username`, `st_phone`, `st_email`, `st_address`, `u_id`, `st_pro_pic`) VALUES
(13, 'Tahmid Rafid', 'rafid', '01234567890', 'rafid@mail.com', NULL, 27, 'dp.png'),
(14, 'Tahmid Mahbub', 'Tahmid', '01532895782', 'tahmid@mail.com', NULL, 28, 'dp.png'),
(15, 'Salma Jahan', 'sahara', '01234567890', 'sahara@mail.com', NULL, 29, '2.jpg'),
(16, 'polok Mama', 'polok', '01234567890', 'ghuiserg@mail.com', NULL, 30, '6.png'),
(17, 'instt', 'ins56', '01234567890', 'tahmidmahbub168@gmail.com', NULL, 31, 'dp.png');

-- --------------------------------------------------------

--
-- Table structure for table `student_courses`
--

CREATE TABLE `student_courses` (
  `id` int(15) NOT NULL,
  `st_id` int(15) NOT NULL,
  `c_id` int(15) NOT NULL,
  `tot_topic` int(10) NOT NULL,
  `complete_topic` int(10) NOT NULL,
  `sc_status` varchar(20) NOT NULL DEFAULT 'Incomplete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_courses`
--

INSERT INTO `student_courses` (`id`, `st_id`, `c_id`, `tot_topic`, `complete_topic`, `sc_status`) VALUES
(1, 1, 2, 3, 1, 'incomplete'),
(3, 4, 2, 3, 3, 'complete'),
(4, 3, 3, 1, 0, 'incomplete'),
(5, 5, 4, 2, 1, 'incomplete'),
(6, 2, 1, 2, 1, 'incomplete'),
(7, 2, 3, 1, 1, 'complete'),
(8, 1, 1, 2, 1, 'Incomplete'),
(11, 21, 4, 10, 0, 'Incomplete'),
(12, 21, 3, 10, 0, 'Incomplete'),
(13, 21, 1, 10, 0, 'Incomplete'),
(14, 16, 2, 10, 0, 'Incomplete'),
(15, 16, 11, 10, 0, 'Incomplete'),
(16, 16, 3, 10, 0, 'Incomplete'),
(17, 16, 3, 10, 0, 'Incomplete'),
(18, 16, 11, 10, 0, 'Incomplete'),
(19, 16, 2, 10, 0, 'Incomplete'),
(20, 27, 1, 10, 0, 'Incomplete');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(15) NOT NULL,
  `t_number` int(15) NOT NULL,
  `t_title` varchar(150) NOT NULL,
  `t_video` text DEFAULT NULL,
  `t_material` text DEFAULT NULL,
  `t_course_fk` int(15) NOT NULL,
  `t_publicviewlock` varchar(20) DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `t_number`, `t_title`, `t_video`, `t_material`, `t_course_fk`, `t_publicviewlock`) VALUES
(1, 1, 'OOP 1 | Introduction & Concepts ', NULL, 'If you’re reading this, it means you’re interested in taking steps to improve your practice as an educator and create better outcomes for your students. Congratulations! Your commitment to lifelong professional learning is essential in helping NEA fulfill its mission to provide a great public education for every student.\r\n\r\n', 1, 'no'),
(2, 2, 'OOP 1 | Mthod and members', NULL, 'Unfortunately, not all educators have access to the professional development support they need. That’s why we created NEA Micro-credentials—to make it easy for all educators (teachers and education support professionals alike) to access professional learning opportunities throughout our careers.', 1, 'yes'),
(3, 1, 'Class & Object | OOP2 |', NULL, 'A micro-credential is a short, competency-based recognition that allows an educator to demonstrate mastery in a particular area. NEA micro-credentials are grounded in research and best practice and designed to be.', 2, 'no'),
(4, 2, 'Type Casting | OOP2', NULL, 'Personalized: You can create your own learning journey, based on your interests and career goals; gaps in your skills; and the specific needs of your students, school, and district. ', 2, 'yes'),
(5, 3, 'Struct | OOP2 |', NULL, 'No video course...read the materials oasjdiofjsiofjsoifjaoifjsoijfioasdjfiosadjfiosdjfoisdjf', 2, 'yes'),
(6, 1, 'DLC TOPIC 1', NULL, 'Flexible: You can study when it’s convenient for you, alone or with your peers. \r\nPerformance-based: Unlike “sit-and-get” certifications, NEA micro-credentials are awarded based on demonstrated mastery of the subject matter, not just for showing up. ', 3, 'yes'),
(7, 1, 'ACCounting topic 1', NULL, 'Show no video....only material', 4, 'no'),
(8, 2, 'Accounting topic 2', NULL, 'Micro-credentials are flexible. You can choose to learn on your own, or join a learning community and support each other through the process. The process is rigorous, so working with a group can help you earn your micro-credential sooner. Contact your local NEA affiliate to learn more about your options. ', 4, 'yes'),
(12, 4, 'Static', 'Static1646672571.mp4', 'Ready to get started? Here\'s how it works, at a glance:\r\n\r\nGo to nea.certificationbank.com to get started. \r\nSelect a skill you have developed or would like to develop. \r\nCollect the required evidence demonstrating your competence in the selected area.  \r\nSubmit by uploading your evidence.   \r\nShare your achievement with others! ', 2, 'no'),
(13, 1, 'PHP Tables', 'gjffggc1646690542.mp4', 'NEA works in close partnership with Digital Promise on micro-credential development. Digital Promise has built an ecosystem of more than 400 micro-credentials covering a wide variety of topics and skills to personalize learning for educators. To learn more, visit microcredentials.digitalpromise.org.', 11, 'no'),
(14, 3, 'JAVA 7', 'sads1646983017.mp4', 'NEA has partnered with Citizen U®, as part of the Barat Education Foundation Library of Congress Teaching with Primary Sources (TPS) program grant, to develop a series of micro-credentials. These micro-credentials, developed in conjunction with other TPS Consortium members, are designed to help educators better integrate inquiry learning with primary sources into instruction across grades and disciplines using a variety of frameworks and strategies. More micro-credentials will be added yearly.', 1, 'no'),
(15, 4, 'Java 9', 'dfgadg1646992139.jpg', 'The NEA was founded on the belief that every student deserves a great public education. But in too many communities, years of systemic racism and unconscious bias have limited opportunities for many students and contributed to a growing education gap.', 1, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `userlogins`
--

CREATE TABLE `userlogins` (
  `id` int(15) NOT NULL,
  `u_username` varchar(50) NOT NULL,
  `u_type` varchar(15) NOT NULL,
  `u_password` varchar(50) NOT NULL,
  `u_access` varchar(10) NOT NULL DEFAULT 'yes',
  `u_id` int(50) DEFAULT NULL,
  `u_name` varchar(200) NOT NULL,
  `u_pro_pic` text NOT NULL DEFAULT 'dp.png',
  `u_active` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlogins`
--

INSERT INTO `userlogins` (`id`, `u_username`, `u_type`, `u_password`, `u_access`, `u_id`, `u_name`, `u_pro_pic`, `u_active`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'yes', 1, 'MATS Education', '', 'Away'),
(2, 'insone', 'instructor', '202cb962ac59075b964b07152d234b70', 'yes', 1, 'Tanvir Ahmed', 'ins1.jpg', 'Active'),
(3, 'instwo', 'instructor', '202cb962ac59075b964b07152d234b70', 'yes', 1, 'Mahmudul Hasan', 'nodpimage.png', 'Away'),
(4, 'insthree', 'instructor', '202cb962ac59075b964b07152d234b70', 'yes', 1, 'Tabin Hasan', 'ins3.jpg', 'Away'),
(5, 'insfour', 'instructor', '202cb962ac59075b964b07152d234b70', 'no', 1, 'Dip Nandi', 'ins4.jpg', 'Away'),
(27, 'rafid', 'student', '202cb962ac59075b964b07152d234b70', 'yes', 13, 'Tahmid Rafid', 'dp.png', 'Away'),
(28, 'tahmid', 'student', '202cb962ac59075b964b07152d234b70', 'yes', 14, 'Tahmid Mahbub', 'dp.png', 'Active'),
(29, 'sahara', 'student', '202cb962ac59075b964b07152d234b70', 'yes', 15, 'Salma Jahan', 'dp.png', 'Away'),
(30, 'polok', 'student', '202cb962ac59075b964b07152d234b70', 'yes', 16, 'polok Mama', 'dp.png', 'Active'),
(31, 'ins56', 'student', '202cb962ac59075b964b07152d234b70', 'yes', 17, 'instt', 'dp.png', 'Away'),
(32, 'fsdkng', 'instructor', '123', 'No', NULL, 'instructor', 'dp.png', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ad_username` (`ad_username`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cat_name` (`cat_name`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certi_course_fk` (`c_id`),
  ADD KEY `certi_student_fk` (`st_id`),
  ADD KEY `certi_instructor_fk` (`ins_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_instructor_fk` (`c_instructor_fk`),
  ADD KEY `course_category_fk` (`c_category_fk`);

--
-- Indexes for table `forumcomments`
--
ALTER TABLE `forumcomments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fc_forum_fk` (`fc_forum_fk`),
  ADD KEY `fc_uid_fk` (`fc_uid`);

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forumques_course_fk` (`c_id`),
  ADD KEY `forumques_student_fk` (`st_id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ins_username` (`ins_username`),
  ADD KEY `ins_category_fk` (`ins_cat_fk`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_course_fk` (`c_id`),
  ADD KEY `student_course_fk` (`st_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ques_topic_fk` (`q_topic_fk`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rate_student_fk` (`st_id`),
  ADD KEY `rate_course_fk` (`c_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `st_username` (`st_username`),
  ADD KEY `st_uid_fk` (`u_id`);

--
-- Indexes for table `student_courses`
--
ALTER TABLE `student_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sc_course_fk` (`c_id`),
  ADD KEY `sc_student_fk` (`st_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_course_fk` (`t_course_fk`);

--
-- Indexes for table `userlogins`
--
ALTER TABLE `userlogins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_username` (`u_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `forumcomments`
--
ALTER TABLE `forumcomments`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student_courses`
--
ALTER TABLE `student_courses`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `userlogins`
--
ALTER TABLE `userlogins`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `certi_course_fk` FOREIGN KEY (`c_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `certi_instructor_fk` FOREIGN KEY (`ins_id`) REFERENCES `instructors` (`id`),
  ADD CONSTRAINT `certi_student_fk` FOREIGN KEY (`st_id`) REFERENCES `userlogins` (`id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `course_category_fk` FOREIGN KEY (`c_category_fk`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `course_instructor_fk` FOREIGN KEY (`c_instructor_fk`) REFERENCES `instructors` (`id`);

--
-- Constraints for table `forumcomments`
--
ALTER TABLE `forumcomments`
  ADD CONSTRAINT `fc_forum_fk` FOREIGN KEY (`fc_forum_fk`) REFERENCES `forums` (`id`),
  ADD CONSTRAINT `fc_uid_fk` FOREIGN KEY (`fc_uid`) REFERENCES `userlogins` (`id`);

--
-- Constraints for table `forums`
--
ALTER TABLE `forums`
  ADD CONSTRAINT `forumques_course_fk` FOREIGN KEY (`c_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `forumques_student_fk` FOREIGN KEY (`st_id`) REFERENCES `userlogins` (`id`);

--
-- Constraints for table `instructors`
--
ALTER TABLE `instructors`
  ADD CONSTRAINT `ins_category_fk` FOREIGN KEY (`ins_cat_fk`) REFERENCES `categories` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payment_course_fk` FOREIGN KEY (`c_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `student_course_fk` FOREIGN KEY (`st_id`) REFERENCES `userlogins` (`id`);

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `ques_topic_fk` FOREIGN KEY (`q_topic_fk`) REFERENCES `topics` (`id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `rate_course_fk` FOREIGN KEY (`c_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `rate_student_fk` FOREIGN KEY (`st_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `st_uid_fk` FOREIGN KEY (`u_id`) REFERENCES `userlogins` (`id`);

--
-- Constraints for table `student_courses`
--
ALTER TABLE `student_courses`
  ADD CONSTRAINT `sc_course_fk` FOREIGN KEY (`c_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `sc_student_fk` FOREIGN KEY (`st_id`) REFERENCES `userlogins` (`id`);

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topic_course_fk` FOREIGN KEY (`t_course_fk`) REFERENCES `courses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
