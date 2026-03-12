<?php 
$sql = "SELECT * FROM lca1 ORDER BY sl DESC";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

while ($row = mysqli_fetch_assoc($result)) {

$date = date('m-d-Y', strtotime($row['posting_from']));

echo "<tr>
<td align='center'>{$row['name']}</td>
<td align='center'>{$row['soc_code']}</td>
<td align='center'>{$row['soc_title']}</td>
<td align='center'>{$row['state']}</td>
<td align='center'>{$row['city']}</td>
<td align='center'>{$date}</td>
<td align='center'>
<a href='../lca/{$row['file']}' target='_blank' style='color:black'>
<u>Attachment</u>
</a>
</td>
</tr>";
}
?>
<thead>
<tr>
<th style="text-align:center">Employee Name</th>
<th style="text-align:center">SOC Code</th>
<th style="text-align:center">Position Title</th>
<th style="text-align:center">State</th>
<th style="text-align:center">City</th>
<th style="text-align:center">Post Date</th>
<th style="text-align:center">Attachment</th>
</tr>
</thead>