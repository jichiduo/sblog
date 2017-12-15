@extends('layouts/app')
@section('content')
<div class="row">
    <div class="col-md-3 col-md-offset-5">
        <button id="tog" class="btn btn-default">Show/Hide Result</button>
        <p>&nbsp;</p>
    </div>
</div>
<div class="row">
    <div class="col-md-12"> <!-- × and ÷ -->
        <table class="table" style="font-size: 24px">
            @for($i=0;$i<50;$i++)
            @if(($i % 5)===0)
            <tr><?php $k = $i ?>
            @endif
                <td>{{$d_a[$i]}} × {{$d_b[$i]}} = <span class="result">{{$d_a[$i] * $d_b[$i]}}</span></td>
            @if($i === ($k+4))
            </tr>
            @endif
            @endfor
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
</div>

<div class="row">
    <div class="col-md-12"> 
        <table class="table" style="font-size: 24px">
            @for($i=50;$i<100;$i++)
            @if(($i % 5)===0)
            <tr><?php $k = $i ?>
            @endif
                <td>{{$d_a[$i]}} × {{$d_b[$i]}} = <span class="result">{{$d_a[$i] * $d_b[$i]}}</span></td>
            @if($i === ($k+4))
            </tr>
            @endif
            @endfor
        </table>

    </div>
</div>

<script>
    $(document).ready(function () {
    $('.result').hide();
    $('#tog').click(function () {
        $('.result').toggle(100);
        return false;
    });  
});
</script>
@endsection
