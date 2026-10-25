-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2026 at 05:52 PM
-- Server version: 10.11.16-MariaDB
-- PHP Version: 8.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `eoi_id` int(10) UNSIGNED NOT NULL,
  `job_ref` char(6) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('Male','Female','Other','Prefer not to say') DEFAULT NULL,
  `street_address` varchar(150) DEFAULT NULL,
  `town` varchar(100) DEFAULT NULL,
  `state` char(3) DEFAULT NULL,
  `postcode` char(4) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `communication` enum('Yes','No') DEFAULT NULL,
  `teamwork` enum('Yes','No') DEFAULT NULL,
  `problem-solving` enum('Yes','No') DEFAULT NULL,
  `adaptability` enum('Yes','No') DEFAULT NULL,
  `other_skills` enum('Yes','No') DEFAULT NULL,
  `other_skills_long` text DEFAULT NULL,
  `status` enum('New','Current','Final') DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eoi`
--

INSERT INTO `eoi` (`eoi_id`, `job_ref`, `first_name`, `last_name`, `date_of_birth`, `gender`, `street_address`, `town`, `state`, `postcode`, `email`, `phone_number`, `communication`, `teamwork`, `problem-solving`, `adaptability`, `other_skills`, `other_skills_long`, `status`) VALUES
(1, 'CS481E', 'Zoe', 'Ba', '2023-01-03', 'Female', '123 example road', 'burger', 'NSW', '1231', 'zoe@gmail.com', '0415598222', 'Yes', 'No', 'No', 'No', 'No', '', 'Current');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_reference_number` varchar(10) NOT NULL,
  `salary_range` varchar(100) DEFAULT NULL,
  `reporting_line` varchar(100) DEFAULT NULL,
  `job_description` text NOT NULL,
  `key_responsibilities` text NOT NULL,
  `essential_requirements` text NOT NULL,
  `preferable_requirements` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_title`, `job_reference_number`, `salary_range`, `reporting_line`, `job_description`, `key_responsibilities`, `essential_requirements`, `preferable_requirements`, `created_at`) VALUES
(1, 'Cyber Security Engineer', 'CS481E', '$62 - $70 per hour', 'Reports to the IT Security Manager, with escalations and threat updates provided to senior managemen', 'Cyber Snug is a cybersecurity company expanding its digital team to support secure client portals, cyber awareness websites, incident reporting systems, and online security services. We are looking for a Cyber Security Engineer to protect our computer networks, systems, websites, and applications, and to help build the secure digital products our clients rely on. Cyber Snug builds and maintains secure digital services for clients, including client portals, cyber awareness education websites, and incident reporting systems. Joining our security team means working on tools that directly reduce risk for real businesses, alongside colleagues who take a methodical, detail-focused approach to an ever-evolving field.', 'Develop, build, maintain, and test security systems and monitor their effectiveness; Identify vulnerabilities in hardware, software, and applications used across client portals and internal systems; Plan and develop security strategies for Cyber Snug IT infrastructure and client-facing services; Introduce security upgrades and replacements as required; Respond to security breaches and investigate how they occurred, including incidents raised through our incident reporting systems; Work with developers to identify and remediate security issues, and participate in code reviews; Assess the security of third-party software components and libraries used in Cyber Snug products; Report to senior management on potential threats, proposed improvements, and ongoing security issues', 'University degree in computer science, information technology, systems engineering, computer programming, or a related field; Working experience in a similar Cyber Security or systems administration role; Strong understanding of secure coding practices and the ability to conduct security testing and vulnerability assessments; Proficiency with tools such as Python, JavaScript, Wireshark, Metasploit, Nmap, and Burp Suite; Experience with network security monitoring, encryption tools, penetration testing, and intrusion detection; Strong problem-solving skills, attention to detail, and the ability to stay calm and methodical under pressure.', 'Industry-recognised cyber security certifications (e.g. CISSP, CISM, CRISC, or GIAC); Experience with Privileged Access Management (PAM) and Identity and Access Management (IAM); Exposure to security automation and workflow platforms to improve detection, response, and reporting; Familiarity with additional programming languages such as Ruby, Node, or PowerShell; Prior experience working alongside ethical hackers or in penetration testing engagements.', '2026-10-15 05:51:39'),
(2, 'Cyber Security Architect', 'CS519A', '$100 - $110 per hour', 'Reports to the Chief Information Security Officer (CISO), and may lead a security design team on maj', 'Cyber Snug is seeking a Cyber Security Architect to design and implement secure information technology systems across our client portals, cyber awareness websites, and incident reporting platforms. This role identifies potential vulnerabilities and designs the security controls that keep our clients information and systems confidential, intact, and available. As a Cyber Security Architect at Cyber Snug, you will shape the security patterns and controls used across every product we build for clients, from portal logins to awareness training platforms. You will work closely with our engineering team, translating business requirements into practical, implementable security designs while staying ahead of emerging threats.', 'Design and implement secure IT systems to protect sensitive client information and infrastructure; Develop and review cyber security architectures, solution designs, security controls, and patterns; Identify security threats, risks, and control gaps, and recommend practical, implementable solutions; Conduct security assessments and audits to evaluate the effectiveness of existing security measures; Collaborate with engineering and IT teams to integrate security best practices into system architecture; Translate business, functional, and non-functional requirements into appropriate security solutions; Stay updated on emerging cyber threats and technologies to inform Cyber Snug security strategy; Develop and maintain documentation for security policies, procedures, and architecture', 'Bachelor degree in Cyber Security, Information Technology, or a related field; Proven experience in cybersecurity architecture and system design; Strong knowledge of security frameworks, standards, and best practices; Proficiency with security tools and technologies, including firewalls, intrusion detection systems, and encryption methods; Experience with risk assessment and management methodologies; Exceptional analytical and problem-solving skills, with strong communication skills for engaging both technical and non-technical stakeholders.', 'Relevant certifications such as CISSP, CISM, CEH, or SABSA; Experience working across both Agile and Waterfall delivery environments; Experience providing technical leadership and mentoring to delivery teams; Background working with technology partners, vendors, and third parties on complex projects.', '2026-10-15 05:51:39'),
(3, 'Cyber Security Assurance Analyst', 'CS814B', '$57 - $77 per hour', 'Chief Information Security Officer (CISO) and Chief Risk Officer (CRO)', 'Cyber Snug is seeking a Cyber Security Assurance Analyst to monitor and investigate for threats across our networks. This role is responsible for managing firewalls and encryption algorithms, as well as fixing vulnerabilities and assessing cybersecurity risks. As a Cyber Security Assurance Analyst at Cyber Snug, you will work with our IT team to be in charge of safeguarding hardware, software and networks from cyber threats and security breaches, and implement and configure security patches and tools.', 'Continuously monitor networks, systems, and applications for suspicious activity, unauthorised access, and potential vulnerabilities; Analyse security alerts, determine root causes of breaches, and assess the impact on data and infrastructure; Conduct vulnerability and risk assessments to identify security loopholes and prioritise remediation; Research emerging cyber threats, maintain awareness of the threat landscape, and develop strategies to address future risks; Coordinate responses to security incidents, including malware analysis and recovery process implementation; Educate staff on best practices to prevent phishing, social engineering, and other threats.', 'Bachelor degree in IT, Cybersecurity, or a related field, or equivalent professional experience; Proficiency with SIEM tools, vulnerability scanners, and network security devices; Ability to interpret and act on security logs, alerts, and scan results; Strong analytical and problem-solving skills; Ability to communicate technical findings to non-technical stakeholders.', 'Relevant certifications such as CISSP, CISA, CISM, CEH, or other recognised cybersecurity credentials; Industry training in risk management, compliance, or security assurance; Experience in close collaborations with IT, procurement, and project teams.', '2026-10-15 05:51:39'),
(4, 'Digital Forensic Examiner', 'CS5264', '$40 - $55 per hour', 'Chief Information Security Officer (CISO), Head of Investigations, or a forensic services manager', 'Cyber Snug is seeking a Digital Forensic Examiner to collect, analyze, and preserve digital evidence to support law enforcement, legal proceedings, and cybersecurity investigations. This role is responsible for managing firewalls and encryption algorithms, as well as fixing vulnerabilities and assessing cybersecurity risks. As a Digital Forensic Examiner at Cyber Snug, you will work closely with supervisors, law enforcement personnel, and other stakeholders to recover and analyze data from digital devices.', 'Conducting forensic examinations of electronic devices using specialized software and hardware tools to extract, preserve, and analyze evidence; Assisting law enforcement and legal teams in preparing search warrants, investigative reports, and court documentation; Providing on-scene technical guidance during the execution of search warrants or digital investigations; Maintaining and ensuring the integrity of digital evidence for legal admissibility; Preparing detailed forensic reports and presenting findings in court as an expert witness; Detecting malware, network intrusions, and other digital crimes.', 'Bachelor degree in IT, Cybersecurity, Digital Forensics or a related field; Specialized training in digital forensics tools, legal processes, and evidence handling; Proficiency in operating systems, networking, and cybersecurity concepts; Understand and comply with privacy, evidence handling, and legal obligations; Ability to prepare clear reports and testify effectively in legal proceedings', 'Relevant certifications such as  CDFE, GCFE, GCFA, EnCE, CCE, or other recognized digital forensics credentials; Experience in IT, cybersecurity, incident response, or law enforcement technology roles; Internships with law enforcement agencies, cybersecurity firms, or corporate security teams.', '2026-10-15 05:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `member_contributions`
--

CREATE TABLE `member_contributions` (
  `contribution_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `display_order` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member_contributions`
--

INSERT INTO `member_contributions` (`contribution_id`, `member_id`, `project_id`, `description`, `display_order`) VALUES
(18, 1, 1, 'Wrote HTML code for job descriptions of Cyber Security Engineer and Architect', 1),
(19, 1, 1, 'Wrote nested list structure and table for about.html page', 2),
(20, 1, 1, 'Wrote CSS code for about.html page', 3),
(21, 1, 1, 'Wrote HTML and CSS code for lightbox logo feature', 4),
(22, 1, 1, 'Validated my HTML and CSS and corrected any warnings and errors', 5),
(23, 2, 1, 'Wrote HTML code for job application form', 1),
(24, 2, 1, 'Wrote HTML code and CSS for index.html page', 2),
(25, 2, 1, 'Wrote table demonstrating cell merging for index.html page', 3),
(26, 2, 1, 'Validated my HTML and CSS and corrected any warnings and errors', 4),
(27, 3, 1, 'Wrote HTML code for job application form, home page', 1),
(28, 3, 1, 'Wrote CSS and html for footer and header', 2),
(29, 3, 1, 'Wrote CSS for apply.html, background, and some styling across the pages', 3),
(30, 3, 1, 'wrote CSS for basic page layouts and style', 4),
(31, 3, 1, 'Validated my HTML and CSS and corrected any warnings and errors', 5),
(32, 4, 1, 'Wrote HTML code for job descriptions of Cyber Security Assurance Analyst and Digital Forensic Examiner.', 1),
(33, 4, 1, 'Wrote CSS for jobs.html', 2),
(34, 4, 1, 'Validated my HTML and CSS and corrected any warnings and errors', 3),
(35, 1, 2, 'Completed task 1', 1),
(36, 2, 2, 'Unable to contribute', 1),
(37, 3, 2, 'Completed task 4', 1),
(38, 4, 2, 'Completed task 3', 1),
(39, 1, 2, 'Finalised task 2', 2),
(40, 1, 2, 'Completed task 7', 3),
(41, 1, 2, 'Managed the presentation', 4),
(42, 3, 2, 'Partially completed task 6', 2),
(43, 3, 2, 'Assisted in task 2', 3),
(44, 4, 2, 'Completed task 5', 2);

-- --------------------------------------------------------

--
-- Table structure for table `member_fun_facts`
--

CREATE TABLE `member_fun_facts` (
  `fact_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `fact_text` varchar(255) NOT NULL,
  `display_order` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member_fun_facts`
--

INSERT INTO `member_fun_facts` (`fact_id`, `member_id`, `fact_text`, `display_order`) VALUES
(1, 1, 'I have an unhealthy obsession with collecting stickers and art prints', 1),
(2, 1, 'I have over 1350 hours on animal crossing new horizons', 2),
(3, 2, 'I held a snake in my hands when I was in Grade 3', 1),
(4, 2, 'I was in the top 1% of monthly listeners for 3 different artists this year', 2),
(5, 3, 'I made jewellery out of my wisdom teeth', 1),
(6, 3, 'I have grey eyes, which is really rare and cool', 2),
(7, 4, 'I\'m a big fan of 3rd gen hit boygroup Seventeen', 1),
(8, 4, 'I saw one of my top artists at a concert last year', 2);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(40) NOT NULL,
  `project_summary` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `project_summary`) VALUES
(1, 'Project Part 1', 'Static website (HTML and CSS)'),
(2, 'Project Part 2', 'Dynamic website (PHP and MySQL)');

-- --------------------------------------------------------

--
-- Table structure for table `team_info`
--

CREATE TABLE `team_info` (
  `team_id` int(11) NOT NULL,
  `team_name` varchar(40) NOT NULL,
  `company_name` varchar(40) NOT NULL,
  `group_number` char(2) NOT NULL,
  `tutorial_class` varchar(40) NOT NULL,
  `group_photo` varchar(100) NOT NULL,
  `group_photo_alt` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_info`
