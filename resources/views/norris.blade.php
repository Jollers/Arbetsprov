<head>
    <link rel="stylesheet" type="text/css" href="{{ url('css/norris.css') }}">
</head>

<img class="center image" src="https://storage.googleapis.com/orchestra-cafe-7jp1kqsp/uploads/sites/34/2015/03/chuck-norris-uzis-700x467.jpg">
<br>
<br>

<h1 class="center">Dom hetaste Chuck Norris skämten från Webben</h1>

<button class="buttonCenter" type="button" onClick="refreshPage()">Hämta nya awesome skämt</button>

<br>
<br>

    <form class="center" id="norrisForm" method="post" action="{{ route('postNorris') }}">
        @csrf

        {{-- Loopar arrayn och får fram ett id med $key som används för att identifiera dom olika inputs i controller --}}
    @foreach($norris as $key => $item)
        <div class="form-group">
            <input type="text"  name="joke_id{{$key}}" value="{{$item['joke']}}" size="100">
        </div>
            <br>
        @endforeach
        <div class="form-group">
            <button class="btn btn-success postNorris">Submit</button>
        </div>
    </form>

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
</script>

<script type="text/javascript">
    function refreshPage(){
        window.location.reload();
    }

    //Skickar datan från formuläret med Javascript Ajax till controller
    $(document).ready(function () {

        $('').on('click', function (e) {

            e.preventDefault();

            var $form = $('#norrisForm');

            $.ajax({
                type:'POST',
                url:"{{ route('postNorris') }}",
                data:$form.serialize(),
                success:function(data){
                    console.log(data);
                }
            });
        });
    });
</script>