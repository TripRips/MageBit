<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MageBit (Task_3) Aleks Hartmanis</title>
    <link href="/css/tables.css" rel="stylesheet">
    <link href="/css/nav.css" rel="stylesheet">
    <link href="/css/subscription.css" rel="stylesheet">
</head>
<body>

    <div style="width: 90%; margin: auto; margin-top: 5vw">
        @foreach($domains_array as $a)
            <a style="text-decoration: none" href="/table/filter/email={{$a}}"> <button style="height: 3vw; width: 7vw; border-radius: 20px; outline: none; background: lightblue; border: 3px solid #007bff;  text-transform: capitalize;">{{$a}}</button> </a>
        @endforeach
        <br>
        <br>
        <input type="text" class="searchInput" id="searchArticles" onkeyup="searchArticles()" placeholder="Search email..">
    </div>

    <form action="/table/export">
        <table id="table" class="content-table table-sortable" style="width: 90%; margin: auto; margin-top: 2vw">
            <thead>
            <tr>
                <th scope="col">Email</th>
                <th scope="col">Izveidots</th>
                <th scope="col"></th>
                <th scope="col">Darbība</th>
            </tr>
            </thead>
            <tbody style="background: rgba(218, 245, 244, 0.3); color: black">
            @foreach($subscriptions as $subscription)
                <tr>
                    <td>{{$subscription->email}}</td>
                    <td>{{$subscription->created_at}}</td>
                    <td><input type="checkbox" value="{{$subscription->id}}" name="checked[]"></td>
                    <td> <a href="/table/delete/{{$subscription->id}}" style="background: indianred; border: none; height: 2vw; width: 4vw; border-radius: 3vw; outline: none; cursor: pointer">Dzēst</a> </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div style="width: 90%; margin: auto; margin-top: 2vw">
            <button style="height: 3vw; border-radius: 20px; outline: none; background: lightblue; border: 3px solid #007bff;  text-transform: capitalize;">export selected emails</button>
        </div>
    </form>


    <script>
        function searchArticles() {
            search('searchArticles', 'table');
        }

        function search(searchInput, searchTable) {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById(searchInput);
            filter = input.value.toUpperCase();
            table = document.getElementById(searchTable);
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>


    <script type="text/javascript">


    </script>

    <script src="/js/pagination.js"></script>
    <script src="/js/sort.js"></script>
</body>
</html>
