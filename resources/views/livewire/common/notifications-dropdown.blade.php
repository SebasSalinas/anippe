<li class="dropdown messages-menu">    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-envelope-o"></i>
        <span class="label label-success">{{count($notifications)}}</span> </a>
    <ul class="dropdown-menu">
        <li class="header">You have {{count($notifications)}} notifications</li>
        <li>
            <ul class="menu">
                @foreach($notifications as $notification)
                    <li @if(!$notification->read_at) style="background-color:red;" @endif>
                        <a href="#">
                            <div class="pull-left">
                                <img src="{{asset('base/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                            </div>
                            <h4>
                                {{$notification->data['title']}}
                                <small><i class="fa fa-clock-o"></i> {{$notification->created_at->format('d.m.Y')}}</small>
                            </h4>
                            <p>{{$notification->data['content']}}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
        <li class="footer"><a href="#" wire:click.prevent="markAllAsRead()">Mark all as Read</a></li>
    </ul>
</li>
