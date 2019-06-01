window.onload = function (){take_cookies();};

function create_cookie ()
{
	var value = document.getElementById("id_list").innerHTML;
	// value = value.replace(/\s+<div/g, "<div");
	document.cookie = `giveCookies=${value};`;
}

function take_cookies ()
{
	var table = String(document.cookie).split(';');

	for (var i = 0; i < table.length; i++)
	{
		var sub_table = table[i].split('=');

		if (sub_table[0].indexOf("giveCookies") !== -1)
		{
			document.getElementById("id_list").innerHTML += sub_table[1];
			for (var i = 0; i < document.getElementById('id_list').getElementsByTagName('div').length; i++)
				document.getElementById("id_list").getElementsByTagName('div')[i].addEventListener("click", list_click);
		}
	}
}

function list_click ()
{
	var ret = confirm("Do you want to delete this todo?");
	if (ret)
	{
		var id_list = document.getElementById("id_list");
		id_list.removeChild(this);
		create_cookie();
	}
}

function prompt_new ()
{
	var new_todo = prompt("be you, be ff ---> proud of you ... because you can be ... do ... what we want ... to do");

	if (new_todo != null && new_todo != "")
	{
		var new_div = document.createElement("div");
		new_div.appendChild(document.createTextNode(new_todo));
		new_div.addEventListener("click", list_click);
		document.getElementById("id_list").prepend(new_div);
		create_cookie();
	}
}


