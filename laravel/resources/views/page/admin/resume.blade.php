<?php #echo "<pre>"; print_r($resume); die ?>
<html>
<head>
	<title>Candidate Resume</title>
</head>
<body>
{{ asset('career_uploads/'.$resume) }}
	<iframe src="{{ asset('career_uploads/'.$resume) }}" width="100%" height="600"></iframe>
</body>
</html>