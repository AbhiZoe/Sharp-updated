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

$jobTitle = $jobs[$jobId];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Apply for a Job</title>
	<style>
		:root {
			--bg-start: #ecf4fc;
			--bg-end: #f9fbff;
			--card-bg: #ffffff;
			--text-main: #173553;
			--text-soft: #60758b;
			--line: #dbe8f5;
			--primary: #1f5fae;
			--primary-hover: #194f92;
			--focus: rgba(31, 95, 174, 0.2);
			--shadow: 0 14px 40px rgba(21, 58, 99, 0.14);
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
			background: linear-gradient(145deg, var(--bg-start), var(--bg-end));
			padding: 44px 14px;
		}

		.page-wrap {
			max-width: 1060px;
			margin: 0 auto;
		}

		.form-card {
			background: var(--card-bg);
			border-radius: var(--radius);
			box-shadow: var(--shadow);
			border: 1px solid #e5eef8;
			overflow: hidden;
		}

		.form-header {
			padding: 30px 28px 18px;
			border-bottom: 1px solid var(--line);
			background: linear-gradient(180deg, #ffffff 0%, #f7fbff 100%);
		}

		.form-header h1 {
			margin: 0;
			color: var(--primary);
			font-size: 1.85rem;
			letter-spacing: 0.01em;
		}

		.form-header p {
			margin: 10px 0 0;
			color: var(--text-soft);
			font-size: 0.97rem;
		}

		form {
			padding: 24px 28px 30px;
		}

		.grid {
			display: grid;
			grid-template-columns: repeat(2, minmax(0, 1fr));
			gap: 16px 18px;
		}

		.field {
			display: flex;
			flex-direction: column;
			gap: 7px;
		}

		label {
			font-size: 0.87rem;
			font-weight: 600;
			color: #36516a;
		}

		input,
		select,
		textarea {
			width: 100%;
			border: 1px solid var(--line);
			border-radius: 10px;
			min-height: 44px;
			padding: 10px 12px;
			font: inherit;
			color: var(--text-main);
			background: #fff;
			transition: border-color 0.18s ease, box-shadow 0.18s ease;
		}

		input:focus,
		select:focus,
		textarea:focus {
			outline: none;
			border-color: var(--primary);
			box-shadow: 0 0 0 3px var(--focus);
		}

		input[readonly] {
			background: #f7fafc;
		}

		.full {
			grid-column: 1 / -1;
		}

		.hint {
			margin-top: 4px;
			font-size: 0.81rem;
			color: var(--text-soft);
		}

		.actions {
			margin-top: 22px;
		}

		.submit-btn {
			width: 100%;
			max-width: 260px;
			min-height: 50px;
			border: none;
			border-radius: 11px;
			background: var(--primary);
			color: #fff;
			font-size: 1rem;
			font-weight: 700;
			letter-spacing: 0.01em;
			cursor: pointer;
			box-shadow: 0 10px 22px rgba(31, 95, 174, 0.25);
			transition: transform 0.16s ease, background-color 0.16s ease, box-shadow 0.16s ease;
		}

		.submit-btn:hover {
			background: var(--primary-hover);
			transform: translateY(-1px);
			box-shadow: 0 12px 24px rgba(25, 79, 146, 0.3);
		}

		.submit-btn:active {
			transform: translateY(0);
		}

		@media (max-width: 860px) {
			.grid {
				grid-template-columns: 1fr;
			}

			.form-header h1 {
				font-size: 1.6rem;
			}
		}

		@media (max-width: 620px) {
			body {
				padding: 20px 10px;
			}

			.form-header,
			form {
				padding-left: 14px;
				padding-right: 14px;
			}

			.form-header {
				padding-top: 22px;
				padding-bottom: 14px;
			}

			form {
				padding-top: 14px;
			}

			.submit-btn {
				max-width: 100%;
			}
		}
	</style>
</head>
<body>
	<main class="page-wrap">
		<section class="form-card" aria-labelledby="apply-title">
			<header class="form-header">
				<h1 id="apply-title">Apply for a Job</h1>
				<p>Submit your details to join Sharp Infotech. All fields are required.</p>
			</header>

			<form action="send-application.php?job=<?php echo $jobId; ?>" method="POST" enctype="multipart/form-data" id="jobApplicationForm">
				<div class="grid">
					<div class="field">
						<label for="first_name">First Name</label>
						<input type="text" id="first_name" name="first_name" required>
					</div>

					<div class="field">
						<label for="last_name">Last Name</label>
						<input type="text" id="last_name" name="last_name" required>
					</div>

					<div class="field">
						<label for="skills">Skills</label>
						<input type="text" id="skills" name="skills" placeholder="Example: Java, Spring Boot, AWS" required>
					</div>

					<div class="field">
						<label for="job_title">Job Title</label>
						<input type="text" id="job_title" name="job_title" value="<?php echo htmlspecialchars($jobTitle, ENT_QUOTES, 'UTF-8'); ?>" readonly required>
						<input type="hidden" name="job_id" value="<?php echo $jobId; ?>">
					</div>

					<div class="field">
						<label for="email">Email ID</label>
						<input type="email" id="email" name="email" required>
					</div>

					<div class="field">
						<label for="phone">Phone</label>
						<input type="tel" id="phone" name="phone" pattern="[0-9+\-()\s]{7,20}" required>
					</div>

					<div class="field">
						<label for="country">Country</label>
						<input type="text" id="country" name="country" required>
					</div>

					<div class="field">
						<label for="state">State</label>
						<input type="text" id="state" name="state" required>
					</div>

					<div class="field">
						<label for="city">City</label>
						<input type="text" id="city" name="city" required>
					</div>

					<div class="field">
						<label for="zip">Zip</label>
						<input type="text" id="zip" name="zip" required>
					</div>

					<div class="field">
						<label for="salary">Salary</label>
						<input type="text" id="salary" name="salary" placeholder="Expected salary" required>
					</div>

					<div class="field">
						<label for="latest_degree">Latest Degree</label>
						<input type="text" id="latest_degree" name="latest_degree" required>
					</div>

					<div class="field">
						<label for="notice_period">Notice Period</label>
						<input type="text" id="notice_period" name="notice_period" placeholder="Example: 30 days" required>
					</div>

					<div class="field">
						<label for="years_experience">Years of Experience</label>
						<input type="number" id="years_experience" name="years_experience" min="0" step="0.1" required>
					</div>

					<div class="field full">
						<label for="resume">Resume Upload</label>
						<input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" required>
						<p class="hint">Allowed file types: PDF, DOC, DOCX. Maximum size: 5MB.</p>
					</div>
				</div>

				<div class="actions">
					<button type="submit" class="submit-btn">Submit Application</button>
				</div>
			</form>
		</section>
	</main>

	<script>
		(function () {
			var form = document.getElementById('jobApplicationForm');
			var resume = document.getElementById('resume');
			var maxBytes = 5 * 1024 * 1024;
			var allowedExtensions = ['pdf', 'doc', 'docx'];

			form.addEventListener('submit', function (event) {
				if (!resume.files || !resume.files[0]) {
					return;
				}

				var file = resume.files[0];
				var fileNameParts = file.name.split('.');
				var extension = fileNameParts.length > 1 ? fileNameParts.pop().toLowerCase() : '';

				if (allowedExtensions.indexOf(extension) === -1) {
					event.preventDefault();
					alert('Only PDF, DOC, and DOCX files are allowed.');
					resume.value = '';
					return;
				}

				if (file.size > maxBytes) {
					event.preventDefault();
					alert('Resume file size must be 5MB or less.');
					resume.value = '';
				}
			});
		})();
	</script>
</body>
</html>
