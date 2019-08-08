<script>

    $(function(){
        $(".pdelete").on('click',function () {
            if(confirm("Вы действительно хотите удалить данную запись?")){
                let id=$(this).attr("rel");
                $.ajax({
                    type: "DELETE",
                    url: "{!! route('posts.delete') !!}",
                    data: {_token:"{{csrf_token()}}", id:id},
                    complete: function() {
                        alert("Удалено");
                        location.reload();
                    }
                });
            }else{
                alertify.error("Действие отменено пользователем");
            }
        })
    });

</script>
<script>

    $(function(){
        $(".cdelete").on('click',function () {
            if(confirm("Вы действительно хотите удалить данную запись?")){
                let id=$(this).attr("rel");
                $.ajax({
                    type: "DELETE",
                    url: "{!! route('categories.delete') !!}",
                    data: {_token:"{{csrf_token()}}", id:id},
                    complete: function() {
                        alert("Удалено");
                        location.reload();
                    }
                });
            }else{
                alertify.error("Действие отменено пользователем");
            }
        })
    });

</script>
<script>

    $(function(){
        $(".udelete").on('click',function () {
            if(confirm("Вы действительно хотите удалить данную запись?")){
                let id=$(this).attr("rel");
                $.ajax({
                    type: "DELETE",
                    url: "{!! route('users.delete') !!}",
                    data: {_token:"{{csrf_token()}}", id:id},
                    complete: function() {
                        alert("Удалено");
                        location.reload();
                    }
                });
            }else{
                alertify.error("Действие отменено пользователем");
            }
        })
    });

</script>
<script>

    $(function(){
        $(".comdelete").on('click',function () {
            if(confirm("Вы действительно хотите удалить данную запись?")){
                let id=$(this).attr("rel");
                $.ajax({
                    type: "DELETE",
                    url: "{!! route('comments.delete') !!}",
                    data: {_token:"{{csrf_token()}}", id:id},
                    complete: function() {
                        alert("Удалено");
                        location.reload();
                    }
                });
            }else{
                alertify.error("Действие отменено пользователем");
            }
        })
    });

</script>
<script>

    $(function(){
        $(".condelete").on('click',function () {
            if(confirm("Вы действительно хотите удалить данную запись?")){
                let id=$(this).attr("rel");
                $.ajax({
                    type: "DELETE",
                    url: "{!! route('contacts.delete') !!}",
                    data: {_token:"{{csrf_token()}}", id:id},
                    complete: function() {
                        alert("Удалено");
                        location.reload();
                    }
                });
            }else{
                alertify.error("Действие отменено пользователем");
            }
        })
    });

</script>
<script>

    $(function(){
        $(".tdelete").on('click',function () {
            if(confirm("Вы действительно хотите удалить данную запись?")){
                let id=$(this).attr("rel");
                $.ajax({
                    type: "DELETE",
                    url: "{!! route('timetable.delete') !!}",
                    data: {_token:"{{csrf_token()}}", id:id},
                    complete: function() {
                        alert("Удалено");
                        location.reload();
                    }
                });
            }else{
                alertify.error("Действие отменено пользователем");
            }
        })
    });

</script>
