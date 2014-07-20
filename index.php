<!DOCTYPE HTML>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Twig Builder (BETA)</title>
	<link rel="stylesheet" href="/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="codemirror.css">
	<link rel="stylesheet" href="eclipse.css">

	<script src="/js/jquery-1.9.1.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="/js/bootstrap.min.js"></script>

	<style>
	
	textarea { width: 100%; height: 500px;}
	
	body { background-opacity: 70%;}
	ul{padding-left:10px;}
	ul{font-size: 12px;}
	
	.dropdown-submenu{position:relative;}
	.dropdown-submenu>.dropdown-menu{top:0;left:100%;margin-top:-6px;margin-left:-1px;-webkit-border-radius:0 6px 6px 6px;-moz-border-radius:0 6px 6px 6px;border-radius:0 6px 6px 6px;}
	.dropdown-submenu:hover>.dropdown-menu{display:block;}
	.dropdown-submenu>a:after{display:block;content:" ";float:right;width:0;height:0;border-color:transparent;border-style:solid;border-width:5px 0 5px 5px;border-left-color:#cccccc;margin-top:5px;margin-right:-10px;}
	.dropdown-submenu:hover>a:after{border-left-color:#ffffff;}
	.dropdown-submenu.pull-left{float:none;}.dropdown-submenu.pull-left>.dropdown-menu{left:-100%;margin-left:10px;-webkit-border-radius:6px 0 6px 6px;-moz-border-radius:6px 0 6px 6px;border-radius:6px 0 6px 6px;}
	#show-error { color:red;}
	#show-error.disabled { color:grey;}
	</style>
	
	<script src="codemirror.js"></script>
	<script src="jinja2.js"></script>
	<script>
	$(function(){
		window.myCodeMirror = CodeMirror.fromTextArea(document.getElementById("twig"), {

			mode:"jinja2",
			indentWithTabs: true,
		    smartIndent: true,
		    lineNumbers: true,
		    matchBrackets : true,
		    viewportMargin: Infinity,
			lineWrapping: true,
			htmlMode: true

		});
		
	})
	</script>
	
</head>
<body class="">
	
	<div class="container">

		<div class="row">
		  <div class="col-md-8 col-md-offset-2">
			<h2>Twig Builder (BETA)</h2>
		&nbsp;			
		</div>
		</div>
		
		<div class="row">
		  <div class="col-md-2">
			
		  </div>
		  <div class="col-md-6">
			<ul class="nav nav-pills">
			      <li class="dropdown">
				<!--
			        <a id="drop4" role="button" data-toggle="dropdown" href="#">Dropdown <span class="caret"></span></a>
			        <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop4">
			          <li role="presentation"><a role="menuitem" tabindex="-1" href="http://twitter.com/fat">Action</a></li>
			          <li role="presentation"><a role="menuitem" tabindex="-1" href="http://twitter.com/fat">Another action</a></li>
			          <li role="presentation"><a role="menuitem" tabindex="-1" href="http://twitter.com/fat">Something else here</a></li>
			          <li role="presentation" class="divider"></li>
			          <li role="presentation"><a role="menuitem" tabindex="-1" href="http://twitter.com/fat">Separated link</a></li>
			        </ul>
			      </li>-->
				  <li class="dropdown-submenu dropdown">
				    <a tabindex="-1" href="#" role="button" data-toggle="dropdown">Insert Twig Tag</a>
				    <ul class="dropdown-menu">
				      <li class="dropdown-submenu">
				        <a href="#" role="menuitem" tabindex="-1" >Recipient</a>
				        <ul class="dropdown-menu">
				        	<li><a href="#" role="menuitem" tabindex="-1"  data-twig="recipient.name">Name</a></li>
				        	<li><a href="#" data-twig="recipient.firstname">First Name</a></li>
				        	<li><a href="#" data-twig="recipient.lastname">Last Name</a></li>
				        	<li><a href="#" data-twig="recipient.email">Email</a></li>
				        	<li><a href="#" data-twig="recipient.obfuscatedrecipientid">Obfuscated Recipient ID</a></li>
				        	<li><a href="#" data-twig="recipient.obfuscatedconsid">Obfuscated Cons ID</a></li>
				        	<li><a href="#" data-twig="recipient.recipientkey">Recipient Key</a></li>
				        	<li><a href="#" data-twig="recipient.cons">Cons ID</a></li>
				        	<li><a href="#" data-twig="recipient.zip">Zip</a></li>
				        	<li><a href="#" data-twig="recipient.hasSavedPaymentInfo">Has Saved Payment Info</a></li>
				        	<li><a href="#" data-twig="recipient.unsubscribe">Unsubscribe</a></li>
				        </ul>
				      </li>
				      <li class="dropdown-submenu">
				        <a href="#" data-twig="">Cons Address</a>
				        <ul class="dropdown-menu">
				        	<li><a href="#" data-twig="consAddress.state_abbr">State Abbreviation</a></li>
				        	<li><a href="#" data-twig="consAddress.state_name">State Name</a></li>
				        	<li><a href="#" data-twig="consAddress.city">City</a></li>
				        	<li><a href="#" data-twig="consAddress.zip">Zip</a></li>
				        	<li><a href="#" data-twig="consAddress.country">Country</a></li>
				        </ul>
				      </li>
				      <li class="dropdown-submenu">
				        <a href="#" data-twig="">Cons</a>
				        <ul class="dropdown-menu">
				        	<li><a href="#" data-twig="cons.name">Name</a></li>
				        	<li><a href="#" data-twig="cons.firstname">First Name</a></li>
				        	<li><a href="#" data-twig="cons.lastname">Last Name</a></li>
				        	<li><a href="#" data-twig="cons.middlename">Middle Name</a></li>
				        	<li><a href="#" data-twig="cons.gender">Gender</a></li>
				        	<li><a href="#" data-twig="cons.prefix">Prefix</a></li>
				        	<li><a href="#" data-twig="cons.employer">Employer</a></li>
				        	<li><a href="#" data-twig="cons.occupation">Occupation</a></li>
				        </ul>
				      </li>
				      <li class="dropdown-submenu">
				        <a href="#" data-twig="">Cons Phone</a>
				        <ul class="dropdown-menu">
				        	<li><a href="#" data-twig="consPhone.homephone">Home Phone</a></li>
				        	<li><a href="#" data-twig="consPhone.workphone">Work Phone</a></li>
				        	<li><a href="#" data-twig="consPhone.fax">Fax</a></li>
				        	<li><a href="#" data-twig="consPhone.mobilephone">Mobile Phone</a></li>
				        </ul>
				      </li>
				      
				
				      <li class="dropdown-submenu">
				        <a href="#" data-twig="">Contribution</a>
				        <ul class="dropdown-menu">
				        	<li><a href="#" data-twig="contribution.highestprevcontrib">Highest Previous Contribution</a></li>
				        	<li><a href="#" data-twig="contribution.highestprevcontribraw">Highest Previous Contribution (Raw)</a></li>
				        </ul>
				      </li>
				
				      <li><a href="#" data-twig="guid">GUID</a></li>
				    </ul>
				  </li>
				  <li ><a href="#" id="show-error" class="disabled">Show Error</a></li>
				<li>  <div class="checkbox">
				    <label>
				      <input type="checkbox" name="personalized" id="personalized" value="personalized"> Show personalized
				    </label>
				  </div>
				</li>
			    </ul>
			<textarea id="twig" name="template"></textarea>
		</div>
 <div class="row">
		  <div class="col-md-8 col-md-offset-2">
			<pre id="display">


			</pre>
		</div>
	<script>
	window.setError = function(error){
		window.latestError = error;
		if(error){
			$("#show-error").removeClass("disabled");
		}
		else{
			$("#show-error").addClass("disabled");
		}
	};
	$(function(){
		$("#show-error").click(function(e){
			e.preventDefault();
			e.stopPropagation();
		if($(this).hasClass("disabled")){ return;}
		
		$("#display").html(window.latestError)
		return false;
		});
	});
	</script>
	
	</div>
	</div><!--/container-->
	
	<div class="modal fade" id="myModal">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title">Modal title</h4>
	      </div>
	      <div class="modal-body" style="height:300px;">


			<div class="radio">
			  <label>
			    <input type="radio" name="tagtype" id="optionsRadios1" value="echo" checked>
			    Echo Value
			  </label>
			</div>
			<div class="radio">
			  <label>
			    <input type="radio" name="tagtype" id="optionsRadios2" value="conditional">
			    Use in a conditional statement
			  </label>
			</div>
<hr>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Fallback Value</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="default" placeholder="i.e. Friend">
		    </div>
		  </div>

			<div class="radio conditional" id="conditional-group" style="display:none;">
			  <label>
			    <input type="radio" name="conditional-type" id="conditional-type-if" value="if" checked>
			    If Statement
			  </label>
			  <label>
			    <input type="radio" name="conditional-type" id="conditional-type-ifelse" value="ifelse">
			    If/Else Statement
			  </label>
			</div>
					<div class="radio conditional" id="conditional-type-group" style="display:none;">
						<h3>Condition Type</h3>
					  <label>
					    <input type="radio" name="conditional-subtype" id="conditional-subtype-if-exists" value="ifexists" checked>
					    If Exists
					  </label>
					  <label>
					    <input type="radio" name="conditional-subtype" id="conditional-subtype-if-equals" value="ifequals">
					    If Equals
					  </label>
					  <label>
					    <input type="radio" name="conditional-subtype" id="conditional-subtype-if-not" value="ifnot">
					    If Not Exists
					  </label>
					
					</div>


			
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary" data-dismiss="modal" id="insert-tag">Insert Tag</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<script>
	$(function(){
		if(window.sessionStorage){
			myCodeMirror.getDoc().setValue(	sessionStorage.getItem("sql") || "");
		}
		
		$(document).bind("keyup click", function(){ 
		 		window.myCodeMirror && window.myCodeMirror.save();
				window.sessionStorage && sessionStorage.setItem("twig", $("textarea").val() ) ;
		});
		$("input[name=tagtype]").change(function(){
			var val = $(this).val();
			if(val === "conditional"){
				$(".conditional").show();
			}
			if(val === "echo"){
				
			}
		});
		$("[data-twig]").click(function(){
			var $this = $(this);
			$(".modal-title").text($this.text() + " - {{ " + $this.data("twig") + " }}" );
		
			$('#myModal').modal();
		
			$("#insert-tag").click(function(){
				var tag = "";
				var type = $("input[name=tagtype]:checked").val();
				if( type === "echo"){
					if($("#default").val()){
						tag = "{{ " + $this.data("twig") + " | default(\"" + $("#default").val() + "\") }}"
	
					}
					else{
						tag = "{{ " + $this.data("twig") + " }}"
					}
				}
				else if( type === "conditional"){
					var conditional_type = $("input[name=conditional-type]:checked").val();
					var conditional_subtype = $("input[name=conditional-subtype]:checked").val();
					var basetag = "{% if ";
					if(conditional_subtype === "ifnot"){
						basetag += " not ";
					}
					basetag += $this.data("twig") ;
					if($("#default").val()){
						basetag +=  " | default(\"" + $("#default").val() + "\")";
					}
					if(conditional_subtype === "ifequals"){
						basetag += " == \"\"";
					}
					basetag += " %}\n\n";
					if(conditional_type === "ifelse"){
						basetag+= "{% else %}\n\n"
					}
					basetag += "{% endif %}"
					
					tag = basetag;
				}
				console.log(tag);
				myCodeMirror.replaceSelection(tag)
				myCodeMirror.save();
				$(this).unbind("click");
				
			});
		
		});
		
	})
	</script>
	<script src="twig.js"></script>
	<a href="#" id="permalink">Permalink</a>
</body>
</html>