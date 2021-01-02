<aside class="main-sidebar ">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('base/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{auth()->user()->fullName}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."> <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

            <li class="{{active('base.dashboard')}}">
                <a href="{{route('base.dashboard')}}"> <i class="fa fa-th"></i> <span>Dashboard</span> </a>
            </li>

            <li class="{{active(['base.clients.*','base.client.*'])}}">
                <a href="{{route('base.clients.index')}}"> <i class="fa fa-users"></i> <span>Clients</span> </a>
            </li>

            <li class="{{active(['base.contacts.*'])}}">
                <a href="{{route('base.contacts.index')}}"> <i class="fa fa-user-secret"></i> <span>Contacts</span> </a>
            </li>

            <li class="{{active(['base.projects.*', 'base.project.*'])}}">
                <a href="{{route('base.projects.index')}}"> <i class="fa fa-terminal"></i> <span>Projects</span> </a>
            </li>

            <li class="{{active(['base.tickets.*', 'base.ticket.*'])}}">
                <a href="{{route('base.tickets.index')}}"> <i class="fa fa-ticket"></i> <span>Tickets</span> </a>
            </li>


            <li class="treeview">
                <a href="#"> <i class="fa fa-cogs"></i> <span>Settings</span> <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> </a>
                <ul class="treeview-menu">

                    <li class="{{active('base.settings.users.*')}}">
                        <a href="{{route('base.settings.users.index')}}"><i class="fa fa-users"></i> Users</a>
                    </li>

                    <li class="treeview">

                        <a href="#"><i class="fa fa-circle-o"></i> Clients <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i> </span>
                        </a>

                        <ul class="treeview-menu">
                            <li class="{{active('base.settings.client-groups.*')}}">
                                <a href="{{route('base.settings.client-groups.index')}}"><i class="fa fa-user-plus"></i> Groups</a>
                            </li>
                        </ul>
                    </li>

                    <li class="{{active('base.settings.roles.*')}}">
                        <a href="{{route('base.settings.roles.index')}}"><i class="fa fa-user-secret"></i> Roles</a>
                    </li>

                    <li class="{{active('base.settings.general')}}">
                        <a href="{{route('base.settings.general')}}"><i class="fa fa-gear"></i> Settings</a>
                    </li>

                </ul>
            </li>

            {{--Pinned projects--}}
            @if(count($pinnedProjects) > 0)
                <li class="header">PINNED PROJECTS</li>
                @foreach($pinnedProjects as $project)
                    <li><a href="{{$project->link()}}"><i class="fa fa-circle-o"></i>
                            <span>{{$project->name}}</span></a></li>
                @endforeach
            @endif
        </ul>
    </section>
</aside>
