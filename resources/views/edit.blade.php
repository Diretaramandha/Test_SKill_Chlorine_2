<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/edit/{{ $edit->id }}" method="post">
        @csrf
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" id="" value="{{ old('name',($edit->name)) }}"></td>
            </tr>
            <tr>
                <td>Is Publish</td>
                <td>
                    <select name="is_publish" id="">
                        <option value="1"{{$edit->is_publish=='1'?'selected':''}}>Publish</option>
                        <option value="0"{{$edit->is_publish=='0'?'selected':''}}>Not Publish</option
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>