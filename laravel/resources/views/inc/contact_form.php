<?php #echo "<pre>"; print_r($hidden_fields); die; ?>
<form id="" method="post" action="<?php echo siteUrl.'Query' ?>" class="join_form" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false">

<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">

<input type="hidden" name="query_type" value="<?php echo $hidden_fields['Query_Type'] ?>">

<!-- <?php if($hidden_fields['Service']!=null){ ?>
	<input type="hidden" name="txtService" value="<?php echo $data_service[0]->title ?>">
<?php } ?> -->
			
		<h3>Let's create beautiful things together.</h3>
			<div class="input_control">
				<input type="text" placeholder="" name="txtName" class="inputText" required="">
				<span class="border"></span>
				<span class="floating-label"">Your Name</span>
			</div>
			<div class="input_control">
				<input type="email" placeholder="" name="txtEmail" class="inputText" required="">
				<span class="border"></span>
				<span class="floating-label"">Email Address</span>
			</div>
			<div class="row">
				<div class="col-md-4">
				<div class="input_control">
					<input type="text" placeholder="" name="txtCCode" class="inputText" maxlength="7">
					<span class="border"></span>
					<span class="floating-label"">Country Code</span>
				</div>
				</div>
				<div class="col-md-8">
					<div class="input_control">
					<input type="text" placeholder="" name="txtContact" class="inputText" maxlength="12" required="">
					<span class="border"></span>
					<span class="floating-label"">Contact Number</span>
					</div>
				</div>
			</div>
			<div class="input_control">
				<span class="input_limit">( upto 500 words )</span>
				<input type="text" maxlength="500" placeholder="" name="txtMessage" class="inputText" required="">
				<span class="border"></span>
				<span class="floating-label"">Message</span>
			</div>
			<input type="submit" onclick="DisableBtn()" id="myButton" value="SUBMIT REQUEST">
		</form>