<!DOCTYPE html>
<html lang="en">

<!--- meta elements -->
<head>
  <meta charset="utf-8">
  <meta name="description" content="Job Description for available roles at Cyber Snug">
  <meta name="keywords" content="Cyber Snug, careers, cyber security engineer, cyber security architect, cyber security assurance analyst, digital forensics examiner, job description">
  <meta name="author" content="html wizards">
  <title>Position Description</title>
<link rel="stylesheet" href="./styles/styles.css" type="text/css">
<!--- added the link to stylesheet -->

<!--- embedded CSS -->

  <style>
  h2 {
    -webkit-text-stroke: 1px #AEAFFF;
    color: black;
  }
  </style>

</head>

<body>
  <header>
  <!--- added links to each page -->
  <!--main site nav, including logo lightbox popup-->
  <nav>
    <ul>
      <li>
        <a href="#logo-lightbox">
        <img id="logo" src="images/Cyber_Snug_FINAL.png" alt="Company Logo">
        </a>
      </li>
      <li><a href="./">Home</a></li>
      <li><a href="./jobs.php">Available Jobs</a></li>
     <li><a href="./apply.php">Application Form</a></li>
     <li><a href="./about.php">About Us</a></li>
    </ul>
  </nav>
  </header>

  <!--Hidden lightbox that displays enlarged version of logo when nav logo link is clicked-->
  <div class="lightbox" id="logo-lightbox">
    <a href="#" aria-label="Close">
      <span style="background-image: url('images/Cyber_Snug_FINAL.png');"></span> <!--- inline css -->
    </a>
  </div>


  <main class="jobs_main">
    <section class="available_jobs">
    <h1>Available Jobs</h1> 
    
    <!--- inline CSS -->
    <p style="font-size: 1.2em; font-weight: 500;">Cyber Snug is a cybersecurity company expanding its digital team to support secure client portals, cyber awareness websites, incident reporting systems, and online security services. We are looking for talented individuals to join our team in the following roles:</p>
      <h1>Needed Positions</h1>
    <div class="menu">
      <a href ="#engineer">Cyber Security Engineer</a>
      <a href="#architect">Cyber Security Architect</a>
      <a href="#security">Cyber Security Assurance Analyst</a>
      <a href="#examiner">Digital Forensics Examiner</a>
    </div>
    </section>
    <article class="job_description">
      <h2 id="engineer">Cyber Security Engineer</h2>
      <!-- Job summary details: reference number, salary, reporting line -->
      <section id="engineer-details">
        <h3>Position Details</h3>
        <ul>
          <li><strong>Reference Number:</strong> CS481E</li>
          <li><strong>Salary:</strong> $62 - $70 per hour</li>
          <li><strong>Reporting Line:</strong> Reports to the IT Security Manager, with escalations and threat updates provided to senior management</li>
        </ul>
      </section>

      <aside class="jobs_aside"  id="engineer-description">
        <h3>Short Description</h3>
        <p>Cyber Snug is a cybersecurity company expanding its digital team to support secure client portals, cyber awareness websites, incident reporting systems, and online security services. We are looking for a Cyber Security Engineer to protect our computer networks, systems, websites, and applications, and to help build the secure digital products our clients rely on.</p>
        <p>Cyber Snug builds and maintains secure digital services for clients, including client portals, cyber awareness education websites, and incident reporting systems. Joining our security team means working on tools that directly reduce risk for real businesses, alongside colleagues who take a methodical, detail-focused approach to an ever-evolving field.</p>
      </aside>
 
    
      <section id="engineer-responsibilities">
        <h3>Key Responsibilities</h3>
        <ol>
          <li>Develop, build, maintain, and test security systems and monitor their effectiveness</li>
          <li>Identify vulnerabilities in hardware, software, and applications used across client portals and internal systems</li>
          <li>Plan and develop security strategies for Cyber Snug's IT infrastructure and client-facing services</li>
          <li>Introduce security upgrades and replacements as required</li>
          <li>Respond to security breaches and investigate how they occurred, including incidents raised through our incident reporting systems</li>
          <li>Work with developers to identify and remediate security issues, and participate in code reviews</li>
          <li>Assess the security of third-party software components and libraries used in Cyber Snug products</li>
          <li>Report to senior management on potential threats, proposed improvements, and ongoing security issues</li>
        </ol>
      </section>
    
      <section id="engineer-essential-requirements">
        <h3>Essential Requirements</h3>
        <ul>
          <li>University degree in computer science, information technology, systems engineering, computer programming, or a related field</li>
          <li>Working experience in a similar Cyber Security or systems administration role</li>
          <li>Strong understanding of secure coding practices and the ability to conduct security testing and vulnerability assessments</li>
          <li>Proficiency with tools such as Python, JavaScript, Wireshark, Metasploit, Nmap, and Burp Suite</li>
          <li>Experience with network security monitoring, encryption tools, penetration testing, and intrusion detection</li>
          <li>Strong problem-solving skills, attention to detail, and the ability to stay calm and methodical under pressure</li>
        </ul>
      </section>
    
      <section id="engineer-preferable-requirements">
        <h3>Preferable Requirements</h3>
        <ul>
          <li>Industry-recognised cyber security certifications (e.g. CISSP, CISM, CRISC, or GIAC)</li>
          <li>Experience with Privileged Access Management (PAM) and Identity and Access Management (IAM)</li>
          <li>Exposure to security automation and workflow platforms to improve detection, response, and reporting</li>
          <li>Familiarity with additional programming languages such as Ruby, Node, or PowerShell</li>
          <li>Prior experience working alongside ethical hackers or in penetration testing engagements</li>
        </ul>
      </section>
    </article>
  
 
    <article class="job_description">
      <h2 id="architect">Cyber Security Architect</h2>
      <!-- Job summary details: reference number, salary, reporting line -->
      <section id="architect-details">
        <h3>Position Details</h3>
        <ul>
          <li><strong>Reference Number:</strong> CS519A</li>
          <li><strong>Salary:</strong> $100 - $110 per hour</li>
          <!-- Reporting line involves collaboration with senior stakeholders and heading design teams -->
          <li><strong>Reporting Line:</strong> Reports to the Chief Information Security Officer (CISO), and may lead a security design team on major projects</li>
        </ul>
      </section>
 
      <aside class="jobs_aside"  id="architect-description">
        <h3>Short Description</h3>
        <p>Cyber Snug is seeking a Cyber Security Architect to design and implement secure information technology systems across our client portals, cyber awareness websites, and incident reporting platforms. This role identifies potential vulnerabilities and designs the security controls that keep our clients' information and systems confidential, intact, and available.</p>
        <p>As a Cyber Security Architect at Cyber Snug, you'll shape the security patterns and controls used across every product we build for clients, from portal logins to awareness training platforms. You'll work closely with our engineering team, translating business requirements into practical, implementable security designs while staying ahead of emerging threats.</p>    
      </aside>
 
 
      <section id="architect-responsibilities">
        <h3>Key Responsibilities</h3>
        <ol>
          <li>Design and implement secure IT systems to protect sensitive client information and infrastructure</li>
          <li>Develop and review cyber security architectures, solution designs, security controls, and patterns</li>
          <li>Identify security threats, risks, and control gaps, and recommend practical, implementable solutions</li>
          <li>Conduct security assessments and audits to evaluate the effectiveness of existing security measures</li>
          <li>Collaborate with engineering and IT teams to integrate security best practices into system architecture</li>
          <li>Translate business, functional, and non-functional requirements into appropriate security solutions</li>
          <li>Stay updated on emerging cyber threats and technologies to inform Cyber Snug's security strategy</li>
          <li>Develop and maintain documentation for security policies, procedures, and architecture</li>
        </ol>
      </section>
    
      <section id="architect-essential-requirements">
        <h3>Essential Requirements</h3>
        <ul>
          <li>Bachelor's degree in Cyber Security, Information Technology, or a related field</li>
          <li>Proven experience in cybersecurity architecture and system design</li>
          <li>Strong knowledge of security frameworks, standards, and best practices</li>
          <li>Proficiency with security tools and technologies, including firewalls, intrusion detection systems, and encryption methods</li>
          <li>Experience with risk assessment and management methodologies</li>
          <li>Exceptional analytical and problem-solving skills, with strong communication skills for engaging both technical and non-technical stakeholders</li>
        </ul>
      </section>

      <section id="architect-preferable-requirements">
        <h3>Preferable Requirements</h3>
        <ul>
          <li>Relevant certifications such as CISSP, CISM, CEH, or SABSA</li>
          <li>Experience working across both Agile and Waterfall delivery environments</li>
          <li>Experience providing technical leadership and mentoring to delivery teams</li>
          <li>Background working with technology partners, vendors, and third parties on complex projects</li>
        </ul>
      </section>
    </article>
  
  
    <article class="job_description">
      <h2 id="security">Cyber Security Assurance Analyst</h2>
      <section id="security-details">
        <!-- Job summary details: reference number, salary, reporting line -->
        <h3>Position Details</h3>
        <ul>
          <li><strong>Reference Number:</strong> CS814B </li>
          <li><strong>Salary:</strong> $57 - $77 per hour </li>
          <li><strong>Reporting Line:</strong> Chief Information Security Officer (CISO) and Chief Risk Officer (CRO) </li>
        </ul>
      </section>

      <aside class="jobs_aside"  id="security-description">
        <h3>Short Description</h3>
        <p>Cyber Snug is seeking a Cyber Security Assurance Analyst to monitor and investigate for threats across our networks. This role is responsible for managing firewalls and encryption algorithms, as well as fixing vulnerabilities and assessing cybersecurity risks.</p>
        <p>As a Cyber Security Assurance Analyst at Cyber Snug, you'll work with our IT team to be in charge of safeguarding hardware, software and networks from cyber threats and security breaches, and implement and configure security patches and tools. </p>
      </aside>



      <section id="security-responsibilities">
        <h3>Key Responsibilities</h3>
        <ol>
          <li>Continuously monitor networks, systems, and applications for suspicious activity, unauthorised access, and potential vulnerabilities.</li>
          <li>Analyse security alerts, determine root causes of breaches, and assess the impact on data and infrastructure.</li>
          <li>Conduct vulnerability and risk assessments to identify security loopholes and prioritise remediation.</li>
          <li>Research emerging cyber threats, maintain awareness of the threat landscape, and develop strategies to address future risks.</li>
          <li>Coordinate responses to security incidents, including malware analysis and recovery process implementation.</li>
          <li>Educate staff on best practices to prevent phishing, social engineering, and other threats.</li>
        </ol>
      </section>

      <section id="security-essential-requirements">
        <h3>Essential Requirements</h3>
        <ul>
          <li>Bachelor's degree in IT, Cybersecurity, or a related field, or equivalent professional experience.</li>
          <li>Proficiency with SIEM tools, vulnerability scanners, and network security devices.</li>
          <li>Ability to interpret and act on security logs, alerts, and scan results.</li>
          <li>Strong analytical and problem-solving skills.</li>
          <li>Ability to communicate technical findings to non-technical stakeholders.</li>
        </ul>
      </section>

      <section id="security-preferable-requirements">
        <h3>Preferable Requirements</h3>
        <ul>
          <li>Relevant certifications such as CISSP, CISA, CISM, CEH, or other recognised cybersecurity credentials.</li>
          <li>Industry training in risk management, compliance, or security assurance.</li>
          <li>Experience in close collaborations with IT, procurement, and project teams.</li>
        </ul>
      </section>
    </article>


    <article class="job_description">
      <h2 id="examiner">Digital Forensic Examiner</h2>
      <!-- Job summary details: reference number, salary, reporting line -->
      <section id="examiner-details">
        <h3>Position Details</h3>
        <ul>
          <li><strong>Reference Number:</strong> CS5264 </li>
          <li><strong>Salary:</strong> $40 - $55 per hour </li>
          <li><strong>Reporting Line:</strong> Chief Information Security Officer (CISO), Head of Investigations, or a forensic services manager </li>
        </ul>
      </section>

      <aside class="jobs_aside" id="examiner-description">
        <h3>Short Description</h3>
        <p>Cyber Snug is seeking a Digital Forensic Examiner to collect, analyze, and preserve digital evidence to support law enforcement, legal proceedings, and cybersecurity investigations. This role is responsible for managing firewalls and encryption algorithms, as well as fixing vulnerabilities and assessing cybersecurity risks.</p>
        <p>As a Digital Forensic Examiner at Cyber Snug, you'll work closely with supervisors, law enforcement personnel, and other stakeholders to recover and analyze data from digital devices. </p>
    </aside>


      <section id="examiner-responsibilities">
        <h3>Key Responsibilities</h3>
        <ol>
          <li>Conducting forensic examinations of electronic devices using specialized software and hardware tools to extract, preserve, and analyze evidence.</li>
          <li>Assisting law enforcement and legal teams in preparing search warrants, investigative reports, and court documentation.</li>
          <li>Providing on-scene technical guidance during the execution of search warrants or digital investigations.</li>
          <li>Maintaining and ensuring the integrity of digital evidence for legal admissibility.</li>
          <li>Preparing detailed forensic reports and presenting findings in court as an expert witness.</li>
          <li>Detecting malware, network intrusions, and other digital crimes.</li>
        </ol>
      </section>

      <section id="examiner-essential-requirements">
        <h3>Essential Requirements</h3>
        <ul>
          <li>Bachelor's degree in IT, Cybersecurity, Digital Forensics or a related field.</li>
          <li>Specialized training in digital forensics tools, legal processes, and evidence handling.</li>
          <li>Proficiency in operating systems, networking, and cybersecurity concepts.</li>
          <li>Understand and comply with privacy, evidence handling, and legal obligations.</li>
          <li>Ability to prepare clear reports and testify effectively in legal proceedings.</li>
        </ul>
      </section>

      <section id="examiner-preferable-requirements">
        <h3>Preferable Requirements</h3>
        <ul>
          <li>Relevant certifications such as  CDFE, GCFE, GCFA, EnCE, CCE, or other recognized digital forensics credentials</li>
          <li>Experience in IT, cybersecurity, incident response, or law enforcement technology roles.</li>
          <li>Internships with law enforcement agencies, cybersecurity firms, or corporate security teams.</li>
        </ul>
      </section>
    </article>
  </main>

  <footer>
  <!--Site footer with links Github repo, Jira Board and contact email-->
    <p ><a href="https://github.com/106131320/Project-part-1" target="_blank">Cyber Snug's Github Page!</a></p>
    <p ><a href="https://snugcyber.atlassian.net?continue=https%3A%2F%2Fsnugcyber.atlassian.net%2Fwelcome%2Fsoftware&atlOrigin=eyJpIjoiZGUwYWVmOGFkY2FlNDNkOGJjMmJmNWQ0NGI5NGQwYzEiLCJwIjoiaiJ9" 
    target="_blank">Cyber Snug's Jira portfolio </a></p>
    <p ><a href="mailto:snugcyber@gmail.com" target="_blank">snugcyber@gmail.com</a></p>
  </footer>
</body>



</html>
