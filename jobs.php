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

<title>Careers | Sharp Infotech</title>

<style>

body{
    margin:0;
    font-family:"Segoe UI",sans-serif;
    background:#f3f7fb;
}

/* Header */

.header{
    background:#1f4c7a;
    color:white;
    padding:30px;
    text-align:center;
}

.header h1{
    margin:0;
    font-size:32px;
}

.header p{
    margin-top:8px;
    opacity:0.9;
}

/* Container */

.container{
    width:90%;
    max-width:1200px;
    margin:auto;
    margin-top:40px;
}

/* Job Grid */

.job-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(320px,1fr));
    gap:25px;
}

/* Job Card */

.job-card{
    background:white;
    padding:24px;
    border-radius:10px;
    box-shadow:0 6px 20px rgba(0,0,0,0.08);
    transition:0.25s;
}

.job-card:hover{
    transform:translateY(-5px);
    box-shadow:0 10px 28px rgba(0,0,0,0.15);
}

.job-title{
    font-size:20px;
    font-weight:600;
    color:#1f4c7a;
    margin-bottom:12px;
}

.job-meta{
    font-size:14px;
    color:#555;
    margin-bottom:6px;
}

/* Buttons */

.job-actions{
    margin-top:18px;
}

.btn{
    display:inline-block;
    padding:9px 16px;
    border-radius:6px;
    text-decoration:none;
    font-size:14px;
    font-weight:600;
    margin-right:8px;
}

.btn-details{
    background:#2f4c6a;
    color:white;
}

.btn-details:hover{
    background:#22384f;
}

.btn-apply{
    background:#1aa37a;
    color:white;
}

.btn-apply:hover{
    background:#128a67;
}

/* Responsive */

@media(max-width:600px){

.header h1{
    font-size:24px;
}

}

</style>

</head>

<body>

<div class="header">
    <h1>Current Job Openings</h1>
    <p>Explore career opportunities at Sharp Infotech</p>
</div>


<div class="container">

<div class="job-grid">

<?php foreach ($jobTitles as $index => $title): ?>
<?php $jobId = $index + 1; ?>

<div class="job-card">

<div class="job-title">
<?php echo htmlspecialchars($title); ?>
</div>

<div class="job-meta">
<strong>Company:</strong> <?php echo $companies[$index % 2]; ?>
</div>

<div class="job-meta">
<strong>Posted:</strong> <?php echo $postedDate; ?>
</div>

<div class="job-meta">
<strong>Last Date:</strong> <?php echo $lastDate; ?>
</div>

<div class="job-actions">

<a class="btn btn-details"
href="job-details.php?job=<?php echo $jobId; ?>">
Details
</a>

<a class="btn btn-apply"
href="apply-job.php?job=<?php echo $jobId; ?>">
Apply
</a>

</div>

</div>

<?php endforeach; ?>

</div>

</div>

</body>
</html>