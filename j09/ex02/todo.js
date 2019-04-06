while (document.cookie)
{
   
}

function add () 
{
    var res = prompt("be you, be ff ---> proud of you ... because you can be ... do ... what we want ... to do");
    if (res != "" && res != null)
    {
        var node = document.createElement("div");
        var textnode = document.createTextNode(res);
        node.appendChild(textnode);
        node.addEventListener("click", remove);
        document.getElementById("ft_list").prepend(node);
        document.cookie = "todo =" + textnode + "; expires=Thu, 18 Dec 2013 12:00:00 UTC";
    }
}
function remove ()
{
    if (confirm("Voulez-vous supprimer la todo ?"))
    {
        // document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        this.parentElement.removeChild(this);
    }
}        

