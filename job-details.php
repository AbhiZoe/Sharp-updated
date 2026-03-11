<?php
$jobs = [
	1 => 'Software Developer',
	2 => 'Software Developer - Salesforce',
	3 => 'Software Developer - Java',
	4 => 'Software Developer',
	5 => 'Business Analyst - Loan IQ',
	6 => 'ETL Developer',
	7 => 'Salesforce Administrator',
	8 => 'Cyber Security Analyst',
	9 => 'Software Developer - Java Full Stack',
	10 => 'Data Scientist',
	11 => 'AWS Developer',
	12 => 'Salesforce Developer',
	13 => 'Hadoop Developer',
	14 => 'Systems Engineer - DevOps',
	15 => 'Software Developer - Python'
];

$jobId = isset($_GET['job']) ? (int)$_GET['job'] : 1;
if (!isset($jobs[$jobId])) {
	$jobId = 1;
}

$jobRole = $jobs[$jobId];
$company = ($jobId % 2 === 1) ? 'Sharp Infotech' : 'Sharp Infotech LLC';
$datePosted = 'Mar 12, 2026';
$lastDate = 'Apr 10, 2026';

$experienceByJob = [
	5 => '4-7 years',
	8 => '3-6 years',
	10 => '3-5 years',
	14 => '4-8 years'
];
$qualificationByJob = [
	5 => 'MBA / B.Tech in IT, Finance, or related discipline',
	8 => 'B.Tech / M.Tech in Cyber Security, Computer Science, or equivalent',
	10 => 'B.E. / B.Tech / M.Tech in Computer Science, Statistics, or related field',
	14 => 'B.E. / B.Tech in Computer Science, IT, or equivalent'
];
$salaryByJob = [
	5 => 'INR 12 - 20 LPA',
	8 => 'INR 10 - 18 LPA',
	10 => 'INR 11 - 22 LPA',
	14 => 'INR 12 - 21 LPA'
];

