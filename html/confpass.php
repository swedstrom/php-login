
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
37
38
39
40
41
42
43
44
45
46
47
48
49
50
51
52
53
54
55
56
57
58
59
60
61
62
63
64
65
66
67
68
69
70
71
72
73
74
<!DOCTYPE html>
<html>
	<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>Confirm Password validation using jQuery</title>
	<script>
		var allowsubmit = false;
		$(function(){
			//on keypress 
			$('#confpass').keyup(function(e){
				//get values 
				var pass = $('#pass').val();
				var confpass = $(this).val();
				
				//check the strings
				if(pass == confpass){
					//if both are same remove the error and allow to submit
					$('.error').text('');
					allowsubmit = true;
				}else{
					//if not matching show error and not allow to submit
					$('.error').text('Password not matching');
					allowsubmit = false;
				}
			});
			
			//jquery form submit
			$('#form').submit(function(){
			
				var pass = $('#pass').val();
				var confpass = $('#confpass').val();
 
				//just to make sure once again during submit
				//if both are true then only allow submit
				if(pass == confpass){
					allowsubmit = true;
				}
				if(allowsubmit){
					return true;
				}else{
					return false;
				}
			});
		});
	</script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<h2>Confirm Password validation using jQuery!</h2>
				<hr />
				<div class="form-group">
					<form action="" id="form" method="post">
						<div class="form-group">
							<label for="desc">Password:</label> 
							<input type="password" class="form-control" name="pass" id="pass" required>
						</div>
						<div class="form-group">
							<label for="desc">Confirm Password:</label> 
							<input type="password" class="form-control" name="confpass" id="confpass" required>
						</div>
						<div class="form-group">
							<span class="error" style="color:red"></span><br />
						</div>
						<button type="submit" name="submit" class="btn btn-default">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
