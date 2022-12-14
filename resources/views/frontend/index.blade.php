<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('add') }}"><button>Tambah Pengguna</button></a>
    <table border="1">
        <thead>
            <tr>

                <th>Nama</th>
                <th>Email</th>

            </tr>
        </thead>
        <tbody id="daftar-pengguna">

        </tbody>

        </table>

    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>

    <script>
        $.ajax({
            url: "http://127.0.0.1:8000/api/pengguna/list",
            method: "",
            dataType: "json",
            success: response => {
                let listPengguna = response.data
                let htmlString = ""
                for (let pengguna of listPengguna) {
                    htmlString += `<tr> 
                    <td> ${ pengguna.name } </td>
                    <td> ${ pengguna.email } </td>

                    <td> 

                    <a href="http://127.0.0.1:8000/detail/${pengguna.id}">
                        <button>Detail</button>
                    </a>
                        <button onclick="deletePengguna(${pengguna.id})">Hapus</button>
                        </a>
                    </td>

                    </tr>`
                }

                let html = $.parseHTML(htmlString)
                $("#daftar-pengguna").append(html)
            }
        })

        function deletePengguna(id) {
            $.ajax({
                url: `http://127.0.0.1:8000/api/pengguna/${id}`,
                method: "POST",
                dataType: "json",
                success: _=> {
                    console.log("SUCCESS")
                    window.location.href = ""
                },
                error: err => {
                    console.log("err")
                }
            })
        }

    </script>

</body>
</html>