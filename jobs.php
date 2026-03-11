<?php
$jobTitles = [
	'Software Developer',
	'Software Developer - Salesforce',
	'Software Developer - Java',
	'Software Developer',
	'Business Analyst - Loan IQ',
	'ETL Developer',
	'Salesforce Administrator',
	'Cyber Security Analyst',
	'Software Developer - Java Full Stack',
	'Data Scientist',
	'AWS Developer',
	'Salesforce Developer',
	'Hadoop Developer',
	'Systems Engineer - DevOps',
	'Software Developer - Python'
];

$companies = ['Sharp Infotech', 'Sharp Infotech LLC'];
$postedDate = 'Mar 12, 2026';
$lastDate = 'Apr 10, 2026';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Current Job Openings</title>
	<style>
		:root {
			--bg-start: #eef4fb;
			--bg-end: #f9fbff;
			--card: #ffffff;
			--text-main: #17324d;
			--text-muted: #5f7388;
			--line: #dbe6f2;
			--head: #f4f8fc;
			--primary: #1f5fae;
			--primary-hover: #184d8f;
			--secondary: #2d73c9;
			--secondary-hover: #215ea8;
			--shadow: 0 14px 40px rgba(24, 60, 102, 0.12);
			--radius: 16px;
		}

		* {
			box-sizing: border-box;
		}

		body {
			margin: 0;
			min-height: 100vh;
			font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
			color: var(--text-main);
			background: linear-gradient(140deg, var(--bg-start), var(--bg-end));
			padding: 48px 20px;
		}

		.jobs-wrapper {
			max-width: 1180px;
			margin: 0 auto;
		}

		.jobs-card {
			background: var(--card);
			border-radius: var(--radius);
			box-shadow: var(--shadow);
			overflow: hidden;
			border: 1px solid #e6edf6;
		}

		.jobs-header {
			padding: 34px 32px 20px;
			text-align: center;
		}

		.jobs-header h1 {
			margin: 0;
			font-size: 2rem;
			letter-spacing: 0.01em;
		}

		.jobs-header p {
			margin: 10px 0 0;
			color: var(--text-muted);
			font-size: 0.98rem;
		}

		.table-area {
			padding: 0 24px 24px;
			overflow-x: auto;
		}

		table {
			width: 100%;
			border-collapse: separate;
			border-spacing: 0;
			border: 1px solid var(--line);
			border-radius: 14px;
			overflow: hidden;
			background: #fff;
		}

		thead th {
			background: var(--head);
			color: var(--text-main);
			font-size: 0.9rem;
			font-weight: 600;
			text-transform: uppercase;
			letter-spacing: 0.02em;
			padding: 14px 12px;
			border-bottom: 1px solid var(--line);
			white-space: nowrap;
		}

		tbody td {
			padding: 14px 12px;
			border-bottom: 1px solid #edf3fa;
			font-size: 0.95rem;
			vertical-align: middle;
		}

		tbody tr:last-child td {
			border-bottom: none;
		}

		tbody tr {
			transition: background-color 0.2s ease;
		}

		tbody tr:hover {
			background: #f6faff;
		}

		.company {
			font-weight: 600;
			color: #214767;
		}

		.date {
			color: var(--text-muted);
			white-space: nowrap;
		}

		.btn {
			display: inline-flex;
			align-items: center;
			justify-content: center;
			min-width: 84px;
			padding: 9px 14px;
			border-radius: 9px;
			color: #fff;
			text-decoration: none;
			font-size: 0.88rem;
			font-weight: 600;
			border: none;
			transition: transform 0.16s ease, box-shadow 0.16s ease, background-color 0.16s ease;
			box-shadow: 0 6px 14px rgba(33, 94, 168, 0.2);
		}

		.btn:hover {
			transform: translateY(-1px);
		}

		.btn:active {
			transform: translateY(0);
		}

		.btn-details {
			background: var(--secondary);
		}

		.btn-details:hover {
			background: var(--secondary-hover);
		}

		.btn-apply {
			background: var(--primary);
		}

		.btn-apply:hover {
			background: var(--primary-hover);
		}

		@media (max-width: 900px) {
			.jobs-header h1 {
				font-size: 1.65rem;
			}

			thead th,
			tbody td {
				padding: 12px 10px;
				font-size: 0.88rem;
			}

			.btn {
				min-width: 76px;
				padding: 8px 12px;
				font-size: 0.84rem;
			}
		}

		@media (max-width: 640px) {
			body {
				padding: 26px 12px;
			}

			.jobs-header {
				padding: 24px 16px 14px;
			}

			.table-area {
				padding: 0 10px 14px;
			}
		}
	</style>
</head>
<body>
	<main class="jobs-wrapper">
		<section class="jobs-card" aria-labelledby="job-openings-title">
			<header class="jobs-header">
				<h1 id="job-openings-title">Current Job Openings</h1>
				<p>Explore opportunities at Sharp Infotech and apply to your next role.</p>
			</header>

			<div class="table-area">
				<table aria-label="Current Job Openings">
					<thead>
						<tr>
							<th>Title</th>
							<th>Company</th>
							<th>Posted</th>
							<th>Last Date</th>
							<th>Job Details</th>
							<th>Apply</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($jobTitles as $index => $title): ?>
							<?php $jobId = $index + 1; ?>
							<tr>
								<td><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></td>
								<td class="company"><?php echo $companies[$index % 2]; ?></td>
								<td class="date"><?php echo $postedDate; ?></td>
								<td class="date"><?php echo $lastDate; ?></td>
								<td>
									<a class="btn btn-details" href="job-details.php?job=<?php echo $jobId; ?>">Details</a>
								</td>
								<td>
									<a class="btn btn-apply" href="apply-job.php?job=<?php echo $jobId; ?>">Apply</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</section>
	</main>
</body>
</html>