--

INSERT INTO `team_info` (`team_id`, `team_name`, `company_name`, `group_number`, `tutorial_class`, `group_photo`, `group_photo_alt`) VALUES
(1, 'HTML WIZARDS', 'Cyber Snug', '01', 'Tuesday, 12:30pm', 'images/Combined_Group_Photo.png', 'The HTML Wizards team group photo');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `member_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `full_name` varchar(60) NOT NULL,
  `preferred_name` varchar(30) NOT NULL,
  `quote_original` varchar(255) NOT NULL,
  `quote_translation` varchar(255) NOT NULL,
  `display_order` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`member_id`, `team_id`, `full_name`, `preferred_name`, `quote_original`, `quote_translation`, `display_order`) VALUES
(1, 1, 'Allegra Masri', 'Allegra', 'Puedo terminar el trabajo más rápido que peluquear un calvo.', 'I finish work faster than giving a haircut to a bald guy', 1),
(2, 1, 'Freshta Ahmadi', 'Freshta', 'خار د جان خودخو ده، سيزو د جان ديگا', 'Thrust a thorn into your own body, and a needle into someone else\'s. (Do to others as you would do to yourself)', 2),
(3, 1, 'Zoe Ballantyne', 'Zoe', 'Mən yalnız ingiliscə bilirəm; ümid edirəm ki, tərcümə yaxşı alınıb.', 'i only know english, i hope it translated okay.', 3),
(4, 1, 'Ngo My An Dang', 'An', 'Das Leben und dazu eine Katze, das gibt eine unglaubliche Summe.', 'Life and a cat, that adds up to an incredible sum.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password_hash`) VALUES
(1, 'admin', '$2y$10$y3YtEDEqaX4ZsBsgkRrYXe9ATfNUPZZb1mnzEW2Qgan8JPjO/FjTS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`eoi_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD UNIQUE KEY `job_reference_number` (`job_reference_number`);

--
-- Indexes for table `member_contributions`
--
ALTER TABLE `member_contributions`
  ADD PRIMARY KEY (`contribution_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `member_fun_facts`
--
ALTER TABLE `member_fun_facts`
  ADD PRIMARY KEY (`fact_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `team_info`
--
ALTER TABLE `team_info`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `team_id` (`team_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `eoi_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `member_contributions`
--
ALTER TABLE `member_contributions`
  MODIFY `contribution_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `member_fun_facts`
--
ALTER TABLE `member_fun_facts`
  MODIFY `fact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `team_info`
--
ALTER TABLE `team_info`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `member_contributions`
--
ALTER TABLE `member_contributions`
  ADD CONSTRAINT `member_contributions_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `team_members` (`member_id`),
  ADD CONSTRAINT `member_contributions_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`);

--
-- Constraints for table `member_fun_facts`
--
ALTER TABLE `member_fun_facts`
  ADD CONSTRAINT `member_fun_facts_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `team_members` (`member_id`);

--
-- Constraints for table `team_members`
--
ALTER TABLE `team_members`
  ADD CONSTRAINT `team_members_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team_info` (`team_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
