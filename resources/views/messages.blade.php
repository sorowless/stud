@if(session()->has('success'))
    <script type="text/javascript">
        $(function(){
            abort(" {!! session()->get('success')  !!} ");
            alertify.success("{!! session()->get('success')  !!}");
        });
    </script>

@elseif(session()->has('error'))
    <script type="text/javascript">
        $(function(){
            abort(" {!! session()->get('success')  !!} ");
            alertify.error("{!! session()->get('error')  !!}");
        });
    </script>
@elseif(session()->has('errors'))
    <?php $errors = session()->get('errors'); $messages = ""; ?>
    @foreach ($errors->all("<p>:message</p>") as $message)
        <?php $messages .= $message; ?>
    @endforeach
    <script type="text/javascript">
        $(function(){
            abort(" {!! $messages  !!} ");
        });
    </script>
@endif
