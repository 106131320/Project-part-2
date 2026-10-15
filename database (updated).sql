-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2026 at 07:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
  `EOI_number` int(11) NOT NULL,
  `job_reference_number` varchar(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `street_address` varchar(40) NOT NULL,
  `suburb_town` varchar(40) NOT NULL,
  `state` varchar(3) NOT NULL,
  `postcode` char(4) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `skill1` varchar(50) DEFAULT NULL,
  `skill2` varchar(50) DEFAULT NULL,
  `skill3` varchar(50) DEFAULT NULL,
  `skill4` varchar(50) DEFAULT NULL,
  `other_skills` text DEFAULT NULL,
  `status` enum('New','Current','Final') DEFAULT 'New',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  ADD PRIMARY KEY (`EOI_number`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD UNIQUE KEY `job_reference_number` (`job_reference_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `EOI_number` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
