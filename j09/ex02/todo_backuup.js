window.onload = () => {
	var cookieContent = [];
	var todoList = document.querySelector('#ft_list');
	var abtn = document.getElementById('abtn');

	displayList();

	abtn.addEventListener('click', (event) => {
		event.preventDefault();
		var todoContent = window.prompt('Renseigner le nouveau to do');
		if (todoContent) {
			cookieContent.push(todoContent);
			updateCookie();
			displayList();
		}
	});

	todoList.addEventListener('click', (event) => {
		event.preventDefault();
		if (confirm('Delete Cookie ?')) {
			var targetedTodo = event.target;
			cookieContent.splice(targetedTodo.id, 1);
			updateCookie();
			displayList();
		}
	})

	function displayList() {
		cookieContent = getCookie();
		console.log(getCookie());
		console.log(cookieContent);
		todoList.innerHTML = '';
		for (i in cookieContent) {
			var todo = document.createElement("div");
			var todoText = document.createTextNode(cookieContent[i]);
			todo.id = i;
			todo.appendChild(todoText);
			todoList.insertBefore(todo, todoList.firstChild);
		}
	}

	function updateCookie() {
		var d = new Date();
		d.setTime(d.getTime() + 6000000000000000);
		var expires = "expires=" + d.toUTCString();
		document.cookie = `todo=${JSON.stringify(cookieContent)};${expires};path=/`;
	}

	function getCookie() {
		var decodedCookie = decodeURIComponent(document.cookie);
		var ca = decodedCookie.split(';');
		for (var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}
			if (c.indexOf("todo=") == 0) {
				return JSON.parse(c.substring(5, c.length));
			}
		}
		return [];
	}
}