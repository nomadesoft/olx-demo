@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">

        @if (count($items) > 1 && $error == "")
        <table class="table table-hover"> 
        @foreach ($items as $item)

        <tr>
            <td>
                @if ($item->thumbnail != "")
                <img src="{{ $item->thumbnail }}" class="img-responsive img-thumbnail" />
                @else 
                    No image
                @endif
            </td>
            <td>
                <h4>{{ $item->title }}</h4>
                <h5>{{ $item->description }}</h5>
                <h6>{{ $item->displayLocation }}</h6>
            </td>
            <td>
            @if (isset($item->price->displayPrice))
                <h4>{{ $item->price->displayPrice }}</h4>
             @endif
            </td>
        </tr>
        @endforeach
        </table>
        @elseif($error != "")
            <div class="alert alert-danger" role="alert">{{ $error }}</div> 
        @else 
            <div class="alert alert-danger" role="alert">Ops!, I am sorry, I don't have any results for your search</div> 
         @endif
        </div>
    </div>
@endsection
