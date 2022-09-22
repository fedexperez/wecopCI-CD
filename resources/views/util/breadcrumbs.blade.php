<div class="container">
    <nav>
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home.index') }}">Home</a>
            </li>
            @if(!empty($data['route']))
            @foreach($data['route'] as $bread)
            @if(count($bread) == 3)
                <li class="breadcrumb-item">
                    <a href="{{ route($bread[1] , $bread[2]) }}">{{ $bread[0] }}</a>
                </li>
            @elseif(count($bread) == 4)
                <li class="breadcrumb-item">
                    <a href="{{ route($bread[1] , [$bread[2], $bread[3]]) }}">{{ $bread[0] }}</a>
                </li>
            @else
                <li class="breadcrumb-item">
                    <a href="{{ route($bread[1]) }}">{{ $bread[0] }}</a>
                </li>
            @endif
            @endforeach
            @endif
        </ul>
    </nav>
</div>