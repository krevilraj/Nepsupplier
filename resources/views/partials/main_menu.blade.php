@if(!empty($menu['child']))
    <ul class="sub-menu">
        @foreach($menu['child'] as $child)
            <li>
                <a href="{{ $child['link'] }}">{{ $child['label'] }}
                    @if(isset($menu_id) && !empty($child['child']))
                        <i class="fa fa-caret-right"></i>
                    @endif
                </a>
                @include('partials.main_menu', ['menu' => $child])
            </li>
        @endforeach
    </ul>
@endif
