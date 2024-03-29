function error(causeOfError) {
	$("#display").css("color", "red");
	if (causeOfError) {
		$("#" + causeOfError).closest(".control-group").addClass("error");
	}
}

var supportsSessionStorage = "sessionStorage" in window; 

function success(d) {
	if (d === "json") {
		$("#variables").closest(".control-group").removeClass("error");
		return;
	}
	$("#display").css("color", "black");
	$(".control-group").removeClass("error");
}

var get = (function() {
	var map = {};
	window.location.href.replace(/[#&]+([^=&]+)=([^&]*)/gi, function(m, k, v) {
		map[k] = decodeURIComponent(v.replace(/\+/g," "));
	});
	return map;
} ());

var template = get.template;
var variables = get.variables; 

$(function() {

	var $template  = $("#twig"),
		$variables = $("#variables");

	$(document).bind("keyup keypress pageload click", function(e) {
		if(window.lastRender && new Date() - window.lastRender  < 100){
			return; 
		}
		else{
		}
		console.log(e);
		window.lastRender = new Date();
		
		var variables = $("#variables").val() || "{}";
		var template = $template.val();
		if (!window.isFirst) {
			window.isFirst = true;
			if (template === sessionStorage.template) {
			//	return true;
			}
		}
		if (e.target.id == "variables") {
			try {
				JSON.parse(variables);
			}
			catch(eee) {
				error("variables");
				return true;
			}
			success("json");
		}
		if (e.target.id == "template") {
			if (template.split("{").length !== template.split("}").length) {
				error("template");
				return true;
			}
		}
		$.post("render.php", {
			'template': template,
			'personalized': $("#personalized")[0].checked
		},
		function(d) {
			if(d.match(/\^\<error\/\>/)){
				return ;
			}
			setError(false);
			success();
			$("#display").html(d);
			if (supportsSessionStorage) {
				sessionStorage.setItem("variables", variables);
				sessionStorage.setItem("template", template);
			}
			$("#permalink").attr("href", function() {
				return "/#" + $("input,textarea").serialize();
			});
			if ("replaceState" in window.history) {
				history.replaceState({},
				document.title, $("#permalink").attr("href"));
			}
		}).error(error);

	});

		myCodeMirror.getDoc().setValue(	sessionStorage.getItem("template") || "");
 		window.myCodeMirror && window.myCodeMirror.save();
		$("#twig").keyup(); // trigger load
		

});

