@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-12"> <!-- × and ÷ -->
        <table class="table" style="font-size: 24px">
            @for($i=0;$i<($token/2);$i++)
            @if(($i % 5)===0)
            <tr><?php $k = $i ?>
            @endif
                <td>{{$d_a[$i]}} × {{$d_b[$i]}} = </td>
            @if($i === ($k+4))
            </tr>
            @endif
            @endfor
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
</div>

<div class="row">
    <div class="col-md-12"> 
        <table class="table" style="font-size: 24px">
            @for($i=($token/2);$i<$token;$i++)
            @if(($i % 5)===0)
            <tr><?php $k = $i ?>
            @endif
                <td>{{$d_a[$i]}} × {{$d_b[$i]}} = </td>
            @if($i === ($k+4))
            </tr>
            @endif
            @endfor
        </table>
    </div>
</div>
<!-- Next page with result -->
<div class="row result">
    <div class="col-md-12"> <!-- × and ÷ -->
        <table class="table" style="font-size: 24px">
            @for($i=0;$i<($token/2);$i++)
            @if(($i % 5)===0)
            <tr><?php $k = $i ?>
            @endif
                <td>{{$d_a[$i]}} × {{$d_b[$i]}} = {{$d_a[$i] * $d_b[$i]}}</td>
            @if($i === ($k+4))
            </tr>
            @endif
            @endfor
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
</div>

<div class="row result">
    <div class="col-md-12"> 
        <table class="table" style="font-size: 24px">
            @for($i=($token/2);$i<$token;$i++)
            @if(($i % 5)===0)
            <tr><?php $k = $i ?>
            @endif
                <td>{{$d_a[$i]}} × {{$d_b[$i]}} = {{$d_a[$i] * $d_b[$i]}}</td>
            @if($i === ($k+4))
            </tr>
            @endif
            @endfor
        </table>

    </div>
</div>


@endsection
