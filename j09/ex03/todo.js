$(document).ready(() => {

	var array_cookie = [];
	
	print_cookie();
	
	$("#button").click(event => {
		event.preventDefault();
		var todo_content = prompt("be you, be ff ---> proud of you ... bearray_cookieuse you can be ... do ... what we want ... to do");
		if (todo_content)
		{
			//AJAX
			updateCookie();
			print_cookie();
		}
	});

	$("#ft_list").click(event => {
		event.preventDefault();
		if (confirm ("Do you want to delete this todo?"))
		{
			var to_delete = event.target;
			array_cookie.splice(to_delete.id, 1);
			updateCookie();
			print_cookie();
		}
	})

	function print_cookie() 
	{
		var i = 0;
		array_cookie = get_cookie();
		$("#ft_list").text('');
		while (i < array_cookie.length) 
		{
			var todo = $("<div></div>");
			todo.attr('id', i);
			todo.text(array_cookie[i]);
			$("#ft_list").prepend(todo);
			i++;
		}
	}

	function get_cookie() 
	{
		$('#button').click(function(){
			$.get('select.php', function(data, status) {

			})
		});


		var i = 0;
		var decode_cookie = decodeURIComponent(document.cookie);
		var array_cookie = decode_cookie.split(';');
		while (i < array_cookie.length)
		{
			var cookie = array_cookie[i];
			while (cookie.charAt(0) == ' ') 
				cookie = cookie.substring(1);
			if (cookie.indexOf("todo=") == 0) 
				return JSON.parse(cookie.substring(5, cookie.length));
			i++;
		}
		return [];
	}
});