$(document).ready(() => {
	var content = [];

	getList();

	$("#button").click((event) => {
		event.preventDefault();
		var todoContent = prompt("be you, be ff ---> proud of you ... because you can be ... do ... what we want ... to do");
		if (todoContent) {
			$.post('insert.php', { todo: todoContent }, (data) => {
			})
			getList();
		}
	});

	$("#ft_list").click((event) => {
		event.preventDefault();
		if (confirm ("Do you want to delete this todo?")) {
			var targetedTodo = event.target;
			$.post('delete.php', { id: targetedTodo.id, content: targetedTodo.value }, (data) => {
				getList();
			})
		}
	})

	function displayList() {
		$("#ft_list").text('');
		for (i in content) {
			var todo = $("<div></div>");
			todo.attr('id', content[i][0]);
			todo.text(content[i][1]);
			$("#ft_list").prepend(todo);
		}
	}

	function getList() {
		$.get('select.php?todo=ok', (data) => {
			content = JSON.parse(data);
			displayList();
		})
	}
})