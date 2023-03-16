<!DOCTYPE html>
<html>
<head>
    <title>rippleMark Task</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link href="/css/style.css" rel="stylesheet" type="text/css">

</head>
<body class="antialiased">

    <div class="container">
        <label for="uname"><b> Categories </b></label>
        <select name="category_id" class="select2 form-control" id="category_id">
            <option value="0">---- select Category ----</option>
            @foreach($categories as $category)
                <option
                    value="{{$category->id}}">{{$category->name}}
                </option>
            @endforeach
        </select>
    </div>
    <div class="container" >
        <label for="uname"><b> Sub Categories </b></label>
        <select id="cate_id" >
            <option  @if("value" == null) style="display:none" @endif>---- select Sub Category ----</option>

        </select>
    </div>

    <div class="container">
        <label for="uname"><b>Sub Sub Categories </b></label>
        <select id="sub_id">
            <option value="0">---- select Sub sub Category ----</option>

        </select>
    </div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#category_id').change(function () {
            var id = $(this).val();
            $('#cate_id').find('option').not(':first').remove();
            $.ajax({
                url: 'getSubCategory/' + id,
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    var len = 0;
                    if (response['data'] != null) {
                        len = response['data'].length;
                    }
                    if (len > 0) {
                        // read data and create select
                        for (var i = 0; i < len; i++) {
                            var id = response['data'][i].id;
                            var name = response['data'][i].name;
                            var option = "<option value='" + id + "'>" + name + "</option>"
                            $('#cate_id').append(option);
                        }
                    }
                }
            });
        });
        $('#cate_id').change(function () {
            var id = $(this).val();
            $('#sub_id').find('option').not(':first').remove();
            $.ajax({
                url: 'subSubCategories/' + id,
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    var len = 0;
                    if (response['data'] != null) {
                        len = response['data'].length;
                    }
                    if (len > 0) {
                        // read data and create select
                        for (var i = 0; i < len; i++) {
                            var id = response['data'][i].id;
                            var name = response['data'][i].name;
                            var option = "<option value='" + id + "'>" + name + "</option>"
                            $('#sub_id').append(option);
                        }
                    }
                }
            });
        });
    });

</script>
</body>
</html>
