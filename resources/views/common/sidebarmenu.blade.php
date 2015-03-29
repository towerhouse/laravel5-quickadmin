<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered"><a href="profile.html"><img src="{{ asset('/img/ui-sam.jpg')}}" class="img-circle" width="60"></a></p>
            <h5 class="centered">{{ Auth::user()->name }}</h5>

            @if($menu_items)
              @foreach($menu_items as $url => $item)
                @if( $item['type'] == 'simple' )
                  <li class="mt">
                      <a id="{{ 'menu-item-' . str_slug($item['name']) }}" class="{{ Request::is( "$url*" ) ? 'active' : '' }}" href="{{ url( $url ) }}">
                          <i class="fa fa-{{ $item['icon'] }}"></i>
                          <span>{{ $item['name'] }}</span>
                      </a>
                  </li>
                @elseif( $item['type'] == 'nested' )
                  <li class="sub-menu">
                      <a  id="{{ 'menu-item-' . str_slug($item['name']) }}" href="javascript:;" >
                          <i class="fa fa-{{ $item['icon'] }}"></i>
                          <span>{{ $item['name'] }}</span>
                      </a>
                      <ul class="sub">
                          @foreach($item['items'] as $url => $subitem)
                            @if (Auth::user()->canPerformAction($subitem))
                              <li><a  href="{{ url($url) }}">{{ $subitem['name'] }}</a></li>
                              @if (Request::is("$url*"))
                              <script type="text/javascript">
                                $("#menu-item-{{ str_slug($item['name'])}}").addClass("active");
                              </script>
                            @endif
                          @endif
                          @endforeach
                      </ul>
                  </li>
                @endif
              @endforeach

            @endif


        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->