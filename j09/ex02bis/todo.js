window.onload = () => 
{
	var array_cookie = [];
	var todo_list = document.querySelector('#ft_list');
	var button = document.getElementById('button');	

	print_cookie();

	button.addEventListener('click', event => {
		event.preventDefault();
		var todo_content = prompt("be you, be ff ---> proud of you ... because you can be ... do ... what we want ... to do");
		if (todo_content)
		{
			array_cookie.push(todo_content);
			update_cookie();
			print_cookie();
		}
	});

	todo_list.addEventListener('click', event => {
		event.preventDefault();
		if (confirm ("Do you want to delete this todo?"))
		{
			var to_delete = event.target;
			array_cookie.splice(to_delete.id, 1);
			update_cookie();
			print_cookie();
		}
	});

	function print_cookie ()
	{
		array_cookie = get_cookie();
		todo_list.innerHTML = '';
		for (index in array_cookie)
		{
			var todo = document.createElement("div");
			var todo_text = document.createTextNode(array_cookie[index]);
			todo.id = index;
			todo.appendChild(todo_text);
			todo_list.insertBefore(todo, todo_list.firstChild);
		}
	}

	function update_cookie ()
	{
		var date = new Date ();
		date.setTime(date.getTime() + 60000);
		var expires = `expires=${date.toUTCString()}`;
		document.cookie = `todo=${JSON.stringify(array_cookie)};${expires};path=/`;
	}

	function get_cookie ()
	{
		var i = 0;
		var decode_cookie = decodeURIComponent(document.cookie);
		var array_cookie = decode_cookie.split(';');
		while (i < array_cookie.length)
		{
			var cookie = array_cookie[i];
			while (cookie.charAt(0) == ' ')
				cookie = cookie.substring(1);
			if (cookie.indexOf("todo") == 0)
				return (JSON.parse(cookie.substring(5, cookie.lenght)));
			i++;
		}
		return [];
	}
}