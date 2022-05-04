<!DOCTYPE html>
<html>
	<head>
		<title>{{$title}}</title>
        <style>
            .first {
                color: red;
            }
            .last {
                color: green;
            }
            .red {
                color: red;
            }
            .green {
                color: green;
            }
        </style>
	</head>
	<body>
		{{$slot}}
	</body>
</html>