$requiredExperience = $experienceByJob[$jobId] ?? '2-5 years';
$requiredQualification = $qualificationByJob[$jobId] ?? 'B.E. / B.Tech / MCA in relevant discipline';
$salaryOffered = $salaryByJob[$jobId] ?? 'INR 8 - 16 LPA';
$jobLocation = 'Hyderabad / Bengaluru / Chennai (Hybrid)';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Job Details - <?php echo htmlspecialchars($jobRole, ENT_QUOTES, 'UTF-8'); ?></title>
	<style>
		:root {
			--bg-a: #edf4fb;
			--bg-b: #f8fbff;
			--card: #ffffff;
			--text-main: #1a3653;
			--text-soft: #60758b;
			--primary: #1f5fae;
			--line: #dce7f2;
			--shadow: 0 14px 38px rgba(18, 53, 95, 0.14);
			--green: #1f9a58;
			--green-hover: #1a844b;
		}

		* {
			box-sizing: border-box;
		}

		body {
			margin: 0;
			min-height: 100vh;
			font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
			color: var(--text-main);
			background: linear-gradient(145deg, var(--bg-a), var(--bg-b));
			padding: 48px 18px;
		}

		.details-shell {
			max-width: 1080px;
			margin: 0 auto;
		}

		.details-card {
			background: var(--card);
			border-radius: 18px;
			box-shadow: var(--shadow);
			border: 1px solid #e7eef6;
			overflow: hidden;
		}

		.details-header {
			padding: 34px 34px 20px;
			border-bottom: 1px solid var(--line);
			background: linear-gradient(180deg, #ffffff 0%, #f9fcff 100%);
		}

		.details-header h1 {
			margin: 0;
			font-size: 1.9rem;
			color: var(--primary);
			letter-spacing: 0.01em;
		}

		.details-header p {
			margin: 10px 0 0;
			color: var(--text-soft);
			font-size: 0.98rem;
		}

		.meta-grid {
			display: grid;
			grid-template-columns: repeat(2, minmax(0, 1fr));
			gap: 26px;
			padding: 26px 34px 22px;
		}

		.meta-col {
			border: 1px solid var(--line);
			border-radius: 14px;
			padding: 18px 18px 10px;
			background: #fcfdff;
		}

		.meta-item {
			padding: 0 0 14px;
			margin: 0 0 14px;
			border-bottom: 1px dashed #e1eaf4;
		}

		.meta-item:last-child {
			margin-bottom: 0;
			padding-bottom: 0;
			border-bottom: none;
		}

		.meta-label {
			display: block;
			font-size: 0.82rem;
			text-transform: uppercase;
			letter-spacing: 0.05em;
			color: var(--text-soft);
			margin-bottom: 6px;
		}

		.meta-value {
			font-size: 1rem;
			font-weight: 600;
			color: var(--text-main);
			line-height: 1.35;
		}

		.description {
			padding: 0 34px 26px;
		}

		.description h2 {
			margin: 4px 0 10px;
			font-size: 1.24rem;
			color: #1e4e80;
		}

		.description p {
			margin: 0;
			color: #334d66;
			font-size: 0.98rem;
			line-height: 1.78;
		}

		.footer-action {
			padding: 0 34px 36px;
		}

		.apply-btn {
			display: inline-flex;
			align-items: center;
			justify-content: center;
			width: 100%;
			max-width: 380px;
			min-height: 52px;
			border-radius: 12px;
			background: var(--green);
			color: #fff;
			text-decoration: none;
			font-size: 1.03rem;
			font-weight: 700;
			letter-spacing: 0.01em;
			box-shadow: 0 10px 22px rgba(31, 154, 88, 0.25);
			transition: transform 0.17s ease, box-shadow 0.17s ease, background-color 0.17s ease;
		}

		.apply-btn:hover {
			background: var(--green-hover);
			transform: translateY(-1px);
			box-shadow: 0 12px 24px rgba(26, 132, 75, 0.28);
		}

		.apply-btn:active {
			transform: translateY(0);
		}

		@media (max-width: 860px) {
			.meta-grid {
				grid-template-columns: 1fr;
			}

			.details-header h1 {
				font-size: 1.6rem;
			}
		}

		@media (max-width: 620px) {
			body {
				padding: 24px 10px;
			}

			.details-header,
			.meta-grid,
			.description,
			.footer-action {
				padding-left: 14px;
				padding-right: 14px;
			}

			.details-header {
				padding-top: 24px;
				padding-bottom: 14px;
			}

			.meta-grid {
				gap: 14px;
				padding-top: 14px;
			}
		}
	</style>
</head>
<body>
	<main class="details-shell">
		<article class="details-card">
			<header class="details-header">
				<h1><?php echo htmlspecialchars($jobRole, ENT_QUOTES, 'UTF-8'); ?></h1>
				<p>Sharp Infotech hiring portal - opportunity details and role expectations.</p>
			</header>

			<section class="meta-grid" aria-label="Job Overview">
				<div class="meta-col">
					<div class="meta-item">
						<span class="meta-label">Job Role</span>
						<div class="meta-value"><?php echo htmlspecialchars($jobRole, ENT_QUOTES, 'UTF-8'); ?></div>
					</div>
					<div class="meta-item">
						<span class="meta-label">Company Posted</span>
						<div class="meta-value"><?php echo htmlspecialchars($company, ENT_QUOTES, 'UTF-8'); ?></div>
					</div>
					<div class="meta-item">
						<span class="meta-label">Date Posted</span>
						<div class="meta-value"><?php echo $datePosted; ?></div>
					</div>
					<div class="meta-item">
						<span class="meta-label">Last Date</span>
						<div class="meta-value"><?php echo $lastDate; ?></div>
					</div>
				</div>

				<div class="meta-col">
					<div class="meta-item">
						<span class="meta-label">Required Experience</span>
						<div class="meta-value"><?php echo htmlspecialchars($requiredExperience, ENT_QUOTES, 'UTF-8'); ?></div>
					</div>
					<div class="meta-item">
						<span class="meta-label">Required Qualification</span>
						<div class="meta-value"><?php echo htmlspecialchars($requiredQualification, ENT_QUOTES, 'UTF-8'); ?></div>
					</div>
					<div class="meta-item">
						<span class="meta-label">Salary Offered</span>
						<div class="meta-value"><?php echo htmlspecialchars($salaryOffered, ENT_QUOTES, 'UTF-8'); ?></div>
					</div>
					<div class="meta-item">
						<span class="meta-label">Job Location</span>
						<div class="meta-value"><?php echo htmlspecialchars($jobLocation, ENT_QUOTES, 'UTF-8'); ?></div>
					</div>
				</div>
			</section>

			<section class="description">
				<h2>Role Description</h2>
				<p>
					We are seeking a highly motivated professional to join Sharp Infotech and contribute to enterprise-grade digital solutions for global clients. In this role, you will work across modern technology stacks and collaborative engineering practices, including Java development, Spring Boot services, scalable Microservices architecture, cloud deployments on AWS, containerized environments using Docker, secure and high-performance REST APIs, Agile development workflows, and automated CI/CD pipelines. You will partner with product, QA, and operations teams to deliver resilient, maintainable, and business-focused software while ensuring quality, security, and operational excellence at every stage of the lifecycle. This role offers strong growth opportunities, cross-functional exposure, and the ability to contribute to impactful transformation initiatives in a fast-paced corporate environment.
				</p>
			</section>

			<div class="footer-action">
				<a class="apply-btn" href="apply-job.php?job=<?php echo $jobId; ?>">Apply for this Job</a>
			</div>
		</article>
	</main>
</body>
</html>
